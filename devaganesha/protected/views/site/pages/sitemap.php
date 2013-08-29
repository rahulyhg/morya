<?php
/* @var $this SiteController */

$this->setPageTitle('Sitemap');
$this->breadcrumbs=array(
	'Sitemap',
);
?>
<div class="row-fluid">
<div class="title-head">Sitemap</div>
<hr/>
<div>
<div class="span3">
	<div class="title-bar">Ganesh Aarti, Mantra</div>
	<div></div>
</div>
<div class="span3">
	<div class="title-bar">Temples</div>
	<div></div>
</div>
<div class="span3">
	<div class="title-bar">Recipes</div>
	<div></div>
</div>
<div class="span3">
	<div class="title-bar">Ganesh Mahima</div>
	<div></div>
</div>
</div>
<div>
<div class="span3">
	<div class="title-bar">News</div>
	<div></div>
</div>
<div class="span3">
	<div class="title-bar">Blogs</div>
	<div></div>
</div>
<div class="span3">
<div class="title-bar">Social</div>
	<div></div>
</div>
<div class="span3">
<div class="title-bar">Feeds</div>
	<div>
	<div><a href="<?php echo Yii::app()->createUrl('site/page',array('view'=>'photo')); ?>" target="_blank">Photos feed</a></div>
	<div><a href="<?php echo Yii::app()->createUrl('site/page',array('view'=>'vedic')); ?>" target="_blank">Vedic feed</a></div>
	<div><a href="<?php echo Yii::app()->createUrl('site/page',array('view'=>'recipe')); ?>" target="_blank">recipe feed</a></div>
	<div><a href="<?php echo Yii::app()->createUrl('site/page',array('view'=>'temple')); ?>" target="_blank">temple feed</a></div>
	</div>
</div>
</div>
</div>