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
    <div class='col-md-4'><h4><?php echo $this->Admin_model->translate("Enquiry List") ?></h4></div>
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
<!-- <th>User Id</th> -->
<th><?php echo $this->Admin_model->translate("Date") ?></th>
<th><?php echo $this->Admin_model->translate("Name") ?> </th>
<th><?php echo $this->Admin_model->translate("Email") ?></th>
 <th><?php echo $this->Admin_model->translate("Attachment") ?></th>
 
</tr>
      
</thead>
<tbody>
<?php  $i= 0 ; 

foreach ($enquiries as $value) {
$i++ ;
  ?>
 <tr>
<td><?php echo $i ; ?></td>
<!-- <th>User Id</th> -->
<td><?php echo date("d-m-Y", strtotime($value['created_date'])) ?></td>
<td> <?php echo $value['name'] ?> </td>
<td><?php echo $value['email'] ?></td>
 

 


 <td><a href=" <?php echo site_url() ?>download?type=images&filename=<?php echo $value['attachment'] ?>">  <?php echo $value['attachment'] ; ?> </a></td>
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

 