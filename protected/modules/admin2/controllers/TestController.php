<?php

class TestController extends Controller
{
	public function actionlist()
	{
		$test_data = Test::model()->findall(array('order' => 'id DESC'));
		$this->render('list', array('test_data' => $test_data));
	}
    // Add test
	public function actionadd()
	{
		if(Yii::app()->request->getPost('test_data'))
		{
			$imageFileName = '';
			if(isset($_FILES['test_form']) && $_FILES['test_form']['name'] != '')
			{ 
				 $picture = new CUploadedFile($_FILES['test_form']['name'],$_FILES['test_form']['tmp_name'],$_FILES['test_form']['type'],$_FILES['test_form']['size'],$_FILES['test_form']['error']);
				// $picture->getInstance($model, 'item_image');
				 $imageFileName = time().'_'.str_replace(" ","_",$_FILES['test_form']['name']);
				 $picture->saveAs(Yii::getPathOfAlias('webroot') ."/uploads/test_forms/".$imageFileName);
			}
			$model = new Test;  
			$model->attributes = array(      
								'test_title' => Yii::app()->request->getPost('test_title'),
								'test_date' => Yii::app()->request->getPost('test_date'),
								'test_detail' => stripslashes(nl2br(Yii::app()->request->getPost('test_detail'))),
								'test_fee' => Yii::app()->request->getPost('test_fee'),
								'last_date_apply' => Yii::app()->request->getPost('last_date_apply'),
								'test_application_form' => $imageFileName,
								);
			$model->save(false);					
			Yii::app()->session['success'] = 'Test " '. Yii::app()->request->getPost('test_title'). '" has been added successfully.';	
			$this->redirect(array('test/list'));
		}
		$this->render('add');
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