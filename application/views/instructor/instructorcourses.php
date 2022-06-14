<div class="col-md-12">


<div class="row"><br/><br/></div> 
 
<div class="text-center">
<h4>Assigned Courses </h4>
</div>

<div class="details-wrap" style="margin-top:30px;">
<div class="details-box orders" id="profile_info">
<div class="row">
	 
	<div class="col-md-10">
 

 
<table class="footable-details table table-striped table-hover toggle-circle">

  <thead>
    <th>Course Name</th>
    <th>Schedule</th>
    <th>Status</th>
    <th>Instructor</th>
    <th>Action</th>
 <th>View History</th>

    
  </thead>
      <tbody>
<?php
foreach($coursedet as $row)
{
?>

<?php 


$scheduledet = $this->db->get_where('schedule',array('id'=>$row['id']))->row(); ?>

              
     <tr>
           
          <td ><?php echo $this->Admin_model->get_type_name_by_id('courses','id',$scheduledet->course_id,'product_name') ?></td>
          <td ><?php echo date("d-M-y", strtotime($scheduledet->start_date)) ?> <br/>
 <?php echo $scheduledet->time?> <br/>
<?php echo $scheduledet->location?> </td>
<td ><?php if($scheduledet->c_status=='confirm'){ echo 'Confirmed' ; }    ?></td>
<td ><?php echo $this->Admin_model->get_type_name_by_id('instructor','id', $scheduledet->instructor ,'uname') ?>  </td>
<td><a href="<?php echo base_url()?>instructor/sendupdate/<?php echo  $scheduledet->id ?>">&nbsp;&nbsp;<button type="button" class="btn btn-info btn-circle btn-xs waves-effect waves-light"> Send Update</button></a></td>
<td>
  <span class=" btn btn-default profile" onclick="viewhistory('<?php echo  $scheduledet->id ?>')"   ><a href="javascript:void(0)">View History</a></span>
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


<script type="text/javascript">
   function  viewhistory($schid) {

   
    var schid = $schid ;  

      jQuery.ajax({
type : "post",
url : "<?php echo base_url();?>instructor/viewhistory",
data : {schid:schid},
cache : false,
success : function(html) {
jQuery('#profile').html(html);
}
});
 }
 
</script>