<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

 

class Admin extends CI_Controller {

    public function __construct() { 
        parent::__construct();
        
        // Load the user model
        $this->load->model('Admin_model');

        $this->load->model('Import_model', 'import');
      


$merchant_email='gm@yellostack.com';
  $secret_key='XPEgOOuGcs2B7yWrYxYk9NdSNbwdTQOQGs7ugCbs4e4cM0EKxD4Hqhzet5snWgeCIl6ZXis2wwfiwT34w8LXpkbTqDgmTvYCR5BO';
  $merchant_id='10068158';



$params=array('merchant_email'=>$merchant_email,
                 'merchant_id'=>$merchant_id,
                 'secret_key'=>$secret_key);
                 
   $this->load->library('paytabs',$params);



    }

  /*Function to set JSON output*/
  public function output($Return=array()){
    /*Set response header*/
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: GET, OPTIONS");
    header("Content-Type: application/json; charset=UTF-8");
    /*Final JSON response*/
    exit(json_encode($Return));
  }

  public function changelanguage()
  {   
    
    $session = $this->session->userdata('language');
//echo $session ;
    if(!empty($session)){
      if($session == 'English'){
        
  $this->session->set_userdata('language', 'Arabic');
  $this->session->set_userdata('dir', 'rtl');
       
      }elseif($session == 'Arabic'){

        $this->session->set_userdata('language', 'English');
        $this->session->set_userdata('dir', 'ltr');

      }

    }else{
      $this->session->set_userdata('language', 'English');
      $this->session->set_userdata('dir', 'ltr');
       
    }
   

   //echo $this->session->userdata('language').' - '.$this->session->userdata('dir') ;
  }



 public function translation()
  {  
   $session = $this->session->userdata('username');
    if(empty($session)){ 
      redirect('admin');
    } 
    $data['title'] = 'String List';
    $data['stringdet'] = $this->db->get('translation_strings')->result_array();
    $this->load->view('admin/liststrings', $data);
  }


  public function addstring()
  {  
   $session = $this->session->userdata('username');
    if(empty($session)){ 
      redirect('admin');
    } 
    $data['title'] = 'Translation List';
     
    $this->load->view('admin/addstring', $data);
  }
   



  public function new_string()
  {   
     $session = $this->session->userdata('username');
    if(empty($session)){ 
      redirect('admin');
    }

   $Return = array('result'=>'', 'error'=>'');
       
    /* Server side PHP input validation */    
    if($this->input->post('string')==='') {
          $Return['error'] = "String required";
    }   else if($this->input->post('English')==='') {
       $Return['error'] = "English translation required";
    } else if($this->input->post('Arabic')==='') {
       $Return['error'] = "Arabic translation required";
    }
      
        
    if($Return['error']!=''){
          $this->output($Return);
      }
  
 

    $string = $this->input->post('string');
    $English = $this->input->post('English');
    $Arabic = $this->input->post('Arabic') ;
 
 
 
    $data = array(
         
    'string' => $string,
    'English' => $English,
    'Arabic' => $Arabic,
        
    );
 
    $result = $this->db->insert('translation_strings', $data);
    if ($result == TRUE) {
      
      //get setting info 
       
       $Return['result'] = 'Translation details added successfully.';
      
    } else {
      $Return['error'] =  'Bug. Something went wrong, please try again.';
    }
    $this->output($Return);
    exit;
  }

   
public function editstring()
  {
    $session = $this->session->userdata('username');
    if(empty($session)){ 
      redirect('admin');
    }
        
   $id = $this->uri->segment(3) ;
 
 

$this->db->select('id, string,English,Arabic');
$this->db->where('id',$id);
$query = $this->db->get('translation_strings');
$strings = $query->row() ;
 
 $data = array();
if (isset($strings)){
    $data  = array('id'=>$strings->id,'string'=>$strings->string,'English'=>$strings->English,'Arabic'=>$strings->Arabic);
}
  
    $this->load->view('admin/edit_string', $data);
  }


public function update_string()
  {   
     $session = $this->session->userdata('username');
    if(empty($session)){ 
      redirect('admin');
    }

   $Return = array('result'=>'', 'error'=>'');
       
    /* Server side PHP input validation */    
    if($this->input->post('string')==='') {
          $Return['error'] = "String required";
    }   else if($this->input->post('English')==='') {
       $Return['error'] = "English translation required";
    } else if($this->input->post('Arabic')==='') {
       $Return['error'] = "Arabic translation required";
    }
      
        
    if($Return['error']!=''){
          $this->output($Return);
      }
  

  $id =$this->input->post('stringid') ;

    $string = $this->input->post('string');
    $English = $this->input->post('English');
    $Arabic = $this->input->post('Arabic') ;
 
 
 
    $data = array(
         
    'string' => $string,
    'English' => $English,
    'Arabic' => $Arabic,
        
    );

    $this->db->where('id',$id);
    $result = $this->db->update('translation_strings', $data);
    if ($result == TRUE) {
      
      //get setting info 
       
       $Return['result'] = 'Translation details updated successfully.';
      
    } else {
      $Return['error'] =  'Bug. Something went wrong, please try again.';
    }
    $this->output($Return);
    exit;
  }

  public function index()
  {   
    $data['title'] = 'Almujer';
     $session = $this->session->userdata('language');
    if(empty($session)){ 
    $this->session->set_userdata('language', 'English');
    $this->session->set_userdata('dir', 'ltr');
    } 

    $this->load->view('admin/login', $data);
  }
   
  public function login() {
  
    $username = $this->input->post('username');
    $password = $this->input->post('password');
    /* Define return | here result is used to return user data and error for error message */
    $Return = array('result'=>'', 'error'=>'');
    
    /* Server side PHP input validation */
    if($username==='') {
      $Return['error'] = "Invalid Username";
    } elseif($password===''){
      $Return['error'] = "Invalid Password";
    }
    if($Return['error']!=''){
      $this->output($Return);
    }
    
    $data = array(
      'username' => $username,
      'password' => $password
      );
    $retdata = $this->Admin_model->login($data); 
     
    if ($retdata !== FALSE) {
      
        //$result = $this->User_model->read_user_information($username);


  $sql = 'SELECT * FROM users WHERE id = ?';
      $binds = array($retdata);
      $query = $this->db->query($sql, $binds);
    
    if ($query->num_rows() > 0) {
      $userdata = $query->result();
    }  



        $session_data = array(
        'user_id' => $userdata[0]->id,
        'username' => $userdata[0]->uname,
        'email' => $userdata[0]->uemail,
        );

        // Add user data in session
        $this->session->set_userdata('username', $session_data);
        $this->session->set_userdata('user_id', $session_data);


        $lan = $this->session->userdata('language');

        if(empty($lan)){
        $this->session->set_userdata('language', 'English');
        $this->session->set_userdata('dir', 'ltr');
        }
       
        
        $Return['result'] = "Logged In Successfully" ;      
           
        $this->output($Return);
         
      } else {
        $Return['error'] = "Invalid Credentials";
        $this->output($Return);
      }
  }

      
  public function dashboard()
  {   
     $session = $this->session->userdata('username');
    if(empty($session)){ 
      redirect('admin');
    }


    $data['tcourses']=$this->db->count_all_results('courses');
    $data['tstudents']=$this->db->count_all_results('students');
    $data['tcompany']=$this->db->count_all_results('company_reg');
    $data['tinstructor']=$this->db->count_all_results('instructor');
    $data['tcategory']=$this->db->count_all_results('category');

    $this->db->where('status','a');
    $data['tschedule']=$this->db->count_all_results('schedule');

     $sql = "SELECT SUM(s.price)tot from schedule s, student_transaction_det t where s.id=t.schedule_id";
     $query = $this->db->query($sql);
     $data['result'] =  $query->row()->tot;

    $data['title'] = 'Dashboard';
    $this->load->view('admin/dashboard', $data);
  }
   

  public function users()
  {  
   $session = $this->session->userdata('username');
    if(empty($session)){ 
      redirect('admin');
    } 
    $data['title'] = 'User List';
    $data['userdet'] = $this->db->get('users')->result_array();
    $this->load->view('admin/list_user', $data);
  }
   


 public function newuser()
  {   
     $session = $this->session->userdata('username');
    if(empty($session)){ 
      redirect('admin');
    }
    $data['title'] = 'Add new user';
    //$data['userdet'] = $this->db->get('users')->result_array();
    $this->load->view('admin/add_user', $data);
  }


  public function adduser()
  {   
     $session = $this->session->userdata('username');
    if(empty($session)){ 
      redirect('admin');
    }
   $Return = array('result'=>'', 'error'=>'');
       
    /* Server side PHP input validation */    
    if($this->input->post('uname')==='') {
          $Return['error'] = "Name required";
    } else if(preg_match("/^(\pL{1,}[ ]?)+$/u",$this->input->post('uname'))!=1) {
      $Return['error'] = "Only letters are allowed!!!";
    } else if($this->input->post('email')==='') {
       $Return['error'] = "Email required";
    } else if (!filter_var($this->input->post('email'), FILTER_VALIDATE_EMAIL)) {
      $Return['error'] = "Invalid email format";
    } else if($this->input->post('contactno')==='') {
       $Return['error'] = "Contact number required";;
    } else if(!preg_match('/^([0-9]*)$/', $this->input->post('contactno'))) {
       $Return['error'] = "Only numbers are allowed!!!";
    }
     else if($this->input->post('upassword')==='') {
       $Return['error'] = "Password required";
    } else if(strlen($this->input->post('upassword')) < 6) {
       $Return['error'] = "The password must be at least 6 characters.";
    } else if($this->input->post('upassword')!==$this->input->post('ucpassword')) {
       $Return['error'] = "The password confirmation does not match.";
    }
        
    if($Return['error']!=''){
          $this->output($Return);
      }
  
      
    $username = $this->Admin_model->clean_post($this->input->post('uname'));
    $email = $this->Admin_model->clean_post($this->input->post('email'));
 

    $password = md5($this->input->post('upassword'));
  
    $data = array(
     
     
    'uname' => $username,
    'uphone' => $this->input->post('contactno'),
    'uemail' => $this->input->post('email'),
    'upassword' => $password
      
    );
    $result = $this->db->insert('users', $data);
    if ($result == TRUE) {
      
      //get setting info 
       
       $Return['result'] = 'user added successfully.';
      
    } else {
      $Return['error'] =  'Bug. Something went wrong, please try again.';
    }
    $this->output($Return);
    exit;
  }

