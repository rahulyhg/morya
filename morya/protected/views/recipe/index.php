<?php
$this->breadcrumbs=array(
	'Recipes',
);

?>
<div style="width:100%">
<div style="float:left width:70%">
<h1>Recipes</h1>

<?php foreach($elementsList as $recipe){?>
<div>
<div><?php echo CHtml::link('Add your Recipe Here',array('create'));?></div>
<div><?php echo $recipe->title; ?></div>
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
<div style="float:right width:30%">
<h3>Go to more recipes<h3>
<?php foreach($elementsList as $recipe){?>
<div><?php echo CHtml::link($recipe->title,array('Recipeview','rec_title'=>$recipe->slug));?></div>
<?php } ?>
</div>
</div>
