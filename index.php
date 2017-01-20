<?php

require 'basic/loader.php';

/**
* 
*/
class App extends Loader
{
	
	function __construct()
	{
		parent::__construct();
		$this->page->set_template('default');
	}
	public function run(){

		if ($this->session->get('current_user')) {
				$menu =array(
					'beri saran' =>'saran'
					,'tanggapan' =>'tanggapan'		
				);
			$this->page->data['user'] = $this->session->get('current_user');
			$this->page->change_menu($menu);
		}

		if (isset($_GET['pg']) && strlen($_GET['pg']) > 0) {
			$this->page->set_content($_GET['pg']);
		}else{
			$this->page->set_content('home');
		}
		$this->page->render();

	}
}

$app = new App();
$app->run();

