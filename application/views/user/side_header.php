<!-- Google Design Iconic -->
<link rel="stylesheet" href="<?php echo base_url();?>assets/fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">
<div class="main-menu">
<header class="header">
<a href="<?php echo base_url()?>admin/dashboard" class="logo"><img src="<?php echo base_url();?>assets/buyer_assets/images/logo.png" alt=""> </a>
<button type="button" class="button-close fa fa-times js__menu_close"></button>
</header>
<!-- /.header -->
<div class="content">

<div class="navigation">
<ul class="menu js__accordion">
<li class="current">
<a href="<?php echo base_url()?>admin/dashboard" class="waves-effect" href="<?php echo base_url()?>admin/dashboard"><i class="menu-icon mdi mdi-view-dashboard"></i>
<span> <?php echo $this->Admin_model->translate("Dashboard") ?>  </span></a></li>

<li><a class="waves-effect parent-item js__control" href="#"><i class="menu-icon zmdi zmdi-account zmdi-hc-fw"></i><span><?php echo $this->Admin_model->translate("Users") ?></span><span class="menu-arrow fa fa-angle-down"></span></a>
<ul class="sub-menu js__content">

<li><a href="<?php echo base_url()?>admin/users"> <?php echo $this->Admin_model->translate("Users List") ?>  </a></li>
<li><a href="<?php echo base_url()?>admin/changepassword"> <?php echo $this->Admin_model->translate("Change Password") ?> </a></li>

</ul>

</li>



<!-- <li><a class="waves-effect parent-item js__control" href="#"><i class="menu-icon fa fa-th-large"></i><span> <?php echo $this->Admin_model->translate("Category") ?> </span><span class="menu-arrow fa fa-angle-down"></span></a>
<ul class="sub-menu js__content">

<li><a href="<?php echo base_url()?>admin/category"><?php echo $this->Admin_model->translate("Category List") ?>  </a></li>
<li><a href="<?php echo base_url()?>admin/newcategory"><?php echo $this->Admin_model->translate("Add New") ?> </a></li>

</ul>

</li>
 

 <li><a class="waves-effect parent-item js__control" href="#"><i class="menu-icon fa fa-th-large"></i><span> <?php echo $this->Admin_model->translate("Sub Category") ?> </span><span class="menu-arrow fa fa-angle-down"></span></a>
<ul class="sub-menu js__content">

<li><a href="<?php echo base_url()?>admin/subcategory"><?php echo $this->Admin_model->translate("Category List") ?>  </a></li>
<li><a href="<?php echo base_url()?>admin/newsubcategory"><?php echo $this->Admin_model->translate("Add New") ?> </a></li>

</ul>

</li>
 


  <li><a class="waves-effect parent-item js__control" href="#"><i class="menu-icon fa fa-cog"></i><span><?php echo $this->Admin_model->translate("Services") ?> </span><span class="menu-arrow fa fa-angle-down"></span></a>
<ul class="sub-menu js__content">

<li><a href="<?php echo base_url()?>admin/services"> <?php echo $this->Admin_model->translate("Services List") ?> </a></li>
<li><a href="<?php echo base_url()?>admin/newservice"><?php echo $this->Admin_model->translate("Add New") ?>  </a></li>

</ul>

</li> -->  

<li><a class="waves-effect parent-item js__control" href="#"><i class="menu-icon ico icon-box"></i><span><?php echo $this->Admin_model->translate("Courses") ?></span><span class="menu-arrow fa fa-angle-down"></span></a>
<ul class="sub-menu js__content">

<li><a href="<?php echo base_url()?>admin/products"> <?php echo $this->Admin_model->translate("
Course List") ?> </a></li>

<!-- <li><a href="<?php echo base_url()?>admin/newproduct"> <?php echo $this->Admin_model->translate("Add New") ?></a></li> -->
 
<li><a href="<?php echo base_url()?>admin/description"> <?php echo $this->Admin_model->translate("Add Description") ?></a></li>
 

</ul>

</li>
 

 <li><a class="waves-effect parent-item js__control" href="#"><i class="menu-icon ico icon-box"></i><span><?php echo $this->Admin_model->translate("Schedule") ?></span><span class="menu-arrow fa fa-angle-down"></span></a>
<ul class="sub-menu js__content">

<li><a href="<?php echo base_url()?>admin/schedules"> <?php echo $this->Admin_model->translate("List Schedule") ?></a></li>

 

<li><a href="<?php echo base_url()?>admin/excelupload"> <?php echo $this->Admin_model->translate("Upload Course Schedule") ?></a></li>


</ul>

</li>
 



 <li><a class="waves-effect parent-item " href="<?php echo base_url()?>admin/students"><i class="menu-icon ico icon-box"></i><span><?php echo $this->Admin_model->translate("Student List") ?></span><span class="menu-arrow fa fa-angle-down"></span></a>
 

</li>

<li><a class="waves-effect parent-item " href="<?php echo base_url()?>admin/instructor"><i class="menu-icon zmdi zmdi-account zmdi-hc-fw"></i><span><?php echo $this->Admin_model->translate("Instructors") ?></span><span class="menu-arrow fa fa-angle-down"></span></a>


</li>

 <li><a class="waves-effect parent-item " href="<?php echo base_url()?>admin/assigninstructor"><i class="menu-icon ico icon-box"></i><span><?php echo $this->Admin_model->translate("Assign Instructor") ?></span><span class="menu-arrow fa fa-angle-down"></span></a>
 

</li>

</ul>
<!-- /.menu js__accordion -->
</div>

<!-- /.navigation -->
</div>


<!-- /.content -->
</div>