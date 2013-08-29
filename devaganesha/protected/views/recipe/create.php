<?php
$this->breadcrumbs=array(
	'Recipes'=>array('index'),
	'Create',
);
$this->setPageTitle('Add new recipe');
Yii::app()->clientScript->registerMetaTag('Get all the Recipes for ganesh Utsav. Recipes for prasad Naivaidya. Ganeshas favourites. Sugerless recipes.', 'description');
?>

<div class="title-head">Add recipe</div>
<hr/>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>