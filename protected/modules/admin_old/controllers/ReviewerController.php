<?php

class ReviewerController extends Controller
{
	public function actionIndex()
	{
		$reviewer = Users::model()->findall(array(
										'condition' => 'user_type =:t AND is_deleted =:is_deleted', 
										'params' => array(':t' => 1, ':is_deleted' => 0),
										'order' => 'id DESC'
										));   // user_type 1 is for reviewer
		
		$this->render('reviewer_list', array('reviewer' => $reviewer));
	}
	// Reviewer Profile
    public function actionprofile($id)
    {
        if(isset($id) && $id != '')
        {
        	if(isset($_POST['product']))
			{             
				
				$user_data = array(
							'first_name' => Yii::app()->request->getPost('first_name'),
							'last_name' => Yii::app()->request->getPost('last_name'),
							'phone_no' => Yii::app()->request->getPost('phone'),
							'address' => Yii::app()->request->getPost('address'),
							'amazon_profile_url' => Yii::app()->request->getPost('amazon_profile'),
							'city' => Yii::app()->request->getPost('city'),
							'state' => Yii::app()->request->getPost('state'),
							'country' => Yii::app()->request->getPost('country'),
							'zipcode' => Yii::app()->request->getPost('zipcode'),
							'status' => Yii::app()->request->getPost('status'),
							);      
				Users::model()->updateall($user_data,'id=:id',array(':id' => base64_decode($id)));
				//$product->attributes = $products_data;
				//	Yii::app()->session['user_name'] = $_POST['signup']['first_name'].' '.$_POST['signup']['last_name'];		
				//$product->save(false);
				Yii::app()->session['success'] = "Reviewer Profile Updated successfully.";
				$this->redirect(array('reviewer/index'));
				exit;
			}
        	$user = Users::model()->find('id=:id', array(':id' => base64_decode($id)));
        	if(!empty($user))
			{
				$active_pro = count($user->productReviewers);
				$rev_url_counter = ProductReviewer::model()->count('reviewer_id=:id AND status=:status', array(':id' => $user->id, ':status' => 2));
				$active_rpoducts = ProductReviewer::model()->count('reviewer_id=:id AND status=:status', array(':id' => $user->id, ':status' => 1));
				if($active_pro > 0)
				{
					/*$users_rank = 'SELECT (COUNT(`reviewed_url`) + COUNT(`product_id`)) total_c, `reviewer_id`
							 FROM `tbl_product_reviewer`
							 GROUP BY `reviewer_id`
							 ORDER BY total_c DESC';*/
					$users_rank = 'SELECT (COUNT(`reviewed_url`) + COUNT(`product_id`)) total_c, `reviewer_id` , first_name, 
						(SELECT COUNT(`reviewed_url`) FROM `tbl_product_reviewer` WHERE `reviewer_id` = u.id AND STATUS = 2) as total_review , 
						COUNT(`product_id`) as active_pro
						 FROM `tbl_product_reviewer` as p_r
						 inner join tbl_users as u
						 on u.id = p_r.reviewer_id
						 GROUP BY `reviewer_id`
						 ORDER BY total_c DESC
						 
						 ';		 
							 
					//echo $discount_sql; echo '<br/>'.Yii::app()->session['lat']; echo '<br/>'.Yii::app()->session['lon']; exit;
					$user_rank_command = Yii::app()->db->createCommand($users_rank)->setFetchMode(PDO::FETCH_OBJ);
					$rank_cal = $user_rank_command->queryall();
					$rank = 0; 
					//echo '<pre>'; print_r($rank_cal);exit;
					foreach($rank_cal as $r)
					{
						$rank++;
						if($r->reviewer_id == base64_decode($id))
							break;
					}
				}
				else
					$rank = 0; 
	
				/*if($active_pro != 0 && $rev_url_counter != 0)
				{  
						$rank = round(($rev_url_counter / $active_pro) * 10);
				}
				else
					$rank = 0; */
				// calculation of helfull
				$total_products = Products::model()->with(array(
										'seller' => array(
											'select' => false,
											 'condition' => 'seller.status=:status',
											 'params' => array(':status' => 1)
											)	
											))->count('t.status=:status', array(':status' => 1));
				if($active_pro != 0 && $rev_url_counter != 0 && $total_products != 0)
				{  
						$helpful = round((($active_rpoducts + $rev_url_counter) / $total_products) * 100);
				}
				else
					$helpful = 0; 
					
				
				$this->render('profile',array('user' => $user,'rank' => $rank, 'helpful' => $helpful, 'active_rpoducts' => $active_rpoducts));
			}
        	else
        		$this->redirect(array(Yii::app()->homeUrl.'site/error'));
        }
        else
        	$this->redirect(array(Yii::app()->homeUrl.'site/error'));
    }
    // Delete Reviewer
    public function actiondelete($id)
    {
    	if($id != '')
    	{
    		/*$user_data = array(
							'is_deleted' => 1,
							);      
			Users::model()->updateall($user_data,'id=:id',array(':id' => base64_decode($id)));*/
			ProductReviewer::model()->deleteall('reviewer_id=:id',array(':id' => base64_decode($id)));
			Users::model()->deleteall('id=:id',array(':id' => base64_decode($id)));
			Yii::app()->session['success'] = "Reviewer deleted successfully.";
			$this->redirect(array('reviewer/index'));
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