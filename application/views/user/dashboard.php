<!DOCTYPE html>
<html lang="en" dir="<?php echo $this->session->userdata('dir')?>">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<title><?php echo $this->Admin_model->translate("Register") ?></title>

  <link rel="stylesheet" href="<?php echo base_url();?>assets/toastr/toastr.min.css">

<link rel="icon" type="image/png" href="<?php echo base_url(); ?>assets/favicon.ico" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/userassets/css/custom.css">

<?php $session = $this->session->userdata('language');

if($session =='Arabic'){ ?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/userassets/css/rtl.css">
<?php } ?>

<link rel='stylesheet' id='elementor-frontend-css'  href='<?php echo base_url();?>assets/userassets/css/frontend.min2a45.css?ver=3.0.13' type='text/css' media='all' />


<link rel='stylesheet' id='tutor-frontend-css'  href='<?php echo base_url();?>assets/userassets/css/tutor-front.minb34d.css?ver=1.7.4' type='text/css' media='all' />

<link rel='stylesheet' id='elementor-icons-ekiticons-css'  href='<?php echo base_url();?>assets/userassets/css/ekiticonsad76.css?ver=5.9.0' type='text/css' media='all' />


<link rel='stylesheet' id='elementor-post-864-css'  href='<?php echo base_url();?>assets/userassets/elementor/css/post-8641752.css?ver=1604747919' type='text/css' media='all' />
<link rel='stylesheet' id='turitor-fonts-css'  href='https://fonts.googleapis.com/css?family=Roboto%3A300%2C300i%2C400%2C400i%2C500%2C500i%2C700%2C700i%2C900%2C900i%7CRubik%3A400%2C400i%2C500%2C500i%2C700%2C700i%2C900%2C900i&amp;ver=1.2.9' type='text/css' media='all' />
<link rel='stylesheet' id='bootstrap-css'  href='<?php echo base_url();?>assets/userassets/css/bootstrap.min077c.css?ver=1.2.9' type='text/css' media='all' />

<link rel='stylesheet' id='iconfont-css'  href='<?php echo base_url();?>assets/userassets/css/iconfont077c.css?ver=1.2.9' type='text/css' media='all' />

<link rel='stylesheet' id='turitor-style-css'  href='<?php echo base_url();?>assets/userassets/css/master077c.css?ver=1.2.9' type='text/css' media='all' />

<link rel='stylesheet' id='ekit-widget-styles-css'  href='<?php echo base_url();?>assets/userassets/css/widget-styles5bfb.css?ver=2.0.9.1' type='text/css' media='all' />

<link rel='stylesheet' id='ekit-responsive-css'  href='<?php echo base_url();?>assets/userassets/css/responsive5bfb.css?ver=2.0.9.1' type='text/css' media='all' />

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

   
        <div class="woo-xs-content"  role="main">

           


    <div class="container">

         <?php if (!empty($error)): ?>
                <div class="alert alert-danger"><?php echo $error; ?></div>
            <?php endif; ?>
             <?php if (!empty($result)): ?>
                <div class="alert alert-success"><?php echo $result ; ?></div>
            <?php endif; ?>

         

              <section class="signin">
<div class="container">
<div class="row justify-content-center">
<!-- <div class="col-md-6">
<div class="image">
<img src="<?php echo base_url();?>assets/user_assets/img/signin/signin_background.jpg">
</div>
</div> -->

<div class="col-md-1"></div>
<div class="col-md-10">
<br/> 
<br/> 
<div class="text-center">
    <span class=" btn btn-default profile" id="view" ><a href="javascript:void(0)"><?php echo $this->Admin_model->translate("View Profile") ?></a></span> <span class="btn btn-default profile" id="edit" ><a href="javascript:void(0)"><?php echo $this->Admin_model->translate("Edit Profile") ?></a></span>   <span class="btn btn-default profile" id="changepassword" ><a href="javascript:void(0)"><?php echo $this->Admin_model->translate("Change Password") ?></a></span>    <span class="btn btn-default profile" id="courses" ><a href="javascript:void(0)"><?php echo $this->Admin_model->translate("Registered Courses") ?></a></span> 
 </div> 
 
<div id="profile"> 
 
<div class="col-md-12">

<?php


foreach($customerdet as $row)
{
?>

<div class="row"><br/><br/></div> 
 
<div class="text-center">
<h4><?php echo $this->Admin_model->translate("Profile Information") ?></h4>
</div>

<div class="details-wrap" style="margin-top:30px;">
<div class="details-box orders" id="profile_info">
<div class="row">
     
    <div class="col-md-12">
 

 
<table class="footable-details table table-striped table-hover toggle-circle">
      <tbody>
              
     <tr>
          <th><?php echo $this->Admin_model->translate("Name") ?></th>
          <td ><?php echo $row['first_name'] . '' . $row['last_name'];?></td>
      </tr>
 <tr>
          <th><?php echo $this->Admin_model->translate("Email") ?></th>
          <td ><?php echo $row['email'];?></td>
      </tr>
<tr>
       <th>Phone No</th>
          <td ><?php echo $row['phone_no'];?></td>
      </tr>
   <tr>
          <th><?php echo $this->Admin_model->translate("Register Date") ?></th>
          <td ><?php echo date("d-M-Y", strtotime($row['register_date']))  ;?></td>
      </tr>
  
 

</tbody>
</table>
    </div>
     
</div>

</div>
</div>
 
 
<?php
}
?> 
</div>
</div>
 
</div>
<div class="col-md-1"></div>
</div>
</div>
</section>

                        
                  
    </div>
</div> 
<br><br>

 
<?php $this->load->view('user/footer');?>
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
/// jQuery(':input[type="submit"]').prop('disabled', true);
jQuery('.save').prop('disabled', true);

} else if(data == 'no'){
jQuery("#email_note").hide();
jQuery("#email_note").html('');
//  jQuery(':input[type="submit"]').prop('disabled', false);
jQuery('.save').prop('disabled', false);

}
});
});


/* Add data */ /*Form Submit*/

jQuery(document).ready(function(){
//alert("hello");

/* Add data */ /*Form Submit*/
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
window.location.href="<?php echo base_url();?>user/courses";
}
},
error: function() 
{
toastr.error(JSON.error);

jQuery('.save').prop('disabled', false);
}           
});
});

});
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


<script type="text/javascript">
jQuery('#view').on('click',function(){

 jQuery.ajax({
type : "post",
url : "<?php echo base_url();?>user/profile_view",
cache : false,
success : function(html) {
jQuery('#profile').html(html);
}
});

});
jQuery('#edit').on('click',function(){

      jQuery.ajax({
type : "post",
url : "<?php echo base_url();?>user/edit_profile",
cache : false,
success : function(html) {
jQuery('#profile').html(html);
}
});

});

jQuery('#changepassword').on('click',function(){

      jQuery.ajax({
type : "post",
url : "<?php echo base_url();?>user/changepassword",
cache : false,
success : function(html) {
jQuery('#profile').html(html);
}
});

});

jQuery('#courses').on('click',function(){

      jQuery.ajax({
type : "post",
url : "<?php echo base_url();?>user/studentcourses",
cache : false,
success : function(html) {
jQuery('#profile').html(html);
}
});

});
 
</script>

<script type="text/javascript">
   function  viewhistory($schid) {

   
    var schid = $schid ;  

      jQuery.ajax({
type : "post",
url : "<?php echo base_url();?>user/viewhistory",
data : {schid:schid},
cache : false,
success : function(html) {
jQuery('#profile').html(html);
}
});
 }
 
</script>

</body>
</html>
