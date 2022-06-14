<div class="container">

<div class="row">

<div class="col-md-2"></div>

<div class="col-md-8">

<div class="row"><br/><br/></div> 

<form method="POST"  id="form-slider" action="<?php echo base_url();?>user/sendrequest" enctype="multipart/form-data">

  <div class="row">
 <div class="col-md-6">
  <div class="form-group">
<label class="control-label mb-10 text-left"><?php echo $this->Admin_model->translate("Course Title") ?> </label>
 
<input type="text" class = "form-control "name="course_title" value="" >
</div>

</div> 
 <div class="col-md-6">
  <div class="form-group">
<label class="control-label mb-10 text-left"><?php echo $this->Admin_model->translate("Date required") ?> </label>
 
<input type="date" class = "form-control "name="date" value="" >
</div>

</div> 
 
</div>

<div class="row">
 
 <div class="col-md-6">
  <div class="form-group">
<label class="control-label mb-10 text-left"><?php echo $this->Admin_model->translate("Company Name") ?> </label>
 
<input type="text" class = "form-control "name="company_name" value="" >
</div>

</div> 

 <div class="col-md-6">
  <div class="form-group">
<label class="control-label mb-10 text-left"><?php echo $this->Admin_model->translate("Contact Person") ?> </label>
 
<input type="text" class = "form-control "name="contact_person" value="" >
</div>

</div> 

</div>


<div class="row">
 
 <div class="col-md-6">
  <div class="form-group">
<label class="control-label mb-10 text-left"><?php echo $this->Admin_model->translate("Mobile/Tel") ?>  </label>
 
<input type="text" class = "form-control "name="mobile" value="" >
</div>

</div> 

 <div class="col-md-6">
  <div class="form-group">
<label class="control-label mb-10 text-left"><?php echo $this->Admin_model->translate("Email") ?>  </label>
 
<input type="text" class = "form-control "name="email" value="" >
</div>

</div> 

</div>

<div class="row">
<div class="col-md-12">
<div class="form-group">
<label class="control-label mb-10 text-left"><?php echo $this->Admin_model->translate("Other Requirements") ?>  </label>
 
<textarea class="form-control" name="other_req"></textarea>
</div>
</div>
</div>

<div class="tutor-form-row">
        <div class="tutor-form-col-12">
            <div class="tutor-form-group tutor-reg-form-btn-wrap">
                <button type="submit" name="tutor_register_student_btn" value="register" class="tutor-button btn btn-block"><?php echo $this->Admin_model->translate("Sent") ?></button>
            </div>
        </div>
    </div>

</form>

</div>

<div class="col-md-2"></div>
</div>
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
window.location.href="<?php echo base_url();?>user/in_house";
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
