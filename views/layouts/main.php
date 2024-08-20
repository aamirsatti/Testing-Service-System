<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Candidate Testing Services</title>
    
    <!-- Styles -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,700,800" rel="stylesheet" type="text/css"><!-- Google web fonts -->
    <link href="<?php echo Yii::app()->request->baseurl;?>/resources/theme/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"><!-- font-awesome -->
    <link href="<?php echo Yii::app()->request->baseurl;?>/resources/theme/js/dropdown-menu/dropdown-menu.css" rel="stylesheet" type="text/css"><!-- dropdown-menu -->
    <link href="<?php echo Yii::app()->request->baseurl;?>/resources/theme/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"><!-- Bootstrap -->
    <link href="<?php echo Yii::app()->request->baseurl;?>/resources/theme/js/fancybox/jquery.fancybox.css" rel="stylesheet" type="text/css"><!-- Fancybox -->
    <link href="<?php echo Yii::app()->request->baseurl;?>/resources/theme/js/audioplayer/audioplayer.css" rel="stylesheet" type="text/css"><!-- Audioplayer -->
    <link href="<?php echo Yii::app()->request->baseurl;?>/resources/theme/style.css" rel="stylesheet" type="text/css"><!-- theme styles -->
    <style type="text/css">
    #k-dropdown-menu a {border-top:none;}
    .breadcrumb {display:none;}
    .gutter { color:black;font-weight: 400;}
	#drop-down-left a {
     color: blue;
    text-decoration: none;
}
    .page-title, .title-widget { color: #0B83FA;}
	.title-widget {    border-bottom: 1px solid rgba( 0, 0, 0, 0.05 );margin-bottom: 25px; padding-bottom:4px;}
	#k-head { margin-bottom:0px;}
	.news-body { text-align: justify; text-justify: inter-word;}
    </style>
    
    
    <!-- JQuery -->
    <script src="<?php echo Yii::app()->request->baseurl;?>/resources/theme/jQuery/jquery-2.1.1.min.js"></script>
    <!-- marquee  vertical-->
    <script type="text/javascript" src="<?php //echo Yii::app()->request->baseurl;?>/resources/marquee_plugin/jquery.marquee.js"></script>
    
    <!-- Latest NEws -->
    <link href="<?php echo Yii::app()->request->baseurl;?>/resources/scroller/news/ticker-style.css" rel="stylesheet" type="text/css" />
	<script src="<?php echo Yii::app()->request->baseurl;?>/resources/scroller/news/jquery.ticker.js" type="text/javascript"></script>
	<script src="<?php echo Yii::app()->request->baseurl;?>/resources/scroller/news/site.js" type="text/javascript"></script>
    <style>
	.ticker-controls { display:none;}
	</style>
     <!-- END Latest NEws -->
  </head>
  
  <body role="document" style="font-family: -webkit-pictograph;">
  
    <!-- device test, don't remove. javascript needed! -->
    <span class="visible-xs"></span><span class="visible-sm"></span><span class="visible-md"></span><span class="visible-lg"></span>
    <!-- device test end -->
    
    <div id="k-head" class="container"><!-- container + head wrapper -->
    
    	<div class="row"><!-- row -->
        
            <nav class="k-functional-navig"><!-- functional navig -->
        
                <ul class="list-inline pull-right">
                    <li><a >
					    <i class="fa fa-facebook fa-2x"></i> 
					  </a>
					</li>
					<li><a >
					    <i class="fa fa-twitter fa-2x"></i> 
					  </a>
					</li>
					<li><a >
					    <i class="fa fa-linkedin fa-2x"></i> 
					  </a>
					</li>
                    
                </ul>
        
            </nav><!-- functional navig end -->
        
        	<div class="col-lg-12">
        
        		<div id="k-site-logo" class="pull-left"><!-- site logo -->
                
                    <h1 class="k-logo">
                        <a href="<?php echo Yii::app()->createurl('site/index');?>" title="Home Page">
                            <img src="<?php echo Yii::app()->request->baseurl;?>/images/candidates_testing_services.png" alt="Site Logo" class="img-responsive" style="margin-top: 10px;width: 200px;height: 80px;"/>
                        </a>
                    </h1>
                    
                    <a id="mobile-nav-switch" href="#drop-down-left"><span class="alter-menu-icon"></span></a><!-- alternative menu button -->
            
            	</div><!-- site logo end -->

            	<nav id="k-menu" class="k-main-navig"><!-- main navig -->
        
                    <ul id="drop-down-left" class="k-dropdown-menu">
                        <li>
                            <a href="<?php echo Yii::app()->createurl('site/index');?>" title="">Home</a>
                        </li>
                        
                       
                    <!--    <li>
                            <a href="#" class="Pages Collection" title="More Templates">Inner Pages</a>
                            <ul class="sub-menu">
                                <li><a href="news-single.html">News Single Page</a></li>
                                <li><a href="events-single.html">Events Single Page</a></li>
                                <li><a href="courses-single.html">Course Single Page</a></li>
                                <li><a href="gallery-single.html">Gallery Single Page</a></li>
                                <li><a href="news-stacked.html">News Stacked Page</a></li>
                                <li><a href="search-results.html">Search Results Page</a></li>
                                <li>
                                    <a href="#">Menu Test</a>
                                    <ul class="sub-menu">
                                        <li><a href="#">Second Level 01</a></li>
                                        <li>
                                            <a href="#">Second Level 02</a>
                                            <ul class="sub-menu">
                                                <li><a href="#">Third Level 01</a></li>
                                                <li><a href="#">Third Level 02</a></li>
                                                <li><a href="#">Third Level 03</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="#">Second Level 03</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li> --> 
                        <li> 
                            <a href="<?php echo 'javascript:void(0)';//Yii::app()->createurl('site/about');?>" title="">About Us</a>
                            <ul class="sub-menu" style="border:1px solid #c4c7c8;"> 
                                <li><a href="<?php echo Yii::app()->createurl('site/about');?>">About CTS</a></li>
                                <li><a href="<?php echo Yii::app()->createurl('site/message');?>">CEO Message</a></li>
                                <li><a href="<?php echo Yii::app()->createurl('site/mission');?>">Mission Statement</a></li>
                                <li><a href="<?php echo Yii::app()->createurl('site/objective');?>">Our Objectives</a></li>
                                <li><a href="<?php echo Yii::app()->createurl('site/project_aims');?>">Our Project AIMS</a></li>
                                <li><a href="<?php echo Yii::app()->createurl('site/strength');?>">Our Strengths</a></li>
								<li><a href="<?php echo Yii::app()->createurl('site/process');?>">Our Process</a></li>
							</ul>
                        </li>
                        <li>
                            <a href="<?php echo Yii::app()->createurl('site/contact');?>" title="">Contact Us</a>
                        </li>
                        
                        <li>
                            <a href="<?php echo 'javascript:void(0)';//Yii::app()->createurl('site/contact');?>" title="">Enrollment Slip</a>
                        </li>
                        <li>
                            <a href="<?php echo Yii::app()->createurl('site/faq');?>" title="">FAQs</a>
                        </li>
                        <li>
                            <a href="<?php echo 'javascript:void(0)';//Yii::app()->createurl('site/contact');?>" title="">News</a>
                        </li>
                        <li>
                            <a href="<?php echo Yii::app()->createurl('user/site/login');?>" target="_blank" title="">Sign in</a>
                        </li>
                    </ul>
        
            	</nav><!-- main navig end -->
            
            </div>
            
        </div><!-- row end -->
    
    </div><!-- container + head wrapper end -->
    <div id="k-body"><!-- content wrapper -->
        <?php echo $content; ?>
    </div>     
	<?php 
	if(Yii::app()->controller->action->id == 'index') {
	 $total_visitors = VisitorCount::model()->find();
	 //echo '<pre>'; print_r($total_visitors); exit;
	 $total_visitors = $total_visitors->count + 1;
	 VisitorCount::model()->updateall(array('count' => $total_visitors),'id=:id', array(':id' => 1));
	 ?>
       <div id="k-footer" style="padding:20px 0px"><!-- footer -->
      <style>
.stat {
	    color: rgb(2, 2, 6);
	/* background:#336699; */
	text-align:center;
	float:left;
	margin-left:100px;
	width:150px;
	border: 1px solid #E0DDDD;
}
.stat-count {
	font-size: 30px;
	font-weight: normal;
	letter-spacing: -0.02em;
	line-height: 1;
	margin-bottom: 0px;
	overflow:hidden;
	font-family:"Georgia", Courier, monospace;
	padding: 0;
	position: relative;
}
.stat-detail {
	color:#fff;
	padding-top:10px;
	font: italic 1.3rem/1.75 "Georgia", Courier, monospace;
}
	  </style>
    	<div class="container"><!-- container -->
          
        	<div class="row no-gutter" ><!-- row -->
            
            	<div class="col-lg-4 col-md-4"><!-- widgets column left -->
            
                    <div class="col-padded col-naked">
                    
                        <ul class="list-unstyled clear-margins"><!-- widgets -->
                        
                        	<li class="widget-container widget_nav_menu" style="display:none;"><!-- widgets list -->
                    
                                <h1 class="title-widget">Useful links</h1>
                                
                                
                    
							</li>
                            
                        </ul>
                         
                    </div>
                    
                </div><!-- widgets column left end -->
                
                <div class="col-lg-4 col-md-4"><!-- widgets column center -->
                
                    <div class="col-padded col-naked" style="padding:0px">
                    
                        <ul class="list-unstyled clear-margins"><!-- widgets -->
                        
                        	<li class="widget-container widget_recent_news">
							    <div class="stat">
									<span class="stat-count"><?php echo isset($total_visitors) ? $total_visitors : '';?></span>
									
								</div>
							</li>
							<li class="widget-container widget_recent_news" style="display:none;"><!-- widgets list -->
                    
                                
								<h1 class="title-widget">School Contact</h1>
                                
                                <div itemscope itemtype="http://data-vocabulary.org/Organization"> 
                                
                                	<h2 class="title-median m-contact-subject" itemprop="name">Buntington Public Schools</h2>
                                
                                	<div class="m-contact-address" itemprop="address" itemscope itemtype="http://data-vocabulary.org/Address">
                                		<span class="m-contact-street" itemprop="street-address">19 Tower Avenue, Buntington Station</span>
                                		<span class="m-contact-city-region"><span class="m-contact-city" itemprop="locality">New York</span>, <span class="m-contact-region" itemprop="region">NY</span></span>
                                		<span class="m-contact-zip-country"><span class="m-contact-zip" itemprop="postal-code">11506</span> <span class="m-contact-country" itemprop="country-name">USA</span></span>
                                	</div>
                                     
                                	<div class="m-contact-tel-fax">
                                    	<span class="m-contact-tel">Tel: <span itemprop="tel">631-551-3678</span></span>
                                    	<span class="m-contact-fax">Fax: <span itemprop="fax">631-551-3688</span></span>
                                    </div>
                                    
                                </div>
                                
                                <div class="social-icons">
                                
                                	<ul class="list-unstyled list-inline">
                                    
                                    	<li><a href="#" title="Contact us"><i class="fa fa-envelope"></i></a></li>
                                        <li><a href="#" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="#" title="Facebook"><i class="fa fa-facebook"></i></a></li>
                                    
                                    </ul>
                                
                                </div>
                    
							</li>
                            
                        </ul>
                        
                    </div>
                    
                </div><!-- widgets column center end -->
                
                <div class="col-lg-4 col-md-4"><!-- widgets column right -->
                
                    <div class="col-padded col-naked">
                    
                        <ul class="list-unstyled clear-margins"><!-- widgets -->
                        
                        	<li class="widget-container widget_sofa_flickr" style="display:none;"><!-- widgets list -->
                    
                                <h1 class="title-widget">Flickr Stream</h1>
                                
                                <ul class="k-flickr-photos list-unstyled">
                                	<li><a href="#" title="Flickr photo"><img src="<?php echo Yii::app()->request->baseurl;?>/resources/theme/img/flickr-1.jpg" alt="Photo 1" /></a></li>
                                    <li><a href="#" title="Flickr photo"><img src="<?php echo Yii::app()->request->baseurl;?>/resources/theme/img/flickr-2.jpg" alt="Photo 2" /></a></li>
                                    <li><a href="#" title="Flickr photo"><img src="<?php echo Yii::app()->request->baseurl;?>/resources/theme/img/flickr-3.jpg" alt="Photo 3" /></a></li>
                                    <li><a href="#" title="Flickr photo"><img src="<?php echo Yii::app()->request->baseurl;?>/resources/theme/img/flickr-4.jpg" alt="Photo 4" /></a></li>
                                    <li><a href="#" title="Flickr photo"><img src="<?php echo Yii::app()->request->baseurl;?>/resources/theme/img/flickr-5.jpg" alt="Photo 5" /></a></li>
                                    <li><a href="#" title="Flickr photo"><img src="<?php echo Yii::app()->request->baseurl;?>/resources/theme/img/flickr-6.jpg" alt="Photo 6" /></a></li>
                                    <li><a href="#" title="Flickr photo"><img src="<?php echo Yii::app()->request->baseurl;?>/resources/theme/img/flickr-7.jpg" alt="Photo 7" /></a></li>
                                    <li><a href="#" title="Flickr photo"><img src="<?php echo Yii::app()->request->baseurl;?>/resources/theme/img/flickr-8.jpg" alt="Photo 8" /></a></li>
                                </ul>
                    
							</li>
                            
                        </ul> 
                        
                    </div>
                
                </div><!-- widgets column right end -->
            
            </div><!-- row end -->
        
        </div><!-- container end -->
    
    </div><!-- footer end -->
    
    <?php } ?> 
	<div id="k-subfooter"><!-- subfooter -->
    
    	<div class="container"><!-- container -->
        
        	<div class="row"><!-- row -->
            
            	<div class="col-lg-12">
                
                	<p class="copy-text text-inverse" style=" color:white;text-transform:none;">
                    Copyright &copy; Candidate Testing Service. All rights reserved.
                    <span style="float:right;color:white; text-transform:none;">
                      Contact Us : info@cts.org.pk
                    </span>
                    </p>
                    
                
                </div>
            
            </div><!-- row end -->
        
        </div><!-- container end -->
    
    </div><!-- subfooter end -->

    <!-- jQuery -->
    
    <script src="<?php echo Yii::app()->request->baseurl;?>/resources/theme/jQuery/jquery-migrate-1.2.1.min.js"></script>
    
    <!-- Bootstrap -->
    <script src="<?php echo Yii::app()->request->baseurl;?>/resources/theme/bootstrap/js/bootstrap.min.js"></script>
    
    <!-- Drop-down -->
    <script src="<?php echo Yii::app()->request->baseurl;?>/resources/theme/js/dropdown-menu/dropdown-menu.js"></script>
    
    <!-- Fancybox -->
	<script src="<?php echo Yii::app()->request->baseurl;?>/resources/theme/js/fancybox/jquery.fancybox.pack.js"></script>
    <script src="<?php echo Yii::app()->request->baseurl;?>/resources/theme/js/fancybox/jquery.fancybox-media.js"></script><!-- Fancybox media -->
    
    <!-- Responsive videos -->
    <script src="<?php echo Yii::app()->request->baseurl;?>/resources/theme/js/jquery.fitvids.js"></script>
    
    <!-- Audio player -->
	<script src="<?php echo Yii::app()->request->baseurl;?>/resources/theme/js/audioplayer/audioplayer.min.js"></script>
    
    <!-- Pie charts -->
    <script src="<?php echo Yii::app()->request->baseurl;?>/resources/theme/js/jquery.easy-pie-chart.js"></script>
    
    <!-- Google Maps -->
    <script src="https://maps.googleapis.com/maps/api/js?sensor=true"></script>
    
    <!-- Theme -->
    <script src="<?php echo Yii::app()->request->baseurl;?>/resources/theme/js/theme.js"></script>
    <!-- ------------- -->
    <script>
    $(function(){ 
       // $('#marquee-vertical').marquee({ delay:0, timing:50});  
      //  $('#marquee-horizontal').marquee({direction:'horizontal', delay:0, timing:50});  
        
    });
    </script>
    <script>
    <?php if(Yii::app()->session['close_popup'] != true){ ?>
     $('#popup').trigger('click');
    <?php  } ?>
	
	$(document).ready(function() {
		function count($this){
			var current = parseInt($this.html(), 10);
			current = current + 1; /* Where 1 is increment */

			$this.html(++current);
			
			if(current > $this.data('count')){ 
				$this.html($this.data('count'));
			} else {
				setTimeout(function(){count($this)}, 50);
			}
		}

		$(".stat-count").each(function() {
		  $(this).data('count', parseInt($(this).html(), 10));
		  $(this).html('0');
		  count($(this));
		});
	});
     </script>
    <!-- ---------------- -->
     <script type="text/javascript" src="<?php echo Yii::app()->request->baseurl;?>/resources/scroller/scrollForever.js"></script>            
        
        <script>
		$("#b1").scrollForever({continuous:true,dir:"top",container:".b-con",inner:"div"});
		$("#a1").scrollForever({continuous:true});
		</script>
        
                 
  </body>
</html>