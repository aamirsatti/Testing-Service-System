<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!--
Design by TEMPLATED
http://templated.co
Released for free under the Creative Commons Attribution License

Title      : Travel Portal
Version    : 1.0
Released   : 20070618
Description: A two-column, fixed-width template.

-->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Candidate Testing Service</title>
<meta name="keywords" content="" />
<meta name="description" content="" />

<!-- Bootstrap Core CSS file -->
<link rel="stylesheet" href="<?php echo Yii::app()->request->baseurl;?>/resources/assets/css/bootstrap.min.css">  <!--  ////////////////// -->
<link rel="stylesheet" href="<?php echo Yii::app()->request->baseurl;?>/resources/assets/css/styles.css">          <!--  ////////////////// -->
<!-- ------------- -->
<link href="<?php echo Yii::app()->request->baseurl;?>/resources/css/default.css" rel="stylesheet" type="text/css" />
<!-- jQuery library (served from Google) -->
<!--  jquery core -->
<!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> -->
<script src="<?php echo Yii::app()->request->baseurl;?>/resources/jquery-1.11.0.min.js"></script>
<!--
<script src="<?php echo Yii::app()->request->baseurl;?>/resources/admin/js/jquery/jquery-1.4.1.min.js" type="text/javascript"></script> -->
<!-- bxSlider Javascript file -->
<script src="<?php echo Yii::app()->request->baseurl;?>/resources/slider/jquery.bxslider.min.js"></script>
<!-- bxSlider CSS file -->
<link href="<?php echo Yii::app()->request->baseurl;?>/resources/slider/jquery.bxslider.css" rel="stylesheet" />

<!-- marquee horizontal-->
<link rel="stylesheet" href="<?php echo Yii::app()->request->baseurl;?>/resources/marquee_plugin/marquee.css">
<script type="text/javascript" src="<?php echo Yii::app()->request->baseurl;?>/resources/marquee_plugin/marquee.js"></script>
<!-- marquee  vertical-->
<script type="text/javascript" src="<?php echo Yii::app()->request->baseurl;?>/resources/marquee_plugin/jquery.marquee.js"></script>

