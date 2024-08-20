    <style>
    .help-block{color:red;}
    .form-group img { width: 150px; height: 100px;}

    </style> 
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Product</h2>   
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
                            Add new product
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <h3></h3>
                                    <form role="form" method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label>Product Title</label>
                                            <input class="form-control" name="product_title" id="product_title" value="<?php echo isset($products_rev->product->product_title) ? $products_rev->product->product_title : ''; ?>"/>
                                            <sapn class="help-block" id="product_title_error"></sapn>
                                        </div>
                                        <?php if(Yii::app()->controller->action->id == 'edit'){ ?>
                                        <div class="form-group"> 
                                            <label>Product Image</label>
                                            <?php if(isset($products_rev->product->image) && $products_rev->product->image != '' && is_file(Yii::getPathOfAlias('webroot') ."/uploads/products/thumb/".$products_rev->product->image)){ ?>
                                                  <img src="<?php echo Yii::app()->request->baseurl.'/uploads/products/thumb/'.$products_rev->product->image ; ?>" >
                                            <?php }else{ ?>
                                                  <img src="<?php echo Yii::app()->request->baseurl.'/images/img_not_found.gif' ; ?>" >
                                            <?php } ?> 
                                            <input type="hidden" name="prev_image" value="<?php echo isset($product->image) ? $product->image : '' ; ?>">  
                                        </div>
                                        <?php } ?>
                                        <div class="form-group"> 
                                            <label><?php if(Yii::app()->controller->action->id == 'edit') echo 'Change'; else echo 'Product'; ?> Image</label>
                                            <input type="file" name="image"/>
                                            <sapn class="help-block" id="product_title_error">
                                        </div>
                                        <div class="form-group">
                                            <label>Product Category</label>
                                            <select class="form-control" name="cat_id" id="cat_id">
                                                <option selected value="">Select Category</option>
                                                <?php 
                                                if(!empty($category))
                                                {
                                                    foreach($category as $cat)
                                                    { 
                                                ?>
                                                         <option value="<?php echo $cat->id; ?>" <?php if(isset($product->cat_id) && $product->cat_id == $cat->id) echo 'selected'; ?>><?php echo $cat->cat_name; ?></option>
                                                <?php 
                                                    } 
                                                }
                                                else
                                                {
                                                ?>     
                                                    <option>No category available</option>
                                                <?php } ?>    
                                                
                                            </select>
                                            <sapn class="help-block" id="cat_id_error">
                                        </div>
                                        <div class="form-group">
                                            <label>Description</label>
                                            <textarea class="form-control" name="description" id="description" rows="10" placeholder="Product description" ><?php echo isset($product->description) ? $product->description : ''; ?></textarea>
                                            <sapn class="help-block" id="description_error">
                                        </div>
                                        <div class="form-group">
                                            <label>Product Listing Url</label> 
                                            <input class="form-control" name="product_url" id="product_url" placeholder="Product url" value="<?php echo isset($product->product_url) ? $product->product_url : ''; ?>" />
                                            <sapn class="help-block" id="product_url_error">
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>Promotion Description</label>
                                            <textarea class="form-control" name="promotion_details" id="promotion_details" rows="3"><?php echo isset($product->product_title) ? $product->product_title : ''; ?></textarea>
                                            <sapn class="help-block" id="promotion_details_error">
                                        </div>
                                        <div class="form-group">
                                            <label>Promotion End Date</label><?php echo isset($product->promotion_end_date) ? date('m/d/Y', strtotime($product->promotion_end_date)) : ''; ?>
                                            <input type="date" class="form-control" name="promotion_end_date" id="promotion_end_date" placeholder="Product url" value="<?php echo isset($product->promotion_end_date) ? date('Y-m-d', strtotime($product->promotion_end_date)) : ''; ?>"/>
                                            <sapn class="help-block" id="promotion_end_date_error">
                                        </div>
                                       <div class="form-group">
                                            <label>Approve Product</label><br/>
                                            <label class="checkbox-inline">
                                                <input type="radio" name="product_approve" checked <?php if(isset($product->status) && $product->status == 1) echo 'checked';?> value="1" /> Yes
                                            </label>
                                            <label class="checkbox-inline">
                                                <input type="radio" <?php if(isset($product->status) && $product->status == 0) echo 'checked';?> name="product_approve" value="0"/> No
                                            </label>
                                            
                                        </div>
                                        <input type="hidden" class="form-control" name="product" value="1"  />
                                        <button type="submit" class="btn btn-default" onclick="return add_new_product()"><?php if(Yii::app()->controller->action->id == 'edit') echo 'Update'; else echo 'Save';?></button>
                                        <button type="reset" class="btn btn-primary" onclick="location.href='<?php echo Yii::app()->createurl('admin/products/list'); ?>'">Back</button>

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
         
    