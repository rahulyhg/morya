<?php foreach($photos as $photo){?>
<div class="each-ent">
	<div class="fl"><img src="<?php echo PhotoType::$relativeFolderName[PhotoType::Thumb] . $photo->file_name ;?>" class="each-img" height="65" width="65"/></div>
	<div class="fl" style="width:180px;">
		<div class="head-cont"><?php echo $photo->caption; ?></div>
		<div class="addr-cont"></div>
		<div><a href="<?php echo Yii::app()->createUrl('photo/view',array('slug'=>$photo->slug)) ?>" class="view-photo">view photos &raquo;</a></div>
	</div>
	<div class="clear"></div>
</div>
<?php } ?>
