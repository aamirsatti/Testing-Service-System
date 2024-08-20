<?php

/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class LoginForm extends CFormModel
{
	public $cnic;
	public $password;
	public $captcha;

	private $_identity;

	/**
	 * Declares the validation rules.
	 * The rules state that username and password are required,
	 * and password needs to be authenticated.
	 */
	public function rules()
	{
		return array(
			// username and password are required
			array('cnic, password, captcha', 'required'),
			// rememberMe needs to be a boolean
			//array('rememberMe', 'boolean'),
			// password needs to be authenticated
			array('password', 'authenticate'),
			array('cnic','numerical','integerOnly'=>true),
			array('captcha', 'check_captcha'),
		);
	}

	/**
	 * Declares attribute labels.
	 */
	public function attributeLabels()
	{
		return array(
			'rememberMe'=>'Remember me next time',
		);
	}

	/**
	 * Authenticates the password.
	 * This is the 'authenticate' validator as declared in rules().
	 */
	public function authenticate($attribute,$params)
	{
		if(!$this->hasErrors())
		{
			//$this->_identity=new UserIdentity($this->email,$this->password);
			//if(!$this->_identity->authenticate())
				//$this->addError('password','Incorrect username or password.');

			$check = Candidatedetails::model()->find('CanCNIC=:cnic AND password=:password', array(':cnic' => $this->cnic,':password' => md5($this->password)));
			if(empty($check))
			{
				$this->addError('password','Incorrect CNIC or password.');
			}
			else if(isset($check->status) && $check->status == 0)
			{
				 Yii::app()->session['user_id_resend'] = $check->id;
				 $this->addError('password','Your account is not activated. Please click on activation link you have recieved on your email.<br/><a style="color:#EEE;text-decoration:underline;" href="'.Yii::app()->createurl('site/Resend').'"> Click here </a> to resend activation link.');
			}
		}
	}
	// Captcha
	public function check_captcha()
	{
		if(!$this->hasErrors())
		{
			if($this->captcha != Yii::app()->session['vercode'])
			{
				$this->addError('captcha','Please insert correct captcha code.');
			}
		}
	}

	/**
	 * Logs in the user using the given username and password in the model.
	 * @return boolean whether login is successful
	 */
	public function login()
	{
		if($this->_identity===null)
		{
			$this->_identity=new UserIdentity($this->username,$this->password);
			$this->_identity->authenticate();
		}
		if($this->_identity->errorCode===UserIdentity::ERROR_NONE)
		{
			$duration=$this->rememberMe ? 3600*24*30 : 0; // 30 days
			Yii::app()->user->login($this->_identity,$duration);
			return true;
		}
		else
			return false;
	}
}
