<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

 

class User extends CI_Controller {

    public function __construct() { 
        parent::__construct();
        
        // Load the user model
        $this->load->model('Admin_model');

       
$this->load->model("User_model");
 
 
$this->load->library("pagination");
$this->load->library('Ajax_pagination');
$this->perPage = 12;
$this->uri_segment = 3;
      
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

 
 
  
  public function index()
  {   
    $data['title'] = 'Almujer';


          $this->db->select('a.*, b.product_name,c.icon_bg_color,cat_icon, group_concat(start_date)coursedate');
          $this->db->from('schedule a');
          $this->db->join('courses b', 'a.course_id = b.id');
          $this->db->join('category c', 'a.category_id = c.id');
          $this->db->where('start_date >= ',date('Y-m-d'));
          $this->db->where('status','a');
           $this->db->group_by('b.id');
          $this->db->order_by("start_date","asc");
          $this->db->limit(20);
          $data['courses'] = $this->db->get()->result_array();

$this->db->where('category','1');
$this->db->where('status','active');
$data['banners'] = $this->db->get('banners')->result_array();
  
  $data['news'] = $this->db->get('news_articles')->result_array();

    $this->load->view('user/index', $data);
  }

public function about()
  {   
    $data['title'] = 'Almujer';
  
    $this->load->view('user/about', $data);
  }

public function comingsoon()
  {   
    $data['title'] = 'Almujer';
  
    $this->load->view('user/comingsoon', $data);
  }

public function in_house()
  {   
    $data['title'] = 'Almujer';
  
    $this->load->view('user/in_house', $data);
  }

  public function notfound()
  {   
    $data['title'] = 'Almujer';
  
    $this->load->view('user/404', $data);
  }

  
  // public function courses()
  // {   
  //   $data['title'] = 'Almujer';
  //   $data['schedule'] = $this->db->get('schedule')->result_array();
  
  //   $this->load->view('user/courses', $data);
  // }






  public function getcategory_withtype()
{ 
   $type = $this->input->post('type');  




  
$this->db->distinct();

$this->db->select('category_id');

$this->db->where('type', $type); 

$categories = $this->db->get('schedule')->result_array();

$typecategory = array();

foreach ($categories as $value) {

  array_push($typecategory, $value['category_id']);
  
}

if(!empty($typecategory)){
    $this->db->where_in('id',$typecategory); 
  }else{
      $this->db->where_in('id',''); 
  }
  
    $data['categories'] = $this->db->get('category')->result_array();
   $this->load->view('user/category_filter', $data);
}  



  public function getsubcat()
{ 
   $category = $this->input->post('category_id');  

   if(!empty($this->input->post('subcategory'))){
       $data['subselected'] =$this->input->post('subcategory') ; 
     }  else{
      $data['subselected'] = "" ;
     }





$this->db->distinct();

$this->db->select('sub_cat_id');

$this->db->where_in('category_id', $category );

$subcategories = $this->db->get('schedule')->result_array();

$subcategory = array();

foreach ($subcategories as $value) {

  array_push($subcategory, $value['sub_cat_id']);
  
}



if(!empty($subcategory)){
  $this->db->where_in('id', $subcategory );
}else{
   $this->db->where_in('id', '' );
}

   
   $this->db->order_by('subcategory_name','asc');
   $data['subcategories'] = $this->db->get('subcategory')->result_array();
   $this->load->view('user/subcategory', $data);
}  



function courses()
{




$data = array();

$type = "";
$data['type'] =  "";
$data['scategory'] =  "";
$data['subcategory'] =  "";
$data['subselected'] = "";
$data['category_name'] = "" ;
$data['category_type'] = "";
$data['searchtext'] = "" ;

if ($this->input->get('type')!='') {
if(!empty($this->input->get('type'))){
$type = $this->input->get('type') ;

$data['type'] =  $type;
// $category=explode(',', $category);
}
 
if(!empty($type)){

  if( $type=='public'){
    $conditions['search']['type'] = 'Public Classrooms';
  }else if($type=='virtual'){
    $conditions['search']['type'] = 'Virtual Instructor - Lead';
  }else if($type=='inhouse'){
    $conditions['search']['type'] = 'In House';
  }else if($type=='certified'){
    $conditions['search']['type'] = 'Certified Courses';
 $data['category_type']='Certified Courses';
  }
}
}


if ($this->input->get('category')!='') {
if(!empty($this->input->get('category'))){
$category = $this->input->get('category') ;
$data['scategory'] =  $category;
$data['category_name'] = $this->Admin_model->get_type_name_by_id('category','id', $category,'category_name');
// $category=explode(',', $category);
}


if(!empty($category)){

    $conditions['search']['category'] = $category;
}


}


if ($this->input->get('search')!='') {
if(!empty($this->input->get('search'))){
$search = $this->input->get('search') ;
$data['searchtext'] =  $search;
}
if(!empty($search)){
    $conditions['search']['search'] = $search;
}
}



if ($this->input->get('subcategory')!='') {


if(!empty($this->input->get('subcategory'))){
$subcategory = $this->input->get('subcategory') ;

$data['subcategory'] =  $subcategory;
$data['subselected'] =  $subcategory;

// $category=explode(',', $category);
}


if(!empty($subcategory)){

    $conditions['search']['subcategory'] = $subcategory;
}


}



$conditions['limit'] = $this->perPage;
//$data['schedule'] = $this->db->get('schedule')->result_array();

//total rows count


if(!empty($this->User_model->getRows())){
$totalRec = count($this->User_model->getRows());
}
else{
$totalRec = 0;
}



//pagination configuration
$config['target']      = '#postList';
$config['base_url']    = base_url().'user/ajaxlisted';
$config['total_rows']  = $totalRec;
$config['per_page']    = $this->perPage;
$config['uri_segment']    = $this->uri_segment;
$config['link_func']   = 'searchFilter';
$this->ajax_pagination->initialize($config);

$this->db->order_by('category_name','asc');
$data['categories'] = $this->db->get('category')->result_array();

$data['subcategories'] = $this->db->get('subcategory')->result_array();


//get the posts data
//$data['posts'] = $this->User_model->getRows(array('limit'=>$this->perPage));
$data['posts'] = $this->User_model->getRows($conditions);


//load the view
$this->db->where('status','active');
$this->db->where('category','3');
$data['banners'] = $this->db->get('banners')->row();


$this->db->where('status','active');
$this->db->where('category','3');
$data['coursebanners'] = $this->db->get('banners')->row();

$this->db->where('status','active');
$this->db->where('category','4');
$data['certifiedcoursebanners'] = $this->db->get('banners')->row();


$data['selectedtype']="";

$this->load->view('user/courses', $data);
}

function ajaxlisted(){



$conditions = array();
//calc offset number
$page = $this->input->post('page');
if(!$page){ 
$offset = 0;
}else{
$offset = $page;
}
//set conditions for search
$data['category_name'] = "" ;
 $data['category_type'] ="";
$data['searchtext'] = "" ;

$category = "";
if(!empty($this->input->post('category'))){
$category = $this->input->post('category') ;




// $category=explode(',', $category);
}
 
if(!empty($category)){
$conditions['search']['category'] = $category;
$data['category_name'] = $this->Admin_model->get_type_name_by_id('category','id', $category,'category_name');
}


$subcategory = "";
if(!empty($this->input->post('subcategory'))){
$subcategory = $this->input->post('subcategory') ;
// $category=explode(',', $category);
}
 
if(!empty($subcategory)){
$conditions['search']['subcategory'] = $subcategory;
}







$type = "";
if(!empty($this->input->post('type'))){
$type = $this->input->post('type') ;
// $category=explode(',', $category);
}



 
if(!empty($type)){
$conditions['search']['type'] = $type;

if($type=='Certified Courses'){
  $data['category_type']='Certified Courses';
} 

}

 $data['selectedtype']="";

 if( $type=='Public Classrooms'){
    $data['selectedtype'] = 'public';
  }else if($type=='Virtual Instructor - Lead'){
    $data['selectedtype'] = 'virtual';
  }else if($type=='In House'){
   $data['selectedtype'] = 'inhouse';
  }else if($type=='Certified Courses'){
   $data['selectedtype'] = 'certified';
  }




$sortby = "";
if(!empty($this->input->post('sortby'))){
$sortby = $this->input->post('sortby') ;
// $category=explode(',', $category);
}

if(!empty($sortby)){
$conditions['search']['sortby'] = $sortby;
}

$searchtext = "";
if(!empty($this->input->post('searchtext'))){
$searchtext = $this->input->post('searchtext') ;
// $category=explode(',', $category);
}

if(!empty($searchtext)){
$conditions['search']['searchtext'] = $searchtext;
}
 
//total rows count
if(!empty($this->User_model->getRows($conditions))){
$totalRec = count($this->User_model->getRows($conditions));
}
else{
$totalRec = 0;
}
//pagination configuration
$config['target']      = '#postList';
$config['base_url']    = base_url().'user/ajaxlisted';
$config['total_rows']  = $totalRec;
$config['per_page']    = $this->perPage;
$config['uri_segment']    = $this->uri_segment;
$config['link_func']   = 'searchFilter';
$this->ajax_pagination->initialize($config);
//set start and limit
$conditions['start'] = $offset;
$conditions['limit'] = $this->perPage;
//get posts data
$data['posts'] = $this->User_model->getRows($conditions);
//load the view

 

$data['subcategories'] = $this->db->get('subcategory')->result_array();

 

$this->load->view('user/ajaxlisted', $data, false);
}




  public function details()
  {   
    $data['title'] = 'Almujer';


   $id = $this->uri->segment(3) ;
   $type = $this->input->get('type');


 


  if( $type=='public'){
    $data['selected'] = 'Public Classrooms';
  }else if($type=='virtual'){
   $data['selected']  = 'Virtual Instructor - Lead';
  }else if($type=='inhouse'){
   $data['selected']  = 'In House';
  }else if($type=='certified'){
   $data['selected']   = 'Certified Courses';
 
  }else{
    $data['selected'] ="" ;
  }



 
$this->db->where('course_id',  $id);
$result = $this->db->get('course_view_count')->row();


  
if(!empty($result)){

  $count = $result->count ;
  $count = $count +1 ;

$this->db->where('course_id',  $id);
$this->db->update('course_view_count',array('count'=>$count));

}else{
  $count = 1 ;
  $this->db->insert('course_view_count',array('course_id' => $id,'count'=>$count));
}


$data['viewcount'] = $count ;



$this->db->where('id',$id);

$data['coursedet'] = $this->db->get('schedule')->row();

    $this->load->view('user/php-managment', $data);
  }

   public function services()
  {  
       $this->db->where('status','active');
	   $this->db->where('category','2');
	$data['banners'] = $this->db->get('banners')->row();
    $this->load->view('user/services',$data);
  }

  public function contact()
  {   
 
    $this->load->view('user/contact');
  }

 

  public function companyregister()
  {  
  $data['sch_id'] = $this->session->userdata('sch_id') ;
  $this->load->view('user/companyregister',$data);
  }


 public function companyreg() {

/* Define return | here result is used to return user data and error for error message */
$Return = array('result'=>'', 'error'=>'');
$Return['sch_id'] = $this->session->userdata('sch_id') ;

 

if($this->input->post('org_name')==='') {
$Return['error'] = "Organisation Name required";
}   else if(preg_match("/^(\pL{1,}[ ]?)+$/u",$this->input->post('org_name'))!=1) {
$Return['error'] = "Only letters are allowed in Name!!!";

 }else if($this->input->post('no_employees')==='0') {
       $Return['error'] = "Select no. of employees for training";;
    }else if($this->input->post('location')==='') {
       $Return['error'] = "Enter location";;
    }  else if($this->input->post('name')==='') {
             $Return['error'] = "Contact name required";
        }    else if($this->input->post('email')==='') {
$Return['error'] = "Email required";
} else if (!filter_var($this->input->post('email'), FILTER_VALIDATE_EMAIL)) {
$Return['error'] = "Invalid email format";
}  else if($this->input->post('contact_no')==='') {
             $Return['error'] = "Contact number required";
        }   




// if($Return['error']!=''){
// $this->output($Return);
// }


if(empty($Return['error'])){
// $options = array('cost' => 12);
// $password_hash = password_hash($this->input->post('password'), PASSWORD_BCRYPT, $options);
 
$data = array(
'org_name'         => $this->input->post('org_name'),
'no_employees'         => $this->input->post('no_employees'),
//'location'         => $this->input->post('location'),
'course_type'         => $this->input->post('course_type'),
'contact_name'         => $this->input->post('name'),
'contact_email'         => $this->input->post('email'),
'contact_no'         => $this->input->post('contact_no'),
'schedule_id'         => $this->input->post('sch_id'),
'status' => 'a',
 
'register_date' => date('Y-m-d'),
'created_on' => date('Y-m-d h:i:s')
);


$result = $this->db->insert('temp_company_reg',$data);
$Return['insertedid'] = $this->db->insert_id();

// if ($result == TRUE) {

//   $Return['result'] = 'Registration completed successfully.';
 
// } else {
// $Return['error'] =  'Bug. Something went wrong, please try again.';
// }
}


if($Return['error']!=''){
     $this->load->view('user/companyregister',$Return);
     }else{
      $this->load->view('user/confirmcompanyreg',$Return);
     }

//  $this->load->view('user/companyregister',$Return);


// $this->output($Return);
// exit;
}

   public function confirmcompanyreg() {


$Return = array('result'=>'', 'error'=>'');
$id =  $this->input->post('insertedid') ;
$Return['insertedid'] = $id ;

 $this->db->where('id', $id); 
 $company = $this->db->get('temp_company_reg')->row();

 
$data = array(
'org_name'         => $company->org_name ,
'no_employees'         => $company->no_employees,
//'location'         => $company->location,
'course_type'         => $company->course_type,
'contact_name'         => $company->contact_name,
'contact_email'         => $company->contact_email,
'contact_no'         => $company->contact_no,
'schedule_id'         => $company->schedule_id,
 'status' => $company->status,
 
'register_date' => date('Y-m-d'),
'created_on' => date('Y-m-d h:i:s')
);


$result = $this->db->insert('company_reg',$data);

if ($result == TRUE) {



$this->db->where('id',$id);
$this->db->delete('temp_company_reg')  ;


                $this->email->set_mailtype("html");
                $name = $company->org_name;
                $subject = "Registered successfully";
                              
                $message = 'Hi,'.$name.' . Thanks for registering with us.<br/> We will contact you soon. Find the register details below' ;


                $this->db->where('id',$company->schedule_id);
                $scheduledet = $this->db->get('schedule')->row();
 

               $coursename =  $this->Admin_model->get_type_name_by_id('courses','id',  $scheduledet->course_id,'product_name') ;

                                 

                $message = "The course details & schedule .<br/>
                Course Name :". $coursename." <br/>
                Date & Time :".date("d-M-y", strtotime($scheduledet->start_date)).' & '. $scheduledet->time . " <br/> 
                Location : ". $scheduledet->location  . "<br/><br/>" ;

                $message .='Course Type : '.$company->course_type.'<br/>'  ;
                  $message .='Organisation Name : '.$company->org_name.'<br/>'  ;
                 $message .='Location : '.$company->location  .'<br/>' ;
               
                $message .='Contact Name : '.$company->contact_name.'<br/>'  ;
                $message .='Email : '.$company->contact_email .'<br/>'  ;
                $message .='Contact No : '.$company->contact_no ;

                
                $this->email->from('noreplyliaorg@gmail.com', "MEIRC");
                $this->email->to($company->contact_email);
                
                $this->email->subject($subject);
                $this->email->message($message);
                $this->email->send();



                $this->email->set_mailtype("html");
                $name =  'MEIRC - sales team ' ;
                $subject = "A company registered for training";
                              
                $message = 'Hi, MEIRC - sales team. A company has been registered for training('. $company->course_type  .').<br/> Find the details below'.'<br/>'  ;


                $this->db->where('id',$company->schedule_id);
                $scheduledet = $this->db->get('schedule')->row();
 

               $coursename =  $this->Admin_model->get_type_name_by_id('courses','id',  $scheduledet->course_id,'product_name') ;

                                 

                $message .= "The course details & schedule .<br/>
                Course Name :". $coursename." <br/>
                Date & Time :".date("d-M-y", strtotime($scheduledet->start_date)).' & '. $scheduledet->time . " <br/> 
                Location : ". $scheduledet->location  . "<br/><br/>" ;

                $message .='Course Type : '.$company->course_type.'<br/>'  ;




                 $message .='Organisation Name : '.$company->org_name.'<br/>'  ;
                 $message .='Location : '.$company->location  .'<br/>' ;
               
                $message .='Contact Name : '.$company->contact_name.'<br/>'  ;
                $message .='Email : '.$company->contact_email .'<br/>'  ;
                $message .='Contact No : '.$company->contact_no ;
                
                $this->email->from('noreplyliaorg@gmail.com', "MEIRC");
                $this->email->to('mokhamis@meircsa.com');
                
                $this->email->subject($subject);
                $this->email->message($message);
                $this->email->send();


  $Return['result'] = 'Registration completed successfully.';
 
} else {
$Return['error'] =  'Bug. Something went wrong, please try again.';
}


  $this->load->view('user/confirmcompanyreg',$Return);

//$this->courses();
// $this->output($Return);
// exit;
}

  

   public function register()
  {   

  $session = $this->session->userdata('customername');
  if(empty($session)){ 
    redirect('user/login');
  }


 
 
  $data['sch_id'] = $this->session->userdata('sch_id') ;
  $this->load->view('user/register',$data);
  }



 
function emailexists()
{
$email  = $this->input->post('email');
$admin  = $this->db->get('students')->result_array();
$exists = 'no';
foreach ($admin as $row) {
if ($row['email'] == $email) {
$exists = 'yes';
}
}
echo $exists;
}

public function signup() {



$session = $this->session->userdata('customername');

 
  
/* Define return | here result is used to return user data and error for error message */
$Return = array('result'=>'', 'error'=>'');
$Return['sch_id'] = $this->session->userdata('sch_id') ;

 

if($this->input->post('first_name')==='') {
$Return['error'] = "First Name required";
}   else if(preg_match("/^(\pL{1,}[ ]?)+$/u",$this->input->post('first_name'))!=1) {
$Return['error'] = "Only letters are allowed in Name!!!";

}else if($this->input->post('phoneno')==='') {
       $Return['error'] = "Phone No. required";;
    }   else if($this->input->post('email')==='') {
$Return['error'] = "Email required";
} else if (!filter_var($this->input->post('email'), FILTER_VALIDATE_EMAIL)) {
$Return['error'] = "Invalid email format";
}  else if($this->input->post('password')==='') {
             $Return['error'] = "Password required";
        }  else if($this->input->post('password')!==$this->input->post('password_confirmation')) {
             $Return['error'] = "The password confirmation does not match.";
        }




// if($Return['error']!=''){
// $this->output($Return);
// }


if(empty($Return['error'])){
// $options = array('cost' => 12);
// $password_hash = password_hash($this->input->post('password'), PASSWORD_BCRYPT, $options);
$password_hash = md5($this->input->post('password'));
$data = array(
'cus_id' => $session['customer_id'],
'first_name'         => $this->input->post('first_name'),
'email'         => $this->input->post('email'),
'phoneno'         => $this->input->post('phoneno'),
'schedule_id'         => $this->input->post('sch_id'),
'status' => 'a',
'password' => $password_hash,
'register_date' => date('Y-m-d'),
'created_on' => date('Y-m-d h:i:s')
);
$result = $this->db->insert('temp_students',$data);
$Return['insertedid'] = $this->db->insert_id();
// if ($result == TRUE) {

//                 $this->email->set_mailtype("html");
//                 $name =  $this->input->post('first_name') ;
//                 $subject = "Registered successfully";
                              
//                 $message = 'Hi,'.$name.' . Thanks for registering with us.<br/> We will notify you on course commencement.' ;
                
//                 $this->email->from('noreplyliaorg@gmail.com', "MEIRC");
//                 $this->email->to($this->input->post('email'));
                
//                 $this->email->subject($subject);
//                 $this->email->message($message);
//                 $this->email->send();


//   $Return['result'] = 'Registration completed successfully.';
 
// } else {
// $Return['error'] =  'Bug. Something went wrong, please try again.';
// }
}

    if($Return['error']!=''){
     $this->load->view('user/register',$Return);
     }else{
      $this->load->view('user/confirmregister',$Return);
     }


}





/*
public function confirmregister() {

$Return = array('result'=>'', 'error'=>'');
$id =  $this->input->post('insertedid') ;

 $this->db->where('id', $id); 
 $students = $this->db->get('temp_students')->row();


if(!empty( $students)){
  $schid = $students->schedule_id ;
  $this->db->where('id',$id);
  $scheduledet = $this->db->get('schedule')->row();
  
  $coursename =  $this->Admin_model->get_type_name_by_id('courses','id',  $scheduledet->course_id,'product_name') ;

  $paymenturl = $this->payment($scheduledet->price,$coursename,$id,$schid) ;


redirect($paymenturl, 'refresh');
}else{

  $Return['error'] = "Error in processing. Please try again later";
  $this->load->view('user/confirmregister',$Return);

  }
}
*/





public function confirmregister() {

$Return = array('result'=>'', 'error'=>'');
$id =  $this->input->post('insertedid') ;


$Return['insertedid'] = $id ;


 $this->db->where('id', $id); 
 $students = $this->db->get('temp_students')->row();

 if(!empty( $students)){
  $schid = $students->schedule_id ;
  $this->db->where('id',$id);
  $scheduledet = $this->db->get('schedule')->row();
  
  $coursename =  $this->Admin_model->get_type_name_by_id('courses','id',  $scheduledet->course_id,'product_name') ;

  


$data = array(
'cus_id'=>$students->cus_id,
'first_name'         => $students->first_name,
 
'email'         => $students->email,
'phoneno'         => $students->phoneno,
'schedule_id'         => $students->schedule_id,
'status' => $students->status,
'password' => $students->password,
'register_date' => date('Y-m-d'),
'created_on' => date('Y-m-d h:i:s')
);

$result = $this->db->insert('students',$data);
$stid = $this->db->insert_id();

$paymenturl = $this->payment($scheduledet->price,$coursename,$stid,$schid) ;


if ($result == TRUE) {


$this->db->where('id',$id);
$this->db->delete('temp_students')  ;



                $this->email->set_mailtype("html");
                $name = $students->first_name;
                $subject = "Registered successfully";
                              
                $message = 'Hi,'.$name.' . Thanks for registering with us.<br/> We will contact you soon. Find the register details below' ;


                $this->db->where('id',$students->schedule_id);
                $scheduledet = $this->db->get('schedule')->row();
 

               $coursename =  $this->Admin_model->get_type_name_by_id('courses','id',  $scheduledet->course_id,'product_name') ;

                                 

                $message = "The course details & schedule .<br/>
                Course Name :". $coursename." <br/>
                Date & Time :".date("d-M-y", strtotime($scheduledet->start_date)).' & '. $scheduledet->time . " <br/> 
                Location : ". $scheduledet->location  . "<br/><br/> Please make the payment bu clicking the following link .<br/><br/>" . $paymenturl ;

                
               
                $message .='Contact Name : '.$students->first_name.'<br/>'  ;
                $message .='Email : '.$students->email .'<br/>'  ;
                $message .='Contact No : '.$students->phoneno ;

                
                $this->email->from('noreplyliaorg@gmail.com', "MEIRC");
                $this->email->to($students->email);
                
                $this->email->subject($subject);
                $this->email->message($message);
                $this->email->send();



                $this->email->set_mailtype("html");
                $name =  'MEIRC - sales team ' ;
                $subject = "A company registered for training";
                              
                $message = 'Hi, MEIRC - sales team. A company has been registered for training.<br/> Find the details below'.'<br/>'  ;


                $this->db->where('id',$students->schedule_id);
                $scheduledet = $this->db->get('schedule')->row();
 

               $coursename =  $this->Admin_model->get_type_name_by_id('courses','id',  $scheduledet->course_id,'product_name') ;

                                 

                $message .= "The course details & schedule .<br/>
                Course Name :". $coursename." <br/>
                Date & Time :".date("d-M-y", strtotime($scheduledet->start_date)).' & '. $scheduledet->time . " <br/> 
                Location : ". $scheduledet->location  . "<br/><br/>" ;

               
                 $message .='Contact Name : '.$students->first_name.'<br/>'  ;
                $message .='Email : '.$students->email .'<br/>'  ;
                $message .='Contact No : '.$students->phoneno ;
                
                $this->email->from('noreplyliaorg@gmail.com', "MEIRC");
                $this->email->to('mokhamis@meircsa.com');
                
                $this->email->subject($subject);
                $this->email->message($message);
                $this->email->send();


  $Return['result'] = 'Registration completed successfully.';
 
} else {
$Return['error'] =  'Bug. Something went wrong, please try again.';
}


//redirect($paymenturl, 'refresh');
}else{

  $Return['error'] = "Error in processing. Please try again later";
  $this->load->view('user/confirmregister',$Return);

  }





  $this->load->view('user/confirmcompanyreg',$Return);

//$this->courses();


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
        'cc_last_name' => $this->Admin_model->get_type_name_by_id('students','id',$studentid,'first_name'),            //This will be prefilled as Credit Card Last Name
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
        "site_url" => base_url()."user/payment",    //The requesting website be exactly the same as the website/URL associated with your PayTabs Merchant Account
        'return_url' => base_url()."user/checkpayment",
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

$inv_ref_no = $verify->pt_invoice_id ;
$studentid = $verify->reference_no ;


  
//$rescode = "768";
 if($rescode==100){

$amount = $verify->amount; 

$transactionId = $verify->transaction_id; 



$this->db->where('id',$studentid);
$students = $this->db->get('students')->row();


  $userdata = $this->db->get_where('customer', array('id' =>$students->cus_id))->result()  ;

        $session_data = array(
        'customer_id' => $userdata[0]->id,
        'customername' => $userdata[0]->first_name,
        'email' => $userdata[0]->email,
        );
        // Add user data in session
        $this->session->set_userdata('customername', $session_data);
        $this->session->set_userdata('customer_id', $session_data);

      




// if(!empty($students)){
//   $data = array(
//     'cus_id'=>$students->cus_id,
// 'first_name'         => $students->first_name,
 
// 'email'         => $students->email,
// 'phoneno'         => $students->phoneno,
// 'schedule_id'         => $students->schedule_id,
// 'status' => $students->status,
// 'password' => $students->password,
// 'register_date' => date('Y-m-d'),
// 'created_on' => date('Y-m-d h:i:s')
// );
// $result = $this->db->insert('students',$data);
// $stid = $this->db->insert_id();
// }


$data= array(
  'status'=>'success',
  'transaction_id'=>$transactionId
   
);
$this->db->where('student_id',$studentid);
$this->db->where('inv_ref_no',$inv_ref_no);
$update = $this->db->update('student_transaction_det',$data);
    
  if($update){
                $this->email->set_mailtype("html");
                $name =  $students->first_name.' '.$students->last_name    ;

                $this->db->where('id',$students->schedule_id);
                $scheduledet = $this->db->get('schedule')->row();
 

               $coursename =  $this->Admin_model->get_type_name_by_id('courses','id',  $scheduledet->course_id,'product_name') ;

                $subject = "Course Payment completed successfully   ";
                              

                $message = "Your registration & payment completed successfully. <br/>The course details & schedule are as per below .<br/>
                Course Name :". $coursename." <br/>
                Date & Time :".date("d-M-y", strtotime($scheduledet->start_date)).' & '. $scheduledet->time . " <br/> 
                Location : ". $scheduledet->location  . "<br/><br/>" ;
 
                $message .= 'Thanks for registering with us.';

                $this->email->from('noreplyliaorg@gmail.com', "MEIRC");
                $this->email->to($students->email);
                
                $this->email->subject($subject);
                $this->email->message($message);
                $this->email->send();
  }


// $this->db->where('id',$studentid);
// $this->db->delete('temp_students')  ;


$this->load->view('user/success');
    
    
   }elseif($rescode==1000){

$data= array(
  'status'=>'failed',
  'transaction_id'=>"",
    
);
$this->db->where('student_id',$studentid);
$this->db->where('inv_ref_no',$inv_ref_no);
$this->db->update('student_transaction_det',$data);




// echo "failed";
$this->load->view('user/failed');



   } else{


$data= array(
  'status'=>'failed',
  'transaction_id'=>$transactionId,
  
);
$this->db->where('student_id',$studentid);
$this->db->where('inv_ref_no',$inv_ref_no);
$this->db->update('student_transaction_det',$data);


$this->db->where('id',$studentid);
$this->db->delete('temp_students')  ;

// echo "failed";
$this->load->view('user/failed');

 }


   // $this->packages();
  }




public function login()
  {   
  
  $this->load->view('user/login');
  }

public function userregister()
  {   
  
  $this->load->view('user/signup');
  }


function useremailexists()
{
$email  = $this->input->post('email');
$admin  = $this->db->get('customer')->result_array();
$exists = 'no';
foreach ($admin as $row) {
if ($row['email'] == $email) {
$exists = 'yes';
}
}
echo $exists;
}

  public function usersignup() {

/* Define return | here result is used to return user data and error for error message */
$Return = array('result'=>'', 'error'=>'');
  
 

if($this->input->post('first_name')==='') {
$Return['error'] = "First Name required";
}   else if(preg_match("/^(\pL{1,}[ ]?)+$/u",$this->input->post('first_name'))!=1) {
$Return['error'] = "Only letters are allowed in Name!!!";

}else if($this->input->post('last_name')==='') {
       $Return['error'] = "Last name required";;
    }  else if(preg_match("/^(\pL{1,}[ ]?)+$/u",$this->input->post('last_name'))!=1) {
$Return['error'] = "Only letters are allowed in Name!!!";
    }else if($this->input->post('phoneno')==='') {
       $Return['error'] = "Phone No required";;
    }   else if($this->input->post('email')==='') {
$Return['error'] = "Email required";
} else if (!filter_var($this->input->post('email'), FILTER_VALIDATE_EMAIL)) {
$Return['error'] = "Invalid email format";
}  else if($this->input->post('password')==='') {
             $Return['error'] = "Password required";
        }  else if($this->input->post('password')!==$this->input->post('password_confirmation')) {
             $Return['error'] = "The password confirmation does not match.";
        }




if($Return['error']!=''){
$this->output($Return);
}


if(empty($Return['error'])){
// $options = array('cost' => 12);
// $password_hash = password_hash($this->input->post('password'), PASSWORD_BCRYPT, $options);
$password_hash = md5($this->input->post('password'));
$data = array(
'first_name'         => $this->input->post('first_name'),
'last_name'         => $this->input->post('last_name'),
'email'         => $this->input->post('email'),
'phone_no'         => $this->input->post('phoneno'),
 
 'status' => 'a',
'password' => $password_hash,
'register_date' => date('Y-m-d'),
'created_on' => date('Y-m-d h:i:s')
);
$result = $this->db->insert('customer',$data);

// $schid = $this->session->userdata('sch_id') ;
// $data['schedule_id'] =  $this->session->userdata('sch_id') ;
// if(!empty($schid)){
//   $result = $this->db->insert('students',$data);
// }


if ($result == TRUE) {

                $this->email->set_mailtype("html");
                $name =  $this->input->post('first_name') ;
                $subject = "Registered successfully";
                              
                $message = 'Hi,'.$name.' . Thanks for registering with us.<br/> We will notify you on course commencement.' ;
                
                $this->email->from('noreplyliaorg@gmail.com', "MEIRC");
                $this->email->to($this->input->post('email'));
                
                $this->email->subject($subject);
                $this->email->message($message);
                $this->email->send();


  $Return['result'] = 'Registration completed successfully.';
 
} else {
$Return['error'] =  'Bug. Something went wrong, please try again.';
}
}

  

// if($Return['error']!=''){
//      $this->load->view('user/signup',$Return);
//      }else{
//       $this->load->view('user/login',$Return);
//      }

$this->output($Return);
exit;
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
    
$dataexists = $this->db->get_where('customer', array('email' =>$email , 'password'=>md5($password)))->row() ;

$data = $this->db->get_where('customer', array('email' =>$email , 'password'=>md5($password))) ;

if($data ->num_rows()>0){
 $result = $this->db->get_where('customer', array('email' =>$email , 'password'=>md5($password)))->row()->id ;
}else{
  $result="";
}
          
    if (!empty($result)) {
      
      
        $userdata = $this->db->get_where('customer', array('id' =>$result))->result()  ;

        $session_data = array(
        'customer_id' => $userdata[0]->id,
        'customername' => $userdata[0]->first_name,
        'email' => $userdata[0]->email,
        );


 
 
// if(!empty($this->session->userdata('sch_id'))){

//  $userdet = $this->db->get_where('students',array('schedule_id'=>$this->session->userdata('sch_id'),'email'=>$userdata[0]->email ))->result_array();


// if(empty( $userdet)){

//  $data = array(

// 'first_name'         =>  $userdata[0]->first_name,
// 'last_name'         =>  $userdata[0]->last_name,
// 'email'         =>  $userdata[0]->email,
// 'username'         =>  $userdata[0]->username,
// 'schedule_id' => $this->session->userdata('sch_id') ,
// 'status' => 'a',
// 'password' => '1234',
// 'register_date' => date('Y-m-d'),
// 'created_on' => date('Y-m-d h:i:s')
// );

// $result = $this->db->insert('students',$data);

// }
// }





        // Add user data in session
        $this->session->set_userdata('customername', $session_data);
        $this->session->set_userdata('customer_id', $session_data);
 
        $session = $this->session->userdata('customername');
        $customerid =  $session['customer_id'];

        $Return['customerdet'] = $this->db->get_where('customer',array('id'=>$customerid))->result_array();


         
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


     
 $this->output($Return);
    exit;

    // if($Return['error']!=''){
    //     $this->load->view('user/login',$Return);
    //  }else{
    //   $this->load->view('user/dashboard',$Return);
    //  }


      


  }

  public function dashboard()
  {   

  $session = $this->session->userdata('customername');
  if(empty($session)){ 
      redirect('user/login');
  }


$customerid =  $session['customer_id'];

$data['customerdet'] = $this->db->get_where('customer',array('id'=>$customerid))->result_array();


  $this->load->view('user/dashboard',$data);
  }


 public function edit_profile()
  {   

$session = $this->session->userdata('customername');    
if(empty($session)){ 
redirect('user/login');
}

$customerid =  $session['customer_id'];

    $data['title'] = 'MEIRC';
     $data['customerdet'] = $this->db->get_where('customer',array('id'=>$customerid))->result_array();   
    
    $this->load->view('user/edit_profile', $data);
  }
   

 // public function digital_marketing()
 //  {   
 //    $data['title'] = 'MEIRC';
 //    $data['serdet'] = $this->db->get('services')->result_array();
 //    $this->load->view('user/digital_marketing', $data);
 //  }
   
   

   public function updateprofile() {


$session = $this->session->userdata('customername');   

/* Define return | here result is used to return user data and error for error message */
$Return = array('result'=>'', 'error'=>'');
       
$id = $this->input->post('custid') ;
if($this->input->post('first_name')==='') {
$Return['error'] = "First Name required";
} else if ($this->input->post('last_name')==='') {
$Return['error'] = "Last Name required";
}  else if($this->input->post('email')==='') {
$Return['error'] = "Email required";
}else if($this->input->post('phone_no')==='') {
$Return['error'] = "Phone Number required";
} else if (!filter_var($this->input->post('email'), FILTER_VALIDATE_EMAIL)) {
$Return['error'] = "Invalid email format";
}  




if($Return['error']!=''){
$this->output($Return);
}

 
$data = array(

'first_name'         => $this->input->post('first_name'),
'last_name'      => $this->input->post('last_name'),
'email'         => $this->input->post('email'),
'phone_no'         => $this->input->post('phone_no')
 
);
$this->db->where('id',$id);
$result = $this->db->update('customer',$data);
if ($result == TRUE) {
  $Return['result'] = 'Profile updated successfully.';
 
} else {
$Return['error'] =  'Bug. Something went wrong, please try again.';
}


//$Return['customerdet'] =  $this->db->get_where('customer',array('id'=>$session['customer_id']))->result_array();


//$this->load->view('user/dashboard',$Return);



$this->output($Return);
exit;
}


public function changepassword()
  {   

$session = $this->session->userdata('customername');    
if(empty($session)){ 
redirect('user/login');
}

$customerid =  $session['customer_id'];

    $data['title'] = 'MEIRC';
     $data['customerdet'] = $this->db->get_where('customer',array('id'=>$customerid))->result_array();   
    
    $this->load->view('user/changepassword', $data);
  }





public function request_proposal()
  {   

 
 
  $this->load->view('user/request_proposal');
 }



public function headquarter_map()
  {   
  $this->load->view('user/headquarter_map');
 }

public function training_map()
  {   
  $this->load->view('user/training_map');
 }

  public function updatepassword() {

    $session = $this->session->userdata('customername');
if(empty($session)){ 
redirect('user');
}



/* Define return | here result is used to return user data and error for error message */
$Return = array('result'=>'', 'error'=>'');

if($this->input->post('oldpassword')==='') {
$Return['error'] = "Old Password required";
}else if(empty($this->db->get_where('customer',array('id'=> $session['customer_id'],'password'=>md5($this->input->post('oldpassword'))))->row())) {
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
 
'password' => $password_hash
 
);

 
 $this->db->where('id',$session['customer_id']);
$result = $this->db->update('customer',$data);
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
$this->load->view('user/forgotpassword', $data);

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
            
            $query = $this->db->get_where('customer',array('email'=>$this->input->post('email')));
            
            $user = $query->num_rows();
            if($user > 0) {
                
                $user_info = $query->result();
                $full_name = $user_info[0]->first_name.' '.$user_info[0]->last_name;
                

                $user_id = $user_info[0]->id ;
                $subject = "Reset Password";
                

                $password         =  rand(1000,9999) ;
                $password_hash = md5($password);
                $data['password'] = $password_hash;
                    $this->db->where('id', $user_id);
                    $this->db->update('customer', $data);



                
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
//  $this->load->view('user/login',$Return);
//  }else{
// $this->load->view('user/forgotpassword',$Return);
// }



            $this->output($Return);
            exit;
        }
    }



public function profile_view()
  {   
    $session = $this->session->userdata('customername');    
if(empty($session)){ 
redirect('user/login');
}

$customerid =  $session['customer_id'];

 
     
    $data['customerdet'] = $this->db->get_where('customer',array('id'=>$customerid))->result_array();
    
    $this->load->view('user/viewprofile', $data);
  }


  public function setschsession()
  {   

  $schid =  $this->input->post('schid');
   
  $this->session->set_userdata('sch_id', $schid ); 

$seltype = $this->Admin_model->get_type_name_by_id('schedule','id', $schid , 'type') ;


$session = $this->session->userdata('customername');    


$btn = '' ;


if(empty($session)){ 
$btn .= '<p class="text-center"><a class="tutor-button tutor-btn tutor-btn public" href="'.base_url().'user/login'.'">
        Individual  </a>' ;
} else{
  $btn .= '<p class="text-center"><a class="tutor-button tutor-btn tutor-btn public" href="'.base_url().'user/register'.'">
        Individual  </a>' ;
}

  
       
$btn .= '     ' ;
      

        $btn .= '<a class="tutor-button tutor-btn tutor-btn public" href="'.base_url().'user/companyregister'.'">
         Company  </a></p>' ;
 

 
          



echo    $btn ;

  }



public function studentcourses()
  {   
    $session = $this->session->userdata('customername');    
if(empty($session)){ 
redirect('user/login');
}

$emailid =  $session['email'];

 
     
    $data['coursedet'] = $this->db->get_where('students',array('email'=>$emailid))->result_array();
    
    $this->load->view('user/studentcourses', $data);
  }
  



  public function instructorenquiry() {


    $Return = array('result'=>'', 'error'=>'');
       
    /* Server side PHP input validation */    
    if($this->input->post('name')==='') {
          $Return['error'] = "Name required";
    } else if(preg_match("/^(\pL{1,}[ ]?)+$/u",$this->input->post('name'))!=1) {
      $Return['error'] = "Only letters are allowed!!!";
    } else if($this->input->post('email')==='') {
       $Return['error'] = "Email required";
    } else if (!filter_var($this->input->post('email'), FILTER_VALIDATE_EMAIL)) {
      $Return['error'] = "Invalid email format";
    }

if($Return['error']!=''){
          $this->output($Return);
      }
  


$fname = "" ;
 if(is_uploaded_file($_FILES['attachment']['tmp_name'])) {
      //checking image type
      $allowed =  array('png','jpg','jpeg','pdf','gif','doc','docx','PNG','JPG','JPEG','PDF','GIF');
      $filename = $_FILES['attachment']['name'];
      $ext = pathinfo($filename, PATHINFO_EXTENSION);
      if(in_array($ext,$allowed)){
        $tmp_name = $_FILES["attachment"]["tmp_name"];
        $profile = "uploads/images/";
        $set_img = base_url()."uploads/images/";
        // basename() may prevent filesystem traversal attacks;
        // further validation/sanitation of the filename may be appropriate
        $name = basename($_FILES["attachment"]["name"]);
       // $newfilename = 'cat_'.round(microtime(true)).'.'.$ext;

        $newfilename = $name ;
        move_uploaded_file($tmp_name, $profile.$newfilename);
        $fname = $newfilename;
         
 
      }else {
        $Return['error'] = "Invalid file format";
      }
    
  }



$data = array(
'name'         => $this->input->post('name'),
'email'         => $this->input->post('email'),
'attachment'=>$fname ,
'created_date' => date('Y-m-d h:i:s')
);
 

$result = $this->db->insert('instructor_enquiry',$data);

if ($result == TRUE) {

                $this->email->set_mailtype("html");
                $name =  $this->input->post('name') ;
                $subject = "Enquiry submitted successfully";
                              
                $message = 'Hi,'.$name.' . Thanks for your interest.<br/> We will contact you soon.' ;
                
                $this->email->from('noreplyliaorg@gmail.com', "MEIRC");
                $this->email->to($this->input->post('email'));
                
                $this->email->subject($subject);
                $this->email->message($message);
                $this->email->send();


  $Return['result'] = 'Enquiry submitted successfully.';
 
} else {
$Return['error'] =  'Bug. Something went wrong, please try again.';
}
 

 $this->output($Return);
 exit;

  
 
}




  public function addenquiry() {


    $Return = array('result'=>'', 'error'=>'');
       
    /* Server side PHP input validation */    
    if($this->input->post('name')==='') {
          $Return['error'] = "Name required";
    } else if(preg_match("/^(\pL{1,}[ ]?)+$/u",$this->input->post('name'))!=1) {
      $Return['error'] = "Only letters are allowed!!!";
    } else if($this->input->post('email')==='') {
       $Return['error'] = "Email required";
    } else if (!filter_var($this->input->post('email'), FILTER_VALIDATE_EMAIL)) {
      $Return['error'] = "Invalid email format";
    }else if($this->input->post('phone')==='') {
       $Return['error'] = "Phone number required";
    }else if($this->input->post('message')==='') {
       $Return['error'] = "Message required";
    }


if($Return['error']!=''){
          $this->output($Return);
      }
      
if(empty($Return['error'])){
         

  
$data = array(
'name'         => $this->input->post('name'),
'email'         => $this->input->post('email'),
'phone'         => $this->input->post('phone'),
'message'         => $this->input->post('message'),
'created_on' => date('Y-m-d h:i:s')
);
 

$result = $this->db->insert('enquiries',$data);

if ($result == TRUE) {

                $this->email->set_mailtype("html");
                $name =  $this->input->post('name') ;
                $subject = "Enquiry submitted successfully";
                              
                $message = 'Hi,'.$name.' . Thanks for your enquiry.<br/> We will contact you soon.' ;
                
                $this->email->from('noreplyliaorg@gmail.com', "MEIRC");
                $this->email->to($this->input->post('email'));
                
                $this->email->subject($subject);
                $this->email->message($message);
                $this->email->send();


$Return['result'] = 'Enquiry submitted successfully.';
 
} else {
$Return['error'] =  'Bug. Something went wrong, please try again.';
}
 
}

  $this->output($Return);
  exit;


// if(empty($Return['error'])){
//  $this->load->view('user/contact',$Return);
//  }else{
// $this->load->view('user/contact',$Return);
// }

 
  
 
}






public function arabiccontent_enquiry() {


    $Return = array('result'=>'', 'error'=>'');
       
    /* Server side PHP input validation */    
    if($this->input->post('name')==='') {
          $Return['error'] = "Name required";
    } else if(preg_match("/^(\pL{1,}[ ]?)+$/u",$this->input->post('name'))!=1) {
      $Return['error'] = "Only letters are allowed!!!";
    } else if($this->input->post('email')==='') {
       $Return['error'] = "Email required";
    }else if($this->input->post('phone')==='') {
       $Return['error'] = "Phone No. required";
    }

if($Return['error']!=''){
          $this->output($Return);
      }
  

 


$data = array(
'name'         => $this->input->post('name'),
'email'         => $this->input->post('email'),
'phone'         => $this->input->post('phone'),
'course_id'         => $this->input->post('courseid'),
'created_date' => date('Y-m-d h:i:s')
);
 

$result = $this->db->insert('arabic_enquiry',$data);

if ($result == TRUE) {

                $this->email->set_mailtype("html");
                $name =  $this->input->post('name') ;
                $subject = "Enquiry submitted successfully";
                              
                $message = 'Hi,'.$name.' . Thanks for your interest.<br/> We will contact you soon.' ;
                
                $this->email->from('noreplyliaorg@gmail.com', "MEIRC");
                $this->email->to($this->input->post('email'));
                
                $this->email->subject($subject);
                $this->email->message($message);
                $this->email->send();


$Return['result'] = 'Enquiry submitted successfully.';
 
} else {
$Return['error'] =  'Bug. Something went wrong, please try again.';
}
 

 $this->output($Return);
 exit;

  
 
}


public function readnews(){
   $id = $this->uri->segment(3) ;

  $this->db->where('id',$id);
  $data['news_det'] = $this->db->get('news_articles')->row();
  $this->load->view('user/readnews',$data);

}


public function viewhistory()
  {   
 
$schid =  $this->input->post('schid');

 
  $this->db->order_by('created_on','desc');
  $this->db->where('schedule_id',$schid);
  $data['coursedet'] = $this->db->get('instructor_updates')->result_array();
    
    $this->load->view('user/viewhistory', $data);
  }



  public function sendrequest() {


    $Return = array('result'=>'', 'error'=>'');
       
    /* Server side PHP input validation */    
    if($this->input->post('course_title')==='') {
          $Return['error'] = "Course title required";
    } else if(preg_match("/^(\pL{1,}[ ]?)+$/u",$this->input->post('course_title'))!=1) {
      $Return['error'] = "Only letters are allowed!!!";
    } else if($this->input->post('date')==='') {
       $Return['error'] = "Date required";
    }else if($this->input->post('company_name')==='') {
       $Return['error'] = "Company name required";
    }else if($this->input->post('contact_person')==='') {
       $Return['error'] = "Contact person name required";
    }else if($this->input->post('mobile')==='') {
       $Return['error'] = "Mobile number required";
    }else if($this->input->post('email')==='') {
       $Return['error'] = "Email required";
    } else if (!filter_var($this->input->post('email'), FILTER_VALIDATE_EMAIL)) {
      $Return['error'] = "Invalid email format";
    }

if($Return['error']!=''){
          $this->output($Return);
      }
  

 



$data = array(
'course_title'         => $this->input->post('course_title'),
'req_date'         => $this->input->post('date'),
'company_name'         => $this->input->post('company_name'),
'contact_person'         => $this->input->post('contact_person'),
'mobile'         => $this->input->post('mobile'),
'email'         => $this->input->post('email'),
'other_requirements'         => $this->input->post('other_req'),
'created_on' => date('Y-m-d h:i:s')
);
 

$result = $this->db->insert('proposal_request',$data);

if ($result == TRUE) {

                $this->email->set_mailtype("html");
                $name =  $this->input->post('contact_person') ;
                $subject = "Proposal request submitted successfully";
                              
                $message = 'Hi,'.$name.' . Thanks for your interest.<br/> We will contact you soon.' ;
                
                $this->email->from('noreplyliaorg@gmail.com', "MEIRC");
                $this->email->to($this->input->post('email'));
                
                $this->email->subject($subject);
                $this->email->message($message);
                $this->email->send();


  $Return['result'] = 'Proposal request submitted successfully.';
 
} else {
$Return['error'] =  'Bug. Something went wrong, please try again.';
}
 

 $this->output($Return);
 exit;

  
 
}


  public function logout() {
  
    $session = $this->session->userdata('customername');
     
        
    // Removing session data
   
    $sess_array = array('customername' => '');
    $this->session->sess_destroy();
    $Return['result'] = 'Successfully Logout.';
    redirect('user', 'refresh');
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

  }



  public function blog()
  {
    $data['news'] = $this->db->get('news_articles')->result_array();
    $this->load->view('user/blogcontent',$data);
  }

 function trainings()
{

$data = array();

$conditions['limit'] = $this->perPage;
//$data['schedule'] = $this->db->get('schedule')->result_array();

//total rows count
$data['searchtext'] = "" ;

if(!empty($this->User_model->gettrainings())){
$totalRec = count($this->User_model->gettrainings());
}
else{
$totalRec = 0;
}



//pagination configuration
$config['target']      = '#postList';
$config['base_url']    = base_url().'user/traininglisted';
$config['total_rows']  = $totalRec;
$config['per_page']    = $this->perPage;
$config['uri_segment']    = $this->uri_segment;
$config['link_func']   = 'searchFilter';
$this->ajax_pagination->initialize($config);

$this->db->order_by('company_name','asc');
$data['companies'] = $this->db->get('companies')->result_array();
 
$data['posts'] = $this->User_model->gettrainings($conditions);

 
$this->load->view('user/trainings', $data);
}

function traininglisted(){



$conditions = array();
//calc offset number
$page = $this->input->post('page');
if(!$page){ 
$offset = 0;
}else{
$offset = $page;
}
 
$category = "";
if(!empty($this->input->post('company'))){
$company = $this->input->post('company') ;
 
}
 
if(!empty($company)){
$conditions['search']['company'] = $company;
}
 
 



$sortby = "";
if(!empty($this->input->post('sortby'))){
$sortby = $this->input->post('sortby') ;
// $category=explode(',', $category);
}

if(!empty($sortby)){
$conditions['search']['sortby'] = $sortby;
}

$searchtext = "";
if(!empty($this->input->post('searchtext'))){
$searchtext = $this->input->post('searchtext') ;
// $category=explode(',', $category);
}

if(!empty($searchtext)){
$conditions['search']['searchtext'] = $searchtext;
}
 
//total rows count
if(!empty($this->User_model->gettrainings($conditions))){
$totalRec = count($this->User_model->gettrainings($conditions));
}
else{
$totalRec = 0;
}
//pagination configuration
$config['target']      = '#postList';
$config['base_url']    = base_url().'user/traininglisted';
$config['total_rows']  = $totalRec;
$config['per_page']    = $this->perPage;
$config['uri_segment']    = $this->uri_segment;
$config['link_func']   = 'searchFilter';
$this->ajax_pagination->initialize($config);
//set start and limit
$conditions['start'] = $offset;
$conditions['limit'] = $this->perPage;
//get posts data
$data['posts'] = $this->User_model->gettrainings($conditions);
//load the view

  
$this->load->view('user/traininglisted', $data, false);
}


public function trainingdetails()
{   

 

$id = $this->uri->segment(3) ;

$this->db->where('id',$id);

$data['trainingdet'] = $this->db->get('training_courses')->row();

$companyId = $data['trainingdet']->company_id ;

$this->db->where('company_id',$companyId);
$data['courses'] = $this->db->get('training_courses')->result_array();

$this->load->view('user/training_details', $data);
}


//$slopt = getServiceScheduleSlots(60, '10:00AM', '07:00PM');


}