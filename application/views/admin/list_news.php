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
    <div class='col-md-4'><h4><?php echo $this->Admin_model->translate("News & Article List") ?></h4></div>
    <div class='col-md-6'></div>
    <div class='col-md-2'> 
         <a href="<?php echo base_url(); ?>admin/newnews"><button class="btn btn-warning"> <?php echo $this->Admin_model->translate("Add New") ?></button></a> 
 
    </div>
</div>

 
<div class="box-content">
 <div class="table-responsive">
  <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
      <tr>
<th><?php echo $this->Admin_model->translate("No") ?></th>
<!-- <th>User Id</th> -->
<th><?php echo $this->Admin_model->translate("Created On") ?></th>
<th><?php echo $this->Admin_model->translate("News Title") ?></th>
 <th><?php echo $this->Admin_model->translate("Image") ?></th>
 <th><?php echo $this->Admin_model->translate("Description") ?></th>
  
<!-- <th><?php echo $this->Admin_model->translate("Status") ?></th> -->
<th><?php echo $this->Admin_model->translate("Action") ?></th>
</tr>
      
</thead>
<tbody>
<?php foreach ($bannerdet as $value) {
  ?>
 <tr>
<td><?php echo $value['id'] ?></td>
<!-- <th>User Id</th> -->
<td><?php if(!empty($value['created_on'])){
  echo date("d-m-Y", strtotime($value['created_on'])) ;
}  ?></td>
<td><?php echo $value['news_title'] ?></td>
 <td> 
   
    <img   class="img-thumb" src="<?php echo base_url().'uploads/images/'.$value['news_image'];?>" style="height:100px !important;width:100px !important;" id="image">


 </td>

 
 <td><?php echo $value['description'] ?></td>

 <!-- <td>
   <?php if($value['status']=='active'){ ?>

    <a onclick="statusupdate(<?php echo $value['id'] ?>,'inactive');  return false ;" href="javascript:void(0)"  class="btn btn-success btn-xs">Active</a> 
   

  <?php } else if($value['status']=='inactive'){ ?>

      <a onclick="statusupdate(<?php echo $value['id'] ?>,'active');  return false ;" href="javascript:void(0)"  class="btn btn-danger btn-xs">Inactive</a>

  <?php }  ?>


 </td> -->
  
<th> <a href="<?php echo base_url()?>admin/editnews/<?php echo $value['id']?>">&nbsp;&nbsp;<button type="button" class="btn btn-info btn-circle btn-xs waves-effect waves-light"><i class="ico fa fa-pencil"></i></button></a> </th>
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
url: "<?php echo base_url(); ?>"+'admin/news_status/',
data: {id:$id,status:$status},
}).done(function(response){

location.reload();
//xin_table.api().ajax.reload();

});

}
 </script>