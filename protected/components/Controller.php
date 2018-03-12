<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController
{
	/**
	 * @var string the default layout for the controller view. Defaults to '//layouts/column1',
	 * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
	 */
	public $layout='//layouts/main';
	/**
	 * @var array context menu items. This property will be assigned to {@link CMenu::items}.
	 */
	public $menu=array();
	/**
	 * @var array the breadcrumbs of the current page. The value of this property will
	 * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
	 * for more details on how to specify this property.
	 */
	public $breadcrumbs=array();

	// Send Emails

	public function sendEmail($email, $subject, $message)
	{ 
		// $admin = Admin::model()->find('id=:id', array(':id' => 1));
		//Yii::app()->params['adminEmail'] = $admin->admin_email; 
		$to = $email;
		$from = 'info@cts.org.pk';
		$subject = $subject;
		$headers = "From: CTS <$from>\r\n";
		$headers .= "MIME-Version: 1.0\r\n";
		$headers .= "Content-Type: text/html; charset=UTF-8";
		$Email_template = new Email_templates;
		$message = $Email_template->General_Email($message);
		mail($to, $subject, $message, $headers);
	  
      // Send email using SMTP
	/*    $Email_template = new Email_templates;
        Yii::import('application.extensions.phpmailer.JPhpMailer');
		$mail = new JPhpMailer;
		$mail->IsSMTP();
		$mail->Host = 'smtp.gmail.com';//'smpt.bplit.co';
		$mail->SMTPAuth = true;
		$mail->Port =587;//465;// 587;//;
		$mail->SMTPSecure = 'tls';
		$mail->Username = 'bplit.smtp@gmail.com';//'info@bplit.co';
		$mail->Password = 'bpl12345';//'bpl@00786';
		$mail->SetFrom('info@cts.org.pk', 'CTS');
		$mail->Subject = $subject;
		$mail->AltBody = 'To view the message, please use an HTML compatible email viewer!';
		$mail->MsgHTML($Email_template->General_Email($message));
		$mail->AddAddress($email, '');
		$mail->Send(); */ 

	    return;
    }
	
}