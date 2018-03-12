<?php
class ProductsController extends Controller
{
	public function actionlist()
	{
		$products = Products::model()->findall(array('order' => 'id desc'));
		Yii::app()->session['sellers_product'] = '';
		$this->render('listing', array('products' => $products));
	}
	public function actionadd()
	{  //if($_POST){ echo '<pre>'; print_r($_POST); }
	    
		if(isset($_POST['product']))
		{      
			$imageFileName = '';
			if(isset($_FILES['image']) && $_FILES['image']['name'] != '')
		    { 
				$picture = new CUploadedFile($_FILES['image']['name'],$_FILES['image']['tmp_name'],$_FILES['image']['type'],$_FILES['image']['size'],$_FILES['image']['error']);
				//$picture->getInstance($model, 'profile_picture');
				$imageFileName = time().'_'.str_replace(" ","_",$_FILES['image']['name']) ;
				$picture->saveAs(Yii::getPathOfAlias('webroot') ."/uploads/products/".$imageFileName);
				// Image Resizing
				if(is_file(Yii::getPathOfAlias('webroot') ."/uploads/products/".$imageFileName))
				{
					$image_resize = new ImageResize(Yii::getPathOfAlias('webroot') ."/uploads/products/".$imageFileName);
					// Resize image to 170 X 170
					$image_resize->resizeImage(200, 200, 'exact', true);
					$image_resize->saveImage(Yii::getPathOfAlias('webroot') ."/uploads/products/thumb/".$imageFileName, 100);
				}
		    }
		    $i = 0;
		    $is_exists = 0;     // check for slug
            do
            {
		    	$product_slug = str_replace(" ", "-", strtolower(Yii::app()->request->getPost('product_title')));
		    	if($is_exists == 1)
		    	{
		    		$random_code = substr(str_shuffle(MD5(microtime())), 0, 6);
		    		$product_slug = $product_slug.'-'.$random_code;
		    	}
		    	$check_slug = $this->checkSlug($product_slug); 
		    	if($check_slug == 1)
		    	{
		    		$i = 1;
		    	}
		    	else
		    	   $is_exists = 1;
		    }
		    while($i == 0); 
			$product = new Products;
			$products_data = array(
						'product_title' => Yii::app()->request->getPost('product_title'),
						'product_slug' => $product_slug,
						'cat_id' => Yii::app()->request->getPost('cat_id'),
						'description' => Yii::app()->request->getPost('description'),
						'product_url' => Yii::app()->request->getPost('product_url'),
						'promotion_details' => Yii::app()->request->getPost('promotion_details'),
						'promotion_end_date' => date('Y-m-d', strtotime(Yii::app()->request->getPost('promotion_end_date'))),
						'status' => Yii::app()->request->getPost('product_approve'),
						'image' => $imageFileName
						);      
			$product->attributes = $products_data;
			//	Yii::app()->session['user_name'] = $_POST['signup']['first_name'].' '.$_POST['signup']['last_name'];		
			$product->save(false);
			Yii::app()->session['product_success'] = "Product added successfully.";
			$this->redirect(array('products/list'));
			exit;
		}
		$category = Category::model()->findall();
		$this->render('add_product',array('category' => $category));
	}
    
