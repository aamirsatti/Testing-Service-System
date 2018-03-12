    <style>
    .help-block{color:red;}
    .form-group img { width: 150px; height: 100px;}

    </style> 
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Post</h2>   
                        <h5> </h5>
                       
                    </div>
                </div>
                 <!-- /. ROW  -->
                 <hr />
               <div class="row">
                <div class="col-md-12">
                    <!-- Form Elements -->
                    <?php if(Yii::app()->session['success'] != ''){ ?>
                    <div style="background-color:#B0F3B0;padding:6px;" id="p_sucess"><?php echo Yii::app()->session['success']; ?></div>
                    <?php Yii::app()->session['success'] = ''; } ?>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           Add Post
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-8">
                                    <h3></h3>   
                                    <form role="form" method="post" enctype="multipart/form-data">  
                                        <div class="form-group">
                                            <label>Select Organization</label> 
                                            <select class="form-control" name="org">
                                              <?php if(!empty($org)) {
                                                 foreach($org as $rec) { ?>
                                                    <option value="<?php echo $rec->OrgID; ?>" <?php if(isset($post->OrgID) && $post->OrgID == $rec->OrgID) echo 'selected'; ?>><?php echo $rec->OrgName;?></option>
                                              <?php } } ?>      
                                              
                                            </select>  
                                            <sapn class="help-block" id="subject_error"></sapn>
                                        </div>      
                                        <div class="form-group">
                                            <label>Post Name</label>        
                                            <input class="form-control" name="name" id="title" required value="<?php echo isset($post->PostName) ? $post->PostName : ''; ?>"/>
                                            <sapn class="help-block" id="title_error"></sapn>
                                        </div>
                                        <div class="form-group">
                                            <label>Post Grade</label> 
                                            <input class="form-control" name="grade" id="title" required value="<?php echo isset($post->PostGrade) ? $post->PostGrade : 'BPS'; ?>"/> 
                                            <sapn class="help-block" id="subject_error"></sapn>
                                        </div>
                                        <div class="form-group">
                                            <label>Total Positions</label> 
                                            <input type="number" class="form-control" name="total_posst" required value="<?php echo isset($post->total_posts) ? $post->total_posts : 1; ?>"/> 
                                            <sapn class="help-block" id="subject_error"></sapn>
                                        </div>
                                        <div class="form-group"> 
                                            <label>Required Qualification</label> 
                                            <input class="form-control" name="qualification" id="title"  value="<?php echo isset($post->req_qualification) ? $post->req_qualification : ''; ?>"/> 
                                            <sapn class="help-block" id="subject_error"></sapn>
                                        </div>
                                        <div class="form-group">
                                            <label>Required Experience</label> 
                                            <input class="form-control" name="education" id="title"  value="<?php echo isset($post->req_experience) ? $post->req_experience : ''; ?>"/> 
                                            <sapn class="help-block" id="subject_error"></sapn>
                                        </div>
                                        <?php if(!empty($post->locations))
										      {
												  foreach($post->locations as $quota)
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
												 
											  }//$punjab = $post->locations-> ?>
                                        <div class="form-group">
                                            <label>Test Quota :</label>   &nbsp;&nbsp; 
                                            <input type="radio"  name="test_quota"  id="test_quota" onclick="test_quota_fund(1)" value="1"/> Yes
                                            &nbsp;&nbsp; 
                                            <input type="radio"  name="test_quota"  id=""  onclick="test_quota_fund(0)" value="0"/> No
                                            <sapn class="help-block" id="subject_error"></sapn>
                                        </div>
                                        <div class="form-group" id="test_quota_area" style="display:none;">
                                            
                                            <table cellpadding="4" cellspacing="4">
                                              <tr>
                                                <th> <label>Province</label>  &nbsp;&nbsp;</th><th align="center"> Quota</th>
                                              </tr>
                                              <tr>
                                                <td> Punjab: &nbsp;&nbsp;</td><td> <input type="number" class="form-control"  name="quota[punjab]" value="<?php echo isset($punjab) ? $punjab : 0;?>" /></td>
                                              </tr>
                                              <tr>
                                                <td> Sindh: &nbsp;&nbsp;</td><td> <input type="number" class="form-control"  name="quota[sindh]" value="<?php echo isset($sindh) ? $sindh : 0;?>" /></td>
                                              </tr>
                                              <tr>
                                                <td> Balochistan: &nbsp;&nbsp;</td><td> <input type="number" class="form-control"  name="quota[balochistan]" value="<?php echo isset($balochistan) ? $balochistan : 0;?>" /></td>
                                              </tr>
                                              <tr>
                                                <td> KPK: &nbsp;&nbsp;</td><td> <input type="number" class="form-control"  name="quota[kpk]" value="<?php echo isset($kpk) ? $kpk : 0;?>" /></td>
                                              </tr>
                                            </table>    
                                            <sapn class="help-block" id="subject_error"></sapn>
                                        </div>
                                        <div class="form-group">
                                            <label>Test Fee</label> 
                                            <input class="form-control" name="fee" id="title" required value="<?php echo isset($post->PostAmount) ? $post->PostAmount : ''; ?>"/> 
                                            <sapn class="help-block" id="subject_error"></sapn>
                                        </div>
                                        <input type="hidden" class="form-control" name="test_data" value="1"  />
                                        <button type="submit" class="btn btn-primary" onclick="return email_templates()">Update</button>
                                        <button type="reset" class="btn btn-default" onclick="location.href='<?php echo Yii::app()->createurl('admin/post/list'); ?>'">Back</button>

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
	function test_quota_fund(val)
	{ 
		if(val == 1)
		{
			$('#test_quota_area').show();
		}
		else if(val == 0)
		{
			$('#test_quota_area').hide();
		}
	}
	<?php if(!empty($post->locations)){ ?>
	     test_quota_fund(1);
		 $('#test_quota').trigger('click');
	<?php } ?>	 
    </script>
         
    