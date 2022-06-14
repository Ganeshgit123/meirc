<!DOCTYPE html>
<html lang="en" dir="<?php echo $this->session->userdata('dir')?>">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />    
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<title><?php echo $this->Admin_model->translate("About") ?></title>
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

<link rel='stylesheet' id='elementor-post-2437-css'  href='<?php echo base_url();?>assets/userassets/elementor/css/post-24371b29.css?ver=1604659562' type='text/css' media='all' />
<link rel='stylesheet' id='turitor-fonts-css'  href='https://fonts.googleapis.com/css?family=Roboto%3A300%2C300i%2C400%2C400i%2C500%2C500i%2C700%2C700i%2C900%2C900i%7CRubik%3A400%2C400i%2C500%2C500i%2C700%2C700i%2C900%2C900i&amp;ver=1.2.9' type='text/css' media='all' />
<link rel='stylesheet' id='bootstrap-css'  href='<?php echo base_url();?>assets/userassets/css/bootstrap.min077c.css?ver=1.2.9' type='text/css' media='all' />

<link rel='stylesheet' id='turitor-style-css'  href='<?php echo base_url();?>assets/userassets/css/master077c.css?ver=1.2.9' type='text/css' media='all' />

<link rel='stylesheet' id='iconfont-css'  href='<?php echo base_url();?>assets/userassets/css/iconfont077c.css?ver=1.2.9' type='text/css' media='all' />

<link rel='stylesheet' id='ekit-responsive-css'  href='<?php echo base_url();?>assets/userassets/css/responsive5bfb.css?ver=2.0.9.1' type='text/css' media='all' />

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
<?php $this->load->view('user/header');?>

<div data-elementor-type="wp-page" data-elementor-id="2437" class="elementor elementor-2437" data-elementor-settings="[]">
<div class="elementor-inner">
<div class="elementor-section-wrap">
<section class="elementor-section elementor-top-section elementor-element elementor-element-3a408e58 elementor-section-boxed elementor-section-height-default elementor-section-height-default elementor-invisible" data-id="3a408e58" data-element_type="section" data-settings="{&quot;animation&quot;:&quot;fadeInUp&quot;,&quot;ekit_has_onepagescroll_dot&quot;:&quot;yes&quot;}">
<div class="elementor-container elementor-column-gap-default">
<div class="elementor-row">
<div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-55e49b75" data-id="55e49b75" data-element_type="column">
<div class="elementor-column-wrap elementor-element-populated">
<div class="elementor-widget-wrap">
<div class="elementor-element elementor-element-6da69aed elementor-invisible elementor-widget elementor-widget-elementskit-heading" data-id="6da69aed" data-element_type="widget" data-settings="{&quot;_animation&quot;:&quot;fadeInDown&quot;,&quot;ekit_we_effect_on&quot;:&quot;none&quot;}" data-widget_type="elementskit-heading.default">
<div class="elementor-widget-container">
<div class="ekit-wid-con" ><div class="elementskit-section-title-wraper ekit_heading_tablet-   ekit_heading_mobile-"><h1 class="elementskit-section-title ">
<?php echo $this->Admin_model->translate("Who we are?") ?>

</h1></div></div>       </div>
</div>
<div class="elementor-element elementor-element-69612f7f elementor-invisible elementor-widget elementor-widget-text-editor" data-id="69612f7f" data-element_type="widget" data-settings="{&quot;_animation&quot;:&quot;fadeInRight&quot;,&quot;ekit_we_effect_on&quot;:&quot;none&quot;}" data-widget_type="text-editor.default">
<div class="elementor-widget-container">
<div class="elementor-text-editor elementor-clearfix"><p class="about_cont"><?php echo $this->Admin_model->translate("Who we are description") ?></p>
  <a target="_blank" class="btn btn-success btn-sm" href=<?php echo site_url() ?>download?type=images&filename=MEIRC-Profile.pdf> <?php echo $this->Admin_model->translate('Download MEIRC SA Profile') ?> </a>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-23d86517" data-id="23d86517" data-element_type="column">
