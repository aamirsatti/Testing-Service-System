<?php

class CategoryController extends Controller
{
	public function actionIndex()
	{
		$category = Category::model()->findall();
		$this->render('listing', array('category' => $category));
	}
    public function actionadd()
	{  //if($_POST){ echo '<pre>'; print_r($_POST); }
	    
		if(isset($_POST['Category']))
		{      
			$imageFileName = '';
			
			$Category = new Category;
			$Category_data = array(
						'cat_name' => Yii::app()->request->getPost('cat_title'),
						);      
			$Category->attributes = $Category_data;
			//	Yii::app()->session['user_name'] = $_POST['signup']['first_name'].' '.$_POST['signup']['last_name'];		
			$Category->save(false);
			Yii::app()->session['success'] = "Category added successfully.";
			$this->redirect(array('category/index'));
			exit;
		}
		$category = Category::model()->findall();
		$this->render('add_cat',array('category' => $category));
	}
	/* *
	* Edit Category
	*/
	public function actionedit($id)
	{  //if($_POST){ echo '<pre>'; print_r($_POST); }
		if(isset($_POST['Category']))
		{      
			
			$Category_data = array(
						'cat_name' => Yii::app()->request->getPost('cat_title'),
						);      
			Category::model()->updateall($Category_data,'id=:id',array(':id' => base64_decode($id)));
			//$product->attributes = $products_data;
			//	Yii::app()->session['user_name'] = $_POST['signup']['first_name'].' '.$_POST['signup']['last_name'];		
			//$product->save(false);
			Yii::app()->session['success'] = "Category Updated successfully.";
			$this->redirect(array('category/index'));
			exit;
		}
		$category = Category::model()->find('id=:id',array(':id' => base64_decode($id)));
		if(!empty($category))
			$this->render('add_cat', array('category' => $category));
		else
			$this->redirect(array(Yii::app()->homeUrl.'site/error'));

	}
    // Delete Product
    public function actiondelete($id)
    {
    	$category = Category::model()->find('id=:id',array(':id' => base64_decode($id)));
    	if(!empty($category))
    	{
    		category::model()->deleteall('id=:id',array(':id' => base64_decode($id)));
			Yii::app()->session['success'] = "Category deleted successfully.";
			$this->redirect(array('category/index'));
			exit;
		}
		else
			$this->redirect(array(Yii::app()->homeUrl.'site/error'));


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