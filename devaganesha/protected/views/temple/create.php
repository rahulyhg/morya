<?php
$this->breadcrumbs=array(
	TempleType::$heading[$model->type]=>array('index','type'=>$model->type),
	'Create',
);

?>

<div class="title-head">Add <?php echo TempleType::$heading[$templeType];?></div>
<hr/>
<?php echo $this->renderPartial('_form', array('model'=>$model,'templeType'=>$templeType)); ?>