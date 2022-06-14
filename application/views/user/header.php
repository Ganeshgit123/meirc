<div class="ekit-template-content-markup ekit-template-content-header ekit-template-content-theme-support">

<div data-elementor-type="wp-post" data-elementor-id="138" class="elementor elementor-138" data-elementor-settings="[]">
<div class="elementor-inner">
<div class="elementor-section-wrap">
<section class="elementor-section elementor-top-section elementor-element elementor-element-54cd2e31 nav-style-classic elementor-section-content-middle elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="54cd2e31" data-element_type="section" data-settings="{&quot;ekit_sticky&quot;:&quot;top&quot;,&quot;ekit_has_onepagescroll_dot&quot;:&quot;yes&quot;,&quot;ekit_sticky_on&quot;:[&quot;desktop&quot;,&quot;tablet&quot;,&quot;mobile&quot;],&quot;ekit_sticky_offset&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:0,&quot;sizes&quot;:[]},&quot;ekit_sticky_effect_offset&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:0,&quot;sizes&quot;:[]}}" style="height:100px;">
<div class="container-fluid elementor-column-gap-default">
<div class="elementor-row">
<div class="elementor-column elementor-col-16 elementor-top-column elementor-element elementor-element-665d9f37" data-id="665d9f37" data-element_type="column">
<div class="elementor-column-wrap elementor-element-populated" style="margin-top:1rem;">
<div class="elementor-widget-wrap">
<div class="elementor-element elementor-element-79a619fd elementor-widget elementor-widget-turitor-logo" data-id="79a619fd" data-element_type="widget" data-settings="{&quot;ekit_we_effect_on&quot;:&quot;none&quot;}" data-widget_type="turitor-logo.default">
<div class="elementor-widget-container">
<div class="turitor-widget-logo text-center">
<a href="<?php echo base_url();?>">
<img src="<?php echo base_url();?>assets/userassets/img/new_logo.png" alt="">
</a>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="elementor-column elementor-col-66 elementor-top-column elementor-element elementor-element-7d09d639" data-id="7d09d639" data-element_type="column">
<div class="elementor-column-wrap elementor-element-populated">
<div class="elementor-widget-wrap">
<div class="elementor-element elementor-element-5a620fc6 elementor-widget elementor-widget-ekit-nav-menu" data-id="5a620fc6" datas-element_type="widget" data-settings="{&quot;ekit_we_effect_on&quot;:&quot;none&quot;}" data-widget_type="ekit-nav-menu.default">
<div class="elementor-widget-container">
<div class="ekit-wid-con ekit_menu_responsive_tablet" data-hamburger-icon="" data-hamburger-icon-type="icon" data-responsive-breakpoint="1024"><div id="ekit-megamenu-main-menu" class="elementskit-menu-container elementskit-menu-offcanvas-elements elementskit-navbar-nav-default elementskit_line_arrow ekit-nav-menu-one-page-no">
<ul id="main-menu" class="elementskit-navbar-nav elementskit-menu-po-center submenu-click-on-icon">
<li id="menu-item-2442" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-item page_item page-item-5 current_page_item menu-item-2442 nav-item elementskit-mobile-builder-content active" data-vertical-menu=750px><a href="<?php echo base_url();?>" class="ekit-menu-nav-link"><?php echo $this->Admin_model->translate("Home") ?></a></li>
<li id="menu-item-2441" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2441 nav-item elementskit-mobile-builder-content" data-vertical-menu=750px><a href="<?php echo base_url()?>about" class="ekit-menu-nav-link"><?php echo $this->Admin_model->translate("About Us") ?></a></li>
<li id="menu-item-2446" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2446 nav-item elementskit-mobile-builder-content" data-vertical-menu=750px><a href="<?php echo base_url()?>services" class="ekit-menu-nav-link"><?php echo $this->Admin_model->translate("Services") ?></a></li>

<li id="menu-item-2445" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-2445 nav-item elementskit-dropdown-has relative_position elementskit-dropdown-menu-default_width elementskit-mobile-builder-content" data-vertical-menu=750px><a href="<?php echo base_url()?>courses" class="ekit-menu-nav-link ekit-menu-dropdown-toggle"><?php echo $this->Admin_model->translate("Courses") ?><i class="icon icon-down-arrow1 elementskit-submenu-indicator"></i></a>
<ul class="elementskit-dropdown elementskit-submenu-panel">

<?php

