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
    <div class='col-md-4'><h4><?php echo $this->Admin_model->translate("Add Banner") ?> </h4></div>
    <div class='col-md-6'></div>
    <div class='col-md-2'> 
            <a href="<?php echo base_url(); ?>admin/banners"><button class="btn btn-warning"><?php echo $this->Admin_model->translate("Banner List") ?></button></a>
    </div>
</div>




  <div class="card-content">
         <?php $attributes = array('name' => 'add_staff', 'id' => 'xin-form', 'autocomplete' => 'off');?>
        <?php $hidden = array('_user' => $session['user_id']);?>
        <?php echo form_open('admin/addbanner', $attributes, $hidden);?>
        <div class="form-body">
          <div class="row"> 
               
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="first_name" style='display:none;'> <?php echo $this->Admin_model->translate("Banner Name") ?></label>
                    <input class="form-control" placeholder="Banner Name" name="banner_name" type="hidden" value="title">
                  </div>
                </div>
               
               
               </div>
<div class="row">
  
      <div class="col-md-12">
                  <div class="form-group">
                     <label for="category"><?php echo $this->Admin_model->translate("Category") ?> </label>
                     <select class="form-control" id="category" name="category" >
                    <option value="">--Select--</option>
                      <option value="1">Home</option>
                        <option value="2">Services</option>
                          <option value="3">Courses</option>
                           <option value="4">Certified Courses</option>
                    </select>
                  </div>
                </div>
</div>

                 <div class="row"> 
               
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="first_name"> <?php echo $this->Admin_model->translate("Banner Image") ?></label>
                     <input type="file" class="form-control-file" id="banner_image" name="banner_image" onchange="readURL(this);">
                        <small>Upload files only: gif,png,jpg,jpeg</small>

                  </div>
                </div>
               
               

                <div class="col-md-6">
                  <div class="form-group">
                    
                      
                        <img id="image" src="#" alt="No image"  />

                  </div>
                </div>


               </div>
              

<div class="row"> 
               
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="first_name"> <?php echo $this->Admin_model->translate("Banner Description") ?></label>
                     <textarea  class="form-control" name="banner_description" placeholder="Banner Description"></textarea>
                  </div>
                </div>
               
               
               </div>

              
       
           
        </div>
        <div class="form-actions"> <?php echo form_button(array('name' => 'hrsale_form', 'type' => 'submit', 'class' => 'btn btn-primary', 'content' => '<i class="fa fa fa-check-square-o"></i>&nbsp;&nbsp;'.   $this->Admin_model->translate("Save") )); ?> </div>
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

jQuery('#image').removeAttr('src') ;
jQuery('#image').show();



reader.onload = function (e) {
$('#image').attr('src', e.target.result);
$('#image').attr('style', "height:200px !important;width:200px !important;");

}

reader.readAsDataURL(input.files[0]);
}
}
</script>


</body>
</html>