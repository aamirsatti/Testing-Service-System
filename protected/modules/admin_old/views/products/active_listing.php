<link href="<?php echo Yii::app()->request->baseurl;?>/resources/admin/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
 <style>
 .table tr td img { width: 150px; height: 100px;}

 </style>
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Active Products</h2>   
                        <h5> </h5>
                       
                    </div>
                </div>
                 <!-- /. ROW  -->
                 <hr />
               
            <div class="row">
                <div class="col-md-12">
                    <div class="alert alert-success alert-dismissable" style="display:none;" id="aprov_suces">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        
                    </div>
                    <?php if(Yii::app()->session['product_success'] != ''){ ?>
                    <div class="alert alert-success alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <?php echo Yii::app()->session['product_success']; ?> .
                    </div>
                    <?php Yii::app()->session['product_success'] = ''; } ?>
                    <?php /*if(Yii::app()->session['product_success'] != ''){ ?>
                        <div style="background-color:#B0F3B0;padding:6px;" id="p_sucess"><?php echo Yii::app()->session['product_success']; ?></div>
                    <?php Yii::app()->session['product_success'] = ''; } */?>
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Active Products
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Product Image</th>
                                            <th>Product Title</th>
                                            <th>Seller</th>
                                            <th>Reviewer</th>
                                            <th>Reviewed Url</th>
                                            <th>Reviewed date</th>
                                            <th>Options</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php  
                                   
                                     $counter = 1;
                                     $date = '01-08-2015';
                                     foreach($products_rev as $pr)
                                     {
                                    ?>    
                                        <tr class="<?php if($counter%2 == 0) echo 'odd gradeX';?>" id="active_pro_area_<?php echo $pr->id; ?>">
                                            <td>
                                              <?php if(isset($pr->product->image) && $pr->product->image != '' && is_file(Yii::getPathOfAlias('webroot') ."/uploads/products/thumb/".$pr->product->image)){ ?>
                                                  <img src="<?php echo Yii::app()->request->baseurl.'/uploads/products/thumb/'.$pr->product->image ; ?>" alt ="<?php echo $pr->product->product_title; ?>" title ="<?php echo $pr->product->product_title; ?>">
                                              <?php }else{ ?>
                                                  <img src="<?php echo Yii::app()->request->baseurl.'/images/img_not_found.gif' ; ?>" alt ="<?php echo $pr->product->product_title; ?>" title ="<?php echo $pr->product->product_title; ?>">
                                              <?php } ?>        
                                            </td>
                                            <td> <a href="<?php echo Yii::app()->createurl('admin/products/edit/id/'.base64_encode($pr->product_id));?>" title="Edit"><?php echo $pr->product->product_title; ?></a></td>
                                            <td><?php echo isset($pr->product->seller->first_name) ? $pr->product->seller->first_name : ''; ?></td>
                                            <td><?php echo isset($pr->reviewer->first_name) ? $pr->reviewer->first_name : ''; ?></td>
                                            <td><?php echo isset($pr->reviewed_url) ? $pr->reviewed_url : ''; ?></td>
                                            <td class="center"><?php echo $pr->reviewed_date != '' ? date('d M,Y', strtotime($pr->reviewed_date)) : ''; ?></td>
                                            <td>
                                                <select name="approve" id="approve_<?php echo $pr->id; ?>" onchange="apporve_review('<?php echo $pr->id; ?>')">
                                                   <option value="1" <?php if(isset($pr->status) && $pr->status == 2) echo 'selected'; ?>>Approve</option>
                                                   <option value="0" <?php if(isset($pr->status) && $pr->status == 1) echo 'selected'; ?>>Not Approve</option>
                                                   <option value="2" >Delete</option>
                                                </select>   
                                            </td>
                                        </tr>

                                    <?php  $counter++;
                                    }
                                    ?>    
                                          
                                      
                                    </tbody>
                                </table>
                            </div>
                            <script>
                            function apporve_review(id)
                            {  
                                var approve = $('#approve_'+id).val();
                                if(approve == 1)
                                	var conf = confirm('Are you sure to approve.');
								else if(approve == 2)
                                	var conf = confirm('Are you sure to delete.');	
                                if(conf)
                                {
                                    $.ajax({
                                        url: '<?php echo Yii::app()->createurl("admin/products/approve_review");?>',
                                        data: 'approve='+approve+'&id='+id,
                                        type: 'POST',
                                        beforeSend: function()
                                        {
                                             //alert(dataString);
                                        },
                                        success:function(ajax)
                                        { 
                                            if(ajax == 'success')
                                            {  
                                               if(approve == 1)
                                               {
                                                    $('#aprov_suces').show().css('color','green').html('Review has been approved.');
                                                    $('#active_pro_area_'+id).hide();
                                               }
                                               else if(approve == 2)
                                               {
                                                    $('#aprov_suces').show().css('color','green').html('Review has been removed.');
                                                    $('#active_pro_area_'+id).hide();
                                               }
                                               else
                                                    $('#aprov_suces').show().css('color','green').html('Review has been updated.');
                                               
                                               setTimeout(function(){
                                                 $('#aprov_suces').fadeOut(3000);
                                               },5000);
                                                
                                            }
                                            else
                                            { 
                                               
                                            }
                                        }
                                    });
                                }
                                else
                                {
                                    if(approve == 1)
                                       $('#approve_'+id).val(0);
									else if(approve == 2)
                                       $('#approve_'+id).val(0);   
                                    else
                                        $('#approve_'+id).val(1);
                                }
                            }    
                            </script>
                        </div>
                    </div>
                    <!--End Advanced Tables -->
                </div>
            </div>
            <!-- -------------------------------------------- -->
            <!-- Pop up model  -->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title" id="myModalLabel">Delete Product</h4>
                        </div>
                        <div class="modal-body">
                            Are you sure, you want to delete this product ?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                            <button type="button" class="btn btn-primary" onclick="del_confirm();" data-dismiss="modal">Yes</button>
                        </div>
                    </div>
                </div>
            </div>
            <script>
            var p_del_url = '';
             function product_del(del_url)
             {
                 p_del_url = del_url;
             }
             function del_confirm()
             {
                window.location = p_del_url;
             }
            </script>                
                <!-- /. ROW  -->
         
                <!-- /. ROW  -->
    <script src="<?php echo Yii::app()->request->baseurl;?>/resources/admin/js/dataTables/jquery.dataTables.js"></script>
    <script src="<?php echo Yii::app()->request->baseurl;?>/resources/admin/js/dataTables/dataTables.bootstrap.js"></script>
        <script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
            });
    </script>            
    