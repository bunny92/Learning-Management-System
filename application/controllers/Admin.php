<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model("user_model");
    }

     public function index() {
        $this->is_login();
        if(!isset($id) || $id == '') {
            $id = $this->session->userdata ('user_details')[0]->id;
        }
        $data['user_data'] = $this->user_model->get_users($id);
        $this->load->view('include/header'); 
        $this->load->view('dashboard', $data);
        $this->load->view('include/footer');
    }

     public function is_login(){ 
      if(isset($_SESSION['user_details'])){
          return true;
      }else{
         redirect( base_url().'login/', 'refresh');
      }
  }
    
}