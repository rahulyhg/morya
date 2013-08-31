<?php
$this->breadcrumbs=array(
	 MahimaType::$heading[$model->type]=>array('index','type'=>$model->type),
	$model->title=>array('expview','slug'=>$model->slug),
	'Edit',
);
$this->setPageTitle('Edit - '.$model->name);
Yii::app()->clientScript->registerMetaTag('See what are the experiences of people with ganesha and share your experince also. Make a wish to ganesha.');
?>

<div class="title-head">Edit - <?php echo $model->title;?></div> 
<hr/>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>