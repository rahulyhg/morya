<?php
$this->breadcrumbs=array(
	'Temples'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Temple', 'url'=>array('index')),
	array('label'=>'Create Temple', 'url'=>array('create')),
	array('label'=>'View Temple', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Temple', 'url'=>array('admin')),
);
?>

<h1>Update Temple <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>