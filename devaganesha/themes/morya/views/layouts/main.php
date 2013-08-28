<?php get_header(); ?>
 <?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>
        <?php
             // echos Yii content
             echo $content;
        ?>
 
<?php get_footer(); ?>