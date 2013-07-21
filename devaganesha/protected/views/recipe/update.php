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

<h1>Update recipe <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>