<div class="elementor-column-wrap elementor-element-populated">
<div class="elementor-widget-wrap">
<section class="elementor-section elementor-inner-section elementor-element elementor-element-56834500 elementor-section-boxed elementor-section-height-default elementor-section-height-default elementor-invisible" data-id="56834500" data-element_type="section" data-settings="{&quot;animation&quot;:&quot;fadeInRight&quot;,&quot;ekit_has_onepagescroll_dot&quot;:&quot;yes&quot;}">
<div class="elementor-container elementor-column-gap-default">
<div class="elementor-row">
<div class="elementor-column elementor-col-100 elementor-inner-column elementor-element elementor-element-710fe3c1" data-id="710fe3c1" data-element_type="column">
<div class="elementor-column-wrap elementor-element-populated">
<div class="elementor-widget-wrap">
<div class="elementor-element elementor-element-49ae41f1 elementor-widget elementor-widget-elementskit-icon-box" data-id="49ae41f1" data-element_type="widget" data-settings="{&quot;ekit_we_effect_on&quot;:&quot;none&quot;}" data-widget_type="elementskit-icon-box.default">
<div class="elementor-widget-container">
<div class="ekit-wid-con" >        <!-- link opening -->
<!-- end link opening -->

<div class="elementskit-infobox text-center text- icon-top-align elementor-animation-    ekit-hover-btn-horizontal-align-">
<div class="elementskit-box-header">
<div class="elementskit-info-box-icon ">
<img src="<?php echo base_url();?>assets/userassets/2020/11/about-icon-2-1.png" alt="62">
</div>
</div>
<div class="box-body">
<h3 class="elementskit-info-box-title"><?php echo $this->Admin_model->translate("60+") ?> </h3><p>
<?php echo $this->Admin_model->translate("Years of Experience,<br>Since 1958.") ?></p>
</div>


