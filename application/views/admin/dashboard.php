<?php $this->load->view('admin/header');?>
<body>
<?php $this->load->view('admin/top_header');?>
<?php $this->load->view('admin/side_header');?>

<div id="wrapper">
<div class="main-content">
 

<div class="row small-spacing">
​
​<div class="row">
<div class="col-sm-12 col-lg-4 col-xs-12"> 
<a href="">
<div class="box-content bg-success text-white" style="background-color:#5f917e!important;">
<div class="statistics-box with-icon">
<i class="ico small fa fa-user"></i>
<p class="text text-white"><?php echo $this->Admin_model->translate("Total Courses") ?> </p>
​
<div class="text-large" ><a style="color:white"  href=""><i class="ft-arrow-up"></i><?php echo $tcourses   ?>  </a></div>
​
</div>
</div>
​
</a>
</div>

<div class="col-sm-12 col-lg-4 col-xs-12"> 
<a href="">
<div class="box-content bg-success text-white" style="background-color:#5f917e!important;">
<div class="statistics-box with-icon">
<i class="ico small fa fa-certificate"></i>
<p class="text text-white"><?php echo $this->Admin_model->translate("Total Course types") ?> </p>
​
​
<div class="text-large" ><a style="color:white"  href=""><i class="ft-arrow-up"></i><?php echo $tcategory  ?> </a></div>
​
​
</div>
</div>
​
</a>
</div>


<div class="col-sm-12 col-lg-4 col-xs-12"> 
<a href="">
<div class="box-content bg-success text-white" style="background-color:#5f917e!important;">
<div class="statistics-box with-icon">
<i class="ico small fa fa-certificate"></i>
<p class="text text-white"><?php echo $this->Admin_model->translate("Total Training programs") ?> </p>
​
​
<div class="text-large" ><a style="color:white"  href=""><i class="ft-arrow-up"></i><?php echo $tschedule  ?> </a></div>
​
​
</div>
</div>
​
</a>
</div>


<div class="col-sm-12 col-lg-4 col-xs-12"> 
<a href="">
<div class="box-content bg-success text-white" style="background-color:#5f917e!important;">
<div class="statistics-box with-icon">
<i class="ico small fa fa-certificate"></i>
<p class="text text-white"><?php echo $this->Admin_model->translate("Total Revenue") ?> </p>
​
​
<div class="text-large" ><a style="color:white"  href=""><i class="ft-arrow-up"></i><?php echo $result  ?> </a></div>
​
​
</div>
</div>
​
</a>
</div>


<div class="col-sm-12 col-lg-4 col-xs-12"> 
<a href="">
<div class="box-content bg-success text-white" style="background-color:#5f917e!important;">
<div class="statistics-box with-icon">
<i class="ico small fa fa-user"></i>
<p class="text text-white"><?php echo $this->Admin_model->translate("Total Instructors") ?> </p>
​
<div class="text-large" ><a style="color:white"  href=""><i class="ft-arrow-up"></i><?php echo $tinstructor   ?>  </a></div>
​
</div>
</div>
​
</a>
</div>

<div class="col-sm-12 col-lg-4 col-xs-12"> 
<a href="">
<div class="box-content bg-success text-white" style="background-color:#5f917e!important;">
<div class="statistics-box with-icon">
<i class="ico small fa fa-certificate"></i>
<p class="text text-white"><?php echo $this->Admin_model->translate("Total  Registrations") ?> </p>
​
​
<div class="text-large" ><a style="color:white"  href=""><i class="ft-arrow-up"></i><?php echo ($tcompany + $tstudents)  ?> </a></div>
​
​
</div>
</div>
​
</a>
</div>

<div class="col-sm-12 col-lg-4 col-xs-12"> 
<a href="">
<div class="box-content bg-success text-white" style="background-color:#5f917e!important;">
<div class="statistics-box with-icon">
<i class="ico small fa fa-user"></i>
<p class="text text-white"><?php echo $this->Admin_model->translate("Total  Individual") ?> </p>
​
<div class="text-large" ><a style="color:white"  href=""><i class="ft-arrow-up"></i><?php echo $tstudents   ?>  </a></div>
​
</div>
</div>
​
</a>
</div>
​
​
<div class="col-sm-12 col-lg-4 col-xs-12"> 
<a href="">
<div class="box-content bg-success text-white" style="background-color:#5f917e!important;">
<div class="statistics-box with-icon">
<i class="ico small fa fa-certificate"></i>
<p class="text text-white"><?php echo $this->Admin_model->translate("Total  Company") ?> </p>
​
​
<div class="text-large" ><a style="color:white"  href=""><i class="ft-arrow-up"></i><?php echo  $tcompany ?> </a></div>
​
​
</div>
</div>
​
</a>
</div>





​
​</div>
 
​
​
​
​
​
​
​
</div>


</div>
</div>



<!-- ================================================== -->
<?php $this->load->view('admin/footer');?>