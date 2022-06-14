<!DOCTYPE html>
<html lang="en" dir="<?php echo $this->session->userdata('dir')?>">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<title><?php echo $this->Admin_model->translate("Services") ?></title>
<link rel="icon" type="image/png" href="<?php echo base_url(); ?>assets/favicon.ico" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/userassets/css/custom.css">

<?php $session = $this->session->userdata('language');

if($session =='Arabic'){ ?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/userassets/css/rtl.css">
<?php } ?>


<link rel='stylesheet' id='elementor-frontend-css'  href='<?php echo base_url();?>assets/userassets/css/frontend.min2a45.css?ver=3.0.13' type='text/css' media='all' />

<link rel='stylesheet' id='elementor-icons-ekiticons-css'  href='<?php echo base_url();?>assets/userassets/css/ekiticonsad76.css?ver=5.9.0' type='text/css' media='all' />

<link rel='stylesheet' id='elementor-animations-css'  href='<?php echo base_url();?>assets/userassets/lib/animations/animations.min2a45.css?ver=3.0.13' type='text/css' media='all' />


<link rel='stylesheet' id='elementor-post-1648-css'  href='<?php echo base_url();?>assets/userassets/elementor/css/post-1648b3c0.css?ver=1604557909' type='text/css' media='all' />
<link rel='stylesheet' id='turitor-fonts-css'  href='https://fonts.googleapis.com/css?family=Roboto%3A300%2C300i%2C400%2C400i%2C500%2C500i%2C700%2C700i%2C900%2C900i%7CRubik%3A400%2C400i%2C500%2C500i%2C700%2C700i%2C900%2C900i&amp;ver=1.2.9' type='text/css' media='all' />

<link rel='stylesheet' id='bootstrap-css'  href='<?php echo base_url();?>assets/userassets/css/bootstrap.min077c.css?ver=1.2.9' type='text/css' media='all' />

<link rel='stylesheet' id='ekit-responsive-css'  href='<?php echo base_url();?>assets/userassets/css/responsive5bfb.css?ver=2.0.9.1' type='text/css' media='all' />

<link rel='stylesheet' id='turitor-style-css'  href='<?php echo base_url();?>assets/userassets/css/master077c.css?ver=1.2.9' type='text/css' media='all' />

<link rel='stylesheet' id='iconfont-css'  href='<?php echo base_url();?>assets/userassets/css/iconfont077c.css?ver=1.2.9' type='text/css' media='all' />

<link rel='stylesheet' id='ekit-widget-styles-css'  href='<?php echo base_url();?>assets/userassets/css/widget-styles5bfb.css?ver=2.0.9.1' type='text/css' media='all' />

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
<?php $this->load->view('user/header');
if(!empty($banners->banner_image)) { ?>
<section style="background-image:url(<?php echo base_url().'uploads/images/'.$banners->banner_image;?>);padding: 100px 0;
  background-size: cover;
  background-repeat: no-repeat;
  background-position: center;">

<div class="container">
<div class="row">
<div class="col-md-12">
<h1 class="text-center" style="color: #fff;
  font-size: 30px;"><?php echo $this->Admin_model->translate($banners->banner_description) ?></h1>
</div>
</div>
</div>
</section>
<?php } ?>

<!--<section class="service_ban_sec">
<div class="container">
<div class="row">
<div class="col-md-12">
<h1 class="text-center"><?php echo $this->Admin_model->translate('“As a Human potential development Organization,  MEIRC SA provides the following services“') ?></h1>
</div>
</div>
</div>
</section>-->

			
   <div id="post-1648" class="full-width-content post-1648 page type-page status-publish hentry" role="main">
    <div class="builder-content">
							<div data-elementor-type="wp-page" data-elementor-id="1648" class="elementor elementor-1648" data-elementor-settings="[]">
						<div class="elementor-inner">
							<div class="elementor-section-wrap">
							
				<section class="elementor-section elementor-top-section elementor-element elementor-element-74e345b elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="74e345b" data-element_type="section" data-settings="{&quot;ekit_has_onepagescroll_dot&quot;:&quot;yes&quot;}">
						<div class="elementor-container elementor-column-gap-default">
							<div class="elementor-row">
					<div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-bf25ae8" data-id="bf25ae8" data-element_type="column">
			<div class="elementor-column-wrap elementor-element-populated">
							<div class="elementor-widget-wrap">
						<div class="elementor-element elementor-element-947f317 elementor-widget elementor-widget-elementskit-heading" data-id="947f317" data-element_type="widget" data-settings="{&quot;ekit_we_effect_on&quot;:&quot;none&quot;}" data-widget_type="elementskit-heading.default">
				<div class="elementor-widget-container">
			<div class="ekit-wid-con" ><div class="elementskit-section-title-wraper text_center   ekit_heading_tablet-   ekit_heading_mobile-">
<br><br>
				<h1 class="elementskit-section-title ">
					<?php echo $this->Admin_model->translate("Our Services​") ?>
									</h1>
									<div class="row">
										<div class="col-md-1"></div>
<div class="col-md-10">
									<div class="ekit_heading_separetor_wraper ekit_heading_elementskit-border-divider"><div class="elementskit-border-divider"></div></div><p><strong class="text-center]"><?php echo $this->Admin_model->translate("MEIRC SA offers Training & Consultation services to all private and public sectors  through a team of Senior Consultants & Instructors with a very wide expertise each in his field.") ?></strong></p>
								</div>
							</div>
