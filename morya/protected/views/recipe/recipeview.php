<?php
$this->breadcrumbs=array(
	'Recipes'=>array('index'),
	$model->title,
);

?>

<div class="mid-region">
    <div class="tab">&nbsp;Recipe of <?php echo $model->title;?></div>

    <div class="cont-disp">
        <div><strong>Ingradients :</strong> <?php echo $model->ingredients; ?></div>
        <div><strong>Cooking Time :</strong> <?php echo $model->cooking_time ?></div>
        <div><strong> Method :</strong></div>
        <div><p><?php echo $model->method; ?></p></div>
    </div>

</div>
<div>
<div class="tab">Get More Recipes Here</div>
    <?php
foreach($elements as $element){
    ?>
    <div><?php echo CHtml::link($element->title,array('recipe/recipeview','rec_title'=>$element->slug));?></div>
    <?php } ?>
</div>




<?php /*$this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'title',
		'cooking_time',
		'ingredients',
		'method',
	),
)); */?>
