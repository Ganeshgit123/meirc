 
 <?php $this->load->view('admin/header');?>
<body>
<?php $this->load->view('admin/top_header');?>
<?php $this->load->view('admin/side_header');?>




<?php $session = $this->session->userdata('username'); ?>

<div id="wrapper">
<div class="main-content">

  <?php  foreach ($quotationdetails as  $value) { ?>

<section class="project_det">
<div class="container-fluid">
<div class="row prof_nam">
<div class="col-md-10">
<h2><?php echo  str_pad($value['id'],4,0,STR_PAD_LEFT) ;?> : <?php echo $value['project_name'] ?> </h2>
</div>

</div>
<hr style="height:2px;border-width:0;color:#0218a7;background-color:#0218a7;margin:10px 0">
<div class="row">
<div class="col-md-8">
<ul>

<?php 

$description = "<ul>" ;

$services = $value['service_det'] ;

$services = json_decode($services);

$productdata="";
$servicesdata ="" ;
foreach ($services as $key => $svalue) {
if($key=='productdet'){
$productdata = json_encode($svalue)  ;
}elseif($key=='servicedet'){
$servicesdata = json_encode($svalue)  ;
}

}

$servicesdata = json_decode($servicesdata);
$productdata = json_decode($productdata);


?>


<?php 


if(!empty($servicesdata)){
foreach ($servicesdata as  $service) { ?>
<?php echo '<li>Service name : '.$this->Admin_model->get_type_name_by_id('services','id',$service->servicename ,'service_name') .' </li><li>Quantity  : '. $service->itemscount .'</li> ' ;  

echo '<li>Attachment  : <br/>';


$description .= '<li>'.$service->description.' </li>' ; 


if(isset($service->attachment)) {


?>


<!-- <img class="img-thumb" src="<?php echo base_url() ?>uploads/images/<?php echo $service->attachment ?>" id="image1" style="width:100px !important; height:100px !important;"> -->

<!-- <a href=<?php echo site_url() ?>download?type=images&filename=<?php echo $service->attachment ?>><i class="fa fa-file"></i>  Click here to Download the attachment</a> -->

 <?php 


$allimages = explode( ',', $service->attachment) ;

foreach ($allimages as $imagevalue) {  if(!empty($imagevalue)){ ?>
  
  <a href=<?php echo site_url() ?>download?type=images&filename=<?php echo $imagevalue ?>><i class="fa fa-file"></i>  <?php echo $imagevalue ?> </a><br/>

<?php } }

?>




<?php 

}
echo ' </li> <hr style="height:2px;border-width:0;color:#0218a7;background-color:#0218a7;margin:10px 0">' ;

}
}

if(!empty($productdata)){
foreach ($productdata as  $service) { ?>
<?php echo '<li>Product name : '.$this->Admin_model->get_type_name_by_id('products','id',$service->productname ,'product_name') .' </li><li>Quantity  : '. $service->itemscount .'</li><li>Unit  : '. $service->units .'</li> ' ; 
echo '<li>Attachment  : <br/>';


$description .= '<li>'.$service->description.' </li>' ; 



if(isset($service->attachment)) {


?>


<!-- <img class="img-thumb" src="<?php echo base_url() ?>uploads/images/<?php echo $service->attachment ?>" id="image1" style="width:100px !important; height:100px !important;">



<a href=<?php echo site_url() ?>download?type=images&filename=<?php echo $service->attachment ?>><?php echo $this->Admin_model->translate("Download") ?></a> -->


 <?php 


$allimages = explode( ',', $service->attachment) ;

foreach ($allimages as $imagevalue) {  if(!empty($imagevalue)){ ?>
  
  <a href=<?php echo site_url() ?>download?type=images&filename=<?php echo $imagevalue ?>><i class="fa fa-file"></i>  <?php echo $imagevalue ?> </a><br/>

<?php } }

?>



<?php 

}
echo ' </li> <hr style="height:2px;border-width:0;color:#0218a7;background-color:#0218a7;margin:10px 0">' ;

}
}

$description .= '</ul>';
?>


</ul>
</div>
<div class="col-md-4 date_sec">
<h3><?php  if(!empty($value['end_date'])){
echo date("d-m-Y", strtotime($value['end_date'])); } ?></h3>

<?php

$date1=date_create(date("Y-m-d")); 
$date2=date_create($value['end_date']);
$diff=date_diff($date1,$date2);
//echo $diff->format("%R%a days");
?>



<p><?php echo $this->Admin_model->translate("End date")?> <span><?php 

if( $diff->format("%R")=='-'){

echo "(". $diff->format("%a") . " days ago)" ;


}else{ 
echo "(". $diff->format("%a") . " days left)"  ;

}  ?>

</span></p>

<h2>Budget : <?php echo  $value['est_budget'] ?></h2>

</div>
</div>
</div>
</section>

<style type="text/css">
  .bg-blur {

  /* Add the blur effect */
  filter: blur(8px);
  -webkit-filter: blur(8px);
 
}

.bg-text {
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0, 0.4); /* Black w/opacity/see-through */
  color: white;
  font-weight: bold;
  border: 3px solid #f1f1f1;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  z-index: 2;
  width: 80%;
  padding: 20px;
  text-align: center;
}

