<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class FacebookIdentity extends CUserIdentity
{
	private $_id;
	/**
	 * Authenticates a user.
	 * @return boolean whether authentication succeeds.
	 */
	public function authenticate()
	{
			$user = User::model()->findByAttributes(
						array('authentication_type' => AuthType::Facebook,'open_id'=> $this->username)
					);
			if($user===null)
			{
				$this->errorCode=self::ERROR_USERNAME_INVALID;
			}else{
				$this->_id = $user->id;
				$this->username = $user->email;
				$this->errorCode=self::ERROR_NONE;
			}
		//$login = new Login;
		//$login->loginUser($this->_id,$this->errorCode,Yii::app()->request->getUserHostAddress(),Yii::app()->request->getUserAgent());
        return !$this->errorCode;
	}	
	public function getId()
    {
        return $this->_id;
    }
}