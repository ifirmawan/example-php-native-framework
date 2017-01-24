<?php
define('base_path', $_SERVER['DOCUMENT_ROOT'].'/');

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
		$this->page->data['base_path'] = "http://" . $_SERVER['HTTP_HOST'] . "/";
	}
	public function run(){
		/*
		model => $this->sql->nama_table
		controller =>'index.php'
		view => $this->page->data{
			'data' =>mixed (array)
			'content' => filename 
		}*/


		$this->page->data['list'] = $this->sql->events->get_all();
		(isset($_GET['pg']) && strlen($_GET['pg']) > 0)? $content =$_GET['pg'] : $content = 'home';
		if (($this->session->get('current_user') && in_array($content, array('kontributor','admin')))) {
			$user   					= $this->session->get('current_user');
			$this->page->data['user']   = $user;
			if (($user['role'] == 'kontributor' && $content=='admin') || ($user['role'] == 'admin' && $content=='kontributor')) {
				$this->page->data['content'] ='not allowed';
			}else{
				$this->page->set_content($content);	
			}
			
		}elseif (!$this->session->get('current_user') && in_array($content, array('kontributor','admin'))) {
			$this->page->set_content('login');
		}else{
			$this->page->set_content($content);
		}
		$this->page->render();
	}
}

$app = new App();
$app->run();