   public function edituser()
  {
    $session = $this->session->userdata('username');
    if(empty($session)){ 
      redirect('admin');
    }
        
    $id = $this->uri->segment(3) ;
 

$this->db->select('id, uname,uemail,uphone');
$this->db->where('id',$id);
$query = $this->db->get('users');
$users = $query->row() ;
 
 $data = array();
if (isset($users)){
    $data  = array('id'=>$users->id,'uname'=>$users->uname,'uemail'=>$users->uemail,'uphone'=>$users->uphone);
}
  
    $this->load->view('admin/edit_user', $data);
  }


 public function changepassword()
  {
    $session = $this->session->userdata('username');
    if(empty($session)){ 
      redirect('admin');
    }
        
    $id = $session['user_id'] ;
 

$this->db->select('id, uname,uemail,uphone');
$this->db->where('id',$id);
$query = $this->db->get('users');
$users = $query->row() ;
 
 $data = array();
if (isset($users)){
    $data  = array('id'=>$users->id,'uname'=>$users->uname,'uemail'=>$users->uemail,'uphone'=>$users->uphone);
}
  
    $this->load->view('admin/changepassword', $data);
  }


public function reset_pass()
  {   
     $session = $this->session->userdata('username');
    if(empty($session)){ 
      redirect('admin');
    }

   $Return = array('result'=>'', 'error'=>'');
       
    /* Server side PHP input validation */    
   if($this->input->post('upassword')==='') {
       $Return['error'] = "Password required";
    } else if(strlen($this->input->post('upassword')) < 6) {
       $Return['error'] = "The password must be at least 6 characters.";
    } else if($this->input->post('upassword')!==$this->input->post('ucpassword')) {
       $Return['error'] = "The password confirmation does not match.";
    }
      
        
    if($Return['error']!=''){
          $this->output($Return);
      }
  

  $id =$this->input->post('userid') ;
    
 
    $data = array(
         
    'upassword' => md5($this->input->post('upassword')),
            
    );

    $this->db->where('id',$id);
    $result = $this->db->update('users', $data);
    if ($result == TRUE) {
      
      //get setting info 
       
       $Return['result'] = 'User detail updated successfully.';
      
    } else {
      $Return['error'] =  'Bug. Something went wrong, please try again.';
    }
    $this->output($Return);
    exit;
  }
   

  public function update_user()
  {   
     $session = $this->session->userdata('username');
    if(empty($session)){ 
      redirect('admin');
    }

   $Return = array('result'=>'', 'error'=>'');
       
    /* Server side PHP input validation */    
    if($this->input->post('uname')==='') {
          $Return['error'] = "Name required";
    } else if(preg_match("/^(\pL{1,}[ ]?)+$/u",$this->input->post('uname'))!=1) {
      $Return['error'] = "Only letters are allowed!!!";
    } else if($this->input->post('email')==='') {
       $Return['error'] = "Email required";
    } else if (!filter_var($this->input->post('email'), FILTER_VALIDATE_EMAIL)) {
      $Return['error'] = "Invalid email format";
    } else if($this->input->post('contactno')==='') {
       $Return['error'] = "Contact number required";;
    } else if(!preg_match('/^([0-9]*)$/', $this->input->post('contactno'))) {
       $Return['error'] = "Only numbers are allowed!!!";
    }
      
        
    if($Return['error']!=''){
          $this->output($Return);
      }
  

  $id =$this->input->post('userid') ;
      
    $username = $this->Admin_model->clean_post($this->input->post('uname'));
    $email = $this->Admin_model->clean_post($this->input->post('email'));
 
 
    $data = array(
         
    'uname' => $username,
    'uphone' => $this->input->post('contactno'),
    'uemail' => $this->input->post('email'),
        
    );

    $this->db->where('id',$id);
    $result = $this->db->update('users', $data);
    if ($result == TRUE) {
      
      //get setting info 
       
       $Return['result'] = 'User detail updated successfully.';
      
    } else {
      $Return['error'] =  'Bug. Something went wrong, please try again.';
    }
    $this->output($Return);
    exit;
  }
   
public function inhouse_proposals()
  {  
   $session = $this->session->userdata('username');
    if(empty($session)){ 
      redirect('admin');
    } 
  
    $data['proposals'] = $this->db->get('proposal_request')->result_array();
    $this->load->view('admin/listproposal_request', $data);
  }

public function arabicenquiries()
  {  
   $session = $this->session->userdata('username');
    if(empty($session)){ 
      redirect('admin');
    } 
  
    $data['enquiries'] = $this->db->get('arabic_enquiry')->result_array();
    $this->load->view('admin/listenquiry_arabic', $data);
  }

 public function enquiries()
  {  
   $session = $this->session->userdata('username');
    if(empty($session)){ 
      redirect('admin');
    } 
  
    $data['enquiries'] = $this->db->get('enquiries')->result_array();
    $this->load->view('admin/listenquiries', $data);
  }

  public function enquiry_instructor()
  {  
   $session = $this->session->userdata('username');
    if(empty($session)){ 
      redirect('admin');
    } 
  
    $data['enquiries'] = $this->db->get('instructor_enquiry')->result_array();
    $this->load->view('admin/list_instructorenquiries', $data);
  }



   public function instructor()
  {  
   $session = $this->session->userdata('username');
    if(empty($session)){ 
      redirect('admin');
    } 
    $data['title'] = 'Instructor List';
    $data['userdet'] = $this->db->get('instructor')->result_array();
    $this->load->view('admin/list_instructor', $data);
  }
   


 public function newinstructor()
  {   
     $session = $this->session->userdata('username');
    if(empty($session)){ 
      redirect('admin');
    }
    $data['title'] = 'Add new instructor';
    //$data['userdet'] = $this->db->get('users')->result_array();
    $this->load->view('admin/add_instructor', $data);
  }


  public function addinstructor()
  {   
     $session = $this->session->userdata('username');
    if(empty($session)){ 
      redirect('admin');
    }
   $Return = array('result'=>'', 'error'=>'');
       
    /* Server side PHP input validation */    
    if($this->input->post('uname')==='') {
          $Return['error'] = "Name required";
    } else if(preg_match("/^(\pL{1,}[ ]?)+$/u",$this->input->post('uname'))!=1) {
      $Return['error'] = "Only letters are allowed!!!";
    } else if($this->input->post('email')==='') {
       $Return['error'] = "Email required";
    } else if (!filter_var($this->input->post('email'), FILTER_VALIDATE_EMAIL)) {
      $Return['error'] = "Invalid email format";
    } else if($this->input->post('contactno')==='') {
       $Return['error'] = "Contact number required";;
    } else if(!preg_match('/^([0-9]*)$/', $this->input->post('contactno'))) {
       $Return['error'] = "Only numbers are allowed!!!";
    }
     else if($this->input->post('upassword')==='') {
       $Return['error'] = "Password required";
    } else if(strlen($this->input->post('upassword')) < 6) {
       $Return['error'] = "The password must be at least 6 characters.";
    } else if($this->input->post('upassword')!==$this->input->post('ucpassword')) {
       $Return['error'] = "The password confirmation does not match.";
    }
        
    if($Return['error']!=''){
          $this->output($Return);
      }
  
      
    $username = $this->Admin_model->clean_post($this->input->post('uname'));
    $email = $this->Admin_model->clean_post($this->input->post('email'));
 

    $password = md5($this->input->post('upassword'));
  
    $data = array(
     
     
    'uname' => $username,
    'uphone' => $this->input->post('contactno'),
    'uemail' => $this->input->post('email'),
    'upassword' => $password
      
    );
    $result = $this->db->insert('instructor', $data);
    if ($result == TRUE) {
      
      //get setting info 
       
       $Return['result'] = 'Instructor added successfully.';
      
    } else {
      $Return['error'] =  'Bug. Something went wrong, please try again.';
    }
    $this->output($Return);
    exit;
  }

   public function editinstructor()
  {
    $session = $this->session->userdata('username');
    if(empty($session)){ 
      redirect('admin');
    }
        
    $id = $this->uri->segment(3) ;
 

$this->db->select('id, uname,uemail,uphone');
$this->db->where('id',$id);
$query = $this->db->get('instructor');
$users = $query->row() ;
 
 $data = array();
if (isset($users)){
    $data  = array('id'=>$users->id,'uname'=>$users->uname,'uemail'=>$users->uemail,'uphone'=>$users->uphone);
}
  
    $this->load->view('admin/edit_instructor', $data);
  }


 public function changeinstructorpassword()
  {
    $session = $this->session->userdata('username');
    if(empty($session)){ 
      redirect('admin');
    }
        
    $id = $this->uri->segment(3) ;
 

$this->db->select('id, uname,uemail,uphone');
$this->db->where('id',$id);
$query = $this->db->get('instructor');
$users = $query->row() ;
 
 $data = array();
if (isset($users)){
    $data  = array('id'=>$users->id,'uname'=>$users->uname,'uemail'=>$users->uemail,'uphone'=>$users->uphone);
}
  
    $this->load->view('admin/changepassword_instructor', $data);
  }


public function reset_ins_pass()
  {   
     $session = $this->session->userdata('username');
    if(empty($session)){ 
      redirect('admin');
    }

   $Return = array('result'=>'', 'error'=>'');
       
    /* Server side PHP input validation */    
   if($this->input->post('upassword')==='') {
       $Return['error'] = "Password required";
    } else if(strlen($this->input->post('upassword')) < 6) {
       $Return['error'] = "The password must be at least 6 characters.";
    } else if($this->input->post('upassword')!==$this->input->post('ucpassword')) {
       $Return['error'] = "The password confirmation does not match.";
    }
      
        
    if($Return['error']!=''){
          $this->output($Return);
      }
  

  $id =$this->input->post('userid') ;
    
 
    $data = array(
         
    'upassword' => md5($this->input->post('upassword')),
            
    );

    $this->db->where('id',$id);
    $result = $this->db->update('instructor', $data);
    if ($result == TRUE) {
      
      //get setting info 
       
       $Return['result'] = 'Instructor detail updated successfully.';
      
    } else {
      $Return['error'] =  'Bug. Something went wrong, please try again.';
    }
    $this->output($Return);
    exit;
  }
   

