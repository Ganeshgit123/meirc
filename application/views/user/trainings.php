<!DOCTYPE html>
<html lang="en" dir="<?php echo $this->session->userdata('dir')?>">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<title><?php echo $this->Admin_model->translate("Exclusive Trainings") ?></title>
<link rel="icon" type="image/png" href="<?php echo base_url(); ?>assets/favicon.ico" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/userassets/css/custom.css">

<?php $session = $this->session->userdata('language');

if($session =='Arabic'){ ?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/userassets/css/rtl.css">
<?php } ?>

<link rel='stylesheet' id='elementor-frontend-css'  href='<?php echo base_url();?>assets/userassets/css/frontend.min2a45.css?ver=3.0.13' type='text/css' media='all' />

<link rel='stylesheet' id='elementor-icons-ekiticons-css'  href='<?php echo base_url();?>assets/userassets/css/ekiticonsad76.css?ver=5.9.0' type='text/css' media='all' />

<link rel='stylesheet' id='elementor-animations-css'  href='<?php echo base_url();?>assets/userassets/lib/animations/animations.min2a45.css?ver=3.0.13' type='text/css' media='all' />

<link rel='stylesheet' id='elementor-post-2437-css'  href='<?php echo base_url();?>assets/userassets/elementor/css/post-24371b29.css?ver=1604659562' type='text/css' media='all' />
<link rel='stylesheet' id='turitor-fonts-css'  href='https://fonts.googleapis.com/css?family=Roboto%3A300%2C300i%2C400%2C400i%2C500%2C500i%2C700%2C700i%2C900%2C900i%7CRubik%3A400%2C400i%2C500%2C500i%2C700%2C700i%2C900%2C900i&amp;ver=1.2.9' type='text/css' media='all' />
<link rel='stylesheet' id='bootstrap-css'  href='<?php echo base_url();?>assets/userassets/css/bootstrap.min077c.css?ver=1.2.9' type='text/css' media='all' />

<link rel='stylesheet' id='turitor-style-css'  href='<?php echo base_url();?>assets/userassets/css/master077c.css?ver=1.2.9' type='text/css' media='all' />

<link rel='stylesheet' id='iconfont-css'  href='<?php echo base_url();?>assets/userassets/css/iconfont077c.css?ver=1.2.9' type='text/css' media='all' />

<link rel='stylesheet' id='ekit-responsive-css'  href='<?php echo base_url();?>assets/userassets/css/responsive5bfb.css?ver=2.0.9.1' type='text/css' media='all' />

<link rel='stylesheet' id='ekit-widget-styles-css'  href='<?php echo base_url();?>assets/userassets/css/widget-styles5bfb.css?ver=2.0.9.1' type='text/css' media='all' />
<script type="text/javascript">

$(window).on('load', function () {
$('.preloader').fadeOut(1000);
});

</script>
<link rel='stylesheet' id='tutor-frontend-css'  href='<?php echo base_url();?>assets/userassets/css/tutor-front.minb34d.css?ver=1.7.4' type='text/css' media='all' />
<script src="https://kit.fontawesome.com/ef9a692198.js"></script>
</head>
<body class="archive post-type-archive post-type-archive-courses theme-turitor woocommerce-no-js sidebar-active elementor-default elementor-kit-12">

<div class='preloader w-100 h-100 position-fixed'>
<div class="loader">
<img class="icon" src="<?php echo base_url();?>assets/userassets/img/ajax-loader.gif" alt="">
</div>
</div>

<?php $this->load->view('user/header'); ?>
 
 
 <?php if(!empty($coursebanners->banner_image)) {
?>

<section  id="coursebanner" style="background-image:url(<?php echo base_url().'uploads/images/'.$coursebanners->banner_image;?>);padding: 100px 0;
  background-size: cover;
  background-repeat: no-repeat;
  background-position: center;">

<div class="container">
<div class="row">
<div class="col-md-12">
<h1 class="text-center" style="color: #fff;
  font-size: 30px;"><?php echo $this->Admin_model->translate($coursebanners->banner_description) ?></h1>
</div>
</div>
</div>
</section>
<?php } ?>
 

 
 <?php if(!empty($certifiedcoursebanners->banner_image)) {
?>

<section id="certifiedcoursebanner" style="background-image:url(<?php echo base_url().'uploads/images/'.$certifiedcoursebanners->banner_image;?>);padding: 100px 0;
  background-size: cover;
  background-repeat: no-repeat;
  background-position: center;">

<div class="container">
<div class="row">
<div class="col-md-12">
<h1 class="text-center" style="color: #fff;
  font-size: 30px;"><?php echo $this->Admin_model->translate($certifiedcoursebanners->banner_description) ?></h1>
</div>
</div>
</div>
</section>
<?php } ?>

 

