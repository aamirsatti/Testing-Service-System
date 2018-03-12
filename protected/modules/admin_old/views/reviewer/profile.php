    <style>
    .help-block{color:red;}
    .form-group img { width: 150px; height: 100px;}

    </style> 
            
            <div id="page-inner">
                
                <div class="row">
                    <div class="col-md-12">
                     <h2><?php echo isset($user->first_name) ? $user->first_name.' '.$user->last_name : ''; ?> Account</h2>   
                        <h5></h5>
                    </div>
                </div>   
               
                   <div id="page-inner">
                       <div class="row">
                    <div class="col-md-4 col-sm-6 col-xs-6">           
                        <div class="panel panel-back noti-box">
                            <span class="icon-box bg-color-red set-icon">
                                <i class="fa fa-shopping-cart"></i>
                            </span>
                            <div class="text-box" >
                                <p class="main-text"> <?php echo isset($active_rpoducts) ? $active_rpoducts : 0; ?> Products </p>
                                <p class="text-muted">Active Products  </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-6">           
                        <div class="panel panel-back noti-box">
                            <span class="icon-box bg-color-green set-icon">
                                <i class="fa fa-bars"></i>
                            </span>
                            <div class="text-box" >
                                <p class="main-text"><?php echo isset($rank) ? $rank : 0;?></p>
                                <p class="text-muted">RANK #</p>
                            </div>
                         </div>
                     </div>
                    
                    <div class="col-md-4 col-sm-6 col-xs-6">           
                        <div class="panel panel-back noti-box">
                            <span class="icon-box bg-color-brown set-icon">
                                <i class="fa fa-star"></i>
                            </span>
                            <div class="text-box" >
                                <p class="main-text"><?php echo isset($helpful) ? $helpful : 0;?>%</p>
                                <p class="text-muted"> HelpFull</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                <div class="col-md-12">
                    <!-- Form Elements -->
                    <?php if(Yii::app()->session['success'] != ''){ ?>
                    <div style="background-color:#B0F3B0;padding:6px;" id="p_sucess"><?php echo Yii::app()->session['success']; ?></div>
                    <?php Yii::app()->session['success'] = ''; } ?>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            View and Update Personal Info
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <h3></h3>
                                    <form role="form" method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label>Full Name</label> 
                                            <input class="form-control" name="first_name" id="first_name" value="<?php echo isset($user->first_name) ? $user->first_name : ''; ?>"/>
                                            <sapn class="help-block" id="first_name_error"></sapn>
                                        </div>
                                        <!--<div class="form-group">
                                            <label>Full Name</label>
                                            <input class="form-control" name="last_name" id="last_name" value="<?php echo isset($user->last_name) ? $user->last_name : ''; ?>"/>
                                            <sapn class="help-block" id="last_name_error"></sapn>
                                        </div>-->
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input class="form-control" name="email" id="email" value="<?php echo isset($user->email) ? $user->email : ''; ?>" readonly/>
                                           
                                        </div>
                                                                                
                                        <div class="form-group"> 
                                            <label>Amazon/ Ebay Profile Url</label>
                                            <input class="form-control" name="amazon_profile"  value="<?php echo isset($user->amazon_profile_url) ? $user->amazon_profile_url : ''; ?>"/>
                                            
                                        </div>
                                        <div class="form-group">
                                            <label>Phone number</label>
                                            <input class="form-control" name="phone"  value="<?php echo isset($user->phone_no) ? $user->phone_no : ''; ?>"/>
                                           
                                        </div>
                                        <div class="form-group">
                                            <label>Address</label>
                                            <input class="form-control" name="address"  value="<?php echo isset($user->address) ? $user->address : ''; ?>"/>
                                           
                                        </div>
                                        <div class="form-group">
                                            <label>City</label>
                                            <input class="form-control" name="city"  value="<?php echo isset($user->city) ? $user->city : ''; ?>"/>
                                            
                                        </div>
                                        <div class="form-group"> 
                                            <label>State</label>
                                            <input class="form-control" name="state"  value="<?php echo isset($user->state) ? $user->state : ''; ?>"/>
                                            
                                        </div>
                                        <div class="form-group">
                                            <label>Country</label>
                                            <input class="form-control" name="country"  value="<?php echo isset($user->country) ? $user->country : ''; ?>"/>
                                            
                                        </div>
                                        <div class="form-group">
                                            <label>Zipcode</label>
                                            <input class="form-control" name="zipcode"  value="<?php echo isset($user->zipcode) ? $user->zipcode : ''; ?>"/>
                                            
                                        </div>
                                        <div class="form-group">
                                            <label>Reviewer Status</label><br/>
                                            <label class="checkbox-inline">
                                                <input type="radio" name="status" checked <?php if(isset($user->status) && $user->status == 1) echo 'checked';?> value="1" /> Active
                                            </label>
                                            <label class="checkbox-inline">
                                                <input type="radio" <?php if(isset($user->status) && $user->status == 0) echo 'checked';?> name="status" value="0"/> Inactive
                                            </label>
                                         </div>
                                        <input type="hidden" class="form-control" name="product" value="1"  />
                                        <button type="submit" class="btn btn-default" onclick="return update_profile_r()">Update</button>
                                        <button type="reset" class="btn btn-primary" onclick="location.href='<?php echo Yii::app()->createurl('admin/reviewer'); ?>'">Back</button>
                              </form>
                                    <br />
                                </div>
                            </div>
                        </div>
                    </div>
                     <!-- End Form Elements -->
                </div>
            </div>
                        <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="chat-panel panel panel-default chat-boder chat-panel-head" >
                            <div class="panel-heading">
                                
                                <h4> Your List of Successful Reviewed URLS!</h4>
                            </div>

                            <div class="panel-body">
                            <?php 
                                
                                if(!empty($user->productReviewers)){ ?>
                                <ul class="chat-box">
                                   <?php foreach($user->productReviewers as $p_rev){ 
                                         if($p_rev->status == 2 && $p_rev->reviewed_url != ''){
                                           
                                    ?>
                                        <li class="left clearfix">
                                            <span class="chat-img pull-left">
                                               <?php if(isset($p_rev->product->image) && $p_rev->product->image != '' && is_file(Yii::getPathOfAlias('webroot') ."/uploads/products/thumb/".$p_rev->product->image)){ ?>
                                                   <img src="<?php echo Yii::app()->request->baseurl.'/uploads/products/thumb/'.$p_rev->product->image ; ?>" class="img-circle" style="width:60px;height:60px;">
                                                <?php }else{ ?>
                                                   <img src="<?php echo Yii::app()->request->baseurl.'/images/img_not_found.gif' ; ?>" class="img-circle"  style="width:60px;height:60px;">
                                                <?php } ?>
                                               <!--<img src="<?php //echo Yii::app()->request->baseurl;?>/resources/admin/img/111.jpg" alt="User" class="img-circle" />-->
                                            </span>
                                            <div class="chat-body">                                        
                                                <strong ><a href="<?php echo $p_rev->reviewed_url; ?>" target="_blank"><?php echo $p_rev->reviewed_url; ?></a></strong>
                                                <small class="pull-right text-muted">
                                                    <i class="fa fa-clock-o fa-fw"></i><?php echo date('M d, Y', strtotime($p_rev->reviewed_date)); ?>
                                                </small>                                      
                                            </div> 
                                        </li>       
                                        
                                    <?php }
                                    } ?> 
                                  
                                </ul>
                                <?php }else{ ?>
                                <p style="color:red;">No reviewed url available</p>
                                <?php } ?>
                             
                                
                            </div>
                        </div>
                    </div>
                </div>   
                 <!-- /. ROW  -->       
                       
                       
     <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="chat-panel panel panel-default chat-boder chat-panel-head" >
                            <div class="panel-heading">
                                
                                <h4> List Of Active Products!</h4>
                            </div>

                            <div class="panel-body">
                                
                                <?php if(!empty($user->productReviewers)){ ?>
                                <ul class="chat-box">
                                    <?php foreach($user->productReviewers as $p_rev){ 
                                         if($p_rev->status == 1){
                                    ?>
                                        <li>
                                            <span class="chat-img pull-left">
                                                <?php if(isset($p_rev->product->image) && $p_rev->product->image != '' && is_file(Yii::getPathOfAlias('webroot') ."/uploads/products/thumb/".$p_rev->product->image)){ ?>
                                                   <img src="<?php echo Yii::app()->request->baseurl.'/uploads/products/thumb/'.$p_rev->product->image ; ?>" class="img-circle" style="width:60px;height:60px;">
                                                <?php }else{ ?>
                                                   <img src="<?php echo Yii::app()->request->baseurl.'/images/img_not_found.gif' ; ?>" class="img-circle"  style="width:60px;height:60px;">
                                                <?php } ?>
                                                <!--<img src="<?php echo Yii::app()->request->baseurl;?>/resources/admin/img/111.jpg" alt="User" class="img-circle" />-->
                                            </span>
                                            <div class="chat-body">                                        
                                                <strong >
                                                   <a href="<?php echo Yii::app()->createurl('products/detail/'.str_replace(array(" ", "/" , "\\", "#", "$", "@", "%"),"-",substr($p_rev->product->product_title,0,60)).'/p/id/'.base64_encode($p_rev->product->id));?>" target="_blank">
                                                       <?php echo substr($p_rev->product->product_title, 0, 150); if(strlen($p_rev->product->product_title) > 150) echo '...';?>
                                                   </a>
                                                </strong>
                                                <small class="pull-right text-muted">
                                                    <i class="fa fa-clock-o fa-fw"></i><?php echo date('M d, Y', strtotime($p_rev->date)); ?>
                                                </small>                                      
                                                <p><?php echo substr($p_rev->product->description,0,200); if(strlen($p_rev->product->description) > 200) echo '...';?>
                                                  <br/><br/>
                                                </p>
                                            </div>
                                        </li>
                                    <?php }
                                    }  ?>    
                                </ul>
                                <?php }else{ ?>
                                <p style="color:red;">No active Product available</p>
                                <?php } ?>
                                 
                            </div>
                        </div>
                    </div>
                </div>     
                       
                       
          
                       
                       
    </div>           
                                 
           
                        
                              

 
         
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
    <script>
    $('#p_sucess').fadeOut(12000);
    </script>
         
    