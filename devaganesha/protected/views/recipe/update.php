<?php
$this->breadcrumbs=array(
	'Recipes'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List recipe', 'url'=>array('index')),
	array('label'=>'Create recipe', 'url'=>array('create')),
	array('label'=>'View recipe', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage recipe', 'url'=>array('admin')),
);
?>

<div class="title-bar">Edit recipe - <?php echo $model->title; ?></div>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>