</style>

<section class="product_desc">
<div class="container-fluid">
<h6>Details</h6>
<div class="row">
<div class="col-md-2 desc_box">
<h3><?php 

$suppliers = $this->db->get_where('received_opportunity', array('request_id'=>$value['id']))->row()->supplier_id ; 

$suppliers = explode(',', $suppliers);

$count = count(array_unique($suppliers)); 

echo $count ;

?></h3>
<p><?php echo $this->Admin_model->translate("Suppliers got this Opportunities")?></p>
</div>
<div class="col-md-2 desc_box">
<h3><?php 

$this->db->where('request_id',$value['id']);
echo $this->db->count_all_results('received_quotations');

?></h3>
<p><?php echo $this->Admin_model->translate("Applied this Opportunities")?></p>
</div>
 

  
 

 

<div class="col-md-2 win_box">


 
<img src="<?php echo base_url();?>assets/supplier_assets/images/question.svg" alt="">

<h6><?php echo $this->Admin_model->translate("Winner")?></h6>


<!-- <img src="<?php echo base_url();?>assets/supplier_assets/images/won.svg" alt=""> -->


</div>

 




<div class="col-md-2 desc_box">
<h3><?php

    $this->db->distinct();
        $this->db->select('to_id');
        $this->db->from('messages');
        $this->db->where('s_to_b','0');
        $this->db->where('request_id',$value['id']);
        $connected = $this->db->count_all_results();

echo $connected ;
         ?></h3>
<p><?php echo $this->Admin_model->translate("Client Connected")?></p>
</div>
<div class="col-md-2 desc_box">
<h3><?php echo $connected ; ?> </h3>
<p><?php echo $this->Admin_model->translate("Client Compared")?></p>
</div>
</div>
</div>
</section>

<section class="comp_det ">
<div class="container-fluid">
<div class="row ">

      <div class="col-md-6">
<div class="dd_sec">
<h6><?php echo $this->Admin_model->translate("RFQ - Product/ Service Description")?></h6>

<?php echo  $description ?>
</div>
<br/>
<div class="dd_sec">
<h6><?php echo $this->Admin_model->translate("Remarks from Almutajer")?></h6>

<p><?php echo $value['remarks'] ; ?></p>
</div>
</div>


<div class="col-md-6">
<div class="dd_sec">
 <div class="table-responsive">
 <table>
