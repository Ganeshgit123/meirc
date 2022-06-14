<div class="col-md-12">

<?php
foreach($instructordet as $row)
{
?>
<div class="row"><br/><br/></div> 
 


 <div class="col-md-12">
 <div class="text-center">
<h4>Edit Profile Information - Instructor</h4>
</div>
<div class="row"><br/><br/></div> 

<form method="POST"  id="form-slider" action="<?php echo base_url();?>instructor/updateprofile" enctype="multipart/form-data">

 
     <input type="hidden" name="custid" value="<?php echo $row['id'] ?>">

    
    <div class="tutor-form-row">
        <div class="tutor-form-col-12">
            <div class="tutor-form-group">
                <label>
                    User Name                </label>

                <input type="text" name="username" value="<?php echo $row['uname'] ?>" placeholder="First Name">
            </div>
        </div>
    </div>
<div class="tutor-form-row">
        <div class="tutor-form-col-12">
            <div class="tutor-form-group">
                <label>
                    Phone               </label>

                <input type="text" name="phone" value="<?php echo $row['uphone'] ?>" placeholder="Phone No.">
            </div>
        </div>

    </div>

  
<div class="tutor-form-row">
        <div class="tutor-form-col-12">
            <div class="tutor-form-group">
                <label>
                    E-Mail                </label>

                <input type="text" name="email"   value="<?php echo $row['uemail'] ?>" placeholder="E-Mail">
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

//alert("hello");
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
