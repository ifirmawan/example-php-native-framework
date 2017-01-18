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
	public $page;
	function __construct(){
		
	}

	function run(){
		$GLOBALS['notif']	= new FlashMessages();
		$GLOBALS['page'] 	= new Views();
		$GLOBALS['session'] = new Session();		
	}
	

}