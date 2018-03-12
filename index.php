<?php
//header('location:demo/index.html');
// change the following paths if necessary
//echo dirname(__FILE__).'/yii/framework/yii.php'; exit;
$yii=dirname(__FILE__).'/yii/framework/yii.php';
$config=dirname(__FILE__).'/protected/config/main.php';

// remove the following lines when in production mode
defined('YII_DEBUG') or define('YII_DEBUG',true);
// specify how many levels of call stack should be shown in each log message
defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',3);
// Include ckeditor files
include_once dirname(__FILE__).'/resources/Ckeditor/ckeditor/ckeditor.php';
include_once dirname(__FILE__).'/resources/Ckeditor/ckfinder/ckfinder.php';
// -----------
require_once($yii);

Yii::createWebApplication($config)->run();
?>