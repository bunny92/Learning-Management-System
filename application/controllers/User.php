<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model("user_model");
    }

     public function material() {
     
        $this->is_login();
        if(!isset($id) || $id == '') {
            $id = $this->session->userdata ('user_details')[0]->id;
        }
         $data['user_data'] = $this->user_model->get_users($id);
         $data['notes'] = $this->user_model->get_data_by('notes');
         $data['subject'] = $this->user_model->getData('map_data','subject');
         $data['branch'] = $this->user_model->getData('map_data','branch');
        $this->load->view('material', $data);
    }

     public function view_paper($questionid="") {
     
        $this->is_login();
        if(!isset($id) || $id == '') {
            $id = $this->session->userdata ('user_details')[0]->id;
        }
         $data['user_data'] = $this->user_model->get_users($id);
        $data['test'] = $this->user_model->get_data_by('test');
         $data['onlinetest'] = $this->user_model->get_data_by('onlinetest',$questionid,'id');  
        $this->load->view('view_test',$data);
    }


      public function results() {
     
        $this->is_login();
        if(!isset($id) || $id == '') {
            $id = $this->session->userdata ('user_details')[0]->id;
        }
         $data['user_data'] = $this->user_model->get_users($id);
         $data['results'] = $this->user_model->get_data_by('results');
          $data['branch'] = $this->user_model->getData('map_data','branch');
        $this->load->view('results', $data);
    }

     public function feedback() {
     
        $this->is_login();
        if(!isset($id) || $id == '') {
            $id = $this->session->userdata ('user_details')[0]->id;
        }
         $data['user_data'] = $this->user_model->get_users($id);
         $data['feedback'] = $this->user_model->get_data_by('feedback');
        $this->load->view('feedback', $data);
    }

     public function onlinetest() {
     
        $this->is_login();
        if(!isset($id) || $id == '') {
            $id = $this->session->userdata ('user_details')[0]->id;
        }
         $data['user_data'] = $this->user_model->get_users($id);
         $data['onlinetest'] = $this->user_model->get_data_by('onlinetest');

           $data['branch'] = $this->user_model->getData('map_data','branch');
              $data['subject'] = $this->user_model->getData('map_data','subject');
        $this->load->view('onlinetest', $data);
    }

     public function attendance() {
     
         $this->is_login();
        if(!isset($id) || $id == '') {
            $register_id = $this->session->userdata ('user_details')[0]->register_id;
             $id = $this->session->userdata ('user_details')[0]->id;
        }
          $type = $this->session->userdata ('user_details')[0]->user_type;
        $data['user_data'] = $this->user_model->get_users($id);
         if($type == 'Professor') {
         $data['attendence'] = $this->user_model->get_attendance_prof($register_id,'attendence_report');     
         }else {
        $data['attendence'] = $this->user_model->get_attendance_student($register_id,'attendence_report');
         }
       
        $this->load->view('attendance', $data);
    }

     public function assignment() {
     
        $this->is_login();
        if(!isset($id) || $id == '') {
            $id = $this->session->userdata ('user_details')[0]->id;
            $name = $this->session->userdata ('user_details')[0]->name;
        }
         $type = $this->session->userdata ('user_details')[0]->user_type;
         $reg_id = $this->session->userdata ('user_details')[0]->register_id;
         $data['user_data'] = $this->user_model->get_users($id);
         if($type == 'Professor') {
            $data['assignment'] = $this->user_model->get_data_by('assign',$name,'faculty');           
            $data['posted'] = $this->user_model->get_data_by('assign',$reg_id,'user_id');         
         }else{
         $data['assignment'] = $this->user_model->get_data_by('assign',$reg_id,'user_id');
         $data['posted'] = $this->user_model->get_data_by('assign','NULL','faculty');  
         $data['faculty'] = $this->user_model->getFaculty();
         }
          $data['subject'] = $this->user_model->getData('map_data','subject');
          $data['branch'] = $this->user_model->getData('map_data','branch'); 
        $this->load->view('assignment', $data);
    }

    public function upload_assignment_student() {

        $data = $this->input->post();
        $sheets = 'notes.png';
        
        if(isset($this->session->userdata ('user_details')[0]->id)) {
            if(isset($this->session->userdata ('user_details')[0]->user_type)){
                $redirect = 'user/assignment';
            } else {
                $redirect = 'dashboard/';
            }
        } else {
            $redirect = 'login';
        }
      

        foreach($_FILES as $name => $fileInfo)
        { 
             if(!empty($_FILES[$name]['name'])){
                $newname=$this->upload(); 
                $data[$name]=$newname;
                $sheets =$newname;
             }
        }

                $data['user_id'] = $this->input->post('user_id');
                $data['branch'] = $this->input->post('branch');
                $data['year'] = $this->input->post('year');
                $data['semister'] = $this->input->post('semister');
                $data['subject'] = $this->input->post('subject');
                $data['faculty'] = $this->input->post('faculty');
                $data['assignment_file'] = $sheets;
                $data['description'] = $this->input->post('description');
                $data['status'] = 'Inprocess';
                $data['updated_date'] = date('y-m-d');
            
               
                unset($data['submit']);
                $this->user_model->insertRow('assign', $data);
                $this->session->set_flashdata('messagePr', 'You have uploaded the Assignment Successfully..!' );
                redirect( base_url().'user/assignment', 'refresh');}  

    public function upload_test() {

        $data = $this->input->post();
        $sheets = 'notes.png';
        
        if(isset($this->session->userdata ('user_details')[0]->id)) {
            if(isset($this->session->userdata ('user_details')[0]->user_type)){
                $redirect = 'user/onlinetest';
            } else {
                $redirect = 'dashboard/';
            }
        } else {
            $redirect = 'login';
        }
      

        foreach($_FILES as $name => $fileInfo)
        { 
             if(!empty($_FILES[$name]['name'])){
                $newname=$this->upload(); 
                $data[$name]=$newname;
                $sheets =$newname;
             }
        }

                $data['branch'] = $this->input->post('branch');
                $data['year'] = $this->input->post('year');
                $data['semister'] = $this->input->post('semister');
                $data['subject'] = $this->input->post('subject');
                $data['faculty'] = $this->input->post('faculty');
                $data['test'] = $sheets;
                $data['updated_date'] = date('y-m-d');
            
               
                unset($data['submit']);
                $this->user_model->insertRow('onlinetest', $data);
                $this->session->set_flashdata('messagePr', 'You have uploaded the Test questions Successfully..!' );
                redirect( base_url().'user/onlinetest', 'refresh');}  

