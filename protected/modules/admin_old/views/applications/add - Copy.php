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
                                        <p class="list-group-item-text" style="padding-top: 0px; ">Basic Personal Information</p>
                                    </a></li>
                                    <li class="disabled"><a href="#step-2">
                                        <h4 class="list-group-item-heading" style="padding-top: 0px; ">Step 2</h4>
                                        <p class="list-group-item-text" style="padding-top: 0px; ">Academic Record</p>
                                    </a></li>
                                    <li class="disabled"><a href="#step-3">
                                        <h4 class="list-group-item-heading" style="padding-top: 0px; ">Step 3</h4>
                                        <p class="list-group-item-text" style="padding-top: 0px; ">Experience & Certifications</p>
                                    </a></li>
                                    <li class="disabled"><a href="#step-4">
                                        <h4 class="list-group-item-heading" style="padding-top: 0px; ">Step 4</h4>
                                        <p class="list-group-item-text" style="padding-top: 0px; ">Post Applied For</p>
                                    </a></li>
                                </ul>
                            </div>
                     </div>
                    <!-- Form Elements -->
                    <?php if(Yii::app()->session['success'] != ''){ ?>
                    <div style="background-color:#B0F3B0;padding:6px;" id="p_sucess"><?php echo Yii::app()->session['success']; ?></div>
                    <?php Yii::app()->session['success'] = ''; } ?>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                          <b> Step 1 : </b>  Basic Personal Information
                        </div>
                        
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-8">
                                    <h3></h3>   
                                    <form role="form" method="post" enctype="multipart/form-data">        
                                        <div class="form-group">
                                            <label>First Name</label>  
                                            <input type="text" name="first_name" required="required" id="first_name" class="form-control" placeholder="" tabindex="1" value="<?php echo isset($user_data->CanFirstName) ? $user_data->CanFirstName : '' ; ?>">
                                            <sapn class="help-block" id="title_error"></sapn>
                                        </div>
                                        <div class="form-group">
                                            <label>Last Name</label> 
                                            <input type="text" name="last_name" required  class="form-control" placeholder="" value="<?php echo isset($user_data->CanLastName) ? $user_data->CanLastName : '' ; ?>"> 
                                            <sapn class="help-block" id="subject_error"></sapn>
                                        </div>
                                        <div class="form-group">
                                            <label>CNIC</label>
                                            <input type="text" name="cnic"   class="form-control " placeholder="" value="<?php echo isset($user_data->CanCNIC) ? $user_data->CanCNIC : '' ; ?> ">
                                            <sapn class="help-block" id="body_error"></sapn>
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
                                            <textarea  name="postal_address" required id="first_name" class="form-control " placeholder="Postal Address" ><?php echo isset($user_data->CanDOB) ? $user_data->CanDOB : '' ; ?></textarea>
                                            <sapn class="help-block" id="body_error"></sapn>
                                        </div>
                                        <div class="form-group">
                                            <label>City</label>
                                            <input type="text" name="city"  class="form-control " placeholder="city" value="<?php echo isset($user_data->CanCNIC) ? $user_data->CanCNIC : '' ; ?> ">
                                            <sapn class="help-block" id="body_error"></sapn>
                                        </div>
                                        <div class="form-group">
                                            <label>District</label>
                                            <input type="text" name="district"   class="form-control " placeholder="District" value="<?php echo isset($user_data->CanCNIC) ? $user_data->CanCNIC : '' ; ?> ">
                                            <sapn class="help-block" id="body_error"></sapn>
                                        </div>
                                        <div class="form-group">
                                            <label>Phone #</label>
                                            <input type="text" name="phone" required class="form-control " placeholder="" value="<?php echo isset($user_data->CanPhNo) ? $user_data->CanPhNo : '' ; ?>">
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
                                        <button type="submit" class="btn btn-primary" onclick="return email_templates()">Save & Continue</button>
                                        <button type="reset" class="btn btn-default" onclick="location.href='<?php echo Yii::app()->createurl('admin/applications'); ?>'">Back</button>

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
         
    