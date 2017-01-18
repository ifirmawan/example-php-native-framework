<?php

require 'system/Core.php';
$core = New Core();
$core->run();
$page->set_template('default');
if ($session->get('current_user')) {
	$menu =array(
		'beri saran' =>'?pg=saran'
		,'tanggapan' =>'?pg=tanggapan'		
	);
	$page->data['user'] = $session->get('current_user');
	$page->change_menu($menu);
}

if (isset($_GET['pg']) && strlen($_GET['pg']) > 0) {
	$page->set_content($_GET['pg']);
}else{
	$page->set_content('home');
}

$page->render();