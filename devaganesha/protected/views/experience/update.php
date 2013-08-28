<?php
$this->breadcrumbs=array(
	 MahimaType::$heading[$model->type]=>array('index','type'=>$model->type),
	$model->title=>array('expview','slug'=>$model->slug),
	'Update',
);

$this->menu=array(
	array('label'=>'List Experience', 'url'=>array('index')),
	array('label'=>'Create Experience', 'url'=>array('create')),
	array('label'=>'View Experience', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Experience', 'url'=>array('admin')),
);
?>

<div class="title-bar">Edit - <?php echo $model->title;?></div> 

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>