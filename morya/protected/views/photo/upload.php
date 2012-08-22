<?php
$this->breadcrumbs=array(
	'Photos'=>array('index'),
	'Upload',
);
?>
<script type="text/javascript">
function uploadComplete(id, fileName, responseJSON){
//id is the number of the file which is uploaded,fileName name of file on client
//responseJSON json object returned by server contains id, filName on server, result of upload

}
$('document').ready(function(){
$('input').change(function(){
alert(0);
});
});
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
               'onComplete'=>"js:uploadComplete",
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