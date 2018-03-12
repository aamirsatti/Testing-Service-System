<?php

class SiteController extends Controller
{
	public function actionIndex()
	{
		
		$user_data = Candidatedetails::model()->with(array(
									'academicinfos'
									))->find('t.CanID=:id', array(':id' => Yii::app()->user->id));
		//echo '<pre>'; print_r($user_data); exit;
		if(!empty($user_data))
			$this->render('index', array('user_data' => $user_data));
		else
		   $this->redirect(array('site/index'));	
	}
	// Profile update
	public function actionUpdate_profile()
	{
		if(Yii::app()->request->getPost('profile'))
		{ 
			$imageFileName = Yii::app()->request->getPost('prev_image');
			if(isset($_FILES['image']) && $_FILES['image']['name'] != '')
		    { 
				$picture = new CUploadedFile($_FILES['image']['name'],$_FILES['image']['tmp_name'],$_FILES['image']['type'],$_FILES['image']['size'],$_FILES['image']['error']);
				//$picture->getInstance($model, 'profile_picture');
				$imageFileName = time().'_'.str_replace(" ","_",$_FILES['image']['name']) ;
				$picture->saveAs(Yii::getPathOfAlias('webroot') ."/uploads/user_pic/".$imageFileName);
				// Image Resizing
				if(is_file(Yii::getPathOfAlias('webroot') ."/uploads/user_pic/".$imageFileName))
				{
					$image_resize = new ImageResize(Yii::getPathOfAlias('webroot') ."/uploads/user_pic/".$imageFileName);
					// Resize image to 170 X 170
					$image_resize->resizeImage(200, 200, 'exact', true);
					$image_resize->saveImage(Yii::getPathOfAlias('webroot') ."/uploads/user_pic/thumb/".$imageFileName, 100);
				}
		    }
			$update = array(
						'CanFirstName' => Yii::app()->request->getPost('first_name'),
						'CanLastName' => Yii::app()->request->getPost('last_name'),
						'CanGender' => Yii::app()->request->getPost('gender'),
						'CanDOB' => Yii::app()->request->getPost('date_of_birth'),
						'CanPhNo' => Yii::app()->request->getPost('phone'),
						'CanReligion' => Yii::app()->request->getPost('religion'),
						'CanPic' => $imageFileName,
						); 
			Yii::app()->session['user_pic'] = $imageFileName;			
			Candidatedetails::model()->updateall($update, 'CanID=:id', array(':id' => Yii::app()->user->id));
			Yii::app()->user->setState('name', Yii::app()->request->getPost('first_name').' '.Yii::app()->request->getPost('last_name'));
			Yii::app()->session['success'] =  'Your Profile has been updated successfully';
			$this->redirect(array('site/index'));		
			
		}
		else
		   $this->redirect(array('site/index'));
	}
	public function actionlogin()
	{
		if(Yii::app()->request->getPost('signup'))
		{
			$model = new SignupForm;
			$model->attributes = $_POST;
			// validate user input and redirect to the previous page if valid
			$model->validate();
			
			if($model->validate())
			{
				$signup = new Candidatedetails;
				$signup->attributes = array(
							'CanFirstName' => Yii::app()->request->getPost('first_name'),
							'CanLastName' => Yii::app()->request->getPost('last_name'),
							'email' => Yii::app()->request->getPost('email'),
							'CanCNIC' => Yii::app()->request->getPost('cnic'),
							'password' => md5(Yii::app()->request->getPost('password')),
							); 
				$signup->save(false);
				Yii::app()->session['success'] = 'Your account has been created, please login.';
				$this->redirect(array('site/login'));
				Yii::app()->end();			
			}
			else
			{
				$signup_error = $model->errors;
				//echo '<pre>'; print_r($signup_error); exit;
				//$this->refresh();
				$this->render('login', array(
									'signup_error' => $signup_error,
									'prev_values' => $_POST,
									));
			}
		}
		else if(Yii::app()->request->getPost('login'))
		{ 
			$model = new LoginForm;
		    $model->attributes = $_POST;
			if($model->validate())
			{
							
				$identity = new UserLogin(Yii::app()->request->getPost('cnic'),Yii::app()->request->getPost('password'));
				if($identity->authenticate()){
					Yii::app()->user->login($identity);
					Yii::app()->session->remove('error');
					
					$this->redirect(array('site/index'));
					Yii::app()->end();
				}else
				{
					Yii::app()->session->add('error', 'Invalid login information');
					$this->redirect(array('site/login'));
					Yii::app()->end();
				}
				
				//$model=Department::model()->findByPk((int)$id);
			}
			else
			{
				$login_error = $model->errors;
				$this->render('login', array(
									'login_error' => $login_error,
									'prev_values' => $_POST,
									));
			}
			  
		}
		else
			$this->render('login');
		
	}
	public function actionLogin2()
	{
		$model = new Admin;
		
		if(isset($_POST['Admin']))
		{
						
			$identity = new UserLogin($_POST['Admin']['username'],$_POST['Admin']['password']);
			
			if($identity->authenticate()){
				Yii::app()->user->login($identity);
				Yii::app()->session->remove('error');
				
				$this->redirect(array('default/index'));
				Yii::app()->end();
			}else
			{
				Yii::app()->session->add('error', 'Invalid login information');
				$this->redirect(array('default/login'));
				Yii::app()->end();
			}
			
			//$model=Department::model()->findByPk((int)$id);
		}
		
		$this->render('login', array('model' => $model));
	}
	
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(array('site/login'));
		Yii::app()->end();
	}
	public function actionLogins()
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
    public function actionacademic()
	{
		$this->render('academic');
	}
	public function actionupdate_academic()
	{
		if(Yii::app()->request->getPost('academic')) 
		{   
			$last_rec = Academicinfo::model()->findall(array('order' => 'AcademicID DESC'));
			$educ = new Academicinfo;
			$educ->attributes = array(
						'AcademicID' => isset($last_rec[0]->AcademicID) ? $last_rec[0]->AcademicID + 1 : '',
						'CanID' => Yii::app()->user->id,
						'DegreeTitle' => Yii::app()->request->getPost('deg_title'),
						'MajorSubject' => Yii::app()->request->getPost('maj_sub'),
						'YearPassing' => Yii::app()->request->getPost('pass_yr'),
						'ObtainedMarks' => Yii::app()->request->getPost('obt_marks'),
						'TotalMarks' => Yii::app()->request->getPost('total_marks'),
						'BoardUniversity' => Yii::app()->request->getPost('b_uni'),
						); 
			$educ->save(false);			
			Yii::app()->session['success'] =  'New Academic record has been added.';
			$this->redirect(array('site/index'));
		}
		else if(Yii::app()->request->getPost('edit_academic')) 
		{   
			$update = array(
						'DegreeTitle' => Yii::app()->request->getPost('deg_title'),
						'MajorSubject' => Yii::app()->request->getPost('maj_sub'),
						'YearPassing' => Yii::app()->request->getPost('pass_yr'),
						'ObtainedMarks' => Yii::app()->request->getPost('obt_marks'),
						'TotalMarks' => Yii::app()->request->getPost('total_marks'),
						'BoardUniversity' => Yii::app()->request->getPost('b_uni'),
						); 
			Academicinfo::model()->updateall($update, 'AcademicID=:id', array(':id' => base64_decode(Yii::app()->request->getPost('edit_academic'))));		
			Yii::app()->session['success'] = 'Record updated successfully';
			$this->redirect(array('site/index'));
		}
		else
		  $this->redirect(array('site/index'));
	}
	// del academic record
	public function actiondel_academic($id)
	{
		if(isset($id) && $id != '')
		{
			Academicinfo::model()->deleteall('AcademicID=:id', array(':id' => base64_decode($id)));
			Yii::app()->session['success'] = 'Record deleted successfully';
			$this->redirect(array('site/index'));		
		}
		else
		   $this->redirect(array('site/index'));
	}
	// Certification section
	public function actionupdate_certificate()
	{  
		if(Yii::app()->request->getPost('Cert')) 
		{    
			$last_rec = Certificatedetails::model()->findall(array('order' => 'CertID DESC'));
			$cert = new Certificatedetails;
			$cert->attributes = array(
						'CertID' => isset($last_rec[0]->CertID) ? $last_rec[0]->CertID + 1 : '',
						'CanID' => Yii::app()->user->id,
						'CertName' => Yii::app()->request->getPost('c_name'),
						'CertInstitute' => Yii::app()->request->getPost('c_institute'),
						'CertFrom' => Yii::app()->request->getPost('c_start_date'),
						'CertTo' => Yii::app()->request->getPost('c_end_date'),
						'CertGrade' => Yii::app()->request->getPost('c_grade'),
						'CertCertifiedBy' => Yii::app()->request->getPost('c_certified'),
						); 
			$cert->save(false);			
			Yii::app()->session['success'] =  'New Certication record has been added.';
			$this->redirect(array('site/index'));
		}
		else if(Yii::app()->request->getPost('edit_Cert')) 
		{   
			$update = array(
						'CertName' => Yii::app()->request->getPost('c_name'),
						'CertInstitute' => Yii::app()->request->getPost('c_institute'),
						'CertFrom' => Yii::app()->request->getPost('c_start_date'),
						'CertTo' => Yii::app()->request->getPost('c_end_date'),
						'CertGrade' => Yii::app()->request->getPost('c_grade'),
						'CertCertifiedBy' => Yii::app()->request->getPost('c_certified'),
						); 
			Certificatedetails::model()->updateall($update, 'CertID=:id', array(':id' => base64_decode(Yii::app()->request->getPost('edit_Cert'))));		
			Yii::app()->session['success'] = 'Record updated successfully';
			$this->redirect(array('site/index'));
		}
		else
		  $this->redirect(array('site/index'));
	}
	// del academic record
	public function actiondel_certificate($id)
	{
		if(isset($id) && $id != '')
		{
			Certificatedetails::model()->deleteall('CertID=:id', array(':id' => base64_decode($id)));
			Yii::app()->session['success'] = 'Record deleted successfully';
			$this->redirect(array('site/index'));		
		}
		else
		   $this->redirect(array('site/index'));
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