<div class="banner-area banner-bg" style="background-image:url(assets/images/banner/banner_image.jpg);">
<div class="container">
<div class="row">
<div class="col-md-12 text-center">
<h2 class="banner-title ">
<?php echo $this->Admin_model->translate("Archives") ?>: <span><?php echo $this->Admin_model->translate("Trainings") ?></span> 
</h2>
<ol class="breadcrumb" data-wow-duration="2s"><li><a href="https://yellostack.com/meric-saudi-arabia"><?php echo $this->Admin_model->translate("Home") ?></a></li> /<li> <?php echo $this->Admin_model->translate("Trainings") ?></li></ol>                                    </div>
</div>
</div>
</div>  


<div class="tutor-wrap tutor-courses-wrap">


<div id="main-content" class="archive-course-container">
<div class="container-fluid">
<div class="tutor-course-filter-wrap row align-items-center">
<div class="col-md-3">
<div class="input-group mb-3">
<input type="text" id="searchtext" class="form-control" value= "<?php echo $searchtext ?>"  placeholder="Search ......" aria-label="Recipient's username">
<div class="input-group-append">
<span class="input-group-text course_search"><i class="fa fa-search"></i></span>
</div>
</div>
</div>
<div class="col-md-6"></div>
<div class="col-md-3">
<div class="archive-course-filter col-auto">
<div class="turitor-course-order">

 
</div>
</div>
</div>
</div>
<div class="row">

<div class="col-12 col-md-3 col-lg-3 order-2 order-sm-1 mb-4 md-lg-0">
<div class="course-sidebar">


 



<div id="category_filter">


<div class="archive-category-filter-area archive-widgets single-filter" id = "categoryselect" >
<h3 class="widget-title"><?php echo $this->Admin_model->translate("Company") ?></h3>



<div class="tutor-archive-single-cat">


<?php foreach($companies as $category) : ?>           
<div class="row">
<div class="col-2 col-md-2">
<input class="checkcategory"
type="radio"
id="id_<?php echo  $category['id'] ?>"
name="course_category[]"
value="<?php echo  $category['id'] ?>"   >
</div>
<div class="col-10 col-md-9">

<label for="cat-in-house-training">  
<span class="filter-checkbox"></span>
<?php echo  $category['company_name'] ?>                                                                               </label>

</div>
</div>
<?php endforeach ; ?>
</div>


</div>
</div>

 

</div><!-- Course sidebar End -->


</div>
<div class="col order-2 order-sm-2" >
<div  id="postList">

<div class="container">
<div class="row">
<div class="col-md-12 text-center">
	 
 
</div>
</div>
</div>



<div class="row">
<div class="col-2 col-md-2"></div>
<div class="col-10 col-md-9">
<?php echo $this->ajax_pagination->show_links(); ?>
</div> 
</div>


<div class="tutor-courses-wrap row">

<?php if(!empty($posts)): foreach ($posts as $value) { ?>

<div class="col-lg-3 col-md-6 course-single-wrap archive-course2">
<div class="single-course mb-30">
<div class="tutor-course-header">
<div class="course-thumbnail">

<a href="<?php echo base_url()?>user/details/<?php echo $value['id'] ?>">

  <i class="fas fa-book" ></i>


</a>
</div>
<div class="course-price-item">
<!-- 
<div class="tutor-course-loop-price">
<div class="price"> <span class="amount">Free</span><div  class="tutor-loop-cart-btn-wrap"><a href="https://yellostack.com/meric-saudi-arabia/courses/accident-incident-investigation-root-cause-analysis/">Get Enrolled</a></div></div></div> -->
<div class="tutor-course-loop-price">

<?php if($value['price']>0){ ?>
<div class="course-price"> <span class="amount"><?php echo $value['price']?> SAR</span></div> 

<?php 
} ?>


          </div>

</div>
<div class="course-category">
<!-- <a href='../course-category/classroom-training/index.html'><?php echo $value['type']?></a> -->                                                  
<h3 class="ts-course-el-title">
<a href="<?php echo base_url()?>user/details/<?php echo $value['id'] ?>">
<?php $session = $this->session->userdata('language');

if($session =='Arabic')
{  
	 echo $value['ar_training_name'] ;
} 
else
{
	 echo $value['training_name'] ;
}	
?>
</a>

 
</h3>
</div>
<div class="border-bar"></div>
<div class="course-footer">
<div class="xs-ratting-content">
 
</div>
</div><!-- ratting end --> 
<div class="price-btn">
<!-- <a href="<?php echo base_url()?>user/details/<?php echo $value['id'] ?>" style="background-color:<?php echo $value['icon_bg_color'] ?>" class="btn-link">
<i class="tsicon tsicon-right_arrow"></i>
</a> -->
</div>
</div>
</div>
</div>

<?php  }  ?>  

