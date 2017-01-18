<?php
require 'system/Core.php';
$core = New Core();
$core->run();


if (isset($_POST['login'])) {
    $check_user = new Queries('mahasiswa');
    if (isset($_POST['login'])) {
        unset($_POST['login']);
    }
    $data = $_POST;
    if (isset($data['user_pass'])) {
        $data['user_pass'] = sha1($data['user_pass']);
    }
    if ($check_user->verify('mahasiswa',$data['user_name'],$data['user_pass'])) {
        $session->register(120); // Register for 2 hours.
        $session->set('current_user', $data);
        header('location: index.php');
    }else{        
        $notif->error('Username atau password salah');
        $page->data['notif'] = $notif->display(null,false);
        $core->show_page($page,'login');
    }    

}

?>