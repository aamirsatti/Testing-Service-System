<style>
.bx-viewport { height: 300px;}
.bx-caption { margin-top: -50px;margin-left: -30px; height: 50px;}
.bxslider li img{margin-top: -10px; margin-left:-31px;}
/*.bx-controls { display:none;} */
.bx-pager, .bx-controls-auto  { display:none;}


</style>
		
      <style>
        .title3 { padding: 5px; }
      </style> 
		<div class="boxed">
		
			<h1 class="title2"><?php echo isset($data->test_title) ? $data->test_title : ''; ?> Result</h1>
			<p><?php echo isset($data->test_detail) ? str_replace(array("<br />"),"",$data->test_detail) : ''; ?></p>
			
		</div>
        
		
        <table class="boxed orange" width="92%" style="background: rgba(171, 32, 0, 0.58);padding:5px;">
          <tr>
            <td width="60%" class="title3" > Enter Your CNIC number to see your result</td>
            <td width="40%" class="title3" style="border-left:1px solid white; padding-left:10px;"> <?php echo isset($data->last_date_apply) ? date('d M, Y', strtotime($data->last_date_apply)) : ''; ?></td>
          </tr>
          <tr>
            <td width="60%" class="title3"> CNIC #</td>
            <td width="40%" class="title3" style="border-left:1px solid white; padding-left:10px;"> 
            	<input type="text" placeholder="Enter CNIC #">      	
            </td>
          </tr>
          <tr>
            <td width="60%" class="title3"> Download Test Application Form</td>
            <td width="40%" class="title3" style="border-left:1px solid white; padding-left:10px;"> 
            	<?php if(isset($data->test_application_form) && $data->test_application_form != '' && is_file(Yii::getPathOfAlias('webroot') ."/uploads/test_forms/".$data->test_application_form)){ ?>
                    <a  class="btn btn-primary" href="<?php echo Yii::app()->request->baseurl ."/uploads/test_forms/".$data->test_application_form; ?>" download>Download Application Form</a>
                <?php }else { ?>
                    <sapn class="help-block" id="subject_error">No Application Found</sapn>
                <?php } ?>  
            </td>
          </tr>
          <tr>
            <td width="60%" class="title3"> Test Date</td>
            <td width="40%" class="title3" style="border-left:1px solid white; padding-left:10px;"> <?php echo isset($data->test_date) ? date('d M, Y', strtotime($data->test_date)) : ''; ?></td>
          </tr>
 
        </table>
      
		<div class="boxed orange" style="display:none;">
			<div class="col-one">
				<h2 class="title3">Latest Tests</h2>
					
                <ul>
					<li><a href="<?php //echo Yii::app()->request->baseurl ."/uploads/test_forms/".$rec->test_application_form; ?>" download title="Download Application Form"><?php //echo isset($rec->test_title) ? $rec->test_title : ''; ?></a></li>
					
				</ul>
              
			</div>
			<div class="col-two">
				<h2 class="title3">Latest Results</h2>
                	
				<ul>
					<li><a href="<?php //echo Yii::app()->request->baseurl ."/uploads/test_forms/".$rec->test_application_form; ?>" download title="Download Application Form"><?php //echo isset($rec->test_title) ? $rec->test_title : ''; ?></a></li>
					
				</ul>
               
			</div>
			
			<div style="clear: both;">&nbsp;</div>
		</div>
	
