<?php

class CommentsController extends Controller
{
	// list
	public function actionlist()
	{
		$data = UserComments::model()->findall();
		$this->render('list', array('data' => $data));
	}
	// Add
	public function actionadd()
	{
		if(Yii::app()->request->getPost('work'))
		{ 
			$imageFileName = '';
			if(isset($_FILES['image']) && $_FILES['image']['name'] != '')
		    { 
				$picture = new CUploadedFile($_FILES['image']['name'],$_FILES['image']['tmp_name'],$_FILES['image']['type'],$_FILES['image']['size'],$_FILES['image']['error']);
				//$picture->getInstance($model, 'profile_picture');
				$imageFileName = time().'_'.str_replace(" ","_",$_FILES['image']['name']) ;
				$picture->saveAs(Yii::getPathOfAlias('webroot') ."/uploads/testimonial/".$imageFileName);
				// Image Resizing
				if(is_file(Yii::getPathOfAlias('webroot') ."/uploads/testimonial/".$imageFileName))
				{
					$image_resize = new ImageResize(Yii::getPathOfAlias('webroot') ."/uploads/testimonial/".$imageFileName);
					// Resize image to 170 X 170
					$image_resize->resizeImage(66, 66, 'exact', true);
					$image_resize->saveImage(Yii::getPathOfAlias('webroot') ."/uploads/testimonial/".$imageFileName, 100);
				}
		    }
			$work = new UserComments();
			$data = array(  
					'name' => Yii::app()->request->getPost('name'),
					'designation' => Yii::app()->request->getPost('designation'),
					'comment' => Yii::app()->request->getPost('description'),
					'image' => $imageFileName,
					'status' => Yii::app()->request->getPost('status'),
					);      			     
			$work->attributes = $data;
			$work->save(false);
			Yii::app()->session['success'] = 'Testimonial added successfully.';
			$this->redirect(array('comments/list'));		
		}
		$this->render('add');
	}
	// edit
	public function actionedit($id)
	{
		if(Yii::app()->request->getpost('work'))
		{      
			 
			$imageFileName = Yii::app()->request->getPost('prev_image'); 
			if(isset($_FILES['image']) && $_FILES['image']['name'] != '')
			{ 
				$picture = new CUploadedFile($_FILES['image']['name'],$_FILES['image']['tmp_name'],$_FILES['image']['type'],$_FILES['image']['size'],$_FILES['image']['error']);
				//$picture->getInstance($model, 'profile_picture');
				$imageFileName = time().'_'.str_replace(" ","_",$_FILES['image']['name']) ;
				$picture->saveAs(Yii::getPathOfAlias('webroot') ."/uploads/testimonial/".$imageFileName);
				// Image Resizing
				if(is_file(Yii::getPathOfAlias('webroot') ."/uploads/testimonial/".$imageFileName))
				{
					$image_resize = new ImageResize(Yii::getPathOfAlias('webroot') ."/uploads/testimonial/".$imageFileName);
					// Resize image to 170 X 170
					$image_resize->resizeImage(66, 66, 'exact', true);
					$image_resize->saveImage(Yii::getPathOfAlias('webroot') ."/uploads/testimonial/".$imageFileName, 100);
				}
			}
			$data = array(
						'name' => Yii::app()->request->getPost('name'),
						'designation' => Yii::app()->request->getPost('designation'),
						'comment' => Yii::app()->request->getPost('description'),
						'image' => $imageFileName,
						'status' => Yii::app()->request->getPost('status')
						);      
			UserComments::model()->updateall($data,'id=:id',array(':id' => base64_decode($id)));
			Yii::app()->session['success'] = "Testimonial updated successfully.";
			$this->redirect(array('comments/list'));
			exit;
		}
		$photo = UserComments::model()->find('id =:id', array(':id' => base64_decode($id)));
		$this->render('add', array('data' => $photo));
	}
	// Delete
    public function actiondelete($id)
    { 
    	$data = UserComments::model()->find('id=:id',array(':id' => base64_decode($id)));
    	if(!empty($data))
    	{
    		// delete photo records
			if($data->image != '' && is_file(Yii::getPathOfAlias('webroot') ."/uploads/testimonial/".$data->image))
			{
				@unlink(Yii::getPathOfAlias('webroot') ."/uploads/products/".$data->image);
			}
			UserComments::model()->deleteall('id=:id',array(':id' => base64_decode($id)));
			Yii::app()->session['success'] = "Testimonial deleted successfully.";
			$this->redirect(array('comments/list'));
			exit;
		}
		else
			$this->redirect(array('site/error'));

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