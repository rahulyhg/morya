<?php
$this->breadcrumbs=array(
	'Recipes',
);

?>

<div class="mid-region">
<div class="tab">Recipe's</div>
<div><?php echo CHtml::link('Add your Recipe Here',array('create'));?></div>
<?php foreach($elementsList as $recipe){?>
<div>

<div class="title_bar"><?php echo $recipe->title; ?></div>
<div>Ingradients : <?php echo $recipe->ingredients; ?></div>
<div>Method : <?php echo $recipe->method; ?></div>


<?php /*$this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); */
//print_r($recipe);
?>


</div>
<?php }?>
</div>
<div>
<h3>Go to more recipes<h3>
<?php foreach($elementsList as $recipe){?>
<div><?php echo CHtml::link($recipe->title,array('Recipeview','rec_title'=>$recipe->slug));?></div>
<?php } ?>
</div>

