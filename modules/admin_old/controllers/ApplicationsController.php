<?php

class ApplicationsController extends Controller
{
	public function actionIndex()
	{ 
		$applications = Pstcandloctestcentr::model()->findall(array('order' => 'PCLTCID DESC'));
		$this->render('list', array('applications' => $applications));
	}
	public function actionadd()
	{
		if(Yii::app()->request->getPost('step_1_basic_info'))
		{
			$data['User_basic_info'] = $_POST;
			Yii::app()->session['user_profile'] = $data['User_basic_info'];
			$user = new Candidatedetails;
			$user->attributes = array(
						'CanFirstName' => Yii::app()->request->getPost('first_name'),
						'CanLastName' => Yii::app()->request->getPost('last_name'),
						'CanGender' => Yii::app()->request->getPost('gender'),
						'CanDOB' => Yii::app()->request->getPost('date_of_birth'),
						'CanPhNo' => Yii::app()->request->getPost('phone'),
						'CanReligion' => Yii::app()->request->getPost('religion'),
						'CanCNIC' => Yii::app()->request->getPost('cnic'),
						'CanPostalAdd' => Yii::app()->request->getPost('postal_address'),
						'CanCity' => Yii::app()->request->getPost('city'),
						'CanDistrict' => Yii::app()->request->getPost('district'),
						);
			$user->save(false);	
			Yii::app()->session['candidate_profile'] = $user->CanID;	
			$this->redirect(array('applications/step_2'));
		}
		else
			$this->render('add');
	}
	// step 2
	public function actionstep_2()
	{ 
		if(Yii::app()->session['candidate_profile'] != '')
		{
			if(Yii::app()->request->getPost('step_1_basic_info'))
			{
				$data['User_basic_info'] = $_POST;
				Yii::app()->session['user_profile'] = $data['User_basic_info'];
				$this->redirect(array('application/step_2'));
			}
			else
			{
				$user_data = Candidatedetails::model()->with(array(
										'academicinfos'
										))->find('t.CanID=:id', array(':id' => Yii::app()->session['candidate_profile']));
				$this->render('step_2', array('user_data' => $user_data));
			}
		}
		else
		   $this->redirect(array('applications/index'));
	}
	// step 3  Post applied for
	public function actionstep_3()
	{ 
		if(Yii::app()->request->getParam('PCLTC'))
		{
			$post_cand = Pstcandloctestcentr::model()->find('PCLTCID=:id', array(':id' => base64_decode(Yii::app()->request->getParam('PCLTC'))));
			if(!empty($post_cand))
			{
				Yii::app()->session['candidate_profile'] = isset($post_cand->can->CanID) ? $post_cand->can->CanID : '' ;
				Yii::app()->session['pcltc_orgID'] = isset($post_cand->p->org->OrgID) ? $post_cand->p->org->OrgID : '' ;
			}
		}
		else
		   $post_cand = array();
		
		if(Yii::app()->session['candidate_profile'] != '')
		{
			if(Yii::app()->request->getPost('step_3_post_applied'))
			{           
				$model = new Pstcandloctestcentr;
				$model->attributes = array(
								'CanID' => Yii::app()->session['candidate_profile'],
								'PID' => Yii::app()->request->getPost('test_post'),
								'form_reg_no' => Yii::app()->request->getPost('form_reg'),
								'bank_slip' => Yii::app()->request->getPost('bank_slip'),
								'submit_date' => Yii::app()->request->getPost('submit_date'),
								'status' => Yii::app()->request->getPost('status'),
								);
				$model->save(false);	
				Yii::app()->session['success'] = 'New Candidate test record addedd.';	
				$this->redirect(array('applications/index'));		
			}
			else if(Yii::app()->request->getPost('step_3_post_applied_update'))
			{           
				$model = new Pstcandloctestcentr;
				$update = array(
								'PID' => Yii::app()->request->getPost('test_post'),
								'form_reg_no' => Yii::app()->request->getPost('form_reg'),
								'bank_slip' => Yii::app()->request->getPost('bank_slip'),
								'submit_date' => Yii::app()->request->getPost('submit_date'),
								'status' => Yii::app()->request->getPost('status'),
								);
				Pstcandloctestcentr::model()->updateall($update, 'PCLTCID=:id', array(':id' => base64_decode(Yii::app()->request->getParam('PCLTC'))));				
				Yii::app()->session['success'] = 'Candidate Record updated.';
				$this->redirect(array('applications/index'));
			}
			else
			{
				$org = Organization::model()->findall();
				$this->render('step_3', array('org' => $org, 'post_cand' => $post_cand));
			}
		}
		else
		   $this->redirect(array('applications/index'));
	}
	
