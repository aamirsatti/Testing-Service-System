    <style>
    .help-block{color:red;}
    .form-group img { width: 150px; height: 100px;}

    </style> 
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Test</h2>   
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
                           Add Test
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-8">
                                    <h3></h3>   
                                    <form role="form" method="post" enctype="multipart/form-data">        
                                        <div class="form-group"> 
                                            <label>Select Organization</label> 
                                            <select class="form-control" id="dep_id" required name="org" onchange="get_post()">
                                                 <option value="">Select Department </option>
                                              <?php if(!empty($org)) {
                                                 foreach($org as $rec) { ?>
                                                    <option value="<?php echo base64_encode($rec->OrgID); ?>" <?php if(isset($data->org->OrgID) && $data->org->OrgID == $rec->OrgID) echo 'selected'; ?>><?php echo $rec->OrgName;?></option>
                                              <?php } } ?>      
                                              
                                            </select>  
                                            <sapn class="help-block" id="subject_error"></sapn>
                                        </div>
                                        <script>

                                        </script>
                                        <div class="form-group"> 
                                            <label>Select Post</label> 
                                            <span id="post_dd">
                                                <select class="form-control" required name="org_post">
                                                     <option value="">Select Post </option>
                                                </select>  
                                            </span>    
                                            <sapn class="help-block" id="subject_error"></sapn>
                                        </div>
                                        <div class="form-group">
                                            <label>Test Title</label> 
                                            <input class="form-control" name="test_title" id="title" required value="<?php echo isset($data->TestName) ? $data->TestName : ''; ?>"/>
                                            <sapn class="help-block" id="title_error"></sapn>
                                        </div>
                                        <div class="form-group">
                                            <label>Test date</label> 
                                            <input type="date" class="form-control" name="test_date"  id="test_date" value="<?php if(isset($data->TestDate) && $data->TestDate != '0000-00-00 00:00:00') echo date('Y-m-d', strtotime($data->TestDate)); ?>"/ >
                                            <sapn class="help-block" id="subject_error"></sapn>
                                        </div>
                                        <div class="form-group">
                                            <label>Description</label>
                                            <textarea class="form-control" id="body" rows="8" cols="10" name="test_detail"><?php echo isset($data->TestDesc) ? str_replace(array("<br />"),"",$data->TestDesc) : ''; ?></textarea>   
                                            <?php
                                                // Make sure you are using correct paths here.
                                               $ckeditor = new CKEditor();
                                                $ckeditor->basePath = Yii::app()->request->baseurl.'/resources/Ckeditor/ckeditor/';
                                                $ckfinder = new CKFinder();
                                                $ckfinder->BasePath = Yii::app()->request->baseurl.'/resources/Ckeditor/ckfinder/'; // Note: the BasePath property in the CKFinder class starts with a capital letter.
                                                $ckeditor->config['height'] = 250;
                                                //$ckeditor->config['width'] = 650;
                                                $ckfinder->SetupCKEditorObject($ckeditor);
                                                
                                                $ckeditor->replace("body");
                                            ?>
                                            <sapn class="help-block" id="body_error"></sapn>
                                        </div>
                                        <div class="form-group">
                                            <label>Application Start Date</label> 
                                            <input type="date" class="form-control" name="application_start_date" required id="application_start_date" value="<?php echo isset($data->ApplicationStartDate) ? date('Y-m-d', strtotime($data->ApplicationStartDate)) : ''; ?>"/>
                                            <sapn class="help-block" id="subject_error"></sapn>
                                        </div>
                                        <div class="form-group">
                                            <label>Application End Date</label> 
                                            <input type="date" class="form-control" name="application_end_date" required id="application_end_date" value="<?php echo isset($data->ApplicationEndDate) ? date('Y-m-d', strtotime($data->ApplicationEndDate)) : ''; ?>"/>
                                            <sapn class="help-block" id="subject_error"></sapn>
                                        </div>
                                        <div class="form-group">
                                            <?php if(Yii::app()->controller->action->id == 'edit') { ?>
                                            <label>Application Advertisement</label> <br/>
                                            <?php if(isset($data->test_ad) && $data->test_ad != '' && is_file(Yii::getPathOfAlias('webroot') ."/uploads/test_ads/".$data->test_ad)){ ?>
                                                <a  class="btn btn-primary" href="<?php echo Yii::app()->request->baseurl ."/uploads/test_ads/".$data->test_ad; ?>" download>Download Application Ad</a>
                                                <input type="hidden" name="prev_test_ad" value="<?php echo isset($data->test_ad) ? $data->test_ad : ''; ?>">
                                            <?php }else { ?>
                                                <sapn class="help-block" id="subject_error">No Advertisement Found</sapn>
                                            <?php } ?>      
                                            <br/>
                                            <?php } ?>
                                            <label>Upload Application Advertisement</label> 
                                            <input  type="file" class="form-control"   name="test_ad"  />
                                            <sapn class="help-block" id="subject_error"><?php if(Yii::app()->controller->action->id == 'edit') echo 'Change'; else echo 'Upload'; ?>  Application Advertisement Docx, Pdf or Image</sapn>
                                        </div> 
                                        
                                        <div class="form-group" style="display:none;">
                                            <?php if(Yii::app()->controller->action->id == 'edit') { ?>
                                            <label>Application Form</label> <br/>
                                            <?php if(isset($data->test_application_form) && $data->test_application_form != '' && is_file(Yii::getPathOfAlias('webroot') ."/uploads/test_forms/".$data->test_application_form)){ ?>
                                                <a  class="btn btn-primary" href="<?php echo Yii::app()->request->baseurl ."/uploads/test_forms/".$data->test_application_form; ?>" download>Download Application Form</a>
                                                <input type="hidden" name="prev_test_form" value="<?php echo isset($data->test_application_form) ? $data->test_application_form : ''; ?>">
                                            <?php }else { ?>
                                                <sapn class="help-block" id="subject_error">No Application Found</sapn>
                                            <?php } ?>      
                                            <br/>
                                            <?php } ?>
                                            <label><?php if(Yii::app()->controller->action->id == 'edit') echo 'Change'; else echo 'Upload'; ?> Application Form</label> 
                                            <input  type="file" class="form-control" name="test_form"  />
                                            <sapn class="help-block" id="subject_error">Upload Application Form Docx or Pdf</sapn>
                                        </div>

                                        <div class="form-group" style="display:none;">
                                            <span style="color:red;">Note:</span><br/>
                                            <span>Use these variables in email body for dynamic content (system will get related values while sending emails).</span><br/>
                                            
                                        </div>
                                        <input type="hidden" class="form-control" name="test_data" value="1"  />
                                        <button type="submit" class="btn btn-primary" onclick="return email_templates()">Update</button>
                                        <button type="reset" class="btn btn-default" onclick="location.href='<?php echo Yii::app()->createurl('admin/test/list'); ?>'">Back</button>

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
	function test_quota_fund(val)
	{ 
		if(val == 1)
		{
			$('#test_quota_area').show();
		}
		else if(val == 0)
		{
			$('#test_quota_area').hide();
		}
	}
	
    $('#p_sucess').fadeOut(12000);
    function get_post()
    {  
        var id = $('#dep_id').val(); 
		var test_ID = '';
		<?php if(Yii::app()->controller->action->id == 'edit') { ?>
		     test_ID = '<?php echo isset($data->TID) ? $data->TID : ''; ?>';
		<?php } ?>	 
        $.ajax({
            url : '<?php echo Yii::app()->createurl("admin/test/get_posts");?>',
            type: 'POST',
            data : 'OrgID='+id+'&test_ID='+test_ID,
            success:function(result)
            {
                var data = JSON.parse(result);

                if(data.status == 'success')
                {
                    $('#post_dd').html(data.data);
					    
                      
                }

            }
        });
    }
    <?php if(isset($data->org->OrgID)){ ?>
         get_post();

    <?php } ?>  
    </script>
         
    