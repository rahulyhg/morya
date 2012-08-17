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
	
	public function rules()
	{
		return array(
			array('name,email, password, confirm_password,contact', 'required'),
			array('email','filter','filter'=>'strtolower'),
			array('email','unique','caseSensitive'=>'false','className'=>'User'),
			array('email','email'),
			array('confirm_password','compare','compareAttribute'=>'password'),
			array('password', 'safe'),
			array('confirm_password', 'safe'),
		);
	}

	public function attributeLabels()
	{
		return array(
			'name'=>'Full Name',
			'ganpati_pic'=>'Your Ganpati Photo',
			'password_compare'=>'Password Confirm'
		);
	}
}
