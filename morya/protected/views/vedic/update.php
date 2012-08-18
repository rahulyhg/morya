<?php
$this->breadcrumbs=array(
	'Vedics'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Vedic', 'url'=>array('index')),
	array('label'=>'Create Vedic', 'url'=>array('create')),
	array('label'=>'View Vedic', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Vedic', 'url'=>array('admin')),
);
?>

<h1>Update Vedic <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>