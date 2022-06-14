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
    <div class='col-md-4'><h4><?php echo $this->Admin_model->translate("Instructor List") ?></h4></div>
    <div class='col-md-6'></div>
    <div class='col-md-2'> 
         <a href="<?php echo base_url(); ?>admin/newinstructor"><button class="btn btn-warning"> <?php echo $this->Admin_model->translate("Add New") ?></button></a> 
 
    </div>
</div>

 
<div class="box-content">
 <div class="table-responsive">
  <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
      <tr>
<th><?php echo $this->Admin_model->translate("No") ?></th>
<!-- <th>User Id</th> -->
<th><?php echo $this->Admin_model->translate("Name") ?></th>
<th><?php echo $this->Admin_model->translate("Email") ?>  </th>
<th><?php echo $this->Admin_model->translate("Phone") ?></th>
 <th><?php echo $this->Admin_model->translate("Action") ?></th>
<th><?php echo $this->Admin_model->translate("Status") ?></th>
</tr>
      
</thead>
<tbody>
<?php foreach ($userdet as $value) {
  ?>
 <tr>
<td><?php echo $value['id'] ?></td>
<!-- <th>User Id</th> -->
<td><?php echo $value['uname'] ?></td>
<td> <?php echo $value['uemail'] ?> </td>
<td><?php echo $value['uphone'] ?></td>
  
<th> <a href="<?php echo base_url()?>admin/editinstructor/<?php echo $value['id']?>">&nbsp;&nbsp;<button type="button" class="btn btn-info btn-circle btn-xs waves-effect waves-light"><i class="ico fa fa-pencil"></i></button></a>

<a href="<?php echo base_url()?>admin/changeinstructorpassword/<?php echo $value['id']?>" title="change password">&nbsp;&nbsp;<button type="button" class="btn btn-warning btn-circle btn-xs waves-effect waves-light"><i class="ico fa fa-key"></i></button></a>

 </th>
 <th>
   <?php   if($value['ustatus']=='a'){ ?>
  <a onclick="statusupdate(<?php echo $value['id'] ?>,'c');  return false ;" href="javascript:void(0)"  class="btn btn-success btn-xs">Active</a>

  <?php } else if($value['ustatus']=='c'){ ?>
    <a onclick="statusupdate(<?php echo $value['id'] ?>,'a');  return false ;" href="javascript:void(0)"  class="btn btn-danger btn-xs">Inactive</a>
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

var xin_table = jQuery('#xin_table').dataTable();

jQuery.ajax({ 
type: "POST",
url: "<?php echo base_url(); ?>"+'admin/ins_status_update/',
data: {id:$id,status:$status},
}).done(function(response){

location.reload();
//xin_table.api().ajax.reload();

});

}
 </script>