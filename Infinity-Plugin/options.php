<?php
/* don't allow this page to be requested directly from browser */	
if (!defined('QA_VERSION')) {
		header('Location: /');
		exit;
}
class it_options {
	var $added;
    var $theme_directory;
    var $theme_url;
	function load_module($directory, $urltoroot) {
		$this->theme_directory=$directory;
		$this->theme_url=$urltoroot;
	}

	function match_request($request){
		if ( ($request=='admin/it_options') && (qa_get_logged_in_level() >= QA_USER_LEVEL_ADMIN) )
			return true;
		return false;
	}
	
	function process_request($request)
	{
		if (qa_get_logged_in_level() < QA_USER_LEVEL_ADMIN){
			$qa_content=qa_content_prepare();
			$qa_content['error']="You don't have permission to access this page.";
			return $qa_content;
		}
		
		$qa_content=qa_content_prepare();
		$qa_content['site_title']="Infinity Theme";
		$qa_content['title']="Theme Option";
		$qa_content['error']="";
		$qa_content['suggest_next']="";

		$qa_content['custom'] = $this->page_form();
		$qa_content['sidepanel'] = '';
		return $qa_content;	
	}
	
	function page_form(){
	        global $google_webfonts;
            global $normal_fonts;
            $google_webfonts = json_decode('{"ABeeZee":{"variants":[{"id":"400","name":"Normal 400"},{"id":"italic","name":"Italic"}],"subsets":[{"id":"latin","name":"Latin"}]},"Abel":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Abril Fatface":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Aclonica":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Acme":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Actor":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Adamina":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Advent Pro":{"variants":[{"id":"100","name":"Ultra-Light 100"},{"id":"200","name":"Light 200"},{"id":"300","name":"Book 300"},{"id":"400","name":"Normal 400"},{"id":"500","name":"Medium 500"},{"id":"600","name":"Semi-Bold 600"},{"id":"700","name":"Bold 700"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"greek","name":"Greek"},{"id":"latin-ext","name":"Latin Extended"}]},"Aguafina Script":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Akronim":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Aladin":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Aldrich":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Alef":{"variants":[{"id":"400","name":"Normal 400"},{"id":"700","name":"Bold 700"}],"subsets":[{"id":"latin","name":"Latin"}]},"Alegreya":{"variants":[{"id":"400","name":"Normal 400"},{"id":"italic","name":"Italic"},{"id":"700","name":"Bold 700"},{"id":"900","name":"Ultra-Bold 900"},{"id":"900italic","name":"Ultra-Bold 900 Italic"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Alegreya SC":{"variants":[{"id":"400","name":"Normal 400"},{"id":"italic","name":"Italic"},{"id":"700","name":"Bold 700"},{"id":"900","name":"Ultra-Bold 900"},{"id":"900italic","name":"Ultra-Bold 900 Italic"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Alegreya Sans":{"variants":[{"id":"100","name":"Ultra-Light 100"},{"id":"300","name":"Book 300"},{"id":"400","name":"Normal 400"},{"id":"italic","name":"Italic"},{"id":"500","name":"Medium 500"},{"id":"700","name":"Bold 700"},{"id":"800","name":"Extra-Bold 800"},{"id":"900","name":"Ultra-Bold 900"},{"id":"900italic","name":"Ultra-Bold 900 Italic"}],"subsets":[{"id":"vietnamese","name":"Vietnamese"},{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Alegreya Sans SC":{"variants":[{"id":"100","name":"Ultra-Light 100"},{"id":"300","name":"Book 300"},{"id":"400","name":"Normal 400"},{"id":"italic","name":"Italic"},{"id":"500","name":"Medium 500"},{"id":"700","name":"Bold 700"},{"id":"800","name":"Extra-Bold 800"},{"id":"900","name":"Ultra-Bold 900"},{"id":"900italic","name":"Ultra-Bold 900 Italic"}],"subsets":[{"id":"vietnamese","name":"Vietnamese"},{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Alex Brush":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Alfa Slab One":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Alice":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Alike":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Alike Angular":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Allan":{"variants":[{"id":"400","name":"Normal 400"},{"id":"700","name":"Bold 700"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Allerta":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Allerta Stencil":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Allura":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Almendra":{"variants":[{"id":"400","name":"Normal 400"},{"id":"italic","name":"Italic"},{"id":"700","name":"Bold 700"},{"id":"700italic","name":"Bold 700 Italic"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Almendra Display":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Almendra SC":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Amarante":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Amaranth":{"variants":[{"id":"400","name":"Normal 400"},{"id":"italic","name":"Italic"},{"id":"700","name":"Bold 700"},{"id":"700italic","name":"Bold 700 Italic"}],"subsets":[{"id":"latin","name":"Latin"}]},"Amatic SC":{"variants":[{"id":"400","name":"Normal 400"},{"id":"700","name":"Bold 700"}],"subsets":[{"id":"latin","name":"Latin"}]},"Amethysta":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Anaheim":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Andada":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Andika":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"cyrillic-ext","name":"Cyrillic Extended"},{"id":"cyrillic","name":"Cyrillic"},{"id":"latin-ext","name":"Latin Extended"}]},"Angkor":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"khmer","name":"Khmer"}]},"Annie Use Your Telescope":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Anonymous Pro":{"variants":[{"id":"400","name":"Normal 400"},{"id":"italic","name":"Italic"},{"id":"700","name":"Bold 700"},{"id":"700italic","name":"Bold 700 Italic"}],"subsets":[{"id":"greek-ext","name":"Greek Extended"},{"id":"latin","name":"Latin"},{"id":"cyrillic-ext","name":"Cyrillic Extended"},{"id":"greek","name":"Greek"},{"id":"cyrillic","name":"Cyrillic"},{"id":"latin-ext","name":"Latin Extended"}]},"Antic":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Antic Didone":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Antic Slab":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Anton":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Arapey":{"variants":[{"id":"400","name":"Normal 400"},{"id":"italic","name":"Italic"}],"subsets":[{"id":"latin","name":"Latin"}]},"Arbutus":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Arbutus Slab":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Architects Daughter":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Archivo Black":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Archivo Narrow":{"variants":[{"id":"400","name":"Normal 400"},{"id":"italic","name":"Italic"},{"id":"700","name":"Bold 700"},{"id":"700italic","name":"Bold 700 Italic"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Arimo":{"variants":[{"id":"400","name":"Normal 400"},{"id":"italic","name":"Italic"},{"id":"700","name":"Bold 700"},{"id":"700italic","name":"Bold 700 Italic"}],"subsets":[{"id":"vietnamese","name":"Vietnamese"},{"id":"greek-ext","name":"Greek Extended"},{"id":"latin","name":"Latin"},{"id":"cyrillic-ext","name":"Cyrillic Extended"},{"id":"greek","name":"Greek"},{"id":"cyrillic","name":"Cyrillic"},{"id":"latin-ext","name":"Latin Extended"}]},"Arizonia":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Armata":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Artifika":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Arvo":{"variants":[{"id":"400","name":"Normal 400"},{"id":"italic","name":"Italic"},{"id":"700","name":"Bold 700"},{"id":"700italic","name":"Bold 700 Italic"}],"subsets":[{"id":"latin","name":"Latin"}]},"Asap":{"variants":[{"id":"400","name":"Normal 400"},{"id":"italic","name":"Italic"},{"id":"700","name":"Bold 700"},{"id":"700italic","name":"Bold 700 Italic"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Asset":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Astloch":{"variants":[{"id":"400","name":"Normal 400"},{"id":"700","name":"Bold 700"}],"subsets":[{"id":"latin","name":"Latin"}]},"Asul":{"variants":[{"id":"400","name":"Normal 400"},{"id":"700","name":"Bold 700"}],"subsets":[{"id":"latin","name":"Latin"}]},"Atomic Age":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Aubrey":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Audiowide":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Autour One":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Average":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Average Sans":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Averia Gruesa Libre":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Averia Libre":{"variants":[{"id":"300","name":"Book 300"},{"id":"400","name":"Normal 400"},{"id":"italic","name":"Italic"},{"id":"700","name":"Bold 700"},{"id":"700italic","name":"Bold 700 Italic"}],"subsets":[{"id":"latin","name":"Latin"}]},"Averia Sans Libre":{"variants":[{"id":"300","name":"Book 300"},{"id":"400","name":"Normal 400"},{"id":"italic","name":"Italic"},{"id":"700","name":"Bold 700"},{"id":"700italic","name":"Bold 700 Italic"}],"subsets":[{"id":"latin","name":"Latin"}]},"Averia Serif Libre":{"variants":[{"id":"300","name":"Book 300"},{"id":"400","name":"Normal 400"},{"id":"italic","name":"Italic"},{"id":"700","name":"Bold 700"},{"id":"700italic","name":"Bold 700 Italic"}],"subsets":[{"id":"latin","name":"Latin"}]},"Bad Script":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"cyrillic","name":"Cyrillic"}]},"Balthazar":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Bangers":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Basic":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Battambang":{"variants":[{"id":"400","name":"Normal 400"},{"id":"700","name":"Bold 700"}],"subsets":[{"id":"khmer","name":"Khmer"}]},"Baumans":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Bayon":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"khmer","name":"Khmer"}]},"Belgrano":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Belleza":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"BenchNine":{"variants":[{"id":"300","name":"Book 300"},{"id":"400","name":"Normal 400"},{"id":"700","name":"Bold 700"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Bentham":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Berkshire Swash":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Bevan":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Bigelow Rules":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Bigshot One":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Bilbo":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Bilbo Swash Caps":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Bitter":{"variants":[{"id":"400","name":"Normal 400"},{"id":"italic","name":"Italic"},{"id":"700","name":"Bold 700"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Black Ops One":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Bokor":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"khmer","name":"Khmer"}]},"Bonbon":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Boogaloo":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Bowlby One":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Bowlby One SC":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Brawler":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Bree Serif":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Bubblegum Sans":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Bubbler One":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Buda":{"variants":[{"id":"300","name":"Book 300"}],"subsets":[{"id":"latin","name":"Latin"}]},"Buenard":{"variants":[{"id":"400","name":"Normal 400"},{"id":"700","name":"Bold 700"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Butcherman":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Butterfly Kids":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Cabin":{"variants":[{"id":"400","name":"Normal 400"},{"id":"italic","name":"Italic"},{"id":"500","name":"Medium 500"},{"id":"600","name":"Semi-Bold 600"},{"id":"700","name":"Bold 700"},{"id":"700italic","name":"Bold 700 Italic"}],"subsets":[{"id":"latin","name":"Latin"}]},"Cabin Condensed":{"variants":[{"id":"400","name":"Normal 400"},{"id":"500","name":"Medium 500"},{"id":"600","name":"Semi-Bold 600"},{"id":"700","name":"Bold 700"}],"subsets":[{"id":"latin","name":"Latin"}]},"Cabin Sketch":{"variants":[{"id":"400","name":"Normal 400"},{"id":"700","name":"Bold 700"}],"subsets":[{"id":"latin","name":"Latin"}]},"Caesar Dressing":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Cagliostro":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Calligraffitti":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Cambo":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Candal":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Cantarell":{"variants":[{"id":"400","name":"Normal 400"},{"id":"italic","name":"Italic"},{"id":"700","name":"Bold 700"},{"id":"700italic","name":"Bold 700 Italic"}],"subsets":[{"id":"latin","name":"Latin"}]},"Cantata One":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Cantora One":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Capriola":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Cardo":{"variants":[{"id":"400","name":"Normal 400"},{"id":"italic","name":"Italic"},{"id":"700","name":"Bold 700"}],"subsets":[{"id":"greek-ext","name":"Greek Extended"},{"id":"latin","name":"Latin"},{"id":"greek","name":"Greek"},{"id":"latin-ext","name":"Latin Extended"}]},"Carme":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Carrois Gothic":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Carrois Gothic SC":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Carter One":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Caudex":{"variants":[{"id":"400","name":"Normal 400"},{"id":"italic","name":"Italic"},{"id":"700","name":"Bold 700"},{"id":"700italic","name":"Bold 700 Italic"}],"subsets":[{"id":"greek-ext","name":"Greek Extended"},{"id":"latin","name":"Latin"},{"id":"greek","name":"Greek"},{"id":"latin-ext","name":"Latin Extended"}]},"Cedarville Cursive":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Ceviche One":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Changa One":{"variants":[{"id":"400","name":"Normal 400"},{"id":"italic","name":"Italic"}],"subsets":[{"id":"latin","name":"Latin"}]},"Chango":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Chau Philomene One":{"variants":[{"id":"400","name":"Normal 400"},{"id":"italic","name":"Italic"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Chela One":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Chelsea Market":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Chenla":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"khmer","name":"Khmer"}]},"Cherry Cream Soda":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Cherry Swash":{"variants":[{"id":"400","name":"Normal 400"},{"id":"700","name":"Bold 700"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Chewy":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Chicle":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Chivo":{"variants":[{"id":"400","name":"Normal 400"},{"id":"italic","name":"Italic"},{"id":"900","name":"Ultra-Bold 900"},{"id":"900italic","name":"Ultra-Bold 900 Italic"}],"subsets":[{"id":"latin","name":"Latin"}]},"Cinzel":{"variants":[{"id":"400","name":"Normal 400"},{"id":"700","name":"Bold 700"},{"id":"900","name":"Ultra-Bold 900"}],"subsets":[{"id":"latin","name":"Latin"}]},"Cinzel Decorative":{"variants":[{"id":"400","name":"Normal 400"},{"id":"700","name":"Bold 700"},{"id":"900","name":"Ultra-Bold 900"}],"subsets":[{"id":"latin","name":"Latin"}]},"Clicker Script":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Coda":{"variants":[{"id":"400","name":"Normal 400"},{"id":"800","name":"Extra-Bold 800"}],"subsets":[{"id":"latin","name":"Latin"}]},"Coda Caption":{"variants":[{"id":"800","name":"Extra-Bold 800"}],"subsets":[{"id":"latin","name":"Latin"}]},"Codystar":{"variants":[{"id":"300","name":"Book 300"},{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Combo":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Comfortaa":{"variants":[{"id":"300","name":"Book 300"},{"id":"400","name":"Normal 400"},{"id":"700","name":"Bold 700"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"cyrillic-ext","name":"Cyrillic Extended"},{"id":"greek","name":"Greek"},{"id":"cyrillic","name":"Cyrillic"},{"id":"latin-ext","name":"Latin Extended"}]},"Coming Soon":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Concert One":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Condiment":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Content":{"variants":[{"id":"400","name":"Normal 400"},{"id":"700","name":"Bold 700"}],"subsets":[{"id":"khmer","name":"Khmer"}]},"Contrail One":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Convergence":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Cookie":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Copse":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Corben":{"variants":[{"id":"400","name":"Normal 400"},{"id":"700","name":"Bold 700"}],"subsets":[{"id":"latin","name":"Latin"}]},"Courgette":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Cousine":{"variants":[{"id":"400","name":"Normal 400"},{"id":"italic","name":"Italic"},{"id":"700","name":"Bold 700"},{"id":"700italic","name":"Bold 700 Italic"}],"subsets":[{"id":"vietnamese","name":"Vietnamese"},{"id":"greek-ext","name":"Greek Extended"},{"id":"latin","name":"Latin"},{"id":"cyrillic-ext","name":"Cyrillic Extended"},{"id":"greek","name":"Greek"},{"id":"cyrillic","name":"Cyrillic"},{"id":"latin-ext","name":"Latin Extended"}]},"Coustard":{"variants":[{"id":"400","name":"Normal 400"},{"id":"900","name":"Ultra-Bold 900"}],"subsets":[{"id":"latin","name":"Latin"}]},"Covered By Your Grace":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Crafty Girls":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Creepster":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Crete Round":{"variants":[{"id":"400","name":"Normal 400"},{"id":"italic","name":"Italic"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Crimson Text":{"variants":[{"id":"400","name":"Normal 400"},{"id":"italic","name":"Italic"},{"id":"600","name":"Semi-Bold 600"},{"id":"700","name":"Bold 700"},{"id":"700italic","name":"Bold 700 Italic"}],"subsets":[{"id":"latin","name":"Latin"}]},"Croissant One":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Crushed":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Cuprum":{"variants":[{"id":"400","name":"Normal 400"},{"id":"italic","name":"Italic"},{"id":"700","name":"Bold 700"},{"id":"700italic","name":"Bold 700 Italic"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"cyrillic","name":"Cyrillic"},{"id":"latin-ext","name":"Latin Extended"}]},"Cutive":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Cutive Mono":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Damion":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Dancing Script":{"variants":[{"id":"400","name":"Normal 400"},{"id":"700","name":"Bold 700"}],"subsets":[{"id":"latin","name":"Latin"}]},"Dangrek":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"khmer","name":"Khmer"}]},"Dawning of a New Day":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Days One":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Delius":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Delius Swash Caps":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Delius Unicase":{"variants":[{"id":"400","name":"Normal 400"},{"id":"700","name":"Bold 700"}],"subsets":[{"id":"latin","name":"Latin"}]},"Della Respira":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Denk One":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Devonshire":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Didact Gothic":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"greek-ext","name":"Greek Extended"},{"id":"latin","name":"Latin"},{"id":"cyrillic-ext","name":"Cyrillic Extended"},{"id":"greek","name":"Greek"},{"id":"cyrillic","name":"Cyrillic"},{"id":"latin-ext","name":"Latin Extended"}]},"Diplomata":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Diplomata SC":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Domine":{"variants":[{"id":"400","name":"Normal 400"},{"id":"700","name":"Bold 700"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Donegal One":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Doppio One":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Dorsa":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Dosis":{"variants":[{"id":"200","name":"Light 200"},{"id":"300","name":"Book 300"},{"id":"400","name":"Normal 400"},{"id":"500","name":"Medium 500"},{"id":"600","name":"Semi-Bold 600"},{"id":"700","name":"Bold 700"},{"id":"800","name":"Extra-Bold 800"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Dr Sugiyama":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Droid Sans":{"variants":[{"id":"400","name":"Normal 400"},{"id":"700","name":"Bold 700"}],"subsets":[{"id":"latin","name":"Latin"}]},"Droid Sans Mono":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Droid Serif":{"variants":[{"id":"400","name":"Normal 400"},{"id":"italic","name":"Italic"},{"id":"700","name":"Bold 700"},{"id":"700italic","name":"Bold 700 Italic"}],"subsets":[{"id":"latin","name":"Latin"}]},"Duru Sans":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Dynalight":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"EB Garamond":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"vietnamese","name":"Vietnamese"},{"id":"latin","name":"Latin"},{"id":"cyrillic-ext","name":"Cyrillic Extended"},{"id":"cyrillic","name":"Cyrillic"},{"id":"latin-ext","name":"Latin Extended"}]},"Eagle Lake":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Eater":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Economica":{"variants":[{"id":"400","name":"Normal 400"},{"id":"italic","name":"Italic"},{"id":"700","name":"Bold 700"},{"id":"700italic","name":"Bold 700 Italic"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Electrolize":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Elsie":{"variants":[{"id":"400","name":"Normal 400"},{"id":"900","name":"Ultra-Bold 900"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Elsie Swash Caps":{"variants":[{"id":"400","name":"Normal 400"},{"id":"900","name":"Ultra-Bold 900"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Emblema One":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Emilys Candy":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Engagement":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Englebert":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Enriqueta":{"variants":[{"id":"400","name":"Normal 400"},{"id":"700","name":"Bold 700"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Erica One":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Esteban":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Euphoria Script":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Ewert":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Exo":{"variants":[{"id":"100","name":"Ultra-Light 100"},{"id":"200","name":"Light 200"},{"id":"300","name":"Book 300"},{"id":"400","name":"Normal 400"},{"id":"italic","name":"Italic"},{"id":"500","name":"Medium 500"},{"id":"600","name":"Semi-Bold 600"},{"id":"700","name":"Bold 700"},{"id":"800","name":"Extra-Bold 800"},{"id":"900","name":"Ultra-Bold 900"},{"id":"900italic","name":"Ultra-Bold 900 Italic"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Exo 2":{"variants":[{"id":"100","name":"Ultra-Light 100"},{"id":"200","name":"Light 200"},{"id":"300","name":"Book 300"},{"id":"400","name":"Normal 400"},{"id":"italic","name":"Italic"},{"id":"500","name":"Medium 500"},{"id":"600","name":"Semi-Bold 600"},{"id":"700","name":"Bold 700"},{"id":"800","name":"Extra-Bold 800"},{"id":"900","name":"Ultra-Bold 900"},{"id":"900italic","name":"Ultra-Bold 900 Italic"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"cyrillic","name":"Cyrillic"},{"id":"latin-ext","name":"Latin Extended"}]},"Expletus Sans":{"variants":[{"id":"400","name":"Normal 400"},{"id":"italic","name":"Italic"},{"id":"500","name":"Medium 500"},{"id":"600","name":"Semi-Bold 600"},{"id":"700","name":"Bold 700"},{"id":"700italic","name":"Bold 700 Italic"}],"subsets":[{"id":"latin","name":"Latin"}]},"Fanwood Text":{"variants":[{"id":"400","name":"Normal 400"},{"id":"italic","name":"Italic"}],"subsets":[{"id":"latin","name":"Latin"}]},"Fascinate":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Fascinate Inline":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Faster One":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Fasthand":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"khmer","name":"Khmer"}]},"Fauna One":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Federant":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Federo":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Felipa":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Fenix":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Finger Paint":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Fjalla One":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Fjord One":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Flamenco":{"variants":[{"id":"300","name":"Book 300"},{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Flavors":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Fondamento":{"variants":[{"id":"400","name":"Normal 400"},{"id":"italic","name":"Italic"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Fontdiner Swanky":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Forum":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"cyrillic-ext","name":"Cyrillic Extended"},{"id":"cyrillic","name":"Cyrillic"},{"id":"latin-ext","name":"Latin Extended"}]},"Francois One":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Freckle Face":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Fredericka the Great":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Fredoka One":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Freehand":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"khmer","name":"Khmer"}]},"Fresca":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Frijole":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Fruktur":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Fugaz One":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"GFS Didot":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"greek","name":"Greek"}]},"GFS Neohellenic":{"variants":[{"id":"400","name":"Normal 400"},{"id":"italic","name":"Italic"},{"id":"700","name":"Bold 700"},{"id":"700italic","name":"Bold 700 Italic"}],"subsets":[{"id":"greek","name":"Greek"}]},"Gabriela":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Gafata":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Galdeano":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Galindo":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Gentium Basic":{"variants":[{"id":"400","name":"Normal 400"},{"id":"italic","name":"Italic"},{"id":"700","name":"Bold 700"},{"id":"700italic","name":"Bold 700 Italic"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Gentium Book Basic":{"variants":[{"id":"400","name":"Normal 400"},{"id":"italic","name":"Italic"},{"id":"700","name":"Bold 700"},{"id":"700italic","name":"Bold 700 Italic"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Geo":{"variants":[{"id":"400","name":"Normal 400"},{"id":"italic","name":"Italic"}],"subsets":[{"id":"latin","name":"Latin"}]},"Geostar":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Geostar Fill":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Germania One":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Gilda Display":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Give You Glory":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Glass Antiqua":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Glegoo":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Gloria Hallelujah":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Goblin One":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Gochi Hand":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Gorditas":{"variants":[{"id":"400","name":"Normal 400"},{"id":"700","name":"Bold 700"}],"subsets":[{"id":"latin","name":"Latin"}]},"Goudy Bookletter 1911":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Graduate":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Grand Hotel":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Gravitas One":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Great Vibes":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Griffy":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Gruppo":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Gudea":{"variants":[{"id":"400","name":"Normal 400"},{"id":"italic","name":"Italic"},{"id":"700","name":"Bold 700"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Habibi":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Hammersmith One":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Hanalei":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Hanalei Fill":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Handlee":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Hanuman":{"variants":[{"id":"400","name":"Normal 400"},{"id":"700","name":"Bold 700"}],"subsets":[{"id":"khmer","name":"Khmer"}]},"Happy Monkey":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Headland One":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Henny Penny":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Herr Von Muellerhoff":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Holtwood One SC":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Homemade Apple":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Homenaje":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"IM Fell DW Pica":{"variants":[{"id":"400","name":"Normal 400"},{"id":"italic","name":"Italic"}],"subsets":[{"id":"latin","name":"Latin"}]},"IM Fell DW Pica SC":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"IM Fell Double Pica":{"variants":[{"id":"400","name":"Normal 400"},{"id":"italic","name":"Italic"}],"subsets":[{"id":"latin","name":"Latin"}]},"IM Fell Double Pica SC":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"IM Fell English":{"variants":[{"id":"400","name":"Normal 400"},{"id":"italic","name":"Italic"}],"subsets":[{"id":"latin","name":"Latin"}]},"IM Fell English SC":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"IM Fell French Canon":{"variants":[{"id":"400","name":"Normal 400"},{"id":"italic","name":"Italic"}],"subsets":[{"id":"latin","name":"Latin"}]},"IM Fell French Canon SC":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"IM Fell Great Primer":{"variants":[{"id":"400","name":"Normal 400"},{"id":"italic","name":"Italic"}],"subsets":[{"id":"latin","name":"Latin"}]},"IM Fell Great Primer SC":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Iceberg":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Iceland":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Imprima":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Inconsolata":{"variants":[{"id":"400","name":"Normal 400"},{"id":"700","name":"Bold 700"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Inder":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Indie Flower":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Inika":{"variants":[{"id":"400","name":"Normal 400"},{"id":"700","name":"Bold 700"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Irish Grover":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Istok Web":{"variants":[{"id":"400","name":"Normal 400"},{"id":"italic","name":"Italic"},{"id":"700","name":"Bold 700"},{"id":"700italic","name":"Bold 700 Italic"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"cyrillic-ext","name":"Cyrillic Extended"},{"id":"cyrillic","name":"Cyrillic"},{"id":"latin-ext","name":"Latin Extended"}]},"Italiana":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Italianno":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Jacques Francois":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Jacques Francois Shadow":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Jim Nightshade":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Jockey One":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Jolly Lodger":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Josefin Sans":{"variants":[{"id":"100","name":"Ultra-Light 100"},{"id":"300","name":"Book 300"},{"id":"400","name":"Normal 400"},{"id":"italic","name":"Italic"},{"id":"600","name":"Semi-Bold 600"},{"id":"700","name":"Bold 700"},{"id":"700italic","name":"Bold 700 Italic"}],"subsets":[{"id":"latin","name":"Latin"}]},"Josefin Slab":{"variants":[{"id":"100","name":"Ultra-Light 100"},{"id":"300","name":"Book 300"},{"id":"400","name":"Normal 400"},{"id":"italic","name":"Italic"},{"id":"600","name":"Semi-Bold 600"},{"id":"700","name":"Bold 700"},{"id":"700italic","name":"Bold 700 Italic"}],"subsets":[{"id":"latin","name":"Latin"}]},"Joti One":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Judson":{"variants":[{"id":"400","name":"Normal 400"},{"id":"italic","name":"Italic"},{"id":"700","name":"Bold 700"}],"subsets":[{"id":"latin","name":"Latin"}]},"Julee":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Julius Sans One":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Junge":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Jura":{"variants":[{"id":"300","name":"Book 300"},{"id":"400","name":"Normal 400"},{"id":"500","name":"Medium 500"},{"id":"600","name":"Semi-Bold 600"}],"subsets":[{"id":"greek-ext","name":"Greek Extended"},{"id":"latin","name":"Latin"},{"id":"cyrillic-ext","name":"Cyrillic Extended"},{"id":"greek","name":"Greek"},{"id":"cyrillic","name":"Cyrillic"},{"id":"latin-ext","name":"Latin Extended"}]},"Just Another Hand":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Just Me Again Down Here":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Kameron":{"variants":[{"id":"400","name":"Normal 400"},{"id":"700","name":"Bold 700"}],"subsets":[{"id":"latin","name":"Latin"}]},"Kantumruy":{"variants":[{"id":"300","name":"Book 300"},{"id":"400","name":"Normal 400"},{"id":"700","name":"Bold 700"}],"subsets":[{"id":"khmer","name":"Khmer"}]},"Karla":{"variants":[{"id":"400","name":"Normal 400"},{"id":"italic","name":"Italic"},{"id":"700","name":"Bold 700"},{"id":"700italic","name":"Bold 700 Italic"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Kaushan Script":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Kavoon":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Kdam Thmor":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"khmer","name":"Khmer"}]},"Keania One":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Kelly Slab":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"cyrillic","name":"Cyrillic"},{"id":"latin-ext","name":"Latin Extended"}]},"Kenia":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Khmer":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"khmer","name":"Khmer"}]},"Kite One":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Knewave":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Kotta One":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Koulen":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"khmer","name":"Khmer"}]},"Kranky":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Kreon":{"variants":[{"id":"300","name":"Book 300"},{"id":"400","name":"Normal 400"},{"id":"700","name":"Bold 700"}],"subsets":[{"id":"latin","name":"Latin"}]},"Kristi":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Krona One":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"La Belle Aurore":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Lancelot":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Lato":{"variants":[{"id":"100","name":"Ultra-Light 100"},{"id":"300","name":"Book 300"},{"id":"400","name":"Normal 400"},{"id":"italic","name":"Italic"},{"id":"700","name":"Bold 700"},{"id":"900","name":"Ultra-Bold 900"},{"id":"900italic","name":"Ultra-Bold 900 Italic"}],"subsets":[{"id":"latin","name":"Latin"}]},"League Script":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Leckerli One":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Ledger":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"cyrillic","name":"Cyrillic"},{"id":"latin-ext","name":"Latin Extended"}]},"Lekton":{"variants":[{"id":"400","name":"Normal 400"},{"id":"italic","name":"Italic"},{"id":"700","name":"Bold 700"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Lemon":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Libre Baskerville":{"variants":[{"id":"400","name":"Normal 400"},{"id":"italic","name":"Italic"},{"id":"700","name":"Bold 700"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Life Savers":{"variants":[{"id":"400","name":"Normal 400"},{"id":"700","name":"Bold 700"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Lilita One":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Lily Script One":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Limelight":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Linden Hill":{"variants":[{"id":"400","name":"Normal 400"},{"id":"italic","name":"Italic"}],"subsets":[{"id":"latin","name":"Latin"}]},"Lobster":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"cyrillic-ext","name":"Cyrillic Extended"},{"id":"cyrillic","name":"Cyrillic"},{"id":"latin-ext","name":"Latin Extended"}]},"Lobster Two":{"variants":[{"id":"400","name":"Normal 400"},{"id":"italic","name":"Italic"},{"id":"700","name":"Bold 700"},{"id":"700italic","name":"Bold 700 Italic"}],"subsets":[{"id":"latin","name":"Latin"}]},"Londrina Outline":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Londrina Shadow":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Londrina Sketch":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Londrina Solid":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Lora":{"variants":[{"id":"400","name":"Normal 400"},{"id":"italic","name":"Italic"},{"id":"700","name":"Bold 700"},{"id":"700italic","name":"Bold 700 Italic"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"cyrillic","name":"Cyrillic"},{"id":"latin-ext","name":"Latin Extended"}]},"Love Ya Like A Sister":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Loved by the King":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Lovers Quarrel":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Luckiest Guy":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Lusitana":{"variants":[{"id":"400","name":"Normal 400"},{"id":"700","name":"Bold 700"}],"subsets":[{"id":"latin","name":"Latin"}]},"Lustria":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Macondo":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Macondo Swash Caps":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Magra":{"variants":[{"id":"400","name":"Normal 400"},{"id":"700","name":"Bold 700"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Maiden Orange":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Mako":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Marcellus":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Marcellus SC":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Marck Script":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"cyrillic","name":"Cyrillic"},{"id":"latin-ext","name":"Latin Extended"}]},"Margarine":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Marko One":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Marmelad":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"cyrillic","name":"Cyrillic"},{"id":"latin-ext","name":"Latin Extended"}]},"Marvel":{"variants":[{"id":"400","name":"Normal 400"},{"id":"italic","name":"Italic"},{"id":"700","name":"Bold 700"},{"id":"700italic","name":"Bold 700 Italic"}],"subsets":[{"id":"latin","name":"Latin"}]},"Mate":{"variants":[{"id":"400","name":"Normal 400"},{"id":"italic","name":"Italic"}],"subsets":[{"id":"latin","name":"Latin"}]},"Mate SC":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Maven Pro":{"variants":[{"id":"400","name":"Normal 400"},{"id":"500","name":"Medium 500"},{"id":"700","name":"Bold 700"},{"id":"900","name":"Ultra-Bold 900"}],"subsets":[{"id":"latin","name":"Latin"}]},"McLaren":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Meddon":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"MedievalSharp":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Medula One":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Megrim":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Meie Script":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Merienda":{"variants":[{"id":"400","name":"Normal 400"},{"id":"700","name":"Bold 700"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Merienda One":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Merriweather":{"variants":[{"id":"300","name":"Book 300"},{"id":"400","name":"Normal 400"},{"id":"italic","name":"Italic"},{"id":"700","name":"Bold 700"},{"id":"900","name":"Ultra-Bold 900"},{"id":"900italic","name":"Ultra-Bold 900 Italic"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Merriweather Sans":{"variants":[{"id":"300","name":"Book 300"},{"id":"400","name":"Normal 400"},{"id":"italic","name":"Italic"},{"id":"700","name":"Bold 700"},{"id":"800","name":"Extra-Bold 800"},{"id":"800italic","name":"Extra-Bold 800 Italic"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Metal":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"khmer","name":"Khmer"}]},"Metal Mania":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Metamorphous":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Metrophobic":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Michroma":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Milonga":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Miltonian":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Miltonian Tattoo":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Miniver":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Miss Fajardose":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Modern Antiqua":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Molengo":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Molle":{"variants":[{"id":"italic","name":"Italic"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Monda":{"variants":[{"id":"400","name":"Normal 400"},{"id":"700","name":"Bold 700"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Monofett":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Monoton":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Monsieur La Doulaise":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Montaga":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Montez":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Montserrat":{"variants":[{"id":"400","name":"Normal 400"},{"id":"700","name":"Bold 700"}],"subsets":[{"id":"latin","name":"Latin"}]},"Montserrat Alternates":{"variants":[{"id":"400","name":"Normal 400"},{"id":"700","name":"Bold 700"}],"subsets":[{"id":"latin","name":"Latin"}]},"Montserrat Subrayada":{"variants":[{"id":"400","name":"Normal 400"},{"id":"700","name":"Bold 700"}],"subsets":[{"id":"latin","name":"Latin"}]},"Moul":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"khmer","name":"Khmer"}]},"Moulpali":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"khmer","name":"Khmer"}]},"Mountains of Christmas":{"variants":[{"id":"400","name":"Normal 400"},{"id":"700","name":"Bold 700"}],"subsets":[{"id":"latin","name":"Latin"}]},"Mouse Memoirs":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Mr Bedfort":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Mr Dafoe":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Mr De Haviland":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Mrs Saint Delafield":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Mrs Sheppards":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Muli":{"variants":[{"id":"300","name":"Book 300"},{"id":"400","name":"Normal 400"},{"id":"italic","name":"Italic"},{"id":"300italic","name":"Book 300 Italic"}],"subsets":[{"id":"latin","name":"Latin"}]},"Mystery Quest":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Neucha":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"cyrillic","name":"Cyrillic"}]},"Neuton":{"variants":[{"id":"200","name":"Light 200"},{"id":"300","name":"Book 300"},{"id":"400","name":"Normal 400"},{"id":"italic","name":"Italic"},{"id":"700","name":"Bold 700"},{"id":"800","name":"Extra-Bold 800"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"New Rocker":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"News Cycle":{"variants":[{"id":"400","name":"Normal 400"},{"id":"700","name":"Bold 700"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Niconne":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Nixie One":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Nobile":{"variants":[{"id":"400","name":"Normal 400"},{"id":"italic","name":"Italic"},{"id":"700","name":"Bold 700"},{"id":"700italic","name":"Bold 700 Italic"}],"subsets":[{"id":"latin","name":"Latin"}]},"Nokora":{"variants":[{"id":"400","name":"Normal 400"},{"id":"700","name":"Bold 700"}],"subsets":[{"id":"khmer","name":"Khmer"}]},"Norican":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Nosifer":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Nothing You Could Do":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Noticia Text":{"variants":[{"id":"400","name":"Normal 400"},{"id":"italic","name":"Italic"},{"id":"700","name":"Bold 700"},{"id":"700italic","name":"Bold 700 Italic"}],"subsets":[{"id":"vietnamese","name":"Vietnamese"},{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Noto Sans":{"variants":[{"id":"400","name":"Normal 400"},{"id":"italic","name":"Italic"},{"id":"700","name":"Bold 700"},{"id":"700italic","name":"Bold 700 Italic"}],"subsets":[{"id":"vietnamese","name":"Vietnamese"},{"id":"greek-ext","name":"Greek Extended"},{"id":"latin","name":"Latin"},{"id":"cyrillic-ext","name":"Cyrillic Extended"},{"id":"greek","name":"Greek"},{"id":"cyrillic","name":"Cyrillic"},{"id":"latin-ext","name":"Latin Extended"}]},"Noto Serif":{"variants":[{"id":"400","name":"Normal 400"},{"id":"italic","name":"Italic"},{"id":"700","name":"Bold 700"},{"id":"700italic","name":"Bold 700 Italic"}],"subsets":[{"id":"vietnamese","name":"Vietnamese"},{"id":"greek-ext","name":"Greek Extended"},{"id":"latin","name":"Latin"},{"id":"cyrillic-ext","name":"Cyrillic Extended"},{"id":"greek","name":"Greek"},{"id":"cyrillic","name":"Cyrillic"},{"id":"latin-ext","name":"Latin Extended"}]},"Nova Cut":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Nova Flat":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Nova Mono":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"greek","name":"Greek"}]},"Nova Oval":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Nova Round":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Nova Script":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Nova Slim":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Nova Square":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Numans":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Nunito":{"variants":[{"id":"300","name":"Book 300"},{"id":"400","name":"Normal 400"},{"id":"700","name":"Bold 700"}],"subsets":[{"id":"latin","name":"Latin"}]},"Odor Mean Chey":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"khmer","name":"Khmer"}]},"Offside":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Old Standard TT":{"variants":[{"id":"400","name":"Normal 400"},{"id":"italic","name":"Italic"},{"id":"700","name":"Bold 700"}],"subsets":[{"id":"latin","name":"Latin"}]},"Oldenburg":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Oleo Script":{"variants":[{"id":"400","name":"Normal 400"},{"id":"700","name":"Bold 700"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Oleo Script Swash Caps":{"variants":[{"id":"400","name":"Normal 400"},{"id":"700","name":"Bold 700"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Open Sans":{"variants":[{"id":"300","name":"Book 300"},{"id":"400","name":"Normal 400"},{"id":"italic","name":"Italic"},{"id":"600","name":"Semi-Bold 600"},{"id":"700","name":"Bold 700"},{"id":"800","name":"Extra-Bold 800"},{"id":"800italic","name":"Extra-Bold 800 Italic"}],"subsets":[{"id":"vietnamese","name":"Vietnamese"},{"id":"greek-ext","name":"Greek Extended"},{"id":"latin","name":"Latin"},{"id":"cyrillic-ext","name":"Cyrillic Extended"},{"id":"greek","name":"Greek"},{"id":"cyrillic","name":"Cyrillic"},{"id":"latin-ext","name":"Latin Extended"}]},"Open Sans Condensed":{"variants":[{"id":"300","name":"Book 300"},{"id":"700","name":"Bold 700"},{"id":"300italic","name":"Book 300 Italic"}],"subsets":[{"id":"vietnamese","name":"Vietnamese"},{"id":"greek-ext","name":"Greek Extended"},{"id":"latin","name":"Latin"},{"id":"cyrillic-ext","name":"Cyrillic Extended"},{"id":"greek","name":"Greek"},{"id":"cyrillic","name":"Cyrillic"},{"id":"latin-ext","name":"Latin Extended"}]},"Oranienbaum":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"cyrillic-ext","name":"Cyrillic Extended"},{"id":"cyrillic","name":"Cyrillic"},{"id":"latin-ext","name":"Latin Extended"}]},"Orbitron":{"variants":[{"id":"400","name":"Normal 400"},{"id":"500","name":"Medium 500"},{"id":"700","name":"Bold 700"},{"id":"900","name":"Ultra-Bold 900"}],"subsets":[{"id":"latin","name":"Latin"}]},"Oregano":{"variants":[{"id":"400","name":"Normal 400"},{"id":"italic","name":"Italic"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Orienta":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Original Surfer":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Oswald":{"variants":[{"id":"300","name":"Book 300"},{"id":"400","name":"Normal 400"},{"id":"700","name":"Bold 700"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Over the Rainbow":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Overlock":{"variants":[{"id":"400","name":"Normal 400"},{"id":"italic","name":"Italic"},{"id":"700","name":"Bold 700"},{"id":"900","name":"Ultra-Bold 900"},{"id":"900italic","name":"Ultra-Bold 900 Italic"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Overlock SC":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Ovo":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Oxygen":{"variants":[{"id":"300","name":"Book 300"},{"id":"400","name":"Normal 400"},{"id":"700","name":"Bold 700"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Oxygen Mono":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"PT Mono":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"cyrillic-ext","name":"Cyrillic Extended"},{"id":"cyrillic","name":"Cyrillic"},{"id":"latin-ext","name":"Latin Extended"}]},"PT Sans":{"variants":[{"id":"400","name":"Normal 400"},{"id":"italic","name":"Italic"},{"id":"700","name":"Bold 700"},{"id":"700italic","name":"Bold 700 Italic"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"cyrillic-ext","name":"Cyrillic Extended"},{"id":"cyrillic","name":"Cyrillic"},{"id":"latin-ext","name":"Latin Extended"}]},"PT Sans Caption":{"variants":[{"id":"400","name":"Normal 400"},{"id":"700","name":"Bold 700"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"cyrillic-ext","name":"Cyrillic Extended"},{"id":"cyrillic","name":"Cyrillic"},{"id":"latin-ext","name":"Latin Extended"}]},"PT Sans Narrow":{"variants":[{"id":"400","name":"Normal 400"},{"id":"700","name":"Bold 700"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"cyrillic-ext","name":"Cyrillic Extended"},{"id":"cyrillic","name":"Cyrillic"},{"id":"latin-ext","name":"Latin Extended"}]},"PT Serif":{"variants":[{"id":"400","name":"Normal 400"},{"id":"italic","name":"Italic"},{"id":"700","name":"Bold 700"},{"id":"700italic","name":"Bold 700 Italic"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"cyrillic-ext","name":"Cyrillic Extended"},{"id":"cyrillic","name":"Cyrillic"},{"id":"latin-ext","name":"Latin Extended"}]},"PT Serif Caption":{"variants":[{"id":"400","name":"Normal 400"},{"id":"italic","name":"Italic"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"cyrillic-ext","name":"Cyrillic Extended"},{"id":"cyrillic","name":"Cyrillic"},{"id":"latin-ext","name":"Latin Extended"}]},"Pacifico":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Paprika":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Parisienne":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Passero One":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Passion One":{"variants":[{"id":"400","name":"Normal 400"},{"id":"700","name":"Bold 700"},{"id":"900","name":"Ultra-Bold 900"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Pathway Gothic One":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Patrick Hand":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"vietnamese","name":"Vietnamese"},{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Patrick Hand SC":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"vietnamese","name":"Vietnamese"},{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Patua One":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Paytone One":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Peralta":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Permanent Marker":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Petit Formal Script":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Petrona":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Philosopher":{"variants":[{"id":"400","name":"Normal 400"},{"id":"italic","name":"Italic"},{"id":"700","name":"Bold 700"},{"id":"700italic","name":"Bold 700 Italic"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"cyrillic","name":"Cyrillic"}]},"Piedra":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Pinyon Script":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Pirata One":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Plaster":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Play":{"variants":[{"id":"400","name":"Normal 400"},{"id":"700","name":"Bold 700"}],"subsets":[{"id":"greek-ext","name":"Greek Extended"},{"id":"latin","name":"Latin"},{"id":"cyrillic-ext","name":"Cyrillic Extended"},{"id":"greek","name":"Greek"},{"id":"cyrillic","name":"Cyrillic"},{"id":"latin-ext","name":"Latin Extended"}]},"Playball":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Playfair Display":{"variants":[{"id":"400","name":"Normal 400"},{"id":"italic","name":"Italic"},{"id":"700","name":"Bold 700"},{"id":"900","name":"Ultra-Bold 900"},{"id":"900italic","name":"Ultra-Bold 900 Italic"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"cyrillic","name":"Cyrillic"},{"id":"latin-ext","name":"Latin Extended"}]},"Playfair Display SC":{"variants":[{"id":"400","name":"Normal 400"},{"id":"italic","name":"Italic"},{"id":"700","name":"Bold 700"},{"id":"900","name":"Ultra-Bold 900"},{"id":"900italic","name":"Ultra-Bold 900 Italic"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"cyrillic","name":"Cyrillic"},{"id":"latin-ext","name":"Latin Extended"}]},"Podkova":{"variants":[{"id":"400","name":"Normal 400"},{"id":"700","name":"Bold 700"}],"subsets":[{"id":"latin","name":"Latin"}]},"Poiret One":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"cyrillic","name":"Cyrillic"},{"id":"latin-ext","name":"Latin Extended"}]},"Poller One":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Poly":{"variants":[{"id":"400","name":"Normal 400"},{"id":"italic","name":"Italic"}],"subsets":[{"id":"latin","name":"Latin"}]},"Pompiere":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Pontano Sans":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Port Lligat Sans":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Port Lligat Slab":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Prata":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Preahvihear":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"khmer","name":"Khmer"}]},"Press Start 2P":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"greek","name":"Greek"},{"id":"cyrillic","name":"Cyrillic"},{"id":"latin-ext","name":"Latin Extended"}]},"Princess Sofia":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Prociono":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Prosto One":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"cyrillic","name":"Cyrillic"},{"id":"latin-ext","name":"Latin Extended"}]},"Puritan":{"variants":[{"id":"400","name":"Normal 400"},{"id":"italic","name":"Italic"},{"id":"700","name":"Bold 700"},{"id":"700italic","name":"Bold 700 Italic"}],"subsets":[{"id":"latin","name":"Latin"}]},"Purple Purse":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Quando":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Quantico":{"variants":[{"id":"400","name":"Normal 400"},{"id":"italic","name":"Italic"},{"id":"700","name":"Bold 700"},{"id":"700italic","name":"Bold 700 Italic"}],"subsets":[{"id":"latin","name":"Latin"}]},"Quattrocento":{"variants":[{"id":"400","name":"Normal 400"},{"id":"700","name":"Bold 700"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Quattrocento Sans":{"variants":[{"id":"400","name":"Normal 400"},{"id":"italic","name":"Italic"},{"id":"700","name":"Bold 700"},{"id":"700italic","name":"Bold 700 Italic"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Questrial":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Quicksand":{"variants":[{"id":"300","name":"Book 300"},{"id":"400","name":"Normal 400"},{"id":"700","name":"Bold 700"}],"subsets":[{"id":"latin","name":"Latin"}]},"Quintessential":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Qwigley":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Racing Sans One":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Radley":{"variants":[{"id":"400","name":"Normal 400"},{"id":"italic","name":"Italic"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Raleway":{"variants":[{"id":"100","name":"Ultra-Light 100"},{"id":"200","name":"Light 200"},{"id":"300","name":"Book 300"},{"id":"400","name":"Normal 400"},{"id":"500","name":"Medium 500"},{"id":"600","name":"Semi-Bold 600"},{"id":"700","name":"Bold 700"},{"id":"800","name":"Extra-Bold 800"},{"id":"900","name":"Ultra-Bold 900"}],"subsets":[{"id":"latin","name":"Latin"}]},"Raleway Dots":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Rambla":{"variants":[{"id":"400","name":"Normal 400"},{"id":"italic","name":"Italic"},{"id":"700","name":"Bold 700"},{"id":"700italic","name":"Bold 700 Italic"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Rammetto One":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Ranchers":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Rancho":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Rationale":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Redressed":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Reenie Beanie":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Revalia":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Ribeye":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Ribeye Marrow":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Righteous":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Risque":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Roboto":{"variants":[{"id":"100","name":"Ultra-Light 100"},{"id":"300","name":"Book 300"},{"id":"400","name":"Normal 400"},{"id":"italic","name":"Italic"},{"id":"500","name":"Medium 500"},{"id":"700","name":"Bold 700"},{"id":"900","name":"Ultra-Bold 900"},{"id":"900italic","name":"Ultra-Bold 900 Italic"}],"subsets":[{"id":"vietnamese","name":"Vietnamese"},{"id":"greek-ext","name":"Greek Extended"},{"id":"latin","name":"Latin"},{"id":"cyrillic-ext","name":"Cyrillic Extended"},{"id":"greek","name":"Greek"},{"id":"cyrillic","name":"Cyrillic"},{"id":"latin-ext","name":"Latin Extended"}]},"Roboto Condensed":{"variants":[{"id":"300","name":"Book 300"},{"id":"400","name":"Normal 400"},{"id":"italic","name":"Italic"},{"id":"700","name":"Bold 700"},{"id":"700italic","name":"Bold 700 Italic"}],"subsets":[{"id":"vietnamese","name":"Vietnamese"},{"id":"greek-ext","name":"Greek Extended"},{"id":"latin","name":"Latin"},{"id":"cyrillic-ext","name":"Cyrillic Extended"},{"id":"greek","name":"Greek"},{"id":"cyrillic","name":"Cyrillic"},{"id":"latin-ext","name":"Latin Extended"}]},"Roboto Slab":{"variants":[{"id":"100","name":"Ultra-Light 100"},{"id":"300","name":"Book 300"},{"id":"400","name":"Normal 400"},{"id":"700","name":"Bold 700"}],"subsets":[{"id":"vietnamese","name":"Vietnamese"},{"id":"greek-ext","name":"Greek Extended"},{"id":"latin","name":"Latin"},{"id":"cyrillic-ext","name":"Cyrillic Extended"},{"id":"greek","name":"Greek"},{"id":"cyrillic","name":"Cyrillic"},{"id":"latin-ext","name":"Latin Extended"}]},"Rochester":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Rock Salt":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Rokkitt":{"variants":[{"id":"400","name":"Normal 400"},{"id":"700","name":"Bold 700"}],"subsets":[{"id":"latin","name":"Latin"}]},"Romanesco":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Ropa Sans":{"variants":[{"id":"400","name":"Normal 400"},{"id":"italic","name":"Italic"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Rosario":{"variants":[{"id":"400","name":"Normal 400"},{"id":"italic","name":"Italic"},{"id":"700","name":"Bold 700"},{"id":"700italic","name":"Bold 700 Italic"}],"subsets":[{"id":"latin","name":"Latin"}]},"Rosarivo":{"variants":[{"id":"400","name":"Normal 400"},{"id":"italic","name":"Italic"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Rouge Script":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Ruda":{"variants":[{"id":"400","name":"Normal 400"},{"id":"700","name":"Bold 700"},{"id":"900","name":"Ultra-Bold 900"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Rufina":{"variants":[{"id":"400","name":"Normal 400"},{"id":"700","name":"Bold 700"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Ruge Boogie":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Ruluko":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Rum Raisin":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Ruslan Display":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"cyrillic-ext","name":"Cyrillic Extended"},{"id":"cyrillic","name":"Cyrillic"},{"id":"latin-ext","name":"Latin Extended"}]},"Russo One":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"cyrillic","name":"Cyrillic"},{"id":"latin-ext","name":"Latin Extended"}]},"Ruthie":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Rye":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Sacramento":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Sail":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Salsa":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Sanchez":{"variants":[{"id":"400","name":"Normal 400"},{"id":"italic","name":"Italic"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Sancreek":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Sansita One":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Sarina":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Satisfy":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Scada":{"variants":[{"id":"400","name":"Normal 400"},{"id":"italic","name":"Italic"},{"id":"700","name":"Bold 700"},{"id":"700italic","name":"Bold 700 Italic"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"cyrillic","name":"Cyrillic"},{"id":"latin-ext","name":"Latin Extended"}]},"Schoolbell":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Seaweed Script":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Sevillana":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Seymour One":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"cyrillic","name":"Cyrillic"},{"id":"latin-ext","name":"Latin Extended"}]},"Shadows Into Light":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Shadows Into Light Two":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Shanti":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Share":{"variants":[{"id":"400","name":"Normal 400"},{"id":"italic","name":"Italic"},{"id":"700","name":"Bold 700"},{"id":"700italic","name":"Bold 700 Italic"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Share Tech":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Share Tech Mono":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Shojumaru":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Short Stack":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Siemreap":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"khmer","name":"Khmer"}]},"Sigmar One":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Signika":{"variants":[{"id":"300","name":"Book 300"},{"id":"400","name":"Normal 400"},{"id":"600","name":"Semi-Bold 600"},{"id":"700","name":"Bold 700"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Signika Negative":{"variants":[{"id":"300","name":"Book 300"},{"id":"400","name":"Normal 400"},{"id":"600","name":"Semi-Bold 600"},{"id":"700","name":"Bold 700"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Simonetta":{"variants":[{"id":"400","name":"Normal 400"},{"id":"italic","name":"Italic"},{"id":"900","name":"Ultra-Bold 900"},{"id":"900italic","name":"Ultra-Bold 900 Italic"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Sintony":{"variants":[{"id":"400","name":"Normal 400"},{"id":"700","name":"Bold 700"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Sirin Stencil":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Six Caps":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Skranji":{"variants":[{"id":"400","name":"Normal 400"},{"id":"700","name":"Bold 700"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Slackey":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Smokum":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Smythe":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Sniglet":{"variants":[{"id":"400","name":"Normal 400"},{"id":"800","name":"Extra-Bold 800"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Snippet":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Snowburst One":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Sofadi One":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Sofia":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Sonsie One":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Sorts Mill Goudy":{"variants":[{"id":"400","name":"Normal 400"},{"id":"italic","name":"Italic"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Source Code Pro":{"variants":[{"id":"200","name":"Light 200"},{"id":"300","name":"Book 300"},{"id":"400","name":"Normal 400"},{"id":"500","name":"Medium 500"},{"id":"600","name":"Semi-Bold 600"},{"id":"700","name":"Bold 700"},{"id":"900","name":"Ultra-Bold 900"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Source Sans Pro":{"variants":[{"id":"200","name":"Light 200"},{"id":"300","name":"Book 300"},{"id":"400","name":"Normal 400"},{"id":"italic","name":"Italic"},{"id":"600","name":"Semi-Bold 600"},{"id":"700","name":"Bold 700"},{"id":"900","name":"Ultra-Bold 900"},{"id":"900italic","name":"Ultra-Bold 900 Italic"}],"subsets":[{"id":"vietnamese","name":"Vietnamese"},{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Special Elite":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Spicy Rice":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Spinnaker":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Spirax":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Squada One":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Stalemate":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Stalinist One":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"cyrillic","name":"Cyrillic"},{"id":"latin-ext","name":"Latin Extended"}]},"Stardos Stencil":{"variants":[{"id":"400","name":"Normal 400"},{"id":"700","name":"Bold 700"}],"subsets":[{"id":"latin","name":"Latin"}]},"Stint Ultra Condensed":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Stint Ultra Expanded":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Stoke":{"variants":[{"id":"300","name":"Book 300"},{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Strait":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Sue Ellen Francisco":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Sunshiney":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Supermercado One":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Suwannaphum":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"khmer","name":"Khmer"}]},"Swanky and Moo Moo":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Syncopate":{"variants":[{"id":"400","name":"Normal 400"},{"id":"700","name":"Bold 700"}],"subsets":[{"id":"latin","name":"Latin"}]},"Tangerine":{"variants":[{"id":"400","name":"Normal 400"},{"id":"700","name":"Bold 700"}],"subsets":[{"id":"latin","name":"Latin"}]},"Taprom":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"khmer","name":"Khmer"}]},"Tauri":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Telex":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Tenor Sans":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"cyrillic-ext","name":"Cyrillic Extended"},{"id":"cyrillic","name":"Cyrillic"},{"id":"latin-ext","name":"Latin Extended"}]},"Text Me One":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"The Girl Next Door":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Tienne":{"variants":[{"id":"400","name":"Normal 400"},{"id":"700","name":"Bold 700"},{"id":"900","name":"Ultra-Bold 900"}],"subsets":[{"id":"latin","name":"Latin"}]},"Tinos":{"variants":[{"id":"400","name":"Normal 400"},{"id":"italic","name":"Italic"},{"id":"700","name":"Bold 700"},{"id":"700italic","name":"Bold 700 Italic"}],"subsets":[{"id":"vietnamese","name":"Vietnamese"},{"id":"greek-ext","name":"Greek Extended"},{"id":"latin","name":"Latin"},{"id":"cyrillic-ext","name":"Cyrillic Extended"},{"id":"greek","name":"Greek"},{"id":"cyrillic","name":"Cyrillic"},{"id":"latin-ext","name":"Latin Extended"}]},"Titan One":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Titillium Web":{"variants":[{"id":"200","name":"Light 200"},{"id":"300","name":"Book 300"},{"id":"400","name":"Normal 400"},{"id":"italic","name":"Italic"},{"id":"600","name":"Semi-Bold 600"},{"id":"700","name":"Bold 700"},{"id":"900","name":"Ultra-Bold 900"},{"id":"700italic","name":"Bold 700 Italic"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Trade Winds":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Trocchi":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Trochut":{"variants":[{"id":"400","name":"Normal 400"},{"id":"italic","name":"Italic"},{"id":"700","name":"Bold 700"}],"subsets":[{"id":"latin","name":"Latin"}]},"Trykker":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Tulpen One":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Ubuntu":{"variants":[{"id":"300","name":"Book 300"},{"id":"400","name":"Normal 400"},{"id":"italic","name":"Italic"},{"id":"500","name":"Medium 500"},{"id":"700","name":"Bold 700"},{"id":"700italic","name":"Bold 700 Italic"}],"subsets":[{"id":"greek-ext","name":"Greek Extended"},{"id":"latin","name":"Latin"},{"id":"cyrillic-ext","name":"Cyrillic Extended"},{"id":"greek","name":"Greek"},{"id":"cyrillic","name":"Cyrillic"},{"id":"latin-ext","name":"Latin Extended"}]},"Ubuntu Condensed":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"greek-ext","name":"Greek Extended"},{"id":"latin","name":"Latin"},{"id":"cyrillic-ext","name":"Cyrillic Extended"},{"id":"greek","name":"Greek"},{"id":"cyrillic","name":"Cyrillic"},{"id":"latin-ext","name":"Latin Extended"}]},"Ubuntu Mono":{"variants":[{"id":"400","name":"Normal 400"},{"id":"italic","name":"Italic"},{"id":"700","name":"Bold 700"},{"id":"700italic","name":"Bold 700 Italic"}],"subsets":[{"id":"greek-ext","name":"Greek Extended"},{"id":"latin","name":"Latin"},{"id":"cyrillic-ext","name":"Cyrillic Extended"},{"id":"greek","name":"Greek"},{"id":"cyrillic","name":"Cyrillic"},{"id":"latin-ext","name":"Latin Extended"}]},"Ultra":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Uncial Antiqua":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Underdog":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"cyrillic","name":"Cyrillic"},{"id":"latin-ext","name":"Latin Extended"}]},"Unica One":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"UnifrakturCook":{"variants":[{"id":"700","name":"Bold 700"}],"subsets":[{"id":"latin","name":"Latin"}]},"UnifrakturMaguntia":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Unkempt":{"variants":[{"id":"400","name":"Normal 400"},{"id":"700","name":"Bold 700"}],"subsets":[{"id":"latin","name":"Latin"}]},"Unlock":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Unna":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"VT323":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Vampiro One":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Varela":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Varela Round":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Vast Shadow":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Vibur":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Vidaloka":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Viga":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Voces":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Volkhov":{"variants":[{"id":"400","name":"Normal 400"},{"id":"italic","name":"Italic"},{"id":"700","name":"Bold 700"},{"id":"700italic","name":"Bold 700 Italic"}],"subsets":[{"id":"latin","name":"Latin"}]},"Vollkorn":{"variants":[{"id":"400","name":"Normal 400"},{"id":"italic","name":"Italic"},{"id":"700","name":"Bold 700"},{"id":"700italic","name":"Bold 700 Italic"}],"subsets":[{"id":"latin","name":"Latin"}]},"Voltaire":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Waiting for the Sunrise":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Wallpoet":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Walter Turncoat":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Warnes":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Wellfleet":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Wendy One":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Wire One":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Yanone Kaffeesatz":{"variants":[{"id":"200","name":"Light 200"},{"id":"300","name":"Book 300"},{"id":"400","name":"Normal 400"},{"id":"700","name":"Bold 700"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"latin-ext","name":"Latin Extended"}]},"Yellowtail":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Yeseva One":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"},{"id":"cyrillic","name":"Cyrillic"},{"id":"latin-ext","name":"Latin Extended"}]},"Yesteryear":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]},"Zeyada":{"variants":[{"id":"400","name":"Normal 400"}],"subsets":[{"id":"latin","name":"Latin"}]}}', true);
            $normal_fonts    = array(
                "Arial, Helvetica, sans-serif" => "Arial, Helvetica, sans-serif",
                "'Arial Black', Gadget, sans-serif" => "'Arial Black', Gadget, sans-serif",
                "'Bookman Old Style', serif" => "'Bookman Old Style', serif",
                "'Comic Sans MS', cursive" => "'Comic Sans MS', cursive",
                "Courier, monospace" => "Courier, monospace",
                "Garamond, serif" => "Garamond, serif",
                "Georgia, serif" => "Georgia, serif",
                "Impact, Charcoal, sans-serif" => "Impact, Charcoal, sans-serif",
                "'Lucida Console', Monaco, monospace" => "'Lucida Console', Monaco, monospace",
                "'Lucida Sans Unicode', 'Lucida Grande', sans-serif" => "'Lucida Sans Unicode', 'Lucida Grande', sans-serif",
                "'MS Sans Serif', Geneva, sans-serif" => "'MS Sans Serif', Geneva, sans-serif",
                "'MS Serif', 'New York', sans-serif" => "'MS Serif', 'New York', sans-serif",
                "'Palatino Linotype', 'Book Antiqua', Palatino, serif" => "'Palatino Linotype', 'Book Antiqua', Palatino, serif",
                "Tahoma,Geneva, sans-serif" => "Tahoma, Geneva, sans-serif",
                "'Times New Roman', Times,serif" => "'Times New Roman', Times, serif",
                "'Trebuchet MS', Helvetica, sans-serif" => "'Trebuchet MS', Helvetica, sans-serif",
                "Verdana, Geneva, sans-serif" => "Verdana, Geneva, sans-serif"
            );

		$output = '';
		if ( (qa_clicked('it_reset_button')) ){
			it_reset_theme_options();
		}
		if ( (qa_clicked('it_save_button')) && ($this->added==false) ){
                // General
                qa_opt('logo_url', qa_post_text('it_logo_field'));
				if(!empty(qa_post_text('it_logo_field')))
					qa_opt('logo_show', true);
                qa_opt('it_favicon_url', qa_post_text('it_favicon_field'));
				qa_opt('it_infinite_scroll_home_enable', (int)qa_post_text('it_infinite_scroll_home_enable') );
				qa_opt('it_infinite_scroll_qa_enable', (int)qa_post_text('it_infinite_scroll_qa_enable') );
				qa_opt('it_infinite_scroll_auto_enable', (int)qa_post_text('it_infinite_scroll_auto_enable') );
				qa_opt('it_social_share_qa_enable', (int)qa_post_text('it_social_share_qa_enable') );
				qa_opt('it_excerpt_field_enable', (int)qa_post_text('it_excerpt_field_enable') );
				qa_opt('it_excerpt_access_level', (int)qa_post_text('it_excerpt_access_level') );
				qa_opt('it_excerpt_field_length', (int)qa_post_text('it_excerpt_field_length') );
				qa_opt('it_excerpt_pos_ask', (int)qa_post_text('it_excerpt_pos_ask') );
				qa_opt('it_excerpt_pos_edit', (int)qa_post_text('it_excerpt_pos_edit') );
                qa_opt('it_cat_advanced_enable', (int)qa_post_text('it_cat_advanced_enable'));
				if(qa_post_text('it_cat_advanced_enable'))
					qa_opt('allow_no_category', true);
				qa_opt('it_cat_pos_ask', (int)qa_post_text('it_cat_pos_ask') );
				qa_opt('it_cat_pos_edit', (int)qa_post_text('it_cat_pos_edit') );
				qa_opt('it_feature_img_enable', (int)qa_post_text('it_feature_img_enable') );
				qa_opt('it_featured_url_abs', qa_post_text('it_featured_url_abs') );

                // Layout
                qa_opt('it_nav_fixed', (bool) qa_post_text('it_nav_fixed'));
                qa_opt('it_enble_back_to_top', (bool) qa_post_text('it_enble_back_to_top'));
                qa_opt('it_enable_except', (bool) qa_post_text('it_enable_except'));
                qa_opt('it_except_len', (int) qa_post_text('it_except_len'));
                qa_opt('it_layout_lists', qa_post_text('it_layout_lists'));
                qa_opt('it_layout_choose', (bool)qa_post_text('it_layout_choose'));
                
                // Styling
                qa_opt('it_bg_select', qa_post_text('it_bg_select'));
                qa_opt('it_bg_color', qa_post_text('it_bg_color'));
                qa_opt('it_text_color', qa_post_text('it_text_color'));
                qa_opt('it_border_color', qa_post_text('it_border_color'));
                qa_opt('it_q_link_color', qa_post_text('it_q_link_color'));
                qa_opt('it_q_link_hover_color', qa_post_text('it_q_link_hover_color'));
                qa_opt('it_nav_link_color', qa_post_text('it_nav_link_color'));
                qa_opt('it_nav_link_color_hover', qa_post_text('it_nav_link_color_hover'));
                qa_opt('it_subnav_link_color', qa_post_text('it_subnav_link_color'));
                qa_opt('it_subnav_link_color_hover', qa_post_text('it_subnav_link_color_hover'));
                qa_opt('it_link_color', qa_post_text('it_link_color'));
                qa_opt('it_link_hover_color', qa_post_text('it_link_hover_color'));
                qa_opt('it_highlight_color', qa_post_text('it_highlight_color'));
                qa_opt('it_highlight_bg_color', qa_post_text('it_highlight_bg_color'));
                require_once($this->theme_directory . 'it-styles.php'); // Generate customized CSS styling				
                qa_opt('it_custom_css', qa_post_text('it_custom_css'));
				
                // Typography
                $typo_options = $_POST['typo_option'];
                $google_fonts = array();
                foreach ($typo_options as $k => $options) {
                    qa_opt('typo_options_family_' . $k, $options['family']);
                    qa_opt('typo_options_style_' . $k, $options['style']);
                    qa_opt('typo_options_size_' . $k, $options['size']);
                    qa_opt('typo_options_linehight_' . $k, $options['linehight']);
                    if ((isset($google_webfonts[$options['family']])) && (!(in_array($options['family'], $google_fonts)))){
                        $google_fonts[] = $options['family'];
						qa_opt('typo_options_backup_' . $k, $options['backup']);
					}else{
						qa_opt('typo_options_backup_' . $k, '');
					}
                }
                qa_opt('it_typo_googlefonts', json_encode($google_fonts));
                
				$output .= '<div class="qa-form-tall-ok">User was successfully added.</div>';
				$this->added = true;
		}else{
				$this->added = false;
		}
		
		$ask_order = qa_opt('it_ask_order');
		$edit_order = qa_opt('it_edit_order');
		$it_featured_url = qa_opt('it_featured_url');
		$excerpt_ask_order = qa_opt('excerpt_ask_order');
		$excerpt_edit_order = qa_opt('excerpt_edit_order');
		$excerpt_length = qa_opt('excerpt_length');
			// Load excerpt access
			$excerpt_access_level = qa_opt('it_excerpt_access_level');
			$permitoptions=qa_admin_permit_options(QA_PERMIT_USERS, QA_PERMIT_SUPERS, false, false);
			$list_options = '';
			foreach($permitoptions as $level => $level_title){
				$list_options .= '<option value="' . $level . '"' . (($level == $excerpt_access_level) ? ' selected' : '') . '>' . $level_title . '</option>';
			}
			$excerpt_access_select = '<select id="it_" name="it_excerpt_access_level" class="qa-form-wide-select">' . $list_options . '</select>';
			 
            // Background list
            // List of Backgrounds
            $p_path       = $this->theme_directory . 'images/patterns';
            $bg_images    = array();
            $list_options = '';
            $files        = scandir($p_path, 1);
            $list_options .= '<option value="bg_default"' . ((qa_opt('it_bg_select') == 'bg_default') ? ' selected' : '') . '>Default Background</option>';
            $list_options .= '<option value="bg_color"' . ((qa_opt('it_bg_select') == 'bg_color') ? ' selected' : '') . '>only use Background Color</option>';
            //@$bg_images[qa_opt('qat_bg_image_index')
            foreach ($files as $file)
                if (!((empty($file)) or ($file == '.') or ($file == '..'))) {
                    $image       = preg_replace("/\\.[^.]*$/", "", $file);
                    $bg_images[] = $image;
                    $list_options .= '<option value="' . $image . '"' . ((qa_opt('it_bg_select') == $image) ? ' selected' : '') . '>' . $image . '</option>';
                }
            $bg_select               = '<select id="it_bg_select" name="it_bg_select" class="qa-form-wide-select">' . $list_options . '</select>';

		$output .= '
<form class="form-horizontal" enctype="multipart/form-data" method="post">
	<div class="qa-part-tabs-nav">
		<ul class="option-tabs nav nav-tabs" role="tablist">
			<li role="presentation" class="active">
				<a href="#" data-toggle=".qa-part-form-tc-general">General</a>
			</li>
			<li role="presentation">
				<a href="#" data-toggle=".qa-part-form-tc-layout">Layouts</a>
			</li>
			<li role="presentation">
				<a href="#" data-toggle=".qa-part-form-tc-styling">Styling</a>
			</li>
			<li role="presentation">
				<a href="#" data-toggle=".qa-part-form-tc-typo">Typography</a>
			</li>
		</ul>
	</div>
	<div class="qa-part-form-tc-general">
		<h3>General Settings</h3>
		<h4>Logo</h4>
		<table class="qa-form-tall-table options-table">
			<tbody>
				<tr>
					<th class="qa-form-tall-label">
						Logo
						<span class="description">Upload your own logo(35px hight is recommended)</span>
					</th>
					<td class="qa-form-tall-data">
						' . (qa_opt('logo_url') ? '<img id="logo-preview" class="logo-preview img-thumbnail" src="' . qa_opt('logo_url') . '">' : '<img id="logo-preview" class="logo-preview img-thumbnail" style="display:none;" src="">') . '
						<div id="logo_uploader">Upload</div>
						<input id="it_logo_field" type="hidden" name="it_logo_field" value="' . qa_opt('logo_url') . '">
					</td>
				</tr>
				<tr>
					<th class="qa-form-tall-label">
						Favicon
						<span class="description">favicon image (32px32px).</span>
					</th>
					<td class="qa-form-tall-data">
						' . (qa_opt('it_favicon_url') ? '<img id="favicon-preview" class="favicon-preview img-thumbnail" src="' . qa_opt('it_favicon_url') . '">' : '<img id="favicon-preview" class="favicon-preview img-thumbnail" style="display:none;" src="">') . '
						<div id="favicon_uploader">Upload</div>
						<input id="it_favicon_field" type="hidden" name="it_favicon_field" value="' . qa_opt('it_favicon_url') . '">
					</td>
				</tr>
			</tbody>
		</table>
		<h4>Infinite Scroll</h4>
		<table class="qa-form-tall-table options-table">
			<tbody>
				<tr>
					<th class="qa-form-tall-label">
						Enable Infinite Scroll in Home Page 
						<span class="description">Replaces \'Home Page\' suggestion section at the end of page with infinite scroll button</span>
					</th>
					<td class="qa-form-tall-data">
						<div class="on-off-checkbox-container">
								<input type="checkbox" class="on-off-checkbox" value="1"' . (qa_opt('it_infinite_scroll_home_enable') ? ' checked=""' : '') . ' id="it_infinite_scroll_home_enable" name="it_infinite_scroll_home_enable">
							<label for="it_infinite_scroll_home_enable">
							</label>
						</div>
					</td>
				</tr>
				<tr>
					<th class="qa-form-tall-label">
						Enable Infinite Scroll in question lists 
						<span class="description">Replaces page numbers with Infinite Scroll</span>
					</th>
					<td class="qa-form-tall-data">
						<div class="on-off-checkbox-container">
								<input type="checkbox" class="on-off-checkbox" value="1"' . (qa_opt('it_infinite_scroll_qa_enable') ? ' checked=""' : '') . ' id="it_infinite_scroll_qa_enable" name="it_infinite_scroll_qa_enable">
							<label for="it_infinite_scroll_qa_enable">
							</label>
						</div>
					</td>
				</tr>
				<tr>
					<th class="qa-form-tall-label">
						Enable Auto load with Infinite Scroll
						<span class="description">Post items will be loaded when user reaches end of page</span>
					</th>
					<td class="qa-form-tall-data">
						<div class="on-off-checkbox-container">
								<input type="checkbox" class="on-off-checkbox" value="1"' . (qa_opt('it_infinite_scroll_auto_enable') ? ' checked=""' : '') . ' id="it_infinite_scroll_auto_enable" name="it_infinite_scroll_auto_enable">
							<label for="it_infinite_scroll_auto_enable">
							</label>
						</div>
					</td>
				</tr>
			</tbody>
		</table>
		<h4>Social Sharing</h4>
		<table class="qa-form-tall-table options-table">
			<tbody>
				<tr>
					<th class="qa-form-tall-label">
						Enable Social Sharing in question list
						<span class="description">Social Sharing button will be added to question lists</span>
					</th>
					<td class="qa-form-tall-data">
						<div class="on-off-checkbox-container">
								<input type="checkbox" class="on-off-checkbox" value="1"' . (qa_opt('it_social_share_qa_enable') ? ' checked=""' : '') . ' id="it_social_share_qa_enable" name="it_social_share_qa_enable">
							<label for="it_social_share_qa_enable">
							</label>
						</div>
					</td>
				</tr>
			</tbody>
		</table>			
		<h3>Ask & Edit question forms</h3>
		<h4>Excerpt Field</h4>
		<table class="qa-form-tall-table options-table">
			<tbody>
				<tr>
					<th class="qa-form-tall-label">
						Enable Excerpt field 
						<span class="description">Adds a new field for question except</span>
					</th>
					<td class="qa-form-tall-data">
						<div class="on-off-checkbox-container">
								<input type="checkbox" class="on-off-checkbox" value="1"' . (qa_opt('it_excerpt_field_enable') ? ' checked=""' : '') . ' id="it_excerpt_field_enable" name="it_excerpt_field_enable">
							<label for="it_excerpt_field_enable">
							</label>
						</div>
					</td>
				</tr>
				<tr>
					<th class="qa-form-tall-label">
						Excerpt field access
						<span class="description">Upload your Small logo for mobile devices</span>
					</th>
					<td class="qa-form-tall-data">
						' . $excerpt_access_select . '
					</td>
				</tr>
				<tr>
					<th class="qa-form-tall-label">
						Maximum Length of Excerpt Field 
						<span class="description">This does not apply to administrators</span>
					</th>
					<td class="qa-form-tall-data">
						<div class="input-group font-input">
							<input id="it_excerpt_field_length" class="form-control" type="text" value="' . qa_opt('it_excerpt_field_length') . '" name="it_excerpt_field_length">
							<span class="input-group-addon">Characters</span>
						</div>
					</td>
				</tr>
				<tr>
					<th class="qa-form-tall-label">
						Excerpt Field position in Ask form
						<span class="description">it\'s suggested that you set it to \'1\' and add one by one until the field\'s position is desirable for you</span>
					</th>
					<td class="qa-form-tall-data">
						<input id="it_excerpt_pos_ask" class="form-control" type="text" value="' . qa_opt('it_excerpt_pos_ask') . '" name="it_excerpt_pos_ask">
					</td>
				</tr>
				<tr>
					<th class="qa-form-tall-label">
						Excerpt Field position in Edit form
						<span class="description">it\'s suggested that you set it to \'1\' and add one by one until the field\'s position is desirable for you</span>
					</th>
					<td class="qa-form-tall-data">
						<input id="it_excerpt_pos_edit" class="form-control" type="text" value="' . qa_opt('it_excerpt_pos_edit') . '" name="it_excerpt_pos_edit">
					</td>
				</tr>
			</tbody>
		</table>
		<h4>Advanced Category Field</h4>
		<table class="qa-form-tall-table options-table">
			<tbody>
			<div class="alert alert-danger" role="alert">
				<span class="fa fa-exclamation" aria-hidden="true"></span>
				<span class="sr-only">Error:</span>
				Limitation & Features for using Advanced Category Field:
				<ul>
					<li>only works with first level categories(No Sub-Categories)</li>
					<li>User must be able to select no categories</li>
					<li>User will be able to create categories while asking questions</li>
					<li>Administrator will be able to add icons or detail to each category in "admin > categories" page</li>
				</ul>
			</div>
				<tr>
					<th class="qa-form-tall-label">
						Enable Advanced Category
						<span class="description">By enabling this option you will be able to set category icon and description and see them when choosing categories</span>
					</th>
					<td class="qa-form-tall-data">
						<div class="on-off-checkbox-container">
							<input type="checkbox" class="on-off-checkbox" value="1"' . (qa_opt('it_cat_advanced_enable') ? ' checked=""' : '') . ' id="it_cat_advanced_enable" name="it_cat_advanced_enable">
							<label for="it_cat_advanced_enable"></label>
						</div>
					</td>
				</tr>
				<tr>
					<th class="qa-form-tall-label">
						Category Field position in Ask form
						<span class="description">it\'s suggested that you set it to \'1\' and add one by one until the field\'s position is desirable for you</span>
					</th>
					<td class="qa-form-tall-data">
						<input id="it_cat_pos_ask" class="form-control" type="text" value="' . qa_opt('it_cat_pos_ask') . '" name="it_cat_pos_ask">
					</td>
				</tr>
				<tr>
					<th class="qa-form-tall-label">
						Category Field position in Edit form
						<span class="description">it\'s suggested that you set it to \'1\' and add one by one until the field\'s position is desirable for you</span>
					</th>
					<td class="qa-form-tall-data">
						<input id="it_cat_pos_edit" class="form-control" type="text" value="' . qa_opt('it_cat_pos_edit') . '" name="it_cat_pos_edit">
					</td>
				</tr>
			</tbody>
		</table>
		<h4>Featured image</h4>
		<table class="qa-form-tall-table options-table">
			<tbody>
				<tr>
					<th class="qa-form-tall-label">
						Enable Featured image
						<span class="description">By enabling this option a new field will be added to allow users to add featured images to questions</span>
					</th>
					<td class="qa-form-tall-data">
						<div class="on-off-checkbox-container">
							<input type="checkbox" class="on-off-checkbox" value="1"' . (qa_opt('it_feature_img_enable') ? ' checked=""' : '') . ' id="it_feature_img_enable" name="it_feature_img_enable">
							<label for="it_feature_img_enable"></label>
						</div>
					</td>
				</tr>
				<tr>
					<th class="qa-form-tall-label">
						Path to Featured Image
						<span class="description">absolute path to your upload directory\'s url</span>
					</th>
					<td class="qa-form-tall-data">
						<input id="it_featured_url_abs" class="form-control" type="text" value="' . qa_opt('it_featured_url_abs') . '" name="it_featured_url_abs">
					</td>
				</tr>
			</tbody>
		</table>
	</div>
	<div class="qa-part-form-tc-layout">
		<h3>Layout Settings</h3>
		<table class="qa-form-tall-table options-table">
			<tbody>
				<tr>
					<th class="qa-form-tall-label">
						Fixed Navigation
					</th>
					<td class="qa-form-tall-label">
						<div class="on-off-checkbox-container">
								<input type="checkbox" class="on-off-checkbox" value="1"' . (qa_opt('it_nav_fixed') ? ' checked=""' : '') . ' id="it_nav_fixed" name="it_nav_fixed">
								<label for="it_nav_fixed"></label>
						</div>
					</td>
				</tr>
			</tbody>
			<tbody>
				<tr>
					<th class="qa-form-tall-label">
						Back to Top Button
						<span class="description">Enable Back to Top</span>
					</th>
					<td class="qa-form-tall-label">
						<div class="on-off-checkbox-container">
								<input type="checkbox" class="on-off-checkbox" value="1"' . (qa_opt('it_enble_back_to_top') ? ' checked=""' : '') . ' id="it_enble_back_to_top" name="it_enble_back_to_top">
							<label for="it_enble_back_to_top">
							</label>
						</div>
					</td>
				</tr>
			</tbody>
			<tbody>
				<tr><td><h3>Question Lists</h3></td></tr>
				<tr>
					<th class="qa-form-tall-label">
						Excerpt from question
						<span class="description">If question excerpt is not added it\'ll be extracted from question content</span>
					</th>
					<td class="qa-form-tall-label">
						<div class="on-off-checkbox-container">
								<input type="checkbox" class="on-off-checkbox" value="1"' . (qa_opt('it_enable_except') ? ' checked=""' : '') . ' id="it_enable_except" name="it_enable_except">
								<label for="it_enable_except"></label>
						</div>
					</td>
				</tr>
				<tr id="it_except_length">
					<th class="qa-form-tall-label">
						Excerpt Length
						<span class="description">Length of questions description in question lists</span>
					</th>
					<td class="qa-form-tall-label">
						<div class="input-group font-input">
							<input id="it_excerpt_field_length" class="form-control" type="text" value="' . qa_opt('it_except_len') . '" name="it_except_len">
							<span class="input-group-addon">Characters</span>
						</div>
					</td>
				</tr>
			</tbody>
			<tbody>
				<tr>
					<th class="qa-form-tall-label">
						List Layout
						<span class="description">Toggle default list layout</span>
					</th>
					<td class="qa-form-tall-label">
						<input class="theme-option-radio" type="radio"' . (qa_opt('it_layout_lists') == 'masonry' ? ' checked=""' : '') . ' id="it_layout_masonry" name="it_layout_lists" value="masonry">
						   <label for="it_layout_masonry">Masonry Grid</label>
						<input class="theme-option-radio" type="radio"' . (qa_opt('it_layout_lists') == 'list' ? ' checked=""' : '') . ' id="it_layout_masonry_list" name="it_layout_lists" value="list">
						   <label for="it_layout_masonry_list">Masonry List</label> 
						<input class="theme-option-radio" type="radio"' . (qa_opt('it_layout_lists') == 'qlist' ? ' checked=""' : '') . ' id="it_layout_qlist" name="it_layout_lists" value="qlist">
						   <label for="it_layout_qlist">Default List</label> 
					</td>
				</tr>
				<tr>
					<th class="qa-form-tall-label">
						Allow choosing layouts
						<span class="description">If any option other than Default List is selected, new buttons will show up under <strong>Brows</strong> menu to allow user choose layout between Masonry and Lists</span>
					</th>
					<td class="qa-form-tall-label">
						<div class="on-off-checkbox-container">
								<input type="checkbox" class="on-off-checkbox" value="1"' . (qa_opt('it_layout_choose') ? ' checked=""' : '') . ' id="it_layout_choose" name="it_layout_choose">
								<label for="it_layout_choose"></label>
						</div>
					</td>
				</tr>
			</tbody>
		</table>
	</div>
	<div class="qa-part-form-tc-styling">
		<h3>Colors</h3>
		<table class="qa-form-tall-table options-table">
			<tbody>
				<tr>
					<th class="qa-form-tall-label">
						Body background
					</th>
					<td class="qa-form-tall-label">
						' . $bg_select . '
					</td>
				</tr>
				<tr id="bg-color-container"' . ((qa_opt('it_bg_select') == 'bg_color') ? '' : ' style="display:none;"') . '>
					<th class="qa-form-tall-label">
						Body Font Color
					</th>
					<td class="qa-form-tall-label">
						<input type="colorpicker" class="form-control" value="' . qa_opt('it_bg_color') . '" id="it_bg_color" name="it_bg_color">
					</td>
				</tr>
			</tbody>
			<tbody>
				<tr>
					<th class="qa-form-tall-label">
						Text color
					</th>
					<td class="qa-form-tall-label">
						<input type="colorpicker" class="form-control" value="' . qa_opt('it_text_color') . '" id="it_text_color" name="it_text_color">
					</td>
				</tr>
				<tr>
					<th class="qa-form-tall-label">
						Border color
					</th>
					<td class="qa-form-tall-label">
						<input type="colorpicker" class="form-control" value="' . qa_opt('it_border_color') . '" id="it_border_color" name="it_border_color">
					</td>
				</tr>
				<tr>
					<th class="qa-form-tall-label">
						Link color
					</th>
					<td class="qa-form-tall-label">
						Link Color<input type="colorpicker" class="form-control" value="' . qa_opt('it_link_color') . '" id="it_link_color" name="it_link_color">
						Hover Color<input type="colorpicker" class="form-control" value="' . qa_opt('it_link_hover_color') . '" id="it_link_hover_color" name="it_link_hover_color">
					</td>
				</tr>
				<tr>
					<th class="qa-form-tall-label">
						Question Link color
					</th>
					<td class="qa-form-tall-label">
						Link Color<input type="colorpicker" class="form-control" value="' . qa_opt('it_q_link_color') . '" id="it_q_link_color" name="it_q_link_color">
						Hover Color<input type="colorpicker" class="form-control" value="' . qa_opt('it_q_link_hover_color') . '" id="it_q_link_hover_color" name="it_q_link_hover_color">
					</td>
				</tr>
				<tr>
					<th class="qa-form-tall-label">
						Navigation Link color
					</th>
					<td class="qa-form-tall-label">
						Text Color<input type="colorpicker" class="form-control" value="' . qa_opt('it_nav_link_color') . '" id="it_nav_link_color" name="it_nav_link_color">
						Hover Color<input type="colorpicker" class="form-control" value="' . qa_opt('it_nav_link_color_hover') . '" id="it_nav_link_color_hover" name="it_nav_link_color_hover">
					</td>
				</tr>
				<tr>
					<th class="qa-form-tall-label">
						Sub Navigation Link color
					</th>
					<td class="qa-form-tall-label">
						Text Color<input type="colorpicker" class="form-control" value="' . qa_opt('it_subnav_link_color') . '" id="it_subnav_link_color" name="it_subnav_link_color">
						Hover Color<input type="colorpicker" class="form-control" value="' . qa_opt('it_subnav_link_color_hover') . '" id="it_subnav_link_color_hover" name="it_subnav_link_color_hover">
					</td>
				</tr>
				<tr>
					<th class="qa-form-tall-label">
						Highlight Text color
					</th>
					<td class="qa-form-tall-label">
						<input type="colorpicker" class="form-control" value="' . qa_opt('it_highlight_color') . '" id="it_highlight_color" name="it_highlight_color">
					</td>
				</tr>
				<tr>
					<th class="qa-form-tall-label">
						Highlight background color
					</th>
					<td class="qa-form-tall-label">
						<input type="colorpicker" class="form-control" value="' . qa_opt('it_highlight_bg_color') . '" id="it_highlight_bg_color" name="it_highlight_bg_color">
					</td>
				</tr>
			</tbody>
			<tbody>
				<tr>
					<th class="qa-form-tall-label">
						Custom Styling
						<span class="description">Enter your custom css code here</span>
					</th>
					<td class="qa-form-tall-label">
						<textarea class="form-control" name="it_custom_css" rows="5" cols="40">' . qa_opt('it_custom_css') . '</textarea>
					</td>
				</tr>
			</tbody>
		</table>
	</div>
	<div class="qa-part-form-tc-typo">
		<table class="qa-form-tall-table options-table">
			<tbody>
				<tr>
					<th class="qa-form-tall-label">
						Body
					</th>
					<td class="qa-form-tall-label">
						<select data-placeholder="Choose a font" class="chosen-select font-family" data-font-option-type="body" name="typo_option[body][family]" id="typo_family">' . $this->get_font_options(qa_opt('typo_options_family_body')) . '</select>
						<select data-placeholder="font style" id="typo_style" name="typo_option[body][style]" class="chosen-select font-style" data-font-option-type="body">
						' . $this->get_font_style_options(qa_opt('typo_options_family_body'), qa_opt('typo_options_style_body')) . '
						</select>
						<div class="input-group font-input" title="Font Size">
							<span class="input-group-addon">Font Size</span>
							<input value="' . qa_opt('typo_options_size_body') . '" id="typo_size" name="typo_option[body][size]" type="text" class="form-control font-size" data-font-option-type="body">
							<span class="input-group-addon">px</span>
						</div>						
						<div class="input-group font-input" title="Line Height" >
							<span class="input-group-addon">Line Height</span>
							<input value="' . qa_opt('typo_options_linehight_body') . '" id="typo_lineheight" name="typo_option[body][linehight]" type="text" class="form-control font-linehight" data-font-option-type="body">
							<span class="input-group-addon">px</span>
						</div>
						<select data-placeholder="Font Backup" name="typo_option[body][backup]" id="typo_backup" class="chosen-select font-family-backup" data-font-option-type="body">' . $this->get_normal_font_options(qa_opt('typo_options_backup_body')) . '</select>
						<span class="font-demo">The quick brown fox jumps over the lazy dog.</span>
					</td>
				</tr>
				<tr>
					<th class="qa-form-tall-label">
						H1
					</th>
					<td class="qa-form-tall-label">
						<select data-placeholder="Choose a font" class="chosen-select font-family" data-font-option-type="h1" name="typo_option[h1][family]" id="typo_family">' . $this->get_font_options(qa_opt('typo_options_family_h1')) . '</select>
						<select data-placeholder="font style" id="typo_style" name="typo_option[h1][style]" class="chosen-select font-style" data-font-option-type="h1">
						' . $this->get_font_style_options(qa_opt('typo_options_family_h1'), qa_opt('typo_options_style_h1')) . '
						</select>
						<div class="input-group font-input" title="Font Size">
							<span class="input-group-addon">Font Size</span>
							<input value="' . qa_opt('typo_options_size_h1') . '" id="typo_size" name="typo_option[h1][size]" type="text" class="form-control font-size" data-font-option-type="h1">
							<span class="input-group-addon">px</span>
						</div>						
						<div class="input-group font-input" title="Line Height" >
							<span class="input-group-addon">Line Height</span>
							<input value="' . qa_opt('typo_options_linehight_h1') . '" id="typo_lineheight" name="typo_option[h1][linehight]" type="text" class="form-control font-linehight" data-font-option-type="h1">
							<span class="input-group-addon">px</span>
						</div>
						<select data-placeholder="Font Backup" name="typo_option[h1][backup]" id="typo_backup" class="chosen-select font-family-backup" data-font-option-type="h1">' . $this->get_normal_font_options(qa_opt('typo_options_backup_h1')) . '</select>
						<span class="font-demo"><h1>The quick brown fox jumps over the lazy dog.</h1></span>
					</td>
				</tr>
				<tr>
					<th class="qa-form-tall-label">
						H2
					</th>
					<td class="qa-form-tall-label">
						<select data-placeholder="Choose a font" class="chosen-select font-family" data-font-option-type="h2" name="typo_option[h2][family]" id="typo_family">' . $this->get_font_options(qa_opt('typo_options_family_h2')) . '</select>
						<select data-placeholder="font style" id="typo_style" name="typo_option[h2][style]" class="chosen-select font-style" data-font-option-type="h2">
						' . $this->get_font_style_options(qa_opt('typo_options_family_h2'), qa_opt('typo_options_style_h2')) . '
						</select>
						<div class="input-group font-input" title="Font Size">
							<span class="input-group-addon">Font Size</span>
							<input value="' . qa_opt('typo_options_size_h2') . '" id="typo_size" name="typo_option[h2][size]" type="text" class="form-control font-size" data-font-option-type="h2">
							<span class="input-group-addon">px</span>
						</div>						
						<div class="input-group font-input" title="Line Height" >
							<span class="input-group-addon">Line Height</span>
							<input value="' . qa_opt('typo_options_linehight_h2') . '" id="typo_lineheight" name="typo_option[h2][linehight]" type="text" class="form-control font-linehight" data-font-option-type="h2">
							<span class="input-group-addon">px</span>
						</div>
						<select data-placeholder="Font Backup" name="typo_option[h2][backup]" id="typo_backup" class="chosen-select font-family-backup" data-font-option-type="h2">' . $this->get_normal_font_options(qa_opt('typo_options_backup_h2')) . '</select>
						<span class="font-demo"><h2>The quick brown fox jumps over the lazy dog.</h2></span>
					</td>
				</tr>
				<tr>
					<th class="qa-form-tall-label">
						H3
					</th>
					<td class="qa-form-tall-label">
						<select data-placeholder="Choose a font" class="chosen-select font-family" data-font-option-type="h3" name="typo_option[h3][family]" id="typo_family">' . $this->get_font_options(qa_opt('typo_options_family_h3')) . '</select>
						<select data-placeholder="font style" id="typo_style" name="typo_option[h3][style]" class="chosen-select font-style" data-font-option-type="h3">
						' . $this->get_font_style_options(qa_opt('typo_options_family_h3'), qa_opt('typo_options_style_h3')) . '
						</select>
						<div class="input-group font-input" title="Font Size">
							<span class="input-group-addon">Font Size</span>
							<input value="' . qa_opt('typo_options_size_h3') . '" id="typo_size" name="typo_option[h3][size]" type="text" class="form-control font-size" data-font-option-type="h3">
							<span class="input-group-addon">px</span>
						</div>						
						<div class="input-group font-input" title="Line Height" >
							<span class="input-group-addon">Line Height</span>
							<input value="' . qa_opt('typo_options_linehight_h3') . '" id="typo_lineheight" name="typo_option[h3][linehight]" type="text" class="form-control font-linehight" data-font-option-type="h3">
							<span class="input-group-addon">px</span>
						</div>
						<select data-placeholder="Font Backup" name="typo_option[h3][backup]" id="typo_backup" class="chosen-select font-family-backup" data-font-option-type="h3">' . $this->get_normal_font_options(qa_opt('typo_options_backup_h3')) . '</select>
						<span class="font-demo"><h3>The quick brown fox jumps over the lazy dog.</h3></span>
					</td>
				</tr>
				<tr>
					<th class="qa-form-tall-label">
						H4
					</th>
					<td class="qa-form-tall-label">
						<select data-placeholder="Choose a font" class="chosen-select font-family" data-font-option-type="h4" name="typo_option[h4][family]" id="typo_family">' . $this->get_font_options(qa_opt('typo_options_family_h4')) . '</select>
						<select data-placeholder="font style" id="typo_style" name="typo_option[h4][style]" class="chosen-select font-style" data-font-option-type="h4">
						' . $this->get_font_style_options(qa_opt('typo_options_family_h4'), qa_opt('typo_options_style_h4')) . '
						</select>
						<div class="input-group font-input" title="Font Size">
							<span class="input-group-addon">Font Size</span>
							<input value="' . qa_opt('typo_options_size_h4') . '" id="typo_size" name="typo_option[h4][size]" type="text" class="form-control font-size" data-font-option-type="h4">
							<span class="input-group-addon">px</span>
						</div>						
						<div class="input-group font-input" title="Line Height" >
							<span class="input-group-addon">Line Height</span>
							<input value="' . qa_opt('typo_options_linehight_h4') . '" id="typo_lineheight" name="typo_option[h4][linehight]" type="text" class="form-control font-linehight" data-font-option-type="h4">
							<span class="input-group-addon">px</span>
						</div>
						<select data-placeholder="Font Backup" name="typo_option[h4][backup]" id="typo_backup" class="chosen-select font-family-backup" data-font-option-type="h4">' . $this->get_normal_font_options(qa_opt('typo_options_backup_h4')) . '</select>
						<span class="font-demo"><h4>The quick brown fox jumps over the lazy dog.</h4></span>
					</td>
				</tr>
				<tr>
					<th class="qa-form-tall-label">
						h5
					</th>
					<td class="qa-form-tall-label">
						<select data-placeholder="Choose a font" class="chosen-select font-family" data-font-option-type="h5" name="typo_option[h5][family]" id="typo_family">' . $this->get_font_options(qa_opt('typo_options_family_h5')) . '</select>
						<select data-placeholder="font style" id="typo_style" name="typo_option[h5][style]" class="chosen-select font-style" data-font-option-type="h5">
						' . $this->get_font_style_options(qa_opt('typo_options_family_h5'), qa_opt('typo_options_style_h5')) . '
						</select>
						<div class="input-group font-input" title="Font Size">
							<span class="input-group-addon">Font Size</span>
							<input value="' . qa_opt('typo_options_size_h5') . '" id="typo_size" name="typo_option[h5][size]" type="text" class="form-control font-size" data-font-option-type="h5">
							<span class="input-group-addon">px</span>
						</div>						
						<div class="input-group font-input" title="Line Height" >
							<span class="input-group-addon">Line Height</span>
							<input value="' . qa_opt('typo_options_linehight_h5') . '" id="typo_lineheight" name="typo_option[h5][linehight]" type="text" class="form-control font-linehight" data-font-option-type="h5">
							<span class="input-group-addon">px</span>
						</div>
						<select data-placeholder="Font Backup" name="typo_option[h5][backup]" id="typo_backup" class="chosen-select font-family-backup" data-font-option-type="h5">' . $this->get_normal_font_options(qa_opt('typo_options_backup_h5')) . '</select>
						<span class="font-demo"><h5>The quick brown fox jumps over the lazy dog.</h5></span>
					</td>
				</tr>
				<tr>
					<th class="qa-form-tall-label">
						Paragraphs
					</th>
					<td class="qa-form-tall-label">
						<select data-placeholder="Choose a font" class="chosen-select font-family" data-font-option-type="p" name="typo_option[p][family]" id="typo_family">' . $this->get_font_options(qa_opt('typo_options_family_p')) . '</select>
						<select data-placeholder="font style" id="typo_style" name="typo_option[p][style]" class="chosen-select font-style" data-font-option-type="p">
						' . $this->get_font_style_options(qa_opt('typo_options_family_p'), qa_opt('typo_options_style_p')) . '
						</select>
						<div class="input-group font-input" title="Font Size">
							<span class="input-group-addon">Font Size</span>
							<input value="' . qa_opt('typo_options_size_p') . '" id="typo_size" name="typo_option[p][size]" type="text" class="form-control font-size" data-font-option-type="p">
							<span class="input-group-addon">px</span>
						</div>						
						<div class="input-group font-input" title="Line Height" >
							<span class="input-group-addon">Line Height</span>
							<input value="' . qa_opt('typo_options_linehight_p') . '" id="typo_lineheight" name="typo_option[p][linehight]" type="text" class="form-control font-linehight" data-font-option-type="p">
							<span class="input-group-addon">px</span>
						</div>
						<select data-placeholder="Font Backup" name="typo_option[p][backup]" id="typo_backup" class="chosen-select font-family-backup" data-font-option-type="p">' . $this->get_normal_font_options(qa_opt('typo_options_backup_p')) . '</select>
						<span class="font-demo"><p>The quick brown fox jumps over the lazy dog.</p></span>
					</td>
				</tr>
				<tr>
					<th class="qa-form-tall-label">
						Span
					</th>
					<td class="qa-form-tall-label">
						<select data-placeholder="Choose a font" class="chosen-select font-family" data-font-option-type="span" name="typo_option[span][family]" id="typo_family">' . $this->get_font_options(qa_opt('typo_options_family_span')) . '</select>
						<select data-placeholder="font style" id="typo_style" name="typo_option[span][style]" class="chosen-select font-style" data-font-option-type="span">
						' . $this->get_font_style_options(qa_opt('typo_options_family_span'), qa_opt('typo_options_style_span')) . '
						</select>
						<div class="input-group font-input" title="Font Size">
							<span class="input-group-addon">Font Size</span>
							<input value="' . qa_opt('typo_options_size_span') . '" id="typo_size" name="typo_option[span][size]" type="text" class="form-control font-size" data-font-option-type="span">
							<span class="input-group-addon">px</span>
						</div>						
						<div class="input-group font-input" title="Line Height" >
							<span class="input-group-addon">Line Height</span>
							<input value="' . qa_opt('typo_options_linehight_span') . '" id="typo_lineheight" name="typo_option[span][linehight]" type="text" class="form-control font-linehight" data-font-option-type="span">
							<span class="input-group-addon">px</span>
						</div>
						<select data-placeholder="Font Backup" name="typo_option[span][backup]" id="typo_backup" class="chosen-select font-family-backup" data-font-option-type="span">' . $this->get_normal_font_options(qa_opt('typo_options_backup_span')) . '</select>
						<span class="font-demo"><span>The quick brown fox jumps over the lazy dog.</span></span>
					</td>
				</tr>
				<tr>
					<th class="qa-form-tall-label">
						Quote
					</th>
					<td class="qa-form-tall-label">
						<select data-placeholder="Choose a font" class="chosen-select font-family" data-font-option-type="quote" name="typo_option[quote][family]" id="typo_family">' . $this->get_font_options(qa_opt('typo_options_family_quote')) . '</select>
						<select data-placeholder="font style" id="typo_style" name="typo_option[quote][style]" class="chosen-select font-style" data-font-option-type="quote">
						' . $this->get_font_style_options(qa_opt('typo_options_family_quote'), qa_opt('typo_options_style_quote')) . '
						</select>
						<div class="input-group font-input" title="Font Size">
							<span class="input-group-addon">Font Size</span>
							<input value="' . qa_opt('typo_options_size_quote') . '" id="typo_size" name="typo_option[quote][size]" type="text" class="form-control font-size" data-font-option-type="quote">
							<span class="input-group-addon">px</span>
						</div>						
						<div class="input-group font-input" title="Line Height" >
							<span class="input-group-addon">Line Height</span>
							<input value="' . qa_opt('typo_options_linehight_quote') . '" id="typo_lineheight" name="typo_option[quote][linehight]" type="text" class="form-control font-linehight" data-font-option-type="quote">
							<span class="input-group-addon">px</span>
						</div>
						<select data-placeholder="Font Backup" name="typo_option[quote][backup]" id="typo_backup" class="chosen-select font-family-backup" data-font-option-type="quote">' . $this->get_normal_font_options(qa_opt('typo_options_backup_quote')) . '</select>
						<span class="font-demo"><blockquote>The quick brown fox jumps over the lazy dog.</blockquote></span>
					</td>
				</tr>
			</tbody>
				<tr>
					<th class="qa-form-tall-label">
						Question Title
					</th>
					<td class="qa-form-tall-label">
						<select data-placeholder="Choose a font" class="chosen-select font-family" data-font-option-type="qtitle" name="typo_option[qtitle][family]" id="typo_family">' . $this->get_font_options(qa_opt('typo_options_family_qtitle')) . '</select>
						<select data-placeholder="font style" id="typo_style" name="typo_option[qtitle][style]" class="chosen-select font-style" data-font-option-type="qtitle">
						' . $this->get_font_style_options(qa_opt('typo_options_family_qtitle'), qa_opt('typo_options_style_qtitle')) . '
						</select>
						<div class="input-group font-input" title="Font Size">
							<span class="input-group-addon">Font Size</span>
							<input value="' . qa_opt('typo_options_size_qtitle') . '" id="typo_size" name="typo_option[qtitle][size]" type="text" class="form-control font-size" data-font-option-type="qtitle">
							<span class="input-group-addon">px</span>
						</div>						
						<div class="input-group font-input" title="Line Height" >
							<span class="input-group-addon">Line Height</span>
							<input value="' . qa_opt('typo_options_linehight_qtitle') . '" id="typo_lineheight" name="typo_option[qtitle][linehight]" type="text" class="form-control font-linehight" data-font-option-type="qtitle">
							<span class="input-group-addon">px</span>
						</div>
						<select data-placeholder="Font Backup" name="typo_option[qtitle][backup]" id="typo_backup" class="chosen-select font-family-backup" data-font-option-type="qtitle">' . $this->get_normal_font_options(qa_opt('typo_options_backup_qtitle')) . '</select>
						<span class="font-demo"><h2 class="question-title">The quick brown fox jumps over the lazy dog.</h2></span>
					</td>
				</tr>
				<tr>
					<th class="qa-form-tall-label">
						Question Title Link
					</th>
					<td class="qa-form-tall-label">
						<select data-placeholder="Choose a font" class="chosen-select font-family" data-font-option-type="qtitlelink" name="typo_option[qtitlelink][family]" id="typo_family">' . $this->get_font_options(qa_opt('typo_options_family_qtitlelink')) . '</select>
						<select data-placeholder="font style" id="typo_style" name="typo_option[qtitlelink][style]" class="chosen-select font-style" data-font-option-type="qtitlelink">
						' . $this->get_font_style_options(qa_opt('typo_options_family_qtitlelink'), qa_opt('typo_options_style_qtitlelink')) . '
						</select>
						<div class="input-group font-input" title="Font Size">
							<span class="input-group-addon">Font Size</span>
							<input value="' . qa_opt('typo_options_size_qtitlelink') . '" id="typo_size" name="typo_option[qtitlelink][size]" type="text" class="form-control font-size" data-font-option-type="qtitlelink">
							<span class="input-group-addon">px</span>
						</div>						
						<div class="input-group font-input" title="Line Height" >
							<span class="input-group-addon">Line Height</span>
							<input value="' . qa_opt('typo_options_linehight_qtitlelink') . '" id="typo_lineheight" name="typo_option[qtitlelink][linehight]" type="text" class="form-control font-linehight" data-font-option-type="qtitlelink">
							<span class="input-group-addon">px</span>
						</div>
						<select data-placeholder="Font Backup" name="typo_option[qtitlelink][backup]" id="typo_backup" class="chosen-select font-family-backup" data-font-option-type="qtitlelink">' . $this->get_normal_font_options(qa_opt('typo_options_backup_qtitlelink')) . '</select>
						<span class="font-demo"><div class="qa-q-item-title" style="font-size: inherit ! important; font-family: inherite ! important; font-style: inherit ! important; line-height: inherit ! important; font-weight: inherit ! important;"><a href="#" style="font-size: inherit ! important;">The quick brown fox jumps over the lazy dog.</a></div></span>
					</td>
				</tr>
				<tr>
					<th class="qa-form-tall-label">
						Post Content
					</th>
					<td class="qa-form-tall-label">
						<select data-placeholder="Choose a font" class="chosen-select font-family" data-font-option-type="pcontent" name="typo_option[pcontent][family]" id="typo_family">' . $this->get_font_options(qa_opt('typo_options_family_pcontent')) . '</select>
						<select data-placeholder="font style" id="typo_style" name="typo_option[pcontent][style]" class="chosen-select font-style" data-font-option-type="pcontent">
						' . $this->get_font_style_options(qa_opt('typo_options_family_pcontent'), qa_opt('typo_options_style_pcontent')) . '
						</select>
						<div class="input-group font-input" title="Font Size">
							<span class="input-group-addon">Font Size</span>
							<input value="' . qa_opt('typo_options_size_pcontent') . '" id="typo_size" name="typo_option[pcontent][size]" type="text" class="form-control font-size" data-font-option-type="pcontent">
							<span class="input-group-addon">px</span>
						</div>						
						<div class="input-group font-input" title="Line Height" >
							<span class="input-group-addon">Line Height</span>
							<input value="' . qa_opt('typo_options_linehight_pcontent') . '" id="typo_lineheight" name="typo_option[pcontent][linehight]" type="text" class="form-control font-linehight" data-font-option-type="pcontent">
							<span class="input-group-addon">px</span>
						</div>
						<select data-placeholder="Font Backup" name="typo_option[pcontent][backup]" id="typo_backup" class="chosen-select font-family-backup" data-font-option-type="pcontent">' . $this->get_normal_font_options(qa_opt('typo_options_backup_pcontent')) . '</select>
						<span class="font-demo"><div class="entry-content">The quick brown fox jumps over the lazy dog.</div></span>
					</td>
				</tr>
				<tr>
					<th class="qa-form-tall-label">
						Navigation Links
					</th>
					<td class="qa-form-tall-label">
						<select data-placeholder="Choose a font" class="chosen-select font-family" data-font-option-type="mainnav" name="typo_option[mainnav][family]" id="typo_family">' . $this->get_font_options(qa_opt('typo_options_family_mainnav')) . '</select>
						<select data-placeholder="font style" id="typo_style" name="typo_option[mainnav][style]" class="chosen-select font-style" data-font-option-type="mainnav">
						' . $this->get_font_style_options(qa_opt('typo_options_family_mainnav'), qa_opt('typo_options_style_mainnav')) . '
						</select>
						<div class="input-group font-input" title="Font Size">
							<span class="input-group-addon">Font Size</span>
							<input value="' . qa_opt('typo_options_size_mainnav') . '" id="typo_size" name="typo_option[mainnav][size]" type="text" class="form-control font-size" data-font-option-type="mainnav">
							<span class="input-group-addon">px</span>
						</div>						
						<div class="input-group font-input" title="Line Height" >
							<span class="input-group-addon">Line Height</span>
							<input value="' . qa_opt('typo_options_linehight_mainnav') . '" id="typo_lineheight" name="typo_option[mainnav][linehight]" type="text" class="form-control font-linehight" data-font-option-type="mainnav">
							<span class="input-group-addon">px</span>
						</div>
						<select data-placeholder="Font Backup" name="typo_option[mainnav][backup]" id="typo_backup" class="chosen-select font-family-backup" data-font-option-type="mainnav">' . $this->get_normal_font_options(qa_opt('typo_options_backup_mainnav')) . '</select>
						<span class="font-demo">
							<div class="left-sidebar">
								<ul class="qa-nav-main-list" style="font-style: inherit; font-weight: inherit;">
									<li class="qa-nav-main-item qa-nav-main-questions">
										<a class="icon-question qa-nav-main-link" href="#" style="font-style: inherit !important;font-size: inherit ! important;font-weight: inherit !important;">Questions</a>
									</li>
								</ul>
							</div>						
						</span>
					</td>
				</tr>

			<tbody>
			</tbody>
		</table>
	</div>
	<div class="form-button-sticky-footer">
		<div class="form-button-holder">
			<input type="submit" class="qa-form-tall-button btn-primary" title="" value="Save Changes" name="it_save_button">
			<input type="submit" class="qa-form-tall-button" title="" value="Reset to Default" name="it_reset_button">
		</div>
	</div>
</form>

			
			';
		return $output;
	}
    function get_font_options($font_name = '')
    {
        global $google_webfonts;
        global $normal_fonts;
        $font_options = '<option value=""></option><optgroup label="Normal Fonts">';
        foreach ($normal_fonts as $k => $font) {
            $font_options .= '<option font-data-type="normalfont" value="' . $k . '"' . (($font_name == $k) ? ' selected' : '') . '>' . $k . '</option>';
        }
        $font_options .= '<optgroup label="Google Fonts">';
        foreach ($google_webfonts as $k => $font) {
            $font_options .= '<option font-data-type="googlefont" font-data-detail=\'' . json_encode($google_webfonts[$k]['variants']) . '\' value="' . $k . '"' . (($font_name == $k) ? ' selected' : '') . '>' . $k . '</option>';
        }
        return $font_options;
    }
    function get_normal_font_options($font_name = '')
    {
        global $normal_fonts;
        $font_options = '<option value=""></option>';
        foreach ($normal_fonts as $k => $font) {
            $font_options .= '<option font-data-type="normalfont" value="' . $k . '"' . (($font_name == $k) ? ' selected' : '') . '>' . $k . '</option>';
        }
        return $font_options;
    }
    function get_font_style_options($font_name, $style)
    {
        global $google_webfonts;
        global $normal_fonts;
        $style_options = '<option value=""></option>';
        if (($font_name == '') or (!(isset($google_webfonts[$font_name])))) {
            $style_options .= '
				<option value="400"' . (($style == "400") ? ' selected' : '') . '>Normal 400</option>
				<option value="700"' . (($style == "700") ? ' selected' : '') . '>Bold 700</option>
				<option value="400italic"' . (($style == "400italic") ? ' selected' : '') . '>Normal 400+Italic</option>
				<option value="700italic"' . (($style == "700italic") ? ' selected' : '') . '>Bold 700+Italic</option>';
        } else {
            foreach ($google_webfonts[$font_name]['variants'] as $k => $fontstyle) {
                $style_options .= '<option value="' . $fontstyle["id"] . '"' . (($style == $fontstyle["id"]) ? ' selected' : '') . '>' . $fontstyle["name"] . '</option>';
                //var_dump($style);
            }
        }
        return $style_options;
    }

}