<h6><?php echo $this->Admin_model->translate("Delivery details")?></h6>
<tbody>
<tr>
<td><?php echo $this->Admin_model->translate("Shipment place")?></td>
<td><i class="ico icon-minus-1"></i></td>
<td><?php echo  $value['shipment'] ?></td>
</tr>
<tr>
<td><?php echo $this->Admin_model->translate("City")?></td>
<td><i class="ico icon-minus-1"></i></td>
<td><?php echo  $value['city'] ?></td>
</tr>
<tr>
<td><?php echo $this->Admin_model->translate("Estimated Purchase Delivery")?></td>
<td><i class="ico icon-minus-1"></i></td>
<td><?php echo  $value['est_delivery'] ?></td>
</tr>
</tbody> 
</table>
</div>
</div>
</div>


</div>



</div>
 
</section>
 
<section class="comp_det">
<div class="container-fluid">
<div class="row">
<div class="col-md-6 ">

<div class="dd_sec  <?php if($allowed=='no'){echo "bg-blur" ;} ?>">
<div class="table-responsive">
<table>
<h6><?php echo $this->Admin_model->translate("Company details")?></h6>
<tbody>
<tr>
<td><?php echo $this->Admin_model->translate("Company Name")?></td>
<td><i class="ico icon-minus-1"></i></td>
<td><?php echo $buyerdet->company_name ?></td>
</tr>
<tr>
<td><?php echo $this->Admin_model->translate("buyer_name")?></td>
<td><i class="ico icon-minus-1"></i></td>
<td><?php echo $buyerdet->buyer_name ?></td>
</tr>
<tr>
<td><?php echo $this->Admin_model->translate("Company Mail ID")?></td>
<td><i class="ico icon-minus-1"></i></td>
<td><?php echo $buyerdet->email ?></td>
</tr>
<tr>
<td><?php echo $this->Admin_model->translate("Phone Number")?></td>
<td><i class="ico icon-minus-1"></i></td>
<td><?php echo $buyerdet->phone_no ?></td>
</tr>
<tr>
<td><?php echo $this->Admin_model->translate("website")?></td>
<td><i class="ico icon-minus-1"></i></td>
<td><?php echo $buyerdet->website_name ?></td>
</tr>
 
</tbody> 
</table>
</div>
</div>

<?php 


if($allowed=='no'){  ?>

<div class="bg-text">

    <p><button> 

      <span class="packagecheck" data-req_id="<?php echo $value['id'] ; ?>" data-url="<?php echo base_url()?>supplier/viewrequest/<?php echo $value['id']?>" ><?php echo $this->Admin_model->translate("View Company Details")?></span>

     </button></p>
</div>

<?php } 

  ?>
</div>

<div class="col-md-6">
<div class="dd_sec <?php if($allowed=='no'){echo "bg-blur" ;} ?>">
 <div class="table-responsive">
  
  <?php 

$buyerdet = $this->db->get_where('buyer',array('id'=>$value['buyer_id']))->row();

  ?>

<table>
<h6><?php echo $this->Admin_model->translate("Contact Details")?></h6>
<tbody>
<tr>
<td><?php echo $this->Admin_model->translate("Phone Number")?></td>
<td><i class="ico icon-minus-1"></i></td>
<td><?php echo $buyerdet->phone_no ?></td>
</tr>
<tr>
<td><?php echo $this->Admin_model->translate("Mail ID")?> </td>
<td><i class="ico icon-minus-1"></i></td>
<td><?php echo $buyerdet->email ?></td>
</tr>
</tbody> 
</table>

</div>
</div>

<?php if($allowed=='no'){  ?>

<div class="bg-text">
    <p><button> <span class="packagecheck" data-req_id="<?php echo $value['id'] ; ?>" data-url="<?php echo base_url()?>supplier/viewrequest/<?php echo $value['id']?>" > <?php echo $this->Admin_model->translate("View Contact Details")?> </span></button></p>
</div>

<?php } ?>
</div>

</div>
</div>
</section>

<?php  }  ?>

</div>

</div>
<!-- Placed at the end of the document so the pages load faster -->
<?php $this->load->view('admin/footer');?>
</body>
</html>
