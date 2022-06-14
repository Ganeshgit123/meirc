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
<div class="turitor-widget-logo text-right">
<a href="<?php echo base_url();?>user">
<img src="<?php echo base_url();?>assets/userassets/2020/11/Group-48-1.png" alt="">
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
<div class="elementor-element elementor-element-5a620fc6 elementor-widget elementor-widget-ekit-nav-menu" data-id="5a620fc6" data-element_type="widget" data-settings="{&quot;ekit_we_effect_on&quot;:&quot;none&quot;}" data-widget_type="ekit-nav-menu.default">
<div class="elementor-widget-container">
<div class="ekit-wid-con ekit_menu_responsive_tablet" data-hamburger-icon="" data-hamburger-icon-type="icon" data-responsive-breakpoint="1024"><div id="ekit-megamenu-main-menu" class="elementskit-menu-container elementskit-menu-offcanvas-elements elementskit-navbar-nav-default elementskit_line_arrow ekit-nav-menu-one-page-no"><ul id="main-menu" class="elementskit-navbar-nav elementskit-menu-po-center submenu-click-on-icon"><li id="menu-item-2442" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-item page_item page-item-5 current_page_item menu-item-2442 nav-item elementskit-mobile-builder-content active" data-vertical-menu=750px><a href="<?php echo base_url();?>user" class="ekit-menu-nav-link active">Home</a></li>
<li id="menu-item-2441" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2441 nav-item elementskit-mobile-builder-content" data-vertical-menu=750px><a href="<?php echo base_url()?>user/about" class="ekit-menu-nav-link">About Us</a></li>
<li id="menu-item-2446" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2446 nav-item elementskit-mobile-builder-content" data-vertical-menu=750px><a href="<?php echo base_url()?>user/services" class="ekit-menu-nav-link">Services</a></li>

<li id="menu-item-2445" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-2445 nav-item elementskit-dropdown-has relative_position elementskit-dropdown-menu-default_width elementskit-mobile-builder-content" data-vertical-menu=750px><a href="<?php echo base_url()?>user/courses" class="ekit-menu-nav-link ekit-menu-dropdown-toggle">Courses<i class="icon icon-down-arrow1 elementskit-submenu-indicator"></i></a>
<ul class="elementskit-dropdown elementskit-submenu-panel">

<?php

