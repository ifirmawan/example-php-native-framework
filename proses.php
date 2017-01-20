<?php
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
            if ($this->sql->mahasiswa->verify($data['user_name'],$data['user_pass'])) {
                $this->session->register(120); // Register for 2 hours.
                $this->session->set('current_user', $data);
                header('location: index.php');
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
            $required   = array('user_pass','user_name');
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