</div></div>		</div>
				</div>
						</div>
					</div>
		</div>
								</div>
					</div>
		</section>
		<br><br>
				<section class="elementor-section elementor-top-section elementor-element elementor-element-8c007f9 elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="8c007f9" data-element_type="section" data-settings="{&quot;ekit_has_onepagescroll_dot&quot;:&quot;yes&quot;}">
						<div class="elementor-container elementor-column-gap-default">
							<div class="elementor-row">
					<div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-2f38612" data-id="2f38612" data-element_type="column">
			<div class="elementor-column-wrap elementor-element-populated">
							<div class="elementor-widget-wrap">
						<div class="elementor-element elementor-element-fd9ceeb elementor-widget elementor-widget-spacer" data-id="fd9ceeb" data-element_type="widget" data-settings="{&quot;ekit_we_effect_on&quot;:&quot;none&quot;}" data-widget_type="spacer.default">
				<div class="elementor-widget-container">
					<div class="elementor-spacer">
			<div class="elementor-spacer-inner"></div>
		</div>
				</div>
				</div>
						</div>
					</div>
		</div>
								</div>
					</div>
		</section>
				<section class="elementor-section elementor-top-section elementor-element elementor-element-235b78b elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="235b78b" data-element_type="section" data-settings="{&quot;ekit_has_onepagescroll_dot&quot;:&quot;yes&quot;}">
<div class="elementor-container elementor-column-gap-default">
<div class="elementor-row">
<div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-2a3fd61" data-id="2a3fd61" data-element_type="column">
<div class="elementor-column-wrap elementor-element-populated">
<div class="elementor-widget-wrap">
<div class="elementor-element elementor-element-8b5c89b elementor-widget elementor-widget-elementskit-icon-box" data-id="8b5c89b" data-element_type="widget" data-settings="{&quot;ekit_we_effect_on&quot;:&quot;none&quot;}" data-widget_type="elementskit-icon-box.default">
<div class="elementor-widget-container">
<div class="row">
<div class="col-md-10">
<div class="ekit-wid-con" > 
<a href="#" target="_self" rel="" class="ekit_global_links">

<div class="elementskit-infobox text-center text-center icon-top-align elementor-animation-    ekit-hover-btn-horizontal-align-">
<div class="box-body">
<h3> <?php echo $this->Admin_model->translate("Training Services") ?></h3>
<p><?php echo $this->Admin_model->translate("Training is delivered through class rooms and online programs which is designed to fill business skills gaps and will be conducted either at client location or offsite. ") ?></p>
</div>


</div>
</a>
</div>		</div>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-5c5da0a" data-id="5c5da0a" data-element_type="column">
<div class="elementor-column-wrap elementor-element-populated">
<div class="elementor-widget-wrap">
<div class="elementor-element elementor-element-83b8d28 elementor-widget elementor-widget-elementskit-icon-box" data-id="83b8d28" data-element_type="widget" data-settings="{&quot;ekit_we_effect_on&quot;:&quot;none&quot;}" data-widget_type="elementskit-icon-box.default">
<div class="elementor-widget-container">
<div class="row">
<div class="col-md-10">
<div class="ekit-wid-con" >
<a href="#" target="_self" rel="" class="ekit_global_links">

<div class="elementskit-infobox text-center text-center icon-top-align elementor-animation-    ekit-hover-btn-horizontal-align-">

<div class="box-body">
<h3> <?php echo $this->Admin_model->translate("Consultation services") ?></h3>
<p><?php echo $this->Admin_model->translate("HR Consultation services in technical and management development are performed by a professional team of senior consultants.") ?></p>
</div>


</div>
</a>
</div>		</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</section>
<br><br>
			<!-- <section class="elementor-section elementor-top-section elementor-element elementor-element-da5fecc elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="da5fecc" data-element_type="section" data-settings="{&quot;ekit_has_onepagescroll_dot&quot;:&quot;yes&quot;}" >
						<div class="elementor-container elementor-column-gap-default">
							<div class="elementor-row">
					<div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-9db5bb7" data-id="9db5bb7" data-element_type="column">
			<div class="elementor-column-wrap elementor-element-populated">
							<div class="elementor-widget-wrap">
						
				<div class="container"
                    style="background:url(<?php echo base_url()?>assets/userassets/2020/11/24986-1024x683-1.jpg);height:200px;background-repeat:no-repeat;background-size:cover;background-attachment: fixed;">
			<h2 class="text-center elementor-heading-title elementor-size-default"><div><br></div><div><span class="text-center" style="color: rgb(255, 255, 255); font-family: Merriweather, sans-serif; font-size: 50px; font-weight: 300; text-align: center; text-transform: capitalize; white-space: normal;margin-left: 2rem">“<?php echo $this->Admin_model->translate("Liberty Is The Right To Know.") ?>”</span><br></div></h2>		</div>
				</div>
				<div class="elementor-element elementor-element-e5f1618 elementor-widget elementor-widget-spacer" data-id="e5f1618" data-element_type="widget" data-settings="{&quot;ekit_we_effect_on&quot;:&quot;none&quot;}" data-widget_type="spacer.default">
				<div class="elementor-widget-container">
					<div class="elementor-spacer">
			<div class="elementor-spacer-inner"></div>
		</div>
				</div>
				</div>
						</div>
					</div>
		</div>
								</div>
					
		</section> -->
				<br><br>	
<?php include'footer.php'?>		
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
</body>

</html>
