<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	private $_id;
	/**
	 * Authenticates a user.
	 * @return boolean whether authentication succeeds.
	 */
	public function authenticate($authType = AuthType::Normal)
	{
		if($authType == AuthType::Facebook)
		{
			$user=User::model()->findByAttributes(array('authentication_type'=>AuthType::Facebook,'open_id'=>$this->username));
			if($user===null)
			{
				$this->errorCode=self::ERROR_USERNAME_INVALID;
			}else{
				$this->_id = $user->id;
				$this->username = $user->email;
				$this->errorCode=self::ERROR_NONE;
			}
		}
		if($authType == AuthType::Normal)
		{
			$user=User::model()->findByAttributes(array('email'=>$this->username));
			if($user===null)
			{
				$this->errorCode=self::ERROR_USERNAME_INVALID;
			}
			else 
			{
				if($user->password !== md5($this->password))
				{
					$this->errorCode=self::ERROR_PASSWORD_INVALID;
				}
				else
				{
					$this->_id = $user->id;
					//update the login table
					$this->errorCode=self::ERROR_NONE;
				}
			}
		}
		$login = new Login;
		$login->loginUser($this->_id,$this->errorCode,Yii::app()->request->getUserHostAddress(),Yii::app()->request->getUserAgent());
        return !$this->errorCode;
	}
}