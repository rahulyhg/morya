<?php
$this->breadcrumbs=array(
	'Edit Profile',
);
?>
<div class="title-bar">Edit your profile</div>
<div class="form">

    <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'user-form',
        'action'=>Yii::app()->createUrl('user/edit'),
        'enableAjaxValidation'=>true,
        'htmlOptions'=>array('enctype'=>'multipart/form-data')
    )); ?>

    <div>
        <?php echo $form->labelEx($model,'name'); ?>
        <?php echo $form->textField($model,'name',array('maxlength'=>255,'class'=>'span8')); ?>
        <?php echo $form->error($model,'name'); ?>
    </div>

    <div>
        <?php echo $form->labelEx($model,'email'); ?>
        <?php echo $form->textField($model,'email',array('maxlength'=>255,'class'=>'span8')); ?>
        <?php echo $form->error($model,'email'); ?>
    </div>

    <div>
        <?php echo $form->labelEx($model,'contact'); ?>
        <?php echo $form->textField($model,'contact',array('class'=>'span8')); ?>
        <?php echo $form->error($model,'contact'); ?>
    </div>

    <div>
        <?php echo $form->labelEx($model,'add_line_1'); ?>
        <?php echo $form->textField($model,'add_line_1',array('maxlength'=>255,'class'=>'span8')); ?>
        <?php echo $form->error($model,'add_line_1'); ?>
    </div>

    <div>
        <?php echo $form->labelEx($model,'add_line_2'); ?>
        <?php echo $form->textField($model,'add_line_2',array('maxlength'=>255,'class'=>'span8')); ?>
        <?php echo $form->error($model,'add_line_2'); ?>
    </div>

    <div>
        <?php echo $form->labelEx($model,'city'); ?>
        <?php echo $form->textField($model,'city',array('maxlength'=>50,'class'=>'span8')); ?>
        <?php echo $form->error($model,'city'); ?>
    </div>

    <div>
        <?php echo CHtml::submitButton('Update',array('class'=>'btn')); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->