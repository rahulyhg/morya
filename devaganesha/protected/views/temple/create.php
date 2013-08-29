<?php
$this->breadcrumbs=array(
	TempleType::$heading[$templeType]=>array('index','type'=>$model->type),
	'Create',
);
$this->setPageTitle('Add '.TempleType::$heading[$templeType]);
Yii::app()->clientScript->registerMetaTag('Get all the Temples Mandals information.', 'description');
?>

<div class="title-head">Add <?php echo TempleType::$heading[$templeType];?></div>
<hr/>
<?php echo $this->renderPartial('_form', array('model'=>$model,'templeType'=>$templeType)); ?>