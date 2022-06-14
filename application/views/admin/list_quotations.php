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
    <div class='col-md-4'><h4><?php echo $this->Admin_model->translate("Quotations List") ?></h4></div>
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
<th><?php echo $this->Admin_model->translate("Quotation Date") ?></th>
<th><?php echo $this->Admin_model->translate("Title") ?></th>
<th><?php echo $this->Admin_model->translate("Request details") ?></th>

<th><?php echo $this->Admin_model->translate("Buyer details") ?> </th>
<th><?php echo $this->Admin_model->translate("Supplier Details") ?></th>
<th><?php echo $this->Admin_model->translate("Budget") ?></th>
<th><?php echo $this->Admin_model->translate("Delivery by") ?></th>
<th><?php echo $this->Admin_model->translate("Description") ?></th>
 
  
</tr>
      
</thead>
<tbody>
<?php foreach ($rqdet as $value) {
  ?>
 <tr> 
  <td><?php echo $value['id'] ?></td>

  <td><?php  if(!empty($value['q_date'])){
  echo date("d-m-Y", strtotime($value['q_date'])); } ?></td>

  <td><?php echo $value['title'] ?></td>

  <?php 
  $this->db->where('submit_status','submit');
  $this->db->where('id',$value['request_id']);
  $qdet = $this->db->get('quotation_det')->row(); ?> 

  <td><?php echo 'Title' .' : ' .$qdet->project_name  .'<br/> Budget : ' . $qdet->est_budget ?></td>
  

  <?php 
  $this->db->where('id',$value['buyer_id']);
  $buyerdet = $this->db->get('buyer')->row(); ?>


<td><?php echo 'Name' .' : ' .$buyerdet->buyer_name .'<br/>'.'Phone' .' : ' . $buyerdet->phone_no.'<br/>'.'Email' .' : ' . $buyerdet->email ?></td>
 
<?php 
  $this->db->where('id',$value['supplier_id']);
  $supplierdet = $this->db->get('supplier')->row(); ?>


<td><?php echo 'Name' .' : ' .$supplierdet->supplier_name .'<br/>'.'Phone' .' : ' . $supplierdet->phone_no.'<br/>'.'Email' .' : ' . $supplierdet->email ?></td>  

  <td><?php echo $value['budget'] ?></td>
  <td><?php echo $value['delivery_by'] ?></td>
  <td><?php echo $value['description'] ?></td>
  



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