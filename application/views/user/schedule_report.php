 



 <div class="table-responsive">
     <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
      <tr>
 
<th><?php echo $this->Admin_model->translate("Select") ?></th>

<!-- <th>User Id</th> -->
<th><?php echo $this->Admin_model->translate("Course Name") ?></th>
<th><?php echo $this->Admin_model->translate("Category Name") ?></th>
<th><?php echo $this->Admin_model->translate("Type") ?></th>
<th><?php echo $this->Admin_model->translate("Duration") ?></th>
<th><?php echo $this->Admin_model->translate("Location") ?></th>
<th><?php echo $this->Admin_model->translate("Date & Time") ?></th>
<th><?php echo $this->Admin_model->translate("No.of Registration") ?></th>

</tr>
      
</thead>
<tbody>
<?php

$i = 0 ;
 foreach ($scheduledet as $value) {

  $i++ ;
  ?>
 <tr>
<!--   <td><input type="checkbox" name="schedule[]" id="sch_<?php echo $i ?>" value="<?php echo  $value['id']  ; ?>"></td> -->
<td style="text-align: center;"><input type="checkbox"  class= "selectedschedule" id="select<?php echo $value['id'] ?>" value="<?php echo $value['id'] ?>" name="select[]"></td>
  
 <td><?php echo $this->Admin_model->get_type_name_by_id('courses','id', $value['course_id'] , 'product_name') ; ?>/ <?php echo $this->Admin_model->get_type_name_by_id('courses','id', $value['course_id'] , 'program_title_arabic') ; ?></td>

<!-- <th>User Id</th> -->
  <td><?php echo $this->Admin_model->get_type_name_by_id('category','id', $value['category_id'] , 'category_name') ; ?></td>

   <td><?php echo  $value['type']  ; ?></td>
    <td><?php echo  $value['duration']  ; ?></td>
     <td><?php echo  $value['location']  ; ?></td>
      <td><?php echo  date("d-M-y", strtotime($value['start_date'])) .' & '.$value['time'] ; ?></td>
      
 
  <th style="text-align:center;">
    
<?php $this->db->where('schedule_id',$value['id']);
 

$count = $this->db->count_all_results('students');

echo $count ;
   
?>
  </th>

 

</tr>

  <?php
} ?>
  

</tbody>
    
    </table>
</div>


   <div class="row instructor "> 
               
                 <div class="col-md-8">
                  <div class="form-group">
                   <label for="first_name"> <h3><?php echo $this->Admin_model->translate("Instructor")?></h3></label>
                     <select class="form-control" id="instructorname" name="instructor_name" >
                    <option value="0">--Select--</option>
                    <?php
 
                     foreach ($instructors as $instructor) {?>
                      <option value="<?php echo $instructor['id'];?>"><?php echo  $instructor['uname']    ?></option>
                    <?php    }   ?>
                    </select>
                  </div>
                </div>
              </div>

  <div class="row assignbtn"> 
                 <div class="col-md-8">
                  <div class="form-group  "  >
                          <label for="first_name">  </label>
                     <a onclick="assigninstructor();  return false ;" href="javascript:void(0)"  class="btn btn-success btn-block"><?php echo $this->Admin_model->translate("Assign Instructor") ?></a>
                  </div>
                </div>
 

              </div>


<!-- /.box-content -->
<script>
    $(document).ready(function() {
        var table = $('#example').DataTable( {
            lengthChange: false,
            buttons: [ 'copy', 'excel', 'csv', 'pdf' ]
        } );
     
        table.buttons().container()
            .appendTo( '#example_wrapper .col-md-6:eq(0)' );
    } );
     </script>
<script>
$(function($) {
$('#example').DataTable();

$('#example2').DataTable( {
"scrollY":        "300px",
"scrollCollapse": true,
"paging":         false
} );

$('#example3').DataTable();
});


$( document ).ready(function() {
     $(".assignbtn" ).hide();
     $("#instructorname" ).hide();
});


 $('.selectedschedule').on('click', function() {
     
     if ($("#example input:checkbox:checked").length > 0)
{
     //$(".assignbtn" ).hide();
     $("#instructorname" ).show();
}
else
{
  $(".assignbtn" ).hide();
     $("#instructorname" ).hide();
}

   });



 $('#instructorname').on('change', function() {

   
     
     if($(this).val()> 0){
        
        $(".assignbtn" ).show();
     } 

   });

</script>