  public function update_instructor()
  {   
     $session = $this->session->userdata('username');
    if(empty($session)){ 
      redirect('admin');
    }

   $Return = array('result'=>'', 'error'=>'');
       
    /* Server side PHP input validation */    
    if($this->input->post('uname')==='') {
          $Return['error'] = "Name required";
    } else if(preg_match("/^(\pL{1,}[ ]?)+$/u",$this->input->post('uname'))!=1) {
      $Return['error'] = "Only letters are allowed!!!";
    } else if($this->input->post('email')==='') {
       $Return['error'] = "Email required";
    } else if (!filter_var($this->input->post('email'), FILTER_VALIDATE_EMAIL)) {
      $Return['error'] = "Invalid email format";
    } else if($this->input->post('contactno')==='') {
       $Return['error'] = "Contact number required";;
    } else if(!preg_match('/^([0-9]*)$/', $this->input->post('contactno'))) {
       $Return['error'] = "Only numbers are allowed!!!";
    }
      
        
    if($Return['error']!=''){
          $this->output($Return);
      }
  

  $id =$this->input->post('userid') ;
      
    $username = $this->Admin_model->clean_post($this->input->post('uname'));
    $email = $this->Admin_model->clean_post($this->input->post('email'));
 
 
    $data = array(
         
    'uname' => $username,
    'uphone' => $this->input->post('contactno'),
    'uemail' => $this->input->post('email'),
        
    );

    $this->db->where('id',$id);
    $result = $this->db->update('instructor', $data);
    if ($result == TRUE) {
      
      //get setting info 
       
       $Return['result'] = 'Instructor detail updated successfully.';
      
    } else {
      $Return['error'] =  'Bug. Something went wrong, please try again.';
    }
    $this->output($Return);
    exit;
  }
   


    public function category()
  {  
   $session = $this->session->userdata('username');
    if(empty($session)){ 
      redirect('admin');
    } 
    $data['title'] = 'Category List';
    $data['categorydet'] = $this->db->get('category')->result_array();
    $this->load->view('admin/list_category', $data);
  }
   


 public function newcategory()
  {   
     $session = $this->session->userdata('username');
    if(empty($session)){ 
      redirect('admin');
    }
    $data['title'] = 'Add new category';
    //$data['userdet'] = $this->db->get('users')->result_array();
    $this->load->view('admin/add_category', $data);
  }


  public function addcategory()
  {   
     $session = $this->session->userdata('username');
    if(empty($session)){ 
      redirect('admin');
    }
   $Return = array('result'=>'', 'error'=>'');
       
    /* Server side PHP input validation */    
    if($this->input->post('category')==='') {
          $Return['error'] = "Category Name required";
    }    
    if($Return['error']!=''){
          $this->output($Return);
      }
  
      
    $category = $this->Admin_model->clean_post($this->input->post('category_name'));
     
    $data = array(
     
     
    'category_name' => $category,
    
      
    );
    $result = $this->db->insert('category', $data);
    if ($result == TRUE) {
      
      //get setting info 
       
       $Return['result'] = 'category added successfully.';
      
    } else {
      $Return['error'] =  'Bug. Something went wrong, please try again.';
    }
    $this->output($Return);
    exit;
  }

   public function editcategory()
  {
    $session = $this->session->userdata('username');
    if(empty($session)){ 
      redirect('admin');
    }
        
    $id = $this->uri->segment(3) ;
 

$this->db->select('id, category_name, cat_icon,icon_bg_color');
$this->db->where('id',$id);
$query = $this->db->get('category');
$category = $query->row() ;
 
 $data = array();
if (isset($category)){
    $data  = array('id'=>$category->id,'category_name'=>$category->category_name,'cat_icon'=>$category->cat_icon,'icon_bg_color'=>$category->icon_bg_color);
}
  
    $this->load->view('admin/edit_category', $data);
  }




  public function update_category()
  {   
     $session = $this->session->userdata('username');
    if(empty($session)){ 
      redirect('admin');
    }

   $Return = array('result'=>'', 'error'=>'');
       
    /* Server side PHP input validation */    
    if($this->input->post('category_name')==='') {
          $Return['error'] = "Category Name required";
    } 


$fname = $this->input->post('iconname') ; ;
 if(is_uploaded_file($_FILES['category_image']['tmp_name'])) {
      //checking image type
      $allowed =  array('png','jpg','jpeg','pdf','gif','PNG','JPG','JPEG','PDF','GIF');
      $filename = $_FILES['category_image']['name'];
      $ext = pathinfo($filename, PATHINFO_EXTENSION);
      if(in_array($ext,$allowed)){
        $tmp_name = $_FILES["category_image"]["tmp_name"];
        $profile = "uploads/images/";
        $set_img = base_url()."uploads/images/";
        // basename() may prevent filesystem traversal attacks;
        // further validation/sanitation of the filename may be appropriate
        $name = basename($_FILES["category_image"]["name"]);
       // $newfilename = 'cat_'.round(microtime(true)).'.'.$ext;

        $newfilename = $name ;
        move_uploaded_file($tmp_name, $profile.$newfilename);
        $fname = $newfilename;
         
 
  }else {
        $Return['error'] = "Invalid file format";
      }
    if($Return['error']!=''){
      $this->output($Return);
    }
  }



        
    if($Return['error']!=''){
          $this->output($Return);
      }
  

  $id =$this->input->post('catid') ;
   $bgcolor =$this->input->post('bgcolor') ;
      
    $category = $this->Admin_model->clean_post($this->input->post('category_name'));
    
 
    $data = array(         
    'category_name' => $category, 
    'cat_icon'=> $fname   ,
    'icon_bg_color'  =>   $bgcolor 
    );

    $this->db->where('id',$id);
    $result = $this->db->update('category', $data);
    if ($result == TRUE) {
      
      //get setting info 
       
       $Return['result'] = 'Category updated successfully.';
      
    } else {
      $Return['error'] =  'Bug. Something went wrong, please try again.';
    }
    $this->output($Return);
    exit;
  }
   

       public function subcategory()
  {  
   $session = $this->session->userdata('username');
    if(empty($session)){ 
      redirect('admin');
    } 
    $data['title'] = 'Sub Category List';
    $data['categorydet'] = $this->db->get('subcategory')->result_array();
    $this->load->view('admin/list_subcategory', $data);
  }
   


 public function newsubcategory()
  {   
     $session = $this->session->userdata('username');
    if(empty($session)){ 
      redirect('admin');
    }
    $data['title'] = 'Add new sub category';
    //$data['userdet'] = $this->db->get('users')->result_array();
    $this->load->view('admin/add_subcategory', $data);
  }


  public function addsubcategory()
  {   
     $session = $this->session->userdata('username');
    if(empty($session)){ 
      redirect('admin');
    }
   $Return = array('result'=>'', 'error'=>'');
       
    /* Server side PHP input validation */    
    if($this->input->post('category_name')==='') {
          $Return['error'] = "Select Category";
    }else if($this->input->post('subcategory_name')==='') {
          $Return['error'] = "Sub Category Name required";
    }

    if($Return['error']!=''){
          $this->output($Return);
      }
  
      
     
    $data = array(
      'category_id' => $this->input->post('category_name'),
      'subcategory_name' => $this->input->post('subcategory_name'),
    );
    $result = $this->db->insert('subcategory', $data);
    if ($result == TRUE) {
      
      //get setting info 
       
       $Return['result'] = 'subcategory added successfully.';
      
    } else {
      $Return['error'] =  'Bug. Something went wrong, please try again.';
    }
    $this->output($Return);
    exit;
  }

   public function editsubcategory()
  {
    $session = $this->session->userdata('username');
    if(empty($session)){ 
      redirect('admin');
    }
        
    $id = $this->uri->segment(3) ;
 

$this->db->select('id, category_id, subcategory_name');
$this->db->where('id',$id);
$query = $this->db->get('subcategory');
$subcategory = $query->row() ;
 
 $data = array();
if (isset($subcategory)){
    $data  = array('id'=>$subcategory->id,'category_id'=>$subcategory->category_id,'subcategory_name'=>$subcategory->subcategory_name);
}
  
    $this->load->view('admin/edit_subcategory', $data);
  }




  public function update_subcategory()
  {   
     $session = $this->session->userdata('username');
    if(empty($session)){ 
      redirect('admin');
    }

   $Return = array('result'=>'', 'error'=>'');
       
    /* Server side PHP input validation */    
    if($this->input->post('category_name')==='') {
          $Return['error'] = "Select Category";
    }else if($this->input->post('subcategory_name')==='') {
          $Return['error'] = "Sub Category Name required";
    } 
      
        
    if($Return['error']!=''){
          $this->output($Return);
      }
  

  $id =$this->input->post('subcatid') ;
      
     $data = array(
      'category_id' => $this->input->post('category_name'),
      'subcategory_name' => $this->input->post('subcategory_name'),
    );

    $this->db->where('id',$id);
    $result = $this->db->update('subcategory', $data);
   // / echo $this->db->last_query();
    if ($result == TRUE) {
      
      //get setting info 
       
       $Return['result'] = 'Sub Category updated successfully.';
      
    } else {
      $Return['error'] =  'Bug. Something went wrong, please try again.';
    }
    $this->output($Return);
    exit;
  }

public function services()
  {   
     $session = $this->session->userdata('username');
    if(empty($session)){ 
      redirect('admin');
    }
    $data['title'] = 'Services List';
    $data['categorydet'] = $this->db->get('services')->result_array();
    $this->load->view('admin/list_services', $data);
  }


   


 public function newservice()
  {   
     $session = $this->session->userdata('username');
    if(empty($session)){ 
      redirect('admin');
    }
    $data['title'] = 'Add new service';
    //$data['userdet'] = $this->db->get('users')->result_array();
    $this->load->view('admin/add_service', $data);
  }


  public function addservice()
  {   
     $session = $this->session->userdata('username');
    if(empty($session)){ 
      redirect('admin');
    }
   $Return = array('result'=>'', 'error'=>'');
       
    /* Server side PHP input validation */    
    if($this->input->post('service_name')==='') {
          $Return['error'] = "Service Name required";
    }else if($this->input->post('category_name')==='') {
          $Return['error'] = "Select category";
    }    
    if($Return['error']!=''){
          $this->output($Return);
      }
  
    $data = array(
     'service_name' => $this->input->post('service_name'),
     'description' => $this->input->post('description'),
     'category_id' => $this->input->post('category_name'),
     'subcategory_id' => $this->input->post('sub_category'), 
    );

    $result = $this->db->insert('services', $data);
    if ($result == TRUE) {
      
      //get setting info 
       
       $Return['result'] = 'service added successfully.';
      
    } else {
      $Return['error'] =  'Bug. Something went wrong, please try again.';
    }
    $this->output($Return);
    exit;
  }

