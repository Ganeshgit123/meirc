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
    <div class='col-md-4'><h4><?php echo $this->Admin_model->translate("Edit Category") ?></h4></div>
    <div class='col-md-6'></div>
    <div class='col-md-2'> 
            <a href="<?php echo base_url(); ?>admin/category"><button class="btn btn-warning"><?php echo $this->Admin_model->translate("Category List") ?></button></a>
    </div>
</div>




  <div class="card-content">


     
         <?php $attributes = array('name' => 'edit_user', 'id' => 'xin-form', 'autocomplete' => 'off');?>
        <?php $hidden = array('_user' => $session['user_id']);?>
        <?php echo form_open('admin/update_category', $attributes, $hidden);?>
        <div class="form-body">
          <div class="row"> 

            <input type="hidden" name="catid" value="<?php echo $id ?>">
               
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="first_name"> <?php echo $this->Admin_model->translate("Category Name") ?></label>
                    <input class="form-control" placeholder="Category Name" name="category_name" type="text" value="<?php echo $category_name ?>">
                  </div>
                </div>
               


               <div class="col-md-12">

<div class="form-group">
	<div class="col-md-6">
<label for="confirm_password" class="control-label">Category Icon</label>
 

  <fieldset class="form-group">
                        
                        <input type="file" class="form-control-file" id="service_image" name="category_image" onchange="readURL(this);">
                        <small>Upload files only: gif,png,jpg,jpeg</small>
                      </fieldset>

                        


</div>
 

 <input type="hidden" name="iconname" value="<?php echo $cat_icon;?>">

<div class="col-md-6">
        <div class='form-group'>
          <?php if($cat_icon!='' && $cat_icon!='no file') {?>
          <img   class="img-thumb" src="<?php echo base_url().'uploads/images/'.$cat_icon;?>" style="height:200px !important;width:200px !important;" id="u_file"> <a href="<?php echo site_url()?>download?type=images&filename=<?php echo $cat_icon;?>">Download</a>
          <?php } else {?>
          <p>&nbsp;</p>
          <?php } ?>
        </div>
      </div>
</div>

</div>


      

                <div class="col-md-12">
                  <div class="form-group">

                  	 <div class="col-md-6">
                    <label for="first_name"> <?php echo $this->Admin_model->translate("Icon BG Color") ?></label>

    <!--                 
  <input  onchange="getcolorcode()" id="bgcolor" type="Color" multiple="TRUE" > -->

  <input type="color" id="bgcolor" class="form-control contact" value="<?php echo $icon_bg_color?>"  name="bgcolor"  onchange="getcolorcode(this.value)" />



</div>


<div class="col-md-6">
                    <label for="first_name"> <?php echo $this->Admin_model->translate("BG Color Code") ?></label>

                    
  <input class="form-control contact"  id="bgcolorcode"  name="colorcode" type="text" onchange="getcolor(this.value)"  value="<?php echo $icon_bg_color?>">

</div>


                  
                  </div>
                </div>
               
               


         
               </div>
              
          
          
           
        </div>
        <br/>
        <div class="form-actions"> <?php echo form_button(array('name' => 'hrsale_form', 'type' => 'submit', 'class' => 'btn btn-primary btn-block', 'content' => '<i class="fa fa fa-check-square-o"></i>Save')); ?> </div>
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
				window.location.href="<?php echo base_url();?>admin/category";
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

jQuery('#image').removeAttr('src')
jQuery('#image').show();



reader.onload = function (e) {
$('#image').attr('src', e.target.result);
$('#image').attr('style', "height:200px !important;width:200px !important;");

}

reader.readAsDataURL(input.files[0]);
}
}
</script>


 <script type="text/javascript">
function getcolorcode(colorcode) {

$('#bgcolorcode').val(colorcode);
 
  
}
 
 function getcolor(colorcode) {

$('#bgcolor').val(colorcode);
 
  
}
</script>



</body>
</html>