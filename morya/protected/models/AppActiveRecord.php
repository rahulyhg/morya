<?php
/*
* AppActiveRecord is the base class from which all the models derive
* The models which derives from AppActiveRecord are saved in the DB
* like User Photo Vedic etc
*/
abstract class AppActiveRecord extends CActiveRecord {


//slug behaviors function
	public function behaviors(){
    return array(
        'SlugBehavior' => array(
            'class' => 'application.models.behaviors.SlugBehavior',
            'slug_col' => 'slug',
            'title_col' => 'title',
            'overwrite' => false
        )
    );
}


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
		if($this->hasAttribute('slug'))
			$this->slug = $this->behaviors();
		return parent::beforeValidate();
	}
}