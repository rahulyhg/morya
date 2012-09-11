<?php
$this->breadcrumbs=array(
	'Ganesh Photos',
);?>

        <?php $this->widget('ext.EAjaxUpload.EAjaxUpload',
        array(
            'id'=>'uploadFile',
            'config'=>array(
                'action'=>Yii::app()->createUrl('photo/postUpload',array('type'=>PhotoUploadCategory::Normal)),
                'allowedExtensions'=>array("jpg","jpeg","gif"),//array("jpg","jpeg","gif","exe","mov" and etc...
                'sizeLimit'=>10*1024*1024,// maximum file size in bytes
                'minSizeLimit'=>10,// minimum file size in bytes
                'onComplete'=>"js:function(id,filename,response){}",
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

<section id="photo_container" style="position:relative;">
    <div id="photo_wrapper" class="photo_wrapper" style="position:relative;width:100%;height:100%;">
        <ul id="photo_gallery" class="photo_gallery">
    <?php
        foreach($elementsList as $photo){
            $this->renderPartial('//photo/_single',array('photo'=>$photo));
        }
    ?>
        </ul>
    </div>
</section>

<?php $this->beginClip('js-page-end'); ?>
		<script type="text/javascript">
            $(function() {
                $('#photo_containetr').gridnav({
                    rows	: 2,
                    type	: {
                        mode		: 'sequpdown', 		// use def | fade | seqfade | updown | sequpdown | showhide | disperse | rows
                        speed		: 500,				// for fade, seqfade, updown, sequpdown, showhide, disperse, rows
                        easing		: '',				// for fade, seqfade, updown, sequpdown, showhide, disperse, rows
                        factor		: 50,				// for seqfade, sequpdown, rows
                        reverse		: false				// for sequpdown
                    }
                });
            });
            </script>
 <?php $this->endClip(); ?>