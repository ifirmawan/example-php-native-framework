<?php
/**
* 
*/


require 'models/Queries.php';
require 'libs/Session.php';
require 'libs/Views.php';
require 'libs/FlashMessages.php';

class Core
{
	private $base_url;
	public $page;
	function __construct(){
		$GLOBALS['base_url'] = $this->get_base_url();
	}

	function run(){
		$GLOBALS['notif']	= new FlashMessages();
		$GLOBALS['page'] 	= new Views();
		$GLOBALS['session'] = new Session();		
	}
	function set_base_url($url=false){
		$this->base_url = $url;
	}
	public function get_base_url()
	{
		return $this->base_url;
	}
	public function show_page($obj,$page='',$tpl='default'){
		$obj->set_template($tpl);
		$obj->set_content($page);
		$obj->render();
	}

}