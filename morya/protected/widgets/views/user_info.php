<?php
/**
 * Author: swapnil
 * File : user_info.php
 * Date: 3/9/12
 * Time: 3:41 PM
 */
?>

<?php
if(Yii::app()->user->isGuest)
{
?>

<a id="signup" class="user_space" href="#authentication">
    Login / Register
</a>

<div style="display: none;">
    <div id="authentication">
        <div id="register">
            <h1>Register</h1>
            <?php $this->controller->renderPartial('//user/short_register',array('model'=>$register)); ?>
        </div>
        <div id="login">
            <h1>Login</h1>
            <?php $this->controller->renderPartial('//user/login',array('model'=>$login)); ?>
        </div>
    </div>
</div>

<?php
}else{
?>

<span class="us_logged user_space">
    <h2><?php $splitIndex = strpos($user->name,' '); echo($splitIndex > 0 ? substr($user->name,0,$splitIndex) : $user->name) ; ?></h2>
    <div class="us_details">
        <?php echo CHtml::link('My Ganesha',Yii::app()->createUrl('photo/userPhoto')); ?>
        <?php echo CHtml::link('Edit Profile',Yii::app()->createUrl('user/edit')); ?>
        <?php echo CHtml::link('logout',Yii::app()->createUrl('user/logout')); ?>
    </div>
</span>

<?php
}
?>



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