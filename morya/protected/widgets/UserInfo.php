<?php
/**
 * User: swapnil
 * Date: 3/9/12
 * Time: 3:30 PM
 */
Yii::import('zii.widgets.CPortlet');

class UserInfo extends CPortlet
{
    protected function renderContent(){
        $this->render('user_info');
    }
}
