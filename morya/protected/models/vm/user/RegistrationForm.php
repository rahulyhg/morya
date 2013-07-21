<?php

class RegistrationForm extends CFormModel
{
	public $name;
	public $email;
	public $password;
	public $confirm_password;
	public $contact;
	public $add_line_1;
	public $add_line_2;
	public $ganpati_pic;
	public $city;
	//fields are exactly same as we need in the form
	//the rules are also defined here
	//if rules are defined in the user class it will be validated when persisting to db
	//RegistrationForm is binded to view .
	//notice we do not have other properties of user class like created modified
	//when this form is filled by the user we have a post operation
	// 
	public function rules()
	{
		return array(
			array('name,email, password', 'required'),
			array('name,email','filter','filter'=>'strtolower'),
			array('email','unique','caseSensitive'=>'false','className'=>'User'),
			array('email','email'),
			array('password, ganpati_pic, city,add_line_1, add_line_2','default', 'setOnEmpty'=>true, 'value'=>null),
			array('password', 'safe')
		);
	}

	public function attributeLabels()
	{
		return array(
			'name'=>'Full Name',
			'ganpati_pic'=>'Your Ganpati Photo',
		);
	}
}