</div>
</div>      </div>
</div>
</div>
</div>
</div>
</div>
</div>
</section>
</div>
</div>
</div>
</div>
</div>
</section>
<section class="elementor-section elementor-top-section elementor-element elementor-element-307b78f3 elementor-section-boxed elementor-section-height-default elementor-section-height-default elementor-invisible" data-id="307b78f3" data-element_type="section" data-settings="{&quot;animation&quot;:&quot;fadeInUp&quot;,&quot;ekit_has_onepagescroll_dot&quot;:&quot;yes&quot;}">
<div class="elementor-container elementor-column-gap-default">
<div class="elementor-row">
<div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-3d223953" data-id="3d223953" data-element_type="column">
<div class="elementor-column-wrap elementor-element-populated">
<div class="elementor-widget-wrap">
<div class="elementor-element elementor-element-33eb859 elementor-widget elementor-widget-heading" data-id="33eb859" data-element_type="widget" data-settings="{&quot;ekit_we_effect_on&quot;:&quot;none&quot;}" data-widget_type="heading.default">
<div class="elementor-widget-container">
<h2 class="elementor-heading-title elementor-size-default"><?php echo $this->Admin_model->translate("Why Us?") ?></h2>     </div>
</div>
<div class="elementor-element elementor-element-1875bd85 elementor-widget elementor-widget-spacer" data-id="1875bd85" data-element_type="widget" data-settings="{&quot;ekit_we_effect_on&quot;:&quot;none&quot;}" data-widget_type="spacer.default">
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
<section class="elementor-section elementor-top-section elementor-element elementor-element-4f72f602 elementor-section-boxed elementor-section-height-default elementor-section-height-default elementor-invisible" data-id="4f72f602" data-element_type="section" data-settings="{&quot;animation&quot;:&quot;slideInRight&quot;,&quot;ekit_has_onepagescroll_dot&quot;:&quot;yes&quot;}">
<div class="elementor-container elementor-column-gap-default">
<div class="elementor-row">
<div class="elementor-column elementor-col-33 elementor-top-column elementor-element elementor-element-726f72fd" data-id="726f72fd" data-element_type="column">
<div class="elementor-column-wrap elementor-element-populated" style="padding: 10px ! important;">
<div class="elementor-widget-wrap">
<div class="elementor-element elementor-element-1ed4ade7 elementor-position-top elementor-vertical-align-top elementor-widget elementor-widget-image-box" data-id="1ed4ade7" data-element_type="widget" data-settings="{&quot;ekit_we_effect_on&quot;:&quot;none&quot;}" data-widget_type="image-box.default">
<div class="elementor-widget-container qual_box">
<div class="elementor-image-box-wrapper"><figure class="elementor-image-box-img"><img width="44" height="44" src="<?php echo base_url();?>assets/userassets/2020/11/Quality-training-1.png" class="attachment-full size-full" alt="" loading="lazy" /></figure><div class="elementor-image-box-content"><h4 class="elementor-image-box-title"><?php echo $this->Admin_model->translate("Quality <br> training ") ?> </h4><p class="elementor-image-box-description"><?php echo $this->Admin_model->translate("Helping you achieve <br> results within your budget") ?> 
<br><br><br><br></p></div></div> </div>
</div>
</div>
</div>
</div>
<div class="elementor-column elementor-col-33 elementor-top-column elementor-element elementor-element-234e57ab" data-id="234e57ab" data-element_type="column">
<div class="elementor-column-wrap elementor-element-populated" style="padding: 10px ! important;">
<div class="elementor-widget-wrap">
<div class="elementor-element elementor-element-fdd3bc elementor-position-top elementor-vertical-align-top elementor-widget elementor-widget-image-box" data-id="fdd3bc" data-element_type="widget" data-settings="{&quot;ekit_we_effect_on&quot;:&quot;none&quot;}" data-widget_type="image-box.default">
<div class="elementor-widget-container excel_box">
<div class="elementor-image-box-wrapper"><figure class="elementor-image-box-img"><img width="44" height="44" src="<?php echo base_url();?>assets/userassets/2020/11/Excellent-reputation-1-1.png" class="attachment-full size-full" alt="" loading="lazy" /></figure><div class="elementor-image-box-content"><h4 class="elementor-image-box-title"><?php echo $this->Admin_model->translate("Excellent <br> reputation") ?></h4><p class="elementor-image-box-description"><?php echo $this->Admin_model->translate("With genuine client <br> testimonials rating.") ?>
<br><br><br><br></p></div></div>        </div>
</div>
</div>
</div>
</div>
<div class="elementor-column elementor-col-33 elementor-top-column elementor-element elementor-element-4ff2523d" data-id="4ff2523d" data-element_type="column">
<div class="elementor-column-wrap elementor-element-populated" style="padding: 10px ! important;">
<div class="elementor-widget-wrap">
<div class="elementor-element elementor-element-31c2f67f elementor-position-top elementor-vertical-align-top elementor-widget elementor-widget-image-box" data-id="31c2f67f" data-element_type="widget" data-settings="{&quot;ekit_we_effect_on&quot;:&quot;none&quot;}" data-widget_type="image-box.default">
<div class="elementor-widget-container prove_box">
<div class="elementor-image-box-wrapper"><figure class="elementor-image-box-img"><img width="44" height="44" src="<?php echo base_url();?>assets/userassets/2020/11/Proven-expertise-1.png" class="attachment-full size-full" alt="" loading="lazy" /></figure><div class="elementor-image-box-content"><h4 class="elementor-image-box-title"><?php echo $this->Admin_model->translate("Proven<br>expertise") ?></h4><p class="elementor-image-box-description"><?php echo $this->Admin_model->translate("With more than 60+ years of experience Helping you achieve a perfect solution in the format, style and time you need") ?></p></div></div>     </div>
</div>
</div>
</div>
</div>
</div>
</div>
</section>
<section class="elementor-section elementor-top-section elementor-element elementor-element-fda3eaf elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="fda3eaf" data-element_type="section" data-settings="{&quot;ekit_has_onepagescroll_dot&quot;:&quot;yes&quot;}">
<div class="elementor-container elementor-column-gap-default">
<div class="elementor-row">
<div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-2874187c" data-id="2874187c" data-element_type="column">
<div class="elementor-column-wrap elementor-element-populated" style="padding: 10px ! important;">
<div class="elementor-widget-wrap">
<div class="elementor-element elementor-element-5ac1b810 elementor-widget elementor-widget-spacer" data-id="5ac1b810" data-element_type="widget" data-settings="{&quot;ekit_we_effect_on&quot;:&quot;none&quot;}" data-widget_type="spacer.default">
<div class="elementor-widget-container">
<div class="elementor-spacer">
<div class="elementor-spacer-inner"></div>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-630db669" data-id="630db669" data-element_type="column">
<div class="elementor-column-wrap elementor-element-populated" style="padding: 10px ! important;">
<div class="elementor-widget-wrap">
<div class="elementor-element elementor-element-10f70ba3 elementor-widget elementor-widget-spacer" data-id="10f70ba3" data-element_type="widget" data-settings="{&quot;ekit_we_effect_on&quot;:&quot;none&quot;}" data-widget_type="spacer.default">
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
<section class="elementor-section elementor-top-section elementor-element elementor-element-412fd3b7 elementor-section-boxed elementor-section-height-default elementor-section-height-default elementor-invisible" data-id="412fd3b7" data-element_type="section" data-settings="{&quot;animation&quot;:&quot;fadeInRight&quot;,&quot;ekit_has_onepagescroll_dot&quot;:&quot;yes&quot;}">
<div class="elementor-container elementor-column-gap-default">
<div class="elementor-row">
<div class="elementor-column elementor-col-25 elementor-top-column elementor-element elementor-element-5a80bb2" data-id="5a80bb2" data-element_type="column">
<div class="elementor-column-wrap elementor-element-populated" style="padding: 10px ! important;">
<div class="elementor-widget-wrap">
<div class="elementor-element elementor-element-56a12bc4 elementor-position-top elementor-vertical-align-top elementor-widget elementor-widget-image-box" data-id="56a12bc4" data-element_type="widget" data-settings="{&quot;ekit_we_effect_on&quot;:&quot;none&quot;}" data-widget_type="image-box.default">
<div class="elementor-widget-container train_box">
<div class="elementor-image-box-wrapper"><figure class="elementor-image-box-img"><img width="44" height="44" src="<?php echo base_url();?>assets/userassets/2020/11/Training-partnership-1.png" class="attachment-full size-full" alt="" loading="lazy" /></figure><div class="elementor-image-box-content"><h4 class="elementor-image-box-title"><?php echo $this->Admin_model->translate("Training <br> partnership") ?></h4><p class="elementor-image-box-description"><?php echo $this->Admin_model->translate("Always with the long term in mind, seeking to add value to our clients.") ?></span></p></div></div>        </div>
</div>
</div>
</div>
</div>
<div class="elementor-column elementor-col-25 elementor-top-column elementor-element elementor-element-111ce0eb" data-id="111ce0eb" data-element_type="column">
<div class="elementor-column-wrap elementor-element-populated" style="padding: 10px ! important;">
<div class="elementor-widget-wrap">
<div class="elementor-element elementor-element-6401bb79 elementor-position-top elementor-vertical-align-top elementor-widget elementor-widget-image-box" data-id="6401bb79" data-element_type="widget" data-settings="{&quot;ekit_we_effect_on&quot;:&quot;none&quot;}" data-widget_type="image-box.default">
<div class="elementor-widget-container consult_box">
<div class="elementor-image-box-wrapper"><figure class="elementor-image-box-img"><img width="44" height="44" src="<?php echo base_url();?>assets/userassets/2020/11/Consultative-approach-1.png" class="attachment-full size-full" alt="" loading="lazy" /></figure><div class="elementor-image-box-content"><h4 class="elementor-image-box-title"><?php echo $this->Admin_model->translate("Consultative <br> approach") ?> </h4><p class="elementor-image-box-description"><?php echo $this->Admin_model->translate("We take time to understand your business and real needs.") ?>
<br><br><br></p></div></div>        </div>
</div>
</div>
</div>
</div>
<div class="elementor-column elementor-col-25 elementor-top-column elementor-element elementor-element-6cfec1f2" data-id="6cfec1f2" data-element_type="column">
<div class="elementor-column-wrap elementor-element-populated" style="padding: 10px ! important;">
<div class="elementor-widget-wrap">
<div class="elementor-element elementor-element-29332cc8 elementor-position-top elementor-vertical-align-top elementor-widget elementor-widget-image-box" data-id="29332cc8" data-element_type="widget" data-settings="{&quot;ekit_we_effect_on&quot;:&quot;none&quot;}" data-widget_type="image-box.default">
<div class="elementor-widget-container innove_box">
<div class="elementor-image-box-wrapper"><figure class="elementor-image-box-img"><img width="44" height="44" src="<?php echo base_url();?>assets/userassets/2020/11/Innovation-and-creativity-1.png" class="attachment-full size-full" alt="" loading="lazy" /></figure><div class="elementor-image-box-content"><h4 class="elementor-image-box-title"><?php echo $this->Admin_model->translate("Innovation <br>& creativity") ?></h4><p class="elementor-image-box-description"><?php echo $this->Admin_model->translate("In our training materials <br> and methodologies ") ?><?php echo $this->Admin_model->translate("") ?>
<br><br><br></p></div></div>        </div>
</div>
</div>
</div>
</div>
<div class="elementor-column elementor-col-25 elementor-top-column elementor-element elementor-element-3bf96da2" data-id="3bf96da2" data-element_type="column">
<div class="elementor-column-wrap elementor-element-populated" style="padding: 10px ! important;">
<div class="elementor-widget-wrap">
<div class="elementor-element elementor-element-454095c6 elementor-position-top elementor-vertical-align-top elementor-widget elementor-widget-image-box" data-id="454095c6" data-element_type="widget" data-settings="{&quot;ekit_we_effect_on&quot;:&quot;none&quot;}" data-widget_type="image-box.default">
<div class="elementor-widget-container deliver_box">
<div class="elementor-image-box-wrapper"><figure class="elementor-image-box-img"><img width="44" height="44" src="<?php echo base_url();?>assets/userassets/2020/11/Deliver-training-in-1.png" class="attachment-full size-full" alt="" loading="lazy" /></figure><div class="elementor-image-box-content"><h4 class="elementor-image-box-title"><?php echo $this->Admin_model->translate("Deliver training") ?><br></h4><p class="elementor-image-box-description"><?php echo $this->Admin_model->translate("To help achieve the skills, confidence and behavioral change needed.​") ?>
<br><br><br></p></div></div>        </div>
</div>
</div>
</div>
</div>
</div>
</div>
</section>
<section class="elementor-section elementor-top-section elementor-element elementor-element-5c976230 elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="5c976230" data-element_type="section" data-settings="{&quot;ekit_has_onepagescroll_dot&quot;:&quot;yes&quot;}">
<div class="elementor-container elementor-column-gap-default">
<div class="elementor-row">
<div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-125bf7cc" data-id="125bf7cc" data-element_type="column">
<div class="elementor-column-wrap elementor-element-populated">
<div class="elementor-widget-wrap">
<div class="elementor-element elementor-element-17c211d4 elementor-widget elementor-widget-spacer" data-id="17c211d4" data-element_type="widget" data-settings="{&quot;ekit_we_effect_on&quot;:&quot;none&quot;}" data-widget_type="spacer.default">
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
<section class="elementor-section elementor-top-section elementor-element elementor-element-3b2d6afc elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="3b2d6afc" data-element_type="section" data-settings="{&quot;ekit_has_onepagescroll_dot&quot;:&quot;yes&quot;}">
<div class="elementor-container elementor-column-gap-default">
<div class="elementor-row">
<div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-7d0a6ae8" data-id="7d0a6ae8" data-element_type="column">
<div class="elementor-column-wrap elementor-element-populated">
<div class="elementor-widget-wrap">
<div class="elementor-element elementor-element-1424c7a elementor-invisible elementor-widget elementor-widget-heading" data-id="1424c7a" data-element_type="widget" data-settings="{&quot;_animation&quot;:&quot;fadeInUp&quot;,&quot;ekit_we_effect_on&quot;:&quot;none&quot;}" data-widget_type="heading.default">
<div class="elementor-widget-container">
<h1 class="elementor-heading-title elementor-size-large" style="padding-bottom:20px;"><?php echo $this->Admin_model->translate("Pillars of our Success") ?></h1>        </div>
</div>
<div class="elementor-element elementor-element-4f0f8d73 elementor-widget elementor-widget-spacer" data-id="4f0f8d73" data-element_type="widget" data-settings="{&quot;ekit_we_effect_on&quot;:&quot;none&quot;}" data-widget_type="spacer.default">
<div class="elementor-widget-container">
<div class="elementor-spacer">
<div class="elementor-spacer-inner"></div>
</div>
</div>
</div>
<div class="elementor-element elementor-element-79d289b2 animated-slow elementor-invisible elementor-widget elementor-widget-timeline-widget-addon" data-id="79d289b2" data-element_type="widget" data-settings="{&quot;_animation&quot;:&quot;fadeInRight&quot;,&quot;ekit_we_effect_on&quot;:&quot;none&quot;}" data-widget_type="timeline-widget-addon.default">
<div class="elementor-widget-container">

