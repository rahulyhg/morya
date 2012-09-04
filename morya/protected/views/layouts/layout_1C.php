<?php $this->beginContent('//layouts/layout'); ?>

    <div class="grid_12">
        <div id="breadcrum">
            <?php if(isset($this->breadcrumbs)):?>
                <?php $this->widget('zii.widgets.CBreadcrumbs', array(
                'links'=>$this->breadcrumbs,
            )); ?><!-- breadcrumbs -->
            <?php endif?>
        </div>
            <?php echo $content; ?>
    </div><!-- content -->

<?php $this->endContent(); ?>