	/* *
	* Edit Product
	*/
	public function actionedit($id)
	{  //if($_POST){ echo '<pre>'; print_r($_POST); }
		if(isset($_POST['product']))
		{      
			$imageFileName = Yii::app()->request->getPost('prev_image');
			if(isset($_FILES['image']) && $_FILES['image']['name'] != '')
		    { 
				$picture = new CUploadedFile($_FILES['image']['name'],$_FILES['image']['tmp_name'],$_FILES['image']['type'],$_FILES['image']['size'],$_FILES['image']['error']);
				//$picture->getInstance($model, 'profile_picture');
				$imageFileName = time().'_'.str_replace(" ","_",$_FILES['image']['name']) ;
				$picture->saveAs(Yii::getPathOfAlias('webroot') ."/uploads/products/".$imageFileName);
				// Image Resizing
				if(is_file(Yii::getPathOfAlias('webroot') ."/uploads/products/".$imageFileName))
				{
					$image_resize = new ImageResize(Yii::getPathOfAlias('webroot') ."/uploads/products/".$imageFileName);
					// Resize image to 170 X 170
					$image_resize->resizeImage(200, 200, 'exact', true);
					$image_resize->saveImage(Yii::getPathOfAlias('webroot') ."/uploads/products/thumb/".$imageFileName, 100);
				}
				if(Yii::app()->request->getPost('prev_image') != '')
				{
					@unlink(Yii::getPathOfAlias('webroot') ."/uploads/products/".Yii::app()->request->getPost('prev_image'));
					@unlink(Yii::getPathOfAlias('webroot') ."/uploads/products/thumb/".Yii::app()->request->getPost('prev_image'));
				}
		    }
			$products_data = array(
						'product_title' => Yii::app()->request->getPost('product_title'),
						'cat_id' => Yii::app()->request->getPost('cat_id'),
						'description' => Yii::app()->request->getPost('description'),
						'product_url' => Yii::app()->request->getPost('product_url'),
						'promotion_details' => nl2br(Yii::app()->request->getPost('promotion_details')),
						'promotion_end_date' => date('Y-m-d', strtotime(Yii::app()->request->getPost('promotion_end_date'))),
						'status' => Yii::app()->request->getPost('product_approve'),
						'image' => $imageFileName
						);      
			Products::model()->updateall($products_data,'id=:id',array(':id' => base64_decode($id)));
			//$product->attributes = $products_data;
			//	Yii::app()->session['user_name'] = $_POST['signup']['first_name'].' '.$_POST['signup']['last_name'];		
			//$product->save(false);
			// Send alerts when product is approved..
			if(Yii::app()->request->getPost('product_approve') == 1)
			{
				$this->product_alert_db(base64_decode($id));
				$prod = Products::model()->find('id=:id',array(':id' => base64_decode($id)));
				// Sending Email to Seller
				$user = Users::model()->find('id=:id',array(':id' => $prod->seller_id));
				$user_name = isset($user->first_name) ? $user->first_name : '';
				$user_email = isset($user->email) ? $user->email : '';
				if($user_email != '')
				{
					$email = EmailTemplates::model()->find('id=:id', array(':id' => 3));
					$product_image = '<img src="'.$_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['SERVER_NAME'].'/uploads/products/'.$imageFileName.'" />';
					$product_url = '<a href="'.Yii::app()->createabsoluteurl('products/detail/'.str_replace(array(" ", "/" , "\\", "#", "$", "@", "%"),"-",substr(Yii::app()->request->getPost('product_title'),0,60)).'/p/id/'.$id).'"> View Product</a>';
					$email_message = $email->body;
					$email_subject = $email->subject;
					$email_message = str_replace("%user_name%",$user_name, $email_message);
					$email_message = str_replace("%email%",$user_email, $email_message);
					$email_message = str_replace("%product_title%",Yii::app()->request->getPost('product_title'), $email_message);
					$email_message = str_replace("%product_image%",$product_image, $email_message);
					$email_message = str_replace("%product_url%",$product_url, $email_message);
					$this->sendEmail($user_email, $email_subject, $email_message);
				}
				
			}
			
			Yii::app()->session['product_success'] = "Product Updated successfully.";
			if(Yii::app()->session['sellers_product'] != '' )
				$this->redirect(array('products/seller_products/id/'.Yii::app()->session['sellers_id']));
			else	
				$this->redirect(array('products/list'));
			exit;
		}
		$product = Products::model()->find('id=:id',array(':id' => base64_decode($id)));
		$category = Category::model()->findall();
		if(!empty($product))
			$this->render('add_product', array('product' => $product, 'category' => $category));
		else
			$this->redirect(array(Yii::app()->homeUrl.'site/error'));

	}
    // Check product slug
    private function checkSlug($slug)
    {   
    	$check = Products::model()->find('product_slug=:slug', array(':slug' => $slug));
    	if(empty($check))
    		  return '1';    // if true .. slug not exists
    	else 
    	      return '0';	 // if false .. slug already exists
    }
    // Delete Product
    public function actiondelete($id)
    {
    	$product = Products::model()->find('id=:id',array(':id' => base64_decode($id)));
    	if(!empty($product))
    	{

	    	if($product->image != '' && is_file(Yii::getPathOfAlias('webroot') ."/uploads/products/".$product->image))
			{
				@unlink(Yii::getPathOfAlias('webroot') ."/uploads/products/".$product->image);
			}
			if($product->image != '' && is_file(Yii::getPathOfAlias('webroot') ."/uploads/products/thumb/".$product->image))
			{
				
				@unlink(Yii::getPathOfAlias('webroot') ."/uploads/products/thumb/".$product->image);
			}
			// delete all product reviews
			ProductReviewer::model()->deleteall('product_id=:id', array(':id' => base64_decode($id)));
			// delete product records
			Products::model()->deleteall('id=:id',array(':id' => base64_decode($id)));
			Yii::app()->session['product_success'] = "Product deleted successfully.";
			$this->redirect($_SERVER['HTTP_REFERER']);
			//$this->redirect(array('products/list'));
			exit;
		}
		else
			$this->redirect(array(Yii::app()->homeUrl.'site/error'));


    }
    // All active products
	public function actionactive()
	{
		//$products = Products::model()->findall('status=:status', array(':status' => 1));
		$products_rev = ProductReviewer::model()->findall(array(
											'condition' => 'status=:status', 
											'params' => array(':status' => 1),
											'order' => 'reviewed_date DESC'
											));
		//echo '<pre>'; print_r($products_rev[0]->product); exit;
		$this->render('active_listing', array('products_rev' => $products_rev));
	}
	
