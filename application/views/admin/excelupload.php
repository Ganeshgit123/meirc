 <?php $this->load->view('admin/header');?>
<body>
<?php $this->load->view('admin/top_header');?>
<?php $this->load->view('admin/side_header');?>

 
 <div id="wrapper">
<div class="main-content">


<!-- page content -->
<div class="right_col" role="main">
    <div class="">
      
       
           <div class="container" style="margin-top:50px">    
             <br>
               <h1 class="text-center text-uppercase">Upload Excel</h1>
             <?php if (!empty($error)): ?>
                <div class="alert alert-danger"><?php echo $error; ?></div>
            <?php endif; ?>
             <?php if (!empty($result)): ?>
                <div class="alert alert-success"><?php echo $result ; ?></div>
            <?php endif; ?>
             
			 
			 <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                  
                   
                    <div class="clearfix"></div>
					  <h5>TRAINING TYPE</h5>
                    <div class="row">
                    </div>
					
                    <div class="x_content">
                        <br/>  
                           <form  id="excelupload"  method="post" action="<?php echo base_url() ?>admin/importFile" enctype="multipart/form-data">                     
                
			 
									<!-- 	<div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-4" style = " text-align: left;" >DESTINATION BRANCH</label>
                                    <div class="col-md-4 col-sm-4 col-xs-4">
									              <select name="branch" id="branch"  class="form-control" required="required" >

                                                    <option value = ""> --Select-- </option>
                                        <option value = "air" selected="selected"   > Air Cargo</option>
                                        <option value = "sea"> Sea Cargo</option>   

										 					 				 
                                        </select>
                                    </div>
                                </div>
								<br/> <br/> 
								
									<div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-4" style = " text-align: left;" >UPLOADING DATE</label>
                                    <div class="col-md-4 col-sm-4 col-xs-4">
									  <input type="date" name="uploaddate" value="2020-11-11" class="form-control "  >
                                         									 
                                    </div>
                                </div> -->
								 <div class="row">
						<div class="item form-group">
                                
                                      <div class="col-md-6 col-sm-6 col-xs-6">
                                              <select name="training_type" id="item_type"  class="form-control"  >
										<option value = ""> --Select-- </option>
										<option value = "Virtual Instructor - Lead" > Virtual Instructor - Lead</option>
                                        <option value = "Public Classrooms" > Public Classrooms</option>
                                          <option value = "In House" > In House</option>
                                            <option value = "Certified Courses" >Certified Courses</option>

								 									 	 
                                             </select>
                                    </div>
                                </div>
                            </div>

                            <br/>  <br/>
                                 <div class="row">
								
					<div class="item form-group">
                                
          <div class="col-md-6 col-sm-6 col-xs-6">
   					<input type="file" name="uploadFile"  class="btn btn-round btn-dark "  ><br>
                    <input id="submit" type="submit" name="submit" value="UPLOAD" class="btn btn-round btn-primary" >
                </div>

 <div class="col-md-6 col-sm-6 col-xs-6">
                 <a href=<?php echo site_url() ?>download?type=images&filename=sampleexcel.xlsx><i class="fa fa-file"></i>  Download Sample Excel </a>
</div>

              </div>
            </div>
					   
                </form>
 	
			 
                    </div>
                </div>
            </div>
        </div>
             
               
 
        </div>
    </div>
</div>

		 <div class="modal fade" id="editBox" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">

            </div>
        </div>
    </div>
   



     
    </div>

</div>
 
     <?php $this->load->view('admin/footer'); ?>


<script>
       
             
  
            
               $(document).ready(function () {
            $('#editBox').on('hidden.bs.modal', function () {
                $(this).removeData('bs.modal');
            });
        });
             
             
             // $(document).ready(function () {
    //             $.ajax({
    //                         url: '<?php echo base_url() ?>' + 'admin/selectBranch',
    //                         type: 'GET'
    //                     }).done(function (html) {
    //                         $('#branch').html(html);
    //                     });
                        
                          
                            
    //         });

         
            
        </script>
        
         


</body>
</html>
