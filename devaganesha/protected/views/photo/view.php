<?php
$this->breadcrumbs=array(
	'Ganesh Photos'=>array('index'),
	$photo->caption
);

$this->setPageTitle($photo->caption);
Yii::app()->clientScript->registerMetaTag('Get all the collection of pictures and wallpapers of ganesh from all over the india.', 'description');
?>

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

			<!-- AddThis Button BEGIN -->
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
<!-- AddThis Button END -->
	
    <div id="modak-rating" title="Feed modak to ganpati">
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
	<div class="visit-vw"><span class="btn" title="Darshan"><i class="icon-eye-open"></i>&nbsp;<?php echo $photo->counter;?></span></div>
	<!--<div class="visit-vw">
	<span class="share32 fb"></span>
	<span class="share32 tw"></span>
	<span class="share32 pi"></span>
	<span class="share32 gg"></span>
	<span class="share32 fl"></span>
	<span class="share32 st"></span>
	<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=xa-517d3bd171dee465"></script>
	</div> -->

	<div class="fl">

	<div class="btn fav-main"><div class="<?php echo $classname;?>" id="fav-block" title="<?php echo $titlefav;?>"></div></div>
	</div>
	
	<div class="clear"></div>
	
 </div>
 <input type="hidden" id="photo-node" value="<?php echo $photo->node_id;?>"/>
 <input type="hidden" id="photo-id" value="<?php echo $photo->id;?>"/>
<div class="nxtprev mt10"><a <?php if($prev != 'hide'){ ?> href="<?php echo Yii::app()->createUrl('photo/view',array('slug'=>$prev)); ?>" <?php } ?> class="btn fl" <?php if($prev == 'hide'){ echo 'disabled';}?>><i class="icon-backward"></i> Prev</a>
<a <?php if($nxt != 'hide'){ ?> href="<?php echo Yii::app()->createUrl('photo/view',array('slug'=>$nxt)) ?>" <?php } ?> class="btn fr" <?php if($nxt == 'hide'){ echo 'disabled';};?>>Next <i class="icon-forward"></i></a><div class="clear"></div></div>
	<div class="single-photo">
		<img style="width:<?php echo PhotoType::$dimension[PhotoType::Screen]['width'] ?>;" src="<?php echo PhotoType::$relativeFolderName[PhotoType::Screen].$photo->file_name; ?>" class="large-img"/>
	</div>
    <div>
				<p class="caption"><?php echo $photo->caption; ?></p>
			<?php if($photo->description){?>
			<p><strong>Tags: </strong><?php echo $photo->description; ?></p>
			<?php } ?>
			<p><strong>Posted By: </strong><a class="photo_uploader_name" href="<?php echo Yii::app()->createUrl('site/myganesha',array('id'=>$photo->node->user_id));?>"><?php echo $photo->node->creator->name ?></a>
			<?php if(Yii::app()->user->id == $photo->node->user_id){ ?>
			<span class="fr"><a href="#edit-photo-form" id="edit-photo">Edit</a>&nbsp; | &nbsp;
			<a class="fr"><?php echo CHtml::link('Delete','#',array("submit"=>array('photo/delete','id'=>$photo->id),"confirm" => "Are you sure?"));?></a></span>
			<?php } ?>
			</p>
			<!-- <p><strong>Posted on: </strong><?php echo $photo->node->created; ?></p> -->
	</div>
	<div><a href="#" id="report-abuse" title="<?php echo $titlera;?>"><?php echo $rtext;?></a></div>
	
	<div style="display:none">
		<div id="edit-photo-form">
			<div>Edit your photo</div>
			<div>
			<img src="<?php echo PhotoType::$relativeFolderName[PhotoType::Thumb].$photo->file_name; ?>" />
			<label>Caption:</label><input type="text" id="photo-caption-edit" value="<?php echo $photo->caption; ?>" title="This will be the name of your ganesha" />
			<label>Location: (eg: mumbai/thane/pune/nashik)</label><input type="text" id="photo-location-edit" value="<?php echo $photo->location; ?>" />
			<label>Tags:</label><input type="text" id="photo-description-edit" value="<?php echo $photo->description; ?>"/><br />
			<input type="submit" id="edit-button" class="btn" value="Save"/>
			</div>
		</div>
	</div>
	

	<?php $this->beginClip('js-page-end'); ?>
	
            <script type="text/javascript">
			</script>
	<?php $this->endClip(); ?>

	</div>

	<div class="span4">
		<div id="comments">
			<div id="accordion" style="margin-bottom:10px !important;">
			
			<h3>Show comments</h3>
			<div class="single_comment">
			<?php
			if($photo->node->comments){
				foreach($photo->node->comments as $comment){
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
		<div class="mt10"><h4>Related bappa:</h4></div>
		<div class="photo-more">
		<div class="mt10" id="small-pin-container">
		
		</div>
	</div>

</div>

  <script type="text/javascript">
			$(function() {
			$('#small-pin-container').html('<img src="<?php echo get_template_directory_uri(); ?>/img/loading.gif" style="margin:20% 40%;"/>');
			  $.ajax({
                        url: "<?php echo Yii::app()->createUrl("photo/loadRelated"); ?>",
						
                        success: function(data) {
							$('#small-pin-container').html(data);
							$('#small-pin-container').masonry({
							  itemSelector: '.small-pin',
							  isFitWidth: true
							});	
                        }
                    });	
					
					$('#edit-button').click(function(){
						photoId = $('#photo-id').val();
                          $.ajax({
                        url: "<?php echo Yii::app()->createUrl("photo/update"); ?>",
                        type: 'POST',
                        data: { 'id': photoId , 'caption':$('#photo-caption-edit').val() ,'description': $('#photo-description-edit').val(),'location': $('#photo-location-edit').val()},
                        success: function(response) {
                            $.fancybox.close();
                            $('#upload-success').remove();
                            //$('#recent-uploads').load('<?php echo Yii::app()->createUrl('site/recent'); ?>');
								window.location.href = response;
							}
						});
                    });
					
					$('#edit-photo').fancybox();
			});
		</script>
