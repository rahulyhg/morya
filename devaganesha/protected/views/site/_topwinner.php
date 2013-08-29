<div class="scroll-pane" style="height:320px">
<div style="padding:10px;">
<?php foreach($photos as $photo){
if($temple->main_pic->file_name != ''){
	$imgurl = PhotoType::$relativeFolderName[PhotoType::Mini] . $temple->main_pic->file_name;
}else{
	$imgurl = get_template_directory_uri()."/img/ganeshpic.png";
}
?>
<div class="each-ent">
	<div class="fl"><a href="<?php echo Yii::app()->createUrl('temple/templeview',array('slug'=>$temple->slug))?>" ><img src="<?php echo $imgurl; ?>" class="each-img" height="65" width="65"/></a></div>
	<div class="fl">
		<div class="head-cont"><a href="<?php echo Yii::app()->createUrl('temple/templeview',array('slug'=>$temple->slug));?>" ><?php echo substr($photo->name,0,15)."..."; ?></a></div>
		<div class="addr-cont"><?php echo $photo->node->creator->name;?></div>
		<div><a href="<?php echo Yii::app()->createUrl('temple/templeview',array('slug'=>$temple->slug));?>" class="view-photo">view details &raquo;</a></div>
	</div>
	<div class="clear"></div>
</div>
<?php } ?>
</div>
</div>

<script>
$('.scroll-pane').jScrollPane();
</script>
