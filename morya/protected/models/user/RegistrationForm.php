<?php

/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
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
	public $taluka;
	public $city;
	

	/**
	 * Declares the validation rules.
	 * The rules state that username and password are required,
	 * and password needs to be authenticated.
	 */
	public function rules()
	{
		return array(
			// username and password are required
			array('name,email, password, confirm_password', 'required'),
			array('email','filter','filter'=>'strtolower'),
			array('email','unique','caseSensitive'=>'false','className'=>'User'),
		);
	}

	/**
	 * Declares attribute labels.
	 */
	public function attributeLabels()
	{
		return array(
			'name'=>'Full Name',
			'ganpati_pic'=>'Your Ganpati Photo'
		);
	}

	/**
	 * Authenticates the password.
	 * This is the 'authenticate' validator as declared in rules().
	
	public function uniqueEmail($email)
	{
		if(!$this->hasErrors())
		{
			$this->_identity=new User();
			if(!$this->_identity->authenticate())
				$this->addError('password','Incorrect username or password.');
		}
	} */
}
