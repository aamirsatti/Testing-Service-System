<?php

class PostController extends Controller
{
	public function actionIndex()
	{
		$this->render('index');
	}
    // add
    public function actionadd()
    { 
    	$org = Organization::model()->findall();
    	if(Yii::app()->request->getPost('name'))
		{      
		    $last_record = Post::model()->findall(array('order' => 'PID DESC'));  
	        $post = new Post;
			$post->attributes = array(
								'PostID' => (isset($last_record->PostID) ? $last_record->PostID + 1 : 101),
								'PostName' => Yii::app()->request->getPost('name'), 
								'PostGrade' => Yii::app()->request->getPost('grade'),
								'req_qualification' => Yii::app()->request->getPost('qualification'),
								'req_experience' => Yii::app()->request->getPost('education'),
								'PostAmount' => Yii::app()->request->getPost('fee'),
								'OrgID' => Yii::app()->request->getPost('org'), 
								'total_posts' => Yii::app()->request->getPost('total_posst')
								);
			$post->save(false);
			if(Yii::app()->request->getPost('test_quota') == 1 && Yii::app()->request->getPost('quota'))
			{
				
				foreach(Yii::app()->request->getPost('quota') as $key=>$value)
				{  
				    $location = new Location;
					$location->attributes = array(
									'Region' => $key,
									'Qouta' => $value,
									'PID' => $post->PID
									);
					$location->save(false);				
				}
				
			}
			Yii::app()->session['success'] = 'Post Added Successfully';
			
			$this->redirect(array('post/list'));
		}  
		else
			$this->render('add', array('org' => $org));
    }
    public function actionlist()
	{
		$org = Organization::model()->findall();
		$post = Post::model()->findall(array('order' => 'PID DESC'));
		Yii::app()->session['org'] = '';
		$this->render('list',array('post' => $post, 'org' => $org));

	}
	
	// Get post against org
	public function actionposts_list($id)
	{
		if(isset($id) && $id != '')
		{
			$org = Organization::model()->findall();
			Yii::app()->session['org'] = base64_decode($id);
			$post = Post::model()->findall(array(
										'condition' => 'OrgID=:id',
										'params' => array(':id' => base64_decode($id)),
										'order' => 'PID DESC'
										));
			$this->render('list',array('post' => $post, 'org' => $org));
		}
		else
		  $this->redirect(array('post/list'));
	}
	public function actionget_org_posts()
	{
		if(Yii::app()->request->getPost('orgID'))
		{
			$post = Post::model()->findall(array(
										'condition' => 'OrgID=:id',
										'params' => array(':id' => base64_decode(Yii::app()->request->getPost('orgID'))),
										'order' => 'PID DESC'
										));
			$this->renderPartial('_ajax_listing', array('post' => $post));
		}
		else
		{
			$post = Post::model()->findall(array('order' => 'PID DESC'));
			$this->renderPartial('_ajax_listing', array('post' => $post));
		}
	}
	//edit
	public function actionedit($id)
    {
    	if(isset($id) && $id != '')
		{
			$org = Organization::model()->findall();
			$post = Post::model()->with(array('locations'))->find('t.PID=:PID', array(':PID' => base64_decode($id)));
			if(Yii::app()->request->getPost('name'))
			{      
				$post = new Post;
				$update = array(
							'PostName' => Yii::app()->request->getPost('name'), 
							'PostGrade' => Yii::app()->request->getPost('grade'),
							'req_qualification' => Yii::app()->request->getPost('qualification'),
							'req_experience' => Yii::app()->request->getPost('education'),
							'PostAmount' => Yii::app()->request->getPost('fee'),
							'OrgID' => Yii::app()->request->getPost('org'),
							'total_posts' => Yii::app()->request->getPost('total_posst')
							);
				Post::model()->updateall($update, 'PID=:PID', array(':PID' => base64_decode($id)));
				// delete all old quota from location table
				Location::model()->deleteall('PID=:PID', array(':PID' => base64_decode($id)));
				if(Yii::app()->request->getPost('test_quota') == 1 && Yii::app()->request->getPost('quota'))
				{
					
					foreach(Yii::app()->request->getPost('quota') as $key=>$value)
					{  
						$location = new Location;
						$location->attributes = array(
										'Region' => $key,
										'Qouta' => $value,
										'PID' => base64_decode($id)
										);
						$location->save(false);				
					}
					
				}
				Yii::app()->session['success'] = 'Post Updated Successfully';
				$this->redirect(array('post/list'));
			}  
			else
				$this->render('add', array('org' => $org, 'post' => $post));
		}
		else
		   $this->redirect(array('Post/list'));
    }
	// delete
	public function actiondelete($id)
	{
		if(isset($id) && $id != '')
		{
			Post::model()->deleteall('PID=:PID' , array(':PID' => base64_decode($id)));  
			Yii::app()->session['success'] = 'Post Deleted Successfully';
			$this->redirect(array('post/list'));
		}
		else
		  $this->redirect(array('post/list'));
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