
<div class="archive-category-filter-area archive-widgets single-filter" id = "subcategoryselect" >
<h3 class="widget-title">Sub Category</h3>



<div class="tutor-archive-single-cat">


<?php   foreach($subcategories as $subcat) : ?>           




<div class="row">
<div class="col-md-2">
<input class="checksubcategory"
type="checkbox"
name="course_subcategory[]"
value="<?php echo  $subcat['id'] ?>" <?php if( $subselected==$subcat['id']){ echo "checked" ;} ?>  >
</div>
<div class="col-md-10">
<label for="cat-in-house-training">  
<span class="filter-checkbox"></span>
<?php echo  $subcat['subcategory_name'] ?>
</label>
</div>
</div>
<?php endforeach ; ?>
</div>
</div>

<script type="text/javascript">
jQuery( document ).ready(function() {


var category = [];
var subcategory = [];
var type = [];

var page_num = 0 ;

jQuery("#categoryselect").find("input:checkbox:checked").each(function() {
// jQuery(this).checked = false ;
category.push(jQuery(this).val());
});


jQuery("#subcategoryselect").find("input:checkbox:checked").each(function() {
// jQuery(this).checked = false ;
subcategory.push(jQuery(this).val());
});

jQuery("#typeselect").find("input:checkbox:checked").each(function() {
// jQuery(this).checked = false ;
type.push( jQuery(this).val());
});

//var stypes = type.join(',').split(',');
var sortby = jQuery('#sortby').val();


jQuery.ajax({
type: 'POST',
url: '<?php echo base_url(); ?>user/ajaxlisted/'+page_num,
data:'page='+page_num+'&category='+category+'&subcategory='+subcategory+'&type='+type+'&sortby='+sortby,
beforeSend: function () {
jQuery('.loading').show();
},
success: function (html) {
jQuery('#postList').html(html);
jQuery('.loading').fadeOut("slow");
}
});


});


jQuery(".checksubcategory").on('click', function(e){

var category = [];
var subcategory = [];
var type = [];

var page_num = 0 ;

jQuery("#categoryselect").find("input:checkbox:checked").each(function() {
// jQuery(this).checked = false ;
category.push(jQuery(this).val());
});


jQuery("#subcategoryselect").find("input:checkbox:checked").each(function() {
// jQuery(this).checked = false ;
subcategory.push(jQuery(this).val());
});

jQuery("#typeselect").find("input:checkbox:checked").each(function() {
// jQuery(this).checked = false ;
type.push( jQuery(this).val());
});

//var stypes = type.join(',').split(',');
var sortby = jQuery('#sortby').val();


jQuery.ajax({
type: 'POST',
url: '<?php echo base_url(); ?>user/ajaxlisted/'+page_num,
data:'page='+page_num+'&category='+category+'&subcategory='+subcategory+'&type='+type+'&sortby='+sortby,
beforeSend: function () {
jQuery('.loading').show();
},
success: function (html) {
jQuery('#postList').html(html);
jQuery('.loading').fadeOut("slow");
}
});



});

</script>