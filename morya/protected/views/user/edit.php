<?php
$this->breadcrumbs=array(
	'Edit Profile',
);
?>

<div class="form">

    <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'user-form',
        'action'=>Yii::app()->createUrl('user/edit'),
        'enableAjaxValidation'=>true,
        'htmlOptions'=>array('enctype'=>'multipart/form-data')
    )); ?>

    <div class="row">
        <?php echo $form->labelEx($model,'name'); ?>
        <?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>255)); ?>
        <?php echo $form->error($model,'name'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'email'); ?>
        <?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>255)); ?>
        <?php echo $form->error($model,'email'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'contact'); ?>
        <?php echo $form->textField($model,'contact'); ?>
        <?php echo $form->error($model,'contact'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'add_line_1'); ?>
        <?php echo $form->textField($model,'add_line_1',array('size'=>60,'maxlength'=>255)); ?>
        <?php echo $form->error($model,'add_line_1'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'add_line_2'); ?>
        <?php echo $form->textField($model,'add_line_2',array('size'=>60,'maxlength'=>255)); ?>
        <?php echo $form->error($model,'add_line_2'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'city'); ?>
        <?php echo $form->textField($model,'city',array('size'=>50,'maxlength'=>50)); ?>
        <?php echo $form->error($model,'city'); ?>
    </div>

    <div class="row">
        <?php echo CHtml::submitButton('Update',array('class'=>'button_1')); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->