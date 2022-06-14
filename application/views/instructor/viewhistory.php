<div class="col-md-12">


<div class="row"><br/><br/></div> 
 
<div class="text-center">
<h4>Update History </h4>
</div>

<div class="details-wrap" style="margin-top:30px;">
<div class="details-box orders" id="profile_info">
<div class="row">
	 
	<div class="col-md-10">
 

 
<table class="footable-details table table-striped table-hover toggle-circle">

  <thead>
    <th>Date</th>
    <th>Details</th>
    <th>Attachments</th>
     

    
  </thead>
      <tbody>
<?php
foreach($coursedet as $row)
{
?>
 
              
     <tr>
           
<td ><?php echo date("d-m-Y", strtotime($row['created_on'])) ?>  </td> 
<td > <?php echo  $row['details'] ?>   </td>
<td >   </td> 
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