   public function editservice()
  {
    $session = $this->session->userdata('username');
    if(empty($session)){ 
      redirect('admin');
    }
        
    $id = $this->uri->segment(3) ;
 

$this->db->select('id, service_name,description , category_id, subcategory_id');
$this->db->where('id',$id);
$query = $this->db->get('services ');
$service = $query->row() ;
 
 $data = array();
if (isset($service)){
    $data  = array('id'=>$service->id,'service_name'=>$service->service_name,'description'=>$service->description,'category_id'=>$service->category_id,'subcategory_id'=>$service->subcategory_id);
}
  
    $this->load->view('admin/edit_service', $data);
  }




  public function update_service()
  {   
     $session = $this->session->userdata('username');
    if(empty($session)){ 
      redirect('admin');
    }

   $Return = array('result'=>'', 'error'=>'');
       
    /* Server side PHP input validation */    
     if($this->input->post('service_name')==='') {
          $Return['error'] = "Service Name required";
    }else if($this->input->post('category_name')==='') {
          $Return['error'] = "Select category";
    } 
      
        
    if($Return['error']!=''){
          $this->output($Return);
      }
  

  $id =$this->input->post('serviceid') ;
      
   $data = array(
     'service_name' => $this->input->post('service_name'),
     'description' => $this->input->post('description'),
     'category_id' => $this->input->post('category_name'),
     'subcategory_id' => $this->input->post('sub_category'), 
    );

    $this->db->where('id',$id);
    $result = $this->db->update('services', $data);
    if ($result == TRUE) {
      
      //get setting info 
       
       $Return['result'] = 'Service updated successfully.';
      
    } else {
      $Return['error'] =  'Bug. Something went wrong, please try again.';
    }
    $this->output($Return);
    exit;
  }


  public function products()
  {   
     $session = $this->session->userdata('username');
    if(empty($session)){ 
      redirect('admin');
    }
    $data['title'] = 'Products List';
    $data['productdet'] = $this->db->get('courses')->result_array();
    $this->load->view('admin/list_products', $data);
  }


   


 public function newproduct()
  {   
     $session = $this->session->userdata('username');
    if(empty($session)){ 
      redirect('admin');
    }
    $data['title'] = 'Add new product';
    //$data['userdet'] = $this->db->get('users')->result_array();
    $this->load->view('admin/add_product', $data);
  }


  public function addproduct()
  {   
     $session = $this->session->userdata('username');
    if(empty($session)){ 
      redirect('admin');
    }
   $Return = array('result'=>'', 'error'=>'');
       
    /* Server side PHP input validation */    
    if($this->input->post('product_name')==='') {
          $Return['error'] = "Product Name required";
    }else if($this->input->post('category_name')==='') {
          $Return['error'] = "Select category";
    }     
    if($Return['error']!=''){
          $this->output($Return);
      }
  
    $data = array(
     'product_name' => $this->input->post('product_name'),
     'description' => $this->input->post('description'),
     'category_id' => $this->input->post('category_name'),
     'subcategory_id' => $this->input->post('sub_category'), 
    );

    $result = $this->db->insert('courses', $data);
    if ($result == TRUE) {
      
      //get setting info 
       
       $Return['result'] = 'product added successfully.';
      
    } else {
      $Return['error'] =  'Bug. Something went wrong, please try again.';
    }
    $this->output($Return);
    exit;
  }



public function description()
  {   
     $session = $this->session->userdata('username');
    if(empty($session)){ 
      redirect('admin');
    }
    $data['title'] = 'Add new product';
  $data['categories'] = $this->db->get('category')->result_array();
    $this->load->view('admin/add_coursedescription', $data);
  }


  public function adddescription()
  {   
     $session = $this->session->userdata('username');
    if(empty($session)){ 
      redirect('admin');
    }
   $Return = array('result'=>'', 'error'=>'');
       
    /* Server side PHP input validation */    
    if($this->input->post('course_name')==='') {
          $Return['error'] = "Select Course ";
    }else if($this->input->post('category_name')==='') {
          $Return['error'] = "Select category";
    }     
    if($Return['error']!=''){
          $this->output($Return);
      }
  
    
     $courseid  = $this->input->post('course_name');
     $category_id = $this->input->post('category_name');
     $subcategory_id = $this->input->post('sub_category'); 
  

    $data = array(
     'description' => $this->input->post('description')
    );




//$this->db->where('category_id',  $category_id);
$this->db->where('id',  $courseid);
// if($category_id!=0){
//   $this->db->where('subcategory_id',  $subcategory_id);
// }
    $result = $this->db->update('courses', $data);
    if ($result == TRUE) {
      
      //get setting info 
       
    $Return['result'] = 'Description added successfully.';
      
    } else {
      $Return['error'] =  'Bug. Something went wrong, please try again.';
    }
    $this->output($Return);
    exit;
  }


   public function editproduct()
  {
    $session = $this->session->userdata('username');
    if(empty($session)){ 
      redirect('admin');
    }
        
    $id = $this->uri->segment(3) ;
 

$this->db->select('id, product_name,program_title_arabic,description , category_id, subcategory_id');
$this->db->where('id',$id);
$query = $this->db->get('courses');
$service = $query->row() ;
 
 $data = array();
if (isset($service)){
    $data  = array('id'=>$service->id,'product_name'=>$service->product_name,'ar_product_name'=>$service->program_title_arabic,'description'=>$service->description,'category_id'=>$service->category_id,'subcategory_id'=>$service->subcategory_id);
}
  
    $this->load->view('admin/edit_product', $data);
  }




  public function update_product()
  {   
     $session = $this->session->userdata('username');
    if(empty($session)){ 
      redirect('admin');
    }

   $Return = array('result'=>'', 'error'=>'');
       
    /* Server side PHP input validation */    
     if($this->input->post('product_name')==='') {
          $Return['error'] = "product Name required";
    }else if($this->input->post('category_name')==='') {
          $Return['error'] = "Select category";
    } 
      
        
    if($Return['error']!=''){
          $this->output($Return);
      }
  

  $id =$this->input->post('productid') ;
      
   $data = array(
     'product_name' => $this->input->post('product_name'),
     'program_title_arabic' => $this->input->post('ar_product_name'),
     'description' => $this->input->post('description'),
     'category_id' => $this->input->post('category_name'),
   //  'subcategory_id' => $this->input->post('sub_category'), 
    );

    $this->db->where('id',$id);
    $result = $this->db->update('courses', $data);
    if ($result == TRUE) {
      
      //get setting info 
       
       $Return['result'] = 'product updated successfully.';
      
    } else {
      $Return['error'] =  'Bug. Something went wrong, please try again.';
    }
    $this->output($Return);
    exit;
  }
  
 
public function getsubcategory()
{ 
   $category = $this->input->post('category_id');
   $this->db->where('category_id',$category );
   $data['services'] = $this->db->get('subcategory')->result_array();
   $this->load->view('admin/getsubcat', $data);
}  


public function getcourse()
{ 
   $category = $this->input->post('category_id');
    $subcategory = $this->input->post('subcategory_id');
   $this->db->where('category_id',$category );
   if($subcategory!=0){
   $this->db->where('subcategory_id',$subcategory );
   }
   $data['courses'] = $this->db->get('courses')->result_array();
   $this->load->view('admin/getcourses', $data);
}

public function getdescription()
{ 
    
  $courseid = $this->input->post('course');
  
  $this->db->where('id',$courseid );
   
  echo  $this->db->get('courses')->row()->description;
    
}


  //chat module


 public function chat()
    {

    $session = $this->session->userdata('username');
    if(empty($session)){ 
      redirect('admin');
    }


    $string = $this->uri->segment(3) ;

    $val = explode('_', $string );

    $request =  $val[0] ;
    $user =  $val[1] ;


  $data = array("user"=>$user,
  "request"=> $request
  );


$this->load->view('admin/chat', $data);

    }


    public function send_message()
    {

    $session = $this->session->userdata('username');
    if(empty($session)){ 
      redirect('admin');
    }


// $message = $this->input->get('message', null) ;
// $userid = $this->input->get('userid', null) ;
// $requestid = $this->input->get('requestid', null) ;


$Return = array('result'=>'', 'error'=>'');


$message = $this->input->post('message', null) ;
$userid = $this->input->post('userid', null) ;
$requestid = $this->input->post('requestid', null) ;







$attachment="";

if (isset($_FILES["attachment"]['name'])) {

  if(is_uploaded_file($_FILES['attachment']['tmp_name'])) {
            //checking image type
            $allowed =  array('png','jpg','jpeg','pdf','doc','docx','PNG','JPG','JPEG','PDF','DOC','DOCX');
            $filename = $_FILES['attachment']['name'];
            $ext = pathinfo($filename, PATHINFO_EXTENSION);
            
            if(in_array($ext,$allowed)){
                $tmp_name = $_FILES["attachment"]["tmp_name"];
                $profile = "uploads/images/";
                $set_img = base_url()."uploads/images/";
                // basename() may prevent filesystem traversal attacks;
                // further validation/sanitation of the filename may be appropriate
                $name = basename($_FILES["attachment"]["name"]);
                $newfilename = 'chat_'.round(microtime(true)).'.'.$ext;
                move_uploaded_file($tmp_name, $profile.$newfilename);
                $fname = $newfilename;      

        
          $attachment  =  $fname ;

            } else {

              $ret = false ;
                $this->_setOutput($ret);
            }
        }
      }





$data = array(
"message" => $message,
"from_id" =>  $session['user_id'],
"to_id" =>  $userid,
"request_id" =>  $requestid,
"attachment" =>  $attachment,
"a_to_b" =>  'a',
'timestamp' => time(),


);

$chat = $this->db->insert('messages',$data);      
        
if($chat){

  $this->notifications($userid,'chat','New Message',$message,$requestid.'_'.$userid);
} 
        
         
        
       // $this->Chat_model->add_message($message, $nickname);
        
        $this->_setOutput($message);
    }
    
    
    public function get_messages()
    {

    $session = $this->session->userdata('username');
    if(empty($session)){ 
      redirect('admin');
    }


        $timestamp = $this->input->get('timestamp', null);
        $userid = $this->input->get('userid', null) ;
        $requestid = $this->input->get('requestid', null) ;


//$where_au = "(from_id = '".$userid."' OR to_id = '".$userid."' )";



     //   $this->db->where('timestamp >', $timestamp);
        $this->db->where('request_id',  $requestid);

      //$this->db->where($where_au);

        $this->db->group_start();
        $this->db->where('from_id',  $userid);
        $this->db->or_where('to_id',  $userid);
        $this->db->group_end();

        $this->db->where('a_to_b In("a","b")');

            
        $this->db->order_by('timestamp', 'DESC');
       // $this->db->limit(10); 
        $query = $this->db->get('messages');
        
     //  echo $this->db->last_query();
        $messages = array_reverse($query->result_array());
        
        $this->_setOutput($messages);
    }


