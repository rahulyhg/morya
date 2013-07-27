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

        <div class="fnt24"><a href="<?php echo Yii::app()->createUrl('recipe/recipeview',array('rec_title'=>$recipe->slug))?>"><?php echo $recipe->title; ?></a></div>
 
        <div class="mt10"><strong>Posted on : <?php echo $recipe->node->created; ?> | author : <?php echo $recipe->node->creator->name; ?></strong></div>

        <div class="mt10">
		<?php 
		if(isset($recipe->rec_pic->file_name) && $recipe->rec_pic->file_name != '')
		{
			$recimg = PhotoType::$relativeFolderName[PhotoType::Screen].$recipe->rec_pic->file_name;
		}else{
			$recimg = get_template_directory_uri()."/img/recipe_noimg.jpg";
		}
		
		?>
		<img src="<?php echo $recimg; ?>" height="200px" width="200px" class="fl mr10"/>
			<p><strong>Ingradients :</strong></p>
            <p><?php echo $recipe->ingredients; ?></p>
        </div>
		<div class="clear"></div>
		<div class="mt10"><strong> Cooking Time :</strong><?php echo $recipe->cooking_time;?></div>
        <div class="mt10"><strong> Method :</strong></div>
        <div><p><?php echo $recipe->method; ?></p></div>
		<div class="mb10"><span> <a href="<?php echo Yii::app()->createUrl('recipe/recipeview',array('rec_title'=>$recipe->slug))?>">Leave reply </a></span>
		   <?php if($recipe->node->user_id == Yii::app()->user->id){?>
			<span>&nbsp;|&nbsp;<a href="<?php echo Yii::app()->createUrl('recipe/update',array('id'=>$recipe->id));?>">Edit</a></span>
		   <?php } ?>
		   </div>
		
        <div class="clear"></div>


    </div>
    <?php }?>



