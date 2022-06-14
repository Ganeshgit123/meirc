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
    <div class='col-md-4'><h4><?php echo $this->Admin_model->translate("Add Company")?></h4></div>
    <div class='col-md-6'></div>
    <div class='col-md-2'> 
            <a href="<?php echo base_url(); ?>admin/companies"><button class="btn btn-warning"><?php echo $this->Admin_model->translate("Company List") ?></button></a>
    </div>
</div>




  <div class="card-content">
         <?php $attributes = array('name' => 'add_company', 'id' => 'xin-form', 'autocomplete' => 'off');?>
        <?php $hidden = array('_user' => $session['user_id']);?>
        <?php echo form_open('admin/addcompany', $attributes, $hidden);?>
        <div class="form-body">

        	 

           <!--  <div class="row"> 
                <div id = "subcategory"></div>
            </div> -->


          	<div class="row"> 
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="first_name"><?php echo $this->Admin_model->translate("Company Name") ?></label>
                    <input class="form-control" placeholder="Company Name" 
                    name="company_name" type="text" value="">
                  </div>
                </div>
            </div>
            <div class="row"> 
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="first_name"><?php echo $this->Admin_model->translate("Shift Start Time") ?></label>
                    <input class="form-control" placeholder="Company Name" 
                    name="start_time" type="time" value="">
                  </div>
                </div>
                                <div class="col-md-6">
                  <div class="form-group">
                    <label for="first_name"><?php echo $this->Admin_model->translate("Shift End Time") ?></label>
                    <input class="form-control" placeholder="Company Name" 
                    name="end_time" type="time" value="">
                  </div>
                </div>
            </div>
            	
 
        </div>
        <div class="form-actions"> <?php echo form_button(array('name' => 'company_form', 'type' => 'submit', 'class' => 'btn btn-primary', 'content' => '<i class="fa fa fa-check-square-o"></i>&nbsp;&nbsp;Save')); ?> </div>
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
				window.location.href="<?php echo base_url();?>admin/companies";
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


// 	$('.services_select').on('change', function() {
//     var service = this.value ; 
 

//     $.ajax({ 
//         type: "POST",
//           url : '<?php echo base_url() ?>'+"admin/getsubcategory",
            
//            data: {'category_id': service},
//     }).done(function(response){

    
//     $( "#subcategory" ).html(response);
    
      
       
//     });

  
// });


</script>

</body>
</html>