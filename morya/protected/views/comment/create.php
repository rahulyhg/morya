<div class="form">
    <?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'comment-form',
    'action'=>Yii::app()->createUrl('comment/create',array('photo_id'=>$comment->photo_id)),
    'method'=>'POST',
    'enableAjaxValidation'=>true,
));
    ?>

    <?php echo $form->textArea($comment,'comment',array('size'=>60,'maxlength'=>255)); ?>
    <div class="row">
        <?php echo CHtml::submitButton('Comment',array('class'=>'button_1')); ?>
    </div>

    <?php $this->endWidget(); ?>
</div>