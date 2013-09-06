<?php
$this->breadcrumbs=array(
	VedicType::$heading[$model->type]=>array('vedic','type'=>$model->type),
	$model->title=>array('vedicview','slug'=>$model->slug),
	'Edit',
);
$this->setPageTitle('Edit - '.$model->title);
Yii::app()->clientScript->registerMetaTag('Get all the Aarti Mantra Shlokas for Ganesh Utsav.', 'description');
?>

<div style="text-align:center;">
<div class="btm-border">
	<h2 class="page-head">Edit <?php echo $model->title;?></h2>
</div>
</div>
<hr/>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>