    <style>
    .help-block{color:red;}
    .form-group img { width: 150px; height: 100px;}
 
    </style> 
   
            
                <div class="row">
                    <div class="col-md-12">
                  <!--  <img src="<?php echo Yii::app()->request->baseurl;?>/resources/images/logo.png"  alt="WeReviews" > -->
                     <h2>Admin</h2>   
                       
                       
                    </div>
                </div>
                 <!-- /. ROW  -->
                
               <div class="row">
                <div class="col-md-6">
                    <!-- Form Elements -->
                    <?php if(Yii::app()->session['success'] != ''){ ?>
                    <div style="background-color:#B0F3B0;padding:6px;" id="p_sucess"><?php echo Yii::app()->session['success']; ?></div>
                    <?php Yii::app()->session['success'] = ''; } ?>
                    
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           Admin Login
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-8">
                                    <h3></h3>   
                                    <form role="form" method="post" enctype="multipart/form-data">
                                        <div class="form-group ">
                                            <label>Username</label> 
                                            <input class="form-control" name="username" id="username" required value=""/>
                                            <sapn class="help-block" id="username_error"></sapn>
                                        </div>
                                        <div class="form-group ">
                                            <label>Password</label> 
                                            <input class="form-control" type="password" name="password" id="password" required value=""/>
                                            <sapn class="help-block" id="password_error"><?php echo isset($login_error) ? $login_error : '' ; ?></sapn>
                                        </div>
                                           
                                        <input type="hidden" class="form-control" name="setting" value="1"  />
                                        <button type="submit" class="btn btn-primary" >Login</button>
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
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
    <script>
    $('#p_sucess').fadeOut(12000);
    </script>
         
    