$this->db->order_by("c_order","asc");
$categories = $this->db->get('category')->result_array() ;
foreach ($categories  as  $value) { ?>

<?php 
$this->db->order_by("subcategory_name","asc");
$this->db->where('category_id',$value['id']) ;
$subcategories = $this->db->get('subcategory')->result_array() ; 
?>

<li id="menu-item-2426" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-2426 nav-item elementskit-dropdown-has relative_position elementskit-dropdown-menu-default_width elementskit-mobile-builder-content" data-vertical-menu=750px><a href="<?php echo base_url();?>user/courses?category=<?php echo $value['id'] ?>" class=" dropdown-item"><?php echo $this->Admin_model->translate($value['category_name']) ?>


<?php if(!empty($subcategories)){ ?>

<i class="icon icon-down-arrow1 elementskit-submenu-indicator"></i></a>

<ul class="elementskit-dropdown elementskit-submenu-panel drop_dd">


<?php 
foreach ($subcategories as $svalue) { ?>

<li id="menu-item-2427" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2427 nav-item elementskit-mobile-builder-content" data-vertical-menu=750px><a href="<?php echo base_url();?>user/courses?category=<?php echo $value['id'] ?>&subcategory=<?php echo $svalue['id'] ?>" class=" dropdown-item"><?php echo $this->Admin_model->translate($svalue['subcategory_name']) ?> </a>

</li>

<?php }
?>

</ul>




<?php }else{ ?>



</a>

<?php } ?>





</li>





<?php } ?>


</ul>
</li>
<li id="menu-item-2444" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2444 nav-item elementskit-mobile-builder-content" data-vertical-menu=750px><a href="<?php echo base_url();?>user/courses?type=certified" target="_self" class="ekit-menu-nav-link"><?php echo $this->Admin_model->translate("Certified Courses") ?></a></li>
<li id="menu-item-2444" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2444 nav-item elementskit-mobile-builder-content" data-vertical-menu=750px><a href="<?php echo base_url()?>blog" target="_self" class="ekit-menu-nav-link"><?php echo $this->Admin_model->translate("Blogs") ?></a></li>
<!-- <li id="menu-item-2444" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2444 nav-item elementskit-mobile-builder-content" data-vertical-menu=750px><a href="<?php echo base_url();?>comingsoon" class="ekit-menu-nav-link"><?php echo $this->Admin_model->translate("Blog") ?></a></li> -->

<li id="menu-item-2443" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2443 nav-item elementskit-mobile-builder-content" data-vertical-menu=750px><a href="<?php echo base_url()?>contact" class="ekit-menu-nav-link"><?php echo $this->Admin_model->translate("Contact") ?></a></li>
<!-- <?php $session = $this->session->userdata('customername');  ?>

<?php $inssession = $this->session->userdata('instructorname');  ?>

<?php if(empty($session) && empty($inssession)){ ?>
<li id="menu-item-2444" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2444 nav-item elementskit-mobile-builder-content" data-vertical-menu=750px><a title = "Student Login" href="<?php echo base_url()?>login" class="ekit-menu-nav-link"><i class="fa fa-user"></i></a></li>

<li id="menu-item-2444" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2444 nav-item elementskit-mobile-builder-content" data-vertical-menu=750px><a title = "Instructor Login" href="<?php echo base_url()?>instructor/login" class="ekit-menu-nav-link"><i class="fa fa-users"></i></a></li>

<?php } else{   ?> 



<?php  if(!empty($session)){ ?>

<li id="menu-item-2444" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2444 nav-item elementskit-mobile-builder-content" data-vertical-menu=750px><a href="<?php echo base_url()?>dashboard" class="ekit-menu-nav-link"><i class="fa fa-user"></i><?php echo $session['customername'] ?></a></li>
<li class="menu-item-has-children"><a href="<?php echo base_url();?>logout">  &nbsp;&nbsp;<i class="fa fa-power-off"  title="Logout!"></i> </a></li>


<?php }else if(!empty($inssession)) { ?>


<li id="menu-item-2444" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2444 nav-item elementskit-mobile-builder-content" data-vertical-menu=750px><a href="<?php echo base_url()?>instructor/dashboard" class="ekit-menu-nav-link"><i class="fa fa-user"></i><?php echo $inssession['instructorname'] ?></a>
</li>
<li class="menu-item-has-children"><a href="<?php echo base_url();?>instructor/logout">  &nbsp;&nbsp;<i class="fa fa-power-off"  title="Logout!"></i> </a></li>

<?php } } ?> -->

<?php $session = $this->session->userdata('customername');  ?>

<?php $inssession = $this->session->userdata('instructorname');  ?>

