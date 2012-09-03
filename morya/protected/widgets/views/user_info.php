<?php
/**
 * Author: swapnil
 * File : user_info.php
 * Date: 3/9/12
 * Time: 3:41 PM
 */
?>
<span class="us_logged user_space">
    <h2><?php echo $user->name; ?></h2>
    <div class="us_details">
        <?php echo CHtml::link('My Ganesha',Yii::app()->createUrl('photo/userPhoto')); ?>
        <?php echo CHtml::link('Edit Profile',Yii::app()->createUrl('user/edit')); ?>
        <?php echo CHtml::link('logout',Yii::app()->createUrl('user/logout')); ?>
    </div>
</span>

<?php
Yii::app()->clientScript->registerScript('user-widget-script', <<<EOD
$('.us_logged').hover(
    function(){
        //mouserenter
        //$(this).css('height','40');
        $('.us_details').show();
    },function(){
        //mouserexit
        //$(this).css('height','20');
        $('.us_details').hide();
    }
);
EOD
);
?>