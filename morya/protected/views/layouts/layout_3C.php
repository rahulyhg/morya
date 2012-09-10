<?php $this->beginContent('//layouts/layout'); ?>

    <div id="lt_sidebar" class="grid_2">
            <?php
            $this->beginWidget('zii.widgets.CPortlet', array(
                'title'=>'',
            ));
            $this->widget('zii.widgets.CMenu', array(
                'items'=>$this->menu,
                'htmlOptions'=>array('class'=>'operations'),
            ));
            $this->endWidget();
            ?>
    </div><!--left sidebar -->



    <div class="grid_8">
        <div id="breadcrum">
            <?php if(isset($this->breadcrumbs)):?>
                <?php $this->widget('zii.widgets.CBreadcrumbs', array(
                'links'=>$this->breadcrumbs,
            )); ?><!-- breadcrumbs -->
            <?php endif?>
        </div>
            <?php echo $content; ?>
    </div><!-- content -->


<div id="rt_sidebar" class="grid_2">

</div><!--right sidebar -->

<?php $this->endContent(); ?>