<div class="col-md-12">

<?php
foreach($customerdet as $row)
{
?>
<div class="row"><br/><br/></div> 
 


 <div class="col-md-12">
 <div class="text-center">
<h4><?php echo $this->Admin_model->translate("Edit Profile Information") ?></h4>
</div>
<div class="row"><br/><br/></div> 

<form method="POST"  id="form-slider" action="<?php echo base_url();?>user/updateprofile" enctype="multipart/form-data">

 
     <input type="hidden" name="custid" value="<?php echo $row['id'] ?>">

    
    <div class="tutor-form-row">
        <div class="tutor-form-col-12">
            <div class="tutor-form-group">
                <label>
                    <?php echo $this->Admin_model->translate("First Name") ?>                </label>

                <input type="text" name="first_name" value="<?php echo $row['first_name'] ?>" placeholder="First Name">
            </div>
        </div>
    </div>
<div class="tutor-form-row">
        <div class="tutor-form-col-12">
            <div class="tutor-form-group">
                <label>
                    <?php echo $this->Admin_model->translate("Last Name") ?>                </label>

                <input type="text" name="last_name" value="<?php echo $row['last_name'] ?>" placeholder="Last Name">
            </div>
        </div>

    </div>

    <div class="tutor-form-row">
        <div class="tutor-form-col-12">
            <div class="tutor-form-group">
                <label>
                   <?php echo $this->Admin_model->translate("Phone No") ?>                 </label>

                <input type="text" name="phone_no" class="tutor_user_name" value="<?php echo $row['phone_no'] ?>" placeholder="Phone No">
            </div>
        </div>
</div>
<div class="tutor-form-row">
        <div class="tutor-form-col-12">
            <div class="tutor-form-group">
                <label>
                    <?php echo $this->Admin_model->translate("E-Mail") ?>                </label>

                <input type="text" name="email"   value="<?php echo $row['email'] ?>" placeholder="E-Mail">
                <span id="email_note"></span>
            </div>
        </div>

    </div>

    

    <div class="tutor-form-row">
        <div class="tutor-form-col-12">
            <div class="tutor-form-group">
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
//alert("hello");
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