      /*EXCEL UPLOAD*/
  
   
     
   public function excelupload() {
          
            $Return = array('result'=>'', 'error'=>'');
       $this->load->view('admin/excelupload', $Return );
     
     
    }
  
     
     public function importFile(){

          $Return = array('result'=>'', 'error'=>'');


      $type = $this->input->post('training_type') ;

  $result = "" ;
  $senddata = array();
  $inserdata = array();

        if ($this->input->post('submit')) {
                 

              
 
                $path = './uploads/';
                require_once APPPATH . "/third_party/PHPExcel.php";
                $config['upload_path'] = $path;
                $config['allowed_types'] = 'xlsx|xls|csv';
                $config['remove_spaces'] = TRUE;
                $this->load->library('upload', $config);
                $this->upload->initialize($config);            
                if (!$this->upload->do_upload('uploadFile')) {
                    $error = array('error' => $this->upload->display_errors());
                } else {
                    $data = array('upload_data' => $this->upload->data());
                }
                if(empty($error)){
                  if (!empty($data['upload_data']['file_name'])) {
                    $import_xls_file = $data['upload_data']['file_name'];
                } else {
                    $import_xls_file = 0;
                }
                $inputFileName = $path . $import_xls_file;
                 
                try {
                    $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
                    $objReader = PHPExcel_IOFactory::createReader($inputFileType);
                    $objPHPExcel = $objReader->load($inputFileName);

                     $allDataInSheet = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);
// $sheet = $objPHPExcel->getActiveSheet() ;

//                     $highestRow = $sheet->getHighestRow(); 
// $highestColumn = $sheet->getHighestColumn();

// $allDataInSheet = $sheet->rangeToArray(
//     'A12:' . $highestColumn . $highestRow,
//     NULL,TRUE,FALSE
// );



//$allDataInSheet = array_slice($allDataInSheet, 10); 


//print_r(   $allDataInSheet);



                    $flag = true;
                    $i=0;
                    foreach ($allDataInSheet as $value) {

                      if( !empty($value['A']) && !empty($value['C']) && !empty($value['E'])){





                      $categoryid = "" ;
                       $subcategoryid = "" ;
                        $courseid = "" ;
                      if($flag){
                        $flag =false;
                        continue;
                      }


 
                   
                      $categoryid = $this->import->getCategory(trim($value['A'])); 
                      $subcategoryid = $this->import->getsubCategory($categoryid,trim($value['B'])); 
                    $courseid =  $this->import->getCoursename($categoryid,$subcategoryid,trim($value['C']),trim($value['D']));


                    $var = $value['I'];
$date = str_replace('"', '', $var);
$strdate = date('Y-m-d', strtotime($date));


//echo $var.'hello'.$strdate.'helooo';

                    $inserdata[$i]['category_id'] = $categoryid ;
                    $inserdata[$i]['sub_cat_id'] = $subcategoryid ;
                    $inserdata[$i]['course_id'] = $courseid ;


if(empty($value['E'])){
  $price = 0 ;
}else{
  $price = $value['E'] ;
}
                      $inserdata[$i]['price'] = $price ;
                      $inserdata[$i]['duration'] = $value['F'];

if(empty($value['G'])){
  $location = 0 ;
}else{
  $location = trim($value['G']) ;
}

                      $inserdata[$i]['location'] = $location;
                      $inserdata[$i]['time'] = $value['H'];
                      $inserdata[$i]['start_date'] = $strdate;
                      $inserdata[$i]['type'] = $type;

 
     



 
  

                       
                      $i++;
                    }        } 

//print_r($senddata);

 
$result = $this->import->importData($inserdata);   
  
                  

        if($result){

                       $Return['result'] = 'Imported successfully.';
       // echo "Imported successfully";
                     }
        elseif(!$result){

                       $Return['error'] = 'Error in imported data or Imported data already exists. ';
       // echo "Imported successfully";
                     }
 
        else{

                      
      $Return['error'] =  'Bug. Something went wrong, please try again.';
    
  


//echo "ERROR !";
                    }             
      
              } catch (Exception $e) {
                   die('Error loading file "' . pathinfo($inputFileName, PATHINFO_BASENAME)
                            . '": ' .$e->getMessage());
                }
              }else{
                 $Return['error'] = "Error" ;
                }
                 
                 
        }

          $this->load->view('admin/excelupload',$Return);
    }

      
  /* EXCEL COMPLETED */


public function schedules()
  {   
     $session = $this->session->userdata('username');
    if(empty($session)){ 
      redirect('admin');
    }
    $this->db->where('status in("N" ,"a","c")');
    $this->db->order_by('start_date','asc');
    $data['scheduledet'] = $this->db->get('schedule')->result_array();
    $this->load->view('admin/list_schedule', $data);
  }

    

public function schedule_status()
  {  
   $session = $this->session->userdata('username');
    if(empty($session)){ 
      redirect('admin');
    } 
    
    $id = $this->input->post('id');
    $status = $this->input->post('status');

    $this->db->where('id',$id);
    $this->db->update('schedule',array('status'=>$status));

  }


  public function assign()
  {  
   $session = $this->session->userdata('username');
    if(empty($session)){ 
      redirect('admin');
    } 
    

      $Return = array('result'=>'', 'error'=>'');


    if($this->input->post('sch_id')==='') {
          $Return['error'] = "Not selected any Schedule to assign ";
    }else if($this->input->post('instructor')=='0') {
          $Return['error'] = "Select Instructor to assign";
    } 
      
        
    if($Return['error']!=''){
          $this->output($Return);
      }




      $instructor = $this->input->post('instructor');
    $ids = $this->input->post('sch_id');

    $id = explode( ',', $ids) ;

    foreach ($id   as $value) {
     $this->db->where('id',$value);
   $result =  $this->db->update('schedule',array('instructor'=>$instructor));
    }
  

                    
 if ($result) {
      
      //get setting info 
       
       $Return['result'] = 'Instructor  Assigned Successfully ';
      
    } else {
      $Return['error'] =  'Bug. Something went wrong, please try again.';
    }
    $this->output($Return);
    exit;

  }

public function confirm_status()
  {  
   $session = $this->session->userdata('username');
    if(empty($session)){ 
      redirect('admin');
    } 

    $Return = array('result'=>'', 'error'=>'');
    
    $id = $this->input->post('id');
    $status = $this->input->post('status');

    $this->db->where('id',$id);
    $result = $this->db->update('schedule',array('c_status'=>$status));

    $this->db->where('schedule_id',$id);
    $students =   $this->db->get('students')->result_array();

    foreach ($students as $svalue) {
      
                $this->email->set_mailtype("html");
                $name =  $svalue['first_name'].' '.$svalue['last_name']  ;

                $this->db->where('id',$id);
                $scheduledet = $this->db->get('schedule')->row();
 

               $coursename =  $this->Admin_model->get_type_name_by_id('courses','id',  $scheduledet->course_id,'product_name') ;

// $paymenturl= '' ;
// if($scheduledet->price > 0){
//   $paymenturl  = $this->payment($scheduledet->price,$coursename,$svalue['id'],$id) ;
// }
             // $paymenturl  = $this->payment($scheduledet->price,$coursename,$svalue['id'],$id) ;

                $subject = " Course Confirmed as per the schedule ";
                              

                $message = "Your registered course has been confirmed as per the schedule.<br/>
                Course Name :". $coursename." <br/>
                Date & Time :".date("d-M-y", strtotime($scheduledet->start_date)).' & '. $scheduledet->time . " <br/> 
                Location : ". $scheduledet->location  . "<br/><br/>" ;

// if(!empty($paymenturl)){
//   $message .=  $paymenturl ."<br/> 
//                 Click above link to complete your payment.<br/> <br/> " ;
// }
                
                $message .= 'Thanks for registering with us.';


                              
                // $message = 'Hi,'.$name.' . Thanks for registering with us. Click the below link to verify your email Id. ' ;
                
                $this->email->from('noreplyliaorg@gmail.com', "MEIRC");
                $this->email->to($svalue['email']);
                
                $this->email->subject($subject);
                $this->email->message($message);
                $send =   $this->email->send();

    }

                
 if ($send) {
      
      //get setting info 
       
       $Return['result'] = 'Course Confirmed';
      
    } else {
      $Return['error'] =  'Bug. Something went wrong, please try again.';
    }
    $this->output($Return);
    exit;

  }


public function students()
  {  
   $session = $this->session->userdata('username');
    if(empty($session)){ 
      redirect('admin');
    } 
    $data['categories'] = $this->db->get('category')->result_array();

              $this->db->select('location');
              $this->db->distinct();
              $this->db->from('schedule');
              $this->db->where('start_date >= ',date('Y-m-d'));
              $this->db->order_by('location','asc');
              $data['locations'] =  $this->db->get()->result_array();

              $this->db->select('start_date');
              $this->db->distinct();
              $this->db->from('schedule');
              $this->db->where('start_date >= ',date('Y-m-d'));
              $this->db->order_by('start_date','asc');
              $data['startdate'] =  $this->db->get()->result_array();






    $data['studentdet'] = $this->db->get('students')->result_array();
    $this->load->view('admin/list_customers', $data);
  }

