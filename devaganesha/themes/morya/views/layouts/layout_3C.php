<?php get_header(); ?>
<div class="row-fluid mt10">
 <div class="span3">
	<?php Yii::app()->controller->widget('LeftSidebar',array('option'=>Yii::app()->controller->getUniqueId())); ?>
 </div>

 <div class="span6">
  	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,

		)); ?><!-- breadcrumbs -->

	<?php endif?>
        <?php
             // echos Yii content
             echo $content;
        ?>
 </div>
  <div class="span3">
	<?php Yii::app()->controller->widget('RightSidebar'); ?>
</div>
 </div>
<?php get_footer(); ?>