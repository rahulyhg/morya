<?php
$this->breadcrumbs=array(
	'Recipes'=>array('index'),
	$model->title,
);

?>

<h1>Recipe of<?php echo $model->title; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'title',
		'cooking_time',
		'ingredients',
		'method',
	),
)); ?>
