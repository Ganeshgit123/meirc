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
    <div class='col-md-4'><h4><?php echo $this->Admin_model->translate("Buyer List") ?></h4></div>
    <div class='col-md-6'></div>
    <div class='col-md-2'> 
         
 
    </div>
</div>

 
<div class="box-content">
 <div class="table-responsive">
  <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
      <tr>
<th><?php echo $this->Admin_model->translate("no") ?>No</th>
<!-- <th>User Id</th> -->
<th><?php echo $this->Admin_model->translate("register_date") ?></th>
<th><?php echo $this->Admin_model->translate("name") ?></th>
<th><?php echo $this->Admin_model->translate("company_name") ?></th>
<th><?php echo $this->Admin_model->translate("email") ?> </th>
<th><?php echo $this->Admin_model->translate("phone") ?></th>
<th><?php echo $this->Admin_model->translate("action") ?></th>



 
 
  
</tr>
      
</thead>
<tbody>
<?php foreach ($buyerdet as $value) {
  ?>
 <tr> 
<th><?php echo $value['id'] ?></th>
 
 
<th><?php echo date("d-m-Y", strtotime($value['register_date'])) ?></th>
<th><?php echo $value['buyer_name']  ?></th>
<th><?php echo $value['company_name']  ?></th>
<th> <?php echo $value['email'] ?> </th>
<th><?php echo $value['phone_no'] ?></th>
<th>
  <?php if($value['status']=='p'){ ?>

    <a onclick="statusupdate(<?php echo $value['id'] ?>,'a');  return false ;" href="javascript:void(0)"  class="btn btn-success btn-xs">Approve</a>

    <a onclick="statusupdate(<?php echo $value['id'] ?>,'r');  return false ;" href="javascript:void(0)"  class="btn btn-danger btn-xs">Reject</a> 

  <?php } else if($value['status']=='a'){ ?>
 <button class="btn   btn-info btn-xs" >Approved</button>
  <?php } else if($value['status']=='r'){ ?>
     <button class="btn btn-warning btn-xs" >Rejected</button>
    
  <?php } ?>

     </th>
 
   
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
   function statusupdate($id,$status){

// alert($(this).data('status'));
//alert($id);

var xin_table = $('#xin_table').dataTable();

$.ajax({ 
type: "POST",
url: "<?php echo base_url(); ?>"+'admin/buyer_status/',
data: {id:$id,status:$status},
}).done(function(response){

location.reload();
//xin_table.api().ajax.reload();

});

}
 </script>