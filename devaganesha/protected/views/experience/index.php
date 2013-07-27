<?php
$this->breadcrumbs=array(
	'Experiences',
);

$this->menu=array(
	array('label'=>'Create Experience', 'url'=>array('create')),
);
?>


    <div class="title-bar">Experiences/Ganesh Mahima/Make a wish for ganesha</div>
	<div class="btn"><?php echo CHtml::link("Share your experience / Make a wish",array('create'));?></div>
    <?php foreach($elementsList as $exp){
    //$user_name = User::model()->findByPk($recipe->user_id);
    //$pri_pic = Photo::model()->findByPk($recipe->primary_pic);
//echo $recipe->prime->file_name;
    ?>

    <div class="cont-disp">

         <div class="fnt24"><a href="<?php echo Yii::app()->createUrl('experience/expview',array('exp_title'=>$exp->slug));?>"><?php echo $exp->title; ?></a></div>
         <div class="mt10"><strong>Posted on : <?php echo $exp->node->created; ?> | author : <?php echo $exp->->name; ?></strong></div>
		<div class="blog-content"><?php echo $exp->text; ?></div>
		<div><span> <a href="<?php echo Yii::app()->createUrl('experience/expview',array('exp_title'=>$exp->slug));?>">Leave reply </a></span>
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

