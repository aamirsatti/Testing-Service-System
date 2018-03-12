<?php

class TestController extends Controller
{
	public function actionlist()
	{ 
		$org = Organization::model()->findall();
		Yii::app()->session['org'] = '';
		$test_data = Testtype::model()->findall(array('order' => 'TID DESC'));
		$this->render('list', array('test_data' => $test_data, 'org' => $org));
	}
	// Get tests against org
	public function actiontest_list($id)
	{
		if(isset($id) && $id != '')
		{
			$org = Organization::model()->findall();
			Yii::app()->session['org'] = base64_decode($id);
			$test = Testtype::model()->findall(array(
										'condition' => 'OrgID=:id',
										'params' => array(':id' => base64_decode($id)),
										'order' => 'TID DESC'
										));
			$this->render('list',array('test_data' => $test, 'org' => $org));
		}
		else
		  $this->redirect(array('post/list'));
	}
    // Add test
	public function actionadd()
	{
		if(Yii::app()->request->getPost('test_data'))
		{   
			// Test Application
			$imageFileName = '';
			if(isset($_FILES['test_form']) && $_FILES['test_form']['name'] != '')
			{ 
				 $picture = new CUploadedFile($_FILES['test_form']['name'],$_FILES['test_form']['tmp_name'],$_FILES['test_form']['type'],$_FILES['test_form']['size'],$_FILES['test_form']['error']);
				// $picture->getInstance($model, 'item_image');
				 $imageFileName = time().'_'.str_replace(" ","_",$_FILES['test_form']['name']);
				 $picture->saveAs(Yii::getPathOfAlias('webroot') ."/uploads/test_forms/".$imageFileName);
			}
            // test Ad
             $test_ad = '';
			if(isset($_FILES['test_ad']) && $_FILES['test_ad']['name'] != '')
			{ 
				 $picture = new CUploadedFile($_FILES['test_ad']['name'],$_FILES['test_ad']['tmp_name'],$_FILES['test_ad']['type'],$_FILES['test_ad']['size'],$_FILES['test_ad']['error']);
				// $picture->getInstance($model, 'item_image');
				 $test_ad = time().'_'.str_replace(" ","_",$_FILES['test_ad']['name']);
				 $picture->saveAs(Yii::getPathOfAlias('webroot') ."/uploads/test_ads/".$test_ad);
			}
			$model = new Testtype;
			$model->attributes = array(      
								'TestID' => '', 
								'TestName' => Yii::app()->request->getPost('test_title'),
								'TestDate' => Yii::app()->request->getPost('test_date'),
								'TestDesc' => stripslashes(nl2br(Yii::app()->request->getPost('test_detail'))),
								'ApplicationStartDate' => date('Y-m-d', strtotime(Yii::app()->request->getPost('application_start_date'))),
								'ApplicationEndDate' => date('Y-m-d', strtotime(Yii::app()->request->getPost('application_end_date'))),
								'test_ad' => $test_ad,
								'OrgID' => base64_decode(Yii::app()->request->getPost('org'))
								);
			$model->save(false);	
			//echo '<pre>'; print_r(Yii::app()->request->getPost('org_post')); exit;
			if(Yii::app()->request->getPost('org_post'))
			{
				foreach(Yii::app()->request->getPost('org_post') as $rec)
				{
					$update = array('TID' => $model->TID);
					Post::model()->updateall($update, 'PID=:PID', array(':PID' => $rec));
				}
			}				
			Yii::app()->session['success'] = ' " '. Yii::app()->request->getPost('test_title'). '" has been added successfully.';	
			Yii::app()->session['test_'] = base64_encode($model->TID);
			/*$dep_data = Organization::model()->find('OrgID=:OrgID', array(':OrgID' => base64_decode(Yii::app()->request->getPost('org')))); 
			$posts = Post::model()->findall('TID=:TID', array(':TID' => $model->TID));
			$post_array = array();
			foreach($posts as $r)
			{
				$post_array[]['PostName'] = $r->PostName;
			}
			$random = rand('1234567890', 10);
			$test_file_name = substr(str_replace(" ","-", $dep_data->OrgName),0,5).'_'.substr(str_replace(" ","_",Yii::app()->request->getPost('test_title')),0,5).'_'.$random;
			//Update test file name
			$update = array('application_file' => $test_file_name);
			Testtype::model()->updateall($update, 'TID=:TID', array(':TID' => $model->TID));
			//_______________________
			$application_form_data = array('dep' => $dep_data->OrgName,
										   'posts' => $post_array,
										   'test_file_name' => $test_file_name);
			Yii::app()->session['application_form_data'] = $application_form_data;
			//$this->redirect(array('test/list'));
			$this->redirect(yii::app()->baseurl.'/resources/tcpdf/examples/form_pdf.php');*/
			$this->redirect(array('test/list'));
		}
		$org = Organization::model()->findall();
		$post = Post::model()->findall();
		$this->render('add', array('org' => $org, 'post' => $post));
	}
	//
	// Edit test
	public function actionedit($id)
	{
		if(isset($id) && $id != '')
		{
			if(Yii::app()->request->getPost('test_data'))
			{
				// Test Application
				$imageFileName = Yii::app()->request->getPost('prev_test_form');
				if(isset($_FILES['test_form']) && $_FILES['test_form']['name'] != '')
				{ 
					 $picture = new CUploadedFile($_FILES['test_form']['name'],$_FILES['test_form']['tmp_name'],$_FILES['test_form']['type'],$_FILES['test_form']['size'],$_FILES['test_form']['error']);
					// $picture->getInstance($model, 'item_image');
					 $imageFileName = time().'_'.str_replace(" ","_",$_FILES['test_form']['name']);
					 $picture->saveAs(Yii::getPathOfAlias('webroot') ."/uploads/test_forms/".$imageFileName);
					 if(Yii::app()->request->getPost('prev_test_form') && is_file(Yii::getPathOfAlias('webroot') ."/uploads/test_forms/".Yii::app()->request->getPost('prev_test_form')))
					 {
   					  	 @unlink(Yii::getPathOfAlias('webroot') ."/uploads/test_forms/".Yii::app()->request->getPost('prev_test_form'));		
					 }
				}
	            // test Ad
	             $test_ad = Yii::app()->request->getPost('prev_test_ad');;
				if(isset($_FILES['test_ad']) && $_FILES['test_ad']['name'] != '')
				{ 
					 $picture = new CUploadedFile($_FILES['test_ad']['name'],$_FILES['test_ad']['tmp_name'],$_FILES['test_ad']['type'],$_FILES['test_ad']['size'],$_FILES['test_ad']['error']);
					// $picture->getInstance($model, 'item_image');
					 $test_ad = time().'_'.str_replace(" ","_",$_FILES['test_ad']['name']);
					 $picture->saveAs(Yii::getPathOfAlias('webroot') ."/uploads/test_ads/".$test_ad);
					 if(Yii::app()->request->getPost('prev_test_ad') && is_file(Yii::getPathOfAlias('webroot') ."/uploads/test_ads/".Yii::app()->request->getPost('prev_test_ad')))
					 {
   					  	 @unlink(Yii::getPathOfAlias('webroot') ."/uploads/test_ads/".Yii::app()->request->getPost('prev_test_ad'));		
					 }
				}
				$update = array(      
							'TestName' => Yii::app()->request->getPost('test_title'),
							'TestDate' => Yii::app()->request->getPost('test_date'),
							'TestDesc' => stripslashes(nl2br(Yii::app()->request->getPost('test_detail'))),
							'ApplicationStartDate' => date('Y-m-d', strtotime(Yii::app()->request->getPost('application_start_date'))),
							'ApplicationEndDate' => date('Y-m-d', strtotime(Yii::app()->request->getPost('application_end_date'))),
							'test_ad' => $test_ad,
							'OrgID' => base64_decode(Yii::app()->request->getPost('org'))
							);
				Testtype::model()->updateall($update, 'TID=:id', array(':id' => base64_decode($id)));	

				if(Yii::app()->request->getPost('org_post'))
				{
					foreach(Yii::app()->request->getPost('org_post') as $rec)
					{
						$update = array('TID' => base64_decode($id));
						Post::model()->updateall($update, 'PID=:PID', array(':PID' => $rec));
					}
				}					
				Yii::app()->session['success'] = ' " '. Yii::app()->request->getPost('test_title'). '" has been updated successfully.';	
				//Yii::app()->session['test_'] = base64_encode($model->TID);
				/*$dep_data = Organization::model()->find('OrgID=:OrgID', array(':OrgID' => base64_decode(Yii::app()->request->getPost('org')))); 
				$posts = Post::model()->findall('TID=:TID', array(':TID' => base64_decode($id)));
				$post_array = array();
				foreach($posts as $r)
				{
					$post_array[]['PostName'] = $r->PostName;
				}
				$random = rand('1234567890', 10);
				$test_file_name = substr(str_replace(" ","-", $dep_data->OrgName),0,5).'_'.substr(str_replace(" ","_",Yii::app()->request->getPost('test_title')),0,5).'_'.$random;
				//Update test file name
				$update = array('application_file' => $test_file_name);
				Testtype::model()->updateall($update, 'TID=:TID', array(':TID' => base64_decode($id)));
				//_______________________
				$application_form_data = array('dep' => $dep_data->OrgName,
											   'posts' => $post_array,
											   'test_file_name' => $test_file_name);
				Yii::app()->session['application_form_data'] = $application_form_data;
				//$this->redirect(array('test/list'));
				$this->redirect(yii::app()->baseurl.'/resources/tcpdf/examples/form_pdf.php');*/
				$this->redirect(array('test/list'));
			}
			$data = Testtype::model()->find('TID=:id', array(':id' => base64_decode($id)));
			$org = Organization::model()->findall();
			$post = Post::model()->findall();
			if(!empty($data))
			{
				$this->render('add', array('data' => $data ,'org' => $org, 'post' => $post));
			}
			else
				$this->redirect(array('test/list'));
		}
		else
			$this->redirect(array('test/list'));
	}
	// delete
	public function actiondelete($id)
	{
		if(isset($id) && $id != '')
		{
			
				
			$data = Testtype::model()->find('TID=:id', array(':id' => base64_decode($id)));
			if(!empty($data))
			{
			    // update chile records
				$update = array('TID' => '');
				Post::model()->updateall($update, 'TID=:TID', array(':TID' => base64_decode($id)));
				if(isset($data->test_ad) && $data->test_ad != '' && is_file(Yii::getPathOfAlias('webroot') ."/uploads/test_ads/".$data->test_ad))
				{
					  	 @unlink(Yii::getPathOfAlias('webroot') ."/uploads/test_ads/".$data->test_ad);		
				}
				if(isset($data->application_file) && $data->application_file != '' && is_file(Yii::getPathOfAlias('webroot') ."/resources/tcpdf/examples/app_forms/".$data->application_file.".pdf"))
				{ 
					  	 @unlink(Yii::getPathOfAlias('webroot') ."/resources/tcpdf/examples/app_forms/".$data->application_file.".pdf");		
				}
				Testtype::model()->deleteall('TID=:id', array(':id' => base64_decode($id)));				
				Yii::app()->session['success'] = ' " '. $data->TestName. '" has been deleted successfully.';	
				$this->redirect(array('test/list'));	
			}
			else
				$this->redirect(array('test/list'));
		}
		else
			$this->redirect(array('test/list'));
	}
	// Get Posts
	public function actionget_posts()
	{
         if(Yii::app()->request->getPost('OrgID'))
         {
         	//$dep_post = Deppost
         	$post = Post::model()->with(array(
         						 'org' => array(
         						 	  'select' => false,
         						 	  'condition' => 'org.OrgID = :id',
         						 	  'params' => array(':id' => base64_decode(Yii::app()->request->getPost('OrgID')))	
         						 	)	
         						))->findall();
         	//$response = '<select multiple class="form-control" id="dep_post"  required name="dep_post[]">';
			$response = '<br/>';
         	if(!empty($post))
         	{
	         	foreach($post as $rec)
	         	{
	         		//$response .= '<option value="'.$rec->PID.'">'.$rec->PostName.' </option>';
					if(Yii::app()->request->getPost('test_ID') != '' && $rec->TID == Yii::app()->request->getPost('test_ID'))
					    $response .= '<input type="checkbox" name="org_post[]" checked="checked"  id="org_post_'.$rec->PID.'" value="'.$rec->PID.'" > '.$rec->PostName.' &nbsp;&nbsp; ';
					else if($rec->TID == '')
					    $response .= '<input type="checkbox" name="org_post[]"  id="org_post_'.$rec->PID.'" value="'.$rec->PID.'" > '.$rec->PostName.' &nbsp;&nbsp; ';
						
	         	} 
	        }
	        else
			{
	        	//$response .= '<option value="">No record available </option>'; 
				$response .= '<span style="color:red;"> No Post Available </span>';
			}
         	//$response .= ' </select>';
			$response .= '<br/>';
         	echo json_encode(array('status' => 'success', 'data' => $response)); 
         }
         else
            echo json_encode(array('error' => 'Invalid Input request')); 
	}
	// get test
	public function actionget_test()
	{
		if(Yii::app()->request->getPost('OrgID'))
         {
         	//$dep_post = Deppost
         	$test = Testtype::model()->findall(array(
         						 	  'condition' => 'OrgID =:id',
         						 	  'params' => array(':id' => base64_decode(Yii::app()->request->getPost('OrgID')))	
         						 	));
         	$response = '<select class="form-control" id="org_test"   name="test_name" onchange="get_post()">';
			if(!empty($test))
         	{
	         	foreach($test as $rec)
	         	{
	         		$response .= '<option value="'.$rec->TID.'">'.$rec->TestName.' </option>';
					//$response .= '<input type="checkbox" name="org_post[]" id="org_post_'.$rec->PID.'" value="'.$rec->PID.'" > '.$rec->PostName.' &nbsp;&nbsp; ';
	         	} 
	        }
	        else 
			{
	        	$response .= '<option value="">No record available </option>'; 
				//$response .= '<span style="color:red;"> No Post Available </span>';
			}
         	$response .= ' </select>';
			//$response .= '<br/>';
         	echo json_encode(array('status' => 'success', 'data' => $response)); 
         }
         else
            echo json_encode(array('error' => 'Invalid Input request')); 
	}
	// Get test Posts
	public function actionget_tests_posts()
	{
         if(Yii::app()->request->getPost('testID'))
         {
         	//$dep_post = Deppost
         	$post = Post::model()->findall(array(
         						 	  'condition' => 'TID = :id',
         						 	  'params' => array(':id' => (Yii::app()->request->getPost('testID')))	
         						 	));
         	$response = '<select  class="form-control" id="test_post"  required name="test_post">';
			if(!empty($post))
         	{
	         	foreach($post as $rec)
	         	{
	         		$response .= '<option value="'.$rec->PID.'">'.$rec->PostName.' </option>';
					//$response .= '<input type="checkbox" name="org_post[]" id="org_post_'.$rec->PID.'" value="'.$rec->PID.'" > '.$rec->PostName.' &nbsp;&nbsp; ';
	         	} 
	        }
	        else
			{
	        	$response .= '<option value="">No record available </option>'; 
				//$response .= '<span style="color:red;"> No Post Available </span>';
			}
         	$response .= ' </select>';
			//$response .= '<br/>';
         	echo json_encode(array('status' => 'success', 'data' => $response)); 
         }
         else
            echo json_encode(array('error' => 'Invalid Input request')); 
	}
	// Get post against org
	public function actionget_org_test()
	{
		if(Yii::app()->request->getPost('orgID'))
		{
			$test = Testtype::model()->findall(array(
										'condition' => 'OrgID=:id',
										'params' => array(':id' => base64_decode(Yii::app()->request->getPost('orgID'))),
										'order' => 'TID DESC'
										));
			$this->renderPartial('_ajax_listing', array('test_data' => $test));
		}
		else
		{
			$test = Testtype::model()->findall(array('order' => 'TID DESC'));
			$this->renderPartial('_ajax_listing', array('test_data' => $test));
		}
	}
	/*            ----------------------------------------------------------
				  **********************************************************
				  					Test Schedule
				  **********************************************************
				  ----------------------------------------------------------
	*/
	public function actionschedule_test()
	{
		$org = Organization::model()->findall();
		$test = Testtype::model()->findall(array(
									'condition' => 'TestDate !=:date',
									'params' => array(':date' => '0000:00:00 00:00:00'),
									//'order' => 'TID DESC'
									));	
		$this->render('schedule_test', array('test_data' => $test, 'org' => $org));							
	}
	public function actionschedule_test_detail($id)
	{
		if(isset($id) && $id != '')
		{
			$test = Testtype::model()->find(array(
										'condition' => 'TID =:id',
										'params' => array(':id' => base64_decode($id)),
										));	
			$this->render('test_detail', array('data' => $test));		
		}
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