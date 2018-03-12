<?php

class SellerController extends Controller
{
	
	public function actionIndex()
	{
		$this->render('index');
	}
    /* Seller's list
    */
    public function actionlist()
    {
    	$sellers = Users::model()->findall(array(
    						    'condition' => 'user_type =:t AND is_deleted =:is_deleted', 
    						    'params' => array(':t' => 2, 'is_deleted' => 0),
    						    'order' => 'id desc'
    						    ));   // user_type 2 is for sellers
    	$this->render('seller_list' , array('sellers' => $sellers));
    }
    // Seller Profile
    public function actionprofile($id)
    {
        if(isset($id) && $id != '')
        {
        	if(isset($_POST['product']))
			{     
				$user_data = array(
							'first_name' => Yii::app()->request->getPost('first_name'),
							'last_name' => Yii::app()->request->getPost('last_name'),
							'phone_no' => Yii::app()->request->getPost('phone_no'),
							'address' => Yii::app()->request->getPost('address'),
							'how_you_find_us' => Yii::app()->request->getPost('how_you_find_us'),
							'What_do_you_sell' => Yii::app()->request->getPost('What_do_you_sell'),
							'where_do_you_sell' => Yii::app()->request->getPost('where_do_you_sell'),
							'status' => Yii::app()->request->getPost('status'),
							'auto_approved' => Yii::app()->request->getPost('auto_approved'),
							);      
				Users::model()->updateall($user_data,'id=:id',array(':id' => base64_decode($id)));
				//$product->attributes = $products_data;
				//	Yii::app()->session['user_name'] = $_POST['signup']['first_name'].' '.$_POST['signup']['last_name'];		
				//$product->save(false);
				Yii::app()->session['success'] = "Seller Profile Updated successfully.";
				$this->redirect(array('seller/list'));
				exit;
			}
        	$user = Users::model()->find('id=:id', array(':id' => base64_decode($id)));
        	if(!empty($user))
        		$this->render('profile',array('user' => $user));
        	else
        		$this->redirect(array(Yii::app()->homeUrl.'site/error'));

        }
        else
        	$this->redirect(array(Yii::app()->homeUrl.'site/error'));

    }
    // Delete Sellet 
     // Delete Product
    public function actiondelete($id)
    {
    	if($id != '')
    	{
    		/*$user_data = array(
							'is_deleted' => 1,
							);      
			Users::model()->updateall($user_data,'id=:id',array(':id' => base64_decode($id)));
			*/
			// deleted all products of this seller
			$products = Products::model()->findall('seller_id =:seller_id', array(':seller_id' => base64_decode($id)));
			if(!empty($products))
			{
				foreach($products as $product)
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
					ProductReviewer::model()->deleteall('product_id=:id', array(':id' => $product->id));
					// delete product records
					Products::model()->deleteall('id=:id',array(':id' => $product->id));
				}
			}
			// delete seller
			Users::model()->deleteall('id=:id',array(':id' => base64_decode($id)));
			Yii::app()->session['success'] = "Seller account and all his/her products deleted successfully.";
			$this->redirect(array('seller/list'));
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