<div class="twae-vertical twae-wrapper twae-centered">    
<div class="twae-timeline-centered twae-timeline-sm twae-line "><article class="twae-timeline-entry twae-right-aligned">
<div class="twae-timeline-entry-inner">
<time class="twae-label-extra-label">
<span class="twae-label"></span>
<span class="twae-extra-label"></span>
</time>
<div class="twae-icon"><i aria-hidden="true" class="icon icon-star-1"></i></div>
<div class="twae-data-container">
<span class="twae-title"> <?php echo $this->Admin_model->translate("Commitment to Our Customers") ?></span>

<div class="twae-description"><?php echo $this->Admin_model->translate("Referral to our customers only comes when their experience exceeds their expectation in our training and consulting endeavor.") ?><b style="color:#118880"></b> </div>
</div>
</div>
</article><article class="twae-timeline-entry twae-left-aligned">
<div class="twae-timeline-entry-inner">
<time class="twae-label-extra-label">
<span class="twae-label"></span>
<span class="twae-extra-label"></span>
</time>
<div class="twae-icon"><i aria-hidden="true" class="icon icon-star-1"></i></div>
<div class="twae-data-container">
<span class="twae-title"><?php echo $this->Admin_model->translate("Relationship Continuity") ?></span>

<div class="twae-description"><p><?php echo $this->Admin_model->translate("We have worked over 50 years for our major clients, our relationship is based on long term best services provider through close attention to evolving needs of our clients.") ?></p></div>
</div>
</div>
</article><article class="twae-timeline-entry twae-right-aligned">
<div class="twae-timeline-entry-inner">
<time class="twae-label-extra-label">
<span class="twae-label"></span>
<span class="twae-extra-label"></span>
</time>
<div class="twae-icon"><i aria-hidden="true" class="icon icon-star-1"></i></div>
<div class="twae-data-container">
<span class="twae-title"> <?php echo $this->Admin_model->translate("Commitment to Quality") ?> </span>

