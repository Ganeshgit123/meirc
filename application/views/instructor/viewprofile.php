<div class="col-md-12">

<?php
foreach($instructordet as $row)
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
          <td ><?php echo $row['uname'] ;?></td>
      </tr>
 <tr>
          <th>Email</th>
          <td ><?php echo $row['uemail'];?></td>
      </tr>
<tr>
          <th>Username</th>
          <td ><?php echo $row['uphone'];?></td>
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