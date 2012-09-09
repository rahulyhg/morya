<?php

$this->breadcrumbs=array(
    VedicType::$heading[$model->type]=>array('vedic',array('vedicType'=>$model->type)),
	$model->title,
);

?>

<h1><?php echo $model->title; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'name_of_god',
		'title',
		'text',
	),
)); ?>