<div class="twae-description"><b style="color:#118880"></b> <?php echo $this->Admin_model->translate("AT MEIRC SA we make every effort to find solution up to our client expectations and nasedon our long experience.") ?></div>
</div>
</div>
</article><article class="twae-timeline-entry twae-left-aligned">
<div class="twae-timeline-entry-inner">
<time class="twae-label-extra-label">
<span class="twae-label"></span>
<span class="twae-extra-label"></span>
</time>
<div class="twae-icon"><i aria-hidden="true" class="icon icon-star-1"></i></div>
<div class="twae-data-container">
<span class="twae-title"> <?php echo $this->Admin_model->translate("Open Communication") ?> </span>

<div class="twae-description"><p><?php echo $this->Admin_model->translate("The only form of communication that works is open honest and timely.") ?></p></div>
</div>
</div>
</article><article class="twae-timeline-entry twae-right-aligned">
<div class="twae-timeline-entry-inner">
<time class="twae-label-extra-label">
<span class="twae-label"></span>
<span class="twae-extra-label"></span>
</time>
<div class="twae-icon"><i aria-hidden="true" class="icon icon-star-1"></i></div>
<div class="twae-data-container">
<span class="twae-title"><?php echo $this->Admin_model->translate("The Drive to Succeed") ?></span>

