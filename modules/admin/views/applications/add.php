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
                    <div class="row form-group">
                            <div class="col-xs-12">
                                <ul class="nav nav-pills nav-justified thumbnail setup-panel">
                                    <li class="active"><a href="#step-1">
                                        <h4 class="list-group-item-heading" style="padding-top: 0px; ">Step 1</h4>
                                        <p class="list-group-item-text" style="padding-top: 0px; ">Personal Information</p>
                                    </a></li>
                                    <li class="disabled"><a href="#step-1">
                                        <h4 class="list-group-item-heading" style="padding-top: 0px; ">Step 2</h4>
                                        <p class="list-group-item-text" style="padding-top: 0px; ">Academic and Experience Information</p>
                                    </a></li>
                                    <li class="disabled"><a href="#step-3">
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
                    <div class="panel panel-default" id="check_user_profile">
                        <div class="panel-heading">
                          <b> Check : </b>  Check User Profile
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-8">
                                    <h3></h3>   
                                    <form method="post" id="check_user_profile" action="<?php //echo Yii::app()->createurl('admin/applications/step_2');?>">        
                                        
                                        <div class="form-group">
                                            <label>CNIC</label>
                                            <input type="text" name="cnic" id="cnic1" required  class="form-control " placeholder="" value="<?php echo isset($user_data->CanCNIC) ? $user_data->CanCNIC : '' ; ?> ">
                                            <sapn class="help-block" id="cnic1_error"></sapn>
                                        </div>
                                        <input type="hidden" class="form-control" name="step_1_basic_info" value="1"  />
                                        <button type="submit" class="btn btn-primary" onclick="return check_cnic()">Submit</button>
                                        <button type="reset" class="btn btn-default" onclick="location.href='<?php echo Yii::app()->createurl('admin/applications'); ?>'">Back</button>
                                        <button type="button" class="btn btn-primary" id="create_profile_btn" onclick="open_step_profile(2)" style="display:none;">Create User Profile</button>
                                        <div class="form-group" id="loader">
                                        </div>
                                    </form>
                                    <br />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default" id="user_profile_step" style="display:none;">
                        <div class="panel-heading">
                          <b> Step 1 : </b>  Basic Personal Information
                        </div>
                        
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-8">
                                    <h3></h3>   
                                    <form role="form" method="post" id="personal_info_form" onsubmit="return check_validation()" enctype="multipart/form-data">        
                                        <div class="form-group">
                                            <label>First Name</label>  
                                            <input type="text" name="first_name" required="required" id="first_name" class="form-control"  value="<?php echo isset($user_data->CanFirstName) ? $user_data->CanFirstName : '' ; ?>">
                                            <sapn class="help-block" id="title_error"></sapn>
                                        </div>
                                        <div class="form-group">
                                            <label>Last Name</label> 
                                            <input type="text" name="last_name" required  class="form-control" placeholder="" value="<?php echo isset($user_data->CanLastName) ? $user_data->CanLastName : '' ; ?>"> 
                                            <sapn class="help-block" id="subject_error"></sapn>
                                        </div>
                                        <div class="form-group">
                                            <label>CNIC</label>
                                            <input type="text" name="cnic" id="cnic" required  class="form-control " placeholder="" value="">
                                            <sapn class="help-block" id="cnic_error"></sapn>
                                        </div>
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="email" name="email" id="email" required  class="form-control" placeholder="" value="">
                                            <sapn class="help-block" id="email_error"></sapn>
                                        </div>
                                        <div class="form-group">
                                            <label>Gender</label>
                                            <select class="form-control" name="gender">
                                               <option value="1" <?php if(isset($user_data->CanGender) && $user_data->CanGender == 1) echo 'selected';?>>Male</option>
                                               <option value="2" <?php if(isset($user_data->CanGender) && $user_data->CanGender == 2) echo 'selected';?>>Female</option>
                                            </select> 
                                            <sapn class="help-block" id="body_error"></sapn>
                                        </div>
                                        <div class="form-group">
                                            <label>Date of Birth</label>
                                            <input type="date" name="date_of_birth" required id="first_name" class="form-control " placeholder="" value="<?php echo isset($user_data->CanDOB) ? $user_data->CanDOB : '' ; ?>">
                                            <sapn class="help-block" id="body_error"></sapn>
                                        </div> 
                                        <div class="form-group">
                                            <label>Postal Address</label>
                                            <textarea  name="postal_address"  id="first_name" required class="form-control " placeholder="Postal Address" ><?php echo isset($user_data->CanDOB) ? $user_data->CanDOB : '' ; ?></textarea>
                                            <sapn class="help-block" id="body_error"></sapn>
                                        </div>
                                        <div class="form-group">
                                            <label>City</label>
                                            <input type="text" name="city"  class="form-control" required placeholder="city" value="">
                                            <sapn class="help-block" id="body_error"></sapn>
                                        </div>
                                        <div class="form-group">
                                            <label>District</label>
                                            <input type="text" name="district"   class="form-control " required placeholder="District" value="">
                                            <sapn class="help-block" id="body_error"></sapn>
                                        </div>
                                        <div class="form-group">
                                            <label>Phone #</label>
                                            <input type="text" name="phone"  class="form-control " required placeholder="" value="<?php echo isset($user_data->CanPhNo) ? $user_data->CanPhNo : '' ; ?>">
                                            <sapn class="help-block" id="body_error"></sapn>
                                        </div>
                                        <div class="form-group">
                                            <label>Religion</label>
                                            <select class="form-control" name="religion">
                                               <option value="Islam" <?php if(isset($user_data->CanReligion) && $user_data->CanReligion == 'Islam') echo 'selected';?>>Islam</option>
                                               <option value="Christian" <?php if(isset($user_data->CanReligion) && $user_data->CanReligion == 'Christian') echo 'selected';?>>Christian</option>
                                               <option value="Hindu" <?php if(isset($user_data->CanReligion) && $user_data->CanReligion == 'Hindu') echo 'selected';?>>Hindu</option>
                                               <option value="Other" <?php if(isset($user_data->CanReligion) && $user_data->CanReligion == 'Other') echo 'selected';?>>Other</option>
                                            </select> 
                                            <sapn class="help-block" id="body_error"></sapn>
                                        </div>
                                       
                                        
                                        <input type="hidden" class="form-control" name="step_1_basic_info" value="1"  />
                                        <button type="submit" class="btn btn-primary" >Save & Continue</button>
                                        <button type="reset" class="btn btn-default" onclick="location.href='<?php echo Yii::app()->createurl('admin/applications'); ?>'">Back</button>
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
	// Chcek cnic registered or not
	function check_cnic()
	{ 
		var cnic = $('#cnic1').val();
		 if(cnic != '')
		 {
			 $.ajax({
				 url: '<?php echo Yii::app()->createurl('admin/applications/CheckuserProfile'); ?>',
				 data: 'cnic='+cnic,
				 type:'POST',
				 beforeSend: function()
				 {
					$('#loader').html('<span style="margin-left:30%;text-align:center;"><img src="<?php echo Yii::app()->request->baseurl;?>/images/loading.gif" /></span>');
				 },
				 success: function(result)
				 {
					 $('#loader').html('');
					 if(result == 'success')
					 {
						 is_check = 1;
						 $('#check_user_profile').submit();
						 window.location = '<?php echo Yii::app()->createurl('admin/applications/step_2');?>';
					 }
					 else
					 {
						  is_check = 0; 
						 $('#cnic1_error').html('ERROR! : CNIC is not registered.');
						 $('#create_profile_btn').show();
						 $('#cnic1').focus();
					 }
				 },
			 });
		 }
		 else
		 {
			$('#cnic_error').html('ERROR! : Please Enter CNIC.'); 
			$('#cnic').focus();
		 }
		 return false;
		 
	}
	var is_check = 0;
	function check_validation()
	 { 
		 var cnic = $.trim($('#cnic').val());
		 var email = $('#email').val();
		 var fail = 0;
		 var error = 0;
		 if( is_check == 1)
		 {
			  return true;
		 }
		 else
		 { 
			 if(cnic == '')
			 {
				 $('#cnic_error').html('ERROR! : Please Enter CNIC.'); 
				 $('#cnic').focus();
				 error = 1;
			 }
			 else
			 {
				 $('#cnic_error').html('');
			 }
			 if(email == '')
			 {
				 $('#email_error').html('ERROR! : Please Enter Email.'); 
				 $('#email').focus();
				 error = 1;
			 }
			 else
			 {
				 $('#email_error').html('');
			 }
			 if(error == 0)
			 {	 
				 $.ajax({
					 url: '<?php echo Yii::app()->createurl('admin/applications/CheckCNIC'); ?>',
					 data: 'cnic='+cnic+'&email='+email,
					 type:'POST',
					 beforeSend: function()
					 {
						$('#loader').html('<span style="margin-left:30%;text-align:center;"><img src="<?php echo Yii::app()->request->baseurl;?>/images/loading.gif" /></span>');
					 },
					 success: function(result)
					 {
						 $('#loader').html('');
						 var data = $.parseJSON(result);
						 if(data.status == 'success')
						 {
							 if(data.cnic == 1)
							 {
								  $('#cnic_error').html('ERROR! : CNIC Already Registered.');
							 	  $('#cnic').focus();
								  fail = 1;
							 }
							 if(data.email == 1)
							 {
								  $('#email_error').html('ERROR! : Email Already Registered.');
							 	  $('#email').focus();
								  fail = 1;
							 }
							 if(fail == 0)
							 { 
							 	is_check = 1;
							 	$('#personal_info_form').submit();
							 }
						 }
						 else
						 {
							  is_check = 0; 
							 $('#cnic_error').html('ERROR! : CNIC Already Registered.');
							 $('#cnic').focus();
						 }
					 },
				 });
			 }
			 else
			 {
				$('#cnic_error').html('ERROR! : Please Enter CNIC.'); 
				$('#cnic').focus();
			 }
			 return false;
		 }
	 }
    </script>
         
    