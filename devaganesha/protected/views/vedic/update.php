<?php
$this->breadcrumbs=array(
	VedicType::$heading[$model->type]=>array('vedic','type'=>$model->type),
	$model->title=>array('vedicview','slug'=>$model->slug),
	'Update',
);

?>

<div class="title-bar">Edit <?php echo $model->title;?></div>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>