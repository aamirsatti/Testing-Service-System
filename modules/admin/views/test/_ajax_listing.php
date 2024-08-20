<!-- JQUERY SCRIPTS -->
    <script src="<?php echo Yii::app()->request->baseurl;?>/resources/admin/js/jquery-1.10.2.js"></script>
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
<script src="<?php echo Yii::app()->request->baseurl;?>/resources/admin/js/dataTables/jquery.dataTables.js"></script>
 <script src="<?php echo Yii::app()->request->baseurl;?>/resources/admin/js/dataTables/dataTables.bootstrap.js"></script>
        <script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
            });
    </script> 