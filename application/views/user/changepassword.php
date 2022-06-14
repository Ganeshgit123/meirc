<div class="col-md-12">

<?php
foreach($customerdet as $row)
{
?>
<div class="row"><br/><br/></div> 
 


 <div class="col-md-12">
 <div class="text-center">
<h4><?php echo $this->Admin_model->translate("Change Password") ?></h4>
</div>
<div class="row"><br/><br/></div> 

<form method="POST"  id="form-slider" action="<?php echo base_url();?>user/updatepassword" enctype="multipart/form-data">

  <div class="row">
 <div class="col-md-12">
  <div class="form-group">
<label class="control-label mb-10 text-left"><?php echo $this->Admin_model->translate("Old Password") ?> </label>
 
<input type="text" class = "form-control "name="oldpassword" value="" >
</div>

</div> 

 
</div>

<div class="row">
 
 

 <div class="col-md-12">
  <div class="form-group">
<label class="control-label mb-10 text-left"><?php echo $this->Admin_model->translate("New Password") ?> </label>
 
<input type="text" class = "form-control "name="newpassword" value="" >
</div>

</div> 



</div>


<div class="row">
 
 

 <div class="col-md-12">
  <div class="form-group">
<label class="control-label mb-10 text-left"><?php echo $this->Admin_model->translate("Confirm New Password") ?>  </label>
 
<input type="text" class = "form-control "name="cpass" value="" >
</div>

</div> 



</div>



<div class="tutor-form-row">
        <div class="tutor-form-col-12">
            <div class="tutor-form-group tutor-reg-form-btn-wrap">
                <button type="submit" name="tutor_register_student_btn" value="register" class="tutor-button btn btn-block"><?php echo $this->Admin_model->translate("Update") ?></button>
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

$(document).ready(function(){


/* Add data */ /*Form Submit*/
$("#form-slider").submit(function(e){
var fd = new FormData(this);
var obj = $(this), action = obj.attr('name');
fd.append("is_ajax", 1);

fd.append("form", action);
e.preventDefault();
$('.save').prop('disabled', true);

$.ajax({
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
$('.save').prop('disabled', false);
} else {
toastr.success(JSON.result);
$('.save').prop('disabled', false);
window.location.href="<?php echo base_url();?>user/dashboard";
}
},
error: function() 
{
toastr.error(JSON.error);

$('.save').prop('disabled', false);
} 	        
});
});

});
</script>
