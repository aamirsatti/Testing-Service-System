    <style>
    .help-block{color:red;}
    .form-group img { width: 150px; height: 100px;}
 
    </style> 
   
            <div class="col-md-12 well" id="rightPanel" >
                <div class="row">
                    <div class="col-md-12">
                  <!--  <img src="<?php echo Yii::app()->request->baseurl;?>/resources/images/logo.png"  alt="WeReviews" > -->
                     <h2><center>User Registration</center></h2>   
                       
                       
                    </div>
                </div>
                 <!-- /. ROW  -->
                
               <div class="row "  >
                <div class="col-md-12">
                    <!-- Form Elements -->
                    <?php if(Yii::app()->session['success'] != ''){ ?>
                    <div style="background-color:#B0F3B0;padding:6px;" id="p_sucess"><?php echo Yii::app()->session['success']; ?></div>
                    <?php Yii::app()->session['success'] = ''; } ?>
                    
                    <div class="panel panel-default col-md-6" style="margin-left:25%;" id="login_area">
                        <div class="panel-heading">
                           Login / Signin
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-8">
                                    <h3></h3>   
                                    <form role="form" method="post" enctype="multipart/form-data">
                                        <div class="form-group ">
                                            <label>CNIC :</label> 
                                            <input class="form-control" name="cnic" id="username" required value="<?php echo isset($prev_values['cnic']) ? $prev_values['cnic'] : ''; ?>"/>
                                            <span class="help-block" id="username_error"><?php if(isset($login_error['cnic'][0])) echo $login_error['cnic'][0]; ?></span>
                                        </div>
                                        <div class="form-group " >
                                            <label>Password</label> 
                                            <input class="form-control" type="password" name="password" id="password" required value=""/>
                                            <span class="help-block" id="username_error"><?php if(isset($login_error['password'][0])) echo $login_error['password'][0]; ?></span>
                                        </div>
										<div class="form-group">    
										  <?php $this->widget('MyCaptcha' );  ?>
											<img src="<?php echo Yii::app()->request->baseurl;?>/uploads/captcha/captcha.jpg" style="width:80px;height:50px;"/><br/>
											<br/>
											<input class="form-control" type="text" name="captcha" id="password" required value="<?php echo isset($prev_values['captcha']) ? $prev_values['captcha'] : ''; ?>"/>
											<span class="help-block" id="username_error"><?php if(isset($login_error['captcha'][0])) echo $login_error['captcha'][0]; ?></span>					
										</div>
										<span class="help-block" id="username_error"><?php if(Yii::app()->session['error']) echo Yii::app()->session['error']; Yii::app()->session['error'] = '';?></span>
                                           
                                        <input type="hidden" class="form-control" name="login" value="1"  />
                                        <button type="submit" class="btn btn-primary" style="width:40%;">Login</button>
										&nbsp;&nbsp;<button type="submit" class="btn btn-default" style="width:40%;">Back</button>
										<br/><a href="javascript:void(0);" onclick="login_signup(3);" title="forgot" style="font-size:12px;">Forgot Password? </a> 
										<p >Not registered yet? <a href="javascript:void(0);" onclick="login_signup(2);" title="login" >Signup </a> </p>	
                                       <!-- <button type="reset" class="btn btn-primary" onclick="location.href='<?php //echo Yii::app()->createurl('admin/site/index'); ?>'">Back</button> -->

                                    </form>
                                    <br />
                                </div>
                            </div>
                        </div>
                    </div>
					<div class="panel panel-default col-md-6 " style="margin-left:25%; display:none;"  id="reg_area">
                        <div class="panel-heading">
                           Register / Signup
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-10">
                                    <h3></h3>   
                                    <form role="form" method="post" enctype="multipart/form-data">
                                        <div class="col-md-6">
											<div class="form-group ">
												<label>First Name :</label> 
												<input class="form-control" name="first_name" id="username" required  value="<?php echo isset($prev_values['first_name']) ? $prev_values['first_name'] : ''; ?>"/>
												<span class="help-block" id="username_error"><?php if(isset($signup_error['first_name'][0])) echo $signup_error['first_name'][0]; ?></span>
											</div>
											<div class="form-group ">
												<label>Last Name :</label> 
												<input class="form-control" name="last_name" id="username" required value="<?php echo isset($prev_values['last_name']) ? $prev_values['last_name'] : ''; ?>"/>
												<span class="help-block" id="username_error"><?php if(isset($signup_error['last_name'][0])) echo $signup_error['last_name'][0]; ?></span>
											</div>
											<div class="form-group ">
												<label>Email :</label> 
												<input type="email" class="form-control" name="email" id="username" required value="<?php echo isset($prev_values['email']) ? $prev_values['email'] : ''; ?>"/>
												<span class="help-block" id="username_error"><?php if(isset($signup_error['email'][0])) echo $signup_error['email'][0]; ?></span>
											</div>
										</div>
										<div class="col-md-6">	
											<div class="form-group " >
												<label>CNIC :</label> 
												<input class="form-control" type="text" name="cnic" id="password" required value="<?php echo isset($prev_values['cnic']) ? $prev_values['cnic'] : ''; ?>"/>
												<span class="help-block" id="password_error"><?php if(isset($signup_error['cnic'][0])) echo $signup_error['cnic'][0]; ?></span>
											</div>
											<div class="form-group " >
												<label>Password :</label> 
												<input class="form-control" type="password" name="password" id="password" required value="<?php echo isset($prev_values['password']) ? $prev_values['password'] : ''; ?>"/>
												<span class="help-block" id="password_error"><?php if(isset($signup_error['password'][0])) echo $signup_error['password'][0]; ?></span>
											</div>  
											<div class="form-group " >
												<label>Confirm Password :</label> 
												<input class="form-control" type="password" name="con_pass" id="password" required value="<?php echo isset($prev_values['con_pass']) ? $prev_values['con_pass'] : ''; ?>"/>
												<span class="help-block" id="password_error"><?php if(isset($signup_error['con_pass'][0])) echo $signup_error['con_pass'][0]; ?></span>
											</div> 
										</div>	
										<div class="col-md-6">	
											<div class="form-group">    
											  <?php $this->widget('MyCaptcha' );  ?>
												<img src="<?php echo Yii::app()->request->baseurl;?>/uploads/captcha/captcha.jpg" style="width:80px;height:50px;"/><br/>
												<br/>
												<input class="form-control" type="text" name="captcha" id="password" required value="<?php echo isset($prev_values['captcha']) ? $prev_values['captcha'] : ''; ?>"/>
												<span class="help-block" id="password_error"><?php if(isset($signup_error['captcha'][0])) echo $signup_error['captcha'][0]; ?></span>	
											</div>
										</div>	
                                           	
										</div>	
										<div class="col-md-12">
										<p > <input type="hidden" class="form-control" name="signup" value="1"  />
                                        <button type="submit" class="btn btn-primary" style="width:40%;">Signup</button>&nbsp;&nbsp;<button type="button" class="btn btn-default" style="width:40%;">Back</button> </p>
										<p >Already registered ? <a href="javascript:void(0);" onclick="login_signup(1);" title="login" >Login </a> </p>	
										</div>
                                       <!-- <button type="reset" class="btn btn-primary" onclick="location.href='<?php //echo Yii::app()->createurl('admin/site/index'); ?>'">Back</button> -->

                                    </form>
                                    <br />
                                </div>
                            </div>
                        </div>
                    </div>
					<!-- Forgot password -->
					<div class="panel panel-default col-md-6" style="margin-left:25%;display:none;" id="forgot_area">
                        <div class="panel-heading">
                           Forgot Password
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-8">
                                    <h3></h3>   
                                    <form role="form" method="post" enctype="multipart/form-data">
                                        <div class="form-group ">
                                            <label>Email :</label> 
                                            <input class="form-control" name="username" id="username" required value=""/>
                                            <sapn class="help-block" id="username_error"></sapn>
                                        </div>
                                        
                                           
                                        <input type="hidden" class="form-control" name="setting" value="1"  />
                                        <button type="submit" class="btn btn-primary" style="width:40%;">Send</button>
										&nbsp;&nbsp;<button type="submit" class="btn btn-default" style="width:40%;">Back</button>
										<p>Not registered yet? <a href="javascript:void(0);" onclick="login_signup(2);" title="login" >Signup </a> | or <a href="javascript:void(0);" onclick="login_signup(1);" title="login" >Login </a> </p>	
                                       <!-- <button type="reset" class="btn btn-primary" onclick="location.href='<?php //echo Yii::app()->createurl('admin/site/index'); ?>'">Back</button> -->

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
            </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
    <script>
    $('#p_sucess').fadeOut(12000);
	function login_signup(state)
	{
		if(state == 1)
		{
			$('#login_area').show();
			$('#reg_area').hide();
			$('#forgot_area').hide();
		}
		else if(state == 2)
		{
			$('#login_area').hide();
			$('#reg_area').show();
			$('#forgot_area').hide();
		}
		else if(state == 3)
		{
			$('#login_area').hide();
			$('#reg_area').hide();
			$('#forgot_area').show();
		}
	}
	<?php if(!empty($signup_error)){ ?>
	   login_signup(2);
	<?php } ?>   
    </script>
         
    