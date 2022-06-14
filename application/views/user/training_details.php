<!DOCTYPE html>
<html lang="en" dir="<?php echo $this->session->userdata('dir')?>">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<title><?php echo  $trainingdet->training_name ; ?></title>
<link rel="icon" type="image/png" href="<?php echo base_url(); ?>assets/favicon.ico" />
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/userassets/css/custom.css">

<?php $session = $this->session->userdata('language');

if($session =='Arabic'){ ?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/userassets/css/rtl.css">
<?php } ?>


    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.css">
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

<style type="text/css">

.training_course {
  display: none;
}
.selectedhighlight a{
  background: #0047AB ! important;
}
.tutor-single-course-meta ul{
 	padding: 0 2px ! important;
}
.tutor-single-course-meta ul li{
	margin-right: 0 ! important;
	min-width: 0px ! important;
}
.tutor-single-course-meta ul li .fa{
	  padding: 10px 11px ! important;
  font-size: 14px ! important;
  text-align: center ! important;
  text-decoration: none ! important;
  margin: 5px 2px ! important;
  border-radius: 50% ! important;
}
.tutor-single-course-meta ul li .fa-facebook {
  background: #3B5998 ! important;
  color: white ! important;
}
.tutor-single-course-meta ul li .fa-facebook:hover {
  background: #062E38 ! important;
  color: white ! important;
}
.tutor-single-course-meta ul li .fa-instagram {
 background: linear-gradient(45deg, #f09433 0%,#e6683c 25%,#dc2743 50%,#cc2366 75%,#bc1888 100%) ! important;
  color: white ! important;
}
.tutor-single-course-meta ul li .fa-instagram:hover {
  background: #062E38 ! important;
  color: white ! important;
}
.tutor-single-course-meta ul li .fa-linkedin {
  background: #007bb5 ! important;
  color: white ! important;
}
.tutor-single-course-meta ul li .fa-linkedin:hover {
  background: #062E38 ! important;
  color: white ! important;
}
.tutor-single-course-meta ul li .fa-twitter {
  background: #1DA1F2 ! important;
  color: white ! important;
}
.tutor-single-course-meta ul li .fa-twitter:hover {
  background: #062E38 ! important;
  color: white ! important;
}
.tutor-single-course-meta ul li .fa-whatsapp {
  background: #25d366 ! important;
  color: white ! important;
}
.tutor-single-course-meta ul li .fa-whatsapp:hover {
  background: #062E38 ! important;
  color: white ! important;
}
.ekit-template-content-footer{
  position: relative;
  bottom: -28px;
}
.course_bak{
  padding: 10px;
  margin-bottom:20px;
  box-shadow: 0 3px 6px 0 rgba(0, 0, 0, 0.16);
}
</style>

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


<div class="banner-area banner-bg" style="background-image:url(assets/images/banner/banner_image.jpg);">
<div class="container">
<div class="row">
<div class="col-md-12 text-center">
<h2 class="banner-title ">
<?php echo $this->Admin_model->get_type_name_by_id('companies','id', $trainingdet->company_id  , 'company_name') .' Courses'; ?> 
</h2>
<ol class="breadcrumb" data-wow-duration="2s"><li><a href="https://yellostack.com/meric-saudi-arabia">Home</a></li> /<li>Trainings</li>  /<li><?php echo $trainingdet->training_name ?></li></ol>                                             </div>
</div>
</div>
</div>  


<div class="tutor-wrap tutor-full-width-course-top tutor-course-top-info tutor-page-wrap post-1977 courses type-courses status-publish has-post-thumbnail hentry course-category-classroom-training course-category-virtual-instructor course-tag-management">
<div class="tutor-container">
<div class="tutor-row">
<div class="tutor-col-8 tutor-col-md-100">

<div class="tutor-single-course-segment tutor-single-course-lead-info">

<h1 class="tutor-course-header-h1"><?php echo $trainingdet->training_name ; ?> </h1>

<div class="tutor-single-course-meta tutor-meta-top">
 <div class="row">
  
<div class="tutor-courses-wrap row">
    <?php foreach($courses as $cvalue){ ?>

<div class="col-lg-3 col-sm-6 course-single-wrap archive-course2">
<a href="javascript:void(0)" class="trlist" data-id="trlist_<?php echo $cvalue['id'] ; ?>" id="trlist_<?php echo $cvalue['id'] ; ?>">
<div class="single-course mb-30">
<div class="tutor-course-header">
 
 
<h3 class="ts-course-el-title">
 
<?php $session = $this->session->userdata('language');

if($session =='Arabic')
{  
	 echo $cvalue['ar_training_name'] ;
	} 
else
{
	echo $cvalue['training_name'] ;
}	
?>


 
</h3>
</div>
 
</div>
</a>
</div>

  <?php  } ?>
   
  </div>
 </div>

</div>


<?php foreach($courses as $cvalue){ ?>

<div class="tutor-single-course-meta tutor-lead-meta training_course" data-id="tr_<?php echo $cvalue['id'] ?>" id="training_<?php echo $cvalue['id'] ?>"  >
<h5 ><?php echo $cvalue['training_name'] ; ?> </h5>
<ul>
<li>
<span><?php echo $this->Admin_model->translate("Duration") ?></span>

<?php echo  $cvalue['duration'] . $cvalue['duration_in'] ; ?> 

</li>
<li>
<span><?php echo $this->Admin_model->translate("Calendar") ;

?></span>

<input type="text" name="date" class="form-control datepicker" id="date_<?php echo $cvalue['id'] ?>" placeholder ="dd-mm-YYYY" autocomplete="off">

 
             </li>
 
             <li>
<span><?php echo $this->Admin_model->translate("No. of Students") ;

?></span>

<input type="number" name="no_of_students" id="no_of_students_<?php echo $cvalue['id'] ?>" class="form-control " placeholder ="No. of Students" autocomplete="off">

 
             </li>
</ul>
 
<h5  class="tutor-segment-title"><?php echo $this->Admin_model->translate("Slots") ?></h5>
 

<div class="tutor-courses-wrap row" id="timeslot_<?php echo $cvalue['id'] ?>">
 
<?php 
$cmpny = $trainingdet->company_id ;

 
$starttime = $this->User_model->get_type_name_by_id('companies','id',$cmpny,'start_time');

 
$endtime = $this->User_model->get_type_name_by_id('companies','id',$cmpny,'end_time');
$slots = '' ;
if($trainingdet->duration_in == 'Hours'){
  $time = $trainingdet->duration * 60 ;
  $slots = $this->User_model->getServiceScheduleSlots($time,$starttime,$endtime);
}
if(!empty($slots)){
  foreach($slots as $svalue){  ?>
  <div class="col-lg-3 col-sm-6 course-single-wrap archive-course2">
    <?php echo '<span class="btn btn-success btn-xs">'.$svalue['start'].' - ' .$svalue['end'].'</span>' ; ?>
  </div>
   
<?php  }
}
?>
</div>
<br/><br/>
<button class="btn btn-info btn-xs">Select course</button>
</div>

<?php }?>

</div>	 

 
 
  





</div> <!-- .tutor-col-8 -->

<div class="tutor-col-4">
<div class="tutor-single-course-sidebar">

 
 
<div class="tutor-price-preview-box">
<div class="tutor-price-box-thumbnail">

 Course name : course 1 <br>
 Slot seletected :<br>
 Date seleted<br>
 No. of Students<br>
 <br><br>
 Course name : course 2<br>
 Slot seletected :<br>
 Date seleted<br>
 No. of Students<br>
 <br><br>
 Course name : course 3<br>
 Slot seletected :<br>
 Date seleted<br>
 No. of Students<br>

 <br>
 <br>

 <button class="btn btn-success" >Register</button>

</div>
 

<div class=" tutor-course-enroll-wrap" id="registerbtn">

</div>



</div>




<div class='tutor-cart-box-login-form' style='display: none;'><span class='login-overlay-close'></span><div class='tutor-cart-box-login-form-inner'><button class='tutor-popup-form-close tutor-icon-line-cross'></button>
<div class="tutor-single-course-segment tutor-course-login-wrap">
<div class="course-login-title">
<h4><?php echo $this->Admin_model->translate("Login") ?></h4>
</div>

<div class="tutor-single-course-login-form">

<div class="tutor-login-form-wrap">


<form name="loginform" id="loginform" method="post">


<input type="hidden" id="_wpnonce" name="_wpnonce" value="c1ab78139e" /><input type="hidden" name="_wp_http_referer" value="/meric-saudi-arabia/courses/advanced-leadership-skills/" />	
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
<?php echo $this->Admin_model->translate("Remember Me ") ?>			</label>
</p>
<a href="<?php echo base_url();?>assets/userassets/profile/retrieve-password/index.html">
<?php echo $this->Admin_model->translate("Forgot Password?") ?>		    </a>
</div>


<p class="login-submit">
<input type="submit" name="wp-submit" id="wp-submit" class="button button-primary" value="Log In" />
<input type="hidden" name="redirect_to" value="index.html" />
</p>

<p class="tutor-form-register-wrap">
<a href="<?php echo base_url();?>user/register/<?php echo $trainingdet->course_id ?>">
<?php echo $this->Admin_model->translate("Create a new account") ?>		    </a>
</p>
</form>

</div>
</div>
</div>
</div></div>
</div>


<div class="tutor-single-course-segment">
<!-- <div class="course-benefits-title">
<h4 class="tutor-segment-title">Tags</h4>
</div>
<div class="tutor-course-tags">
<a href='<?php echo base_url();?>assets/userassets/course-tag/management/index.html'> management </a>        </div> -->
</div>
</div>
</div>
</div>
</div>
</div>

<?php $this->load->view('user/footer');?>

<link rel='stylesheet' id='twae-centered-css-css'  href='<?php echo base_url();?>assets/userassets/css/twae-centered-timeline.min5697.css?ver=5.5.3' type='text/css' media='all' />

<script type='text/javascript' src='<?php echo base_url();?>assets/userassets/js/widget-scripts5bfb.js?ver=2.0.9.1' id='ekit-widget-scripts-js'></script>

<script type='text/javascript' src='<?php echo base_url();?>assets/userassets/js/frontend-modules.min2a45.js?ver=3.0.13' id='elementor-frontend-modules-js'></script>

<script type='text/javascript' src='<?php echo base_url();?>assets/userassets/lib/waypoints/waypoints.min05da.js?ver=4.0.2' id='elementor-waypoints-js'></script>

<script type='text/javascript' id='elementor-frontend-js-before'>
var elementorFrontendConfig = {"environmentMode":{"edit":false,"wpPreview":false},"i18n":{"shareOnFacebook":"Share on Facebook","shareOnTwitter":"Share on Twitter","pinIt":"Pin it","download":"Download","downloadImage":"Download image","fullscreen":"Fullscreen","zoom":"Zoom","share":"Share","playVideo":"Play Video","previous":"Previous","next":"Next","close":"Close"},"is_rtl":false,"breakpoints":{"xs":0,"sm":480,"md":768,"lg":1025,"xl":1440,"xxl":1600},"version":"3.0.13","is_static":false,"legacyMode":{"elementWrappers":true},"urls":{"assets":"https:\/\/yellostack.com\/meric-saudi-arabia\/wp-content\/plugins\/elementor\/assets\/"},"settings":{"page":[],"editorPreferences":[]},"kit":{"global_image_lightbox":"yes","lightbox_enable_counter":"yes","lightbox_enable_fullscreen":"yes","lightbox_enable_zoom":"yes","lightbox_enable_share":"yes","lightbox_title_src":"title","lightbox_description_src":"description"},"post":{"id":2437,"title":"About%20%E2%80%93%20My%20Blog","excerpt":"","featuredImage":false}};
</script>
<script type='text/javascript' src='<?php echo base_url();?>assets/userassets/js/frontend.min2a45.js?ver=3.0.13' id='elementor-frontend-js'></script>
<script type='text/javascript' src='<?php echo base_url();?>assets/userassets/js/bootstrap.min077c.js?ver=1.2.9' id='bootstrap-js'></script>
<script type='text/javascript' src='<?php echo base_url();?>assets/userassets/js/jquery.sticky20b9.js?ver=1.0.2' id='elementskit-sticky-content-script-js'></script>
<script type='text/javascript' src='<?php echo base_url();?>assets/userassets/js/main20b9.js?ver=1.0.2' id='elementskit-sticky-content-script-core-js'></script>
<script type="text/javascript">
window.wp = window.wp || {};
window.wp.editor = window.wp.editor || {};
window.wp.editor.getDefaultSettings = function() {
return {
tinymce: {},
quicktags: {
buttons: 'strong,em,link,ul,ol,li,code'
}
};
};

</script>
<div id="wp-link-backdrop" style="display: none"></div>
<div id="wp-link-wrap" class="wp-core-ui" style="display: none" role="dialog" aria-labelledby="link-modal-title">
<form id="wp-link" tabindex="-1">
<input type="hidden" id="_ajax_linking_nonce" name="_ajax_linking_nonce" value="bff2982925" />		<h1 id="link-modal-title"><?php echo $this->Admin_model->translate("Insert/edit link") ?></h1>
<button type="button" id="wp-link-close"><span class="screen-reader-text"><?php echo $this->Admin_model->translate("Close") ?></span></button>
<div id="link-selector">
<div id="link-options">
<p class="howto" id="wplink-enter-url"><?php echo $this->Admin_model->translate("Enter the destination URL") ?></p>
<div>
<label><span><?php echo $this->Admin_model->translate("URL") ?></span>
<input id="wp-link-url" type="text" aria-describedby="wplink-enter-url" /></label>
</div>
<div class="wp-link-text-field">
<label><span><?php echo $this->Admin_model->translate("Link Text") ?></span>
<input id="wp-link-text" type="text" /></label>
</div>
<div class="link-target">
<label><span></span>
<input type="checkbox" id="wp-link-target" /><?php echo $this->Admin_model->translate("Open link in a new tab") ?> </label>
</div>
</div>
<p class="howto" id="wplink-link-existing-content"><?php echo $this->Admin_model->translate("Or link to existing content") ?></p>
<div id="search-panel">
<div class="link-search-wrapper">
<label>
<span class="search-label"><?php echo $this->Admin_model->translate("Search") ?></span>
<input type="search" id="wp-link-search" class="link-search-field" autocomplete="off" aria-describedby="wplink-link-existing-content" />
<span class="spinner"></span>
</label>
</div>
<div id="search-results" class="query-results" tabindex="0">
<ul></ul>
<div class="river-waiting">
<span class="spinner"></span>
</div>
</div>
<div id="most-recent-results" class="query-results" tabindex="0">
<div class="query-notice" id="query-notice-message">
<em class="query-notice-default"><?php echo $this->Admin_model->translate("No search term specified. Showing recent items.") ?></em>
<em class="query-notice-hint screen-reader-text"><?php echo $this->Admin_model->translate("Search or use up and down arrow keys to select an item.") ?></em>
</div>
<ul></ul>
<div class="river-waiting">
<span class="spinner"></span>
</div>
</div>
</div>
</div>
<div class="submitbox">
<div id="wp-link-cancel">
<button type="button" class="button"><?php echo $this->Admin_model->translate("Cancel") ?></button>
</div>
<div id="wp-link-update">
<input type="submit" value="Add Link" class="button button-primary" id="wp-link-submit" name="wp-link-submit">
</div>
</div>
</form>
</div>

</body>

<script type="text/javascript">



jQuery('input:radio').click(function() {

var schid = jQuery("input[name='schedule']:checked").val() ;
jQuery.ajax({
url:'<?php echo base_url()?>user/setschsession',
method: 'post',
data: {schid: schid},
success: function(response){

jQuery('#registerbtn').html(response);

//alert(response);

// console.log(response);
//  document.getElementById("registerbtn").html(response);
}
});




//alert(jQuery("input[name='schedule']:checked").val());

});


</script>


<script type="text/javascript">
  /* Add data */ /*Form Submit*/

  jQuery(document).ready(function(){
   

  /* Add data */ /*Form Submit*/
  jQuery("#xin-form").submit(function(e){


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

        //alert(JSON);
        if (JSON.error != '') {
        // toastr.error(JSON.error);
        // $('.save').prop('disabled', false);

        alert(JSON.error);
        } else {
        // toastr.success(JSON.result);
        // $('.save').prop('disabled', false);

         alert(JSON.result);

          location.reload();
 

      //  $('#myModal').modal('hide');

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

<script type="text/javascript">

$(document).ready(function(){

  var weekdays =  "<?php echo $trainingdet->weekly_days ?>" ;
  var days = weekdays.split(',');

  var alldays = ['Sunday','Monday','Tuesday','Wednesday','Thursday'];

  var filtered =  $(alldays).not(days).get(); 
  var final = [] ;

  final = [5,6];

  var i;
for (i = 0; i < filtered.length; ++i) {

    if(filtered[i]=='Sunday'){
      final.push(0);

    }else if(filtered[i]=='Monday'){
      final.push(1);
    }else if(filtered[i]=='Tuesday'){
      final.push(2);
    }else if(filtered[i]=='Wednesday'){
      final.push(3);
    }else if(filtered[i]=='Thursday'){
      final.push(4);
    }
}

console.log(filtered);
    $('.datepicker').datepicker({
        daysOfWeekDisabled: final,
        format: 'dd-mm-yyyy'
    });
    
});


 

$(document).on( "click", ".trlist", function(e) {


 
$trid = $(this).data('id');
$training = $trid.split('_') ;


 


if($(this).hasClass('selectedhighlight')) { 
$(this).removeClass('selectedhighlight');
$('#training_'+$training[1]).hide();

return false;
} else{
  $(this).addClass("selectedhighlight");
  $('#training_'+$training[1]).show();
  return false;
}

 


document.getElementById($category).value = $categoryid;
document.getElementById($item).value = $itemid;

return false ;
});
</script>
</html>
