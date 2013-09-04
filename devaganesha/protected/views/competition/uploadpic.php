<div style="text-align:center;">
<div class="btm-border">
	<h2 class="page-head"><?php echo $model->title;?></h2>
</div>
</div>

<?php
			
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
                'uploadButtonText'=>'Click here to upload your ganesha.',
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
		 ?>
		<!-- <a class="btn"><i class="icon-thumbs-up"></i>&nbsp;Vote</a> --> 
<div class="row-fluid" style="margin:10 auto 0;">
<form>
<?php 
$i = 0;
foreach($photos as $photo) {?>
<div class="fl spics" style="margin:10px;">
<input type="radio" value="<?php echo $photo->id;?>" name="selectedpic" id="select_<?php echo $i;?>" class="hidden"/>
<a href="javascript:set_radio('select_<?php echo $i;?>')">
<div><img src="<?php echo PhotoType::$relativeFolderName[PhotoType::Thumb] . $photo->file_name ;?>" alt="" width="200px" height="150px"/></div>
<div><?php echo $photo->caption;?></div>

</a>
</div>
<?php 
$i++;
} ?>
</form>
<div class="clear"></div>
</div>

<script>
function set_radio($inputid){ 
$("input#" + $inputid).click(); 
}

$(document).ready(function() {
$("input:radio[name=selectedpic]").click(function(){ 
$('.selected-photo').removeClass('selected-photo');
$('.greentick').remove();
$(this).parent('.spics').addClass('selected-photo');
$(this).parent('.spics').append('<div class="greentick"></div>');


}); });
</script>