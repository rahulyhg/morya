<?php
$head = TempleType::$heading[$templeType];
$this->breadcrumbs=array(
	$head,
);

?>

    <div class="title-head"><?php echo $head ;?></div>
	<div class="btn"><?php echo CHtml::link("Add new $head ",array('create','type'=>$templeType));?></div>
	<div class="clear mt10"></div>
    <?php 
	$i = 1;
	foreach($elementsList as $temple){
	$singleurl = Yii::app()->createUrl('temple/templeview',array('slug'=>$temple->slug));
    ?>
    <div class="each-temple">
        <div class="fnt24" style="text-align:center;"><a href="<?php echo $singleurl;?>"><?php echo $temple->name;?></a></div>
        <div class="mt10" style="text-align:center;">
             <img src="<?php echo PhotoType::$relativeFolderName[PhotoType::Thumb].$temple->main_pic->file_name; ?>" />
		</div>
		<div class="mt10"><?php echo substr(strip_tags(html_entity_decode($temple->description, ENT_COMPAT, "UTF-8")),0,50)." ... ";?><a href="<?php echo $singleurl;?>">Read More</a></div>
        <div><b>Established In : </b>&nbsp;<?php echo $temple->established;?></div>
        <div class="mt10"><b>How to reach : </b>&nbsp;<?php echo html_entity_decode($temple->how_to_go, ENT_COMPAT, "UTF-8");?></div>
        <div class="mt10"><b>History : </b><?php echo substr(strip_tags(html_entity_decode($temple->history, ENT_COMPAT, "UTF-8")),0,50)." ... ";?><a href="<?php echo $singleurl;?>">Read More</a></div>
		<div class="mt10"><strong>Posted on : <?php echo $temple->node->created; ?> | author : <a href="<?php echo Yii::app()->createUrl('site/myganesha',array('id'=>$temple->node->user_id));?>"><?php echo $temple->node->creator->name; ?></a></strong></div>
		<div class="mb10"><a href="<?php echo $singleurl;?>">Leave reply </a></div>
    </div>
	<?php if($i%2 == 0){ ?>
	 <div class="clear"></div>
	 <?php } ?>
    <?php 
		$i++;
	} ?>
	
	 <div class="clear"></div>
	 
	 <div class="mt10">
	<?php $this->widget('CLinkPager', array(
		'pages' => $pages,
	)) ?>
	</div>
