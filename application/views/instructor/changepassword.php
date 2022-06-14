<div class="col-md-12">

<?php
foreach($instructordet as $row)
{
?>
<div class="row"><br/><br/></div> 
 


 <div class="col-md-12">
 <div class="text-center">
<h4>Change Password</h4>
</div>
<div class="row"><br/><br/></div> 

<form method="POST"  id="form-slider" action="<?php echo base_url();?>instructor/updatepassword" enctype="multipart/form-data">

  <div class="row">
 <div class="col-md-10">
  <div class="form-group">
<label class="control-label mb-10 text-left">Old Password </label>
 
<input type="text" class = "form-control "name="oldpassword" value="" >
</div>

</div> 

 
</div>

<div class="row">
 
 

 <div class="col-md-10">
  <div class="form-group">
<label class="control-label mb-10 text-left">New Password </label>
 
<input type="text" class = "form-control "name="newpassword" value="" >
</div>

</div> 



</div>


<div class="row">
 
 

 <div class="col-md-10">
  <div class="form-group">
<label class="control-label mb-10 text-left"> Confirm New Password </label>
 
<input type="text" class = "form-control "name="cpass" value="" >
</div>

</div> 



</div>



<div class="tutor-form-row">
        <div class="tutor-form-col-12">
            <div class="tutor-form-group tutor-reg-form-btn-wrap">
                <button type="submit" name="tutor_register_student_btn" value="register" class="tutor-button btn btn-block">Update</button>
            </div>
        </div>
    </div>

</form>

</div>
 
 
<?php
}
?> 
</div>

<script type="text/javascript">
/* Add data */ /*Form Submit*/

jQuery(document).ready(function(){


/* Add data */ /*Form Submit*/
jQuery("#form-slider").submit(function(e){

 
var fd = new FormData(this);
var obj = jQuery(this), action = obj.attr('name');
fd.append("is_ajax", 1);

fd.append("form", action);
e.preventDefault();
jQuery('.save').prop('disabled', true);

jQuery.ajax({
url: e.target.action,
type: "POST",
data:  fd,
contentType: false,
cache: false,
processData:false,
success: function(JSON)
{
if (JSON.error != '') {
toastr.error(JSON.error);
jQuery('.save').prop('disabled', false);
} else {
toastr.success(JSON.result);
jQuery('.save').prop('disabled', false);
window.location.href="<?php echo base_url();?>instructor/dashboard";
}
},
error: function() 
{
toastr.error(JSON.error);

jQuery('.save').prop('disabled', false);
} 	        
});
});

});
</script>
