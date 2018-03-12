    <style>
    .help-block{color:red;}
    .form-group img { width: 150px; height: 100px;}

    </style> 
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Google Adsense</h2>   
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
                           
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-8">
                                    <h3></h3>   
                                    <form role="form" method="post" enctype="multipart/form-data">
                                        
                                        <div class="form-group">
                                            <label>Google Adsense</label>
                                            <textarea class="form-control" id="body" rows="8" cols="10" name="body"><?php echo isset($adsense->adsense_code) ? $adsense->adsense_code : ''; ?></textarea>   
                                            
                                            <sapn class="help-block" id="body_error"></sapn>
                                        </div>
                                        <div class="form-group">
                                            
                                        </div>
                                        <input type="hidden" class="form-control" name="template" value="1"  />
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
         
    