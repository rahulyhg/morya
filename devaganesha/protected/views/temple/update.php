<?php
$this->breadcrumbs=array(
	TempleType::$heading[$model->type]=>array('index','type'=>$model->type),
	$model->name=>array('templeview','slug'=>$model->slug),
	'Update',
);

?>

<div class="title-head">Edit <?php echo $model->name; ?></div>
<hr/>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>