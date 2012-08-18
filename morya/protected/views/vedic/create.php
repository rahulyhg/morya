<?php
$this->breadcrumbs=array(
	'Vedics'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Vedic', 'url'=>array('index')),
	array('label'=>'Manage Vedic', 'url'=>array('admin')),
);
?>

<h1>Create Vedic</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>