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
    <div class='col-md-4'><h4><?php echo $this->Admin_model->translate("Schedule List") ?></h4></div>
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
<th><?php echo $this->Admin_model->translate("Course Name") ?></th>
<th><?php echo $this->Admin_model->translate("Category Name") ?></th>
<th><?php echo $this->Admin_model->translate("Type") ?></th>
<th><?php echo $this->Admin_model->translate("Duration") ?></th>
<th><?php echo $this->Admin_model->translate("Location") ?></th>
<th><?php echo $this->Admin_model->translate("Date & Time") ?></th>
<th><?php echo $this->Admin_model->translate("No.of Registration") ?></th>
<th><?php echo $this->Admin_model->translate("Status") ?></th>
</tr>
      
</thead>
<tbody>
<?php

$i = 0 ;
 foreach ($scheduledet as $value) {

  $i++ ;
  ?>
 <tr>
<!--   <td><input type="checkbox" name="schedule[]" id="sch_<?php echo $i ?>" value="<?php echo  $value['id']  ; ?>"></td> -->
<td><?php echo $i ?></td>
  
 <td><?php echo $this->Admin_model->get_type_name_by_id('courses','id', $value['course_id'] , 'product_name') ; ?>/ <?php echo $this->Admin_model->get_type_name_by_id('courses','id', $value['course_id'] , 'program_title_arabic') ; ?></td>

<!-- <th>User Id</th> -->
  <td><?php echo $this->Admin_model->get_type_name_by_id('category','id', $value['category_id'] , 'category_name') ; ?></td>

   <td><?php echo  $value['type']  ; ?></td>
    <td><?php echo  $value['duration']  ; ?></td>
     <td><?php echo  $value['location']  ; ?></td>
      <td><?php echo  date("d-M-y", strtotime($value['start_date'])) .' & '.$value['time'] ; ?></td>
      
 
  <th style="text-align:center;">
    
<?php $this->db->where('schedule_id',$value['id']);
 

$count = $this->db->count_all_results('students');

echo $count ;

if($count >0){  ?> <br/>

<?php if($value['c_status']=='confirm'){ ?>

      <button class="btn btn-default btn-xs" >Course Confirmed</button>

<?php }else{ ?>

<a onclick="confirmcourse(<?php echo $value['id'] ?>,'confirm');  return false ;" href="javascript:void(0)"  class="btn btn-success   btn-xs">Confirm Course</a> 


<?php } ?>


<?php }
?>
  </th>

<th>

<?php if($value['status']=='N'){ ?>

<!--     <a onclick="statusupdate(<?php echo $value['id'] ?>,'a');  return false ;" href="javascript:void(0)"  class="btn btn-success btn-xs">Activate</a> -->

    <a onclick="statusupdate(<?php echo $value['id'] ?>,'c');  return false ;" href="javascript:void(0)"  class="btn btn-warning btn-xs">Close</a> 

  <?php } else if($value['status']=='a'){ ?>
<a onclick="statusupdate(<?php echo $value['id'] ?>,'c');  return false ;" href="javascript:void(0)"  class="btn btn-warning btn-xs">Close</a> 

  <?php }else if($value['status']=='c'){ ?>

    <button class="btn btn-warning btn-xs" >Closed</button>

    <?php } ?>

<a onclick="statusupdate(<?php echo $value['id'] ?>,'d');  return false ;" href="javascript:void(0)"  class="btn btn-danger btn-xs">Delete</a> 


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
url: "<?php echo base_url(); ?>"+'admin/schedule_status/',
data: {id:$id,status:$status},
}).done(function(response){

location.reload();
//xin_table.api().ajax.reload();

});

}
 </script>
  <script type="text/javascript">
   function confirmcourse($id,$status){

// alert($(this).data('status'));
//alert($id);

var xin_table = $('#xin_table').dataTable();

$.ajax({ 
type: "POST",
url: "<?php echo base_url(); ?>"+'admin/confirm_status/',
data: {id:$id,status:$status},
beforeSend: function() {
     toastr.success("Course confirmation in progress !!!!");
    },

}).done(function(JSON){

 
//location.reload();
//xin_table.api().ajax.reload();

 
        if (JSON.error != '') {
        toastr.error(JSON.error);
       // $('.save').prop('disabled', false);
        } else {
        toastr.success(JSON.result);
       // $('.save').prop('disabled', false);
        location.reload();
        }
      



});

}
 </script>
