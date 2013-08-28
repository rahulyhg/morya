<?php
$this->breadcrumbs=array(
	MahimaType::$heading[$type]=>array('index','type'=>$type),
	'Create',
);

$this->menu=array(
	array('label'=>'Experience', 'url'=>array('index')),
);
?>

<div class="title-head"><?php echo MahimaType::$heading[$type]; ?></div>
<hr/>
<?php echo $this->renderPartial('_form', array('model'=>$model,'type'=>$type)); ?>