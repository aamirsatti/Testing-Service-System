<?php
Yii::import('zii.widgets.CPortlet');
class MyCaptcha extends CPortlet
{
    public function __Construct()
    {
    	parent::__Construct();
    	$this->get_capcha();
    }
    public function get_capcha(){
 
        $text = rand(10000,99999); 
		Yii::app()->session["vercode"] = $text; 
		$height = 25; 
		$width = 65; 
		  
		$image_p = @imagecreate($width, $height); 
		$black = @imagecolorallocate($image_p, 0, 0, 0); 
		$white = @imagecolorallocate($image_p, 255, 255, 255); 
		$font_size = 18; 
		  
		@imagestring($image_p, $font_size, 5, 5, $text, $white); 
		@imagejpeg($image_p, 'uploads/captcha/captcha.jpg');
		//return '<img src="'.imagejpeg($image_p, null, 80).'" />'; 
    }
}
?>