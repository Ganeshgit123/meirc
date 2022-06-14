 

 <div class="table-responsive">
  <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
      <tr>
<th><?php echo $this->Admin_model->translate("No") ?></th>
<!-- <th>User Id</th> -->
<th><?php echo $this->Admin_model->translate("Register Date") ?></th>
<th><?php echo $this->Admin_model->translate("Organisation") ?></th>
<th><?php echo $this->Admin_model->translate("No. of employees ") ?></th>

<th><?php echo $this->Admin_model->translate("Contact Details") ?></th>
<th><?php echo $this->Admin_model->translate("Course Details") ?></th> 

<th></th>
  
</tr>
      
</thead>
<tbody>
<?php foreach ($companydet as $value) {
$this->db->where('id',$value['schedule_id']);
$coursedet = $this->db->get('schedule')->row();  
  ?>
 <tr> 
<th><?php echo $value['id'] ?></th>
<!-- <th>User Id</th> -->
 

<th><?php echo  date("d-m-Y", strtotime($value['register_date'])) ?></th>
<th><?php echo $value['org_name']   ?></th>
<th><?php echo $value['no_employees']   ?></th>
<th> 
  <?php echo 'Name : '. $value['contact_name'] .'<br/>' ; ?> 
  <?php echo 'Email : '. $value['contact_email'].'<br/>' ; ?> 
  <?php echo 'Contact No : '. $value['contact_no']   ; ?> 
   

</th>
 
<th> Course Name : <?php echo $this->Admin_model->get_type_name_by_id('courses','id', $coursedet->course_id  , 'product_name') ; ?> <br/>

  <?php echo 'Type : '. $value['course_type']  ?><br/>
  <?php echo 'Date & time : ' . date("d-M-y", strtotime($coursedet->start_date)) .' & '.$coursedet->time ?> <br/>
  
<?php echo 'Location : '. $coursedet->location?> 
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