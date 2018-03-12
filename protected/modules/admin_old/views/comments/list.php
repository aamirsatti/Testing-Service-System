<link href="<?php echo Yii::app()->request->baseurl;?>/resources/admin/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
 <style>
 .table tr td img { width: 150px; height: 100px;}

 </style>
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Testimonials</h2>   
                        <h5> </h5>
                       
                    </div>
                </div>
                 <!-- /. ROW  -->
                 <hr />
               
            <div class="row">
                <div class="col-md-12">
                    <?php if(Yii::app()->session['success'] != ''){ ?>
                    <div class="alert alert-success alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <?php echo Yii::app()->session['success']; ?> .
                    </div>
                    <?php Yii::app()->session['success'] = ''; } ?>
                    <?php /*if(Yii::app()->session['product_success'] != ''){ ?>
                        <div style="background-color:#B0F3B0;padding:6px;" id="p_sucess"><?php echo Yii::app()->session['product_success']; ?></div>
                    <?php Yii::app()->session['product_success'] = ''; } */?>
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             Testimonials
                        </div>
                        <p><button type="reset" class="btn btn-primary" onclick="location.href='<?php echo Yii::app()->createurl('admin/comments/add'); ?>'" style="margin-right:20px;margin-bottom:10px;float:right;">Add New</button></p>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table  class="table table-striped table-bordered table-hover" id="dataTables-example">
                  <thead>
                    <tr>
                      <th>Sr No</th>
                      <th>Name</th>
                      <th>Designation</th>
                      <th>Testimonial</th>
                      <th>Status</th>
                      <th width="90px" class="text-center">Actions</th>
                    </tr>
                    </thead>
                    <?php 
                    //if(!empty($work_photos))
                   
                      $counter = 1;
                      foreach($data as $b){ ?>
                      <tr>
                        
                         <td>
                            <?php if(isset($b->image) && $b->image != '' && is_file(Yii::getPathOfAlias('webroot') ."/uploads/testimonial/".$b->image)){ ?>
                                  <img src="<?php echo Yii::app()->request->baseurl.'/uploads/testimonial/'.$b->image ; ?>" >
                            <?php }else{ ?>
                                  <img src="<?php echo Yii::app()->request->baseurl.'/images/img_not_found.gif' ; ?>" >
                            <?php } ?> 
                         </td>
                         <td><?php echo $b->name; ?></td>
                         <td><?php echo $b->designation; ?></td>
                         <td><?php echo substr($b->comment,0, 150); if(strlen($b->comment) > 150) echo '...'; ?></td>
                       <!-- <td><span class="label label-success">Approved</span></td> -->
                      <td><span class="label <?php if($b->status == 1)echo 'label-success'; else echo 'label-warning'; ?>"><?php if($b->status == 1)echo 'Active'; else echo 'Inactive'; ?></span></td> 
                      <td class="act">
                        <div class="col-xs-4"><a href="<?php echo Yii::app()->createurl('admin/comments/edit/id/'.base64_encode($b->id));?>" title="Edit"><i class="fa fa-edit"></i></a></div>
                       <!-- <div class="col-xs-4"><a href="" title="View"><i class="fa fa-eye"></i></a></div>-->
                        <div class="col-xs-4"><a data-toggle="modal" data-target="#myModal" href="javascript:void(0);" title="Delete" onclick="product_del('<?php echo Yii::app()->createurl('admin/comments/delete/id/'.base64_encode($b->id));?>');"><i class="fa fa-times"></i></a></div>
                        </td>
                      </tr>
                    <?php 
                        $counter++;
                      } 
                   ?>     
                
                  </table>
                            </div>
                            
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
                            Are you sure, you want to delete this Testimonial ?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                            <button type="button" class="btn btn-primary" onclick="del_confirm();" data-dismiss="modal">Yes</button>
                        </div>
                    </div>
                </div>
            </div>
                        
            
    <script src="<?php echo Yii::app()->request->baseurl;?>/resources/admin/js/dataTables/jquery.dataTables.js"></script>
    <script src="<?php echo Yii::app()->request->baseurl;?>/resources/admin/js/dataTables/dataTables.bootstrap.js"></script>
        <script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
            });
    </script> 
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
    