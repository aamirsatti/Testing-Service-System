<?php

class SiteController extends Controller
{
	public function actionIndex()
	{
		
		$tests = Testtype::model()->findall();
		$this->render('index', array('tests' => $tests));
	}
	
   // Email templates
	public function actionEmailTemplates() 
	{
		$templates = EmailTemplates::model()->findall();
		$this->render('email_template', array('templates' => $templates));
	}
	// Add  email template  
	public function actionadd()
	{  
		if(isset($_POST['template'])) 
		{      
			$templt = new EmailTemplates;
			$template_data = array(
						'title' => Yii::app()->request->getPost('title'),
						'subject' => Yii::app()->request->getPost('subject'),
						'body' => Yii::app()->request->getPost('body'),
						);      
			//EmailTemplates::model()->updateall($template_data,'id=:id',array(':id' => base64_decode($id)));
			$templt->attributes = $template_data;
			$templt->save(false);
			Yii::app()->session['success'] = "Email Template Added Successfully.";
			$this->redirect(array('site/EmailTemplates'));
			exit;
		}
		$this->render('add_template');
	}
	// update email template
	public function actionedit($id)
	{
		if(isset($_POST['template'])) 
		{      
			$template_data = array(
						'title' => Yii::app()->request->getPost('title'),
						'subject' => Yii::app()->request->getPost('subject'),
						'body' => Yii::app()->request->getPost('body'),
						);      
			EmailTemplates::model()->updateall($template_data,'id=:id',array(':id' => base64_decode($id)));
			//$templt->attributes = $template_data;
			//$templt->save(false);
			Yii::app()->session['success'] = "Email Template Updated Successfully.";
			$this->redirect(array('site/EmailTemplates'));
			exit;
		}
		$template = EmailTemplates::model()->find('id=:id', array(':id' => base64_decode($id)));
		$this->render('add_template', array('template' => $template));
	}
	// Delete email template
    public function actiondelete($id)
    {
    	if($id != '')
    	{
			EmailTemplates::model()->deleteall('id=:id',array(':id' => base64_decode($id)));
			Yii::app()->session['product_success'] = "Email Template deleted successfully.";
			$this->redirect(array('site/EmailTemplates'));
			exit;
		}
		else
			$this->redirect(array(Yii::app()->homeUrl.'site/error'));


    }
    //Settings
    public function actionsetting()
    {
        $change_pass_error = '';
        if(Yii::app()->request->getPost('old_pass')) 
		{      
			
            $check = Admin::model()->find('id=:id', array(':id' => 1));
			if($check->password == md5(Yii::app()->request->getPost('old_pass')))
			{
				$update = array('password' => md5(Yii::app()->request->getPost('new_pass')));
				Admin::model()->updateall($update, 'id=:id', array(':id' => 1));	
				Yii::app()->session['success'] = "Password Changed Successfully.";
			}
			else
				$change_pass_error = "Invalid old password.";
			
		}
		if(isset($_POST['setting'])) 
		{      
			foreach($_POST as $key=>$value)
			{
				if($key != 'setting')
				{
					$Setting_data = array(
								'field_value' => $value,
								); 
								//echo '<pre>'; print_r($Setting_data); exit;     
					Setting::model()->updateall($Setting_data,'field_type=:field_type',array(':field_type' => $key));
				}
			}

			//$templt->attributes = $template_data;
			//$templt->save(false);
			Yii::app()->session['s_success'] = "Setting Updated Successfully.";
			//$this->redirect(array('site/setting'));
			//exit;
		}
        $setting = Setting::model()->findall('field_type!=:type1 AND field_type!=:type2', array(':type1' => 'seller_fee' , ':type2' => 'reviewer_fee'));
        $this->render('setting', array('change_pass_error' => $change_pass_error,'setting' => $setting));
    }
    //Settings
    public function actionsubscription()
    {
        if(isset($_POST['setting'])) 
		{      
			foreach($_POST as $key=>$value)
			{
				if($key != 'setting')
				{
					$Setting_data = array(
								'field_value' => $value,
								); 
								//echo '<pre>'; print_r($Setting_data); exit;     
					Setting::model()->updateall($Setting_data,'field_type=:field_type',array(':field_type' => $key));
				}
			}

			//$templt->attributes = $template_data;
			//$templt->save(false);
			Yii::app()->session['success'] = "Subscription fee updated successfully.";
			//$this->redirect(array('site/setting'));
			//exit;
		}
        $setting = Setting::model()->findall('field_type=:type', array(':type' => 'seller_fee'));
        $this->render('subscription', array('setting' => $setting));
    }
    // login 
    public function actionlogin()
    {
    	$login_error = '';
    	if(Yii::app()->request->getPost('username') && Yii::app()->request->getPost('password'))
    	{
    		 $check = Admin::model()->find('username=:username AND password=:pass', array(':username' => Yii::app()->request->getPost('username'), ':pass' => md5(Yii::app()->request->getPost('password'))));
    		 if(!empty($check))
    		 {
 				 Yii::app()->session['admin_login'] = 1;
 				 $this->redirect(array('site/index'));
    		 }
    		 else
    		 	$login_error = "Invalid username and password.";
    	}
    	$this->render('login', array('login_error' => $login_error));
    }
    // logout
    public function actionlogout()
    {
    	Yii::app()->session['admin_login'] = '';
    	$this->redirect(array('site/login'));
    }
	// Send Newsletter
	public function actionnewsletter()
	{
		$email = EmailTemplates::model()->find('id=:id', array(':id' => 6));
		if(Yii::app()->request->getPost('newsletter'))
		{
			$newsleter = new SendNewsletters;
			$email_data = array(
						'email_subject' => $email->subject,
						'email_body' => $email->body,
						'email_users' =>  Yii::app()->request->getPost('send_to'),
						'status' => 1
						);
			$newsleter->attributes = $email_data;
			$newsleter->save(false);
			Yii::app()->session['success'] = 'Newsletter added in queue and will be send shortly.';	
			$this->redirect(array('site/EmailTemplates'));		
		}
		
		$this->render('send_newsletter', array('email' => $email));
	}
	// REminder email
	public function actionreminder()
	{
		if(Yii::app()->request->getPost('reminder_email'))
		{
			$to = Yii::app()->request->getPost('email_to');
			$email_subject = Yii::app()->request->getPost('subject');
			$email_message = Yii::app()->request->getPost('body');
			//$email_message = str_replace("%email%",$user->email, $email_message);
			//$email_message = str_replace("%profile_activation_link%",'<a href="'.Yii::app()->createabsoluteurl('site/verify/active/'.base64_encode(Yii::app()->request->getPost('email'))).'">Click Here</a> to activate your account', $email_message);
			$this->sendEmail($to, $email_subject, $email_message);
			Yii::app()->session['success'] = 'Reminder email has been sent.';
		}
		$this->render('reminder_email');
	}
	//
	// Add  Google Adsense  
	public function actionAdsense()
	{  
		if(isset($_POST['template'])) 
		{      
			$data = array(
						'adsense_code' => Yii::app()->request->getPost('body'),
						);      
			//EmailTemplates::model()->updateall($template_data,'id=:id',array(':id' => base64_decode($id)));
			GoogleAdsense::model()->updateall($data, 'id=:id', array(':id' => 1));
			Yii::app()->session['success'] = "Google Adsense Updated Successfully.";
		}
		$adsense = GoogleAdsense::model()->find('id=:id', array(':id' => 1));
		$this->render('google_adsense', array('adsense' => $adsense));
	}
	public function actionprofile()
	{
		$this->render('profile');
	}
	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}