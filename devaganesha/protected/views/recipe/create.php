<?php
$this->breadcrumbs=array(
	'Recipes'=>array('index'),
	'Create',
);
$this->setPageTitle('Add new recipe');
Yii::app()->clientScript->registerMetaTag('Get all the Recipes for ganesh Utsav. Recipes for prasad Naivaidya. Ganeshas favourites. Sugerless recipes.', 'description');
?>

<div style="text-align:center;">
<div class="btm-border">
	<h2 class="page-head">Add Recipe</h2>
</div>
</div>
<hr/>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>