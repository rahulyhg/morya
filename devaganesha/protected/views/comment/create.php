<div class="form">
    <?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'comment-form',
    'action'=>Yii::app()->createUrl('comment/create'),
    'method'=>'POST',
    'enableAjaxValidation'=>true,
));
    ?>
    <?php
    if(Yii::app()->user->isGuest):
    ?>
    <div class="row">
        <?php echo $form->labelEx(User::model(),'name'); ?>
        <?php echo $form->textField(User::model(),'name',array('size'=>27,'maxlength'=>255)); ?>
        <?php echo $form->error(User::model(),'name'); ?>
    </div>

        <div class="row">
            <?php echo $form->labelEx(User::model(),'email'); ?>
            <?php echo $form->textField(User::model(),'email',array('size'=>27,'maxlength'=>255)); ?>
            <?php echo $form->error(User::model(),'email'); ?>
        </div>
	
    <?php
    endif;
    ?>
	<?php echo $form->hiddenField($comment,'node_id',array('value'=>$comment->node_id)); ?>
    <div class="row">
        <?php echo $form->textArea($comment,'comment',array('size'=>80,'maxlength'=>255)); ?>
    </div>

    <div class="row">
        <?php echo CHtml::submitButton('Comment',array('class'=>'button_1')); ?>
    </div>

    <?php $this->endWidget(); ?>
</div>