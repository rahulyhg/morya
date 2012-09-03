<?php
$this->breadcrumbs=array(
	'Photos'=>array('index'),
	$photo->caption,
);
?>
<img style="float:left;width:<?php echo PhotoType::$dimension[PhotoType::Screen]['width'] ?>;" src="<?php echo PhotoType::$relativeFolderName[PhotoType::Screen].$photo->file_name ?>" />

<div id="comments">
    <?php
    foreach($photo->comments as $comment){
        $this->renderPartial('//comment/view',array('comment'=>$comment));
    }
    ?>
<?php $this->renderPartial('//comment/create',array('comment'=>$newComment)); ?>
</div>