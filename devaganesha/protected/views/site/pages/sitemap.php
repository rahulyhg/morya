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
	<div>
		<div><a href="<?php echo Yii::app()->createUrl('vedic/vedic',array('type'=>VedicType::Aarti));?>">Aarti</a></div>
		<div><a href="<?php echo Yii::app()->createUrl('vedic/vedic',array('type'=>VedicType::Mantra));?>">Mantra</a></div>
		<div><a href="">108 names of lord ganesha</a></div>
		<div><a href="">Pooja vidhi</a></div>
	</div>
</div>
<div class="span3">
	<div class="title-bar">Temples</div>
	<div>
		<div><a href="<?php echo Yii::app()->createUrl('temple/index',array('type'=>TempleType::Temple));?>">Temples</a></div>
		<div><a href="<?php echo Yii::app()->createUrl('temple/index',array('type'=>TempleType::Mandal));?>">Mandals</a></div>
	</div>
</div>
<div class="span3">
	<div class="title-bar">Recipes</div>
	<div>
		<div><a href="<?php echo Yii::app()->createUrl('recipe/index',array('type'=>RecipeType::Prasad)); ?>">Prasad recipe</a></div>
		<div><a href="<?php echo Yii::app()->createUrl('recipe/index',array('type'=>RecipeType::Naivaidya)); ?>">Naivaidya recipe</a></div>
		<div><a href="<?php echo Yii::app()->createUrl('recipe/index',array('type'=>RecipeType::Diabetic)); ?>">Recipe's for diabetic patients</a></div>
	</div>
</div>
<div class="span3">
	<div class="title-bar">Ganesh Mahima</div>
	<div>
		<div><a href="<?php echo Yii::app()->createUrl('experience/index',array('type'=>MahimaType::Experience));?>">Experiences</a></div>
		<div><a href="<?php echo Yii::app()->createUrl('experience/index',array('type'=>MahimaType::Wish));?>">Wishes to ganesha</a></div>
		<div><a href="<?php echo Yii::app()->createUrl('experience/create',array('type'=>MahimaType::Experience));?>">Share your experience</a></div>
		<div><a href="<?php echo Yii::app()->createUrl('experience/create',array('type'=>MahimaType::Wish));?>">Ask a wish</a></div>
	
	</div>
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
	<div>
		<div><a href="https://www.facebook.com/ohmyganesha" target="_blank">www.facebook.com/ohmyganesha</a></div>
		<div><a href="https://twitter.com/devaganeshacom" target="_blank">www.twitter.com/devaganeshacom</a></div>
		<div><a href="http://pinterest.com/devaganesha" target="_blank">www.pinterest.com/devaganesha</a></div>
		<div><a href="<?php echo get_page_link(99);?>" target="_blank">www.devaganesha.com/blog</a></div>
	</div>
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