    <style>
    .help-block{color:red;}
    .form-group img { width: 150px; height: 100px;}

    </style> 
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Department</h2>   
                        <h5> </h5>
                       
                    </div>
                </div>
                 <!-- /. ROW  -->
                 <hr />
               <div class="row">
                <div class="col-md-12">
                    <div class="row form-group" >
                            <div class="col-xs-12" style="margin:0 auto;">
                                <ul class="nav nav-pills nav-justified thumbnail setup-panel">
                                    <li class="disabled"><a href="#step-1">
                                        <h4 class="list-group-item-heading" style="padding-top: 0px; ">Step 1</h4>
                                        <p class="list-group-item-text" style="padding-top: 0px; ">Personal Information</p>
                                    </a></li>
                                    <li class="disabled"><a href="#step-1">
                                        <h4 class="list-group-item-heading" style="padding-top: 0px; ">Step 2</h4>
                                        <p class="list-group-item-text" style="padding-top: 0px; ">Academic and Experience Information</p>
                                    </a></li>
                                    <li class="active"><a href="#step-3">
                                        <h4 class="list-group-item-heading" style="padding-top: 0px; ">Step 3</h4>
                                        <p class="list-group-item-text" style="padding-top: 0px; ">Post Applied For</p>
                                    </a></li>
                                    <!--<li class="disabled"><a href="#step-4">
                                        <h4 class="list-group-item-heading" style="padding-top: 0px; ">Step 4</h4>
                                        <p class="list-group-item-text" style="padding-top: 0px; ">Verify And Submit</p>
                                    </a></li>-->
                                </ul>
                            </div>
                     </div>
                    <!-- Form Elements -->
                    <?php if(Yii::app()->session['success'] != ''){ ?>
                    <div style="background-color:#B0F3B0;padding:6px;" id="p_sucess"><?php echo Yii::app()->session['success']; ?></div>
                    <?php Yii::app()->session['success'] = ''; } ?>
                    
                    <div class="panel panel-default" id="user_profile_step" >
                        <div class="panel-heading">
                          <b> Step 3 : </b>  Post Applied For
                          <span style="margin-left:55%;">
                             <input type="button"  class="btn btn-primary" onclick="location.href='<?php echo Yii::app()->createurl('admin/applications/step_2/PCLTC/'.Yii::app()->request->getParam('PCLTC')); ?>'" value="Edit Personal & Academic info" >
                          </span>   
                        </div>
                        
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-8">
                                    <h3></h3>   
                                    <form role="form" method="post" id="personal_info_form" onsubmit="return check_validation()" enctype="multipart/form-data">        
                                        <div class="form-group"> 
                                            <label>Select Organization</label> 
                                            <select class="form-control" id="dep_id" required name="org" onchange="get_test()">
                                                 <option value="">Select Department </option>
                                              <?php if(!empty($org)) {
                                                 foreach($org as $rec) { ?>
                                                    <option value="<?php echo base64_encode($rec->OrgID); ?>" <?php if(isset($post_cand->p->org->OrgID) && $post_cand->p->org->OrgID == $rec->OrgID) echo 'selected'; ?>><?php echo $rec->OrgName;?></option>
                                              <?php } } ?>      
                                              
                                            </select>  
                                            <sapn class="help-block" id="subject_error"></sapn>
                                        </div>
                                        <div class="form-group"> 
                                           <label>Select Test</label> 
                                           <div id="test_area" >
                                           	<select class="form-control" id="" required name="test" onchange="get_post()">
                                                 <option value="">Select Test </option>
                                            </select>  
                                           	</div>
                                        </div>
                                        <div class="form-group"> 
                                           <label>Select Post</label> 
                                           <div id="post_area" >
                                           	 
                                           	</div>
                                        </div>
                                        <div class="form-group">
                                            <label>Form Reg Number #</label>  
                                            <input type="text" name="form_reg" required="required"  class="form-control"  value="<?php echo isset($post_cand->form_reg_no) ? $post_cand->form_reg_no : '' ; ?>">
                                            <sapn class="help-block" id="title_error"></sapn>
                                        </div>
                                        <div class="form-group">
                                            <label>Application Submit Date</label> 
                                            <input type="date" name="submit_date" required  class="form-control" placeholder="" value="<?php echo isset($post_cand->submit_date) ? $post_cand->submit_date : '' ; ?>"> 
                                            <sapn class="help-block" id="subject_error"></sapn>
                                        </div> 
                                        <div class="form-group">
                                            <label>Bank Slip Submited</label><br/>
                                            <input type="radio" name="bank_slip"    placeholder="" value="1"> Yes
                                            &nbsp;&nbsp;<input type="radio" name="bank_slip" checked placeholder="" value="0"> No
                                            <sapn class="help-block" id="cnic_error"></sapn>
                                        </div>
                                        <div class="form-group">
                                            <label>Application Status</label><br/>
                                            <input type="radio" name="status"   placeholder="" value="1"> Completed
                                            &nbsp;&nbsp;<input type="radio" name="status" checked  placeholder="" value="0"> Pending
                                            <sapn class="help-block" id="email_error"></sapn>
                                        </div>
                                        
                                        <input type="hidden" class="form-control" name="<?php if(!empty($post_cand)) echo 'step_3_post_applied_update'; else echo 'step_3_post_applied'; ?>" value="1"  />
                                        <button type="submit" class="btn btn-primary" >Continue</button>
                                        <button type="reset" class="btn btn-default" onclick="location.href='<?php echo Yii::app()->createurl('admin/applications/step_2'); ?>'">Back</button>
                                        <div class="form-group" id="loader">
                                        </div>
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
	function open_step_profile(val)
	{
		if(val == 1)
		{
			$('#user_profile_step').hide();
			$('#check_user_profile').show();
		}
		else if(val == 2)
		{
			$('#user_profile_step').show();
			$('#check_user_profile').hide();
		}
	}
    $('#p_sucess').fadeOut(12000);
	
	//
	function get_test()
	{
		var id = $('#dep_id').val(); 
        $.ajax({
            url : '<?php echo Yii::app()->createurl("admin/test/get_test");?>',
            type: 'POST',
            data : 'OrgID='+id,
            success:function(result)
            {
                var data = JSON.parse(result);

                if(data.status == 'success')
                {
                    $('#test_area').html(data.data);
					    
                    <?php if(isset($post_cand->p->org->OrgID)){ ?>
                          $('#org_test').val('<?php echo isset($post_cand->p->t->TID) ? $post_cand->p->t->TID : '';?>'); 
						  <?php if(isset($post_cand->p->t->TID)){ ?>
								 get_post();
						  <?php } ?> 
                    <?php } ?>     
                }

            }
        });
	}
	<?php if(isset($post_cand->p->org->OrgID)){ ?>
	     get_test();
	<?php } ?>	 
	function get_post()   
    {  
        var id = $('#org_test').val(); 
        $.ajax({
            url : '<?php echo Yii::app()->createurl("admin/test/get_tests_posts");?>',
            type: 'POST',
            data : 'testID='+id,
            success:function(result)
            {
                var data = JSON.parse(result);

                if(data.status == 'success')
                {
                    $('#post_area').html(data.data);
					    
                     <?php if(isset($post_cand->p->PID)){ ?>
                          $('#test_post').val('<?php echo isset($post_cand->p->PID) ? $post_cand->p->PID : '';?>'); 
					 <?php } ?>   	  
                }

            }
        });
    }
	
    </script>
         
    