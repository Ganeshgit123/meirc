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
    <div class='col-md-4'><h4><?php echo $this->Admin_model->translate("Proposal List") ?></h4></div>
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
<th><?php echo $this->Admin_model->translate("Proposed Date") ?></th>
<th><?php echo $this->Admin_model->translate("Course Title") ?> </th>
<th><?php echo $this->Admin_model->translate("Company Name") ?> </th>
<th><?php echo $this->Admin_model->translate("Contact Details") ?></th>
 <th><?php echo $this->Admin_model->translate("Other Requirements") ?></th>
<th><?php echo $this->Admin_model->translate("Created Date") ?></th>
</tr>
      
</thead>
<tbody>
<?php  $i= 0 ; 

foreach ($proposals as $value) {
$i++ ;
  ?>
 <tr>
<td><?php echo $i ; ?></td>
<!-- <th>User Id</th> -->
<td><?php echo date("d-m-Y", strtotime($value['req_date'])) ?></td>
<td> <?php echo $value['course_title'] ?> </td>
<td><?php echo $value['company_name'] ?></td>
 <td><?php echo 'Contact Person : '.$value['contact_person'] .'<br/>' ?>
   <?php echo 'Phone : '.$value['mobile'] .'<br/>' ?>
   <?php echo 'Email : '.$value['email']  ?>
 </td>
 <td> <?php echo  $value['other_requirements']  ?> </td>
 <td><?php echo date("d-m-Y", strtotime($value['created_on'])) ?></td>
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

 