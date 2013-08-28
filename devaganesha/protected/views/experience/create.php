<?php
$this->breadcrumbs=array(
	MahimaType::$heading[$type]=>array('index','type'=>$type),
	'Create',
);

$this->menu=array(
	array('label'=>'Experience', 'url'=>array('index')),
);
?>

<div class="title-bar"><?php echo MahimaType::$heading[$type]; ?></div>

<?php echo $this->renderPartial('_form', array('model'=>$model,'type'=>$type)); ?>