<?php
$this->breadcrumbs=array(
	'Vedics'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List Vedic', 'url'=>array('index')),
	array('label'=>'Create Vedic', 'url'=>array('create')),
	array('label'=>'Update Vedic', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Vedic', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Vedic', 'url'=>array('admin')),
);
?>

<h1>View Vedic #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'type',
		'name_of_god',
		'title',
		'slug',
		'text',
		'audio_path',
		'audio_length',
		'audio_size',
		'user_id',
		'created',
		'modified',
	),
)); ?>
