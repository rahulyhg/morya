<?php
$this->breadcrumbs=array(
	'Experiences',
);

$this->menu=array(
	array('label'=>'Create Experience', 'url'=>array('create')),
);
?>


    <div class="title-bar">People's Experiences/Ganesh Mahima</div>
	<div class="btn"><?php echo CHtml::link("Share your experience",array('create'));?></div>
    <?php foreach($elementsList as $exp){
    //$user_name = User::model()->findByPk($recipe->user_id);
    //$pri_pic = Photo::model()->findByPk($recipe->primary_pic);
//echo $recipe->prime->file_name;
    ?>

    <div class="cont-disp">

        <div class="title_head"><a href="<?php echo Yii::app()->createUrl('experience/expview',array('exp_title'=>$exp->slug))?>"><?php echo $exp->title; ?></a></div>
        <div><p><?php echo $exp->text; ?></p></div>
        <div style="float: right;text-decoration: none;">Posted By : <a href="#"><?php echo $exp->user->name;?></a></div>
        <div class="clear"></div>

        <?php /*$this->widget('zii.widgets.CListView', array(
        'dataProvider'=>$dataProvider,
        'itemView'=>'_view',
    )); */
        //print_r($recipe);
        ?>


    </div>
    <?php }?>

