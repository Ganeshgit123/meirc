 

                 <div class="col-md-12">
                  <div class="form-group">
                    <label for="first_name"><?php echo $this->Admin_model->translate("Sub Category") ?></label>
                     <select class="form-control sub_category" id="sub_category" name="sub_category"   data-placeholder="Design category">
                    <option value="">--Select--</option>
                    <?php
 
                     foreach ($services as $subcategory) {?>
                      <option value="<?php echo $subcategory['id'];?>"><?php echo  $subcategory['subcategory_name']    ?></option>
                    <?php    }   ?>
                    </select>
                  </div>
                </div>

                <script type="text/javascript">
                 

$('.sub_category').on('change', function() {
   
  var subcategory = this.value ; 
  var category = $('#categoryname').val();
 //var category = this.value ; 

    $.ajax({ 
        type: "POST",
          url : '<?php echo base_url() ?>'+"admin/getcourse",
            
           data: {'category_id': category,'subcategory_id': subcategory},
    }).done(function(response){

    
    $( "#courses" ).html(response);
    
      
       
    });

  
});

                </script>