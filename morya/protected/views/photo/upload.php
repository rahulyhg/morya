<?php
$this->breadcrumbs=array(
	'Photos'=>array('index'),
	'Upload',
);
?>
<style>
.hidden{
display:none;
}
</style>
<script type="text/javascript">
function showCaption(id,fileName,responseJSON){
$('ul.qq-upload-list li:nth-child(1)').append('<div><span>Caption: <input type="text" value="" /></span><br /><a href="#" class="showNext">Add Description</a><span class="hidden">Description: <textarea></textarea></span><button>Update</button></div>');
$('.showNext').click(function(){
	$(this).next().show();
	$(this).hide();
	});
$('button').click(function(){
	var caption = $(this).closest('div').find("input");
	var description = $(this).closest('div').find("textarea");
		$.ajax({
			url : '<?php Yii::app()->createUrl('photo/postUpdate') ?>',
			data : { 'photo_id' : responseJSON.id , 'caption' : caption , 'description' : description }
			type : 'POST'
		});
});

}
</script>
<h1>Upload Photo</h1>

<?php $this->widget('ext.EAjaxUpload.EAjaxUpload',
array(
        'id'=>'uploadFile',
        'config'=>array(
               'action'=>Yii::app()->createUrl('photo/postUpload'),
               'allowedExtensions'=>array("jpg","jpeg","gif"),//array("jpg","jpeg","gif","exe","mov" and etc...
               'sizeLimit'=>10*1024*1024,// maximum file size in bytes
               'minSizeLimit'=>10,// minimum file size in bytes
               'onComplete'=>"js:function(id, fileName, responseJSON){ showCaption(id,fileName,responseJSON); }",
			   'onProgress' => "js:function(id,fileName, loaded, total){}",
			   'onSubmit' => "js:function(id, fileName){  }",
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