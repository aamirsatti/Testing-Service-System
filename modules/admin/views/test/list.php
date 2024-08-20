<link href="<?php echo Yii::app()->request->baseurl;?>/resources/admin/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
 <style>
 .table tr td img { width: 150px; height: 100px;}

 </style>
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Test</h2>   
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
                        <div class="panel-heading" style="text-align:center;">
                            <label> Select Organization</label>
                            <select class="form-control" id="org_id" style="width:50%;margin:0 auto;" onchange="get_org_posts()">
                               <option value="<?php echo Yii::app()->createurl('admin/test/list/') ;?>">All</option>
                             <?php foreach($org as $rec){ ?>
                               <option value="<?php echo Yii::app()->createurl('admin/test/test_list/id/'.base64_encode($rec->OrgID)) ;?>" <?php if(Yii::app()->session['org'] == $rec->OrgID) echo 'selected';?>><?php echo $rec->OrgName ;?></option>
                             <?php } ?>  
                            </select> 
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th > </th>
                                            <th >Test Name</th>
                                            <th >Test Posts</th>
                                            <th >Department</th>
                                            <th >Application Form</th>
                                            <th >Options</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php  
                                   
                                     $counter = 1;
                                     $date = '01-08-2015';
                                     foreach($test_data as $rec)
                                     {
                                    ?>    
                                        <tr class="<?php if($counter%2 == 0) echo 'odd gradeX';?>">
                                            <td><?php echo $counter; ?></td> 
                                            <td><?php echo isset($rec->TestName) ? $rec->TestName : ''; ?></td>
                                            <td><?php echo isset($rec->posts) ? count($rec->posts) : ''; ?></td>
                                            <td><?php echo isset($rec->org->OrgName) ? $rec->org->OrgName : ''; ?></td>
                                            <td>
                                              <?php if(isset($rec->test_ad) && $rec->application_file != '' && is_file(Yii::getPathOfAlias('webroot') ."/resources/tcpdf/examples/app_forms/".$rec->application_file.'.pdf')){ ?>
                                                 <a class="btn btn-primary" href="<?php echo Yii::app()->request->baseurl ."/resources/tcpdf/examples/app_forms/".$rec->application_file.'.pdf'; ?>" download>Download</a>
                                              <?php } ?>   
                                            </td>
                                            <td class="center" >
                                                <a href="<?php echo Yii::app()->createurl('admin/test/edit/id/'.base64_encode($rec->TID));?>" title="Edit"> <i class="fa fa-pencil"></i></a> | 
                                                <a href="javascript:void(0);" onclick="product_del('<?php echo Yii::app()->createurl('admin/test/delete/id/'.base64_encode($rec->TID));?>');" title="Delete" data-toggle="modal" data-target="#myModal"> <i class="fa fa-times"></i></a></td>
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
                            <h4 class="modal-title" id="myModalLabel">Delete</h4>
                        </div>
                        <div class="modal-body">
                            Are you sure, you want to delete this Test ?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                            <button type="button" class="btn btn-primary" onclick="del_confirm();" data-dismiss="modal">Yes</button>
                        </div>
                    </div>
                </div>
            </div>
                      
                <!-- /. ROW  -->
         
                <!-- /. ROW  -->
    <script src="<?php echo Yii::app()->request->baseurl;?>/resources/admin/js/dataTables/jquery.dataTables.js"></script>
    <script src="<?php echo Yii::app()->request->baseurl;?>/resources/admin/js/dataTables/dataTables.bootstrap.js"></script>
        <script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable({
					"ordering": false
				});
            });
			$(function () {
				$("#example2").DataTable();
				$('#example1').DataTable({
				  "paging": true,
				  "lengthChange": true,
				  "searching": true,
				  "ordering": false,
				  "info": true,
				  "autoWidth": true
				});
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
	 function get_org_posts2()
	 {
		 var organization = $('#org_id').val();
		 $.ajax({
			 url: '<?php echo Yii::app()->createurl('admin/test/get_org_test'); ?>',
			 data: 'orgID='+organization,
			 type:'POST',
			 beforeSend: function()
			 {
				//$('.panel-body').html('<span style="width:50%;margin-left:30%;text-align:center;"><img src="<?php //echo Yii::app()->request->baseurl;?>/images/loading.gif" /></span>');
			 },
			 success: function(result)
			 {
				 if(result)
				 {
					 $('.panel-body').html(result);
				 }
			 },
		 });
	 }
	 function get_org_posts()
	 {
		  var url = $('#org_id').val();
		  window.location = url;
	 }
	</script>                  
    