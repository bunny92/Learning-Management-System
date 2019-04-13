<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model("user_model");
    }

    public function index() {
        $this->is_login();
        if(!isset($id) || $id == '') {
            $id = $this->session->userdata ('user_details')[0]->id;
        }
        $data['professor'] = $this->user_model->getData_count('Professor');
        $data['student'] = $this->user_model->getData_count('Student');
        $data['user_data'] = $this->user_model->get_users($id);
        $this->load->view('dashboard', $data);
    }

    public function users_student() {
     
        $this->is_login();
        if(!isset($id) || $id == '') {
            $id = $this->session->userdata ('user_details')[0]->id;
        }
         $data['user_data'] = $this->user_model->get_users($id);
        $data['student'] = $this->user_model->get_data_by('users');
        $this->load->view('student', $data);
    }

    public function users_professor() {
          $this->is_login();
        if(!isset($id) || $id == '') {
            $id = $this->session->userdata ('user_details')[0]->id;
        }
         $data['user_data'] = $this->user_model->get_users($id);
        $data['faculty'] = $this->user_model->get_data_by('users');
        $this->load->view('professor', $data);
    }

     public function time_table() {
        $this->is_login();
        if(!isset($id) || $id == '') {
            $id = $this->session->userdata ('user_details')[0]->id;
        }
        $data['user_data'] = $this->user_model->get_users($id);
        $data['time_table'] = $this->user_model->get_data_by('time_table');
        $this->load->view('time_table', $data);
    }

     public function subjects() {
        $this->is_login();
        if(!isset($id) || $id == '') {
            $id = $this->session->userdata ('user_details')[0]->id;
        }
        $data['user_data'] = $this->user_model->get_users($id);
        $data['faculty'] = $this->user_model->getFaculty();
        $data['subjects'] = $this->user_model->get_data_by('map_data');
        $this->load->view('subjects', $data);
    }

    public function workshop_events() {
        $this->is_login();
        if(!isset($id) || $id == '') {
            $id = $this->session->userdata ('user_details')[0]->id;
        }
        $data['user_data'] = $this->user_model->get_users($id);
        $this->load->view('workshop_events_admin', $data);
    }

     public function upload_notes() {
        $this->is_login();
        if(!isset($id) || $id == '') {
            $id = $this->session->userdata ('user_details')[0]->id;
        }
         $type = $this->session->userdata ('user_details')[0]->user_type;
       
        if($type == 'student') {
            $data['user_data'] = $this->user_model->get_users($id);
            $data['notes'] = $this->user_model->get_data_by('notes');
        }else {
           $data['subject'] = $this->user_model->getData('map_data','subject');
         $data['branch'] = $this->user_model->getData('map_data','branch');  
        $data['user_data'] = $this->user_model->get_users($id);
        $data['notes'] = $this->user_model->get_join_data('notes',$id);
        }
        
        $this->load->view('material', $data);
      }
    /**
     * Type : view
     * Nature : Faculty Page for Basepath
     */
     public function faculty_details(){
         $this->is_login();
        if(!isset($id) || $id == '') {
            $id = $this->session->userdata ('user_details')[0]->id;
        }
        $data['user_data'] = $this->user_model->get_users($id);
        $data['professor'] = $this->user_model->get_data_by('users','Professor','user_type');
        $this->load->view('faculty_details_admin', $data); 

    }

     /**
     * Type : view
     * Nature : Faculty Page for Basepath
     */
     public function student_details(){
         $this->is_login();
        if(!isset($id) || $id == '') {
            $id = $this->session->userdata ('user_details')[0]->id;
        }
        $data['user_data'] = $this->user_model->get_users($id);
        $data['student'] = $this->user_model->get_data_by('users','Student','user_type');
        $this->load->view('student_details', $data); 

    }

    /**
     * Type : view
     * Nature : Placement Info Page for Basepath
     */
     public function placement_info(){
         $this->is_login();
        if(!isset($id) || $id == '') {
            $id = $this->session->userdata ('user_details')[0]->id;
        }
        $data['user_data'] = $this->user_model->get_users($id);
        $data['placement'] = $this->user_model->get_data_by('placement_info');
        $this->load->view('placement_info_admin', $data); 

    }
    
      public function achivement_posts(){
         $this->is_login();
        if(!isset($id) || $id == '') {
            $id = $this->session->userdata ('user_details')[0]->id;
        }
        $data['user_data'] = $this->user_model->get_users($id);
        $data['posts'] = $this->user_model->get_data_by('achivement_posts');
        $this->load->view('achivement_posts', $data); 

    }
    
     /**
     * Type : view
     * Nature : Attendence Report Page for Basepath
     */
     public function attendence_report(){
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
       
        $this->load->view('attendence_report', $data); 
        

    }
    
    /**
     * Type : view
     * Nature : Placement Info for Professor Page for Basepath
     */
     public function examination_cell_professor(){
         $this->is_login();
        if(!isset($id) || $id == '') {
            $register_id = $this->session->userdata ('user_details')[0]->register_id;
            $id = $this->session->userdata ('user_details')[0]->id;
        }
        $data['user_data'] = $this->user_model->get_users($id);
        $data['examination'] = $this->user_model->get_exam_cell_id($register_id);
        $this->load->view('examination_cell_professor', $data); 
        

    }
    
     /**
     * This function is used to add user
     * @return Void
     */

    public function add_posts() {
               
                $data['status'] = $this->input->post('status');
                $data['description'] = $this->input->post('description');
                $data['type'] = $this->input->post('type');
                $data['position'] = $this->input->post('position');
                $data['updated_date'] =date('d-m-y');               
                unset($data['submit']);
                $this->user_model->insertRow('achivement_posts', $data);
                $this->session->set_flashdata('messagePr', 'You have Posted Successfully..!' );
                redirect( base_url().'dashboard/achivement_posts', 'refresh');   
                   }
    
    
    public function change_password() {
        $this->is_login();
        if(!isset($id) || $id == '') {
            $id = $this->session->userdata ('user_details')[0]->id;
        }
        $data['user_data'] = $this->user_model->get_users($id);
        $this->load->view('change_password', $data);
    }

      public function view_notes() {
        $this->is_login();
        if(!isset($id) || $id == '') {
            $id = $this->session->userdata ('user_details')[0]->id;
        }
        $type = $this->session->userdata ('user_details')[0]->user_type;
        $data['user_data'] = $this->user_model->get_users($id);
        if($type == 'Professor') {
          $data['notes'] = $this->user_model->get_join_data('notes',$id);
        }else {
          
             $data['notes'] = $this->user_model->get_notes_data();
        }
        
        $this->load->view('view_notes', $data);
      }

      public function add_examation_cell() {
                $data['choose_faculty'] = $this->input->post('choose_faculty');
                $data['faculty_name'] = $this->input->post('faculty_name');
                $data['faculty_email'] = $this->input->post('faculty_email');
                $data['faculty_id'] = $this->input->post('faculty_id');
                $data['time'] = $this->input->post('time');
                $data['faculty_department'] = $this->input->post('faculty_department');
                $data['exam_date'] = $this->input->post('exam_date');
                $data['room_no'] = $this->input->post('room_no');               
                unset($data['submit']);
                $this->user_model->insertRow('examination_cell', $data);
                $this->session->set_flashdata('messagePr', 'You have Assigned Successfully..!' );
                redirect( base_url().'dashboard/examination_cell', 'refresh');
      }

    

     /**
     * This function is used to add and update users
     * @return Void
     */
    public function add_edit($id='') {   

            if($this->input->post('password') != '') {
                if($this->input->post('currentpassword') != '') {
                    $old_row =  $this->user_model->getDataByid('users', $this->input->post('id'), 'id');
                    if(password_verify($this->input->post('currentpassword'), $old_row->password)){
                        if($this->input->post('password') == $this->input->post('confirmPassword')){
                            $password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
                            $data['password']= $password;     
                        } else {
                            $this->session->set_flashdata('messagePr', 'Password and confirm password should be same...');
                            redirect( base_url().'dashboard/change_password', 'refresh');
                        }
                    } else {
                        $this->session->set_flashdata('messagePr', 'Enter Valid Current Password...');
                        redirect( base_url().'dashboard/change_password', 'refresh');
                    }
                } else {
                    $this->session->set_flashdata('messagePr', 'Current password is required');
                    redirect( base_url().'dashboard/change_password', 'refresh');
                }
            }
            $id = $this->input->post('id');
            unset($data['currentpassword']);
            unset($data['confirmPassword']);
            unset($data['id']);
            unset($data['user_type']);
            if(isset($data['edit'])){
                unset($data['edit']);
            }
            if($data['password'] == ''){
                unset($data['password']);
            }
            $this->user_model->updateRow('users', 'id', $id, $data);
            $this->session->set_flashdata('messagePr', 'Your data updated Successfully..');
            redirect( base_url().'dashboard/change_password', 'refresh');
       
    }

       public function upload_file() {

        $data = $this->input->post();
        $notes = 'notes.png';
        
        if(isset($this->session->userdata ('user_details')[0]->id)) {
            if($this->input->post('user_id') == $this->session->userdata ('user_details')[0]->id){
                $redirect = 'dashboard/upload_notes';
            } else {
                $redirect = 'users';
            }
        } else {
            $redirect = 'login';
        }
      

        foreach($_FILES as $name => $fileInfo)
        { 
             if(!empty($_FILES[$name]['name'])){
                $newname=$this->upload(); 
                $data[$name]=$newname;
                $notes =$newname;
             }
        }

                $data['user_id'] = $this->input->post('user_id');
                $data['branch'] = $this->input->post('branch');
                $data['subject'] = $this->input->post('subject');
                $data['notes'] = $notes;
                $data['type'] = $this->input->post('type');
            
               
                unset($data['submit']);
                $this->user_model->insertRow('notes', $data);
                $this->session->set_flashdata('messagePr', 'You have uploaded the notes Successfully..!' );
                redirect( base_url().'dashboard/upload_notes', 'refresh');
            }



       public function upload_timetable() {

        $data = $this->input->post();
        $sheets = 'notes.png';
        
        if(isset($this->session->userdata ('user_details')[0]->id)) {
            if(isset($this->session->userdata ('user_details')[0]->user_type)){
                $redirect = 'dashboard/time_table';
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
                $data['file'] = $sheets;
                $data['updated_date'] = date('y-m-d');
            
               
                unset($data['submit']);
                $this->user_model->insertRow('time_table', $data);
                $this->session->set_flashdata('messagePr', 'You have uploaded the Time Table Successfully..!' );
                redirect( base_url().'dashboard/time_table', 'refresh');}           



function add_events() {

        $data = $this->input->post();
        $sheets = 'notes.png';
        
        if(isset($this->session->userdata ('user_details')[0]->id)) {
            if(isset($this->session->userdata ('user_details')[0]->user_type)){
                $redirect = 'dashboard/workshop_events';
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

                $data['type'] = $this->input->post('type');
                $data['description'] = $this->input->post('description');
                $data['position'] = $this->input->post('position');
                $data['sheet'] = $sheets;
                $data['updated_date'] = date('y-m-d');
            
               
                unset($data['submit']);
                $this->user_model->insertRow('workshop_events', $data);
                $this->session->set_flashdata('messagePr', 'You have uploaded the File Successfully..!' );
                redirect( base_url().'dashboard/workshop_events', 'refresh');}  
    /**
     * This function is used to delete users
     * @return Void
     */
    public function delete($id){
        $this->is_login(); 
        $ids = explode('-', $id);
        foreach ($ids as $id) {
            $this->user_model->delete($id); 
        }
       $this->session->set_flashdata('messagePr', 'Your data is deleted Successfully..');
       redirect(base_url().'dashboard/users', 'refresh');
    }

     /**
     * This function is used to delete users
     * @return Void
     */
    public function delete_student($id){
        $this->is_login(); 
        $ids = explode('-', $id);
        foreach ($ids as $id) {
            $this->user_model->delete($id); 
        }
       $this->session->set_flashdata('messagePr', 'Your data is deleted Successfully..');
       redirect(base_url().'dashboard/users_student', 'refresh');
    }
      /**
     * This function is used to delete users
     * @return Void
     */
    public function delete_faculty($id){
        $this->is_login(); 
        $ids = explode('-', $id);
        foreach ($ids as $id) {
            $this->user_model->delete($id); 
        }
       $this->session->set_flashdata('messagePr', 'Your data is deleted Successfully..');
       redirect(base_url().'dashboard/users_professor', 'refresh');
    }

     /**
     * This function is used to delete users
     * @return Void
     */
    public function delete_notes($id){
        $this->is_login(); 
        $ids = explode('-', $id);
        foreach ($ids as $id) {
            $this->user_model->delete_id($id,'id','notes'); 
        }
       $this->session->set_flashdata('messagePr', 'Your data is deleted Successfully..');
       redirect(base_url().'dashboard/view_notes', 'refresh');
    }

       /**
     * This function is used to delete users
     * @return Void
     */
    public function delete_time_table($id){
        $this->is_login(); 
        $ids = explode('-', $id);
        foreach ($ids as $id) {
            $this->user_model->delete_id($id,'id','time_table'); 
        }
       $this->session->set_flashdata('messagePr', 'Your data is deleted Successfully..');
       redirect(base_url().'dashboard/time_table', 'refresh');
    }

     /**
     * This function is used to delete Examcell users
     * @return Void
     */

    public function delete_examcell($faculty_id)
    {
      $this->is_login(); 
        $ids = explode('-', $faculty_id);
        foreach ($ids as $id) {
            $this->user_model->delete_id($id,'faculty_id','examination_cell'); 
        }
       $this->session->set_flashdata('messagePr', 'Your data deleted Successfully..');
       redirect(base_url().'dashboard/examination_cell', 'refresh');

    }
   
    /**
     * This function is used to add user
     * @return Void
     */

    public function add_user_student() {

                $data = $this->input->post();
                $password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
                $checkValue = $this->user_model->check_exists('users','email',$this->input->post('email'));
                if($checkValue==false)  {  
                    $this->session->set_flashdata('messagePr', 'This Email Already Registered with us..');
                    redirect( base_url().'dashboard/users_student', 'refresh');
                }
                $checkValue1 = $this->user_model->check_exists('users','register_id',$this->input->post('register_id'));
                if($checkValue1==false) {  
                    $this->session->set_flashdata('messagePr', 'Student ID/Employee ID Already Registered with us..');
                    redirect( base_url().'dashboard/users_student', 'refresh');
                }
               
                  $data['password'] = $password;
                  $data['register_id'] = $this->input->post('register_id');
                  $data['register_date'] = date('y-m-d');
                  $data['date_of_birth'] = $this->input->post('date_of_birth');
                  $data['date_of_join'] = $this->input->post('date_of_join');
                  $data['contact'] = $this->input->post('contact');
                  $data['city'] = $this->input->post('city');
                  $data['department'] = $this->input->post('department');
                  $data['address'] = $this->input->post('address');
                  $data['user_type'] = $this->input->post('user_type');

                if(isset($data['password_confirmation'])){
                    unset($data['password_confirmation']);    
                }
                if(isset($data['call_from'])){
                    unset($data['call_from']);    
                }
                unset($data['submit']);
                $this->user_model->insertRow('users', $data);
                redirect( base_url().'dashboard/users_student', 'refresh');
    }

     public function add_user_professor() {

                $data = $this->input->post();
                $password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
                $checkValue = $this->user_model->check_exists('users','email',$this->input->post('email'));
                if($checkValue==false)  {  
                    $this->session->set_flashdata('messagePr', 'This Email Already Registered with us..');
                    redirect( base_url().'dashboard/users_professor', 'refresh');
                }
                $checkValue1 = $this->user_model->check_exists('users','register_id',$this->input->post('register_id'));
                if($checkValue1==false) {  
                    $this->session->set_flashdata('messagePr', 'Student ID/Employee ID Already Registered with us..');
                    redirect( base_url().'dashboard/users_professor', 'refresh');
                }
               
                  $data['password'] = $password;
                  $data['register_id'] = $this->input->post('register_id');
                  $data['register_date'] = date('y-m-d');
                  $data['date_of_birth'] = $this->input->post('date_of_birth');
                  $data['date_of_join'] = $this->input->post('date_of_join');
                  $data['contact'] = $this->input->post('contact');
                  $data['city'] = $this->input->post('city');
                  $data['department'] = $this->input->post('department');
                  $data['address'] = $this->input->post('address');
                  $data['user_type'] = $this->input->post('user_type');

                if(isset($data['password_confirmation'])){
                    unset($data['password_confirmation']);    
                }
                if(isset($data['call_from'])){
                    unset($data['call_from']);    
                }
                unset($data['submit']);
                $this->user_model->insertRow('users', $data);
                redirect( base_url().'dashboard/users_professor', 'refresh');
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

    public function import_users_student(){
  if(isset($_POST["import"]))
  {
      $filename=$_FILES["file"]["tmp_name"];
      if($_FILES["file"]["size"] > 0)
        {
          $file = fopen($filename, "r");
           while (($importdata = fgetcsv($file, 10000, ",")) !== FALSE)
           {
                $checkValue = $this->user_model->check_exists('users','email',$importdata[5]);
                if($checkValue==false)  {  
                    $this->session->set_flashdata('messagePr', 'This Email Already Registered with us..');
                    redirect( base_url().'dashboard/users_student', 'refresh');
                }
                $checkValue1 = $this->user_model->check_exists('users','register_id',$importdata[0]);
                if($checkValue1==false) {  
                    $this->session->set_flashdata('messagePr', 'Student ID/Employee ID Already Registered with us..');
                    redirect( base_url().'dashboard/users_student', 'refresh');
                }
               

                  $data = array(
                       'register_id' => $importdata[0],
                       'name' =>$importdata[1],
                       'date_of_birth' => $importdata[2],
                       'date_of_join' => $importdata[3],
                       'contact' => $importdata[4],
                       'email' => $importdata[5],
                       'password' => password_hash($importdata[6], PASSWORD_DEFAULT),
                       'address' => $importdata[7],
                       'city' => $importdata[8],
                       'department' => $importdata[9],
                       'user_type' => $importdata[10],
                       'register_date' => $importdata[11],
                      );
            $this->user_model->insertRow('users', $data);
           }                    
          fclose($file);
            $this->session->set_flashdata('messagePr', 'Data are imported successfully..');
             redirect( base_url().'dashboard/users_student', 'refresh');
                    }else{
            $this->session->set_flashdata('messagePr', 'Something went wrong..');
             redirect( base_url().'dashboard/users_student', 'refresh');
                }
              }else{
            $this->session->set_flashdata('messagePr', 'Error While Uploading!..');
             redirect( base_url().'dashboard/users_student', 'refresh');
            }
}

public function import_users_professor(){
  if(isset($_POST["import"]))
  {
      $filename=$_FILES["file"]["tmp_name"];
      if($_FILES["file"]["size"] > 0)
        {
          $file = fopen($filename, "r");
           while (($importdata = fgetcsv($file, 10000, ",")) !== FALSE)
           {
                $checkValue = $this->user_model->check_exists('users','email',$importdata[5]);
                if($checkValue==false)  {  
                    $this->session->set_flashdata('messagePr', 'This Email Already Registered with us..');
                    redirect( base_url().'dashboard/users_professor', 'refresh');
                }
                $checkValue1 = $this->user_model->check_exists('users','register_id',$importdata[0]);
                if($checkValue1==false) {  
                    $this->session->set_flashdata('messagePr', 'Student ID/Employee ID Already Registered with us..');
                    redirect( base_url().'dashboard/users_professor', 'refresh');
                }
               

                  $data = array(
                       'register_id' => $importdata[0],
                       'name' =>$importdata[1],
                       'date_of_birth' => $importdata[2],
                       'date_of_join' => $importdata[3],
                       'contact' => $importdata[4],
                       'email' => $importdata[5],
                       'password' => password_hash($importdata[6], PASSWORD_DEFAULT),
                       'address' => $importdata[7],
                       'city' => $importdata[8],
                       'department' => $importdata[9],
                       'user_type' => $importdata[10],
                       'register_date' => $importdata[11],
                      );
            $this->user_model->insertRow('users', $data);
           }                    
          fclose($file);
            $this->session->set_flashdata('messagePr', 'Data are imported successfully..');
             redirect( base_url().'dashboard/users_professor', 'refresh');
                    }else{
            $this->session->set_flashdata('messagePr', 'Something went wrong..');
             redirect( base_url().'dashboard/users_professor', 'refresh');
                }
              }else{
            $this->session->set_flashdata('messagePr', 'Error While Uploading!..');
             redirect( base_url().'dashboard/users_professor', 'refresh');
            }
}

public function import_placement(){
  if(isset($_POST["import"]))
  {
      $filename=$_FILES["file"]["tmp_name"];
      if($_FILES["file"]["size"] > 0)
        {
          $file = fopen($filename, "r");
           while (($importdata = fgetcsv($file, 10000, ",")) !== FALSE)
           {
                $checkValue = $this->user_model->check_exists('placement_info','email',$importdata[3]);
                if($checkValue==false)  {  
                    $this->session->set_flashdata('messagePr', 'This Email Already Registered with us..');
                    redirect( base_url().'dashboard/placement_info', 'refresh');
                }
                $checkValue1 = $this->user_model->check_exists('placement_info','register_id',$importdata[0]);
                if($checkValue1==false) {  
                    $this->session->set_flashdata('messagePr', 'Student ID/Employee ID Already Registered with us..');
                    redirect( base_url().'dashboard/placement_info', 'refresh');
                }
               

                  $data = array(
                       'register_id' => $importdata[0],
                       'name' =>$importdata[1],
                       'branch' => $importdata[2],
                       'email' => $importdata[3],
                       'company_name' => $importdata[4],
                       'package' => $importdata[5],
                       'year_of_placed' => $importdata[6],
                       'updated_date' => date('y-m-d')
                      );
            $this->user_model->insertRow('placement_info', $data);
           }                    
          fclose($file);
            $this->session->set_flashdata('messagePr', 'Data are imported successfully..');
             redirect( base_url().'dashboard/placement_info', 'refresh');
                    }else{
            $this->session->set_flashdata('messagePr', 'Something went wrong..');
             redirect( base_url().'dashboard/placement_info', 'refresh');
                }
              }else{
            $this->session->set_flashdata('messagePr', 'Error While Uploading!..');
             redirect( base_url().'dashboard/placement_info', 'refresh');
            }
}
    
public function import_attendence(){
  if(isset($_POST["import"]))
  {
      $filename=$_FILES["file"]["tmp_name"];
      if($_FILES["file"]["size"] > 0)
        {
          $file = fopen($filename, "r");
           while (($importdata = fgetcsv($file, 10000, ",")) !== FALSE)
           {
               $percentage = ($importdata[6] / $importdata[5]) *100;
             
                  $data = array(
                       'professor_id' => $_POST["professor_id"],
                       'student_id' => $importdata[0],
                       'branch' => $importdata[1],
                       'subject' => $importdata[2],
                       'year' => $importdata[3],
                       'semister' => $importdata[4],
                       'total_no_class' => $importdata[5],
                       'no_class_present' => $importdata[6],
                       'percentage' => $percentage,
                       'updated_date' => date('y-m-d')
                      );
            $this->user_model->insertRow('attendence_report', $data);
           }                    
          fclose($file);
            $this->session->set_flashdata('messagePr', 'Data are imported successfully..');
             redirect( base_url().'user/attendance', 'refresh');
                    }else{
            $this->session->set_flashdata('messagePr', 'Something went wrong..');
             redirect( base_url().'user/attendance', 'refresh');
                }
              }else{
            $this->session->set_flashdata('messagePr', 'Error While Uploading!..');
             redirect( base_url().'user/attendance', 'refresh');
            }
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
}
