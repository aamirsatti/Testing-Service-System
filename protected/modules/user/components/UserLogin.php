<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserLogin extends CUserIdentity
{
	private $_id;
    public function authenticate()
    {
		$record = Candidatedetails::model()->findByAttributes(array('CanCNIC'=> $this->username));
        if($record===null)
            $this->errorCode=self::ERROR_USERNAME_INVALID;
        else if($record->password!=md5($this->password))
            $this->errorCode=self::ERROR_PASSWORD_INVALID;
        else
        {
			
          	$this->_id = $record->CanID;
            $this->setState('cnic', $record->CanCNIC);
			$this->setState('name', $record->CanFirstName.' '.$record->CanLastName);
			$this->setState('email', $record->email);
			$this->setState('isUser', true);
			Yii::app()->session['user_pic'] = $record->CanPic;
            $this->errorCode = self::ERROR_NONE;
        }
        return !$this->errorCode;
    }
 
    public function getId()
    {
        return $this->_id;
    }
}