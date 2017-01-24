<?php
define('base_path', $_SERVER['DOCUMENT_ROOT'].'/'.basename(__DIR__).'/');
require 'basic/loader.php';

/**
* 
*/
class Process extends Loader
{
    private $data;
    
    function __construct(){
        parent::__construct();
        
    }
    public function set_data($data=array(),$required=array())
    {
        if ($data) {
            
            $result     = array();
            $n_required = count($required);
            foreach ($data as $key => $value) {

                if (in_array($key, $required)) {
                    $trim_val = trim($value);
                    if (empty($trim_val)) {
                        $result[] =1;
                    }
                    
                }
                
            }
            
            $n_result   = count($result);
            return ($n_result === $n_required);
        }
        return false;
    }

    public function login($data=array()){
        if ($data) {
            if (isset($data['user_pass'])) {
                $data['user_pass'] = sha1($data['user_pass']);
            }
            if ($user = $this->sql->kontributor->verify($data['user_email'],$data['user_pass'])) {
                $user['role']  ='kontributor';
                $this->session->register(120); // Register for 2 hours.
                $this->session->set('current_user', $user);
                header('location: kontributor');
            }else if ($admin=$this->sql->admin->verify($data['user_email'],$data['user_pass'])) {
                $admin['role']  ='admin';
                $this->session->register(120); // Register for 2 hours.
                $this->session->set('current_user', $admin);
                header('location: admin');
            }else{        
                $this->notif->error('Username atau password salah');
                $this->page->data['notif'] = $this->notif->display(null,false);                
                $this->show_page('login');
            }
        }
    }


}


if (isset($_POST)) {
    $method_list    =  method_dari('Process');
    if ($action     = array_intersect(array_keys($_POST), $method_list)) {
        $key        = array_keys($action)[0];        
        
        if (isset($_POST[$action[$key]])) {
            unset($_POST[$action[$key]]);
            $required   = array('user_pass','user_email');
            $handler    = new Process();
            if ($handler->set_data($_POST,$required)) {
                //header('Location: ' . $_SERVER['HTTP_REFERER']);
                echo ("<script> alert('inputan wajib diisi!');window.history.back();</script>");
            }else{
                $go = $action[$key];
                $handler->$go($_POST);
            }
        }
        
    }
}


?>