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

 <div class="mt10"><strong>Posted on : </strong><?php echo $model->node->created; ?><strong> | author : </strong><a href="<?php echo Yii::app()->createUrl('site/myganesha',array('id'=>$model->node->user_id));?>"><?php echo $model->node->creator->name; ?></a></div>
 <div>
	<?php if($model->node->user_id == Yii::app()->user->id){?>
			<span><a href="<?php echo Yii::app()->createUrl('recipe/update',array('id'=>$model->id));?>">Edit</a></span>
		   <?php } ?>
	</div>
	<div class="mt10" style="text-align:center;">
		<?php 
		if(isset($model->rec_pic->file_name) && $model->rec_pic->file_name != '')
		{
			$recimg = PhotoType::$relativeFolderName[PhotoType::Thumb].$model->rec_pic->file_name;
		}else{
			$recimg = get_template_directory_uri()."/img/recipe_noimg.jpg";
		}
		
		?>
			<img src="<?php echo $recimg; ?>" height="200px" width="200px" style="margin:0 auto;"/>
        </div>
		<div class="mt10">
			<p><strong>Ingradients :</strong></p>
            <p><?php echo html_entity_decode($model->ingredients, ENT_COMPAT, "UTF-8"); ?></p>
		</div>
		<div class="mt10"><strong> Cooking Time :</strong><?php echo $model->cooking_time;?> minutes</div>
        <div class="mt10"><strong> Method :</strong></div>
        <div><p><?php echo html_entity_decode($model->method, ENT_COMPAT, "UTF-8"); ?></p></div>
		
		<div class="mt20"><a href="<?php echo Yii::app()->createUrl('recipe/index');?>">Back to  All</a></div>

			<div id="comments">
			<div id="accordion" style="margin-bottom:10px !important;">
			
			<h3>Show comments</h3>
			<div class="single_comment">
			<?php
			if($model->node->comments){
				foreach($model->node->comments as $comment){
					$this->renderPartial('//comment/view',array('comment'=>$comment));
				}
			}else{
			echo "<p>Be the first one to give the comment.</p>";
			}
			?>
			</div>
			</div>
		<?php $this->renderPartial('//comment/create',array('comment'=>$newComment)); ?>
			
		</div>


