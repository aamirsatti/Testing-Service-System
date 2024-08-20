    <style>
    .help-block{color:red;}
    .form-group img { width: 150px; height: 100px;}

    </style> 
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Testimonial</h2>   
                        <h5> </h5>
                       
                    </div> 
					<?php if(Yii::app()->controller->action->id == 'edit'){
					     if(isset($product->status) && $product->status == 1){ ?>
                    <a href="<?php echo Yii::app()->createurl('products/detail/'.str_replace(array(" ", "/" , "\\", "#", "$", "@", "%"),"-",substr($product->product_title,0,60)).'/p/id/'.base64_encode($product->id));?>" target="_blank"> 
                    	<button type="reset" class="btn btn-primary" style="float:right;margin-right:20px;" >View on site</button>
                    </a>  
                   <?php } }?>   
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
                             <?php if(Yii::app()->controller->action->id == 'edit') echo 'Edit '; else echo 'Add new'; ?> Testimonial
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <h3></h3>
                                    <form role="form" method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                           <label > Name</label>
                                            <input class="form-control" id="txt1" name="name" placeholder="Name" type="text" required value="<?php echo isset($data->name) ? $data->name : ''; ?>">
                                            <sapn class="help-block" id="product_title_error"></sapn>
                                        </div>
                                        <?php if(Yii::app()->controller->action->id == 'edit'){ ?>
                                        <div class="form-group"> 
                                            <label>User Image</label>
                                            <?php if(isset($data->image) && $data->image != '' && is_file(Yii::getPathOfAlias('webroot') ."/uploads/testimonial/".$data->image)){ ?>
                                                  <img src="<?php echo Yii::app()->request->baseurl.'/uploads/testimonial/'.$data->image ; ?>" >
                                            <?php }else{ ?>
                                                  <img src="<?php echo Yii::app()->request->baseurl.'/images/img_not_found.gif' ; ?>" >
                                            <?php } ?> 
                                            <input type="hidden" name="prev_image" value="<?php echo isset($data->image) ? $data->image : '' ; ?>">  
                                        </div>
                                        <?php } ?>
                                        <div class="form-group"> 
                                            <label><?php if(Yii::app()->controller->action->id == 'edit') echo 'Change'; else echo 'User'; ?> Image</label>
                                            <input type="file" name="image"/>
                                            <sapn class="help-block" id="product_title_error">
                                        </div>
                                        <div class="form-group">
                                            <label > Designation</label>
                      						<input class="form-control" id="txt1" name="designation" placeholder="Designation" type="text" required value="<?php echo isset($data->designation) ? $data->designation : ''; ?>">
                     
                                            <sapn class="help-block" id="cat_id_error">
                                        </div>
                                        <div class="form-group">
                                            <label>Testimonial</label>
                                            <textarea class="form-control" name="description" id="description" rows="10" placeholder="Product description" ><?php echo isset($data->comment) ? $data->comment : ''; ?></textarea>
                                            <sapn class="help-block" id="description_error">
                                            <?php
                                                // Make sure you are using correct paths here.
                                                $ckeditor = new CKEditor();
                                                $ckeditor->basePath = Yii::app()->request->baseurl.'/resources/Ckeditor/ckeditor/';
                                                $ckfinder = new CKFinder();
                                                $ckfinder->BasePath = Yii::app()->request->baseurl.'/resources/Ckeditor/ckfinder/'; // Note: the BasePath property in the CKFinder class starts with a capital letter.
                                                $ckeditor->config['height'] = 200;
                                                //$ckeditor->config['width'] = 650;
                                                $ckfinder->SetupCKEditorObject($ckeditor);
                                                
                                                $ckeditor->replace("description");
                                            ?>
                                        </div>
                                        <div class="form-group">
                                        	<label>Status</label><br/>
                                            <input type="radio" name="status" value="1" <?php if(isset($data->status) && $data->status == 1) echo 'checked'; ?>/> Active
                                            <input type="radio" name="status" value="0" <?php if(isset($data->status) && $data->status == 0) echo 'checked'; ?>/> In Active
                                        </div>
                                        
                                        <input type="hidden" class="form-control" name="work" value="1"  />
                                        <button type="submit" class="btn btn-default" ><?php if(Yii::app()->controller->action->id == 'edit') echo 'Update'; else echo 'Save';?></button>
                                        <button type="reset" class="btn btn-primary" onclick="location.href='<?php echo Yii::app()->createurl('admin/comments/list'); ?>'">Back</button>

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
         
    