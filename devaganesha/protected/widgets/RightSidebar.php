<?php
/**
 * User: swapnil
 * Date: 3/9/12
 * Time: 3:30 PM
 */
Yii::import('zii.widgets.CPortlet');

class RightSidebar extends CPortlet
{
    protected function renderContent(){
        $this->render('right_sidebar');
    }
}
