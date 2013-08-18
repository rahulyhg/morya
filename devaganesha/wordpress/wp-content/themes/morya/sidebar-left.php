<?php 
/**
 * Template Name: Left Sidebar Template
 * Description: A Page Template that adds a sidebar to pages
 *
 * @package WordPress
 */
?>
<div class="span3">

	
		<?php //dynamic_sidebar( 'sidebar-1' ); ?>

<?php Yii::app()->controller->widget('LeftSidebar',array('option'=>Yii::app()->controller->getUniqueId())); ?>
	
</div>