		<?php 	if(Yii::app()->user->isGuest){ ?>
				<div class="non-user-upld"><a href="<?php echo Yii::app()->createUrl('user/login',array('rurl'=>$_SERVER['REQUEST_URI'])); ?>"><div class="qq-upload-button">Upload Your ganesha</div></a></div>
		<?php	}else{
        $this->widget('ext.EAjaxUpload.EAjaxUpload',
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
        )); 
		}
		?>
<div class="row-fluid mt10">
<div class="span8">
<div class="photo-opt">
	<div class="btn feedmdk">Feed Modaks</div>
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
	<!--<div class="visit-vw">View : <?php echo $novisit;?></div> -->
	<div class="visit-vw"><span class="btn">View</span><span class="btn"><?php echo $novisit;?></span></div>
	<div class="visit-vw">
	<span class="share32 fb"></span>
	<span class="share32 tw"></span>
	<span class="share32 pi"></span>
	<span class="share32 gg"></span>
	<span class="share32 fl"></span>
	<span class="share32 st"></span>
	<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=xa-517d3bd171dee465"></script>
	</div>
</div>
	<div class="single-photo">
		<img style="width:<?php echo PhotoType::$dimension[PhotoType::Screen]['width'] ?>;" src="<?php echo PhotoType::$relativeFolderName[PhotoType::Screen].$photo->file_name ?>" class="large-img"/>
	</div>
    <p class="caption"><?php echo $photo->original_name; ?></p>
	<?php if($photo->description){?>
	<p><strong>Tags: </strong><?php echo $photo->description; ?></p>
	<?php } ?>
    <p><strong>Posted By: </strong><a class="photo_uploader_name"><?php echo $photo->node->creator->name ?></a></p>
	<p><strong>Posted on: </strong><?php echo $photo->node->created; ?></p>
	


	<?php $this->beginClip('js-page-end'); ?>
	
            <script type="text/javascript">
			</script>
	<?php $this->endClip(); ?>

</div>
	<div class="span4">
		<div id="comments">
			<?php
			foreach($photo->node->comments as $comment){
				$this->renderPartial('//comment/view',array('comment'=>$comment));
			}
			?>
		<?php $this->renderPartial('//comment/create',array('comment'=>$newComment)); ?>
		</div>
		<div class="mt10"><h4>Related bappa:</h4></div>
		<div class="am-container mt10 photo-more" id="am-container">
		
			</div>
	</div>

</div>
