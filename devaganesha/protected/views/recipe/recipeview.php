<?php
$this->breadcrumbs=array(
	'Recipes'=>array('index'),
	$model->title,
);
$this->menu=array(
    array('label'=>'Recipes', 'url'=>array('index')),
    array('label'=>'Add Your Recipes', 'url'=>array('create')),
    array('label'=>'Ganesh Mahima / Experience', 'url'=>array('/experience/index')),
);
?>

    <div class="title-bar">&nbsp;Recipe of <?php echo $model->title;?></div>

 <div class="mt10">Posted on : <?php echo $model->node->created; ?> | author : <?php //echo $vedic->user->name; ?></div>
 <div>
	<?php if($model->node->user_id == Yii::app()->user->id){?>
			<span><a href="<?php echo Yii::app()->createUrl('recipe/update',array('id'=>$model->id));?>">Edit</a></span>
		   <?php } ?>
	</div>
  <div class="mt10">
		<?php 
		if(isset($model->rec_pic->file_name) && $model->rec_pic->file_name != '')
		{
			$recimg = PhotoType::$relativeFolderName[PhotoType::Screen].$model->rec_pic->file_name;
		}else{
			$recimg = get_template_directory_uri()."/img/recipe_noimg.jpg";
		}
		
		?>
		<img src="<?php echo $recimg; ?>" height="200px" width="200px" class="fl mr10"/>
			<p><strong>Ingradients :</strong></p>
            <p><?php echo $model->ingredients; ?></p>
        </div>
		<div class="clear"></div>
		<div class="mt10"><strong> Cooking Time :</strong><?php echo $model->cooking_time;?></div>
        <div class="mt10"><strong> Method :</strong></div>
        <div><p><?php echo $model->method; ?></p></div>
		
		<div class="mt20"><a href="<?php echo Yii::app()->createUrl('recipe/index');?>">Back to  All</a></div>