</head>
<body>
<div class="container-fluid">
    <div class="row">
		<div class="col-sm-4">
			<div class="page-header">
				<!--<img src="<?php echo Yii::app()->request->baseurl;?>/images/CTS.png">
				<!--<p>Posted by <span class="glyphicon glyphicon-user"></span> <a href="#">Matthijs Jansen</a> on <span class="glyphicon glyphicon-time"></span> 12 January 2015 10:00 am</p>-->
				<h2>Candidate Testing Service</h2>
			</div>
		</div>
	</div>
	<!-- Navigation -->
	<div class="col-sm-12">
	    <nav class="navbar  navbar-inverse " role="navigation">
			<div class="container-fluid">

				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					
				</div>
				<!-- /.navbar-header -->

				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav">
						<li><a href="<?php echo Yii::app()->createurl('site/index');?>">Home</a></li>
						<li><a href="#">Educational Tests</a></li>
						<li><a href="#">Professional Tests</a></li>
						<li><a href="#">Downloads</a></li>
						<li><a href="#">All Results</a></li>
						<li><a href="#">Clients</a></li>
		                <li><a href="#">Upcomming Tests</a></li>
		                <li><a href="#">Contact Us</a></li>
					</ul>
				</div>
				<!-- /.navbar-collapse -->

			</div>
			<!-- /.container-fluid -->
		</nav>
	</div>
    <?php 
		$test_data = Test::model()->findall(array('order' => 'id DESC'));
		?>
	<!-- Latest News slider -->
	<div class="col-sm-12" style="margin-bottom:10px;"> 
        <div class="container" style="height:30px;background:none;">
			<div class="marquee-sibling" style="background:rgb(58, 136, 216); width: 14%;line-height: 33px;font-size: 18px;">
				Latest News
			</div>
			<div class="marquee" >
				<ul class="marquee-content-items" style="padding:0px;color:black;">
				<?php 
					if(!empty($test_data))
					{
						foreach($test_data as $rec)
						{
					?>	
					     <li><a style="color:black;" href="<?php echo Yii::app()->createurl('site/detail/id/'.base64_encode($rec->id)); ?>" style="color:white;text-decoration:none;"><?php echo isset($rec->test_title) ? $rec->test_title : ''; ?> </a></li>
					<?php }
						}
				    ?>     
					
				</ul>
			</div>
		</div>
	</div>	
	<!-- ------------------------- -->
	
    <div class="col-sm-8" style="overflow: hidden;">
		<?php echo $content; ?>
    </div>    
    <!-- Side bar -->
    <div class="col-sm-4">
		
		<div id="login" style="padding-left: height:300px;overflow:hidden; 10px;padding-right: 10px;background:rgba(171, 32, 0, 0.58);">
			<h2 class="title1" style="background: rgb(58, 136, 216);padding:6px;">Latest News</h2>
        
            <!-- --------------------------------- -->
            <div class="block-hdnews" style="width:auto; margin:4px auto; ">

	          <div class="list-wrpaaer" style="height:380px">
	             <ul class="list-aggregate" id="marquee-vertical" style="list-style-type: none;">
	               <?php 
					if(!empty($test_data))
					{
						foreach($test_data as $rec)
						{
					?>		
		               <li style="margin-left:-25px;clear:both;border-top:1px solid white;">
		                 <p></p>
		                 <a href="<?php echo Yii::app()->createurl('site/detail/id/'.base64_encode($rec->id)); ?>" style="text-decoration:none;margin-left:20px;font-weight:bold;"><img src="<?php echo Yii::app()->request->baseurl;?>/images/news_logo.png" width:="10px" height="10px" /> Breaking News
		                 <p style="color:white;" style="color: rgb(102, 102, 102);">
		                   <?php echo isset($rec->test_title) ? $rec->test_title : ''; ?>               
		                 </p></a>
		                 <p style="float:right;margin-right:5px;"><q><?php echo isset($rec->createdDate) ? date('d M, Y', strtotime($rec->createdDate)) : ''; ?></q></p>

		               </li>

	                <?php }
						}
				    ?>
	               
	             </ul>
	          </div><!-- list-wrpaaer -->
	        </div>  
            <h2 class="title1">View All</h2>
		</div>
	</div> 

    <!-- /////////////////////// -->
	<div style="clear: both;">&nbsp;</div>
 
<!-- end page -->
	<div class="col-sm-12" style="background: rgba(171, 32, 0, 0.58);">
		<p id="legal" style="color:white;">Copyright &copy; Candidate Testing Service. All Rights Reserved.</p>
		<p id="links" style="height:68px;"><a href="#">Privacy Policy</a> | <a href="#">Terms of Use</a></p>
	</div>
</div>
<script>
	$('.bxslider').bxSlider({
	  mode: 'fade',
	  auto: true,
	  captions: true,
	  autoControls: true
	});
	$('.bx-prev').click(function() { start_slider(); });
	$('.bx-next').click(function() { start_slider(); });
	function start_slider()
	{
		$('.bx-start').trigger('click');
	}
	</script>

	<script>
	$(function(){


  $('#marquee-vertical').marquee({ delay:0, timing:50});  
  $('#marquee-horizontal').marquee({direction:'horizontal', delay:0, timing:50});  

});
	 
		$(function (){
          // marquee horizontal....
			createMarquee({
				 duration:65000,  
			});

			//example of overwriting defaults: 
			
		/*	 createMarquee({
					duration:1000, 
					padding:20, 
			 		marquee_class:'.marquee-content-items', 
				container_class: '.marquee', 
			 		sibling_class: '.example-sibling', 
					hover: false});
			}); */
		// marquee vertical------
			
		});

	</script>
 
    <!-- Bootstrap Core scripts -->
		<script src="<?php echo Yii::app()->request->baseurl;?>/resources/assets/js/bootstrap.min.js"></script>

</body>
</html>
