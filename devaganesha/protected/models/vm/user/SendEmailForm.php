<?php

/**
 * SendEmailForm class.
 * SendEmailForm is the data structure for keeping
 * email form data. It is used by the 'SendEmail' action of 'UserController'.
 */
class SendEmailForm extends CFormModel
{
	public $name;
	public $email;
	public $subject;
	public $body;
	public $default = "Welcome to www.ganeshpics.com";
	public $verifyCode;

	/**
	 * Declares the validation rules.
	 */
	public function rules()
	{
		return array(
			// name, email, subject and body are required
			array('name, email, subject, body', 'required'),
			// email has to be a valid email address
			//array('email', 'email'),
			// verifyCode needs to be entered correctly
			//array('verifyCode', 'captcha', 'allowEmpty'=>!CCaptcha::checkRequirements()),
		);
	}

	/**
	 * Declares customized attribute labels.
	 * If not declared here, an attribute would have a label that is
	 * the same as its name with the first letter in upper case.
	 */
	public function attributeLabels()
	{
		return array(
			'verifyCode'=>'Verification Code',
		);
	}
}