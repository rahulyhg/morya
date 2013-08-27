<?php
$this->breadcrumbs=array(
	'Recipes'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

?>

<div class="title-bar">Edit recipe - <?php echo $model->title; ?></div>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>