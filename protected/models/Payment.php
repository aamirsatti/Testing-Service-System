<?php
class Payment 
{
      public function paypal($data, $registration_fee)
      {  
		
      ?>
	
<form id="paypal_form" action="https://www.paypal.com/cgi-bin/webscr" method="post">
<input type="hidden" name="cmd" value="_xclick-subscriptions">
<input type="hidden" name="business" value="finance@thestrategicinsight.com">
<input type="hidden" name="currency_code" value="USD">
<input type="hidden" name="no_shipping" value="1">
<input type="hidden" name="item_name" value="Join Monthly Seller Membership">
<input type="hidden" name="item_number" value="777">
<input type="hidden" name="a3" value="<?php echo $registration_fee;?>">
<input type="hidden" name="p3" value="1">
<input type="hidden" name="t3" value="M">
<input type="hidden" name="src" value="1">
<input type="hidden" name="sra" value="1">
<input type="hidden" name="notify_url" value="<?php echo Yii::app()->createAbsoluteurl('site/paymentNotification');?>" /> 
<input type="hidden" name="return" value="<?php echo Yii::app()->createAbsoluteurl('site/paymentSuccess');?>" /> 
<input type="hidden" name="rm" value="2">
<input type="hidden" name="cancel_return" value="<?php echo Yii::app()->createAbsoluteurl('site/paymentcancel');?>">

		</form>
		<h4> Please Wait...</h4> 
		<img src="<?php echo Yii::app()->request->baseurl;?>/images/ajax-loader.gif" style="height:100px;width:100px;"/>
		<script>  setTimeout(function(){ document.getElementById("paypal_form").submit(); },1000); </script>
     <?php
	//echo $shipping_charges; exit;
	 return ;
	 }
	 
        /* 
         public function authorize($data, $discount_value)
	 {
		 // This sample code requires the mhash library for PHP versions older than
		// 5.1.2 - http://hmhash.sourceforge.net/
			
		// the parameters for the payment can be configured here
		// the API Login ID and Transaction Key must be replaced with valid values
		$loginID		= "4YAjnq63bH7v";
		$transactionKey = "5qEBFD7mn6pd996p";
		$amount 		= 39.95 - $discount_value;
		$description 	= "Business Profile";
		$label 			= "Submit Payment"; // The is the label on the 'submit' button
		$testMode		= "false";
		// By default, this sample code is designed to post to our test server for
		// developer accounts: https://test.authorize.net/gateway/transact.dll
		// for real accounts (even in test mode), please make sure that you are
		// posting to: https://secure.authorize.net/gateway/transact.dll
		$url			= "https://test.authorize.net/gateway/transact.dll";
		
		// If an amount or description were posted to this page, the defaults are overidden
		if (array_key_exists("amount",$_REQUEST))
			{ $amount = $_REQUEST["amount"]; }
		if (array_key_exists("description",$_REQUEST))
			{ $description = $_REQUEST["description"]; }
		
		// an invoice is generated using the date and time
		$invoice	= date('YmdHis');
		// a sequence number is randomly generated
		$sequence	= rand(1, 1000);
		// a timestamp is generated
		$timeStamp	= time();
		
		// The following lines generate the SIM fingerprint.  PHP versions 5.1.2 and
		// newer have the necessary hmac function built in.  For older versions, it
		// will try to use the mhash library.
		if( phpversion() >= '5.1.2' )
			{ $fingerprint = hash_hmac("md5", $loginID . "^" . $sequence . "^" . $timeStamp . "^" . $amount . "^", $transactionKey); }
		else 
			{ $fingerprint = bin2hex(mhash(MHASH_MD5, $loginID . "^" . $sequence . "^" . $timeStamp . "^" . $amount . "^", $transactionKey)); }
		?>
		
		
		<!-- Create the HTML form containing necessary SIM post values -->
		<form method='post' action='<?php echo $url; ?>' id="autnorize_form">
		<!--  Additional fields can be added here as outlined in the SIM integration
		 guide at: http://developer.authorize.net -->  
			<input type='hidden' name='x_login' value='<?php echo $loginID; ?>' />
			<input type='hidden' name='x_amount' value='<?php echo $amount; ?>' />
			<input type='hidden' name='x_description' value='<?php echo $description; ?>' />
			<input type='hidden' name='x_invoice_num' value='<?php echo $invoice; ?>' />
			<input type='hidden' name='x_fp_sequence' value='<?php echo $sequence; ?>' />
			<input type='hidden' name='x_fp_timestamp' value='<?php echo $timeStamp; ?>' />
			<input type='hidden' name='x_fp_hash' value='<?php echo $fingerprint; ?>' />
			<input type='hidden' name='x_test_request' value='<?php echo $testMode; ?>' />
			<input type='hidden' name='x_show_form' value='PAYMENT_FORM' />
			<input type='hidden' name='x_cust_id' value='<?php echo Yii::app()->session['businessProfile_id'];?>' />
			<!-- <input type='hidden' name='x_relay_response' value='True' />
			<input type='hidden' name='x_relay_url' value='<?php echo Yii::app()->createAbsoluteurl('business/paymentNotification');?>' />
		     -->
		</form> 
		<h4> Please Wait...</h4> 
		<img src="<?php echo Yii::app()->request->baseurl;?>/images/ajax-loader.gif" style="height:100px;width:100px;"/>
		<script>  setTimeout(function(){ document.getElementById("autnorize_form").submit(); },6000); </script>
     <?php
	      return;
	 }
		
	*/     
}
?>   