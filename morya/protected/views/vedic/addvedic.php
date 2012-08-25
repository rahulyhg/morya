<?php
$this->breadcrumbs=array(
	'Vedics'=>array('index'),
	'addvedic',
);

?>

<h1>Add Your Vedic here</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model ,'vedicType'=>$vedicType)); ?>