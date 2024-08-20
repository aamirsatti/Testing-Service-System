<?php

class Email_templates 
{
	
	public function sendOrder_email($to, $Restaurant, $user, $totalPrice, $info_message = NULL)
	{
		$to = $to;
		$name = $user['user_name'];
		$from = Yii::app()->params['adminEmail']; //'pledgeon@gmail.com';
		$subject = "Order Invoice.";
		$headers = "From: MyFood\r\n";
		$headers .= "MIME-Version: 1.0\r\n";
		$headers .= "Content-Type: text/html";
		$message = $this->orderConfirm($Restaurant, $user, $totalPrice, $info_message);
		mail($to, $subject, $message, $headers);
		//echo $message; exit;
		//$this->redirect(array('users/getFriends')); 
		return;
	}
	
	     //------------------------------------------------------------------
	// Sign up Email
	public function General_Email($message)
	{
		return '<html><head></head><table width="626" cellpadding="0" bgcolor="#efd78f" border="0" style="font-family: arial, Helvetica, sans-serif; border-collapse: collapse; text-align: center;">
<tbody><tr><td><center><a href="http://www.cts.org.pk/demo"> <img src="http://cts.org.pk/demo/images/CTS.png" border="0" style="display: block;"></a></center>
</td></tr></tbody></table><table width="626" cellpadding="0" bgcolor="#efd78f" style="font-family: arial, Helvetica, sans-serif;"><tbody><tr><td><center>
<table border="0" bgcolor="#ffffff" cellpadding="0" cellspacing="0" style="border-collapse: collapse; border-top-width: 5px; border-top-style: solid; border-top-color:#f0c018;text-align: center;">
<tbody><tr><td width="600" align="center"><center><div style="text-align:left;width:92%;font-family:Arial;font-size:14px;line-height:20px;color:#555;font-weight:500;"><br/>
												     '.$message.'
												</div></center><br><br><br><font face="arial" size="2" color="#666666" style="line-height: 1.2;"><strong><a href="http://www.cts.org.pk/demo">CTS Pakistan</a></strong></font>&nbsp;<br><br>
<br>
 </td></tr></tbody></table><br></center></td></tr></tbody></table>
 </div></div></span></body></html>';		
	}
	
