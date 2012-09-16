<?php
$this->breadcrumbs=array(
	'Recipes',
);
$this->menu=array(
    array('label'=>'Ganesh Mahima / Experience', 'url'=>array('/experience/index')),
);
?>

<div class="mid-region">
    <div class="tab">&nbsp;Recipe's</div>
    <div><?php echo CHtml::link('Add your Recipe Here',array('create'));?></div>
    <?php foreach($elementsList as $recipe){
    $user_name = User::model()->findByPk($recipe->user_id);
    //$pri_pic = Photo::model()->findByPk($recipe->primary_pic);
    ?>
    <div class="cont-disp">

        <div class="title_head"><a href="<?php echo Yii::app()->createUrl('recipe/recipeview',array('rec_title'=>$recipe->slug))?>"><?php echo $recipe->title; ?></a></div>

        <div><div style="float: left;width:85px;"><strong>Ingradients :</strong></div>
            <div style="float: left;"><?php echo $recipe->ingredients; ?></div>
        </div>
        <div class="clear"></div>
        <div><strong> Method :</strong></div>
        <div><p><?php echo $recipe->method; ?></p></div>
        <div style="float: right;text-decoration: none;">Posted By : <a href="#"><?php echo $user_name->name;?></a></div>
        <div class="clear"></div>

        <?php /*$this->widget('zii.widgets.CListView', array(
        'dataProvider'=>$dataProvider,
        'itemView'=>'_view',
    )); */
        //print_r($recipe);
        ?>


    </div>
    <?php }?>
</div>


