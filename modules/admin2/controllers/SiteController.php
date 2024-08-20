<?php

class SiteController extends Controller
{
	public function actionIndex()
	{
		$this->render('index');
	}
	// Login
	public function actionlogin()
	{
		if(Yii::app()->request->getPost('username') && Yii::app()->request->getPost('password'))
		{
			$check = Admin::model()->findall('username = :user AND password = :pass', array(':user' => Yii::app()->request->getPost('username'), ':pass' => md5(Yii::app()->request->getPost('password'))));
			if(!empty($check))
			{
				Yii::app()->session['admin_login'] = true;
				$this->redirect(array('site/index'));
			}
			else
			{
				Yii::app()->session['login_error'] = 'Invalid username and password';	
				$this->refresh();
			}
			 	
		}
		$this->render('login');	
	}
    // logout
	public function actionlogout()
	{
		Yii::app()->session['admin_login'] = '';
		$this->redirect(array('site/login'));
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