public function student_report()
  {  
   $session = $this->session->userdata('username');
    if(empty($session)){ 
      redirect('admin');
    } 


     $this->db->select('a.id schid, b.*');
     $this->db->from('schedule a');
     
     $this->db->join('students b', 'a.id = b.schedule_id');



    
if(!empty( $this->input->post('startdate'))){
   $this->db->where('start_date',$this->input->post('startdate'));
}
if(!empty($this->input->post('category'))){
   $this->db->where('category_id',$this->input->post('category'));
}
if(!empty($this->input->post('subcategory'))){
   $this->db->where('sub_cat_id',$this->input->post('subcategory'));
}
if(!empty($this->input->post('course'))){
   $this->db->where('course_id',$this->input->post('course'));
}

if(!empty($this->input->post('location'))){
   $this->db->where('location',$this->input->post('location'));
}

$data['studentdet'] = $this->db->get()->result_array();

//echo $this->db->last_query();
    $this->load->view('admin/student_report', $data);
  }


  public function ins_status_update()
  {  
   $session = $this->session->userdata('username');
    if(empty($session)){ 
      redirect('admin');
    } 
    
    $id = $this->input->post('id');
    $status = $this->input->post('status');

    $this->db->where('id',$id);
    $this->db->update('instructor',array('ustatus'=>$status));

  }



public function organisations()
  {  
   $session = $this->session->userdata('username');
    if(empty($session)){ 
      redirect('admin');
    } 
    $data['categories'] = $this->db->get('category')->result_array();

              $this->db->select('location');
              $this->db->distinct();
              $this->db->from('schedule');
              $this->db->where('start_date >= ',date('Y-m-d'));
              $this->db->order_by('location','asc');
              $data['locations'] =  $this->db->get()->result_array();

              $this->db->select('start_date');
              $this->db->distinct();
              $this->db->from('schedule');
              $this->db->where('start_date >= ',date('Y-m-d'));
              $this->db->order_by('start_date','asc');
              $data['startdate'] =  $this->db->get()->result_array();






    $data['companydet'] = $this->db->get('company_reg')->result_array();
    $this->load->view('admin/list_organisation', $data);
  }

public function org_report()
  {  
   $session = $this->session->userdata('username');
    if(empty($session)){ 
      redirect('admin');
    } 


     $this->db->select('a.id schid, b.*');
     $this->db->from('schedule a');
     
     $this->db->join('company_reg b', 'a.id = b.schedule_id');



    
if(!empty( $this->input->post('startdate'))){
   $this->db->where('start_date',$this->input->post('startdate'));
}
if(!empty($this->input->post('category'))){
   $this->db->where('category_id',$this->input->post('category'));
}
if(!empty($this->input->post('subcategory'))){
   $this->db->where('sub_cat_id',$this->input->post('subcategory'));
}
if(!empty($this->input->post('course'))){
   $this->db->where('course_id',$this->input->post('course'));
}

if(!empty($this->input->post('location'))){
   $this->db->where('location',$this->input->post('location'));
}

$data['companydet'] = $this->db->get()->result_array();

//echo $this->db->last_query();
    $this->load->view('admin/org_report', $data);
  }



  
   public function assigninstructor()
  {  
   $session = $this->session->userdata('username');
    if(empty($session)){ 
      redirect('admin');
    } 
    $data['categories'] = $this->db->get('category')->result_array();


              $this->db->select('location');
              $this->db->distinct();
              $this->db->from('schedule');
              $this->db->where('start_date >= ',date('Y-m-d'));
              $this->db->order_by('location','asc');
              $data['locations'] =  $this->db->get()->result_array();

              $this->db->select('start_date');
              $this->db->distinct();
              $this->db->from('schedule');
              $this->db->where('start_date >= ',date('Y-m-d'));
              $this->db->order_by('start_date','asc');
              $data['startdate'] =  $this->db->get()->result_array();




 
    $this->load->view('admin/assigninstructor', $data);
  }

public function schedule_report()
  {  
   $session = $this->session->userdata('username');
    if(empty($session)){ 
      redirect('admin');
    } 



 $data['instructors'] = $this->db->get('instructor')->result_array();



 // $this->db->select('a.*');
 //     $this->db->from('schedule a');
     
     //$this->db->join('students b', 'a.id = b.schedule_id');
    
// if(!empty( $this->input->post('startdate'))){
//    $this->db->where('start_date',$this->input->post('startdate'));
// }
// if(!empty($this->input->post('category'))){
//    $this->db->where('category_id',$this->input->post('category'));
// }
// if(!empty($this->input->post('subcategory'))){
//    $this->db->where('sub_cat_id',$this->input->post('subcategory'));
// }
// if(!empty($this->input->post('course'))){
//    $this->db->where('course_id',$this->input->post('course'));
// }

// if(!empty($this->input->post('location'))){
//    $this->db->where('location',$this->input->post('location'));
// }


$this->db->where('status','a');
  
    
// if(!empty( $this->input->post('startdate'))){
//    $this->db->where('start_date',$this->input->post('startdate'));
// }
if(!empty($this->input->post('category'))){
   $this->db->where('category_id',$this->input->post('category'));
}
if(!empty($this->input->post('subcategory'))){
   $this->db->where('sub_cat_id',$this->input->post('subcategory'));
}
if(!empty($this->input->post('course'))){
   $this->db->where('course_id',$this->input->post('course'));
}

if(!empty($this->input->post('location'))){
   $this->db->where('location',$this->input->post('location'));
}

if(!empty($this->input->post('type'))){
   $this->db->where('type',$this->input->post('type'));
}

if($this->input->post('assigned')=='true'){
   $this->db->where('instructor > 0');
}


if($this->input->post('olddata')=='false'){
    $this->db->where('start_date >= ',date('Y-m-d'));
} 
$this->db->order_by('start_date','asc');
$data['scheduledet'] = $this->db->get('schedule')->result_array();


//$data['studentdet'] = $this->db->get()->result_array();

  // echo $this->db->last_query();
    $this->load->view('admin/schedule_report', $data);
  }

  


    
    private function _setOutput($data)
    {
        header('Cache-Control: no-cache, must-revalidate');
        header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
        header('Content-type: application/json');
        
        echo json_encode($data);

    }


//notifications

    public function getnotifications()
  {
    $this->load->view('buyer/notification');

  }

  public function notifications($userid,$head,$title,$message,$reference)
  {
      $session = $this->session->userdata('username');
      if(empty($session)){ 
        redirect('admin');
      }

      
      $time = date('Y-m-d');
      
       
   
    $data = array(
    'user_id' => $userid,
    'head' => $head,
    'to' => 'buyer',
    'title' => $title,
    'message' => $message,
    'reference' => $reference,
    'time' => $time
    );

     $this->db->insert('notification', $data);
}


  function delete_notifications()
  {
      $session = $this->session->userdata('username');
      $this->db->where('user_id',$session['user_id']);
      $this->db->delete('notification');
  }

 public function payment($price,$coursename,$studentid,$schid)
     {
     
  $session = $this->session->userdata('username');


$unitcost = $price;
 
 if($unitcost==0){
  $unitcost = 1 ;
 }

// $unitcost = 2000;
// $reference = '112';

    $data = array(
        //Customer's Personal Information
       //Customer's Personal Information
        'merchant_email' => "gm@yellostack.com",
      'secret_key' => "XPEgOOuGcs2B7yWrYxYk9NdSNbwdTQOQGs7ugCbs4e4cM0EKxD4Hqhzet5snWgeCIl6ZXis2wwfiwT34w8LXpkbTqDgmTvYCR5BO",
        'cc_first_name' => $this->Admin_model->get_type_name_by_id('students','id',$studentid,'first_name'),          //This will be prefilled as Credit Card First Name
        'cc_last_name' => $this->Admin_model->get_type_name_by_id('students','id',$studentid,'last_name'),            //This will be prefilled as Credit Card Last Name
        'cc_phone_number' => "00973",
        'phone_number' => "33333333",
        'email' => $this->Admin_model->get_type_name_by_id('students','id',$studentid,'email'),
        
        
       //Customer's Billing Address (All fields are mandatory)
        //When the country is selected as USA or CANADA, the state field should contain a String of 2 characters containing the ISO state code otherwise the payments may be rejected. 
        //For other countries, the state can be a string of up to 32 characters.
        'billing_address' => "manama bahrain",
        'city' => "manama",
        'state' => "manama",
        'postal_code' => "00973",
        'country' => "BHR",
        
        //Customer's Shipping Address (All fields are mandatory)
        'address_shipping' => $this->Admin_model->get_type_name_by_id('students','id',$studentid,'first_name'),
        'city_shipping' => "manama",
        'state_shipping' => "manama",
        'postal_code_shipping' => "00973",
        'country_shipping' => "BHR",
       
       //Product Information
        "products_per_title" =>  $coursename,   //Product title of the product. If multiple products then add “||” separator
        'quantity' => "1",                                    //Quantity of products. If multiple products then add “||” separator
        'unit_price' => $unitcost,                                  //Unit price of the product. If multiple products then add “||” separator.
        "other_charges" => "0",                                     //Additional charges. e.g.: shipping charges, taxes, VAT, etc.
        
        'amount' => $unitcost,                                          //Amount of the products and other charges, it should be equal to: amount = (sum of all products’ (unit_price * quantity)) + other_charges
        'discount'=>"0",                                                //Discount of the transaction. The Total amount of the invoice will be= amount - discount
        'currency' => "SAR",                                            //Currency of the amount stated. 3 character ISO currency code 
       

        
        //Invoice Information
        'title' =>  $this->Admin_model->get_type_name_by_id('students','id',$studentid,'first_name'),               // Customer's Name on the invoice
        "msg_lang" => "en",                 //Language of the PayPage to be created. Invalid or blank entries will default to English.(Englsh/Arabic)
        "reference_no" =>  $studentid ,        //Invoice reference number in your system
       
        
        //Website Information
        "site_url" => base_url()."admin/payment",    //The requesting website be exactly the same as the website/URL associated with your PayTabs Merchant Account
        'return_url' => base_url()."admin/checkpayment",
        "cms_with_version" => "API USING PHP",

        "paypage_info" => "1"
    ) ;

 


    $result = $this->paytabs->create_pay_page($data) ;
//print_r($result);

if(!empty( $result)){
    $insertdata = array(
      'student_id'=>$studentid,
      'schedule_id'=>$schid,
      'inv_ref_no'=>$result->p_id,
      'paymentlink'=>$result->payment_url

    ) ;

    $this->db->insert('student_transaction_det',$insertdata );

 //echo json_encode($result)  ;
   return $result->payment_url ;
}else{
  return base_url();
}
  

    
 
  }



