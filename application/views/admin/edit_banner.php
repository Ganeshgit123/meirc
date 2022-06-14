 <?php $this->load->view('admin/header');?>
<body>
<?php $this->load->view('admin/top_header');?>
<?php $this->load->view('admin/side_header');?>

<?php $session = $this->session->userdata('username');?>
 
 <div id="wrapper">
<div class="main-content">
<div class="row small-spacing">

  <div class="box-content card white">
<div class="box-title row">
    <div class='col-md-4'><h4><?php echo $this->Admin_model->translate("Edit Banner") ?></h4></div>
    <div class='col-md-6'></div>
    <div class='col-md-2'> 
            <a href="<?php echo base_url(); ?>admin/banners"><button class="btn btn-warning"><?php echo $this->Admin_model->translate("Banner List") ?></button></a>
    </div>
</div>




  <div class="card-content">


     
         <?php $attributes = array('name' => 'edit_user', 'id' => 'xin-form', 'autocomplete' => 'off');?>
        <?php $hidden = array('_user' => $session['user_id']);?>
        <?php echo form_open('admin/update_banner', $attributes, $hidden);?>
        <div class="form-body">
          <div class="row"> 

            <input type="hidden" name="bannerid" value="<?php echo $id ?>">
               
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="first_name" style="display:none;"> <?php echo $this->Admin_model->translate("Banner Name") ?></label>
                    <input class="form-control" placeholder="Banner Name" name="banner_name" type="hidden" value="<?php echo $banner_name ?>">
                  </div>
                </div>
               
		</div>


<div class="row">
  
      <div class="col-md-12">
                  <div class="form-group">
                     <label for="category"><?php echo $this->Admin_model->translate("Category") ?> </label>
                     <select class="form-control" id="category" name="category" >
                    
                      <option value="1"
                      <?php if($category=='1') {
                        echo "selected";
                      }?>
                      >Home</option>
                        <option value="2" <?php if($category=='2') {
                        echo "selected";
                      }?>>Services</option>
                          <option value="3" <?php if($category=='3') {
                        echo "selected";
                      }?>>Courses</option>
                       <option value="4" <?php if($category=='4') {
                        echo "selected";
                      }?>>Certified Courses</option>
                    </select>
                  </div>
                </div>
</div>

		<div class="row"> 
               <div class="col-md-12">

<div class="form-group">
	<div class="col-md-6">
<label for="confirm_password" class="control-label">Banner Image</label>
 

  <fieldset class="form-group">
                        
                        <input type="file" class="form-control-file" id="banner_image" name="banner_image" onchange="readURL(this);">
                        <small>Upload files only: gif,png,jpg,jpeg</small>
                      </fieldset>

                        


</div>
 

 <input type="hidden" name="bimage" value="<?php echo $banner_image;?>">

<div class="col-md-6">
        <div class='form-group'>
          <?php if($banner_image!='' && $banner_image!='no file') {?>
          <img   class="img-thumb" src="<?php echo base_url().'uploads/images/'.$banner_image;?>" style="height:200px !important;width:200px !important;" id="image"> <a href="<?php echo site_url()?>download?type=images&filename=<?php echo $banner_image;?>">Download</a>
          <?php } else {?>
          <p>&nbsp;</p>
          <?php } ?>
        </div>
      </div>
</div>

</div>

</div>
         

         <div class="row"> 
               
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="first_name"> <?php echo $this->Admin_model->translate("Banner Description") ?></label>
                     <textarea  class="form-control" name="banner_description" placeholder="Banner Description"><?php echo $banner_description ?></textarea>
                  </div>
                </div>
               
               
               </div>


               </div>
              
          
          
           
        </div>
        <div class="form-actions"> <?php echo form_button(array('name' => 'hrsale_form', 'type' => 'submit', 'class' => 'btn btn-primary', 'content' => '<i class="fa fa fa-check-square-o"></i>Save')); ?> </div>
        <?php echo form_close(); ?> </div>



<!-- ================================================== -->
 <?php $this->load->view('admin/footer');?>


<script type="text/javascript">
	/* Add data */ /*Form Submit*/

	$(document).ready(function(){
	 

	/* Add data */ /*Form Submit*/
	$("#xin-form").submit(function(e){
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
				window.location.href="<?php echo base_url();?>admin/banners";
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

 <script type="text/javascript">
function readURL(input) {
if (input.files && input.files[0]) {
var reader = new FileReader();
​jQuery('#image').removeAttr('src') ;
jQuery('#image').show();
​
​
​
reader.onload = function (e) {
$('#image').attr('src', e.target.result);
$('#image').attr('style', "height:200px !important;width:200px !important;");
​
}
​
reader.readAsDataURL(input.files[0]);
}
}
</script>

</body>
</html>