<?php
$this->breadcrumbs=array(
    VedicType::$heading[$vedicType] => array('vedic','type'=>$vedicType),
	'add'
);
$this->setPageTitle('Add new '.VedicType::$heading[$vedicType]);
Yii::app()->clientScript->registerMetaTag('Get all the Aarti Mantra Shlokas for Ganesh Utsav.', 'description');
?>

<div class="title-head">Add <?php echo VedicType::$heading[$vedicType];?></div>
<hr/>
<?php echo $this->renderPartial('_form', array('model'=>$model ,'vedicType'=>$vedicType)); ?>