<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

 

class Instructor extends CI_Controller {

    public function __construct() { 
        parent::__construct();
        
        // Load the user send
        $this->load->model('Admin_model');

       
$this->load->model("User_model");
 
 
$this->load->library("pagination");
$this->load->library('Ajax_pagination');
$this->perPage = 9;
$this->uri_segment = 3;
      


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

 
  
 public function index()
  {   
    $data['title'] = 'Almujer';


          $this->db->select('a.*, b.product_name');
          $this->db->from('schedule a');
          $this->db->join('courses b', 'a.course_id = b.id');
          $this->db->where('start_date >= ',date('Y-m-d'));
          $this->db->where('status','a');
          $this->db->order_by("start_date","asc");
          $this->db->limit(20);
          $data['courses'] = $this->db->get()->result_array();

  
    $this->load->view('user/index', $data);
  }
   
 
 

public function login()
  {   
  
  $this->load->view('instructor/login');
  }

  


public function userlogin() {
  
    $email = $this->input->post('email');
    $password = $this->input->post('password');
    /* Define return | here result is used to return user data and error for error message */
    $Return = array('result'=>'', 'error'=>'');
    
    /* Server side PHP input validation */
    if($email==='') {
      $Return['error'] = "Invalid Email Id";
    } elseif($password===''){
      $Return['error'] = "Invalid Password";
    }
    if($Return['error']!=''){
      $this->output($Return);
    }
    
$dataexists = $this->db->get_where('instructor', array('uemail' =>$email , 'upassword'=>md5($password)))->row() ;

$data = $this->db->get_where('instructor', array('uemail' =>$email , 'upassword'=>md5($password))) ;

if($data ->num_rows()>0){
 $result = $this->db->get_where('instructor', array('uemail' =>$email , 'upassword'=>md5($password)))->row()->id ;
}else{
  $result="";
}
          
    if (!empty($result)) {
      
      
        $userdata = $this->db->get_where('instructor', array('id' =>$result))->result()  ;

        $session_data = array(
        'instructor_id' => $userdata[0]->id,
        'instructorname' => $userdata[0]->uname,
        'instructoremail' => $userdata[0]->uemail,
        );


 
 




        // Add user data in session
        $this->session->set_userdata('instructorname', $session_data);
        $this->session->set_userdata('instructor_id', $session_data);
 
        $session = $this->session->userdata('instructorname');
        $instructorid =  $session['instructor_id'];

        $Return['instructordet'] = $this->db->get_where('instructor',array('id'=>$instructorid))->result_array();


         
        $Return['result'] = "Logged In Successfully" ;      
           
        $this->output($Return);
         
      } else {

if(!empty($dataexists)){


 $status =  $dataexists->status ;

 if($status=='p'){
  $Return['error'] = "Registration Pending for approval !!";
$this->output($Return);
}else if($status=='r'){
  $Return['error'] = "Your application was rejected !!";
$this->output($Return);
}


}else{

$Return['error'] = "Invalid Credentials";
$this->output($Return);
}



        $Return['error'] = "Invalid Credentials";
        $this->output($Return);
      }


     


    // if($Return['error']!=''){
    //     $this->load->view('instructor/login',$Return);
    //  }else{
    //   $this->load->view('instructor/dashboard',$Return);
    //  }


      


  }

  public function dashboard()
  {   

  $session = $this->session->userdata('instructorname');
  if(empty($session)){ 
      redirect('instructor/login');
  }


$instructorid =  $session['instructor_id'];

$data['instructordet'] = $this->db->get_where('instructor',array('id'=>$instructorid))->result_array();


  $this->load->view('instructor/dashboard',$data);
  }


 public function edit_profile()
  {   

$session = $this->session->userdata('instructorname');    
if(empty($session)){ 
redirect('instructor/login');
}

$instructorid =  $session['instructor_id'];

    $data['title'] = 'MEIRC';
     $data['instructordet'] = $this->db->get_where('instructor',array('id'=>$instructorid))->result_array();   
    
    $this->load->view('instructor/edit_profile', $data);
  }
   

 // public function digital_marketing()
 //  {   
 //    $data['title'] = 'MEIRC';
 //    $data['serdet'] = $this->db->get('services')->result_array();
 //    $this->load->view('user/digital_marketing', $data);
 //  }
   
   

   public function updateprofile() {


$session = $this->session->userdata('instructorname');   

/* Define return | here result is used to return user data and error for error message */
$Return = array('result'=>'', 'error'=>'');
       
$id = $this->input->post('custid') ;
if($this->input->post('username')==='') {
$Return['error'] = "First Name required";
} else if ($this->input->post('phone')==='') {
$Return['error'] = "Phone No. required";
}  else if($this->input->post('email')==='') {
$Return['error'] = "Email required";
} else if (!filter_var($this->input->post('email'), FILTER_VALIDATE_EMAIL)) {
$Return['error'] = "Invalid email format";
}  




if($Return['error']!=''){
$this->output($Return);
}

 
$data = array(

'uname'         => $this->input->post('username'),
'uemail'      => $this->input->post('email'),
'uphone'         => $this->input->post('phone')
 
 
);
$this->db->where('id',$id);
$result = $this->db->update('instructor',$data);
if ($result == TRUE) {
  $Return['result'] = 'Profile updated successfully.';
 
} else {
$Return['error'] =  'Bug. Something went wrong, please try again.';
}


//$Return['instructordet'] =  $this->db->get_where('instructor',array('id'=>$session['instructor_id']))->result_array();


//$this->load->view('instructor/dashboard',$Return);



$this->output($Return);
exit;
}


public function changepassword()
  {   

$session = $this->session->userdata('instructorname');    
if(empty($session)){ 
redirect('instructor/login');
}

$instructorid =  $session['instructor_id'];

    $data['title'] = 'MEIRC';
     $data['instructordet'] = $this->db->get_where('instructor',array('id'=>$instructorid))->result_array();   
    
    $this->load->view('instructor/changepassword', $data);
  }



  public function updatepassword() {

    $session = $this->session->userdata('instructorname');
if(empty($session)){ 
redirect('instructor');
}



/* Define return | here result is used to return user data and error for error message */
$Return = array('result'=>'', 'error'=>'');

if($this->input->post('oldpassword')==='') {
$Return['error'] = "Old Password required";
}else if(empty($this->db->get_where('instructor',array('id'=> $session['instructor_id'],'upassword'=>md5($this->input->post('oldpassword'))))->row())) {
$Return['error'] = "Old Password is Incorrect";
}else if($this->input->post('newpassword')==='') {
$Return['error'] = "New Password required";
}else if($this->input->post('cpass')==='') {
$Return['error'] = "Confirm Password required";
}  else if($this->input->post('newpassword')!==$this->input->post('cpass')) {
$Return['error'] = "The New password confirmation does not match.";
}


  if($Return['error']!=''){
  $this->output($Return);
  }

// $options = array('cost' => 12);
// $password_hash = password_hash($this->input->post('password'), PASSWORD_BCRYPT, $options);
$password_hash = md5($this->input->post('newpassword'));
$data = array(
 
'upassword' => $password_hash
 
);

 $this->db->where('id',$session['instructor_id']);
$result = $this->db->update('instructor',$data);
if ($result == TRUE) {

$Return['result'] = 'Password Changed successfully.';

} else {
$Return['error'] =  'Bug. Something went wrong, please try again.';
}



  $this->output($Return);
  exit;



}



 public function forgotpassword() {
$data['title'] = "Forgot Password";      
$this->load->view('instructor/forgotpassword', $data);

}

public function send_mail() {

 

                
        /* Define return | here result is used to return user data and error for error message */
        $Return = array('result'=>'', 'error'=>'' );
        
        /* Server side PHP input validation */
        if($this->input->post('email')==='') {
            $Return['error'] = "Enter registered email address";
        } else if(!filter_var($this->input->post('email'), FILTER_VALIDATE_EMAIL)) {
            $Return['error'] = "Invalid email address";
        }
        
        if($Return['error']!=''){
            $this->output($Return);
        }
        
        if($this->input->post('email')) {

        $this->email->set_mailtype("html");

        



            
            $query = $this->db->get_where('instructor',array('uemail'=>$this->input->post('email')));
            
            $user = $query->num_rows();
            if($user > 0) {
                
                $user_info = $query->result();
                $full_name = $user_info[0]->uname ;
                

                $user_id = $user_info[0]->id ;
                $subject = "Reset Password";
                

                $password         =  rand(1000,9999) ;
                $password_hash = md5($password);
                $data['upassword'] = $password_hash;
                    $this->db->where('id', $user_id);
                    $this->db->update('instructor', $data);



                
                $message = 'Hi,'.$full_name.' . Your request for reset password submitted successfully.<br/> Your new password is '  . $password  ;
                
                $this->email->from('noreplyliaorg@gmail.com', "MEIRC");
                $this->email->to($this->input->post('email'));
                
                $this->email->subject($subject);
                $this->email->message($message);
                $this->email->send();
              $Return['result'] = "New password sent to your email address";
    
        
                
            } else {
                /* Unsuccessful attempt: Set error message */
                $Return['error'] = "Email ID does not exists !";
            }


//  if(empty($Return['error'])){
//  $this->load->view('instructor/login',$Return);
//  }else{
// $this->load->view('instructor/forgotpassword',$Return);
// }



            $this->output($Return);
            exit;
        }
    }



  
public function sendupdate()
  {   
  $session = $this->session->userdata('instructorname');    
if(empty($session)){ 
redirect('instructor/login');
}
 
 $data['schedule_id'] = $this->uri->segment(3) ;
 

 $this->load->view('instructor/sendupdate', $data);
  }



   public function scheduleupdate() {


$session = $this->session->userdata('instructorname');   

/* Define return | here result is used to return user data and error for error message */
$Return = array('result'=>'', 'error'=>'');

$Return['schedule_id']  = $this->input->post('schedule_id') ;


       
$schedule_id = $this->input->post('schedule_id') ;
if($this->input->post('description')==='') {
$Return['error'] = "Description required";
}  



$attachment  = $_FILES["attachment"]['name'];
          
 
if($Return['error']==''){

      $images = array();
          $n=0;
        for($i = 0; $i < sizeof($attachment); $i++)
        {
            $n++;
              if(is_uploaded_file($_FILES['attachment']['tmp_name'][$i]))
              {
                $allowed =  array('png','jpg','jpeg','pdf','gif','doc','pdf','PNG','JPG','JPEG','PDF','GIF','DOC','PDF');
                $filename = $_FILES['attachment']['name'][$i];
                $ext = pathinfo($filename, PATHINFO_EXTENSION);
                if(in_array($ext,$allowed))
                {
                    $tmp_name = $_FILES["attachment"]["tmp_name"][$i];
                    $profile = "uploads/images/";
                    $set_img = base_url()."uploads/images/";
                    $name = basename($_FILES["attachment"]["name"][$i]);
                   // $newfilename = 'att_'.round(microtime(true)).$n.'.'.$ext;

                    $newfilename =$name ;
                    move_uploaded_file($tmp_name, $profile.$newfilename);
                    $fname = $newfilename;
                  $images[] =  $fname ;
                }else
                {
                    $Return['error'] = "Invalid file format";
                    $this->output($Return);
                    exit;
                }
            }
          }
        $imagein = implode( ',',  $images);





 $data = array(

'details'      => $this->input->post('description'),
'attachment'   =>  $imagein,
'schedule_id' => $schedule_id
 
 
);

$result = $this->db->insert('instructor_updates',$data);

$insertedid = $this->db->insert_id();
if ($result == TRUE) {


$this->db->where('schedule_id',$schedule_id);
$students = $this->db->get('students')->result_array();


$this->db->where('id',$insertedid);
$senddata = $this->db->get('instructor_updates')->row();

foreach ($students  as  $value) {

   $pstatus = $this->db->get_where('student_transaction_det',array('student_id'=>$value['id'],'schedule_id'=>$schedule_id, 'status'=>'success'))->result_array();


if(!empty($pstatus)){

  $this->email->set_mailtype("html");
$name =   $value['first_name'].' ' .$value['last_name'] ;
$subject = "Course Update from MEIRC"  ;
            
$message = 'Hi,'.$name.',<br/> Here is the new update from your instructor.' ;
$message .= $senddata->details ;

if(!empty($senddata->attachment)){
  $message .= 'Click to download the attachment(s)' ;


  $attachments = $senddata->attachment ;
  $docs = explode( ',', $senddata->attachment) ;

  foreach ($docs  as $att) {
    
  $message .= '<br/><a href="'. site_url().'download?type=images&filename='.$att.'">'.  $att .'  </a>';
  }

}

 



$this->email->from('noreplyliaorg@gmail.com', "MEIRC");
$this->email->to($value['email']);

$this->email->subject($subject);
$this->email->message($message);



//  $this->email->attach(base_url().'uploads/images/'.$attachment);

$this->email->send();


}

  
}
 







$Return['result'] = 'Details added successfully.';
 
} else {
$Return['error'] =  'Bug. Something went wrong, please try again.';
}

}

 
 


//$this->load->view('instructor/sendupdate',$Return);



$this->output($Return);
exit;
}

 
public function profile_view()
  {   
    $session = $this->session->userdata('instructorname');    
if(empty($session)){ 
redirect('instructor/login');
}

$instructorid =  $session['instructor_id'];

 
     
    $data['instructordet'] = $this->db->get_where('instructor',array('id'=>$instructorid))->result_array();
    
    $this->load->view('instructor/viewprofile', $data);
  }


public function instructorcourses()
  {   
    $session = $this->session->userdata('instructorname');    
if(empty($session)){ 
redirect('instructor/login');
}

$instructorid =  $session['instructor_id'];

 
    $this->db->order_by('start_date','desc');
    $this->db->where('start_date >= ',date('Y-m-d'));
    $data['coursedet'] = $this->db->get_where('schedule',array('instructor'=>$instructorid))->result_array();
    
    $this->load->view('instructor/instructorcourses', $data);
  }



  public function viewhistory()
  {   
    

$session = $this->session->userdata('instructorname');    
if(empty($session)){ 
redirect('instructor/login');
}

$schid =  $this->input->post('schid');

 
  $this->db->order_by('created_on','desc');
  $this->db->where('schedule_id',$schid);
  $data['coursedet'] = $this->db->get('instructor_updates')->result_array();
    
    $this->load->view('instructor/viewhistory', $data);
  }

  
  

  public function logout() {
  
    $session = $this->session->userdata('instructorname');
     
        
    // Removing session data
   
    $sess_array = array('instructorname' => '');
    $this->session->sess_destroy();
    $Return['result'] = 'Successfully Logout.';
    redirect('user', 'refresh');
  }


}