 

 <div class="table-responsive">
  <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
      <tr>
<th><?php echo $this->Admin_model->translate("No") ?></th>
<!-- <th>User Id</th> -->
<th><?php echo $this->Admin_model->translate("Register Date") ?></th>
<th><?php echo $this->Admin_model->translate("Name") ?></th>
<th><?php echo $this->Admin_model->translate("Email ") ?></th>
<th><?php echo $this->Admin_model->translate("Phone") ?></th>
<th><?php echo $this->Admin_model->translate("Course Details") ?></th>
<th><?php echo $this->Admin_model->translate("Payment Status") ?></th>

<th></th>
  
</tr>
      
</thead>
<tbody>
<?php foreach ($studentdet as $value) {
$this->db->where('id',$value['schedule_id']);
$coursedet = $this->db->get('schedule')->row();  
  ?>
 <tr> 
<th><?php echo $value['id'] ?></th>
<!-- <th>User Id</th> -->
 

<th><?php echo date("d-m-Y", strtotime($value['register_date'])) ?></th>
<th><?php echo $value['first_name'] .$value['last_name'] ?></th>
<th> <?php echo $value['email'] ?> </th>
<th><?php echo $value['phoneno'] ?></th>
<th> Course Name : <?php echo $this->Admin_model->get_type_name_by_id('courses','id', $coursedet->course_id  , 'product_name') ; ?> <br/>
  <?php echo date("d-M-y", strtotime($coursedet->start_date)) ?> <br/>
 <?php echo $coursedet->time?> <br/>
<?php echo $coursedet->location?> 
</th>
<th>
<?php 
$this->db->where('student_id',$value['id']);
$this->db->where('schedule_id',$value['schedule_id']);
$this->db->where('status','success');
$payment = $this->db->get('student_transaction_det')->row(); 

if(!empty($payment)){ ?>

   <button type="button" class="btn btn-success  btn-xs waves-effect waves-light"> Paid </button>


<?php } else { ?>
 <button type="button" class="btn btn-danger   btn-xs waves-effect waves-light">Pending </button>

<?php }
?>

</th>
  
 </tr>

  <?php
} ?>
  

</tbody>
    
    </table>
</div>
<!-- /.box-content -->
<script>
    $(document).ready(function() {
        var table = $('#example').DataTable( {
            lengthChange: false,
            buttons: [ 'copy', 'excel', 'csv', 'pdf' ]
        } );
     
        table.buttons().container()
            .appendTo( '#example_wrapper .col-md-6:eq(0)' );
    } );
     </script>
<script>
$(function($) {
$('#example').DataTable();

$('#example2').DataTable( {
"scrollY":        "300px",
"scrollCollapse": true,
"paging":         false
} );

$('#example3').DataTable();
});
</script>