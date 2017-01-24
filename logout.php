<?php
	define('base_path', $_SERVER['DOCUMENT_ROOT'].'/'.basename(__DIR__).'/');
	require 'basic/loader.php';
	$session = new Session();
	if ($session->isRegistered()) {
		$session->end();
		header('location: index.php');
	}
?>