public function checkpayment()
  {   
      
 $Return = array('result'=>'', 'error'=>'');

 $refno =  $this->input->post('payment_reference');

 $verify =  $this->paytabs->verify_payment($refno) ;

 //echo json_encode( $verify );

 $rescode = $verify->response_code;
  
//$rescode = "768";
 if($rescode==100){

  $amount = $verify->amount; 

  $transactionId = $verify->transaction_id; 

$inv_ref_no = $verify->pt_invoice_id ;
$studentid = $verify->reference_no ;

$data= array(
  'status'=>'success',
  'transaction_id'=>$transactionId
);
$this->db->where('student_id',$studentid);
$this->db->where('inv_ref_no',$inv_ref_no);
$this->db->update('student_transaction_det',$data);
    
  
$this->load->view('user/success');
    
    
   }else{


$data= array(
  'status'=>'failed',
  'transaction_id'=>$transactionId
);
$this->db->where('student_id',$studentid);
$this->db->where('inv_ref_no',$inv_ref_no);
$this->db->update('student_transaction_det',$data);
    


 // echo "failed";
   $this->load->view('user/failed');

 }


   // $this->packages();
  }




    public function news()
  {  
   $session = $this->session->userdata('username');
    if(empty($session)){ 
      redirect('admin');
    } 
    $data['title'] = 'Banner List';
    $data['bannerdet'] = $this->db->get('news_articles')->result_array();
    $this->load->view('admin/list_news', $data);
  }
   


 public function newnews()
  {   
     $session = $this->session->userdata('username');
    if(empty($session)){ 
      redirect('admin');
    }
    $data['title'] = 'Add new Banner';
    //$data['userdet'] = $this->db->get('users')->result_array();
    $this->load->view('admin/add_news', $data);
  }


  public function addnews()
  {   
     $session = $this->session->userdata('username');
    if(empty($session)){ 
      redirect('admin');
    }
   $Return = array('result'=>'', 'error'=>'');
       
    /* Server side PHP input validation */    
    if($this->input->post('news_title')==='') {
          $Return['error'] = "Title required";
    }elseif(!(is_uploaded_file($_FILES['news_image']['tmp_name']))) {
          $Return['error'] = "Image required";
    } 

    if($Return['error']!=''){
          $this->output($Return);
      }
  
      
   $fname = "" ;
   if(is_uploaded_file($_FILES['news_image']['tmp_name'])) {
      //checking image type
      $allowed =  array('png','jpg','jpeg','pdf','gif','PNG','JPG','JPEG','PDF','GIF');
      $filename = $_FILES['news_image']['name'];
      $ext = pathinfo($filename, PATHINFO_EXTENSION);
      if(in_array($ext,$allowed)){
        $tmp_name = $_FILES["news_image"]["tmp_name"];
        $profile = "uploads/images/";
        $set_img = base_url()."uploads/images/";
        // basename() may prevent filesystem traversal attacks;
        // further validation/sanitation of the filename may be appropriate
        $name = basename($_FILES["news_image"]["name"]);
       // $newfilename = 'cat_'.round(microtime(true)).'.'.$ext;

        $newfilename = $name ;
        move_uploaded_file($tmp_name, $profile.$newfilename);
        $fname = $newfilename;
         
 
  }else {
        $Return['error'] = "Invalid file format";
      }
    if($Return['error']!=''){
      $this->output($Return);
    }
  }


     
    $data = array(
    'news_title' => $this->input->post('news_title'),
    'news_image' => $fname,
    'description' => $this->input->post('description'),   
    'status'=>'active',
    'created_on' => date('Y-m-d')
    );
    $result = $this->db->insert('news_articles', $data);
    if ($result == TRUE) {
      
      //get setting info 
       
       $Return['result'] = 'News added successfully.';
      
    } else {
      $Return['error'] =  'Bug. Something went wrong, please try again.';
    }
    $this->output($Return);
    exit;
  }

   public function editnews()
  {
    $session = $this->session->userdata('username');
    if(empty($session)){ 
      redirect('admin');
    }
        
    $id = $this->uri->segment(3) ;
 

$this->db->select('id, news_title, news_image,description');
$this->db->where('id',$id);
$query = $this->db->get('news_articles');
$news = $query->row() ;
 
 $data = array();
if (isset($news)){
    $data  = array('id'=>$news->id,'news_title'=>$news->news_title,'news_image'=>$news->news_image,'description'=>$news->description);
}
  
    $this->load->view('admin/edit_news', $data);
  }




  public function update_news()
  {   
     $session = $this->session->userdata('username');
    if(empty($session)){ 
      redirect('admin');
    }

   $Return = array('result'=>'', 'error'=>'');
       
    /* Server side PHP input validation */    
    if($this->input->post('news_title')==='') {
          $Return['error'] = "Title required";
    } 


$fname = $this->input->post('bimage') ; ;
 if(is_uploaded_file($_FILES['news_image']['tmp_name'])) {
      //checking image type
      $allowed =  array('png','jpg','jpeg','pdf','gif','PNG','JPG','JPEG','PDF','GIF');
      $filename = $_FILES['news_image']['name'];
      $ext = pathinfo($filename, PATHINFO_EXTENSION);
      if(in_array($ext,$allowed)){
        $tmp_name = $_FILES["news_image"]["tmp_name"];
        $profile = "uploads/images/";
        $set_img = base_url()."uploads/images/";
        // basename() may prevent filesystem traversal attacks;
        // further validation/sanitation of the filename may be appropriate
        $name = basename($_FILES["news_image"]["name"]);
       // $newfilename = 'cat_'.round(microtime(true)).'.'.$ext;

        $newfilename = $name ;
        move_uploaded_file($tmp_name, $profile.$newfilename);
        $fname = $newfilename;
         
 
  }else {
        $Return['error'] = "Invalid file format";
      }
    if($Return['error']!=''){
      $this->output($Return);
    }
  }



        
    if($Return['error']!=''){
          $this->output($Return);
      }
  

  $id =$this->input->post('newsid') ;
      
   $data = array(
    'news_title' => $this->input->post('news_title'),
    'news_image' => $fname,
    'description' => $this->input->post('description'),   
    );

    $this->db->where('id',$id);
    $result = $this->db->update('news_articles', $data);
    if ($result == TRUE) {
      
      //get setting info 
       
       $Return['result'] = 'News updated successfully.';
      
    } else {
      $Return['error'] =  'Bug. Something went wrong, please try again.';
    }
    $this->output($Return);
    exit;
  }

