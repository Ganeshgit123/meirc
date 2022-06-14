 

                 <div class="col-md-12">
                  <div class="form-group">
                    <label for="first_name"><?php echo $this->Admin_model->translate("Course Name") ?></label>
                     <select class="form-control course_name" id="course_name" name="course_name" >
                    <option value="">--Select--</option>
                    <?php
 
                     foreach ($courses as $course) {?>
                      <option value="<?php echo $course['id'];?>"><?php echo  $course['product_name']    ?></option>
                    <?php    }   ?>
                    </select>
                  </div>
                </div>

                <script type="text/javascript">
                  
$('#course_name').on('change', function() {

 
    var course = this.value ; 
      

    $.ajax({ 
        type: "POST",
          url : '<?php echo base_url() ?>'+"admin/getdescription",
            
           data: {'course':course},
    }).done(function(response){

    
    //$("textarea#tinymce").val(response);

   // document.getElementById("tinymce").value = response;

      tinyMCE.activeEditor.setContent(response);


   // $( "#tinymce" ).html(response);
    
      
       
    });

  
});


                </script>