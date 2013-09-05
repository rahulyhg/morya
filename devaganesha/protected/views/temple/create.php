<?php
$this->breadcrumbs=array(
	TempleType::$heading[$templeType]=>array('index','type'=>$model->type),
	'Create',
);
$this->setPageTitle('Add '.TempleType::$heading[$templeType]);
Yii::app()->clientScript->registerMetaTag('Get all the Temples Mandals information.', 'description');
?>


<div style="text-align:center;">
<div class="btm-border">
	<h2 class="page-head">Add <?php echo TempleType::$heading[$templeType];?></h2>
</div>
</div>
<hr/>
<?php echo $this->renderPartial('_form', array('model'=>$model,'templeType'=>$templeType,'maparr'=>$maparr)); ?>