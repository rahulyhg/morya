<?php
$this->breadcrumbs=array(
	'Temples'=>array('index'),
	$model->name,
);

?>

<h1><?php echo $model->name; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'name',
		'description',
		'established',
		'how_to_go',
		'history',
	),
)); ?>