	//------------------------------------------------------------------
	//  Order Confirmation Email..
	public function PaymentProcess($message, $data)
	{
	     $order = ''; $counter = 1;
		 //foreach($data as $orderData)
		 {
			$order .=  '<tr style=" box-sizing: border-box; font-size: 14px; margin: 0; padding: 0;">
						<td style=" box-sizing: border-box; font-size: 14px; vertical-align: top; border-top-width: 1px; border-top-color: #eee; border-top-style: solid; margin: 0; padding: 5px 0;" valign="top">'.$counter.'</td>
						<td style="box-sizing: border-box; font-size: 14px; vertical-align: top; text-align: left; border-top-width: 1px; border-top-color: #eee; border-top-style: solid; margin: 0; padding: 5px 0;" align="left" valign="top">Business Activation</td>
						<td style="box-sizing: border-box; font-size: 14px; vertical-align: top; text-align: left; border-top-width: 1px; border-top-color: #eee; border-top-style: solid; margin: 0; padding: 5px 0;" align="left" valign="top">'.(isset($data->coupon['coupon_code']) ? $data->coupon['coupon_code'] : '').'</td>
						<td style="box-sizing: border-box; font-size: 14px; vertical-align: top; text-align: center; border-top-width: 1px; border-top-color: #eee; border-top-style: solid; margin: 0; padding: 5px 0;" align="left" valign="top">$ 39</td>
				      </tr>';
			$counter++;		
		 }
	   $payment_type = $data->payment_type == 1 ? 'Paypal' : 'Authorize.net';	 
	   
	   return '<html><head></head><body><table class="body-wrap" style="box-sizing: border-box; font-size: 14px; width: 100%; background: #f6f6f6; margin: 0; padding: 0;">
			  <tr style="box-sizing: border-box; font-size: 14px; margin: 0; padding: 0;">
			    <td style="box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0;" valign="top"></td>
			     <td class="container" width="600" style="box-sizing: border-box; font-size: 14px; vertical-align: top; display: block !important; width: 980px !important; clear: both !important; margin: 0 auto; padding: 0;" valign="top"><div class="content" style="box-sizing: border-box; font-size: 14px; width: 100%; display: block; margin: 0 auto; padding: 20px;">
				   <table class="main" width="100%" cellpadding="0" cellspacing="0" style="box-sizing: border-box; font-size: 14px; border-radius: 3px; background: rgba(37, 151, 0, 0.8); margin: 0; padding: 0; border: 1px solid rgba(37, 151, 0, 0.93);">
					<tr style="box-sizing: border-box; margin: 0; padding: 0;">
										   <td class="content-block" style="box-sizing: border-box; font-size: 14px; vertical-align:middle; margin: 0;"><h1 style="box-sizing: border-box; font-size: 32px; color: #fff; background:#000; font-weight: 500; padding: 0; margin:0px"><center>Welcome</center></h1></td>
										 </tr>
					<tr style="box-sizing: border-box; font-size: 14px; margin: 0; padding: 0;">
					  <td class="content-wrap aligncenter" style="box-sizing: border-box; font-size: 14px; vertical-align: top; text-align: center; margin: 0; padding: 20px;" align="center" valign="top"><table width="100%" cellpadding="0" cellspacing="0" style="box-sizing: border-box; font-size: 14px; margin: 0; padding: 0;">
						<tr>
						  <td><table style="width:100%">
							<td style="text-align:left; vertical-align:top">
							   '.$message.'
							</td>
							</table>
						   </td>
						</tr>
						<tr>
						<td>
						
						</td>
						</tr>
						
						
						 <tr style="box-sizing: border-box; font-size: 14px; margin: 0; padding: 0;">
						   <td class="content-block" style="box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;" valign="top"><table class="invoice" style="box-sizing: border-box; font-size: 14px; text-align: left; width: 100%; margin: 40px auto; padding: 0;">
						   <!-- info -->
							  <tr style="box-sizing: border-box; font-size: 14px; margin: 0; padding: 0;">
							    <td style="box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 5px 0;" valign="top">
							    <table style="width:100%">
							    <tr>
							    <!-- address -->
							    <td valign="top">
							    <table>
							    <tr>
							    <td valign="top"><strong>User Name:</strong></td><td valign="top"> '.$data['BusinessUser']->first_name.' '.$data['BusinessUser']->last_name.'</td>
							    </tr>
								<tr>
							    <td valign="top">
							    <strong>User Address:</strong></td><td valign="top" style="width:150px;">'.$data['BusinessUser']->address.' '.$data['BusinessUser']->city.', '.$data['BusinessUser']->state.'</td>
							    </tr>
			
								 <tr>
							     <td valign="top">
								 <strong>User Phone:</strong></td><td valign="top">'.$data['BusinessUser']->phone.'</td>
								 </tr>
								 <tr>
							         <td valign="top">
								      <strong>User Email:</strong></td><td valign="top">'.$data['BusinessUser']->email.'</td>
								 </tr>
								 <tr><td colspan="2"><hr/></td></tr>
								 <tr>
							    <td valign="top"><strong>Business Profile:</strong></td><td valign="top"> '.$data->name.'</td>
							    </tr>
								<tr>
								<tr>
							    <td valign="top"><strong>Business Phone:</strong></td><td valign="top"> '.$data->phone.'</td>
							    </tr>
								<tr><tr>
							    <td valign="top"><strong>Business Email:</strong></td><td valign="top"> '.$data->email.'</td>
							    </tr>
								<tr><tr>
							    <td valign="top"><strong>Business Address:</strong></td><td valign="top"> '.$data->address.' '.$data->city.' '.$data->state.'</td>
							    </tr>
								<tr>
								</table>
								</td>
								<!-- transaction -->
								<td valign="top">
								 <table style="float:right;">
							    <tr>
							    <td valign="top"><strong>Transaction Status:</strong></td><td valign="top" ><strong>Approved</strong></td>
							    </tr>
								<tr>
							    <td valign="top">
							    <strong>Transaction Method:</strong></td><td valign="top">'.$payment_type.'</td>
							    </tr>
								<tr>
							    <td valign="top">
								<strong>Transaction Date:</strong></td><td valign="top">'.date('d M, Y').'</td>
								</tr>
			
								</table>
								</td>
								</tr>
								</table>
								</td>
							  </tr>
							  <tr style=" box-sizing: border-box; font-size: 14px; margin: 0; padding: 0;">
							    <td style=" box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 5px 0;" valign="top">
							    <!-- detail table -->
							    <table class="invoice-items" cellpadding="0" cellspacing="0" style=" box-sizing: border-box; font-size: 14px; width: 100%; margin: 0; padding: 0;border-top-color: #333; border-top-width: 2px; border-top-style: solid;padding-top:20px;">
							    <tr>
							    <th>#</th>
							    <th>Item</th>
							    <th>Coupon Code</th>
							    <th align="center">Price</th>
			
							    </tr>'.$order.'
								   <tr class="total" style=" box-sizing: border-box; font-size: 14px; margin: 0; padding: 0;">
									<td colspan="2" style="border-top-width: 2px; border-top-color: #333; border-top-style: solid;  font-weight: 700; margin: 0; padding: 5px 0;" align="right" valign="top"></td> 
									<td style=" box-sizing: border-box; font-size: 14px; vertical-align: top; text-align: right; border-top-width: 2px; border-top-color: #333; border-top-style: solid;  font-weight: 700; margin: 0; padding: 5px 0;" align="right" valign="top">Discount</td>
									<td class="alignright" style="box-sizing: border-box; font-size: 14px; vertical-align: top; text-align: center; border-top-width: 2px; border-top-color: #333; border-top-style: solid;  font-weight: 700; margin: 0; padding: 5px 0;" align="right" valign="top">$ '.(isset($data->coupon['discount_value']) ? $data->coupon['discount_value'] : '0.00').'</td>
								   </tr>
								   <tr class="total" style=" box-sizing: border-box; font-size: 14px; margin: 0; padding: 0;">
									<td colspan="2" style=" border-bottom-color: #333; border-bottom-width: 2px; border-bottom-style: solid; font-weight: 700; margin: 0; padding: 5px 0;" align="right" valign="top"></td> 
									<td style=" box-sizing: border-box; font-size: 14px; vertical-align: top; text-align: right;  border-bottom-color: #333; border-bottom-width: 2px; border-bottom-style: solid; font-weight: 700; margin: 0; padding: 5px 0;" align="right" valign="top">Total Paid</td>
									<td class="alignright" style="box-sizing: border-box; font-size: 14px; vertical-align: top; text-align: center;  border-bottom-color: #333; border-bottom-width: 2px; border-bottom-style: solid; font-weight: 700; margin: 0; padding: 5px 0;" align="right" valign="top">$ '.(isset($data->coupon['discount_value']) ? (39 - $data->coupon['discount_value']) : '39').'</td>
								   </tr>
								  
								 </table></td>
							  </tr>
							</table></td>
						 </tr>
						 <!-- View in browser -->
						 <tr style="box-sizing: border-box; font-size: 14px; margin: 0; padding: 0; background:#eee">
										        <td class="content-block" style=" box-sizing: border-box; vertical-align: middle; margin: 0;"><h2 style="box-sizing: border-box; font-size: 24px; color: #000 ;font-weight: 400; padding:4px 0; margin:0"><center><a href="'.Yii::app()->createabsoluteurl('site/login').'" target="_blank"><img src="'.$_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['SERVER_NAME'].str_replace("/index.php","",$_SERVER['SCRIPT_NAME']).'/resources/img/logo-small.png" style="width:140px; vertical-align:middle;"/></a></center></h2></td>
										     </tr>
			
					    </table></td>
					</tr>
				   </table>
				   
				 </div></td>
			    <td style="box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0;" valign="top"></td>
			  </tr>
			</table>';	
	}
}