<?php if(empty($session) && empty($inssession)){ ?>

<li id="menu-item-2445" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-2445 nav-item elementskit-dropdown-has relative_position elementskit-dropdown-menu-default_width elementskit-mobile-builder-content" data-vertical-menu=750px><a href="<?php echo base_url();?>login" class="ekit-menu-nav-link ekit-menu-dropdown-toggle log_btn"><?php echo $this->Admin_model->translate("Login") ?></a>
<ul class="elementskit-dropdown elementskit-submenu-panel">

<li id="menu-item-2426" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-2426 nav-item elementskit-dropdown-has relative_position elementskit-dropdown-menu-default_width elementskit-mobile-builder-content" data-vertical-menu=750px><a href="<?php echo base_url();?>login" class=" dropdown-item"><?php echo $this->Admin_model->translate("Student Login") ?>
</a>
</li>
<li id="menu-item-2426" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-2426 nav-item elementskit-dropdown-has relative_position elementskit-dropdown-menu-default_width elementskit-mobile-builder-content" data-vertical-menu=750px><a href="<?php echo base_url();?>instructor/login" class=" dropdown-item"><?php echo $this->Admin_model->translate("Instructor Login") ?>
</a>
</li>
<li id="menu-item-2426" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-2426 nav-item elementskit-dropdown-has relative_position elementskit-dropdown-menu-default_width elementskit-mobile-builder-content" data-vertical-menu=750px><a href="<?php echo base_url();?>admin/index" class=" dropdown-item"><?php echo $this->Admin_model->translate("Self-Paced login") ?>
</a>
</li>
</ul>
</li> 

<li id="menu-item-2445" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-2445 nav-item elementskit-dropdown-has relative_position elementskit-dropdown-menu-default_width elementskit-mobile-builder-content" data-vertical-menu=750px><a href="<?php echo base_url();?>userregister" class="ekit-menu-nav-link ekit-menu-dropdown-toggle reg_btn"><?php echo $this->Admin_model->translate("Sign up") ?></a>
<ul class="elementskit-dropdown elementskit-submenu-panel">

<li id="menu-item-2426" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-2426 nav-item elementskit-dropdown-has relative_position elementskit-dropdown-menu-default_width elementskit-mobile-builder-content" data-vertical-menu=750px><a href="<?php echo base_url();?>userregister" class=" dropdown-item"><?php echo $this->Admin_model->translate("Student") ?>
</a>
</li>
</ul>
</li>

<?php } else{   ?> 



<?php  if(!empty($session)){ ?>

	<li id="menu-item-2445" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-2445 nav-item elementskit-dropdown-has relative_position elementskit-dropdown-menu-default_width elementskit-mobile-builder-content" data-vertical-menu=750px><a href="<?php echo base_url()?>dashboard" class="ekit-menu-nav-link ekit-menu-dropdown-toggle reg_btn"><i class="fa fa-user"></i></i><?php echo $session['customername'] ?></a>
 
</li>



<li class="menu-item-has-children"><a href="<?php echo base_url();?>logout">  &nbsp;&nbsp;<i class="fa fa-power-off"  title="Logout!"></i> </a></li>


<?php }else if(!empty($inssession)) { ?>


<li id="menu-item-2445" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-2445 nav-item elementskit-dropdown-has relative_position elementskit-dropdown-menu-default_width elementskit-mobile-builder-content" data-vertical-menu=750px><a href="<?php echo base_url()?>instructor/dashboard" class="ekit-menu-nav-link ekit-menu-dropdown-toggle reg_btn"><i class="fa fa-user"></i></i><?php echo $inssession['instructorname'] ?></a>
 
</li>

 
<li class="menu-item-has-children"><a href="<?php echo base_url();?>instructor/logout">  &nbsp;&nbsp;<i class="fa fa-power-off"  title="Logout!"></i> </a></li>

<?php } } ?>



<li class="menu-item-has-children">
<div class="row">
<div class="input-group mb-3">
<input type="text" id="mainsearch" class="form-control head_search" placeholder="<?php echo $this->Admin_model->translate("Search......") ?>" aria-label="Recipient's username">
<div class="input-group-append btnsearch">
<span class="input-group-text course_search  " ><i class="fa fa-search "></i></span>
</div>
</div>	
</div>
</li>

<?php $session = $this->session->userdata('language');


?>

<?php if(empty($session))
{?>

  <li class="menu-item-has-children">
  <button type="button" class="lang_swit slang" value="Arabic"/><img src="<?php echo base_url();?>/assets/userassets/images/saudi_flag.png" width="20" height="20">
العربية
</button>
</li>

<?php } ?>

<?php if($session=='English')
{?>

<li class="menu-item-has-children">
  <button type="button" class="lang_swit slang" value="<?php echo  $this->session->userdata('language') ?>"/><img src="<?php echo base_url();?>/assets/userassets/images/saudi_flag.png" width="20" height="20">
العربية
</button>
</li>
<?php }elseif($session=='Arabic') { ?>
<li class="menu-item-has-children">
  <button type="button" class="lang_swit slang" value="<?php echo  $this->session->userdata('language') ?>"/><img src="<?php echo base_url();?>/assets/userassets/images/english_flag.png" width="20" height="20">
English
</button>
</li>
<?php }  ?> 

<div class="elementskit-nav-identity-panel">
<div class="elementskit-site-title">
<a class="elementskit-nav-logo" href="https://yellostack.com/meric-saudi-arabia" target="_self" rel="">
<img src="2020/11/Group-48-1.png" alt="">
</a>
</div>
<button class="elementskit-menu-close elementskit-menu-toggler" type="button">X</button>
</div>
</div></div></div>
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
</div>
</div>
</div>
</div>
