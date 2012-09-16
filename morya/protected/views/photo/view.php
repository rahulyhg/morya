<?php
$this->breadcrumbs=array(
	'Photos'=>array('index'),
	$photo->caption,
);
?>
<div style="float:left;">
    <img style="width:<?php echo PhotoType::$dimension[PhotoType::Screen]['width'] ?>;" src="<?php echo PhotoType::$relativeFolderName[PhotoType::Screen].$photo->file_name ?>" />
    <div class="caption"><?php echo $photo->caption ?></div>
    <p style="font-size:12px "><em>By: </em><a class="photo_uploader_name"><?php echo $photo->user->name ?></a></p>
</div>

<div id="comments">
    <?php
    foreach($photo->comments as $comment){
        $this->renderPartial('//comment/view',array('comment'=>$comment));
    }
    ?>
<?php $this->renderPartial('//comment/create',array('comment'=>$newComment)); ?>
</div>