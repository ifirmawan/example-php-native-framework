<?php
/**
* 
*/


require 'config.php';
require 'Table.php';
require 'Views.php';

require 'modules/Session.php';
require 'modules/Helpers.php';
require 'modules/FlashMessages.php';


class Loader{
	protected $sql;
	protected $notif;
	protected $page;
	protected $session;
	function __construct(){
		$this->sql 		= new Table();
		$this->notif 	= new FlashMessages();
		$this->page  	= new Views();
		$this->session 	= new Session();
	}

	public function show_page($page='',$tpl='default'){
		$this->page->set_template($tpl);
		$this->page->set_content($page);
		$this->page->render();
	}

}