public function banner_status()
  {  
   $session = $this->session->userdata('username');
    if(empty($session)){ 
      redirect('admin');
    } 
    
    $id = $this->input->post('id');
    $status = $this->input->post('status');

 

$this->db->where('id',$id);
    $this->db->update('banners',array('status'=>$status));

  }



    public function banners()
  {  
   $session = $this->session->userdata('username');
    if(empty($session)){ 
      redirect('admin');
    } 
    $data['title'] = 'Banner List';
    $data['bannerdet'] = $this->db->get('banners')->result_array();
    $this->load->view('admin/list_banner', $data);
  }
   


 public function newbanner()
  {   
     $session = $this->session->userdata('username');
    if(empty($session)){ 
      redirect('admin');
    }
    $data['title'] = 'Add new Banner';
    //$data['userdet'] = $this->db->get('users')->result_array();
    $this->load->view('admin/add_banner', $data);
  }


  public function addbanner()
  {   
     $session = $this->session->userdata('username');
    if(empty($session)){ 
      redirect('admin');
    }
   $Return = array('result'=>'', 'error'=>'');
       
    /* Server side PHP input validation */    
    if($this->input->post('banner')==='') {
          $Return['error'] = "Banner Name required";
    }elseif(!(is_uploaded_file($_FILES['banner_image']['tmp_name']))) {
          $Return['error'] = "Banner Image required";
    }  elseif($this->input->post('category')==='') {
          $Return['error'] = "Category required";
    }

    if($Return['error']!=''){
          $this->output($Return);
      }
  
      
   $fname = "" ;
   if(is_uploaded_file($_FILES['banner_image']['tmp_name'])) {
      //checking image type
      $allowed =  array('png','jpg','jpeg','pdf','gif','PNG','JPG','JPEG','PDF','GIF');
      $filename = $_FILES['banner_image']['name'];
      $ext = pathinfo($filename, PATHINFO_EXTENSION);
      if(in_array($ext,$allowed)){
        $tmp_name = $_FILES["banner_image"]["tmp_name"];
        $profile = "uploads/images/";
        $set_img = base_url()."uploads/images/";
        // basename() may prevent filesystem traversal attacks;
        // further validation/sanitation of the filename may be appropriate
        $name = basename($_FILES["banner_image"]["name"]);
       // $newfilename = 'cat_'.round(microtime(true)).'.'.$ext;

        $newfilename = $name ;
        move_uploaded_file($tmp_name, $profile.$newfilename);
        $fname = $newfilename;
         
 
  }else {
        $Return['error'] = "Invalid file format";
      }
    if($Return['error']!=''){
      $this->output($Return);
    }
  }


     
    $data = array(
    'banner_name' => $this->input->post('banner_name'),
    'banner_image' => $fname,
    'banner_description' => $this->input->post('banner_description'), 
     'category' =>  $this->input->post('category'),   
    'status' => 'inactive'
    );
    $result = $this->db->insert('banners', $data);
    if ($result == TRUE) {
      
      //get setting info 
       
       $Return['result'] = 'Banner added successfully.';
      
    } else {
      $Return['error'] =  'Bug. Something went wrong, please try again.';
    }
    $this->output($Return);
    exit;
  }

   public function editbanner()
  {
    $session = $this->session->userdata('username');
    if(empty($session)){ 
      redirect('admin');
    }
        
    $id = $this->uri->segment(3) ;
 

$this->db->select('id, banner_name, banner_image,category,banner_description');
$this->db->where('id',$id);
$query = $this->db->get('banners');
$banner = $query->row() ;
 
 $data = array();
if (isset($banner)){
    $data  = array('id'=>$banner->id,'banner_name'=>$banner->banner_name,'category'=>$banner->category,'banner_image'=>$banner->banner_image,'banner_description'=>$banner->banner_description);
}
  
    $this->load->view('admin/edit_banner', $data);
  }




  public function update_banner()
  {   
     $session = $this->session->userdata('username');
    if(empty($session)){ 
      redirect('admin');
    }

   $Return = array('result'=>'', 'error'=>'');
       
    /* Server side PHP input validation */    
    if($this->input->post('banner_name')==='') {
          $Return['error'] = "Banner Name required";
    } 


$fname = $this->input->post('bimage') ; ;
 if(is_uploaded_file($_FILES['banner_image']['tmp_name'])) {
      //checking image type
      $allowed =  array('png','jpg','jpeg','pdf','gif','PNG','JPG','JPEG','PDF','GIF');
      $filename = $_FILES['banner_image']['name'];
      $ext = pathinfo($filename, PATHINFO_EXTENSION);
      if(in_array($ext,$allowed)){
        $tmp_name = $_FILES["banner_image"]["tmp_name"];
        $profile = "uploads/images/";
        $set_img = base_url()."uploads/images/";
        // basename() may prevent filesystem traversal attacks;
        // further validation/sanitation of the filename may be appropriate
        $name = basename($_FILES["banner_image"]["name"]);
       // $newfilename = 'cat_'.round(microtime(true)).'.'.$ext;

        $newfilename = $name ;
        move_uploaded_file($tmp_name, $profile.$newfilename);
        $fname = $newfilename;
         
 
  }else {
        $Return['error'] = "Invalid file format";
      }
    if($Return['error']!=''){
      $this->output($Return);
    }
  }



        
    if($Return['error']!=''){
          $this->output($Return);
      }
  

  $id =$this->input->post('bannerid') ;
      
   $data = array(
    'banner_name' => $this->input->post('banner_name'),
    'banner_image' => $fname,
    'banner_description' => $this->input->post('banner_description'), 
     'category' => $this->input->post('category'),   
    );

    $this->db->where('id',$id);
    $result = $this->db->update('banners', $data);
    if ($result == TRUE) {
      
      //get setting info 
       
       $Return['result'] = 'Banner updated successfully.';
      
    } else {
      $Return['error'] =  'Bug. Something went wrong, please try again.';
    }
    $this->output($Return);
    exit;
  }



  public function companies()
  {   
     $session = $this->session->userdata('username');
    if(empty($session)){ 
      redirect('admin');
    }
    $data['title'] = 'Companies List';
    $data['companydet'] = $this->db->get('companies')->result_array();
    $this->load->view('admin/list_company', $data);
  }


   


 public function newcompany()
  {   
     $session = $this->session->userdata('username');
    if(empty($session)){ 
      redirect('admin');
    }
    $data['title'] = 'Add New Company';
    //$data['userdet'] = $this->db->get('users')->result_array();
    $this->load->view('admin/add_company', $data);
  }


  public function addcompany()
  {   
     $session = $this->session->userdata('username');
    if(empty($session)){ 
      redirect('admin');
    }
   $Return = array('result'=>'', 'error'=>'');
       
    /* Server side PHP input validation */    
    if($this->input->post('company_name')==='') {
          $Return['error'] = "Company Name required";
    }else if($this->input->post('start_time')==='') {
          $Return['error'] = "Shift start time required";
    }else if($this->input->post('end_time')==='') {
          $Return['error'] = "Shift end time required";
    }

    if($Return['error']!=''){
          $this->output($Return);
      }
  
    $data = array(
     'company_name' => $this->input->post('company_name'),
     'start_time' => $this->input->post('start_time'),
     'end_time' => $this->input->post('end_time'),
     'created_on' => date('Y-m-d'),
      
    );

    $result = $this->db->insert('companies', $data);
    if ($result == TRUE) {
      
      //get setting info 
       
       $Return['result'] = 'Company added successfully.';
      
    } else {
      $Return['error'] =  'Bug. Something went wrong, please try again.';
    }
    $this->output($Return);
    exit;
  }

   public function editcompany()
  {
    $session = $this->session->userdata('username');
    if(empty($session)){ 
      redirect('admin');
    }
        
    $id = $this->uri->segment(3) ;
 

$this->db->select('id, company_name,start_time, end_time');
$this->db->where('id',$id);
$query = $this->db->get('companies');
$company = $query->row() ;
 
 $data = array();
if (isset($company)){
    $data  = array('id'=>$company->id,'company_name'=>$company->company_name,'start_time'=>$company->start_time,'end_time'=>$company->end_time);
}
  
    $this->load->view('admin/edit_company', $data);
  }




  public function update_company()
  {   
     $session = $this->session->userdata('username');
    if(empty($session)){ 
      redirect('admin');
    }

   $Return = array('result'=>'', 'error'=>'');
       
    /* Server side PHP input validation */    
     if($this->input->post('company_name')==='') {
          $Return['error'] = "Company Name required";
    }  else if($this->input->post('start_time')==='') {
          $Return['error'] = "Shift start time required";
    }else if($this->input->post('end_time')==='') {
          $Return['error'] = "Shift end time required";
    }
        
    if($Return['error']!=''){
          $this->output($Return);
      }
  

  $id =$this->input->post('companyid') ;
      
   $data = array(
     'company_name' => $this->input->post('company_name'),
      'start_time' => $this->input->post('start_time'),
      
      'end_time' => $this->input->post('end_time'),
      
    );

    $this->db->where('id',$id);
    $result = $this->db->update('companies', $data);
    if ($result == TRUE) {
      
      //get setting info 
       
       $Return['result'] = 'Company updated successfully.';
      
    } else {
      $Return['error'] =  'Bug. Something went wrong, please try again.';
    }
    $this->output($Return);
    exit;
  }

  public function trainings()
  {   
     $session = $this->session->userdata('username');
    if(empty($session)){ 
      redirect('admin');
    }
    $data['title'] = 'Training List';
    $data['trainingdet'] = $this->db->get('training_courses')->result_array();
    $this->load->view('admin/list_training', $data);
  }


   


 public function newtraining()
  {   
     $session = $this->session->userdata('username');
    if(empty($session)){ 
      redirect('admin');
    }
    $data['title'] = 'Add new training';
     $data['week_days'] = $this->db->get('week_days')->result_array();
    $this->load->view('admin/add_training', $data);
  }


  public function addtraining()
  {   
     $session = $this->session->userdata('username');
    if(empty($session)){ 
      redirect('admin');
    }
   $Return = array('result'=>'', 'error'=>'');
       
    /* Server side PHP input validation */    
    if($this->input->post('company_name')==='') {
          $Return['error'] = "Select company";
    }else if($this->input->post('training_name')==='') {
          $Return['error'] = "Training name required";
    }else if($this->input->post('duration')==='') {
      $Return['error'] = "Add duration of the training";
    }else if($this->input->post('weekly_days')==='') {
      $Return['error'] = "Select day(s) in which the training is provided";
    }else if($this->input->post('no_of_students_per_slot')==='') {
      $Return['error'] = "Add maximum number of students per slot";
    }  

    if($Return['error']!=''){
          $this->output($Return);
      }
  
    $data = array(
     'company_id' => $this->input->post('company_name'),
     'training_name' => $this->input->post('training_name'),
     'duration' => $this->input->post('duration'),
     'duration_in' => $this->input->post('duration_in'), 
     'weekly_days' => implode(',', $this->input->post('weekly_days')), 
     'no_of_students_per_slot' => $this->input->post('no_of_students_per_slot'), 
     'created_on' => date('Y-m-d'), 
      
    );

    $result = $this->db->insert('training_courses', $data);
    if ($result == TRUE) {
      
      //get setting info 
       
       $Return['result'] = 'Training added successfully.';
      
    } else {
      $Return['error'] =  'Bug. Something went wrong, please try again.';
    }
    $this->output($Return);
    exit;
  }

   public function edittraining()
  {
    $session = $this->session->userdata('username');
    if(empty($session)){ 
      redirect('admin');
    }
        
    $id = $this->uri->segment(3) ;
 
 

$this->db->select('*');
$this->db->where('id',$id);
$query = $this->db->get('training_courses ');
$training = $query->row() ;
 
 $data = array();
if (isset($training)){
    $data  = array('id'=>$training->id,'company_id'=>$training->company_id,'training_name'=>$training->training_name,'duration'=>$training->duration,'duration_in'=>$training->duration_in,'weekly_days'=>$training->weekly_days,'no_of_students_per_slot'=> $training->no_of_students_per_slot);
}
     $data['week_days'] = $this->db->get('week_days')->result_array();
  
    $this->load->view('admin/edit_training', $data);
  }




  public function update_training()
  {   
     $session = $this->session->userdata('username');
    if(empty($session)){ 
      redirect('admin');
    }

   $Return = array('result'=>'', 'error'=>'');
       
    /* Server side PHP input validation */    
    if($this->input->post('company_name')==='') {
      $Return['error'] = "Select company";
    }else if($this->input->post('training_name')==='') {
          $Return['error'] = "Training name required";
    }else if($this->input->post('duration')==='') {
      $Return['error'] = "Add duration of the training";
    } else if($this->input->post('weekly_days')==='') {
      $Return['error'] = "Select day(s) in which the training is provided";
    }else if($this->input->post('max_no_of_students')==='') {
      $Return['error'] = "Add maximum number of students per slot";
    }  
      
        
    if($Return['error']!=''){
          $this->output($Return);
      }
  

  $id =$this->input->post('trainingid') ;
      
  $data = array(
    'company_id' => $this->input->post('company_name'),
    'training_name' => $this->input->post('training_name'),
    'duration' => $this->input->post('duration'),
    'duration_in' => $this->input->post('duration_in'), 
    'weekly_days' => implode(',', $this->input->post('weekly_days')), 
    'no_of_students_per_slot' => $this->input->post('no_of_students_per_slot'), 
    
     
   );


    $this->db->where('id',$id);
    $result = $this->db->update('training_courses', $data);
    if ($result == TRUE) {
      
      //get setting info 
       
       $Return['result'] = 'Course updated successfully.';
      
    } else {
      $Return['error'] =  'Bug. Something went wrong, please try again.';
    }
    $this->output($Return);
    exit;
  }



  public function logout() {
  
    $session = $this->session->userdata('username');
     
        
    // Removing session data
   
    $sess_array = array('username' => '');
    $this->session->sess_destroy();
    $Return['result'] = 'Successfully Logout.';
    redirect('admin', 'refresh');
  }
public function test()
{
    $this->load->view('admin/test');
}


public function delteteLogFiles() {
    
$days = 10;
$dir = 'D:/xampp/htdocs/shumua/application/logs/';

$nofiles = 0;

    if ($handle = opendir($dir)) {
    while (( $file = readdir($handle)) !== false ) {
        if ( $file == '.' || $file == '..' || is_dir($dir.'/'.$file) ) {
            continue;
        }

        if ((time() - filemtime($dir.'/'.$file)) > ($days *86400)) {
            $nofiles++;
            unlink($dir.'/'.$file);
        }
    }
    closedir($handle);
    echo "Total files deleted: $nofiles \n";
}

 

}
}