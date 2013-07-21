<div style="float:left;">
    <div id="modak-rating">
	<?php
		$this->widget('CStarRating',array(
		'model'=> $modaks,
		'attribute' => 'rating',
		'name' => 'modaks',
		'value'=>5,
		'minRating' => 1,
		'maxRating' => 5,
		'readOnly'=>false,
		'allowEmpty' => false,
		'callback'=>'
        function(){
			if(app.user.isAuthenticated)
			{
                $.ajax({
                    type: "POST",
                    url: "'.Yii::app()->createUrl('photo/rate',array('node_id'=>$photo->node_id)).'",
                    data: "rating=" + $(this).val(),
                    success: function(msg){
                                //$("#result").html(msg);
                        }})
			}
			else{
			$("a#signup").trigger("click");
                  return false;
			}
			}'
	));?>
	</div>
	<img style="width:<?php echo PhotoType::$dimension[PhotoType::Screen]['width'] ?>;" src="<?php echo PhotoType::$relativeFolderName[PhotoType::Screen].$photo->file_name ?>" />
    <div class="caption"><?php echo $photo->caption ?></div>
    <p style="font-size:12px "><em>By: </em><a class="photo_uploader_name"><?php echo $photo->node->creator->name ?></a></p>
	
</div>


	<?php $this->beginClip('js-page-end'); ?>
	
            <script type="text/javascript">
			</script>
	<?php $this->endClip(); ?>

<div id="comments">
    <?php
    foreach($photo->node->comments as $comment){
        $this->renderPartial('//comment/view',array('comment'=>$comment));
    }
    ?>
<?php $this->renderPartial('//comment/create',array('comment'=>$newComment)); ?>
</div>