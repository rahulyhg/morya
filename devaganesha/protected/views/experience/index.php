<?php
$linkhead = MahimaType::$heading[$type];
$this->breadcrumbs=array(
	$linkhead
);

?>


    <div class="title-head">Ganesh Mahima</div>
	<div class="btn"><?php echo CHtml::link($linkhead,array('create','type'=>$type));?></div>
    <?php foreach($elementsList as $exp){

    ?>

    <div class="cont-disp">

         <div class="fnt24"><a href="<?php echo Yii::app()->createUrl('experience/expview',array('slug'=>$exp->slug));?>"><?php echo $exp->title; ?></a></div>
         <div class="mt10"><strong>Posted on : <?php echo $exp->node->created; ?> | author : <?php echo $exp->node->creator->name; ?></strong></div>
		<div class="blog-content"><?php echo html_entity_decode($exp->text, ENT_COMPAT, "UTF-8"); ?></div>
		<div><span> <a href="<?php echo Yii::app()->createUrl('experience/expview',array('slug'=>$exp->slug));?>">Leave reply </a></span>
		   <?php if($vedic->node->user_id == Yii::app()->user->id){?>
			<span>&nbsp;|&nbsp;<a href="">Edit</a></span>
		   <?php } ?>
		   </div>
        <div class="clear"></div>

        <?php /*$this->widget('zii.widgets.CListView', array(
        'dataProvider'=>$dataProvider,
        'itemView'=>'_view',
    )); */
        //print_r($recipe);
        ?>


    </div>
    <?php }?>

