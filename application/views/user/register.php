<!DOCTYPE html>
<html lang="en" dir="<?php echo $this->session->userdata('dir')?>">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<title><?php echo $this->Admin_model->translate("Register") ?></title>

<link rel="stylesheet" href="<?php echo base_url();?>assets/toastr/toastr.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link rel="icon" type="image/png" href="<?php echo base_url(); ?>assets/favicon.ico" />

<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/userassets/css/custom.css">

<?php $session = $this->session->userdata('language');

if($session =='Arabic'){ ?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/userassets/css/rtl.css">
<?php } ?>

<link rel='stylesheet' id='elementor-frontend-css'  href='<?php echo base_url();?>assets/userassets/css/frontend.min2a45.css?ver=3.0.13' type='text/css' media='all' />



<link rel='stylesheet' id='tutor-frontend-css'  href='<?php echo base_url();?>assets/userassets/css/tutor-front.minb34d.css?ver=1.7.4' type='text/css' media='all' />

<link rel='stylesheet' id='elementor-icons-ekiticons-css'  href='<?php echo base_url();?>assets/userassets/css/ekiticonsad76.css?ver=5.9.0' type='text/css' media='all' />

<link rel='stylesheet' id='turitor-fonts-css'  href='https://fonts.googleapis.com/css?family=Roboto%3A300%2C300i%2C400%2C400i%2C500%2C500i%2C700%2C700i%2C900%2C900i%7CRubik%3A400%2C400i%2C500%2C500i%2C700%2C700i%2C900%2C900i&amp;ver=1.2.9' type='text/css' media='all' />
<link rel='stylesheet' id='bootstrap-css'  href='<?php echo base_url();?>assets/userassets/css/bootstrap.min077c.css?ver=1.2.9' type='text/css' media='all' />

<link rel='stylesheet' id='turitor-style-css'  href='<?php echo base_url();?>assets/userassets/css/master077c.css?ver=1.2.9' type='text/css' media='all' />
<link rel='stylesheet' id='ekit-widget-styles-css'  href='<?php echo base_url();?>assets/userassets/css/widget-styles5bfb.css?ver=2.0.9.1' type='text/css' media='all' />
<link rel='stylesheet' id='iconfont-css'  href='<?php echo base_url();?>assets/userassets/css/iconfont077c.css?ver=1.2.9' type='text/css' media='all' />
<script src="https://kit.fontawesome.com/ef9a692198.js"></script>
<script type="text/javascript">

$(window).on('load', function () {
$('.preloader').fadeOut(1000);
});

</script> 
</head>
<body>           
<div class='preloader w-100 h-100 position-fixed'>
<div class="loader">
<img class="icon" src="<?php echo base_url();?>assets/userassets/img/ajax-loader.gif" alt="">
</div>
</div>
<?php $this->load->view('user/header');?>


<div id="post-864" class="full-width-content post-864 page type-page status-publish hentry" role="main">
<div class="builder-content">
<div class="woo-xs-content"  role="main">

<div class="container">

<?php if (!empty($error)): ?>
<div class="alert alert-danger"><?php echo $error; ?></div>
<?php endif; ?>
<?php if (!empty($result)): ?>
<div class="alert alert-success"><?php echo $result ; ?></div>
<?php endif; ?>

<div class="row">
<div class="col-md-12">

<div class="course-login-title">
<p class="tutor-form-register-wrap">
<h4 style="text-align: center;">Course Registration</h4>
</p>

</div>



<article id="post-8" class="post-8 page type-page status-publish hentry">

<!-- Article content -->
<div class="entry-content">

<form method="POST"  id="form-slider" action="<?php echo base_url();?>user/signup" enctype="multipart/form-data">


<input type="hidden"  name="sch_id" value="<?php echo $sch_id?>" />


<?php $schdet = $this->db->get_where('schedule',array('id'=>$sch_id))->row() ;

$courseid = $schdet->course_id ;
$courses = $this->db->get('courses')->result_array() ;



?>

<div class="tutor-form-row">

<div class="tutor-form-col-12">
<div class="tutor-form-group">

<label>Course Details</label>
<table id="example" class="table table-striped table-bordered" style="width:100%">
<thead>

<tr>
<th><?php echo $this->Admin_model->translate("Course Name") ?></th>
<td><?php $coursename =  $this->Admin_model->get_type_name_by_id('courses','id',  $schdet->course_id,'product_name') ;

echo $coursename ;
?></td>
</tr>
<tr>
<th><?php echo $this->Admin_model->translate("Schedule Details") ?></th>
<td><?php echo 'Type : '. $schdet->type   ; ?><br/>
<?php echo 'Duration : ' . $schdet->duration   ; ?> Days<br/>
<?php echo  'Location : '. $schdet->location   ; ?><br/>
<?php echo 'Date & Time : '. date("d-M-y", strtotime($schdet->start_date)) .' & '.$schdet->time  
; ?> 


