<?php
$this->breadcrumbs=array(
	'Recipes'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List recipe', 'url'=>array('index')),
	array('label'=>'Create recipe', 'url'=>array('create')),
	array('label'=>'Update recipe', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete recipe', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage recipe', 'url'=>array('admin')),
);
?>

<h1>View recipe #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'slug',
		'title',
		'cooking_time',
		'ingredients',
		'method',
		'created',
		'modified',
	),
)); ?>