<?php else: ?>
<p><?php echo $this->Admin_model->translate("No results.") ?></p>
<?php endif; ?>


</div>

<div class="tutor-pagination-wrap">


<?php echo $this->ajax_pagination->create_links(); ?>

 
</div>



</div>
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

<script type='text/javascript' src='<?php echo base_url();?>assets/userassets/js/jquery.sticky20b9.js?ver=1.0.2' id='elementskit-sticky-content-script-js'></script>
<script type='text/javascript' src='<?php echo base_url();?>assets/userassets/js/main20b9.js?ver=1.0.2' id='elementskit-sticky-content-script-core-js'></script>

<script type="text/javascript">

jQuery( document ).ready(function() {

	//alert("hello");
searchFilter();

//alert("hello");
});
function searchFilter(page_num) {
page_num = page_num?page_num:0;
 
var categories = "";
var selectedtype = "";

var subcategories = "";

 
var myVar = "";
var type = "";


var subc = "";


 


var element = jQuery("#categoryselect").find("input:radio:checked");
myVar = element.val();
 
if (typeof myVar !== 'undefined'){
categories = myVar ;
}

var typeselect = jQuery("#typeselect").find("input:radio:checked");
type = typeselect.val();


 
//if (typeof myVar == 'undefined'){

 //alert("inside");
if (typeof type !== 'undefined'){
selectedtype = type ;

	jQuery.ajax({ 
        type: "POST",
          url : '<?php echo base_url() ?>'+"user/getcategory_withtype",
            
           data: {'type': type},
    }).done(function(response){    
    jQuery( "#category_filter" ).html(response);  
    jQuery( "#subcategory" ).html('');    
    jQuery('#id_'+categories).prop('checked','checked');      
    });

}
//}

 


var searchtext  =jQuery('#searchtext').val() ; 
 

jQuery.ajax({
type: 'POST',
url: '<?php echo base_url(); ?>user/traininglisted/'+page_num,
data:'page='+page_num+'&company='+categories+'&searchtext='+searchtext,
beforeSend: function () {
jQuery('.loading').show();
},
success: function (html) {
jQuery('#postList').html(html);
jQuery('.loading').fadeOut("slow");
}
});



if(type=='Certified Courses'){
jQuery('#coursebanner').hide();
jQuery('#certifiedcoursebanner').show();
}else{
jQuery('#certifiedcoursebanner').hide();
jQuery('#coursebanner').show();
}


 
}

 





jQuery(".checkcategory").on('click', function(e){

 
 

 //alert("category");

	searchFilter();

	var category = $(this).val() ;

	jQuery("#categoryid" ).html(category);   

	 


$("input[name=course_category[]][value="+category+"]").prop("checked",true);


});





jQuery(".typeselect").on('click', function(e){
 
searchFilter();

 var type = $(this).val() ;

	 //alert("hello");
document.getElementById("selectedsubcategory").value = "";
	jQuery.ajax({ 
        type: "POST",
          url : '<?php echo base_url() ?>'+"user/getcategory_withtype",
            
           data: {'type': type},
    }).done(function(response){    
    jQuery( "#category_filter" ).html(response);  
    jQuery( "#subcategory" ).html('');          
    });


 
   
});

jQuery('#sortby').on('change', function() {
 searchFilter();

});


jQuery('#searchtext').keyup(function() {
 
 searchFilter();

});

</script>

</body>


</html>
