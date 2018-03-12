<?php

/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class SignupForm extends CFormModel
{
	public $email;
	public $first_name;
	public $last_name;
	public $cnic;
	public $password;
	public $con_pass;
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
			array('first_name,last_name, cnic,email, password, con_pass, captcha', 'required'),
			// rememberMe needs to be a boolean
			array('email', 'email'),
			array('captcha', 'check_captcha'),
			array('cnic','numerical','integerOnly'=>true),
			// password needs to be authenticated
			array('password', 'compare', 'compareAttribute' => 'con_pass'),
			//array('password', 'authenticate'),
			array('email', 'authenticate'),
			array('cnic', 'authenticateCNIC'),
		);
	}

	/**
	 * Declares attribute labels.
	 */
	public function attributeLabels()
	{
		return array(
			'con_pass'=>'Confirm Password',
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

			$check = Candidatedetails::model()->find('email=:email', array(':email' => $this->email));
			if(!empty($check))
			{
				$this->addError('email','Email Already Exists.');
			}
		}
	}
	// CNIC
	public function authenticateCNIC($attribute,$params)
	{
		if(!$this->hasErrors())
		{
			//$this->_identity=new UserIdentity($this->email,$this->password);
			//if(!$this->_identity->authenticate())
				//$this->addError('password','Incorrect username or password.');

			$check = Candidatedetails::model()->find('CanCNIC=:cnic', array(':cnic' => $this->cnic));
			if(!empty($check))
			{
				$this->addError('cnic','CNIC Already Exists.');
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

?>