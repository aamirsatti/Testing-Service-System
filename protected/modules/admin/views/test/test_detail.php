    <style>
    .help-block{color:red;}
    .form-group img { width: 150px; height: 100px;}

    </style> 
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Schedule Test</h2>   
                        <h5> </h5>
                       
                    </div>
                </div>
                 <!-- /. ROW  -->
                 <hr />
               <div class="row">
                <div class="col-md-12">  
                    <!-- Form Elements -->
                    <?php if(Yii::app()->session['success'] != ''){ ?>
                    <div style="background-color:#B0F3B0;padding:6px;" id="p_sucess"><?php echo Yii::app()->session['success']; ?></div>
                    <?php Yii::app()->session['success'] = ''; } ?>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           Test Detail
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-8">
                                    <h3></h3>   
                                    <form role="form" method="post" enctype="multipart/form-data">        
                                        <div class="form-group"> 
                                            <label>Organization : </label> 
                                             <?php echo isset($data->org->OrgName) ? $data->org->OrgName : '';?> 
                                            <sapn class="help-block" id="subject_error"></sapn>
                                        </div>
                                        <script>

                                        </script>
                                        <div class="form-group"> 
                                            <label>Posts</label> 
                                            <table cellpadding="4" cellspacing="4" class="table table-striped table-bordered table-hover">
                                              <tr>
                                                <th> Sr No</th> <th align="center"> Post Title</th>
                                              </tr>
												<?php  $counter = 1;
                                                if(!empty($data->posts))
                                                {
                                                    foreach($data->posts as $rec)
                                                    {
                                                ?>		
                                            		  <tr>
                                                        <td> <?php echo $counter; ?></td>
                                                        <td> <?php echo isset($rec->PostName) ? $rec->PostName : '' ;?></td>
                                                      </tr>
                                                <?php $counter++;
													  }
												}
												?>
                                            </table>       
                                            <sapn class="help-block" id="subject_error"></sapn>
                                        </div>
                                        <div class="form-group">
                                            <label>Test Title : </label> 
                                            <?php echo isset($data->TestName) ? $data->TestName : ''; ?>
                                            <sapn class="help-block" id="title_error"></sapn>
                                        </div>
                                        <div class="form-group">
                                            <label>Test date : </label> 
                                            <?php if(isset($data->TestDate) && $data->TestDate != '0000-00-00 00:00:00') echo date('Y-m-d', strtotime($data->TestDate)); ?>
                                            <sapn class="help-block" id="subject_error"></sapn>
                                        </div>
                                        <div class="form-group">
                                            <label>Description : </label>
                                            <?php echo isset($data->TestDesc) ? str_replace(array("<br />"),"",$data->TestDesc) : ''; ?>
                                            
                                            <sapn class="help-block" id="body_error"></sapn>
                                        </div>
                                        <div class="form-group">
                                            <label>Application Start Date</label> 
                                            <?php echo isset($data->ApplicationStartDate) ? date('Y-m-d', strtotime($data->ApplicationStartDate)) : ''; ?>
                                            <sapn class="help-block" id="subject_error"></sapn>
                                        </div>
                                        <div class="form-group">
                                            <label>Application End Date</label> 
                                            <?php echo isset($data->ApplicationEndDate) ? date('Y-m-d', strtotime($data->ApplicationEndDate)) : ''; ?>
                                            <sapn class="help-block" id="subject_error"></sapn>
                                        </div>
                                        <div class="form-group">
                                            <?php //if(Yii::app()->controller->action->id == 'edit') { ?>
                                            <label>Application Advertisement</label> <br/>
                                            <?php if(isset($data->test_ad) && $data->test_ad != '' && is_file(Yii::getPathOfAlias('webroot') ."/uploads/test_ads/".$data->test_ad)){ ?>
                                                <a  class="btn btn-primary" href="<?php echo Yii::app()->request->baseurl ."/uploads/test_ads/".$data->test_ad; ?>" download>Download Application Ad</a>
                                            <?php }else { ?>
                                                <sapn class="help-block" id="subject_error">No Advertisement Found</sapn>
                                            <?php } ?>      
                                            <br/>
                                            <?php //} ?>
                                        </div> 
                                        <div class="form-group">
                                            <label>Total Applications : </label> 
                                            <?php 
											     $app = 0;
												 if(!empty($data->posts)) 
												 {
													 foreach($data->posts as $post) 
											      		$app = $app + Pstcandloctestcentr::model()->count('PID=:id and status=:status', array(':id' => $post->PID, ':status' => 1));
												 }
												  echo isset($app) ? $app : 0; 
											?>
                                            <sapn class="help-block" id="subject_error"></sapn>
                                        </div>
                                        

                                        <button type="submit" class="btn btn-primary" onclick="return email_templates()">Generate Roll Number Slips</button>
                                        <button type="reset" class="btn btn-default" onclick="location.href='<?php echo Yii::app()->createurl('admin/test/schedule_test'); ?>'">Back</button>

                                    </form>
                                    <br />
                                </div>
                            </div>
                        </div>
                    </div>
                     <!-- End Form Elements -->
                </div>
            </div>
                <!-- /. ROW  -->
                <div class="row">
                    <div class="col-md-12">
                        <h3></h3>
                         <p>
                        </p>
                    </div>
                </div>
                <!-- /. ROW  -->
    </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
    <script>
	
	
    $('#p_sucess').fadeOut(12000);
    
    </script>
         
    