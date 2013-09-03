<?php
$this->breadcrumbs=array(
	'Competitions'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List Competition', 'url'=>array('index')),
	array('label'=>'Create Competition', 'url'=>array('create')),
	array('label'=>'Update Competition', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Competition', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Competition', 'url'=>array('admin')),
);
?>

<h1>View Competition #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'slug',
		'title',
		'type',
		'description',
		'instructions',
		'prizes',
		'organiser',
		'contact',
		'email',
		'address',
		'start_date',
		'end_date',
		'user_id',
		'created',
		'modified',
		'status',
		'winner_ann_date',
	),
)); ?>
