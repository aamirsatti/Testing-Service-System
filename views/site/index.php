 
    
    	<div class="container"><!-- container -->
        
        	<div class="row"><!-- row -->
            
                <div id="k-top-search" class="col-lg-12 clearfix" style="display:none;"><!-- top search -->
                
                    <form action="#" id="top-searchform" method="get" role="search">
                        <div class="input-group">
                            <input type="text" name="s" id="sitesearch" class="form-control" autocomplete="off" placeholder="Type in keyword(s) then hit Enter on keyboard" />
                        </div>
                    </form>
                    
                    <div id="bt-toggle-search" class="search-icon text-center"><i class="s-open fa fa-search"></i><i class="s-close fa fa-times"></i></div><!-- toggle search button -->
                
                </div><!-- top search end -->
            
            	<div class="k-breadcrumbs col-lg-12 clearfix"><!-- breadcrumbs -->
                
                	<ol class="breadcrumb" >
                    	<li><a href="#">Home</a></li>
                       
                    </ol>
                    
                </div><!-- breadcrumbs end -->
                
            </div><!-- row end -->
            
            <div class="row no-gutter fullwidth"><!-- row -->
            
                <div class="col-lg-12 clearfix"><!-- featured posts slider -->
                
                    <div id="carousel-featured" class="carousel slide" data-interval="4000" data-ride="carousel"><!-- featured posts slider wrapper; auto-slide -->
                    
                        <ol class="carousel-indicators"><!-- Indicators -->
                            <li data-target="#carousel-featured" data-slide-to="0" class="active"></li>
                            <li data-target="#carousel-featured" data-slide-to="1"></li>
                            <li data-target="#carousel-featured" data-slide-to="2"></li>
                            
                        </ol><!-- Indicators end -->
                    
                        <div class="carousel-inner"><!-- Wrapper for slides -->
                        
                            <div class="item active">
                                <img src="<?php echo Yii::app()->request->baseurl;?>/images/slider/exam-hall.jpg" style="width:1150px; height:300px;" alt="Image slide 3" />
                                <div class="k-carousel-caption pos-1-3-right scheme-dark">
                                	<div class="caption-content">
                                        <h3 class="caption-title">CEO Message</h3>
                                        <p>
                                        	Ever since the big bang and the consolidation of universe, the knowledge is expanding in all directions...
                                        </p>
                                        <p>
                                        	<a href="<?php echo Yii::app()->createurl('site/message');?>" class="btn btn-sm btn-danger" title="CEO Message">READ MORE</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="item">
                                <img src="<?php echo Yii::app()->request->baseurl;?>/images/slider/exam.jpg" style="width:1150px; height:300px;" alt="Image slide 2" />
                                <div class="k-carousel-caption pos-1-3-left scheme-light">
                               	   <div class="caption-content">
                                        <h3 class="caption-title">Our Objectives</h3>
                                        <p>
                                        	To administer efficient, transparent and internal standard tests in order to t oassess competency of...
                                        </p>
                                        <p>
                                        	<a href="<?php echo Yii::app()->createurl('site/objective');?>" class="btn btn-sm btn-danger" title="Our Objectives">READ MORE</a>
                                        </p>
                                    </div> 
                                </div>
                            </div>
                            
                            <div class="item">
                                <img src="<?php echo Yii::app()->request->baseurl;?>/images/slider/Act-Test-Challenges-Students_1.jpg" style="width:1150px; height:300px;" alt="Image slide 1" />
                                <div class="k-carousel-caption pos-1-3-right scheme-dark">
                                	<div class="caption-content">
                                        <h3 class="caption-title">About CTS</h3>
                                        <p>
                                        	CTS is an independent, professional and self-sustained organization that supports the public and private...
                                        </p>
                                        <p>
                                        	<a href="<?php echo Yii::app()->createurl('site/about');?>" class="btn btn-sm btn-danger" title="About CTS">READ MORE</a>
                                        </p>
                                    </div> 
                                </div>
                            </div>
                            
                            
                            
                          
                            
                        </div><!-- Wrapper for slides end -->
                    
                        <!-- Controls -->
                        <a class="left carousel-control" href="#carousel-featured" data-slide="prev"><i class="fa fa-chevron-left"></i></a>
                        <a class="right carousel-control" href="#carousel-featured" data-slide="next"><i class="fa fa-chevron-right"></i></a>
                        <!-- Controls end -->
                        
                    </div><!-- featured posts slider wrapper end -->
                        
                </div><!-- featured posts slider end -->
                
            </div><!-- row end -->
            <style>
			.breadcrumb li {
						font-size: 16px;
						font-style: italic;
						font-family: initial;
			}
			.a{height: 50px; width:800px; overflow: hidden; margin:10px auto;}
			.a li{height: 198px; width: 40%; list-style:none;  font-size: 30px; text-align: center; float: left;}
	        .ticker-title { padding-top: 5px;}
			.ticker { width: 100%; }
			.ticker-wrapper.has-js {margin: 4px 0px 4px 0px;width:auto;}
			</style>
            <div class="row no-gutter"><!-- row -->
                <div class="col-lg-12 col-md-12" > 
                   <ul id="js-news" class="js-hidden">
                      <?php /* //echo '<pre>'; print_r($tests); exit;
						if(!empty($tests))
						{   $counter = 1;
							foreach($tests as $rec)
							{  // echo strtotime(date('Y-m-d')); echo '<br/>'.strtotime($rec->ApplicationStartDate);
								if(strtotime(date('Y-m-d')) < strtotime($rec->ApplicationStartDate))
								{
						?>
                        <li class="news-item">
                           <a  href="<?php echo Yii::app()->createurl('site/detail/id/'.base64_encode($rec->TID))?>"  title=" Application Form">
                            <span style="width:90%;float:left;">
                                <?php echo isset($rec->TestName) ? $rec->TestName : ''; ?>
                            </span>
                           </a> 
                        </li>
                        <?php  $counter++; 
						         }
							   if($counter == 5)
								   break;
							}
						}*/
						
						?>	 
                         <li>CTS is now member of International Development Evaluation Association (IDEAS)</li>
                         <li> CTS is now ISO 9001 CERTIFIED</li>
                         <li> CTS Provide professional certifications throught quality and assessment</li>
                         
                    </ul>
                
                    <noscript>
                       
                    </noscript>  
                </div>
                <script>
				  $('.ticker-title span').html('News');
				</script>
                <div class="col-lg-4 col-md-4"><!-- upcoming events wrapper -->
                	
                    <div class="col-padded col-shaded"><!-- inner custom column -->
                    
                    	<ul class="list-unstyled clear-margins"><!-- widgets -->
                        
                        	<li class="widget-container widget_up_events"><!-- widgets list -->
                    
                                <h1 class="title-widget" style="font-size:16px;font-weight:bold;">Upcoming Tests</h1>
                                <?php 
								//$test_data = Test::model()->findall(array('order' => 'id DESC',  'limit' => '4'));
								?> 
                                
                                <ul class="list-unstyled">
                                   <?php  //echo '<pre>'; print_r($tests); exit;
									if(!empty($tests))
									{   $counter = 1;
										foreach($tests as $rec)
										{  // echo strtotime(date('Y-m-d')); echo '<br/>'.strtotime($rec->ApplicationStartDate);
										    // '0000-00-00 00:00:00'
											//echo  ' >> '.$rec->TestDate. ' ++++'.strtotime($rec->TestDate); exit;
                                            if(isset($rec->TestDate) && $rec->TestDate == '0000-00-00 00:00:00')
                                            {
									?>	
                                    
    	                                    <li class="up-event-wrap" style="margin-bottom:10px;clear:both;">
    	                                
    	                                        <h1 class="title-median">
                                                    
                                                    <a  href="<?php echo Yii::app()->createurl('site/detail/id/'.base64_encode($rec->TID))?>"  title=" Application Form">
														<span style="width:90%;float:left;">
															<?php echo isset($rec->TestName) ? $rec->TestName : ''; ?>
                                                        </span>
                                                        <span style="width:10%;float:right;">    
                                                        	<img src="<?php echo Yii::app()->request->baseurl;?>/images/new/new5.gif" style="float:right;margin-top:-9px;"/>
                                                        </span>
                                                    </a>
                                                    <div class="up-event-date" style="float:right;padding:5px;margin:bottom:0px; border-top: none;border-bottom: none; "><?php echo isset($rec->ApplicationEndDate) ? date('d M, Y', strtotime($rec->ApplicationEndDate)) : ''; ?></div>
                                                </h1>
    	                                       
    	                                     <?php /* ?>   <p>
    	                                         <?php //echo isset($rec->TestDesc) ? substr($rec->TestDesc,0,100) : ''; ?>
                                                 <?php if(strlen($rec->TestDesc) > 100){ ?> <a href="#" class="moretag" title="read more">MORE</a> <?php } ?>
    	                                        </p>  <?php */ ?>
    	                                    
    	                                    </li>
                                    <?php  $counter++;  }
                                           if($counter == 5)
                                           	   break;
                                		}
                                	}
                                	?>	
                                    
                                
                                </ul>
                                
                            
                            </li><!-- widgets list end -->
                            
                        </ul><!-- widgets end -->
                        <div  class="up-event-meta clearfix" style="float:right;    margin-right: -91px;">
                             <span style="float:right;margin-top:40px;"> <a href="<?php echo Yii::app()->createurl('site/list');?>">View All</a></span>
                            </div>
                    </div><!-- inner custom column end -->
                    
                </div><!-- upcoming events wrapper end -->
                
                <div class="col-lg-4 col-md-4"><!-- recent news wrapper -->
                	
                    <div class="col-padded"><!-- inner custom column -->
                    
                        <ul class="list-unstyled clear-margins"><!-- widgets -->
                        
                        	<li class="widget-container widget_recent_news"><!-- widgets list -->
                    
                                <h1 class="title-widget" style="font-size:16px;font-weight:bold;">Scheduled Tests</h1>
                                
                                <ul class="list-unstyled">
                                
									<?php  //echo '<pre>'; print_r($tests); exit;
                                    if(!empty($tests))
                                    {   $counter = 1;
                                        foreach($tests as $rec)
                                        {  // echo strtotime(date('Y-m-d')); echo '<br/>'.strtotime($rec->ApplicationStartDate);
                                            //if(strtotime(date('Y-m-d')) >= strtotime($rec->ApplicationStartDate) && $rec->result_status == 0)
											if(isset($rec->TestDate) && $rec->TestDate != '0000-00-00 00:00:00' && strtotime(date('Y-m-d')) < strtotime($rec->TestDate))
                                            {
                                    ?>  
                                    
                                            <li class="up-event-wrap" style="margin-bottom:10px;clear:both;">
                                        
                                                <h1 class="title-median">
                                                   <a  href="<?php echo Yii::app()->createurl('site/detail/id/'.base64_encode($rec->TID))?>"  title=" Application Form">
												      <?php echo isset($rec->TestName) ? $rec->TestName : ''; ?>
                                                   </a>
                                                </h1>
                                                
                                                <div class="up-event-date" style="float:right;padding:5px;margin:bottom:0px;  border-top: none;border-bottom: none; "><?php echo isset($rec->ApplicationEndDate) ? date('d M, Y', strtotime($rec->ApplicationEndDate)) : ''; ?></div>
                                                
                                                
                                             <?php /* ?>    <p>
                                                 <?php echo isset($rec->TestDesc) ? substr($rec->TestDesc,0,100) : ''; ?>
                                                 <?php if(strlen($rec->TestDesc) > 100){ ?> <a href="#" class="moretag" title="read more">MORE</a> <?php } ?>
                                                </p>  <?php */ ?> 
                                            
                                            </li>
                                    <?php  $counter++; } 
                                           if($counter == 5)
                                               break;
                                        }
                                    }
                                    ?>  
                                    
									
                                
                                </ul>
                                
                            </li><!-- widgets list end -->
                            <p style="float:right;margin-top:40px;"> <a href="<?php echo Yii::app()->createurl('site/schedule');?>">View All</a></p>
                        </ul><!-- widgets end -->
                    
                    </div><!-- inner custom column end -->
                    
                </div><!-- recent news wrapper end -->
                
                 <div class="col-lg-4 col-md-4"><!-- upcoming events wrapper -->
                	
                    <div class="col-padded col-shaded"><!-- inner custom column -->
                    
                    	<ul class="list-unstyled clear-margins"><!-- widgets -->
                        
                        	<li class="widget-container widget_up_events"><!-- widgets list -->
                    
                                <h1 class="title-widget" style="font-size:16px;font-weight:bold;">Completed Tests With Results</h1>
                                <?php 
								 // $test_data = Test::model()->findall(array('order' => 'id DESC'));
								?> 
                                
                                <ul class="list-unstyled">
                                   <?php  //echo '<pre>'; print_r($tests); exit;
                                    if(!empty($tests))
                                    {   $counter = 1;
                                        foreach($tests as $rec)
                                        {  // echo strtotime(date('Y-m-d')); echo '<br/>'.strtotime($rec->ApplicationStartDate);
                                           // if($rec->result_status == 1)
										    if(isset($rec->TestDate) && $rec->TestDate != '0000-00-00 00:00:00' && strtotime(date('Y-m-d')) >= strtotime($rec->TestDate) )
                                            {
                                    ?>  
                                    
                                            <li class="up-event-wrap" style="margin-bottom:20px;">
                                        
                                                <h1 class="title-median"><a  href="<?php echo Yii::app()->createurl('site/detail/id/'.base64_encode($rec->TID))?>"  title=" Application Form"><?php echo isset($rec->TestName) ? $rec->TestName : ''; ?></a></h1>
                                                
                                                <div class="up-event-meta clearfix">
                                                    <div class="up-event-date" style="float:right;padding:5px; border-top: none;border-bottom: none; "><?php echo isset($rec->TestDate) ? date('d M, Y', strtotime($rec->TestDate)) : ''; ?></div>
                                                </div>
                                                
                                            <?php /* ?>     <p>
                                                 <?php echo isset($rec->TestDesc) ? substr($rec->TestDesc,0,100) : ''; ?>
                                                 <?php if(strlen($rec->TestDesc) > 100){ ?> <a href="#" class="moretag" title="read more">MORE</a> <?php } ?>
                                                </p> <?php */ ?> 
                                            
                                            </li>
                                    <?php $counter++;  } 
                                           if($counter == 5)
                                               break;
                                        }
                                    }
                                    ?>  
                                    
                                
                                </ul>
                            
                            </li><!-- widgets list end -->
                            <p style="float:right;margin-top:40px;"> <a href="<?php echo Yii::app()->createurl('site/complete');?>">View All</a></p>
                        </ul><!-- widgets end -->
                    
                    </div><!-- inner custom column end -->
                    
                </div><!-- upcoming events wrapper end -->

        <?php /* ?>        <div class="col-lg-4 col-md-4"><!-- misc wrapper -->
                	
                    <div class="col-padded col-shaded"><!-- inner custom column -->
                    
                        <ul class="list-unstyled clear-margins"><!-- widgets -->
                        
                        	<li class="widget-container widget_course_search"><!-- widget -->
                            
                            	<h1 class="title-titan">Course Finder</h1>
                                
                                <form role="search" method="get" id="course-finder" action="#">
                                    <div class="input-group">
                                        <input type="text" placeholder="Find a course..." autocomplete="off" class="form-control" id="find-course" name="find-course" />
                                        <span class="input-group-btn"><button type="submit" class="btn btn-default">GO!</button></span>
                                    </div>
                                    <span class="help-block">* Enter course ID, title or the course instructor name</span>
                                </form>
                            
                            </li><!-- widget end -->
                            
                            <li class="widget-container widget_text"><!-- widget -->
                            
                            	<a href="#" class="custom-button cb-green" title="How to apply?">
                                	<i class="custom-button-icon fa fa-check-square-o"></i>
                                    <span class="custom-button-wrap">
                                    	<span class="custom-button-title">How to apply?</span>
                                        <span class="custom-button-tagline">Join us whenewer you feel it’s time!</span>
                                    </span>
                                    <em></em>
                                </a>
                                
                            	<a href="#" class="custom-button cb-gray" title="Campus tour">
                                	<i class="custom-button-icon fa  fa-play-circle-o"></i>
                                    <span class="custom-button-wrap">
                                    	<span class="custom-button-title">Campus tour</span>
                                        <span class="custom-button-tagline">Student's life at the glance. Take a tour...</span>
                                    </span>
                                    <em></em>
                                </a>
                                
                            	<a href="#" class="custom-button cb-yellow" title="Prospectus">
                                	<i class="custom-button-icon fa  fa-leaf"></i>
                                    <span class="custom-button-wrap">
                                    	<span class="custom-button-title">Prospectus</span>
                                        <span class="custom-button-tagline">Request a free School Prospectus!</span>
                                    </span>
                                    <em></em>
                                </a>
                            
                            </li><!-- widget end -->
                            
                            <li class="widget-container widget_sofa_twitter"><!-- widget -->
                            
                            	<ul class="k-twitter-twitts list-unstyled">
                                
                                    <li class="twitter-twitt">
                                    	<p>
                                        <a href="https://twitter.com/DanielleFilson">@MattDeamon</a> Why it always has to be so complicated? Try to get it via this link <a href="http://usap.co/potter">mama.co/hpot</a> Good luck mate!
                                        </p>
                                    </li>
                                
                                </ul>
                                
                                <div class="k-twitter-twitts-footer">
                                	<a href="#" class="k-twitter-twitts-follow" title="Follow!"><i class="fa fa-twitter"></i>&nbsp; Follow us!</a>
                                </div>
                            
                            </li><!-- widget end -->
                            
                        </ul><!-- widgets end -->
                    
                    </div><!-- inner custom column end -->
                    
                </div><!-- misc wrapper end -->  <?php */ ?>
            
            </div><!-- row end -->
        
        </div><!-- container end -->
		<!-- ********************************************************* -->
		<!-- --------------------------------------------------------- -->
		<!-- __________________  Upcoming Test Popup _________________ -->
        <a href="javascript:void(0);"  id="popup" title="popup" data-toggle="modal" data-target="#myModal"></a>

        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header" style="background-color: #ea5644;">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true" onclick="close_popup()">&times;</button>
                        <h4 class="modal-title" id="myModalLabel" >Upcoming Tests </h4>
                    </div>
                    <div class="modal-body">
                         
                        <ul class="list-unstyled">
                           <?php  //echo '<pre>'; print_r($tests); exit;
                            if(!empty($tests))
                            {   $counter = 1;
                                foreach($tests as $rec)
                                {  // echo strtotime(date('Y-m-d')); echo '<br/>'.strtotime($rec->ApplicationStartDate);
                                    if(strtotime(date('Y-m-d')) < strtotime($rec->ApplicationStartDate))
                                    {
                            ?>  
                            
                                    <li class="up-event-wrap" style="margin-bottom: 0px; ">
                                
                                        <h1 class="title-median">
                                           <img src="<?php echo Yii::app()->request->baseurl;?>/images/new/new5.gif" />
                                           <a  href="<?php echo Yii::app()->createurl('site/detail/id/'.base64_encode($rec->TID))?>"  title=" Application Form"><?php echo isset($rec->TestName) ? $rec->TestName : ''; ?></a>
                                           <div class="up-event-date" style="float:right;padding:0px; border-top: none;border-bottom: none; "><?php echo isset($rec->ApplicationStartDate) ? date('d M, Y', strtotime($rec->ApplicationStartDate)) : ''; ?></div>
                                        </h1>
                                        
                                       
                                       
                                    
                                    </li>
                            <?php  $counter++;  }
                                   if($counter == 5)
                                       break;
                                }
                            }
                            ?>  
                            
                        
                        </ul>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" onclick="close_popup()" data-dismiss="modal">Close</button>
                       <!-- <button type="button" class="btn btn-primary" onclick="del_confirm();" data-dismiss="modal">Yes</button> -->
                    </div>
                </div>
            </div>
        </div>
		<!-- ------------------- End --------------------------------- -->
        <!-- ********************************************************* -->
		<!-- --------------------------------------------------------- -->
		<!-- __________________  Profile Login _____ _________________ -->
         <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header" style="background-color: #ea5644;">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true" onclick="close_popup()">&times;</button>
                        <h4 class="modal-title" id="myModalLabel" >Upcoming Tests </h4>
                    </div>
                    <div class="modal-body" style="border:1px solid red;">
                        <div style="width:50%;border-right:1px solid gray;">
						     <h4> Sign up </h4>
							 <label> First Name : </label>
							 <input type="text" value="" />
							 <label> Last Name : </label>
							 <input type="text" value="" />
							 <label> Email : </label>
							 <input type="text" value="" />
							 <label> CNIC : </label>
							 <input type="text" value="" />
						</div>	 
                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" onclick="close_popup()" data-dismiss="modal">Close</button>
                       <!-- <button type="button" class="btn btn-primary" onclick="del_confirm();" data-dismiss="modal">Yes</button> -->
                    </div>
                </div>
            </div>
        </div>

       		
        <script>
        function close_popup()
        { 
            $.ajax({
                url: '<?php echo Yii::app()->createurl('site/closePopup'); ?>',
                type: 'Post',
                data:'',
                success: function(result)
                {
                       //alert(result); 
                }
            }) 
        }
        </script>
    

    