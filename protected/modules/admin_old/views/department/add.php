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
                    <!-- Form Elements -->
                    <?php if(Yii::app()->session['success'] != ''){ ?>
                    <div style="background-color:#B0F3B0;padding:6px;" id="p_sucess"><?php echo Yii::app()->session['success']; ?></div>
                    <?php Yii::app()->session['success'] = ''; } ?>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           Add Department
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-8">
                                    <h3></h3>   
                                    <form role="form" method="post" enctype="multipart/form-data">        
                                        <div class="form-group">
                                            <label>Department Name</label>  
                                            <input class="form-control" name="dep_title" id="title" required value="<?php echo isset($data->test_title) ? $data->test_title : ''; ?>"/>
                                            <sapn class="help-block" id="title_error"></sapn>
                                        </div>
                                        <div class="form-group">
                                            <label>Department Type</label> 
                                            <select class="form-control" name="dep_type">
                                              <option value="Public">Public</option>
                                              <option value="Private">Private</option>
                                              <option value="Non-Profit">Non-Profit</option>
                                            </select>  
                                            <sapn class="help-block" id="subject_error"></sapn>
                                        </div>
                                        <div class="form-group">
                                            <label>Description</label>
                                            <textarea class="form-control" id="body" rows="8" cols="10" name="dep_detail"><?php echo isset($data->test_detail) ? str_replace(array("<br />"),"",$data->test_detail) : ''; ?></textarea>   
                                            <?php
                                                // Make sure you are using correct paths here.
                                                $ckeditor = new CKEditor();
                                                $ckeditor->basePath = Yii::app()->request->baseurl.'/resources/Ckeditor/ckeditor/';
                                                $ckfinder = new CKFinder();
                                                $ckfinder->BasePath = Yii::app()->request->baseurl.'/resources/Ckeditor/ckfinder/'; // Note: the BasePath property in the CKFinder class starts with a capital letter.
                                                $ckeditor->config['height'] = 300;
                                                //$ckeditor->config['width'] = 650;
                                                $ckfinder->SetupCKEditorObject($ckeditor);
                                                
                                                $ckeditor->replace("body");
                                            ?>
                                            <sapn class="help-block" id="body_error"></sapn>
                                        </div>
                                       
                                        
                                        <input type="hidden" class="form-control" name="test_data" value="1"  />
                                        <button type="submit" class="btn btn-primary" onclick="return email_templates()">Save</button>
                                        <button type="reset" class="btn btn-default" onclick="location.href='<?php echo Yii::app()->createurl('admin/test/list'); ?>'">Back</button>

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
         
    