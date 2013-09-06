<?php
$this->breadcrumbs=array(
	MahimaType::$heading[$type]=>array('index','type'=>$type),
	'Create',
);

$this->setPageTitle('Add '.MahimaType::$heading[$type]);
Yii::app()->clientScript->registerMetaTag('Share your experinces about ganesha. Make a wish to ganesha. Gansha fullfills your wish');
?>

  <div style="text-align:center;">
<div class="btm-border">
	<h2 class="page-head"><?php echo MahimaType::$heading[$type]; ?></h2>
</div>
</div>
<hr/>
<?php echo $this->renderPartial('_form', array('model'=>$model,'type'=>$type)); ?>