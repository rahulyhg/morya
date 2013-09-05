<?php
$this->breadcrumbs=array(
	TempleType::$heading[$model->type]=>array('index','type'=>$model->type),
	$model->name=>array('templeview','slug'=>$model->slug),
	'Edit',
);
$this->setPageTitle('Edit - '.$model->name);
Yii::app()->clientScript->registerMetaTag('Get all the Temples Mandals information.', 'description');
?>

<div style="text-align:center;">
<div class="btm-border">
	<h2 class="page-head">Edit <?php echo $model->name;?></h2>
</div>
</div>
<hr/>
<?php echo $this->renderPartial('_form', array('model'=>$model,'maparr'=>$maparr)); ?>