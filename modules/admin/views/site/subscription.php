    <style>
    .help-block{color:red;}
    .form-group img { width: 150px; height: 100px;}

    </style> 
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Subscription</h2>   
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
                           Update Subscription Fee
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
         
    