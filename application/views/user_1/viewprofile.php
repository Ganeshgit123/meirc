<div class="col-md-12">

<?php
foreach($customerdet as $row)
{
?>
<div class="row"><br/><br/></div> 
 
<div class="text-center">
<h4>Profile Information</h4>
</div>

<div class="details-wrap" style="margin-top:30px;">
<div class="details-box orders" id="profile_info">
<div class="row">
	 
	<div class="col-md-10">
 

 
<table class="footable-details table table-striped table-hover toggle-circle">
      <tbody>
              
     <tr>
          <th>Name</th>
          <td ><?php echo $row['first_name'] . '' . $row['last_name'];?></td>
      </tr>
 <tr>
          <th>Email</th>
          <td ><?php echo $row['email'];?></td>
      </tr>
<tr>
          <th>Username</th>
          <td ><?php echo $row['username'];?></td>
      </tr>
   <tr>
          <th>Register Date</th>
          <td ><?php echo date("d-M-Y", strtotime($row['register_date']))  ;?></td>
      </tr>
  
  
 

</tbody>
</table>
	</div>
	 
</div>

</div>
</div>
 
 
<?php
}
?> 
</div>