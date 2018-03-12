    <style>
    .help-block{color:red;}
    .form-group img { width: 150px; height: 100px;}

    </style> 
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Newsletter</h2>   
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
                           Send Newsletter
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-8">
                                    <h3></h3>   
                                    <form role="form" method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label>Send To:</label> 
                                            <select class="form-control" name="send_to">
                                              <option value="3" selected="selected">All Users</option>
                                            </select>   
                                        </div>
                                        <div class="form-group">
                                            <label>Email Template</label> 
                                            <input class="form-control" name="subject" id="subject" readonly="readonly" value="<?php echo $email->title;?>"/>
                                            <sapn class="help-block" id="subject_error"></sapn>
                                        </div>
                                        <div class="form-group">
                                            <label>Email Subject</label> 
                                            <input class="form-control" name="subject" id="subject" readonly="readonly" value="<?php echo $email->subject;?>"/>
                                            <sapn class="help-block" id="subject_error"></sapn>
                                        </div>
                                        <div class="form-group">
                                            <span style="color:red;">Note:</span><br/>
                                            <span>Select User to whom you want to send newsletter. </span><br/>
                                            
                                        </div>
                                        <input type="hidden" class="form-control" name="newsletter" value="1"  />
                                        <button type="submit" class="btn btn-default" >Send Newsletter</button>
                                        <button type="reset" class="btn btn-primary" onclick="location.href='<?php echo Yii::app()->createurl('admin/site/EmailTemplates'); ?>'">Back</button>

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
         
    