</td>




</tr> 


</thead>


</table>

</div>
</div>


</div>

<?php 
$session= $this->session->userdata('customername') ;
$custdata = $this->db->get_where('customer', array('id' =>$session['customer_id']))->row()  ;
 ?>
<div class="tutor-form-row">
<div class="tutor-form-col-12">
<div class="tutor-form-group">
<label>
<?php echo $this->Admin_model->translate("Name") ?>                </label>

<input type="text" name="first_name" value="<?php echo $custdata->first_name  ?>" placeholder="First Name">
</div>
</div>



</div>

<div class="tutor-form-row">

<div class="tutor-form-col-12">
<div class="tutor-form-group">
<label>
<?php echo $this->Admin_model->translate(" E-Mail") ?>               </label>

<input type="text" name="email"   value="<?php echo $custdata->email?>" placeholder="E-Mail">
<span id="email_note"></span>
</div>
</div>

</div>

<div class="tutor-form-row">

<div class="tutor-form-col-12">
<div class="tutor-form-group">
<label>
<?php echo $this->Admin_model->translate("Phone No.") ?>            </label>

<input type="text" name="phoneno"   value="<?php echo $custdata->phone_no?>" placeholder="Phone No.">

</div>
</div>

</div>


<div class="tutor-form-row" style="display: none">
<div class="tutor-form-col-6">
<div class="tutor-form-group">
<label>
<?php echo $this->Admin_model->translate("Password") ?>               </label>

<input type="password"  name="password" value="1" placeholder="Password">
</div>
</div>

<div class="tutor-form-col-6">
<div class="tutor-form-group">
<label>
<?php echo $this->Admin_model->translate("Password confirmation") ?>             </label>

<input type="password" name="password_confirmation" value="1" placeholder="Password Confirmation">
</div>
</div>
</div>


<div class="tutor-form-row">
<div class="tutor-form-col-12">
<div class="tutor-form-group">
</div>
</div>
</div>    


<div class="tutor-form-row">
<div class="tutor-form-col-12">
<div class="tutor-form-group tutor-reg-form-btn-wrap">
<button type="submit" name="tutor_register_student_btn" value="register" class="tutor-button btn btn-block "> <?php echo $this->Admin_model->translate("Register") ?></button>
</div>
</div>
</div>

</form>

</div> <!-- end entry-content -->


</article>


</div> <!-- end main-content -->
</div>
</div>
</div> 


</div> <!-- end main-content -->
</div> <!-- end main-content -->

<br><br>

<?php include'footer.php'?>
<div class='tutor-cart-box-login-form' style='display: none;'><span class='login-overlay-close'></span><div class='tutor-cart-box-login-form-inner'><button class='tutor-popup-form-close tutor-icon-line-cross'></button>
<div class="tutor-single-course-segment tutor-course-login-wrap">
<div class="course-login-title">
<h4><?php echo $this->Admin_model->translate("Login") ?></h4>
</div>

<div class="tutor-single-course-login-form">

<div class="tutor-login-form-wrap">


<form name="loginform" id="loginform" method="post">


<input type="hidden" id="_wpnonce" name="_wpnonce" value="c1ab78139e" /><input type="hidden" name="_wp_http_referer" value="/meric-saudi-arabia/contact/" />    
<input type="hidden" name="tutor_action" value="tutor_user_login" />
<p class="login-username">
<input type="text" placeholder="Username or Email Address" name="log" id="user_login" class="input" value="" size="20" />
</p>

<p class="login-password">
<input type="password" placeholder="Password" name="pwd" id="user_pass" class="input" value="" size="20"/>

</p>



<div class="tutor-login-rememeber-wrap">
<p class="login-remember">
<label>
<input name="rememberme" type="checkbox" id="rememberme" 
value="forever" 
    >
<?php echo $this->Admin_model->translate("Remember Me") ?>              </label>
</p>
<a href="<?php echo base_url();?>assets/userassets/profile/retrieve-password/index.html">
<?php echo $this->Admin_model->translate("Forgot Password?") ?>            </a>
</div>


<p class="login-submit">
<input type="submit" name="wp-submit" id="wp-submit" class="button button-primary" value="Log In" />
<input type="hidden" name="redirect_to" value="index.html" />
</p>

<p class="tutor-form-register-wrap">
<a href="<?php echo base_url();?>user/register/<?php echo $coursedet->course_id ?>">
<?php echo $this->Admin_model->translate(" Create a new account ") ?>           </a>
</p>
</form>

</div>
</div>
</div>
</div></div> 


