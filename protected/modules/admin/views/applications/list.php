<link href="<?php echo Yii::app()->request->baseurl;?>/resources/admin/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
 <style>
 .table tr td img { width: 150px; height: 100px;}

 </style>
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Applications</h2>   
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
                        <?php echo Yii::app()->session['success']; ?> 
                    </div>
                    <?php Yii::app()->session['success'] = ''; } ?>
                    <?php /*if(Yii::app()->session['product_success'] != ''){ ?>
                        <div style="background-color:#B0F3B0;padding:6px;" id="p_sucess"><?php echo Yii::app()->session['product_success']; ?></div>
                    <?php Yii::app()->session['product_success'] = ''; } */?>
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                          
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th > </th>
                                            <th >Candidate Name</th>
                                            <th >CNIC</th>
                                            <th >Applied Post</th>
                                            <th >Test Title</th>
                                            <th >Application Form No #</th>
                                            <th >Application Status</th>
                                            <th >Options</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php  
                                   
                                     $counter = 1;
                                     $date = '01-08-2015';
                                     foreach($applications as $rec)
                                     {
                                    ?>    
                                        <tr class="<?php if($counter%2 == 0) echo 'odd gradeX';?>">
                                            <td><?php echo $counter; ?></td> 
                                            <td><?php echo isset($rec->can->CanFirstName) ? $rec->can->CanFirstName.' '.$rec->can->CanLastName : ''; ?></td>
                                            <td><?php echo isset($rec->can->CanCNIC) ? $rec->can->CanCNIC : ''; ?></td>
                                            <td><?php echo isset($rec->p->PostName) ? $rec->p->PostName : ''; ?></td>
                                            <td><?php echo isset($rec->p->t->TestName) ? $rec->p->t->TestName : ''; ?></td>
                                            <td><?php echo isset($rec->form_reg_no) ? $rec->form_reg_no : ''; ?></td>
                                            <td><?php echo $rec->status == 1 ? '<span style="color:green;">Completed</span>' : '<span style="color:red;">Pending</span>'; ?></td>
                                            
                                            <td class="center" >
                                               <a href="<?php echo Yii::app()->createurl('admin/applications/step_3/PCLTC/'.base64_encode($rec->PCLTCID));?>" title="Edit"> <i class="fa fa-pencil"></i></a> | 
                                                <a href="javascript:void(0);" onclick="product_del('<?php echo Yii::app()->createurl('admin/applications/delete_app/id/'.base64_encode($rec->PCLTCID));?>');" title="Delete" data-toggle="modal" data-target="#myModal"> <i class="fa fa-times"></i></a></td>
                                               
                                        </tr>
                                    <?php  $counter++;
                                    }
                                    ?>    
                                          
                                      
                                    </tbody>
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
                            <h4 class="modal-title" id="myModalLabel">Delete Application</h4>
                        </div>
                        <div class="modal-body">
                            Are you sure, you want to delete this Application ?
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
    