$this->db->order_by("category_name","desc");
$categories = $this->db->get('category')->result_array() ;
foreach ($categories  as  $value) { ?>

<?php 
$this->db->order_by("subcategory_name","asc");
$this->db->where('category_id',$value['id']) ;
$subcategories = $this->db->get('subcategory')->result_array() ; 
?>

<li id="menu-item-2426" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-2426 nav-item elementskit-dropdown-has relative_position elementskit-dropdown-menu-default_width elementskit-mobile-builder-content" data-vertical-menu=750px><a href="<?php echo base_url();?>user/courses?category=<?php echo $value['id'] ?>" class=" dropdown-item"><?php echo $value['category_name'] ?>


<?php if(!empty($subcategories)){ ?>

<i class="icon icon-down-arrow1 elementskit-submenu-indicator"></i></a>

<ul class="elementskit-dropdown elementskit-submenu-panel drop_dd">


<?php 
foreach ($subcategories as $svalue) { ?>

<li id="menu-item-2427" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2427 nav-item elementskit-mobile-builder-content" data-vertical-menu=750px><a href="<?php echo base_url();?>user/courses?category=<?php echo $value['id'] ?>&subcategory=<?php echo $svalue['id'] ?>" class=" dropdown-item"><?php echo $svalue['subcategory_name']?></a>

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
<li id="menu-item-2444" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2444 nav-item elementskit-mobile-builder-content" data-vertical-menu=750px><a href="<?php echo base_url();?>user/comingsoon" class="ekit-menu-nav-link">Blog</a></li>
<li id="menu-item-2443" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2443 nav-item elementskit-mobile-builder-content" data-vertical-menu=750px><a href="<?php echo base_url()?>user/contact" class="ekit-menu-nav-link">Contact</a></li>
<!-- <?php $session = $this->session->userdata('customername');  ?>

<?php $inssession = $this->session->userdata('instructorname');  ?>

<?php if(empty($session) && empty($inssession)){ ?>
<li id="menu-item-2444" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2444 nav-item elementskit-mobile-builder-content" data-vertical-menu=750px><a title = "Student Login" href="<?php echo base_url()?>user/login" class="ekit-menu-nav-link"><i class="fa fa-user"></i></a></li>

<li id="menu-item-2444" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2444 nav-item elementskit-mobile-builder-content" data-vertical-menu=750px><a title = "Instructor Login" href="<?php echo base_url()?>instructor/login" class="ekit-menu-nav-link"><i class="fa fa-users"></i></a></li>

<?php } else{   ?> 



<?php  if(!empty($session)){ ?>

<li id="menu-item-2444" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2444 nav-item elementskit-mobile-builder-content" data-vertical-menu=750px><a href="<?php echo base_url()?>user/dashboard" class="ekit-menu-nav-link"><i class="fa fa-user"></i><?php echo $session['customername'] ?></a></li>
<li class="menu-item-has-children"><a href="<?php echo base_url();?>user/logout">  &nbsp;&nbsp;<i class="fa fa-power-off"  title="Logout!"></i> </a></li>


<?php }else if(!empty($inssession)) { ?>


<li id="menu-item-2444" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2444 nav-item elementskit-mobile-builder-content" data-vertical-menu=750px><a href="<?php echo base_url()?>instructor/dashboard" class="ekit-menu-nav-link"><i class="fa fa-user"></i><?php echo $inssession['instructorname'] ?></a>
</li>
<li class="menu-item-has-children"><a href="<?php echo base_url();?>instructor/logout">  &nbsp;&nbsp;<i class="fa fa-power-off"  title="Logout!"></i> </a></li>

<?php } } ?> -->

<?php $session = $this->session->userdata('customername');  ?>

<?php $inssession = $this->session->userdata('instructorname');  ?>

<?php if(empty($session) && empty($inssession)){ ?>

<li id="menu-item-2445" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-2445 nav-item elementskit-dropdown-has relative_position elementskit-dropdown-menu-default_width elementskit-mobile-builder-content" data-vertical-menu=750px><a href="<?php echo base_url();?>user/login" class="ekit-menu-nav-link ekit-menu-dropdown-toggle log_btn">Login</a>
<ul class="elementskit-dropdown elementskit-submenu-panel">

<li id="menu-item-2426" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-2426 nav-item elementskit-dropdown-has relative_position elementskit-dropdown-menu-default_width elementskit-mobile-builder-content" data-vertical-menu=750px><a href="<?php echo base_url();?>user/login" class=" dropdown-item">Student Login
</a>
</li>
<li id="menu-item-2426" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-2426 nav-item elementskit-dropdown-has relative_position elementskit-dropdown-menu-default_width elementskit-mobile-builder-content" data-vertical-menu=750px><a href="<?php echo base_url();?>instructor/login" class=" dropdown-item">Instructor Login
</a>
</li>
<li id="menu-item-2426" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-2426 nav-item elementskit-dropdown-has relative_position elementskit-dropdown-menu-default_width elementskit-mobile-builder-content" data-vertical-menu=750px><a href="<?php echo base_url();?>admin/index" class=" dropdown-item">Admin Login
</a>
</li>
</ul>
</li> 

<li id="menu-item-2445" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-2445 nav-item elementskit-dropdown-has relative_position elementskit-dropdown-menu-default_width elementskit-mobile-builder-content" data-vertical-menu=750px><a href="<?php echo base_url();?>user/userregister" class="ekit-menu-nav-link ekit-menu-dropdown-toggle reg_btn">Sign up</a>
<ul class="elementskit-dropdown elementskit-submenu-panel">

<li id="menu-item-2426" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-2426 nav-item elementskit-dropdown-has relative_position elementskit-dropdown-menu-default_width elementskit-mobile-builder-content" data-vertical-menu=750px><a href="<?php echo base_url();?>user/userregister" class=" dropdown-item">Student
</a>
</li>
</ul>
</li>

<?php } else{   ?> 



<?php  if(!empty($session)){ ?>

	<li id="menu-item-2445" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-2445 nav-item elementskit-dropdown-has relative_position elementskit-dropdown-menu-default_width elementskit-mobile-builder-content" data-vertical-menu=750px><a href="<?php echo base_url()?>user/dashboard" class="ekit-menu-nav-link ekit-menu-dropdown-toggle reg_btn"><i class="fa fa-user"></i></i><?php echo $session['customername'] ?></a>
 
</li>



<li class="menu-item-has-children"><a href="<?php echo base_url();?>user/logout">  &nbsp;&nbsp;<i class="fa fa-power-off"  title="Logout!"></i> </a></li>


<?php }else if(!empty($inssession)) { ?>


<li id="menu-item-2445" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-2445 nav-item elementskit-dropdown-has relative_position elementskit-dropdown-menu-default_width elementskit-mobile-builder-content" data-vertical-menu=750px><a href="<?php echo base_url()?>instructor/dashboard" class="ekit-menu-nav-link ekit-menu-dropdown-toggle reg_btn"><i class="fa fa-user"></i></i><?php echo $inssession['instructorname'] ?></a>
 
</li>

 
<li class="menu-item-has-children"><a href="<?php echo base_url();?>instructor/logout">  &nbsp;&nbsp;<i class="fa fa-power-off"  title="Logout!"></i> </a></li>

<?php } } ?>





</div></div></div>


</div>

 
<div class="row">

<div class="input-group mb-3">
<input type="text" id="mainsearch" class="form-control" placeholder="Search ......" aria-label="Recipient's username">
<div class="input-group-append btnsearch">
<span class="input-group-text course_search  " ><i class="fa fa-search "></i></span>
</div>
</div>	
</div>


</div>
</div>
</div>
