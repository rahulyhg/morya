<?php
$this->breadcrumbs=array(
    VedicType::$heading[$vedicType] => array('vedic/vedic',array('vedicType'=>$vedicType))
);



$this->menu=array(
	array(
        'label'=>'Aarti',
        'url'=>array('vedic','vedicType'=>VedicType::Aarti),
        'itemOptions'=>array(
            'class'=>'aarti_sidemenu selected_menu',
            'style'=>'height:220px;'
        ),
    ),
	array(
        'label'=>'Mantra Pushpanjali',
        'url'=>array('vedic','vedicType'=>VedicType::Mantra),
        'itemOptions'=>array('class'=>'mantrapushpanjali_menu'),
    ),
	array(
        'label'=>'Atharva shirsha',
        //'url'=>array('vedic','vedicType'=>VedicType::Atharva),
		'url'=>$this->createAbsoluteUrl('page', array('view' => 'atharva')),
        'itemOptions'=>array('class'=>'atharvashirsha_menu'),
    ),
	array('label'=>'Uttar Pooja', 'url'=>array('vedic/page','view'=>'pooja'),
        'itemOptions'=>array('class'=>'uttarpooja_menu')
    ),
);
?>

    <div class="title-bar">&nbsp;<?php echo VedicType::$heading[$vedicType];?></div>
    <div class="btn"><?php echo CHtml::link("Add New ".VedicType::$heading[$vedicType],array('addvedic','vedicType'=>$vedicType));?></div>

        <?php foreach($elementsList as $vedic){
    //$uname = User::model()->findByPk($vedic->user_id);
	
    ?>
		<div class="cont-disp">
            <div class="fnt24"><a href="<?php echo Yii::app()->createUrl('vedic/vedicview',array('type'=>$vedic->type,'ved_title'=>$vedic->slug))?>"><?php echo $vedic->name_of_god;?>(<?php echo $vedic->title;?>)</a>
            </div>
			
			<div class="mt10"><strong>Posted on : <?php echo $vedic->node->created; ?> | author : <?php echo $vedic->node->creator->name; ?></strong></div>
            <div class="blog-content"><?php echo $vedic->text;?></div>
           <div class="mb10"><span> <a href="<?php echo Yii::app()->createUrl('vedic/vedicview',array('type'=>$vedic->type,'ved_title'=>$vedic->slug))?>">Leave reply </a></span>
		   <?php if($vedic->node->user_id == Yii::app()->user->id){?>
			<span>&nbsp;|&nbsp;<a href="">Edit</a></span>
		   <?php } ?>
		   </div>
            <div class="clear"></div>
          </div>
        <?php } ?>

<!--
<div>
<h3>Find more <?php //echo VedicType::$heading[$vedicType] ?> here<h3>
<?php //foreach($elementsList as $vedic){?>
<div><?php //echo CHtml::link($vedic->title,array('vedicview','ved_title'=>$vedic->slug));?></div>
<?php //} ?>
</div>
-->