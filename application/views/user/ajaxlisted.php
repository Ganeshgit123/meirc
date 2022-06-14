<div class="container">
<div class="row">
<div class="col-md-12 text-center">
	 

<h2 id="heading"><?php  if(!empty($category_type)){ echo $category_type .' - ';} ?> <?php echo $category_name ?></h2>

</div>
</div>
</div>
<br/>

<div class="row">
<?php echo $this->ajax_pagination->show_links(); ?> 
</div>


<div class="tutor-courses-wrap row">




<?php if(!empty($posts)): foreach ($posts as $value) { ?>




<div class="col-lg-3 col-sm-6 course-single-wrap archive-course2">
<div class="single-course mb-30">
<div class="tutor-course-header">
<div class="course-thumbnail">
<?php if($selectedtype !=''){ ?>

	<a href="<?php echo base_url()?>user/details/<?php echo $value['id'].'?type='.$selectedtype ?>">

<?php }else{ ?>
<a href="<?php echo base_url()?>user/details/<?php echo $value['id'] ?>">

<?php } ?>
<!-- <a href="<?php echo base_url()?>user/details/<?php echo $value['id'].'?type=public' ?>"> -->

<?php if(!empty( $value['cat_icon'])){ ?>
<p class="text-center">
<img   class="cat_img" src="<?php echo base_url().'uploads/images/'. $value['cat_icon'];?>" style="background-color:<?php echo $value['icon_bg_color'] ?> "></p>


	<?php }else{ ?>

	 <i class="fas fa-book" ></i>
	<?php }
	?>

</a>
</div>
<div class="course-price-item">
<!-- 
<div class="tutor-course-loop-price">
<div class="price"> <span class="amount">Free</span><div  class="tutor-loop-cart-btn-wrap"><a href="https://yellostack.com/meric-saudi-arabia/courses/accident-incident-investigation-root-cause-analysis/">Get Enrolled</a></div></div></div> -->
<!-- <div class="tutor-course-loop-price">

<?php if($value['price']>0){ ?>
<div class="course-price"> <span class="amount"><?php echo $value['price']?> SAR</span></div> 

<?php 
} ?>


          </div> -->

</div>
<div class="course-category">
                       <!--  <a href='../course-category/classroom-training/index.html'><?php echo $value['type']?></a>   -->                                                
            </div>
<h3 class="ts-course-el-title">
<!-- <a href="<?php echo base_url()?>user/details/<?php echo $value['id'] ?>">
 -->
<?php   if($selectedtype !=''){ ?>

	<a href="<?php echo base_url()?>user/details/<?php echo $value['id'].'?type='.$selectedtype ?>">

<?php }else{ ?>
<a href="<?php echo base_url()?>user/details/<?php echo $value['id'] ?>">

<?php } ?>



<?php $session = $this->session->userdata('language');

if($session =='Arabic')
{  
	if(!empty($this->Admin_model->get_type_name_by_id('courses','id', $value['course_id']  , 'program_title_arabic')))
	{
	echo  $this->Admin_model->get_type_name_by_id('courses','id', $value['course_id']  , 'program_title_arabic') ;
	} 
	else{
		
		echo $this->Admin_model->get_type_name_by_id('courses','id', $value['course_id'] , 'product_name') ;	
	}
	} 
else
{
	echo $this->Admin_model->get_type_name_by_id('courses','id', $value['course_id'] , 'product_name') ;
}	
?>




<!-- <?php echo $this->Admin_model->get_type_name_by_id('courses','id', $value['course_id'] , 'product_name') ; ?>        
-->
 <!-- <?php  if(!empty($this->Admin_model->get_type_name_by_id('courses','id', $value['course_id']  , 'program_title_arabic'))){

	echo ' / '. $this->Admin_model->get_type_name_by_id('courses','id', $value['course_id']  , 'program_title_arabic') ;

} ; ?>  -->                                        </a>
</h3>
</div>
<div class="border-bar"></div>
<div class="course-footer">
<div class="xs-ratting-content">
<div class="tutor-loop-rating-wrap">
<?php echo $this->Admin_model->translate("Scheduled Dates") ?> <br/>
<!-- <?php 

if(!empty($value['coursedate'])){
	$coursedates = explode(',', $value['coursedate']) ;
		sort($coursedates);
	foreach ($coursedates as $datevalue) {
		echo date("d-M-y", strtotime($datevalue)) .'<br/>' ;
	}
} 
	
 ?> -->  



<!-- <?php echo date("d-M-y", strtotime($value['start_date'])) ?> <br/>
<?php echo $value['time']?> <br/>
<?php echo $value['location']?> -->

<!--  <div class="tutor-star-rating-group"><i class="tutor-icon-star-line" data-rating-value="1"></i><i class="tutor-icon-star-line" data-rating-value="2"></i><i class="tutor-icon-star-line" data-rating-value="3"></i><i class="tutor-icon-star-line" data-rating-value="4"></i><i class="tutor-icon-star-line" data-rating-value="5"></i><div class='tutor-rating-gen-input'><input type='hidden' name='tutor_rating_gen_input' value='0' /> </div></div> -->

                    </div>
</div><!-- ratting end --> 
<div class="price-btn">

	<?php if($selectedtype !=''){ ?>

	<!-- <a href="<?php echo base_url()?>user/details/<?php echo $value['id'].'?type='.$selectedtype ?>"> -->

		<a href="<?php echo base_url()?>user/details/<?php echo $value['id'] .'?type='.$selectedtype ?>" style="background-color:<?php echo $value['icon_bg_color'] ?>" class="btn-link">
<i class="tsicon tsicon-right_arrow"></i>
</a>



<?php }else{ ?>
<a href="<?php echo base_url()?>user/details/<?php echo $value['id'] ?>" style="background-color:<?php echo $value['icon_bg_color'] ?>" class="btn-link">
<i class="tsicon tsicon-right_arrow"></i>
</a>

<?php } ?>




</div>
</div>
</div>
</div>

<?php  }  ?>  

<?php else: ?>
<p><?php echo $this->Admin_model->translate("No results.") ?></p>
<?php endif; ?>


</div>

<div class="tutor-pagination-wrap">


<?php echo $this->ajax_pagination->create_links(); ?>

<!-- <span aria-current="page" class="page-numbers current">1</span>
<a class="page-numbers" href="page/2/index.html">2</a>
<a class="page-numbers" href="page/3/index.html">3</a>
<span class="page-numbers dots">&hellip;</span>
<a class="page-numbers" href="page/6/index.html">6</a>
<a class="next page-numbers" href="page/2/index.html">Next &raquo;</a> -->

</div>
