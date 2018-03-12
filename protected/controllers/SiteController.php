<?php

class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$test = Testtype::model()->findall(array('order' => 'ApplicationStartDate ASC')); //echo '<pre>'; print_r($test); exit;
		$this->render('index', array('tests' => $test));
	}
	public function actionabout()
	{
		$test = Testtype::model()->findall(array('order' => 'ApplicationStartDate ASC'));
		$this->render('pages/about', array('tests' => $test));
	}
	public function actionmission()
	{
		$test = Testtype::model()->findall(array('order' => 'ApplicationStartDate ASC'));
		$this->render('pages/mission', array('tests' => $test));
	}
	public function actionmessage()
	{
		$test = Testtype::model()->findall(array('order' => 'ApplicationStartDate ASC'));
		$this->render('pages/message', array('tests' => $test));
	}
	public function actionobjective()
	{
		$test = Testtype::model()->findall(array('order' => 'ApplicationStartDate ASC'));
		$this->render('pages/objective', array('tests' => $test));
	}
	public function actionproject_aims()
	{
		$test = Testtype::model()->findall(array('order' => 'ApplicationStartDate ASC'));
		$this->render('pages/project_aims', array('tests' => $test));
	}
	public function actionstrength()
	{
		$test = Testtype::model()->findall(array('order' => 'ApplicationStartDate ASC'));
		$this->render('pages/strength', array('tests' => $test));
	}
	public function actionprocess()
	{
		$test = Testtype::model()->findall(array('order' => 'ApplicationStartDate ASC'));
		$this->render('pages/process', array('tests' => $test));
	}
	public function actioncontacts()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$test = Testtype::model()->findall(array('order' => 'ApplicationStartDate ASC'));
		$this->render('pages/contact', array('tests' => $test));
	}
	public function actionfaq()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$test = Testtype::model()->findall(array('order' => 'ApplicationStartDate ASC'));
		$this->render('pages/faq', array('tests' => $test));
	}
    // test detail
    public function actiondetail($id)
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$test = Testtype::model()->findall(array('order' => 'ApplicationStartDate ASC'));
		if(isset($id) && $id != '')
		{
			$data = Testtype::model()->find('TID=:TID', array(':TID' => base64_decode($id)));
			if(!empty($data))
			{
				$this->render('detail', array('data' => $data, 'tests' => $test));
			}
			else
				$this->redirect(array('site/index'));
		}
		else
			$this->redirect(array('site/index'));	
		
	}
	// All  Test List
	public function actionlist()
	{
		$test = Testtype::model()->findall(array('order' => 'ApplicationStartDate ASC'));
		$this->render('test_list', array('tests' => $test));
	}
	public function actionschedule()
	{
		$test = Testtype::model()->findall(array('order' => 'ApplicationStartDate ASC'));
		$this->render('schedule', array('tests' => $test));
	}
	public function actioncomplete()
	{
		$test = Testtype::model()->findall(array('order' => 'ApplicationStartDate ASC'));
		$this->render('complete', array('tests' => $test));
	}
	// Result
	public function actionresult()
	{
		$this->render('result');
	}
	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(Yii::app()->request->getPost('name'))
		{
			//$model->attributes=$_POST['ContactForm'];
			
			$name = Yii::app()->request->getPost('name');
			$email = Yii::app()->request->getPost('email');
			$phone = Yii::app()->request->getPost('phone');
			$subject = Yii::app()->request->getPost('subject');
			$message = nl2br(Yii::app()->request->getPost('message'));
			//if($model->validate())
			{
				/*$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-Type: text/plain; charset=UTF-8";

				mail('info@cts.org.pk',$subject,$model->body,$headers);
				*/
				$message = "Dear Admin, <br/> You have recieved new message from ".$name.".<br/> <b> Phone :</b> ".$phone." <br/><b> Email :</b> ".$email." <br/><b> Subject :</b> ".$subject." <br/><b> Message : </b> ".$message.""; 
				//echo $message; exit;
				$this->sendEmail('info@cts.org.pk', 'Contact Us', $message);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$tests = Testtype::model()->findall(array('order' => 'ApplicationStartDate ASC'));
		$this->render('pages/contact',array('model'=>$model,'tests' => $tests));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect(Yii::app()->user->returnUrl);
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
	// Close popup session
	public function actionclosePopup()
	{
		Yii::app()->session['close_popup'] = true;
		echo 'success';
	}
	public function actionclosePopup2()
	{
		Yii::app()->session['close_popup'] = false;
		echo 'success';
	}
	// Application form
	public function actionApp_form($id)
	{
		if(isset($id) && $id != '')
		{    
			$test = Testtype::model()->find('TID=:TID', array(':TID' => base64_decode($id)));
			$dep_data = Organization::model()->find('OrgID=:OrgID', array(':OrgID' => $test->OrgID)); 
			$posts = Post::model()->findall('TID=:TID', array(':TID' => base64_decode($id)));
			$post_array = array();
			foreach($posts as $r)
			{
				$post_array[]['PostName'] = $r->PostName;
			}
			
			$random = rand('1234567890', 3); 
			$form_reg_no = substr($dep_data->OrgName,0,5).'-'.substr($random,0,4);
			$test_file_name = substr(str_replace(" ","-", $dep_data->OrgName),0,5).'_'.substr(str_replace(" ","_",Yii::app()->request->getPost('test_title')),0,5).'_'.$random;
			//Update test file name
			$update = array('application_file' => $test_file_name);
			Testtype::model()->updateall($update, 'TID=:TID', array(':TID' => base64_decode($id)));
			//_______________________
			$application_form_data = array('dep' => $dep_data->OrgName,
										   'posts' => $post_array,
										   'test_file_name' => $test_file_name,
										   'form_reg_no' => $form_reg_no);
			Yii::app()->session['application_form_data'] = $application_form_data;
			//$this->redirect(array('test/list'));
			$this->redirect(yii::app()->baseurl.'/resources/tcpdf/examples/form_pdf.php');
		}
		else
		   $this->redirect(array('site/index'));
	}
}