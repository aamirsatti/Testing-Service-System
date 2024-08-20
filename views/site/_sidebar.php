<div class="col-padded col-shaded"><!-- inner custom column -->
                    
                        <ul class="list-unstyled clear-margins"  ><!-- widgets -->
                        
                            <li class="widget-container widget_up_events" ><!-- widgets list -->
                    
                                <h1 class="title-widget" style="font-size:16px;font-weight:bold;">Upcoming Tests</h1>
                                <?php 
                                //$test_data = Test::model()->findall(array('order' => 'id DESC',  'limit' => '4'));
                                ?> 
                                <div style="height:<?php if(Yii::app()->controller->action->id =='list') echo '600px'; else echo '400px';?>; display:none;" >
                                <ul class="list-unstyled" id="marquee-vertical"  >
                                   <?php //echo '<pre>'; print_r($tests); exit;
                                    if(!empty($tests))
                                    {   $counter = 1;
                                        foreach($tests as $rec)
                                        {  // echo strtotime(date('Y-m-d')); echo '<br/>'.strtotime($rec->ApplicationStartDate);
                                            if(strtotime(date('Y-m-d')) < strtotime($rec->ApplicationStartDate))
                                            {
                                    ?>  
                                    
                                            <li class="up-event-wrap" style="margin-bottom:20px;clear:both;">
                                        
                                                <h1 class="title-median">
                                                 <a  href="<?php echo Yii::app()->createurl('site/detail/id/'.base64_encode($rec->TID))?>"  title=" Application Form">
												     <span style="width:90%;float:left;">
													 	<?php echo isset($rec->TestName) ? $rec->TestName : ''; ?>
                                                     </span>
                                                     <span style="width:10%;float:right;">       
                                                     	<img src="<?php echo Yii::app()->request->baseurl;?>/images/new/new5.gif" style="float:right;margin-top:0px;"/>
                                                     </span>   
                                                 </a>
                                                </h1>
                                                
                                                <div class="up-event-meta clearfix">
                                                    <div class="up-event-date" style="float:right;padding:5px; border-top: none;border-bottom: none; "><?php echo isset($rec->ApplicationStartDate) ? date('d M, Y', strtotime($rec->ApplicationStartDate)) : ''; ?></div>
                                                </div>
                                                
                                            <?php /* ?>    <p>
                                                 <?php echo isset($rec->TestName) ? substr($rec->TestName,0,100) : ''; ?>
                                                 <?php if(strlen($rec->TestName) > 100){ ?> <a href="#" class="moretag" title="read more">MORE</a> <?php } ?>
                                                </p> <?php */ ?>
                                            
                                            </li>
                                    <?php $counter++;  } 
                                          // if($counter == 4)
                                              // break;
                                        }
                                    }
                                    ?>  
                                
                                </ul>
                                </div>
                            
                            
						   <style>
                           .b{height: 400px; overflow: hidden;  margin-left:auto; margin-right: auto;}
                        .b-con div{ height: 88px; line-height: 2.4; font-size: 14px; color:black;}
                        .b-con div a:link, .b-con div a:visited { color: #887F7E; }
						 .b-con div a:hover { color: black; }
                        </style>                     
                            <div class="b" id="b1">
                                <div class="b-con">
                                    <?php //echo '<pre>'; print_r($tests); exit;
                                            if(!empty($tests))
                                            {   $counter = 1;
                                                foreach($tests as $rec)
                                                {  // echo strtotime(date('Y-m-d')); echo '<br/>'.strtotime($rec->ApplicationStartDate);
                                                  //  if(strtotime(date('Y-m-d')) < strtotime($rec->ApplicationStartDate))
                                                    {
                                            ?>  
                                                     <div>
                                                         <a  href="<?php echo Yii::app()->createurl('site/detail/id/'.base64_encode($rec->TID))?>"  title=" Application Form">
                                                                 <span style="width:90%;float:left;">
                                                                    <?php echo isset($rec->TestName) ? $rec->TestName : ''; ?>
                                                                 </span>
                                                                 <span style="width:10%;float:right;">       
                                                                    <img src="<?php echo Yii::app()->request->baseurl;?>/images/new/new5.gif" style="float:right;margin-top:0px;"/>
                                                                 </span> 
                                                                 <span class="up-event-date" style="float:right;padding:5px; border-top: none;border-bottom: none; "><?php echo isset($rec->ApplicationStartDate) ? date('d M, Y', strtotime($rec->ApplicationStartDate)) : ''; ?></span>
                                                                <?php /*?> <span class="up-event-meta clearfix">
                                                                    <span class="up-event-date" style="float:right;padding:5px; border-top: none;border-bottom: none; "><?php echo isset($rec->ApplicationStartDate) ? date('d M, Y', strtotime($rec->ApplicationStartDate)) : ''; ?></span>
                                                                </span>  <?php */?>
                                                             </a>
                                                      </div>  
                                                    
                                            <?php $counter++;  } 
                                                  // if($counter == 4)
                                                      // break;
                                                }
                                            }
                                            ?>  
                                    
                                </div>
                            </div>
                          </li><!-- widgets list end -->
                        </ul><!-- widgets end -->
                    
                    </div>
       