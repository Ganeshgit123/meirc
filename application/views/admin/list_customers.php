 <?php $this->load->view('admin/header');?>
<body>
<?php $this->load->view('admin/top_header');?>
<?php $this->load->view('admin/side_header');?>


<div id="wrapper">
<div class="main-content">
<div class="row small-spacing">
<div class="col-xs-12">
     <div class="box-content card white">
<div class="box-title row">
    <div class='col-md-4'><h4><?php echo $this->Admin_model->translate("Student List") ?></h4></div>
    <div class='col-md-6'></div>
    <div class='col-md-2'> 
         
 
    </div>
</div>
<div class="box-content">

  <form>
        <div class="form-body">
          <div class="row"> 
               
                 <div class="col-md-6">
                  <div class="form-group">
                   <label for="first_name"> <?php echo $this->Admin_model->translate("Category")?></label>
                     <select class="form-control categoryname" id="categoryname" name="category_name" >
                    <option value="">--Select--</option>
                    <?php
 
                     foreach ($categories as $category) {?>
                      <option value="<?php echo $category['id'];?>"><?php echo  $category['category_name']    ?></option>
                    <?php    }   ?>
                    </select>
                  </div>
                </div>

                  <div class="col-md-6">
                  <div id = "subcategory">
                    <input type="hidden" id="sub_category" name="">
                  </div>
                </div>

              </div>
               
               
                 <div class="row"> 
                <div id = "courses">
                  <input type="hidden" id="course_name" name="">
                </div>
            </div>
          
                   <div class="row"> 
               <div class="col-md-6">
                 <div class="form-group">
                   <label for="first_name"> <?php echo $this->Admin_model->translate("Location")?></label>
                     <select class="form-control location" id="location" name="location" >
                    <option value="">--Select--</option>
                    <?php
 
                     foreach ($locations as $location) {?>
                      <option value="<?php echo $location['location'];?>"><?php echo  $location['location']    ?></option>
                    <?php    }   ?>
                    </select>
                  </div>
               </div>
               <div class="col-md-6">
                <div class="form-group">
                   <label for="first_name"> <?php echo $this->Admin_model->translate("Start Date")?></label>
                     <select class="form-control startdate" id="startdate" name="startdate" >
                    <option value="">--Select--</option>
                    <?php
 
                     foreach ($startdate as $sdate) {?>
                      <option value="<?php echo $sdate['start_date'];?>"><?php echo date("d-M-y", strtotime($sdate['start_date'])) ?> </option>
                    <?php    }   ?>
                    </select>
                  </div>
               </div>
               
            </div>
    
           
        </div>
        
        </form>

  <button class ="btn btn-primary btn-block" onclick="student_report()">Search </button>
<br/>
<div id="streport">
  
</div>
</div>
<!-- /.col-lg-6 col-xs-12 -->
</div>
</div>





 <?php $this->load->view('admin/footer');?>

  <script type="text/javascript">
function student_report(){

// alert($(this).data('status'));
//alert($id);

$course = $('#course_name').val();
$category = $('#categoryname').val();
$subcategory = $('#sub_category').val();
$location = $('#location').val();
$startdate=$('#startdate').val();
//var xin_table = $('#xin_table').dataTable();

$.ajax({ 
type: "POST",
url: "<?php echo base_url(); ?>"+'admin/student_report/',
data: {course:$course,category:$category,subcategory:$subcategory,location:$location,startdate:$startdate},
}).done(function(response){

 $('#streport').html(response) ;

});

}


  $('.categoryname').on('change', function() {
    var service = this.value ; 
 

    $.ajax({ 
        type: "POST",
          url : '<?php echo base_url() ?>'+"admin/getsubcategory",
            
           data: {'category_id': service},
    }).done(function(response){

    
    $( "#subcategory" ).html(response);
    
      
       
    });

  
});


  $('.categoryname').on('change', function() {
    var category = this.value ; 
     var subcategory =  $( "#subcategory" ).value ; 
 

    $.ajax({ 
        type: "POST",
          url : '<?php echo base_url() ?>'+"admin/getcourse",
            
           data: {'category_id': category,'subcategory_id': subcategory},
    }).done(function(response){

    
    $( "#courses" ).html(response);
    
      
       
    });

  
});

   $('.categoryname').on('change', function() {
    var category = this.value ; 
     var subcategory =  $( "#subcategory" ).value ; 
 

    $.ajax({ 
        type: "POST",
          url : '<?php echo base_url() ?>'+"admin/getcourse",
            
           data: {'category_id': category,'subcategory_id': subcategory},
    }).done(function(response){

    
    $( "#courses" ).html(response);
    
      
       
    });
   });

 </script>