<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>CTS | User</title>

	<!-- BOOTSTRAP STYLES-->
    <link href="<?php echo Yii::app()->request->baseurl;?>/resources/admin/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="<?php echo Yii::app()->request->baseurl;?>/resources/admin/css/font-awesome.css" rel="stylesheet" />
     <!-- MORRIS CHART STYLES-->
    <link href="<?php echo Yii::app()->request->baseurl;?>/resources/admin/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="<?php echo Yii::app()->request->baseurl;?>/resources/admin/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
   <!-- JQUERY SCRIPTS -->
    <script src="<?php echo Yii::app()->request->baseurl;?>/resources/admin/js/jquery-1.10.2.js"></script>
<style>
#leftPanel{
    background-color:rgba(204, 201, 201, 0.62);;
    color:#fff;
    text-align: center;
}

#rightPanel{
    min-height:415px;
}

/* Credit to bootsnipp.com for the css for the color graph */
.colorgraph {
  height: 5px;
  border-top: 0;
  background: #c4e17f;
  border-radius: 5px;
  background-image: -webkit-linear-gradient(left, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
  background-image: -moz-linear-gradient(left, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
  background-image: -o-linear-gradient(left, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
  background-image: linear-gradient(to right, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
}
#wrapper { background-color:white;}
</style>
</head>
<body>
    <div  id="wrapper" >
    <?php
        if(Yii::app()->user->getState('isUser') == false && Yii::app()->controller->action->id != 'login')
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
            <div style="color: white;padding: 15px 50px 5px 50px;float: right;font-size: 16px;"> Dashboard &nbsp;  | &nbsp; <a href="<?php echo Yii::app()->createurl('user/site/logout');?>" class="btn btn-danger square-btn-adjust">Logout</a> </div>
        </nav>   
           <!-- /. NAV TOP  -->

        
        <?php } ?>
        <!-- /. NAV SIDE  -->
    <div <?php if(Yii::app()->controller->action->id == 'login'){ ?> style="background-color:white;" <?php } ?>>
	 <div class="container">
<br>
<br>
	<div class="row" id="main">
	<?php if(Yii::app()->controller->action->id != 'login'){ ?>
        <div class="col-md-3 well" id="leftPanel">
            <div class="row">
                <div class="col-md-12">
                	<div>
        				<?php if(Yii::app()->session['user_pic'] && is_file(Yii::getPathOfAlias('webroot') ."/uploads/user_pic/thumb/".Yii::app()->session['user_pic'])) { ?>
                              <img src="<?php echo Yii::app()->request->baseurl.'/uploads/user_pic/thumb/'.Yii::app()->session['user_pic'];?>" alt="Texto Alternativo" class="img-circle img-thumbnail">
        				<?php }else{ ?>
                        	<img src="<?php echo Yii::app()->request->baseurl;?>/images/profile.gif" alt="Texto Alternativo" class="img-circle img-thumbnail">
                        <?php } ?>    
        				<h2><?php echo Yii::app()->user->getState('name'); ?></h2>
        				<p></p>
                        <?php /* ?><div class="btn-group">
                            <p><button type="button" class="btn btn-warning">Edit  Profile</button></p>
								<button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown">
									<span class="caret"></span><span class="sr-only">Social</span>
								</button>
								<ul class="dropdown-menu" role="menu">
									<li><a href="#">Twitter</a></li>
									<li><a href="https://plus.google.com/+Jquery2dotnet/posts">Google +</a></li>
									<li><a href="https://www.facebook.com/jquery2dotnet">Facebook</a></li>
									<li class="divider"></li>
									<li><a href="#">Github</a></li>
								</ul>
						</div><?php */ ?>
						<div class="col-xs-12 "><a href="<?php echo Yii::app()->createurl('user/site/index');?>" class="btn btn-success btn-block btn-lg">Dashboard</a></div>
						<?php /*?><div class="col-xs-12 "><a href="<?php echo Yii::app()->createurl('user/site/academic');?>" class="btn btn-success btn-block btn-lg">Academic Detail</a></div>
						<div class="col-xs-12 "><a href="#" class="btn btn-success btn-block btn-lg">Experience</a></div><?php */?>
						<div class="col-xs-12 "><a href="#" class="btn btn-success btn-block btn-lg">Application Status</a></div>
						<div class="col-xs-12 "><a href="#" class="btn btn-success btn-block btn-lg">Prev Application</a></div>
					</div>
        		</div>
            </div>
        </div>
		<div class="col-md-8 well" id="rightPanel">
	<?php } ?>	
        
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
