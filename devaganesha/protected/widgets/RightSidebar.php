<?php
/**
 * User: swapnil
 * Date: 3/9/12
 * Time: 3:30 PM
 */
Yii::import('zii.widgets.CPortlet');

class RightSidebar extends CPortlet
{
	public $sliderarr = array();
	

        //$criteria->compare('type',$templeType);
    protected function renderContent(){
		$criteria=new CDbCriteria;
		//$criteria->with = array('photoes');
		$criteria->order = 't.created DESC';
        $criteria->limit = 20;
		
		$sliderarr = Node::model()->findAll();
        $this->render('right_sidebar',array('sliderarr'=>$sliderarr));
    }
}
