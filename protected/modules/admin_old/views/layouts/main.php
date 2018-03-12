<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>CTS | Admin</title>

	<!-- BOOTSTRAP STYLES-->
    <link href="<?php echo Yii::app()->request->baseurl;?>/resources/admin/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="<?php echo Yii::app()->request->baseurl;?>/resources/admin/css/font-awesome.css" rel="stylesheet" />
     <!-- MORRIS CHART STYLES-->
    <link href="<?php echo Yii::app()->request->baseurl;?>/resources/admin/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="<?php echo Yii::app()->request->baseurl;?>/resources/admin/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' /> -->
   <!-- JQUERY SCRIPTS -->
    <script src="<?php echo Yii::app()->request->baseurl;?>/resources/admin/js/jquery-1.10.2.js"></script>
     <style>
			   .setup-panel {border: none;}
			  .setup-panel li { border: 1px solid #ddd;}
			   </style>
</head>
<body>
    <div  id="wrapper" >
    <?php
    if(Yii::app()->session['admin_login'] == '' && Yii::app()->controller->action->id != 'login')
        {
            $this->redirect(array('site/login'));
        }
        ?>
       <?php if(Yii::app()->controller->action->id != 'login'){ ?>
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
               <!-- <img src="<?php //echo Yii::app()->request->baseurl;?>/resources/images/logo.png"  alt="WeReviews" style="background:#4D4D4D;"> -->
               
            </div>
            <div style="color: white;padding: 15px 50px 5px 50px;float: right;font-size: 16px;"> WeReviews Admin &nbsp;  | &nbsp; <a href="<?php echo Yii::app()->createurl('admin/site/logout');?>" class="btn btn-danger square-btn-adjust">Logout</a> </div>
        </nav>   
           <!-- /. NAV TOP  -->

        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
	                <li>
                        <a <?php if(Yii::app()->controller->id == 'site' && Yii::app()->controller->action->id == 'index') { ?> class="active-menu" <?php } ?>  href="<?php echo Yii::app()->createurl('admin/site/index');?>"><i class="fa fa-dashboard fa-3x"></i> Dashboard</a>
                    </li>
                    
                    <li style="display:none;">
                        <a href="#"><i class="fa fa-qrcode fa-3x"></i> Manage Products<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="<?php echo Yii::app()->createurl('admin/products/list');?>">View Products</a>
                            </li>
                            <li>
                                <a href="<?php echo Yii::app()->createurl('admin/products/add');?>">Add New Product</a>
                            </li>
                           <!-- <li>
                                <a href="#">Manage Product Page</a>
                            </li>-->
                            <li>
                                <a href="#">View Products List</a>
                            </li>
                            
                            <li>
                                <a href="#"></a>
                            </li>
                        </ul>
                    </li> 
                    <li <?php if(Yii::app()->controller->id == 'organization') { ?> class="active" <?php } ?>>
                        <a <?php if(Yii::app()->controller->id == 'organization') { ?> class="active-menu" <?php } ?> href="#"><i class="fa fa-users fa-3x"></i> Manage Organizations<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="<?php echo yii::app()->createurl('admin/organization/list');?>">View Organization List</a>
                            </li>
                            <li>
                                <a href="<?php echo yii::app()->createurl('admin/organization/add');?>">Add new Organization</a>
                            </li>
                            
                        </ul>
                    </li>
                    <li <?php if(Yii::app()->controller->id == 'post') { ?> class="active" <?php } ?>>
                        <a <?php if(Yii::app()->controller->id == 'post') { ?> class="active-menu" <?php } ?> href="#"><i class="fa fa-users fa-3x"></i> Manage Posts<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="<?php echo yii::app()->createurl('admin/post/list');?>">View Post List</a>
                            </li>
                            <li>
                                <a href="<?php echo yii::app()->createurl('admin/post/add');?>">Add new Post</a>
                            </li>
                            
                        </ul>
                    </li>
                    <li <?php if(Yii::app()->controller->id == 'test') { ?> class="active" <?php } ?>>
                        <a <?php if(Yii::app()->controller->id == 'test') { ?> class="active-menu" <?php } ?> href="#"><i class="fa fa-file fa-3x"></i> Manage Test<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="<?php echo yii::app()->createurl('admin/test/list');?>">View Tests List</a>
                            </li>
                            <li>
                                <a href="<?php echo yii::app()->createurl('admin/test/add');?>">Add new test</a>
                            </li>
                            
                            
                           <!-- <li>
                                <a href="#">Reviewer Profile</a>
                            </li> -->
                            
                           
                        </ul>
                    </li>
                    <li <?php if(Yii::app()->controller->id == 'applications') { ?> class="active" <?php } ?>>
                        <a <?php if(Yii::app()->controller->id == 'applications') { ?> class="active-menu" <?php } ?> href="#"><i class="fa fa-file fa-3x"></i> Manage Applications<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="<?php echo yii::app()->createurl('admin/applications/');?>">View Applications</a>
                            </li>
                            <li>
                                <a href="<?php echo yii::app()->createurl('admin/applications/add');?>">Add Application</a>
                            </li>
                            
                            
                           <!-- <li>
                                <a href="#">Reviewer Profile</a>
                            </li> -->
                            
                           
                        </ul>
                    </li>
                    <li <?php if(Yii::app()->controller->id == 'products' && (Yii::app()->controller->action->id == 'active' )) { ?> class="active" <?php } ?>> 
                        <a <?php if(Yii::app()->controller->id == 'products' && (Yii::app()->controller->action->id == 'active' )) { ?> class="active-menu" <?php } ?> href="<?php  echo 'javascript:void(0);';//Yii::app()->createurl('admin/products/active');?>"><i class="fa fa-bell-o fa-3x"></i>Latest News</a> 
                    </li>
                    <li <?php if(Yii::app()->controller->id == 'site' && (Yii::app()->controller->action->id == 'EmailTemplates' || Yii::app()->controller->action->id == 'edit' || Yii::app()->controller->action->id == 'newsletter' || Yii::app()->controller->action->id == 'reminder' )) { ?> class="active" <?php } ?>>
                        <a <?php if(Yii::app()->controller->id == 'site' && (Yii::app()->controller->action->id == 'EmailTemplates' || Yii::app()->controller->action->id == 'edit' || Yii::app()->controller->action->id == 'newsletter' || Yii::app()->controller->action->id == 'reminder')) { ?> class="active-menu" <?php } ?> href="#"><i class="fa fa-envelope fa-3x"></i> Manage Email Templates<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level"> 
                            <li>
                                <a href="<?php  echo 'javascript:void(0);';//Yii::app()->createurl('admin/site/EmailTemplates');?>">Email Templates</a>
                            </li>
                            <li>
                                <a href="<?php  echo 'javascript:void(0);';// Yii::app()->createurl('admin/site/newsletter');?>">Newsletter</a>
                            </li>
                            
                           <!-- <li>
                                <a href="<?php //echo Yii::app()->createurl('admin/site/add');?>">Add New Templates</a>
                            </li>
                            
                            <li>
                                <a href="#">Sellers/Merchant Sign-up</a>
                            </li>
                            <li>
                                <a href="#">Product Approval </a>
                            </li>
                            <li>
                                <a href="#">Chaser Email to Reviewers </a>
                            </li> -->
                        </ul>
                    </li>  
                    
                 <!--   <li>
                        <a <?php //if(Yii::app()->controller->id == 'comments') { ?> class="active-menu" <?php //} ?> href="<?php echo 'javascript:void(0);';// Yii::app()->createurl('admin/comments/list');?>"><i class="fa fa-credit-card fa-3x"></i> Testimonials</a>
                    </li> -->
                     
                    <li >
                        <a <?php if(Yii::app()->controller->action->id == 'setting') { ?> class="active-menu" <?php } ?>  href="<?php echo 'javascript:void(0);';//Yii::app()->createurl('admin/site/setting');?>"><i class="fa fa-cogs fa-3x"></i>  Settings</a>
                    </li>	
                </ul>
               
            </div>
            
        </nav> 
        <?php } ?>
        <!-- /. NAV SIDE  -->
    <div id="page-wrapper" <?php if(Yii::app()->controller->action->id == 'login'){ ?> style="background-color:#202020;" <?php } ?>>
	<?php echo $content; ?>

	</div>
    
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="<?php echo Yii::app()->request->baseurl;?>/resources/admin/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="<?php echo Yii::app()->request->baseurl;?>/resources/admin/js/jquery.metisMenu.js"></script>
     <!-- MORRIS CHART SCRIPTS -->
     <script src="<?php echo Yii::app()->request->baseurl;?>/resources/admin/js/morris/raphael-2.1.0.min.js"></script>
    <script src="<?php echo Yii::app()->request->baseurl;?>/resources/admin/js/morris/morris.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="<?php echo Yii::app()->request->baseurl;?>/resources/admin/js/custom.js"></script>
    <!-- Admin Js -->
    <script src="<?php echo Yii::app()->request->baseurl;?>/js/admin_js.js"></script>
    <?php if(Yii::app()->controller->action->id == 'login'){ ?> 
     
      <?php } ?>
   
</body>
</html>
