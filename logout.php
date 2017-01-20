<?php
	require 'basic/loader.php';
	$session = new Session();
	if ($session->isRegistered()) {
		$session->end();
		header('location: index.php');
	}
?>