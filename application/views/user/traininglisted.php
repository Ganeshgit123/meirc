<div class="container">
<div class="row">
<div class="col-md-12 text-center">
	 
<!-- 
<h2 id="heading"><?php  if(!empty($category_type)){ echo $category_type .' - ';} ?> <?php echo $category_name ?></h2>
 -->
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
  <a href="<?php echo base_url()?>user/details/<?php echo $value['id'] ?>">

  <i class="fas fa-book" ></i>

</a>
</div>
<div class="course-price-item">
 

</div>
<div class="course-category">
                       <!--  <a href='../course-category/classroom-training/index.html'><?php echo $value['type']?></a>   -->                                                
            </div>
<h3 class="ts-course-el-title">
<!-- <a href="<?php echo base_url()?>user/details/<?php echo $value['id'] ?>">
 -->
 <a href="<?php echo base_url()?>user/trainingdetails/<?php echo $value['id'] ?>">




<?php $session = $this->session->userdata('language');

if($session =='Arabic')
{  
	 echo $value['ar_training_name'] ;
	} 
else
{
	echo $value['training_name'] ;
}	
?>


 
</h3>
</div>
<div class="border-bar"></div>
<div class="course-footer">
<div class="xs-ratting-content">
<div class="tutor-loop-rating-wrap">
 
                    </div>
</div><!-- ratting end --> 
<div class="price-btn">

 




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
