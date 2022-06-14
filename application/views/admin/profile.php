<?php $this->load->view('supplier/header');?>
<body>

<?php $this->load->view('supplier/supplier_header');?>
<?php $this->load->view('supplier/top_header');?>

<div id="wrapper">
<div class="main-content">

<input type="hidden" name="dir" id="dirId" value="<?php if($_SESSION["dir"]=='ltr'){
		echo 'false';
	} else{
		echo 'true';
	}  ?>">

<section class="profi_banner">
<div class="container-fluid">
<div class="col-md-2">

     <?php
          

          $this->db->where('supplier_id',$supplier_id);
          $logo = $this->db->get('company_logo_description')->result_array();
         
          foreach ($logo as $value){

               $images = $value['file_1'];
         
     ?>
     
<img   class="img-thumb" src="<?php echo base_url().'uploads/images/'.$images;?>"  id="image1" style="height:400px !important;width:1500px !important;">


<?php } ?>
 </div>
<div class="col-md-10">
	<?php
          

          $this->db->where('supplier_id',$supplier_id);
          $logo = $this->db->get('company_logo_description')->result_array();
         
          foreach ($logo as $value){

               $images = $value['file_2'];
         
     ?>
	
<img   class="img-thumb" src="<?php echo base_url().'uploads/images/'.$images;?>"  id="image2" style="height:400px !important;width:1500px !important;">

<?php } ?>
</div>

</div>
</section>

<section class="works">
<h3>Works</h3>
<div id="carousel" class="owl-carousel">
<?php
          

          $this->db->where('supplier_id',$supplier_id);
          $logo = $this->db->get('supplier_projects')->result_array();
          foreach ($logo as $value){

               $image = $value['images'];
       
     ?>
	
<div class="item">
<!-- <img src="<?php echo base_url();?>assets/supplier_assets/images/user.png" alt=""> -->
<img   class="img-thumb" src="<?php echo base_url().'uploads/images/'.$image;?>"  id="image1"> 
<h5><?php echo $value['project_name']?></h5>
<p><?php echo $value['description']?></p>
<p class="revie">3 reviews <span>3 Awards</span></p>
<a href="<?php echo base_url()?>supplier/workdet">Read More..</a>
</div>

<?php }?>
</div>
</section>

<section class="service">
<h3>Services</h3>
<?php
          

          $this->db->where('supplier_id',$supplier_id);
          $logo = $this->db->get('supplier_services')->result_array();
          foreach ($logo as $value){

               $image = $value['sampleimage'];

     ?>    

<div id="service_carousel" class="owl-carousel">
<div class="item">
<div class="container">
<div class="row">
<div class="col-md-1"></div>
<div class="col-md-3">
	
<img   class="img-thumb" src="<?php echo base_url().'uploads/images/'.$image;?>"  id="image1"> 
</div>


<div class="col-md-7">
<h3>Mobile application</h3>
<p><?php echo $value['description']?></p>
</div>
<div class="col-md-1"></div>
</div>
</div>
</div>
</div>
<?php } ?>
</section>

<section class="prof_det">
<div class="container-fluid">
<div class="row">
<div class="col-md-5">
<div class="dd_sec">
<div class="table-responsive">
<table>
<h6>Company Location Details</h6>
<?php
 	 	 
 	 	$this->db->where('supplier_id',$supplier_id);
 	 	$supplier_info = $this->db->get('supplier_information')->result_array();
 	 	foreach ($supplier_info as $value){

 	 	}
     ?>
<tbody>
<tr>
<td class="prof_info">Phone Number</td>
<td><?php echo $value['phone']?></td>
</tr>
<tr>
<td class="prof_info">Mail id</td>
<td><?php echo $value['email']?></td>
</tr>
<tr>
<td class="prof_info">Website Address</td>
<td><?php echo $value['company_site']?></td>
</tr>
</tbody> 
</table>
</div>




<h6>Location</h6>


<?php
 	 	
 	 	$this->db->where('supplier_id',$supplier_id);
 	 	$company_info = $this->db->get('company_location')->row();


?>

 	 	

<p><img src="<?php echo base_url();?>assets/supplier_assets/images/location.svg" alt="">&nbsp;&nbsp;Head quarters: <span><?php echo $company_info->headquarter ?></span></p>

<?php

$location= json_decode($company_info->branch);
 	 	foreach ($location as $value){?>


<p><img src="<?php echo base_url();?>assets/supplier_assets/images/location.svg" alt="">&nbsp;&nbsp;Branch :  <?php echo $value->branch ?> - <?php echo $value->city ?></p>

 	 		
 	 <?php	}


     ?>

</div>
</div>











<div class="col-md-7">
<div class="dd_sec">
<h6 class="smd">Social Media Details</h6>
<?php
 	 	 
 	 	$this->db->where('supplier_id',$supplier_id);
 	 	$socialmedia = $this->db->get('sociamedia_links')->result_array();
 	 	foreach ($socialmedia as $value){

 	 	}
     ?>
<p><img src="<?php echo base_url();?>assets/supplier_assets/images/fb.svg" alt="" width="18" height="18">&nbsp;&nbsp;Facebook</p>
<p class="smd_det"><a href="https://www.facebook.com/ABC company/"><?php echo $value['facebook']?></a></p>
<p><img src="<?php echo base_url();?>assets/supplier_assets/images/linkedin.svg" alt="" width="18" height="18">&nbsp;&nbsp;Linkedin</p>
<p class="smd_det"><a href="https://www.facebook.com/ABC company/"><?php echo $value['linkedin']?></a></p>
<p><img src="<?php echo base_url();?>assets/supplier_assets/images/instagram.svg" alt="" width="18" height="18">&nbsp;&nbsp;Instagram</p>
<p class="smd_det"><a href="https://www.facebook.com/ABC company/"><?php echo $value['instagram']?></a></p>
<p><img src="<?php echo base_url();?>assets/supplier_assets/images/twitter.svg" alt="" width="18" height="18">&nbsp;&nbsp;Twitter</p>
<p class="smd_det"><a href="https://www.facebook.com/ABC company/"><?php echo $value['twitter']?></a></p>
<p><img src="<?php echo base_url();?>assets/supplier_assets/images/youtube.svg" alt="" width="18" height="18">&nbsp;&nbsp;Youtube</p>
<p class="smd_det"><a href="https://www.facebook.com/ABC company/"><?php echo $value['youtube']?></a></p>
</div>
</div>
</div>
</div>
</section>



</div>

</div>
<!-- Placed at the end of the document so the pages load faster -->
<?php $this->load->view('supplier/footerjs');?>
<?php $this->load->view('supplier/footer');?>