    // Edit review
    public function actionapprove_review() 
    {
    	if(Yii::app()->request->getPost('id'))
    	{
    		if(Yii::app()->request->getPost('approve') == 2)
    		{
    			ProductReviewer::model()->deleteall('id=:id', array(':id' => Yii::app()->request->getPost('id')));
    			echo 'success';
    		}
    		else
    		{
	    		$update = array( 
	    					'status' => Yii::app()->request->getPost('approve') == 1 ? 2 : 1
	    					);
	    		ProductReviewer::model()->updateall($update, 'id=:id', array(':id' => Yii::app()->request->getPost('id')));
	    		echo 'success';
	    	}
    	}
    	else
    		echo 'fail';
    }
	// Seller Products
	public function actionseller_products($id)
	{
		if($id != '')
		{
			$products = Products::model()->findall(array(
											'condition' => 'seller_id=:id',
											'params' => array(':id' => base64_decode($id)),
											'order' => 'id desc'
											));
			$seller = Users::model()->find('id=:id', array(':id' => base64_decode($id)));								
			Yii::app()->session['sellers_product'] = $seller->first_name.'\'s ';	
			Yii::app()->session['sellers_id'] = $id;							
			$this->render('listing', array('products' => $products));
		}
		else
		   $this->redirect(array('seller/list'));
	}
	// Product approve alerts
	// Send Newsletter
	private function product_alert_db($prod_id)
	{
		$email = EmailTemplates::model()->find('id=:id', array(':id' => 6));
		if($prod_id != '')
		{
			$p_alert = new ProductAlert;
			$data = array(
						'product_id' => $prod_id,
						'status' => 1
						);
			$p_alert->attributes = $data;
			$p_alert->save(false);
			//$this->redirect(array('site/EmailTemplates'));	
			return true;	
		}
		else
		  return false;// $this->redirect(array(Yii::app()->homeUrl.'site/error'));
		
		
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