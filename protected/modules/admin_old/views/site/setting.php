    <style>
    .help-block{color:red;}
    .form-group img { width: 150px; height: 100px;}

    </style> 
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Setting</h2>   
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
                           Change Password
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-8">
                                    <h3></h3>   
                                    <form role="form" method="post" enctype="multipart/form-data">
                                        <div class="form-group ">
                                            <label>Old Password</label> 
                                            <input class="form-control" type="password" name="old_pass" id="old_pass" required value=""/>
                                            <sapn class="help-block" id="old_pass_error"></sapn>
                                        </div>
                                        <div class="form-group ">
                                            <label>New Password</label> 
                                            <input class="form-control" type="password" name="new_pass" id="new_pass" required value=""/>
                                            <sapn class="help-block" id="new_pass_error"></sapn>
                                        </div>
                                        <div class="form-group ">
                                            <label>Confirm Password</label> 
                                            <input class="form-control" type="password" name="con_pass" id="con_pass" required value=""/>
                                            <sapn class="help-block" id="con_pass_error"><?php echo isset($change_pass_error) ? $change_pass_error : ''; ?></sapn>
                                        </div>
                                           
                                        <button type="submit" class="btn btn-default" onclick="return change_pass()">Update</button>
                                        <button type="reset" class="btn btn-primary" onclick="location.href='<?php echo Yii::app()->createurl('admin/site/index'); ?>'">Back</button>

                                    </form>
                                    <br />
                                </div>
                                

                                <script>
                                function change_pass()
                                {
                                    var new_pass = $('#new_pass').val();
                                    var con_pass = $('#con_pass').val();
                                    if(new_pass != con_pass)
                                    {
                                        $('#con_pass_error').html('New password and confirm password are not matched.');
                                        return false;
                                    }
                                    else
                                        return true;
                                }        

                                </script>
                            </div>
                        </div>
                    </div>
                     <!-- End Form Elements -->
                     <?php if(Yii::app()->session['s_success'] != ''){ ?>
                    		<div style="background-color:#B0F3B0;padding:6px;" id="p_sucess"><?php echo Yii::app()->session['s_success']; ?></div>
                    <?php Yii::app()->session['s_success'] = ''; } ?>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           Update Settings
                        </div>
                        
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-8">
                                    <h3></h3>   
                                    <form role="form" method="post" enctype="multipart/form-data">
                                        <?php 
                                        foreach($setting as $rec)
                                        {
                                           if(isset($rec->field_type) && $rec->field_type != ''){  
                                        ?>
                                           
                                                <?php if($rec->field_type == 'seller_fee' || $rec->field_type == 'reviewer_fee'){ ?>
                                                    <label><?php echo $rec->field_label; ?></label>
                                                    <div class="form-group input-group">
                                                        <span class="input-group-addon">$</span>
                                                        <input type="text" class="form-control" name="<?php echo $rec->field_type; ?>" id="title" value="<?php echo isset($rec->field_value) ? $rec->field_value : ''; ?>">
                                                    </div>
                                                <?php }else{ ?>
                                                    <div class="form-group ">
                                                        <label><?php echo $rec->field_label; ?></label> 
                                                        <input class="form-control" name="<?php echo $rec->field_type; ?>" id="title" value="<?php echo isset($rec->field_value) ? $rec->field_value : ''; ?>"/>
                                                        <sapn class="help-block" id="title_error"></sapn>
                                                    </div>
                                        <?php       } 
                                        } }?>    
                                        <input type="hidden" class="form-control" name="setting" value="1"  />
                                        <button type="submit" class="btn btn-default" >Update</button>
                                        <button type="reset" class="btn btn-primary" onclick="location.href='<?php echo Yii::app()->createurl('admin/site/index'); ?>'">Back</button>

                                    </form>
                                    <br />
                                </div>
                            </div>
                        </div>
                    </div> 
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
         
    