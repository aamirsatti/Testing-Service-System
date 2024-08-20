    <style>
    .help-block{color:red;}
    .form-group img { width: 150px; height: 100px;}

    </style> 
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Reminder Email</h2>   
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
                           Reminder Email
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-8">
                                    <h3></h3>   
                                    <form role="form" method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label>Email To</label> 
                                            <input class="form-control" type="email" name="email_to" id="email_to" required="required" value="<?php //echo isset($template->title) ? $template->title : ''; ?>"/>
                                            <sapn class="help-block" id="title_error"></sapn>
                                        </div>
                                        <div class="form-group">
                                            <label>Email Subject</label> 
                                            <input class="form-control" name="subject" id="subject" required="required" value="<?php //echo isset($template->subject) ? $template->subject : ''; ?>"/>
                                            <sapn class="help-block" id="subject_error"></sapn>
                                        </div>
                                        <div class="form-group">
                                            <label>Email Body</label>
                                            <textarea class="form-control" id="body" rows="8" cols="10"  name="body"><?php //echo isset($template->body) ? $template->body : ''; ?></textarea>   
                                            <?php
                                                // Make sure you are using correct paths here.
                                                $ckeditor = new CKEditor();
                                                $ckeditor->basePath = Yii::app()->request->baseurl.'/resources/Ckeditor/ckeditor/';
                                                $ckfinder = new CKFinder();
                                                $ckfinder->BasePath = Yii::app()->request->baseurl.'/resources/Ckeditor/ckfinder/'; // Note: the BasePath property in the CKFinder class starts with a capital letter.
                                                $ckeditor->config['height'] = 500;
                                                //$ckeditor->config['width'] = 650;
                                                $ckfinder->SetupCKEditorObject($ckeditor);
                                                
                                                $ckeditor->replace("body");
                                            ?>
                                            <sapn class="help-block" id="body_error"></sapn>
                                        </div>
                                        <?php /*?><div class="form-group">
                                            <span style="color:red;">Note:</span><br/>
                                            <span>Use these variables in email body for dynamic content (system will get related values while sending emails).</span><br/>
                                            <span> <b>%user_name% :</b> First name and last name of user <br/>
                                                <b>%email% :</b> Email of User<br/>
                                                <b>%phone_no% :</b> Phone number of user<br/>
                                             <!--  <b>%profile_activation_link% :</b> Profile Activation link<br/><br/>
                                               <b>%product_title% :</b> Product Title</span><br/>
                                               <b>%product_image% :</b> Product Image</span><br/>
                                               <b>%product_url% :</b> Product Url</span><br/> -->
                                        </div><?php */?>
                                        <input type="hidden" class="form-control" name="reminder_email" value="1"  />
                                        <input type="submit" class="btn btn-default" value="Send" />
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
         
    