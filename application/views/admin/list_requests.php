 <?php $this->load->view('admin/header');?>
<body>
<?php $this->load->view('admin/top_header');?>
<?php $this->load->view('admin/side_header');?>


<div id="wrapper">
<div class="main-content">
<div class="row small-spacing">
<div class="col-xs-12">
     <div class="box-content card white">
<div class="box-title row">
    <div class='col-md-4'><h4><?php echo $this->Admin_model->translate("Request List") ?></h4></div>
    <div class='col-md-6'></div>
    <div class='col-md-2'> 
         
 
    </div>
</div>

 
<div class="box-content">
 <div class="table-responsive">
  <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
      <tr>
<th><?php echo $this->Admin_model->translate("No") ?></th>
<th><?php echo $this->Admin_model->translate("RFQ Id") ?></th>
<th><?php echo $this->Admin_model->translate("Start Date") ?></th>
<th><?php echo $this->Admin_model->translate("End Date") ?></th>
<th><?php echo $this->Admin_model->translate("Contact Details") ?></th>

<th><?php echo $this->Admin_model->translate("Category ") ?> & <?php echo $this->Admin_model->translate("RFQ Details") ?></th>
 
<th><?php echo $this->Admin_model->translate("RFQ Send to") ?></th>
 
<th><?php echo $this->Admin_model->translate("Remarks") ?></th>
<th><?php echo $this->Admin_model->translate("Action") ?></th> 
 
  
</tr>
      
</thead>
<tbody>
<?php 

$i=0 ; 

foreach ($qdet as $value) {
  $i++ ;
  ?>
 <tr> 
  <td><?php echo $i ?></td>
<td><?php echo  str_pad($value['id'],4,0,STR_PAD_LEFT) ;?> </td>
<td><?php  if(!empty($value['start_date'])){
  echo date("d-m-Y", strtotime($value['start_date'])); } ?></td>
<td><?php  if(!empty($value['end_date'])){
  echo date("d-m-Y", strtotime($value['end_date'])); } ?></td>

  <?php 
  $this->db->where('id',$value['buyer_id']);
  $buyerdet = $this->db->get('buyer')->row(); ?>


<td><?php echo 'Name' .' : ' .$buyerdet->buyer_name .'<br/>'.'Phone' .' : ' . $buyerdet->phone_no.'<br/>'.'Email' .' : ' . $buyerdet->email ?></td>
 
<td><?php echo  $this->Admin_model->get_type_name_by_id('category','id',$value['category'],'category_name')   ?><br/>
<?php $services = $value['service_det'] ;

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

 if(!empty($servicesdata)){
  foreach ($servicesdata as  $service) { ?>
    <?php echo $this->Admin_model->get_type_name_by_id('services','id',$service->servicename ,'service_name') .' - '. $service->itemscount .'<br/>' ;    }
 }

 if(!empty($productdata)){
  foreach ($productdata as  $service) { ?>
    <?php echo $this->Admin_model->get_type_name_by_id('products','id',$service->productname ,'product_name') .' - '. $service->itemscount .' - '. $service->units .'<br/>' ;    }
 }

  

   ?>
   </td>
 
<td><?php 

if($value['send_to_all']=='on'){

echo "All" ;

}elseif($value['send_to_my_suppliers']=='on'){
  echo "Custom Suppliers" ;
}
?></td>

 
<td><?php echo $value['remarks'] ?></td>
<td>


 
<?php 

if($value['send_to_all']=='on'){ ?>

 <a href="<?php echo base_url()?>admin/remarks/<?php echo $value['id']?>">&nbsp;&nbsp;<button type="button" class="btn btn-info btn-xs waves-effect waves-light"><?php echo $this->Admin_model->translate(" Add Remarks") ?></button></a>


<?php } ?> 
<a href="<?php echo base_url()?>admin/chat/<?php echo $value['id'].'_'.$value['buyer_id']  ?>" ><button class="btn btn-success btn-xs" title="send message"><i class="fa fa-envelope"></i></button></a>

<a onclick="deleterequest(<?php echo $value['id'] ?>);  return false ;" href="javascript:void(0)"  class="btn btn-danger btn-xs" title="delete message"><i class="fa fa-trash"></i></a> 


 

<a  href="<?php echo base_url()?>admin/viewrequest/<?php echo $value['id']?>"  class="btn btn-info btn-xs" title="View Request Details"><i class="fa fa-eye"></i></a> 


</td>
  

  
   
 </tr>

  <?php
} ?>
  

</tbody>
    
    </table>
</div>
<!-- /.box-content -->
</div>
<!-- /.col-lg-6 col-xs-12 -->
</div>
</div>





 <?php $this->load->view('admin/footer');?>


  <script type="text/javascript">
   function deleterequest($id){

// alert($(this).data('status'));
//alert($id);

var xin_table = $('#xin_table').dataTable();

$.ajax({ 
type: "POST",
url: "<?php echo base_url(); ?>"+'admin/delete_request/',
data: {id:$id},
}).done(function(JSON){

if (JSON.error != '') {
toastr.error(JSON.error);
} else {
toastr.success(JSON.result);
location.reload();
}
//xin_table.api().ajax.reload();

});

}
 </script>