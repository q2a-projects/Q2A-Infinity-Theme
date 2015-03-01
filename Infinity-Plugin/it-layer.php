<?php

class qa_html_theme_layer extends qa_html_theme_base {
	
	function doctype(){			
		qa_html_theme_base::doctype();

		if(qa_get_logged_in_level() >= QA_USER_LEVEL_ADMIN)	{
			// theme installation & update
			$version = qa_opt('TP_VERSION');
			if( TP_VERSION > $version )
				qa_redirect('tp_installation');
			// admin/category form fields
			if( $this->request == 'admin/categories' &&  qa_get('edit') >= 1 ) {
				require_once QA_INCLUDE_DIR.'qa-db-metas.php';
				$categoryid = qa_get('edit');
				$et_category = json_decode( qa_db_categorymeta_get($categoryid, 'et_category'), true );
				$et_category_link_title = $et_category['et_cat_title'];
				$et_category_description = $et_category['et_cat_desc'];
				$et_category_icon_48 = $et_category['et_cat_icon48'];
				$et_category_icon_64 = $et_category['et_cat_icon64'];
				$this->content['form']['fields'][] = array(
						'tags' => 'NAME="et_category_link_title" ID="et_category_link_title"',
						'label' => 'Category Link Title',
						'value' => $et_category_link_title
						);
				$this->content['form']['fields'][] = array(
						'tags' => 'NAME="et_category_description" ID="et_category_description"',
						'label' => 'Category Sidebar Description',
						'value' => $et_category_description
						);
				$this->content['form']['fields'][] = array(
						'tags' => 'NAME="et_category_icon_48" ID="et_category_icon_48"',
						'label' => 'Category Icon(48 pixel)',
						'value' => $et_category_icon_48
						);
				$this->content['form']['fields'][] = array(
						'tags' => 'NAME="et_category_icon_64" ID="et_category_icon_64"',
						'label' => 'Category Icon(64 pixel)',
						'value' => $et_category_icon_64
						);
			}

		}
		// ask form
		if ( ($this->template=='submit') or (substr(qa_get_state(),0,4)=='edit')){
			// Featured Image
			if(qa_opt('it_feature_img_enable')){
				$featured_image = '';
				$featured_image_url = '';
				$featured_image_style = '';
				$featured_file_container_style = '';
				if ($this->template!='submit'){
					$postid = $this->content["q_view"]["raw"]["postid"];
					require_once QA_INCLUDE_DIR.'qa-db-metas.php';
					$featured_image = qa_db_postmeta_get($postid, 'et_featured_image');
					if(isset($featured_image)){
						$featured_image_url = qa_opt('tp_featured_url') . $featured_image;
						$featured_image_style = 'display: inline-block;';
						$featured_file_container_style = 'display:none;';
					}
				}
				$custom_field[0]['category_featured_upload']['label'] = '';
				$custom_field[0]['category_featured_upload']['html'] = '
					<div style="'.$featured_image_style.'" class="image-preview-container" id="image-preview-container">
						<img class="image-preview img-thumbnail" id="image-preview" src="'.$featured_image_url.'">
						<button class="btn btn-danger remove-featured-image" id="remove-featured-image" type="button">X</button>
					</div>
					<div id="featured_file_container" style="'.$featured_file_container_style.'"><div id="featured_file_upload"></div></div>
					<input type="hidden" value="'.$featured_image.'" name="featured_image" id="featured_image">
				';
				$custom_field[0]['category_featured_upload']['type'] = 'custom';
			}else
				$custom_field[0] = array();
			// Form template
			if ($this->template=='submit')
				$form_name = 'form';
			else
				$form_name = 'form_q_edit';
			// Excerpt Field
			if(qa_opt('it_excerpt_field_enable')){
				if ($this->template=='submit'){
					$excertp_pos = (int)qa_opt('it_excerpt_pos_ask');
					$excertp_text = '';
				}else{
					$postid = $this->content["q_view"]["raw"]["postid"];
					require_once QA_INCLUDE_DIR.'qa-db-metas.php';
					$excertp_pos = (int)qa_opt('it_excerpt_pos_edit');
					$excertp_text = qa_db_postmeta_get($postid, 'et_excerpt_text');
				}
			}
				
			// Category Field
			if(qa_opt('it_cat_advanced_enable')){
				if ($this->template=='submit'){
					$category_pos = (int)qa_opt('it_cat_pos_ask');
					//$field_value = qa_post_text('q_category');
				}else{
					$category_pos = (int)qa_opt('it_cat_pos_edit');
				}
				if(empty($this->content["q_view"]["raw"]["categoryid"]))
					$this->content[$form_name]['fields']['category']['value'] = '';
				$this->content[$form_name]['fields']['category']['type'] = 'text';
				$this->content[$form_name]['fields']['category']['label'] = '';
				$this->content[$form_name]['fields']['category']['tags'] = 'name="q_category" id="category_tag" autocomplete="off" onkeyup="qa_cat_tag_hints();" onmouseup="qa_cat_tag_hints();"';
				$this->content[$form_name]['fields']['category']['note_force'] = true;
				$custom_field[1]['category_tag_holder']['label'] = 'This tip is about:';
				$custom_field[1]['category_tag_holder']['html'] = '<div id="category_tag_holder"></div>';
				$custom_field[1]['category_tag_holder']['type'] = 'custom';
			}else{
				$custom_field[1] = array();
				$category_pos = 0;
			}
			
			// order of form elements
			$count = count($this->content[$form_name]["fields"]);
			$this->content[$form_name]["fields"] = array_merge(
				$custom_field[0],
				array_slice($this->content[$form_name]["fields"], 0, $category_pos),
				$custom_field[1],
				array_slice($this->content[$form_name]["fields"], $category_pos, $count)
			);
			// Excerpt Custom Fields
			if(qa_opt('it_excerpt_field_enable')){
				$custom_field = array();
				$custom_field[0]['excerpt']['label'] = 'Add Excerpt';
				$custom_field[0]['excerpt']['html'] = '
					<textarea name="q-excerpt" id="excerpt-input-placeholder" class="qa-form-tall-text" cols="40" rows="3" name="excerpt-input-placeholder" placeholder="If you add an excerpt it will be used in lists">' . $excertp_text . '</textarea>
				';
				$custom_field[0]['excerpt']['type'] = 'custom';
				
				$count = count($this->content[$form_name]["fields"]);
				$this->content[$form_name]["fields"] = array_merge(
					array_slice($this->content[$form_name]["fields"], 0, $excertp_pos),
					$custom_field[0],
					array_slice($this->content[$form_name]["fields"], $excertp_pos, $count)
				);
			}
			//v($this->content[$form_name]["fields"]);
		}
	}
}
