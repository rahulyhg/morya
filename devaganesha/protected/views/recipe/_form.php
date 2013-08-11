<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'recipe-form',
	'enableAjaxValidation'=>false,
    'htmlOptions'=>array('enctype'=>'multipart/form-data')
)); ?>

    <script type="text/javascript">
        function recipeUploadComplete(id, fileName, responseJSON){
            //echo responseJSON;
            if(responseJSON.id){
              $("#photo_id").append('<input type="hidden" name="Recipe[primary_pic]" value="' + responseJSON.id + '" />');
            }
        }
    </script>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="controls">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>50,'maxlength'=>50,'class'=>'span12')); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="input-append">
		<?php echo $form->labelEx($model,'cooking_time'); ?>
		<?php echo $form->textField($model,'cooking_time',array('id'=>'appendedInput')); ?>
		<span class="add-on">minutes</span>
		<?php echo $form->error($model,'cooking_time'); ?>
	</div>

	<div class="controls">
		<?php echo $form->labelEx($model,'ingredients'); ?>
		<?php echo $form->textArea($model,'ingredients',array('rows'=>4,'class'=>'span12','id'=>'ingredients-editor')); ?>
		<?php echo $form->error($model,'ingredients'); ?>
	</div>

	<div class="controls">
		<?php echo $form->labelEx($model,'method'); ?>
		<?php echo $form->textArea($model,'method',array('rows'=>8,'class'=>'span12','id'=>'method-editor')); ?>
		<?php echo $form->error($model,'method'); ?>
	</div>

    <div id="photo_id"></div>
    <?php
    $this->widget('ext.EAjaxUpload.EAjaxUpload',
        array(
            'id'=>'uploadFile',
            'config'=>array(
                'action'=>Yii::app()->createUrl('photo/postUpload',array('type'=>PhotoUploadCategory::Recipe)),
                'allowedExtensions'=>array("jpg","jpeg","gif"),//array("jpg","jpeg","gif","exe","mov" and etc...
                'sizeLimit'=>10*1024*1024,// maximum file size in bytes
                'minSizeLimit'=>10,// minimum file size in bytes
                'onComplete'=>"js:recipeUploadComplete",
				'uploadButtonText'=>'Upload your recipe image here',
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

	<div class="controls mt10">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Add' : 'Save',array('class'=>'btn')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<script type="text/javascript">

$(document).ready(function(){
	tinymce.init({
		selector: "#ingredients-editor",
		plugins: [
			"advlist autolink lists link image charmap print preview anchor",
			"searchreplace visualblocks code fullscreen",
			"insertdatetime media table contextmenu paste"
		],
		toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
	});
	tinymce.init({
		selector: "#method-editor",
		plugins: [
			"advlist autolink lists link image charmap print preview anchor",
			"searchreplace visualblocks code fullscreen",
			"insertdatetime media table contextmenu paste"
		],
		toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
	});
});

</script>