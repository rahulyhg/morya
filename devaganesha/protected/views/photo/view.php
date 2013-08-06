
        <?php $this->widget('ext.EAjaxUpload.EAjaxUpload',
        array(
            'id'=>'uploadFile',
            'config'=>array(
                'action'=>Yii::app()->createUrl('photo/postUpload',array('type'=>PhotoUploadCategory::Normal)),
                'allowedExtensions'=>array("jpg","jpeg","gif"),//array("jpg","jpeg","gif","exe","mov" and etc...
                'sizeLimit'=>10*1024*1024,// maximum file size in bytes
                'minSizeLimit'=>10,// minimum file size in bytes
                       'onComplete'=>"js:function(id,filename,response){
                                    fileUploadComplete(id,filename,response);
                            }",
                    'onUpload'=>"js:function(id,fileName){
                                fileUploadBegin(id,fileName);
                            }",
                'uploadButtonText'=>'Drop Your Ganesha`s Photoes Here to Upload. ',
                'messages'=>array(
                    'typeError'=>"{file} has invalid extension. Only {extensions} are allowed.",
                    'sizeError'=>"{file} is too large, maximum file size is {sizeLimit}.",
                    'minSizeError'=>"{file} is too small, minimum file size is {minSizeLimit}.",
                    'emptyError'=>"{file} is empty, please select files again without it.",
                    'onLeave'=>"The files are being uploaded, if you leave now the upload will be cancelled."
                ),
                'showMessage'=>"js:function(message){ alert(message); }"
            )
        )); ?>
<div class="row-fluid mt10">
<div class="span6">
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
	<div class="mt10">
	<img style="width:<?php echo PhotoType::$dimension[PhotoType::Screen]['width'] ?>;" src="<?php echo PhotoType::$relativeFolderName[PhotoType::Screen].$photo->file_name ?>" /></div>
    <div class="caption"><?php echo $photo->original_name; ?></div>
    <p style="font-size:12px "><em>Posted By: </em><a class="photo_uploader_name"><?php echo $photo->node->creator->name ?></a></p>
	<p>View : <?php echo $novisit;?></p>
	


	<?php $this->beginClip('js-page-end'); ?>
	
            <script type="text/javascript">
			</script>
	<?php $this->endClip(); ?>

</div>
	<div class="span6">
		<div id="comments">
			<?php
			foreach($photo->node->comments as $comment){
				$this->renderPartial('//comment/view',array('comment'=>$comment));
			}
			?>
		<?php $this->renderPartial('//comment/create',array('comment'=>$newComment)); ?>
		</div>
		<div class="mt10"><h3>See more :</h3></div>
		<div class="am-container mt10 photo-more" id="am-container">
		 <?php foreach($elementsList as $photo){ ?>
				<a href="<?php echo Yii::app()->createUrl('photo/view',array('slug'=>$photo->slug)) ?>"><img src="<?php echo PhotoType::$relativeFolderName[PhotoType::Thumb] . $photo->file_name ;?>" alt=""></a>
		  <?php } ?>
			</div>
	</div>

</div>
