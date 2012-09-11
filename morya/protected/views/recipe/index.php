<?php
$this->breadcrumbs=array(
	'Recipes',
);

?>

<div class="mid-region">
    <div class="tab">&nbsp;Recipe's</div>
    <div><?php echo CHtml::link('Add your Recipe Here',array('create'));?></div>
    <?php foreach($elementsList as $recipe){?>
    <div class="cont-disp">

        <div class="title_head"><a href="<?php echo Yii::app()->createUrl('recipe/recipeview',array('rec_title'=>$recipe->slug))?>"><?php echo $recipe->title; ?></a></div>
        <div><strong>Ingradients :</strong> <?php echo $recipe->ingredients; ?></div>
        <div><strong> Method :</strong></div>
        <div><p><?php echo $recipe->method; ?></p></div>


        <?php /*$this->widget('zii.widgets.CListView', array(
        'dataProvider'=>$dataProvider,
        'itemView'=>'_view',
    )); */
        //print_r($recipe);
        ?>


    </div>
    <?php }?>
</div>