	public function actionCheckCNIC()
	{
		if(Yii::app()->request->getPost('cnic') && Yii::app()->request->getPost('email'))
		{
			$cnic = 0;
			$email = 0;
			$check = Candidatedetails::model()->find('CanCNIC=:cnic' , array(':cnic' => Yii::app()->request->getPost('cnic')));
			$check_email = Candidatedetails::model()->find('email=:email' , array(':email' => Yii::app()->request->getPost('email')));
			if(!empty($check))
			     $cnic = 1;
			if(!empty($check_email))
			     $email = 1;
			echo json_encode(array('status' => 'success', 'cnic' => $cnic, 'email' => $email));	 
		}
		else
			echo 'fail';	
	}
	// User Profile
	public function actionCheckuserProfile()
	{
		if(Yii::app()->request->getPost('cnic'))
		{
			$check = Candidatedetails::model()->find('CanCNIC=:cnic' , array(':cnic' => Yii::app()->request->getPost('cnic')));
			if(!empty($check))
			{
			     Yii::app()->session['candidate_profile'] = $check->CanID;
				 echo 'success';
			}
			else
			   echo 'fail';	 
		}
		else
			echo 'fail';	
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
			Candidatedetails::model()->updateall($update, 'CanID=:id', array(':id' => Yii::app()->session['candidate_profile']));
			Yii::app()->session['success'] =  'Your Profile has been updated successfully';
			$this->redirect(array('applications/step_2'));		
			
		}
		else
		   $this->redirect(array('applications/step_2'));
	}
	// Update Academic information
	public function actionupdate_academic()
	{
		if(Yii::app()->request->getPost('academic')) 
		{   
			$last_rec = Academicinfo::model()->findall(array('order' => 'AcademicID DESC'));
			$educ = new Academicinfo;
			$educ->attributes = array(
						'AcademicID' => isset($last_rec[0]->AcademicID) ? $last_rec[0]->AcademicID + 1 : '',
						'CanID' => Yii::app()->session['candidate_profile'],
						'DegreeTitle' => Yii::app()->request->getPost('deg_title'),
						'MajorSubject' => Yii::app()->request->getPost('maj_sub'),
						'YearPassing' => Yii::app()->request->getPost('pass_yr'),
						'ObtainedMarks' => Yii::app()->request->getPost('obt_marks'),
						'TotalMarks' => Yii::app()->request->getPost('total_marks'),
						'BoardUniversity' => Yii::app()->request->getPost('b_uni'),
						); 
			$educ->save(false);			
			Yii::app()->session['success'] =  'New Academic record has been added.';
			$this->redirect(array('applications/step_2'));
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
			$this->redirect(array('applications/step_2'));
		}
		else
		  $this->redirect(array('applications/step_2'));
	}
	// del academic record
	public function actiondel_academic($id)
	{
		if(isset($id) && $id != '')
		{
			Academicinfo::model()->deleteall('AcademicID=:id', array(':id' => base64_decode($id)));
			Yii::app()->session['success'] = 'Record deleted successfully';
			$this->redirect(array('applications/step_2'));		
		}
		else
		   $this->redirect(array('applications/step_2'));
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
						'CanID' => Yii::app()->session['candidate_profile'],
						'CertName' => Yii::app()->request->getPost('c_name'),
						'CertInstitute' => Yii::app()->request->getPost('c_institute'),
						'CertFrom' => Yii::app()->request->getPost('c_start_date'),
						'CertTo' => Yii::app()->request->getPost('c_end_date'),
						'CertGrade' => Yii::app()->request->getPost('c_grade'),
						'CertCertifiedBy' => Yii::app()->request->getPost('c_certified'),
						); 
			$cert->save(false);			
			Yii::app()->session['success'] =  'New Certication record has been added.';
			$this->redirect(array('applications/step_2'));
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
			$this->redirect(array('applications/step_2'));
		}
		else
		  $this->redirect(array('applications/step_2'));
	}
	// del academic record
	public function actiondel_certificate($id)
	{
		if(isset($id) && $id != '')
		{
			Certificatedetails::model()->deleteall('CertID=:id', array(':id' => base64_decode($id)));
			Yii::app()->session['success'] = 'Record deleted successfully';
			$this->redirect(array('applications/step_2'));		
		}
		else
		   $this->redirect(array('applications/step_2'));
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