<link rel='stylesheet' id='twae-centered-css-css'  href='<?php echo base_url();?>assets/userassets/css/twae-centered-timeline.min5697.css?ver=5.5.3' type='text/css' media='all' />

<script type='text/javascript' src='<?php echo base_url();?>assets/userassets/js/widget-scripts5bfb.js?ver=2.0.9.1' id='ekit-widget-scripts-js'></script>

<script type='text/javascript' src='<?php echo base_url();?>assets/userassets/js/frontend-modules.min2a45.js?ver=3.0.13' id='elementor-frontend-modules-js'></script>

<script type='text/javascript' src='<?php echo base_url();?>assets/userassets/lib/waypoints/waypoints.min05da.js?ver=4.0.2' id='elementor-waypoints-js'></script>

<script type='text/javascript' id='elementor-frontend-js-before'>
var elementorFrontendConfig = {"environmentMode":{"edit":false,"wpPreview":false},"i18n":{"shareOnFacebook":"Share on Facebook","shareOnTwitter":"Share on Twitter","pinIt":"Pin it","download":"Download","downloadImage":"Download image","fullscreen":"Fullscreen","zoom":"Zoom","share":"Share","playVideo":"Play Video","previous":"Previous","next":"Next","close":"Close"},"is_rtl":false,"breakpoints":{"xs":0,"sm":480,"md":768,"lg":1025,"xl":1440,"xxl":1600},"version":"3.0.13","is_static":false,"legacyMode":{"elementWrappers":true},"urls":{"assets":"https:\/\/yellostack.com\/meric-saudi-arabia\/wp-content\/plugins\/elementor\/assets\/"},"settings":{"page":[],"editorPreferences":[]},"kit":{"global_image_lightbox":"yes","lightbox_enable_counter":"yes","lightbox_enable_fullscreen":"yes","lightbox_enable_zoom":"yes","lightbox_enable_share":"yes","lightbox_title_src":"title","lightbox_description_src":"description"},"post":{"id":2437,"title":"About%20%E2%80%93%20My%20Blog","excerpt":"","featuredImage":false}};
</script>
<script type='text/javascript' src='<?php echo base_url();?>assets/userassets/js/frontend.min2a45.js?ver=3.0.13' id='elementor-frontend-js'></script>

<script type='text/javascript' src='<?php echo base_url();?>assets/userassets/js/jquery.sticky20b9.js?ver=1.0.2' id='elementskit-sticky-content-script-js'></script>
<script type='text/javascript' src='<?php echo base_url();?>assets/userassets/js/main20b9.js?ver=1.0.2' id='elementskit-sticky-content-script-core-js'></script>

<script type="text/javascript">

jQuery(".emails").blur(function(){
var email = jQuery(".emails").val();
jQuery.post("<?php echo base_url(); ?>user/emailexists",
{
email: email
},
function(data, status){
if(data == 'yes'){
jQuery("#email_note").show();
var str = 'Email address already exists !!';
var result = str.fontcolor("red");
jQuery("#email_note").html(result);
/// $(':input[type="submit"]').prop('disabled', true);
$('.save').prop('disabled', true);

} else if(data == 'no'){
jQuery("#email_note").hide();
jQuery("#email_note").html('');
//  $(':input[type="submit"]').prop('disabled', false);
jQuery('.save').prop('disabled', false);

}
});
});


/* Add data */ /*Form Submit*/

/*jQuery(document).ready(function(){

jQuery("#form-slider").submit(function(e){
var fd = new FormData(this);
var obj = jQuery(this), action = obj.attr('name');
fd.append("is_ajax", 1);

fd.append("form", action);
e.preventDefault();
jQuery('.save').prop('disabled', true);

jQuery.ajax({
url: e.target.action,
type: "POST",
data:  fd,
contentType: false,
cache: false,
processData:false,
success: function(JSON)
{
if (JSON.error != '') {
toastr.error(JSON.error);
jQuery('.save').prop('disabled', false);
} else {
toastr.success(JSON.result);
jQuery('.save').prop('disabled', false);
window.location.href="<?php echo base_url();?>user/Confirmregister";
}
},
error: function() 
{
toastr.error(JSON.error);

jQuery('.save').prop('disabled', false);
}           
});
});

});*/
</script>




<script type="text/javascript" src="<?php echo base_url();?>assets/toastr/toastr.min.js"></script> 
<script type="text/javascript">
jQuery(document).ready(function(){
toastr.options.closeButton = true;
toastr.options.progressBar = true;
toastr.options.timeOut = 3000;
toastr.options.preventDuplicates = true;
toastr.options.positionClass = "toast-top-center";
var site_url = '<?php echo site_url(); ?>';
});
</script>

</body>

</html>
