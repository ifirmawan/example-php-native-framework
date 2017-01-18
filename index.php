<?php
define('base_url',"http://".$_SERVER['HTTP_HOST'].'/'.basename(__DIR__).'/');
require 'system/Core.php';
$core = New Core();
$core->run();
$core->set_base_url(base_url);
$page->set_template('default');


if ($session->get('current_user')) {
	$menu =array(
		'beri saran' =>'?saran'
		,'tanggapan' =>'?tanggapan'		
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