    <style>
    .help-block{color:red;}
    .form-group img { width: 150px; height: 100px;}

    </style> 
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Category</h2>   
                        <h5> </h5>
                       
                    </div>
                </div>
                 <!-- /. ROW  -->
                 <hr />
               <div class="row">
                <div class="col-md-12">
                    <!-- Form Elements -->
                    <?php if(Yii::app()->session['product_success'] != ''){ ?>
                    <div style="background-color:#B0F3B0;padding:6px;" id="p_sucess"><?php echo Yii::app()->session['product_success']; ?></div>
                    <?php Yii::app()->session['product_success'] = ''; } ?>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <?php if(Yii::app()->controller->action->id == 'edit') echo 'Edit '; else echo 'Add new'; ?> Category
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <h3></h3>
                                    <form role="form" method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label>Category Name</label>
                                            <input class="form-control" name="cat_title" id="cat_title" value="<?php echo isset($category->cat_name) ? $category->cat_name : ''; ?>"/>
                                            <sapn class="help-block" id="cat_title_error"></sapn>
                                        </div>
                                        
                                        
                                        <input type="hidden" class="form-control" name="Category" value="1"  />
                                        <button type="submit" class="btn btn-default" onclick="return add_new_cat()"><?php if(Yii::app()->controller->action->id == 'edit') echo 'Update'; else echo 'Save';?></button>
                                        <button type="reset" class="btn btn-primary" onclick="location.href='<?php echo Yii::app()->createurl('admin/category'); ?>'">Back</button>

                                    </form>
                                    <br />
                                </div>
                            </div>
                        </div>
                    </div>
                     <!-- End Form Elements -->
                </div>
            </div>
            <script>
             function add_new_cat()
             {
                 var cat_name = $('#cat_title').val();
                 if(cat_name == '')
                 {
                    $('#cat_title_error').text('Please enter Category Name');
                    return false;
                 }
                 else
                    return true;
             }
            </script>
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
         
    