<?php
$this->breadcrumbs=array(
	'Recipes',
);
$this->menu=array(
    array('label'=>'Add Your Recipes', 'url'=>array('create')),
    array('label'=>'Ganesh Mahima / Experience', 'url'=>array('/experience/index')),
);
?>


    <div class="title-bar">&nbsp;Recipe's</div>
	<div class="btn"><?php echo CHtml::link("Add new recipe",array('create'));?></div>
    <?php foreach($elementsList as $recipe){
    //$user_name = User::model()->findByPk($recipe->user_id);
    //$pri_pic = Photo::model()->findByPk($recipe->primary_pic);
//echo $recipe->prime->file_name;
    ?>

    <div class="cont-disp">

        <div class="fnt24" style="text-align:center;"><a href="<?php echo Yii::app()->createUrl('recipe/recipeview',array('rec_title'=>$recipe->slug))?>"><?php echo $recipe->title; ?></a></div>
 
        <div class="fl pr5">
            <img src="<?php echo get_template_directory_uri(); ?>/img/recipe_noimg.jpg" height="250px" width="250px" />
        </div>
   
        <div class="fl"><div style="float: left;width:85px;"><strong>Ingradients :</strong></div>
            <div style="float: left;"><?php echo $recipe->ingredients; ?></div>
        </div>
		<div class="clear"></div>
        <div class="clear"></div>
        <div><strong> Method :</strong></div>
        <div><p><?php echo $recipe->method; ?></p></div>
        <div style="float: right;text-decoration: none;">Posted By : <a href="#"><?php echo $recipe->user->name;?></a></div>
        <div class="clear"></div>

        <?php /*$this->widget('zii.widgets.CListView', array(
        'dataProvider'=>$dataProvider,
        'itemView'=>'_view',
    )); */
        //print_r($recipe);
        ?>


    </div>
    <?php }?>



