<?php

class OrganizationController extends Controller
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
			$last_record = Organization::model()->find(array('order' => 'OrgID DESC'));
			$org = new Organization;
			$org->attributes = array(
				                'OrgID' => (isset($last_record->OrgID) ? $last_record->OrgID : 0) + 1,
								'OrgName' => Yii::app()->request->getPost('dep_title'), 
								'org_type' => Yii::app()->request->getPost('dep_type'),
								//'DepDesc' => Yii::app()->request->getPost('dep_detail')
								);
			$org->save(false);
			Yii::app()->session['success'] = 'Organization Added Successfully';
			$this->redirect(array('Organization/list'));
		}  
		else
			$this->render('add');
	}
	// Listing 
	public function actionlist()
	{
		$org = Organization::model()->findall();
		$this->render('list',array('org' => $org));

	}
	//edit
	//
	public function actionedit($id)
	{
		if(isset($id) && $id != '')
		{
			if(Yii::app()->request->getPost('dep_title'))
			{
				$update = array(
							'OrgName' => Yii::app()->request->getPost('dep_title'), 
							'org_type' => Yii::app()->request->getPost('dep_type'),
							//'DepDesc' => Yii::app()->request->getPost('dep_detail')
							);  
				Organization::model()->updateall($update, 'OrgID=:id' , array(':id' => base64_decode($id)));  
				Yii::app()->session['success'] = 'Organization Updated Successfully';
				$this->redirect(array('Organization/list'));
			}  
			else
			{
				$rec = Organization::model()->find('OrgID=:id' , array(':id' => base64_decode($id)));
				$this->render('add', array('rec' => $rec));
			}
		}
		else
		  $this->redirect(array('Organization/list'));
	}
	// delete
	public function actiondelete($id)
	{
		if(isset($id) && $id != '')
		{
			Organization::model()->deleteall('OrgID=:id' , array(':id' => base64_decode($id)));  
			Yii::app()->session['success'] = 'Organization Deleted Successfully';
			$this->redirect(array('Organization/list'));
		}
		else
		  $this->redirect(array('Organization/list'));
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