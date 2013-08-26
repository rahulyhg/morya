<?php
$this->breadcrumbs=array(
	'Experiences'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Experience', 'url'=>array('index')),
);
?>

<div class="title-bar"><?php echo MahimaType::$heading[$type]; ?></div>

<?php echo $this->renderPartial('_form', array('model'=>$model,'type'=>$type)); ?>