<div class="form">
    <?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'comment-form',
    'action'=>Yii::app()->createUrl('comment/create'),
    'method'=>'POST',
    'enableAjaxValidation'=>false,
));
    ?>
    <?php
    if(Yii::app()->user->isGuest){
    ?>
	<div class="nact-com" style="display:none;">
    <div>
        <?php echo $form->labelEx(User::model(),'name'); ?>
        <?php echo $form->textField(User::model(),'name',array('maxlength'=>255,'class'=>'span12')); ?>
        <?php echo $form->error(User::model(),'name'); ?>
    </div>

        <div>
            <?php echo $form->labelEx(User::model(),'email'); ?>
            <?php echo $form->textField(User::model(),'email',array('maxlength'=>255,'class'=>'span12')); ?>
            <?php echo $form->error(User::model(),'email'); ?>
        </div>
	</div>
	<?php echo $form->hiddenField($comment,'node_id',array('value'=>$comment->node_id)); ?>
	<div>
        <?php echo $form->textArea($comment,'comment',array('maxlength'=>255,'placeholder'=>'comment here...','class'=>'span12 act-com')); ?>
    </div>
    <?php
    } else{
    ?>
	
    <div>
        <?php echo $form->textArea($comment,'comment',array('maxlength'=>255,'placeholder'=>'comment here...','class'=>'span12')); ?>
    </div>
	<?php } ?>
	<?php echo $form->hiddenField($comment,'node_id',array('value'=>$comment->node_id)); ?>
    <div>
        <?php echo CHtml::submitButton('Comment',array('class'=>'btn btn-primary')); ?>
    </div>

    <?php $this->endWidget(); ?>
</div>