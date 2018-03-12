<!-- JQUERY SCRIPTS -->
    <script src="<?php echo Yii::app()->request->baseurl;?>/resources/admin/js/jquery-1.10.2.js"></script>
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
                <td class="center" >
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
                 
        <?php  $counter++;
        }
        ?>    
              
          
        </tbody>
    </table>
</div>
<script src="<?php echo Yii::app()->request->baseurl;?>/resources/admin/js/dataTables/jquery.dataTables.js"></script>
 <script src="<?php echo Yii::app()->request->baseurl;?>/resources/admin/js/dataTables/dataTables.bootstrap.js"></script>
        <script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
            });
    </script> 