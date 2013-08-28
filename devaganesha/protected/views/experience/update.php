<?php
$this->breadcrumbs=array(
	 MahimaType::$heading[$model->type]=>array('index','type'=>$model->type),
	$model->title=>array('expview','slug'=>$model->slug),
	'Update',
);
?>

<div class="title-head">Edit - <?php echo $model->title;?></div> 
<hr/>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>