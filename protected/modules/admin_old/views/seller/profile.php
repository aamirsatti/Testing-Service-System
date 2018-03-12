    <style>
    .help-block{color:red;}
    .form-group img { width: 150px; height: 100px;}

    </style> 
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Seller Profile</h2>   
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
                            Update Profile
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <h3></h3>
                                    <form role="form" method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label>Name</label> 
                                            <input class="form-control" name="first_name" id="first_name" value="<?php echo isset($user->first_name) ? $user->first_name : ''; ?>"/>
                                            <sapn class="help-block" id="first_name_error"></sapn>
                                        </div>
                                        <?php /*?><div class="form-group">
                                            <label>Last Name</label>
                                            <input class="form-control" name="last_name" id="last_name" value="<?php echo isset($user->last_name) ? $user->last_name : ''; ?>"/>
                                            <sapn class="help-block" id="last_name_error"></sapn>
                                        </div><?php */?>
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input class="form-control" name="email" id="email" value="<?php echo isset($user->email) ? $user->email : ''; ?>" readonly/>
                                           
                                        </div>
                                       <?php /*?> <div class="form-group">
                                            <label>Phone</label>
                                            <input class="form-control" name="phone_no" id="phone_no" value="<?php echo isset($user->phone_no) ? $user->phone_no : ''; ?>"/>
                                            <sapn class="help-block" id="phone_no_error"></sapn>
                                        </div>
                                        <div class="form-group">
                                            <label>Address</label>
                                            <textarea class="form-control" name="address" id="address"  placeholder="Address" ><?php echo isset($user->address) ? $user->address : ''; ?></textarea>
                                            <sapn class="help-block" id="address_error">
                                        </div><?php */?>
                                        <div class="form-group"> 
                                            <label>How did you find about us?</label> 
                                            <select name="how_you_find_us" id="how_you_find_us"  class="form-control" >
                                                <option value="Google" <?php if(isset($user->how_you_find_us) && $user->how_you_find_us == 'Google') echo 'selected'; ?>>Google</option>
                                                <option value="Facebook" <?php if(isset($user->how_you_find_us) && $user->how_you_find_us == 'Facebook') echo 'selected'; ?>>Facebook</option>
                                                <option value="Linkdin" <?php if(isset($user->how_you_find_us) && $user->how_you_find_us == 'Linkdin') echo 'selected'; ?>>Linkdin</option>
                                                <option value="Twitter" <?php if(isset($user->how_you_find_us) && $user->how_you_find_us == 'Twitter') echo 'selected'; ?>>Twitter</option>
                                                <option value="Advertisement" <?php if(isset($user->how_you_find_us) && $user->how_you_find_us == 'Advertisement') echo 'selected'; ?>>Advertisement</option>
                                                <option value="Other" <?php if(isset($user->how_you_find_us) && $user->how_you_find_us == 'Other') echo 'selected'; ?>>Other</option>
                                            </select>
                                            <sapn class="help-block" id="how_you_find_us_error">
                                        </div>
                                        
                                     <?php /*?>   <div class="form-group">
                                            <label>Where do you sell ?</label>
                                            <input class="form-control" name="where_do_you_sell" id="where_do_you_sell" value="<?php echo isset($user->where_do_you_sell) ? $user->where_do_you_sell : ''; ?>"/>
                                            <sapn class="help-block" id="where_do_you_sell_error">
                                        </div><?php */?>
                                        <div class="form-group">
                                            <label>What do you sell?</label>
                                            <input class="form-control" name="What_do_you_sell" id="What_do_you_sell" value="<?php echo isset($user->What_do_you_sell) ? $user->What_do_you_sell : ''; ?>"/>
                                            <sapn class="help-block" id="What_do_you_sell_error">
                                        </div>
                                        <div class="form-group">
                                            <label>Seller Status</label><br/>
                                            <label class="checkbox-inline">
                                                <input type="radio" name="status" checked <?php if(isset($user->status) && $user->status == 1) echo 'checked';?> value="1" /> Active
                                            </label>
                                            <label class="checkbox-inline">
                                                <input type="radio" <?php if(isset($user->status) && $user->status == 0) echo 'checked';?> name="status" value="0"/> Inactive
                                            </label>
                                            
                                        </div>
                                        <div class="form-group">
                                            <label>Auto Approve Products</label><br/>
                                            <label class="checkbox-inline">
                                                <input type="radio" name="auto_approved"  <?php if(isset($user->auto_approved) && $user->auto_approved == 1) echo 'checked';?> value="1" /> Yes
                                            </label>
                                            <label class="checkbox-inline">
                                                <input type="radio"  <?php if(isset($user->auto_approved) && $user->auto_approved == 0) echo 'checked';?> name="auto_approved" value="0"/> No
                                            </label>
                                            
                                        </div>
                                        <input type="hidden" class="form-control" name="product" value="1"  />
                                        <button type="submit" class="btn btn-default" onclick="return update_profile()">Update</button>
                                        <button type="reset" class="btn btn-primary" onclick="location.href='<?php echo Yii::app()->createurl('admin/seller/list'); ?>'">Back</button>

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
         
    