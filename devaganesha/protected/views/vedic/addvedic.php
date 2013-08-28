<?php
$this->breadcrumbs=array(
    VedicType::$heading[$vedicType] => array('vedic','type'=>$vedicType),
	'add'
);

?>

<div class="title-head">Add <?php echo VedicType::$heading[$vedicType];?></div>
<hr/>
<?php echo $this->renderPartial('_form', array('model'=>$model ,'vedicType'=>$vedicType)); ?>