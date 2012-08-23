<?php
$this->breadcrumbs=array(
	'Temples'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Temple', 'url'=>array('index')),
	array('label'=>'Create Temple', 'url'=>array('create')),
	array('label'=>'Update Temple', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Temple', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Temple', 'url'=>array('admin')),
);
?>

<h1>View Temple #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'slug',
		'name',
		'description',
		'established',
		'how_to_go',
		'history',
		'user_id',
		'created',
		'modified',
	),
)); ?>
