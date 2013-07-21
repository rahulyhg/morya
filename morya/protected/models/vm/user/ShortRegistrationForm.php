<?php

class ShortRegistrationForm extends CFormModel
{
    public $name;
    public $email;
    public $password;

    public function rules()
    {
        return array(
            array('name,email,password', 'required'),
           //array('email','unique','caseSensitive'=>'false','className'=>'User'),
            array('email','email'),
            array('password', 'safe'),
        );
    }

    public function attributeLabels()
    {
        return array(
            'name'=>'Full Name',
            'email'=>'Email Address'
        );
    }
}