public function upload_assignment_professor() {

        $data = $this->input->post();
        $sheets = 'notes.png';
        
        if(isset($this->session->userdata ('user_details')[0]->id)) {
            if(isset($this->session->userdata ('user_details')[0]->user_type)){
                $redirect = 'user/assignment';
            } else {
                $redirect = 'dashboard/';
            }
        } else {
            $redirect = 'login';
        }
      

        foreach($_FILES as $name => $fileInfo)
        { 
             if(!empty($_FILES[$name]['name'])){
                $newname=$this->upload(); 
                $data[$name]=$newname;
                $sheets =$newname;
             }
        }

                $data['user_id'] = $this->input->post('user_id');
                $data['branch'] = $this->input->post('branch');
                $data['year'] = $this->input->post('year');
                $data['semister'] = $this->input->post('semister');
                $data['subject'] = $this->input->post('subject');
                $data['faculty'] = 'NULL';
                $data['assignment_file'] = $sheets;
                $data['description'] = $this->input->post('description');
                $data['status'] = 'Uploaded';
                $data['updated_date'] = date('y-m-d');
            
               
                unset($data['submit']);
                $this->user_model->insertRow('assign', $data);
                $this->session->set_flashdata('messagePr', 'You have uploaded the Assignment Successfully..!' );
                redirect( base_url().'user/assignment', 'refresh');}  

     /**
     * This function is used to add subjects
     * @return Void
     */

    public function add_subject() {
               
                $data['branch'] = $this->input->post('branch');
                $data['year'] = $this->input->post('year');
                $data['semister'] = $this->input->post('semister');
                $data['subject'] = $this->input->post('subject');
                $data['faculty'] = $this->input->post('faculty');               
                $data['updated_date'] =date('d-m-y');               
                unset($data['submit']);
                $this->user_model->insertRow('map_data', $data);
                $this->session->set_flashdata('messagePr', 'You have added Successfully..!' );
                redirect( base_url().'dashboard/subjects', 'refresh');   
                   }

                   
    public function submit_test() {
               
                $data['user_id'] = $this->input->post('user_id');
                $data['first'] = $this->input->post('first');
                $data['second'] = $this->input->post('second');
                $data['third'] = $this->input->post('third');
                $data['fourth'] = $this->input->post('fourth');
                $data['fiveth'] = $this->input->post('fiveth');
                $data['sixth'] = $this->input->post('sixth');
                $data['seventh'] = $this->input->post('seventh');
                $data['eighth'] = $this->input->post('eighth');
                $data['nineth'] = $this->input->post('nineth');
                $data['tenth'] = $this->input->post('tenth');
               
                unset($data['submit']);
                $this->user_model->insertRow('test', $data);
                $this->session->set_flashdata('messagePr', 'You have submitted test Successfully..!' );
                redirect( base_url().'user/onlinetest', 'refresh');   
                   }


      public function add_feedback_student() {
               
                $data['user_id'] = $this->input->post('user_id');
                $data['description'] = $this->input->post('description');
                $data['type'] = $this->input->post('type');
                $data['reply'] = 'InProcess';
                $data['reply_by'] = 'Replying..!';               
                $data['updated_date'] =date('d-m-y');               
                unset($data['submit']);
                $this->user_model->insertRow('feedback', $data);
                $this->session->set_flashdata('messagePr', 'You have added Successfully..!' );
                redirect( base_url().'user/feedback', 'refresh');   
                   }               

                     /**
     * This function is used to delete users
     * @return Void
     */
    public function delete_subject($id){
        $this->is_login(); 
        $ids = explode('-', $id);
        foreach ($ids as $id) {
            $this->user_model->delete_id($id,'id','map_data'); 
        }
       $this->session->set_flashdata('messagePr', 'Your data is deleted Successfully..');
       redirect(base_url().'dashboard/subjects', 'refresh');
    }

     public function delete_test($id){
        $this->is_login(); 
        $ids = explode('-', $id);
        foreach ($ids as $id) {
            $this->user_model->delete_id($id,'id','onlinetest'); 
        }
       $this->session->set_flashdata('messagePr', 'Your data is deleted Successfully..');
       redirect(base_url().'user/onlinetest', 'refresh');
    }
    public function delete_feedback($id){
        $this->is_login(); 
        $ids = explode('-', $id);
        foreach ($ids as $id) {
            $this->user_model->delete_id($id,'id','feedback'); 
        }
       $this->session->set_flashdata('messagePr', 'Your data is deleted Successfully..');
       redirect(base_url().'user/feedback', 'refresh');
    }


    public function delete_result($id){
        $this->is_login(); 
        $ids = explode('-', $id);
        foreach ($ids as $id) {
            $this->user_model->delete_id($id,'id','results'); 
        }
       $this->session->set_flashdata('messagePr', 'Your data is deleted Successfully..');
       redirect(base_url().'user/results', 'refresh');
    }

    public function approved_assignment($id) {
          $this->is_login(); 
        $ids = explode('-', $id);
        foreach ($ids as $id) {
            $this->user_model->update_id($id,'status','Approved','assign'); 
        }
       $this->session->set_flashdata('messagePr', 'Your Assignment is Approved Successfully..');
       redirect(base_url().'user/assignment', 'refresh');
    }


    public function delete_assignment($id) {
          $this->is_login(); 
        $ids = explode('-', $id);
        foreach ($ids as $id) {
        $this->user_model->delete_id($id,'id','assign'); 
        }
       $this->session->set_flashdata('messagePr', 'Your Assignment is Deleted Successfully..');
       redirect(base_url().'user/assignment', 'refresh');
    }

      public function reject_assignment($id) {
          $this->is_login(); 
        $ids = explode('-', $id);
        foreach ($ids as $id) {
            $this->user_model->update_id($id,'status','Rejected','assign'); 
        }
       $this->session->set_flashdata('messagePr', 'Your Assignment is Rejected..Please write Again');
       redirect(base_url().'user/assignment', 'refresh');
    }
    
      /**
     * This function is used to add user
     * @return Void
     */

    public function add_results() {
               
                $data['link'] = $this->input->post('link');
                $data['description'] = $this->input->post('description');
                $data['year'] = $this->input->post('year');
                $data['branch'] = $this->input->post('branch');
                $data['semister'] = $this->input->post('semister');
                $data['updated_date'] =date('d-m-y');               
                unset($data['submit']);
                $this->user_model->insertRow('results', $data);
                $this->session->set_flashdata('messagePr', 'You have Updated Successfully..!' );
                redirect( base_url().'user/results', 'refresh');   
                   }

     public function update_reply_feedback($id='') {   

            $id = $this->input->post('id');
            $data['reply'] = $this->input->post('reply');
            $data['reply_by'] = $this->input->post('reply_by');

            $this->user_model->updateRow('feedback', 'id', $id, $data);
            $this->session->set_flashdata('messagePr', 'Your Replied Successfully..');
            redirect( base_url().'user/feedback', 'refresh');
       
    }
    

       /**
     * This function is used to check user logged in
     * @return Void
     */

     public function is_login(){ 
      if(isset($_SESSION['user_details'])){
          return true;
      }else{
         redirect( base_url().'login/', 'refresh');
      }
  }

  /**
     * This function is used to upload file
     * @return Void
     */
    function upload() {
        foreach($_FILES as $name => $fileInfo)
        {
            $filename=$_FILES[$name]['name'];
            $tmpname=$_FILES[$name]['tmp_name'];
            $exp=explode('.', $filename);
            $ext=end($exp);
            $newname=  $exp[0].'_'.time().".".$ext; 
            $config['upload_path'] = 'images/';
            $config['upload_url'] =  base_url().'images/';
            $config['allowed_types'] = "gif|jpg|jpeg|png|iso|dmg|zip|rar|doc|docx|xls|xlsx|ppt|pptx|csv|ods|odt|odp|pdf|rtf|sxc|sxi|txt|exe|avi|mpeg|mp3|mp4|3gp";
            $config['max_size'] = '2000000'; 
            $config['file_name'] = $newname;
            $this->load->library('upload', $config);
            move_uploaded_file($tmpname,"images/".$newname);
            return $newname;
        }
    }
}