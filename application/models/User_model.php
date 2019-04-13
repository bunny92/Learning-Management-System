<?php

class User_model extends CI_Model {

    private $table = "admin";

    public function __construct() {
        parent::__construct();
    }

  /**
      * This function is used authenticate user at login
      */
    function auth_user() {
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $this->db->where("(register_id='$email' OR email='$email')");
        $result = $this->db->get('users')->result();
        if(!empty($result)){       
            if (password_verify($password, $result[0]->password)) {       
               
                return $result;                    
            }
            else {             
                return false;
            }
        } else {
            return false;
        }
    }

    function check_exists($table='', $colom='',$colomValue=''){
        $this->db->where($colom, $colomValue);
        $res = $this->db->get($table)->row();
        if(!empty($res)){ return false;} else{ return true;}
    }

    function get_users($userID = '') {

        if(isset($userID) && $userID !='') {
            $this->db->where('id', $userID); 
        } else if($this->session->userdata('user_details')[0]->user_type == 'admin') {
            $this->db->where('user_type', 'admin'); 
        } else {
            $this->db->where('users.id !=', '1'); 
        }
        $result = $this->db->get('users')->result();
        return $result;
    }

    /**
      * This function is used to Update record in table  
      */
    public function updateRow($table, $col, $colVal, $data) {
        $this->db->where($col,$colVal);
        $this->db->update($table,$data);
        return true;
    }

    /**
      * This function is used to Insert record in table  
      */
    public function insertRow($table, $data){
        $this->db->insert($table, $data);
        return  $this->db->insert_id();
    }

        /**
     * This function is used to delete user
     * @param: $id - id of user table
     */
    function delete($id='') {
        $this->db->where('id', $id);  
        $this->db->delete('users'); 
    }

        /**
     * This function is used to delete user
     * @param: $id - id of user table
     */
    function delete_id($id='',$columnValue='',$tableName='') {
        $this->db->where($columnValue, $id);  
        $this->db->delete($tableName); 
    }

      public function getDataByid($tableName='',$columnValue='',$colume='')
    {  
    
        $this->db->select('*');
        $this->db->from($tableName);
         $this->db->where($colume , $columnValue);
        $query =  $this->db->get();
        return $result = $query->row();
    }

    /**
      * This function is used to select data form table  
      */
    function get_data_by($tableName='', $value='', $colum='',$condition='') {   
        if((!empty($value)) && (!empty($colum))) { 
            $this->db->where($colum, $value);
        }
        $this->db->select('*');
        $this->db->from($tableName);
        $query = $this->db->get();
        return $query->result();
    }

    function update_id($value="",$colom="",$colomValue="",$tableName="") {

          $query = $this->db->query("update ".$tableName." set  ".$colom." =  '".$colomValue."' where id = ".$value."");
          return TRUE;
   
    }
    
    function get_notes_data(){
        $query = $this->db->query("SELECT a.*,b.name FROM `notes` a
LEFT JOIN users b on b.id = a.id");
        return $query->result();
    }
    
    function get_attendance_prof($value='',$tableName){
        $query = $this->db->query("SELECT a.* ,b.name FROM ".$tableName." a
left join users b on  a.student_id = b.register_id
WHERE a.professor_id='".$value."'");
        return $query->result();
    }
    
     function get_attendance_student($value='',$tableName){
        $query = $this->db->query("SELECT a.* ,b.name FROM ".$tableName." a
left join users b on  a.student_id = b.register_id
WHERE a.student_id='".$value."'");
        return $query->result();
    }

    function get_join_data($tableName='', $value=''){
        $query = $this->db->query("select a.* from ".$tableName." a, users b where a.user_id = b.id and a.user_id = ".$value."");
        return $query->result();
    }

    function get_exam_cell_NA() {
        $query = $this->db->query("select a.* from users a where a.user_type='Professor' and a.register_id not in(SELECT faculty_id from examination_cell)");
        return $query->result();
    }

     function get_exam_cell() {
        $query = $this->db->query("select * from users a, examination_cell b where a.register_id = b.faculty_id");
        return $query->result();
    }
    
    function get_exam_cell_id($id) {
        $query = $this->db->query("select * from users a, examination_cell b where a.register_id = b.faculty_id and b.faculty_id ='".$id."'");
        return $query->result();
    }

    function getData_count($value='') {
        $query = $this->db->query("select count(id) as number from users a where a.user_type = '".$value."'");
        return $query->result();
    }

    function getPost_home() {
        $query = $this->db->query("select * from achivement_posts WHERE position='home' and updated_date > DATE_SUB(NOW(), INTERVAL 5 DAY) LIMIT 5");
        return $query->result();
    }
     function getPost_depart() {
        $query = $this->db->query("select a.status, a.description as post_name,b.description as event_name, a.updated_date as post_date,b.updated_date as event_date,b.sheet,b.type from achivement_posts a
LEFT JOIN workshop_events b on  a.position= b.position 
where a.position= 'department' and  a.updated_date > DATE_SUB(NOW(), INTERVAL 5 DAY) LIMIT 5");
        return $query->result();
    }

    function getImages() {
        $query = $this->db->query("SELECT * FROM `workshop_events` where position='home'");
        return $query->result();
    }
     public function logout() {
        $user_data = $this->session->all_userdata();
        foreach ($user_data as $key => $value) {
            if ($key != 'session_id' && $key != 'ip_address' && $key != 'user_agent' && $key != 'last_activity') {
                $this->session->unset_userdata($key);
            }
        }
        $this->session->sess_destroy();
        redirect("/");
    }

    function getFaculty(){
   $query = $this->db->query("SELECT name FROM users where user_type ='Professor'");

    if ($query->num_rows() > 0){
        foreach($query->result() as $row) {
            $data[] = $row;
        }
        return $data;
    }
  }

   function getData($tableName="",$value=""){
   $query = $this->db->query("SELECT ".$value." FROM ".$tableName."");

    if ($query->num_rows() > 0){
        foreach($query->result() as $row) {
            $data[] = $row;
        }
        return $data;
    }
  }

}
