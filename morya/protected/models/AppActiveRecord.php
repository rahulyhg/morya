<?php

abstract class AppActiveRecord extends CActiveRecord {
/**
* Prepares create_time, create_user_id, update_time and update_user_
id attributes before performing validation.
*/
	protected function beforeValidate()
	{
		if($this->isNewRecord && $this->hasAttribute('created'))
			$this->created=new CDbExpression('NOW()');
		if($this->hasAttribute('modified'))
			$this->modified=new CDbExpression('NOW()');
		if($this->hasAttribute('user_id'))
			$this->user_id = Yii::app()->user->id;
		return parent::beforeValidate();
	}
}