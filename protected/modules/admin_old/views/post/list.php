<link href="<?php echo Yii::app()->request->baseurl;?>/resources/admin/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
 <style>
 .table tr td img { width: 150px; height: 100px;}

 </style>
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Posts</h2>   
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
                          <form role="form" method="post">
                            	<label> Select Organization</label>
                                <select class="form-control" id="org_id" style="width:50%;margin:0 auto;" onchange="get_org_posts()">
                                   <option value="<?php echo Yii::app()->createurl('admin/post/list/') ;?>">All</option>
                                 <?php foreach($org as $rec){ ?>
                                   <option value="<?php echo Yii::app()->createurl('admin/post/posts_list/id/'.base64_encode($rec->OrgID)) ;?>" <?php if(Yii::app()->session['org'] == $rec->OrgID) echo 'selected';?>><?php echo $rec->OrgName ;?></option>
                                 <?php } ?>  
                                </select>   
                                
                            </form>
                         
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th > </th>
                                            <th >Post Name</th>
                                            <th >Post Grade</th>
                                            <th >Organization</th>
                                            <th> Quota </th>
                                            <th >Options</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php  
                                   
                                     $counter = 1;
                                     //$date = '01-08-2015';
                                     foreach($post as $rec)
                                     {
                                    ?>    
                                        <tr class="<?php if($counter%2 == 0) echo 'odd gradeX';?>">
                                            <td><?php echo $counter; ?></td>  
                                            <td><?php echo isset($rec->PostName) ? $rec->PostName : ''; ?></td>
                                            <td><?php echo isset($rec->PostGrade) ? $rec->PostGrade : ''; ?></td>
                                           	<td><?php echo isset($rec->org->OrgName) ? $rec->org->OrgName : ''; ?></td> 
                                            <td>
                                              <?php if(!empty($rec->locations)){ ?>
                                                 <a class="btn btn-primary" data-toggle="modal" data-target="#myModal_quota_<?php echo $counter; ?>" href="javascript:void(0);" >View</a>
                                              <?php } ?>   
                                            </td>
                                            <td class="center">
                                               <a href="<?php echo Yii::app()->createurl('admin/post/edit/id/'.base64_encode($rec->PID));?>" title="Edit"> <i class="fa fa-pencil"></i></a> | 
                                               <a href="javascript:void(0);" onclick="product_del('<?php echo Yii::app()->createurl('admin/post/delete/id/'.base64_encode($rec->PID));?>');" title="Delete" data-toggle="modal" data-target="#myModal"> <i class="fa fa-times"></i></a>
                                               <div class="modal fade" id="myModal_quota_<?php echo $counter; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                                <h4 class="modal-title" id="myModalLabel">Post Quota</h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                <?php 
																  if(!empty($rec->locations))
																  {
																	  foreach($rec->locations as $quota)
																	  { 
																		  if($quota->Region == 'punjab')
																				$punjab = $quota->Qouta;
																		  if($quota->Region == 'sindh')
																				$sindh = $quota->Qouta;
																		  if($quota->Region == 'balochistan')
																				$balochistan = $quota->Qouta;
																		  if($quota->Region == 'kpk')
																				$kpk = $quota->Qouta;
																	  }
																	 
																	 //$punjab = $post->locations-> ?>
																	 <table cellpadding="4" cellspacing="4" class="table table-striped table-bordered table-hover">
																	  <tr>
																		<th> <label>Province</label>  &nbsp;&nbsp;</th><th align="center"> Quota</th>
																	  </tr>
																	  <tr>
																		<td> Punjab: &nbsp;&nbsp;</td><td> <?php echo isset($punjab) ? $punjab : 0;?></td>
																	  </tr>
																	  <tr>
																		<td> Sindh: &nbsp;&nbsp;</td><td> <?php echo isset($sindh) ? $sindh : 0;?></td>
																	  </tr>
																	  <tr>
																		<td> Balochistan: &nbsp;&nbsp;</td><td> <?php echo isset($balochistan) ? $balochistan : 0;?></td>
																	  </tr>
																	  <tr>
																		<td> KPK: &nbsp;&nbsp;</td><td> <?php echo isset($kpk) ? $kpk : 0;?></td>
																	  </tr>
																	</table>  
																<?php
																  }else{
																 ?> 
                                                                      <table cellpadding="4" cellspacing="4">
																	  <tr>
																		<td> <span style="color:red;"> No Qouta mentioned</span></td>
																	  </tr>
                                                                      </table>
                                                                 <?php } ?>     
                                                            </div>
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            
                                          </tr>
                                          <!-- Pop up model >> For Quota -->
                                            
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
                            Are you sure, you want to delete this Post ?
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
	 function get_org_posts2()
	 {
		 var organization = $('#org_id').val();
		 $.ajax({
			 url: '<?php echo Yii::app()->createurl('admin/post/get_org_posts'); ?>',
			 data: 'orgID='+organization,
			 type:'POST',
			 beforeSend: function()
			 {
				$('.panel-body').html('<span style="width:50%;margin-left:30%;text-align:center;"><img src="<?php echo Yii::app()->request->baseurl;?>/images/loading.gif" /></span>');
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
    