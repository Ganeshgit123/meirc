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
    <div class='col-md-4'><h4><?php echo $this->Admin_model->translate("Category List") ?></h4></div>
    <div class='col-md-6'></div>
    <div class='col-md-2'> 
       <!--  <a href="<?php echo base_url(); ?>admin/newcategory"><button class="btn btn-warning"> <?php echo $this->Admin_model->translate("Add New") ?></button></a> -->
 
    </div>
</div>

 
<div class="box-content">
 <div class="table-responsive">
  <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
      <tr>
<th><?php echo $this->Admin_model->translate("No") ?></th>
<!-- <th>User Id</th> -->
<th><?php echo $this->Admin_model->translate("Category Name") ?></th>
 <th><?php echo $this->Admin_model->translate("Category Icon") ?></th>
 
<th><?php echo $this->Admin_model->translate("Action") ?></th>
</tr>
      
</thead>
<tbody>
<?php foreach ($categorydet as $value) {
  ?>
 <tr>
<td><?php echo $value['id'] ?></td>
<!-- <th>User Id</th> -->
<td><?php echo $value['category_name'] ?></td>
 
 <td>

 
 <a><button type="button" class="btn btn-circle btn-sm waves-effect waves-light" style="background-color:<?php echo $value['icon_bg_color'] ?> " >
 <?php if(!empty( $value['cat_icon'])){ ?>

<img   class="img-thumb" src="<?php echo base_url().'uploads/images/'. $value['cat_icon'];?>"  >


  <?php }else{ ?>

   <i class="fas fa-users" ></i>
  <?php }
  ?>
   </button></a>
 


           </td>
 
  
<th> <a href="<?php echo base_url()?>admin/editcategory/<?php echo $value['id']?>">&nbsp;&nbsp;<button type="button" class="btn btn-info btn-circle btn-xs waves-effect waves-light" ><i class="ico fa fa-pencil"></i></button></a> </th>
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