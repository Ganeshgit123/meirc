<div class="col-md-12">


<div class="row"><br/><br/></div> 
 
<div class="text-center">
<h4>Registered Courses </h4>
</div>

<div class="details-wrap" style="margin-top:30px;">
<div class="details-box orders" id="profile_info">
<div class="row">
	 
	<div class="col-md-10">
 

 
<table class="footable-details table table-striped table-hover toggle-circle">

  <thead>
    <th>Course Name</th>
    <th>Schedule</th>
    <th>Confirmation Status</th>
    <th>Instructor</th>
    <th>Payment</th>
    
  </thead>
      <tbody>
<?php
foreach($coursedet as $row)
{
?>

<?php $scheduledet = $this->db->get_where('schedule',array('id'=>$row['schedule_id']))->row(); ?>

              
     <tr>
           
          <td ><?php echo $this->Admin_model->get_type_name_by_id('courses','id',$scheduledet->course_id,'product_name') ?></td>
          <td ><?php echo date("d-M-y", strtotime($scheduledet->start_date)) ?> <br/>
 <?php echo $scheduledet->time?> <br/>
<?php echo $scheduledet->location?> </td>
<td ><?php if($scheduledet->c_status=='confirm'){ echo '<a class="tutor-button tutor-btn " href="" >Confirmed</a>' ; } else{
  echo 'Pending' ;
}   ?></td>
<td ><?php echo $this->Admin_model->get_type_name_by_id('instructor','id', $scheduledet->instructor ,'uname') ?>  </td>

<td> 

<?php

 

$this->db->order_by('id','desc');
$this->db->where('student_id',$row['id']);
$this->db->where('schedule_id',$scheduledet->id);
$this->db->limit(1);  
//$this->db->where('status','success');
$payment = $this->db->get('student_transaction_det')->row(); 


//echo $this->db->last_query();
if(!empty($payment)){ 

if($payment->status=='success'){
  echo '<a class="btn btn-success" href="" >Paid</a>' ;


} elseif(!empty($payment->paymentlink)) {   ?>

  <a class="btn btn-warning" href="<?php echo $payment->paymentlink ?>"> Click here to Pay </a>

  <?php }

}  ?>


 </td>
      </tr>
  
  
 <?php
}
?> 

</tbody>
</table>
	</div>
	 
</div>

</div>
</div>
 
 

</div>