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
                        <li class="active">Contact Us</li>
                    </ol>
                    
                </div><!-- breadcrumbs end -->               
                
            </div><!-- row end -->
            
            <div class="row no-gutter"><!-- row -->
                
                <div class="col-lg-8 col-md-8"><!-- doc body wrapper -->
                	
                    <div class="col-padded"><!-- inner custom column -->
                    
                    	<div class="row gutter"><!-- row -->
                        
                        	<div class="col-lg-12 col-md-12" >
                            
                                <div id="k-contact-map" class="clearfix" style="display:none;"><!-- map -->
                                    <div 
                                    id="g-map-1" 
                                    class="map" 
                                    data-gmaptitle="Contact" 
                                    data-gmapzoom="15" 
                                    data-gmaplon="-76.422377" 
                                    data-gmaplat="43.314594" 
                                    data-gmapmarker="" 
                                    data-cname="Buntington Public Schools" 
                                    data-caddress="115 W Broadway" 
                                    data-ccity="Fulton" 
                                    data-cstate="NY" 
                                    data-czip="13069" 
                                    data-ccountry="USA">
                                    </div> 
                                </div>
                                
                                <h1 class="page-title">Contact Us</h1>
                                
                                <div class="news-body">
                                
                                   <span style="color:#2BBB2B;"><?php echo Yii::app()->user->getFlash('contact'); ?></span> 
                                    
                                    <div class="row" style="display:none;">
                                    	<div class="col-lg-6 col-md-6 col-sm-12">
                                        	<h6 class="remove-margin-bottom">Burbank Primary School</h6>
											<p class="small">Email: Contact Us : info@cts.org.pk   |   Fax: 631 551 31 78</p>
                                            
											<h6 class="remove-margin-top remove-margin-bottom">Washington Primary School</h6>
											<p class="small">Tel: 631 552 32 77   |   Fax: 631 552 32 78</p>
											
                                            <h6 class="remove-margin-top remove-margin-bottom">Woodland Intermediate School</h6>
                                            <p class="small">Tel: 631 553 33 77   |   Fax: 631 553 33 78</p>
                                        </div>
                                        
                                    	<div class="col-lg-6 col-md-6 col-sm-12">
                                        	<h6 class="remove-margin-bottom">Brisbane Intermediate School</h6>
											<p class="small">Tel: 631 554 34 77   |   Fax: 631 554 34 78</p>
                                            
											<h6 class="remove-margin-top remove-margin-bottom">New York Middle School</h6>
											<p class="small">Tel: 631 555 35 77   |   Fax: 631 555 35 78</p>
											
                                            <h6 class="remove-margin-top remove-margin-bottom">Buntington High School</h6>
                                            <p class="small">Tel: 631 556 36 77   |   Fax: 631 556 36 78</p>
                                        </div>
                                    </div>
                                    
                                    <hr />
                                    
                                    <h6></h6>
                                    
                                    <form id="contactform" method="post" action="#">
                                        <div class="row"><!-- starts row -->
                                            <div class="form-group col-lg-6 col-md-6 col-sm-12">
                                                <label for="contactName"><span class="required">*</span> Name</label>
                                                <input type="text" aria-required="true" size="30" required value="" name="name" id="contactName" class="form-control requiredField" />
                                            </div>
                                            <div class="form-group col-lg-6 col-md-6 col-sm-12">
                                                <label for="email"><span class="required">*</span> E-mail</label>
                                                <input type="email" aria-required="true" size="30" required value="" name="email" id="email" class="form-control requiredField" />
                                            </div> 
                                        </div><!-- ends row -->
                                        
                                        <div class="row"><!-- starts row -->
                                            <div class="form-group col-lg-6 col-md-6 col-sm-12">
                                                <label for="contactPhone">Phone / Cell</label>
                                                <input type="text" aria-required="true" required size="30" value="" name="phone" id="contactPhone" class="form-control" />
												<span style="font-size:12px;">(eg : xxx-xxxxx-xx)
                                            </div>
                                            
                                        </div><!-- ends row -->
                                        
                                        <div class="row"><!-- starts row -->
                                            <div class="form-group col-lg-12">
                                                <label for="contactSubject">Message Subject</label>
                                                <input type="text" aria-required="true" size="30" required value="" name="subject" id="contactSubject" class="form-control" />
                                            </div>
                                        </div><!-- ends row -->
                                        
                                        <div class="row"><!-- starts row -->
                                            <div class="form-group clearfix col-lg-12">
                                                <label for="comments"><span class="required">*</span> Message</label>
                                                <textarea aria-required="true" rows="5" cols="45" required name="message" id="comments" class="form-control requiredField mezage"></textarea>
                                            </div>
                            
                                            <div class="form-group clearfix col-lg-12 text-right remove-margin-bottom">
                                                <input type="hidden" name="submitted" id="submitted" value="true" />
                                                <input type="submit" value="Send Message" id="submit" name="submit" class="btn btn-default" />
                                            </div>
                                        </div><!-- ends row -->
                                    </form>
                                    
                                </div>
                            
                            </div>
                        
                        </div><!-- row end -->               
                    
                    </div><!-- inner custom column end -->
                    
                </div><!-- doc body wrapper end -->
                
                <div id="k-sidebar" class="col-lg-4 col-md-4"><!-- sidebar wrapper -->
                	
               <?php /* ?>     <div class="col-padded col-shaded"><!-- inner custom column -->
                    
                        <ul class="list-unstyled clear-margins"><!-- widgets -->
                        
                        	<li class="widget-container widget_nav_menu"><!-- widget -->
                    
                                <h1 class="title-widget">Select</h1>
                                
                                <ul>
                                	<li><a href="#" title="menu item">News Archive</a></li>
                                    <li><a href="#" title="menu item">Tradition of School Events</a></li>
                                    <li><a href="#" title="menu item">Report Asocial Behaviour</a></li>
                                    <li><a href="#" title="menu item">Trends and Tips</a></li>
                                    <li><a href="#" title="menu item">Events Poll</a></li>
                                </ul>
                    
							</li>
                            
                        	<li class="widget-container widget_recent_news"><!-- widgets list -->
                    
                                <h1 class="title-widget">School News</h1>
                                
                                <ul class="list-unstyled">
                                
									<li class="recent-news-wrap news-no-summary">
                                        
                                        <div class="recent-news-content clearfix">
                                            <figure class="recent-news-thumb">
                                                <a href="#" title="Megan Boyle flourishes..."><img src="img/recent-news-thumb-1.jpg" class="attachment-thumbnail wp-post-image" alt="Thumbnail 1" /></a>
                                            </figure>
                                            <div class="recent-news-text">
                                                <div class="recent-news-meta">
                                                    <div class="recent-news-date">Jun 12, 2014</div>
                                                </div>
                                                <h1 class="title-median"><a href="#" title="Megan Boyle flourishes...">Megan Boyle flourishes at Boston University</a></h1>
                                            </div>
                                        </div>
                                    
                                    </li>
                                    
									<li class="recent-news-wrap news-no-summary">

                                        <div class="recent-news-content clearfix">
                                            <figure class="recent-news-thumb">
                                                <a href="#" title="Buntington Alum..."><img src="img/recent-news-thumb-2.jpg" class="attachment-thumbnail wp-post-image" alt="Thumbnail 2" /></a>
                                            </figure>
                                            <div class="recent-news-text">
                                                <div class="recent-news-meta">
                                                    <div class="recent-news-date">Jun 10, 2014</div>
                                                </div>
                                                <h1 class="title-median"><a href="#" title="Buntington Alum...">Buntington Alum Marc Bloom Pens New Book</a></h1>
                                            </div>
                                        </div>
                                    
                                    </li>
                                    
									<li class="recent-news-wrap news-no-summary">

                                        <div class="recent-news-content clearfix">
                                            <figure class="recent-news-thumb">
                                                <a href="#" title="Cody Rotschild Enjoys..."><img src="img/recent-news-thumb-3.jpg" class="attachment-thumbnail wp-post-image" alt="Thumbnail 3" /></a>
                                            </figure>
                                            <div class="recent-news-text">
                                                <div class="recent-news-meta">
                                                    <div class="recent-news-date">Jun 05, 2014</div>
                                                </div>
                                                <h1 class="title-median"><a href="#" title="Cody Rotschild Enjoys...">Cody Rotschild Enjoys Life in Montreal</a></h1>
                                            </div>
                                        </div>
                                    
                                    </li>
                                
                                </ul>
                                
                            </li><!-- widgets list end -->
                            
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
                    
                    </div><!-- inner custom column end -->  <?php */ ?>
                <?php $this->renderPartial('_sidebar', array('tests' => $tests)); ?>
                    <!-- inner custom column end -->
                    
                    
                </div><!-- sidebar wrapper end -->
            
            </div><!-- row end -->
        
        </div><!-- container end -->