<div class="twae-description"><?php echo $this->Admin_model->translate("All success is found as the result of commitment, hard work and a willingness to move outside of one's comfort zones. At MEIRC SA, we push ourselves and our teammates to be the best") ?>

</div>
</div>
</div>
</article></div></div></div>
</div>
</div>
</div>
</div>
</div>
</div>
</section>
</div>
</div>
</div>

<section class="train_sec">
<div class="container">
<div class="row">
<div class="col-md-12">
<h3 class="text-center"><?php echo $this->Admin_model->translate("Training operation") ?></h3>
<p class="text-center train_cont"><?php echo $this->Admin_model->translate("MEIRC SA adopted 'ADDIE' model for the training operation.") ?></p>
<p class="text-center"><img src="<?php echo base_url();?>assets/userassets/img/training_program.jpg"></p>
</div>
</div>
</div>
</section>

<section>
<div class="container">
<div class="row">
<div class="col-md-4">
<h3><?php echo $this->Admin_model->translate("Vision") ?></h3>
<p><?php echo $this->Admin_model->translate("To continue lead the HR training, devolving, and consulting services in KSA & GCC.") ?></p>
<h3><?php echo $this->Admin_model->translate("Values") ?></h3>
<p><?php echo $this->Admin_model->translate("Inspire, Engage, Create, Deliver") ?></p>
</div>
<div class="col-md-4">
<img src="<?php echo base_url();?>assets/userassets/img/vision.png" alt="">
</div>
<div class="col-md-4">
<h3><?php echo $this->Admin_model->translate("Mission") ?></h3>
<p><?php echo $this->Admin_model->translate("MEIRC SA mission is to advance the art of human potential development, Through providing high quality training to managers, executives and employees with a focus on filling critical jobrelated skill gaps. MEIRC SA has a group of practitioner instructors who are subjectmatter experts in our core offerings.") ?></p>
</div>
</div>
</div>
</section>
<br>
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
