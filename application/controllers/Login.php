<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model("user_model");
    }

    /**
     * Type : view
     * Nature : Index Page for Basepath
     */
     public function index(){
        if(isset($_SESSION['user_details'])){
            redirect( base_url().'dashboard', 'refresh');
        }
     
        $this->load->view('login'); 
    }
    
  
    /**
      * This function is used to logout user
      * @return Void
      */
    public function logout(){
        $this->is_login();
        $this->session->unset_userdata('user_details');               
        redirect( base_url().'/', 'refresh');
    }


    public function auth_user($page =''){ 
        $return = $this->user_model->auth_user();
        if(empty($return)) { 
           $this->session->set_flashdata("response", "Invalid Credentials..!");
           redirect( base_url().'login', 'refresh');
        } else { 
            if($return == 'not_varified') {
                  $this->session->set_flashdata("response", "Login Failed.. Please try again..!");
                  redirect( base_url().'login', 'refresh');
            } else {
                $this->session->set_userdata('user_details',$return);
            }
            redirect( base_url().'dashboard', 'refresh');
        }
    }

    function is_login(){ 
      if(isset($_SESSION['user_details'])){
          return true;
      }else{
         redirect( base_url().'login/login', 'refresh');
      }
  }
}

