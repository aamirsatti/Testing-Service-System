<?php

class DepartmentController extends Controller
{
	public function actionIndex()
	{
		$this->render('index');
	}
	// Add
	public function actionadd()
	{
		if(Yii::app()->request->getPost('dep_title'))
		{
			$last_record = Department::model()->find(array('order' => 'DepID DESC'));
			$dep = new Department;
			$dep->attributes = array(
				                'DepID' => $last_record->DepID + 1,
								'DepName' => Yii::app()->request->getPost('dep_title'), 
								'DepType' => Yii::app()->request->getPost('dep_type'),
								'DepDesc' => Yii::app()->request->getPost('dep_detail')
								);
			$dep->save(false);
			Yii::app()->session['success'] = 'Department Added Successfully';
			$this->redirect(array('department/list'));
		}  
		else
			$this->render('add');
	}
	// Listing 
	public function actionlist()
	{
		$dep = Department::model()->findall();
		$this->render('list',array('dep' => $dep));

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