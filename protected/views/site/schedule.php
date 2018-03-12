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
                
                 
                    
                </div><!-- breadcrumbs end -->               
                
            </div><!-- row end -->
            
            <div class="row no-gutter"><!-- row -->
                
              <div class="col-lg-8 col-md-8"><!-- doc body wrapper -->
                  
                    <div class="col-padded"><!-- inner custom column -->
                    
                      <div class="row gutter"><!-- row -->
                        
                          <div class="col-lg-12 col-md-12">
                    
                              <h1 class="page-title">Schedule Tests</h1><!-- category title -->
                            
                            </div>
                        
                        </div><!-- row end -->
                    
                      <div class="row gutter"><!-- row -->
                        
                          <div class="col-lg-12 col-md-12">
                                
                                <table class="table table-striped table-courses">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>Test Title</th>
                                            <th>Application Start Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php //echo '<pre>'; print_r($tests); exit;
                                    if(!empty($tests))
                                    {   $counter = 1; $output_rec = 0;
                                        foreach($tests as $rec)
                                        {  // echo strtotime(date('Y-m-d')); echo '<br/>'.strtotime($rec->ApplicationStartDate);
                                            //if(strtotime(date('Y-m-d')) >= strtotime($rec->ApplicationStartDate) && $rec->result_status == 0)
											if(isset($rec->TestDate) && $rec->TestDate != '0000-00-00 00:00:00' && strtotime(date('Y-m-d')) < strtotime($rec->TestDate))
                                            {
                                    ?>  
                                              <tr>
                                                  <td><img src="<?php echo Yii::app()->request->baseurl;?>/images/new/new5.gif" /></td>
                                                  <td><a  href="<?php echo Yii::app()->createurl('site/detail/id/'.base64_encode($rec->TID))?>"  title=" Application Form"><?php echo isset($rec->TestName) ? $rec->TestName : ''; ?></a></td>
                                                  <td><?php echo isset($rec->ApplicationStartDate) ? date('d M, Y', strtotime($rec->ApplicationStartDate)) : ''; ?></td>
                                              </tr>
                                    <?php      $output_rec++; 
											}
											
                                         }
                                    }
									else
									{
									?>
										<tr>
											<td colspan="3" align="center" style="color:#F00;">No record available</td>
										</tr>
									<?php	   
									 }	
									 if($output_rec == 0)
									 {
									?>		
                                    	<tr>
											<td colspan="3" align="center" style="color:#F00;">No record available</td>
										</tr>
                                     <?php 
									 }
									 ?>    
                                        
                                    </tbody>
                                </table>
                            
                            </div>
                        
                        </div><!-- row end --> 
                        
                        <div class="row gutter" style="display:none;"><!-- row -->
                        
                          <div class="col-lg-12">
                        
                                <ul class="pagination pull-right"><!-- pagination -->
                                    <li class="disabled"><a href="#">Prev</a></li>
                                    <li class="active"><a href="#">1</a></li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a href="#">4</a></li>
                                    <li><a href="#">5</a></li>
                                    <li><a href="#">Next</a></li>
                                </ul><!-- pagination end -->
                            
                            </div>
                            
                        </div><!-- row end -->                 
                    
                    </div><!-- inner custom column end -->
                    
                </div><!-- doc body wrapper end -->
                
                <div id="k-sidebar" class="col-lg-4 col-md-4"><!-- sidebar wrapper -->
                  
                   
                      <?php $this->renderPartial('_sidebar', array('tests' => $tests)); ?><!-- inner custom column end -->
                    
                </div><!-- sidebar wrapper end -->
            
            </div><!-- row end -->
        
        </div><!-- container end -->