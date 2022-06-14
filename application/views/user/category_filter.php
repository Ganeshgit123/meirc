<div class="archive-category-filter-area archive-widgets single-filter" id = "categoryselect" >
<h3 class="widget-title"><?php echo $this->Admin_model->translate("Category") ?></h3>



<div class="tutor-archive-single-cat">


<?php foreach($categories as $category) : ?>           
<div class="row">
<div class="col-2 col-md-2">
<input class="checkcategory"
type="radio"
id="id_<?php echo  $category['id'] ?>"
name="course_category[]"
value="<?php echo  $category['id'] ?>"   >
</div>
<div class="col-10 col-md-9">

<label for="cat-in-house-training">  
<span class="filter-checkbox"></span>
<?php echo  $category['category_name'] ?>                                                                               </label>

</div>
</div>
<?php endforeach ; ?>
</div>


</div>

<script type="text/javascript">
	jQuery("#categoryselect .checkcategory").on('click', function(e){


 
	//alert("category");

	searchFilter();

	var category = $(this).val() ;

	//jQuery("#categoryid" ).html(category);   

	// jQuery.ajax({ 
  //       type: "POST",
  //         url : '<?php echo base_url() ?>'+"user/getsubcat",
            
  //          data: {'category_id': category},
  //   }).done(function(response){    
  //   jQuery( "#subcategory" ).html(response);       
  //   });


});



</script>