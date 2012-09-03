<?php
$this->breadcrumbs=array(
	'Photos'=>array('index'),
	$photo->caption,
);
?>
<style type="text/css">
    #post {
        float:left;
    }
</style>
<img style="float:left;width:<?php echo PhotoType::$dimension[PhotoType::Screen]['width'] ?>;" src="<?php echo PhotoType::$relativeFolderName[PhotoType::Screen].$photo->file_name?>" />
    <div id="post">


<?php $form=$this->beginWidget('CActiveForm', array(
        'action'=>Yii::app()->createUrl('comment/create',array('photo_id'=>$photo->id)),
        'method'=>'POST',
    ));
?>

    <textarea rows="3" cols="50"></textarea>
    <br />
    <input type="submit" class="button_1" value="Post" />

<?php $this->endWidget(); ?>

<div id="comments">
    <div class="single_comment">
        <p>This is a comment</p>
    </div>
    <div class="single_comment">
        <p>This is a comment</p>
    </div>
</div>
    </div>