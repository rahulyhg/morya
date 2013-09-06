<?php
$this->breadcrumbs=array(
	'Recipes'=>array('index'),
	$model->title,
);
$this->setPageTitle($model->title);
Yii::app()->clientScript->registerMetaTag('Get all the Recipes for ganesh Utsav. Recipes for prasad Naivaidya. Ganeshas favourites. Sugerless recipes.', 'description');
?>

	<div style="text-align:center;">
<div class="btm-border">
	<h2 class="page-head"><?php echo $model->title;?></h2>
</div>
</div>

	<div class="mt10">
		<div class="addthis_toolbox addthis_default_style addthis_32x32_style fl">
			<a class="addthis_button_facebook"></a>
		<a class="addthis_button_twitter"></a>
		<a class="addthis_button_pinterest_share"></a>
		<a class="addthis_button_email"></a>
		<a class="addthis_button_compact"></a>
		<a class="addthis_counter addthis_bubble_style"></a>
		</div>
	<script type="text/javascript">var addthis_config = {"data_track_addressbar":false};</script>
	<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=xa-517d3bd171dee465"></script>
		<div class="fr">
			<div><strong>Posted on : <?php echo  date('d M, Y',strtotime($model->node->created)); ?></strong></div>
			<div><strong>author : <?php echo $model->node->creator->name; ?></strong></div>
		</div>
		<div class="clear"></div>
		</div>
	<hr/>
	<div class="mt10" style="text-align:center;">
		<?php 
		if(isset($model->rec_pic->file_name) && $model->rec_pic->file_name != '')
		{
			$recimg = PhotoType::$relativeFolderName[PhotoType::Thumb].$model->rec_pic->file_name;
		}else{
			$recimg = get_template_directory_uri()."/img/recipe_noimg.jpg";
		}
		
		?>
			<img src="<?php echo $recimg; ?>" style="margin:0 auto;" class="img-polaroid"/>
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


