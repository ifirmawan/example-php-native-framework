<?php
	require 'system/Core.php';
	$core = New Core();
	$core->run();
	if ($session->isRegistered()) {
		$session->end();
		header('location: index.php');
	}
?>