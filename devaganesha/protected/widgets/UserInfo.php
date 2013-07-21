<?php
/**
 * User: swapnil
 * Date: 3/9/12
 * Time: 3:30 PM
 */
Yii::import('zii.widgets.CPortlet');
Yii::import('application.models.user.*');

class UserInfo extends CPortlet
{
    protected function renderContent(){
        $id = Yii::app()->user->id;
        $user = User::model()->findByPk($id);
        $this->render('user_info',array('user'=>$user,'register'=>new RegistrationForm,'login'=>new LoginForm));
    }
}
