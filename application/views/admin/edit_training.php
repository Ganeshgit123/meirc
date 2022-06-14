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
    <div class='col-md-4'><h4><?php echo $this->Admin_model->translate("Edit Training") ?></h4></div>
    <div class='col-md-6'></div>
    <div class='col-md-2'> 
            <a href="<?php echo base_url(); ?>admin/trainings"><button class="btn btn-warning">Training List</button></a>
    </div>
</div>




  <div class="card-content">


     
         <?php $attributes = array('name' => 'edit_form', 'id' => 'xin-form', 'autocomplete' => 'off');?>
        <?php $hidden = array('_user' => $session['user_id']);?>
        <?php echo form_open('admin/update_training', $attributes, $hidden);?>
        <div class="form-body">


        	<div class="row"> 
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="first_name"><?php echo $this->Admin_model->translate("Company Name") ?></label>
                    
<?php echo $this->Admin_model->select_html('companies','id', 'company_name', 'company_name', 'edit', 'demo-chosen-select form-control required company_name', $company_id, '', '', ''); ?>
   
                  </div>
                </div>
            </div>
 


	<div class="row"> 

            <input type="hidden" name="trainingid" value="<?php echo $id ?>">
               
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="first_name"><?php echo $this->Admin_model->translate("Training Name") ?></label>
                    <input class="form-control" placeholder="Training Name" name="training_name" type="text" value="<?php echo $training_name ?>">
                  </div>
                </div>
            </div>

            <div class="row"> 
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="first_name"><?php echo $this->Admin_model->translate("Duration")?></label>
                    <input class="form-control" placeholder="Duration" 
                    name="duration" type="text" value="<?php echo $duration ?>">
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label for="first_name"><?php echo $this->Admin_model->translate("Duration In")?></label>
                    <select class="form-control" name="duration_in" >
                      <option value="Hours" <?php if($duration_in == 'Hours'){ echo "selected" ; } ?> >Hours</option>
                      <option value="Days" <?php if($duration_in == 'Days'){ echo "selected" ; } ?> >Days</option></select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="first_name"><?php echo $this->Admin_model->translate("Max. No.of Students")?></label>
                    <input class="form-control" placeholder="Max. No.of Students" 
                    name="no_of_students_per_slot" type="number" value="<?php echo $no_of_students_per_slot ?>">
                  </div>
                </div>
            </div>

            <div class="row"> 
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="first_name"><?php echo $this->Admin_model->translate("Weekly Days")?></label>

                    <?php  
                    $days = explode(',', $weekly_days) ;
 

                     ?>
                     
                     <select class="select2_2 form-control inputfield" multiple="" name="weekly_days[]">
                   
                    <?php 
 
                   
                      
 
                    foreach ($week_days as  $value) { ?>
                     <option value="<?php echo $value['dayname'] ?>"  <?php if( in_array($value['dayname'] , $days)){ echo "selected" ; } ?>><?php echo $value['dayname'] ?></option>
                   <?php   } ?>                    
                     </select>


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
				window.location.href="<?php echo base_url();?>admin/trainings";
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

</body>
</html>