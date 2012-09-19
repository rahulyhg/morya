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
<div class="mid-region">
    <div class="tab">&nbsp;<?php echo VedicType::$heading[$vedicType];?></div>
    <div><?php echo CHtml::link("Add ".VedicType::$heading[$vedicType],array('addvedic','vedicType'=>$vedicType));?></div>

        <?php foreach($elementsList as $vedic){
    //$uname = User::model()->findByPk($vedic->user_id);
    ?>
        <div class="cont-disp">
            <div class="title_head"><a href="<?php echo Yii::app()->createUrl('vedic/vedicview',array('type'=>$vedic->type,'ved_title'=>$vedic->slug))?>"><?php echo $vedic->name_of_god;?>(<?php echo $vedic->title;?>)</a>
            </div>

            <div style="text-align: center;"><?php echo $vedic->text;?></div>
            <div style="float: right;text-decoration: none;">Posted By : <a href="#"><?php echo $vedic->user->name;?></a></div>
            <div class="clear"></div>
            </div>
        <?php } ?>
</div>
<!--
<div>
<h3>Find more <?php //echo VedicType::$heading[$vedicType] ?> here<h3>
<?php //foreach($elementsList as $vedic){?>
<div><?php //echo CHtml::link($vedic->title,array('vedicview','ved_title'=>$vedic->slug));?></div>
<?php //} ?>
</div>
-->