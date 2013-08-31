<?php
$this->breadcrumbs=array(
	VedicType::$heading[$model->type]=>array('vedic','type'=>$model->type),
	$model->title=>array('vedicview','slug'=>$model->slug),
	'Edit',
);
$this->setPageTitle('Edit - '.$model->title);
Yii::app()->clientScript->registerMetaTag('Get all the Aarti Mantra Shlokas for Ganesh Utsav.', 'description');
?>

<div class="title-head">Edit <?php echo $model->title;?></div>
<hr/>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>