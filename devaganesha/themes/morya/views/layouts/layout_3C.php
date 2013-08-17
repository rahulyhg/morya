<?php get_header(); ?>
<div class="row-fluid mt10">
 <div class="span3">
	<div class="top-widget">
		<div class="title-bar">Categories</div>
		<div class="side-menu">&raquo; <a href="">Aarti</a></div>
		<div class="side-menu">&raquo; <a href="">Mantra</a></div>
		<div class="side-menu">&raquo; <a href="">Atharva Shirsha in english</a></div>
		<div class="side-menu">&raquo; <a href="">Atharva Shirsha in marathi</a></div>
		<div class="side-menu">&raquo; <a href="">All 108 names of ganesha</a></div>
	</div>
	<div class="top-widget mt10">
		<div class="title-bar">Ganesha Treat</div>
		<div class="side-menu">&raquo; <a href="">Aarti</a></div>
		<div class="side-menu">&raquo; <a href="">Mantra</a></div>
	</div>
 </div>
 <div class="span6">
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