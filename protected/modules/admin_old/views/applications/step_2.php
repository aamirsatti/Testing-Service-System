 <style>
	th { width:20%;}
	.form-control { padding:5px 5px; height:30px;width:100%;}
	td { width:70px; }
</style>
 <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Application</h2>   
                        <h5> </h5>
                       
                    </div>
                </div>
                 <!-- /. ROW  -->
                 <hr />
               <div class="row">
              
                <div class="col-md-12">
                    <div class="row form-group" >
                            <div class="col-xs-12">
                                <ul class="nav nav-pills nav-justified thumbnail setup-panel">
                                    <li class="disabled"><a href="#step-1">
                                        <h4 class="list-group-item-heading" style="padding-top: 0px; ">Step 1</h4>
                                        <p class="list-group-item-text" style="padding-top: 0px; ">Personal Information</p>
                                    </a></li>
                                    <li class="active"><a href="#step-1">
                                        <h4 class="list-group-item-heading" style="padding-top: 0px; ">Step 2</h4>
                                        <p class="list-group-item-text" style="padding-top: 0px; ">Academic and Experience Information</p>
                                    </a></li>
                                    <li class="disabled"><a href="#step-3">
                                        <h4 class="list-group-item-heading" style="padding-top: 0px; ">Step 3</h4>
                                        <p class="list-group-item-text" style="padding-top: 0px; ">Post Applied For</p>
                                    </a></li>
                                    <!--<li class="disabled"><a href="#step-4">
                                        <h4 class="list-group-item-heading" style="padding-top: 0px; ">Step 4</h4>
                                        <p class="list-group-item-text" style="padding-top: 0px; ">Verify And Submit</p>
                                    </a></li>-->
                                </ul>
                            </div>
                     </div>
 <script>
 function edit_profile(val)
 {
	 if(val == 1)
	 {
	 	$('#edit_profile').show();
	 	$('#profile').hide();
	 }
	 else
	 {
		 $('#edit_profile').hide();
	 	 $('#profile').show();
	 }
 }
 function add_education(val)
 {
	 if(val == 1)
	 {
	 	$('#edit_education').show();
	 	$('#education').hide();
	 }
	 else
	 {
		 $('#edit_education').hide();
	 	 $('#education').show();
	 }
 }
 function edit_education(val, counter)
 {
	 if(val == 1)
	 {
	 	$('#edit_education_'+counter).show();
	 	//$('#education').hide();
	 }
	 else
	 {
		 $('#edit_education_'+counter).hide();
	 	// $('#education').show();
	 }
 }
 function add_cert(val)
 {
	 if(val == 1)
	 {
	 	$('#edit_cert').show();
	 	$('#cert').hide();
	 }
	 else
	 {
		 $('#edit_cert').hide();
	 	 $('#cert').show();
	 }
 }
 function edit_cert(val, counter)
 {
	 if(val == 1)
	 {
	 	$('#edit_cert_'+counter).show();
	 	//$('#education').hide();
	 }
	 else
	 {
		 $('#edit_cert_'+counter).hide();
	 	// $('#education').show();
	 }
 }
 </script>
  <div class="row">
       <?php if(Yii::app()->session['success']) {?>
         <div class="success" style="color:#090;margin-left:30%;"><?php echo Yii::app()->session['success']; Yii::app()->session['success'] = ''; ?></div>
       <?php } ?>  
      <div class="col-md-12" id="profile">
      <input type="button"  class="btn btn-primary" onclick="location.href='<?php echo Yii::app()->createurl('admin/applications/step_3/PCLTC/'.Yii::app()->request->getParam('PCLTC')); ?>'" value="Save & Continue Step 3" style="float:right;"><br/>
        <h2>Candidate Personal Info<small style="float:right;"><input type="button"  class="btn btn-primary" onclick="edit_profile(1)" value="Edit"></small></h2>
			<hr class="colorgraph">
            <table class=" table-condensed col-md-10">
              <tr>
                <th > Picture</th> 
			    <td colspan="3">
				     <?php if(isset($user_data->CanPic) && is_file(Yii::getPathOfAlias('webroot') ."/uploads/user_pic/thumb/".$user_data->CanPic)) { ?>
                              <img src="<?php echo Yii::app()->request->baseurl.'/uploads/user_pic/thumb/'.$user_data->CanPic;?>" alt="Texto Alternativo" class="img-circle img-thumbnail" style="width: 150px;border-radius: 0px;">
        			<?php }else{ ?>
                        	<img src="<?php echo Yii::app()->request->baseurl;?>/images/profile.gif" alt="Texto Alternativo" class="img-circle img-thumbnail" style="width: 150px;border-radius: 0px;">
                     <?php } ?> 
                </td>
              </td>  
			  <tr>
			    <th > First Name</th>
			    <td><?php echo isset($user_data->CanFirstName) ? $user_data->CanFirstName : '' ; ?> </td>
			 
			    <th > Last Name</th>
			    <td><?php echo isset($user_data->CanLastName) ? $user_data->CanLastName : '' ; ?></td>
			  </tr>
              <tr>
			    <th > Email</th>
			    <td> <?php echo isset($user_data->email) ? $user_data->email : '' ; ?></td>
			  
			    <th > CNIC</th>
			    <td><?php echo isset($user_data->CanCNIC) ? $user_data->CanCNIC : '' ; ?> </td>
			  </tr>
              <tr>
			    <th > Phone #</th>
			    <td> <?php echo isset($user_data->CanPhNo) ? $user_data->CanPhNo : '' ; ?></td>
			  
			    <th > Gender</th>
			    <td><?php echo isset($user_data->CanGender) ? ($user_data->CanGender == 1 ? 'Male' : 'Female') : '' ; ?></td>
			  </tr>
              <tr>
			    <th > Date of Birth</th>
			    <td><?php echo isset($user_data->CanDOB) ? date('d M, Y', strtotime($user_data->CanDOB)) : '' ; ?></td>
			 
			    <th > Postal Address</th>
			    <td><?php echo isset($user_data->CanPostalAdd) ? $user_data->CanPostalAdd : '' ; ?></td>
			  </tr>
              <tr>   
			    <th > City</th>
			    <td><?php echo isset($user_data->CanCity) ? date('d M, Y', strtotime($user_data->CanCity)) : '' ; ?></td>
			 
			    <th > District</th>
			    <td><?php echo isset($user_data->CanDistrict) ? $user_data->CanDistrict : '' ; ?></td>
			  </tr>
              <tr>
			    <th > Religion</th>
			    <td><?php echo isset($user_data->CanReligion) ? $user_data->CanReligion : '' ; ?></td>
			 
			    
			  </tr>
              
              <tr><td></td><td></td></tr>
              
             </table> 
    </div>          
    <div class="col-md-12" id="edit_profile" style="display:none;">
    	<form role="form" method="post" enctype="multipart/form-data" action="<?php echo Yii::app()->createurl('admin/applications/Update_profile'); ?>">
			<h2>Personal Information.<small></small></h2>
			<hr class="colorgraph">
              
              <table class=" table-condensed col-md-8">
			  <tr>
			    <th > First Name</th>
			    <td> <input type="text" name="first_name" required="required" id="first_name" class="form-control" placeholder="" tabindex="1" value="<?php echo isset($user_data->CanFirstName) ? $user_data->CanFirstName : '' ; ?>"></td>
			  </tr>	
              <tr>
			    <th > Last Name</th>
			    <td> <input type="text" name="last_name" required  class="form-control" placeholder="" value="<?php echo isset($user_data->CanLastName) ? $user_data->CanLastName : '' ; ?>"></td>
			  </tr>
              <tr>
			    <th > Email</th>
			    <td> <input type="text" name="email" readonly="readonly"  class="form-control" placeholder="" value="<?php echo isset($user_data->email) ? $user_data->email : '' ; ?>"></td>
			  </tr>
              <tr>
			    <th > CNIC</th>
			    <td> <input type="text" name="cnic" readonly="readonly"  class="form-control " placeholder="" value="<?php echo isset($user_data->CanCNIC) ? $user_data->CanCNIC : '' ; ?> "></td>
			  </tr>
              <tr>
			    <th > Phone #</th>
			    <td> <input type="text" name="phone" required class="form-control " placeholder="" value="<?php echo isset($user_data->CanPhNo) ? $user_data->CanPhNo : '' ; ?>"></td>
			  </tr>
              <tr>
			    <th > Gender</th>
			    <td><select class="form-control" name="gender">
						   <option value="1" <?php if(isset($user_data->CanGender) && $user_data->CanGender == 1) echo 'selected';?>>Male</option>
						   <option value="2" <?php if(isset($user_data->CanGender) && $user_data->CanGender == 2) echo 'selected';?>>Female</option>
						</select>  
                </td>
			  </tr>
              <tr>
			    <th > Date of Birth</th>
			    <td><input type="date" name="date_of_birth" required id="first_name" class="form-control " placeholder="" value="<?php echo isset($user_data->CanDOB) ? $user_data->CanDOB : '' ; ?>"></td>
			  </tr> 
			  <tr>
			    <th > Religion</th>
			    <td><select class="form-control" name="religion">
                       <option value="Islam" <?php if(isset($user_data->CanReligion) && $user_data->CanReligion == 'Islam') echo 'selected';?>>Islam</option>
                       <option value="Christian" <?php if(isset($user_data->CanReligion) && $user_data->CanReligion == 'Christian') echo 'selected';?>>Christian</option>
                       <option value="Hindu" <?php if(isset($user_data->CanReligion) && $user_data->CanReligion == 'Hindu') echo 'selected';?>>Hindu</option>
                       <option value="Other" <?php if(isset($user_data->CanReligion) && $user_data->CanReligion == 'Other') echo 'selected';?>>Other</option>
                    </select>  
                </td>
			  </tr>
              <tr>
			    <th >Change Picture</th>
			    <td><input type="file" name="image"   class="form-control" placeholder="" tabindex="1">
                    <input type="hidden" name="prev_image" value="<?php echo isset($user_data->CanPic) ? $user_data->CanPic : '' ; ?>" /> 
                </td>
			  </tr>
              <tr><td></td><td></td></tr>
              <tr>
			    <th > </th>
			    <td>
                <input type="hidden" name="profile" value="1" />
                <input type="submit"  class="btn btn-primary " value="Update"> &nbsp;&nbsp;
                <input type="button"  class="btn btn-default" onclick="edit_profile(2)" value="Cancel"></td>
			  </tr>
             </table> 
             <div style="clear:both;"></div>
            <br /> 
            
		
			<hr class="colorgraph">
			
		</form>
	</div>
</div>

  <div class="row">
      <div class="col-md-12" id="education">
        <h2>Education<small style="float:right;"><input type="button"  class="btn btn-primary" onclick="add_education(1)" value="Add"></small></h2>
			<hr class="colorgraph">
            <table class="table table-condensed table-striped table-bordered">
                 <tr>
                    <th>Degree Title</th>
                    <th>Major Subjects</th>
                    <th>Board / University</th>
                    <th>Obtained Marks / CGPA</th>
                    <th>Total Marks / CGPA</th>
                    <th>Passing Year</th>
                    <th></th>
                  </tr> 
			  <?php $counter = 1;
			  if(!empty($user_data->academicinfos)) {
			  foreach($user_data->academicinfos as $rec) { ?>
                  <tr>
                    <td ><?php echo isset($rec->DegreeTitle) ? $rec->DegreeTitle : '' ; ?> </td>
                    <td><?php echo isset($rec->MajorSubject) ? $rec->MajorSubject : '' ; ?></td>
                    <td> <?php echo isset($rec->BoardUniversity) ? $rec->BoardUniversity : '' ; ?></td>
                    <td> <?php echo isset($rec->ObtainedMarks) ? $rec->ObtainedMarks : '' ; ?></td>
                  
                    <td><?php echo isset($rec->TotalMarks) ? $rec->TotalMarks : '' ; ?></td>
                    <td><?php echo isset($rec->YearPassing) ? $rec->YearPassing : '' ; ?> </td>
                    <td style="float:right;">
                       <a href="javascript:void(0);" onclick="edit_education(1, '<?php echo $counter; ?>')"><span class="glyphicon glyphicon-pencil" ></span></a>&nbsp;&nbsp;
                       <a href="javascript:void(0);" title="popup" data-toggle="modal" data-target="#myModal" onclick="del_record('<?php echo Yii::app()->createurl('user/site/del_academic/id/'.base64_encode($rec->AcademicID)); ?>');"><span class="glyphicon glyphicon-trash" ></span></a>
                    </td>
                  </tr>
                  
                  <tr><td colspan="7"><hr />
                         <div class="col-md-12" id="edit_education_<?php echo $counter; ?>" style="display:none;">
                                <form role="form" method="post" enctype="multipart/form-data" action="<?php echo Yii::app()->createurl('admin/applications/update_academic'); ?>">
                                    <h2>Edit Educational Record<small></small></h2>
                                    <hr class="colorgraph">
                                     
                                      <table class=" table-condensed col-md-8">
                                      <tr>
                                        <th > Degree Title</th>
                                        <td> 
                                           <select name="deg_title" id="deg_title<?php echo $counter; ?>" class="form-control ">
                                               <option value="" rel="">- Select Degree Level -</option>
                                               <option value="Non-Matriculation" rel="Non-Matriculation">Non-Matriculation</option>
                                               <option value="Matriculation" rel="Matriculation">Matriculation/O-Level</option>
                                               <option value="Intermediate" rel="Intermediate">Intermediate/A-Level</option>
                                               <option value="Bachelors" rel="Bachelors">Bachelors</option>
                                               <option value="Masters" rel="Masters">Masters</option>
                                               <option value="MPhil" rel="MPhil">MPhil/MS</option>
                                               <option value="Doctorate" rel="Doctorate">PHD/Doctorate</option>
                                               <option value="Certificate" rel="Certificate">Certification</option>
                                               <option value="Diploma" rel="Diploma">Diploma</option>
                                               <option value="Short Course" rel="Short Course">Short Course</option>              
                                          </select>
                                        </td>
                                      </tr>	
                                      <tr>
                                        <th > Major Subjects</th>
                                        <td> <input type="text" name="maj_sub" required  class="form-control" placeholder="" value="<?php echo isset($rec->MajorSubject) ? $rec->MajorSubject : '' ; ?>"></td>
                                      </tr>
                                      <tr>
                                        <th > Board / University</th>
                                        <td> <input type="text" name="b_uni" required class="form-control" placeholder="" value="<?php echo isset($rec->BoardUniversity) ? $rec->BoardUniversity : '' ; ?>"></td>
                                      </tr>
                                      <tr>
                                        <th > Passing Year</th>
                                        <td> 
                                           <select name="pass_yr" id="txtDegree" class="form-control ">
                                               <option value="" rel="">- Select Passing Year -</option>
                                               <?php $i = 1960;
                                               while($i <= 2015)
                                               { ?>
                                                    <option value="<?php echo $i; ?>" <?php if(isset($rec->YearPassing) && $i == $rec->YearPassing) echo 'selected'; ?>><?php echo $i; ?></option>
                                               <?php 
                                                $i++;
                                               }
                                               ?>
                                          </select>
                                       </td>
                                      </tr>
                                      <tr> 
                                        <th > Obtained Marks / CGPA </th>
                                        <td> <input type="text" name="obt_marks" required class="form-control " placeholder="" value="<?php echo isset($rec->ObtainedMarks) ? $rec->ObtainedMarks : '' ; ?>"></td>
                                      </tr>
                                      <tr>
                                        <th > Total Marks / CGPA </th>
                                        <td> <input type="text" name="total_marks" required class="form-control " placeholder="" value="<?php echo isset($rec->TotalMarks) ? $rec->TotalMarks : '' ; ?>"></td>
                                      </tr>  
                                       <tr><td></td><td></td></tr>
                                      <tr>
                                        <th > </th>
                                        <td>
                                        <input type="hidden" name="edit_academic" value="<?php echo isset($rec->AcademicID) ? base64_encode($rec->AcademicID) : '' ; ?>" />
                                        <input type="submit"  class="btn btn-primary " value="Submit"> &nbsp;&nbsp;
                                        <input type="button"  class="btn btn-default" onclick="edit_education(2, '<?php echo $counter; ?>')" value="Cancel"></td>
                                      </tr>
                                     </table> 
                                     <script>
                                       $('#deg_title<?php echo $counter; ?>').val('<?php echo isset($rec->DegreeTitle) ? $rec->DegreeTitle : '' ; ?>');
                                     </script>
                                     <div style="clear:both;"></div>
                                    <br /> 
                                    <hr class="colorgraph">
                                </form>
                            </div>
                  </td></tr>
               <?php $counter++; }
			  } ?>
             </table> 
    </div>          
    <div class="col-md-12" id="edit_education" style="display:none;">
    	<form role="form" method="post" enctype="multipart/form-data" action="<?php echo Yii::app()->createurl('admin/applications/update_academic'); ?>">
			<h2>Educational Record<small></small></h2>
			<hr class="colorgraph">
             
              <table class=" table-condensed col-md-8">
			  <tr>
			    <th > Degree Titlee</th>
			    <td> 
                   <select name="deg_title" id="deg_title" class="form-control ">
              		   <option value="" rel="">- Select Degree Level -</option>
			  		   <option value="Non-Matriculation" rel="Non-Matriculation">Non-Matriculation</option>
                       <option value="Matriculation" rel="Matriculation">Matriculation/O-Level</option>
                       <option value="Intermediate" rel="Intermediate">Intermediate/A-Level</option>
                       <option value="Bachelors" rel="Bachelors">Bachelors</option>
                       <option value="Masters" rel="Masters">Masters</option>
                       <option value="MPhil" rel="MPhil">MPhil/MS</option>
                       <option value="Doctorate" rel="Doctorate">PHD/Doctorate</option>
                       <option value="Certificate" rel="Certificate">Certification</option>
                       <option value="Diploma" rel="Diploma">Diploma</option>
                       <option value="Short Course" rel="Short Course">Short Course</option>              
                  </select>
                </td>
			  </tr>	
              <tr>
			    <th > Major Subjects</th>
			    <td> <input type="text" name="maj_sub" required  class="form-control" placeholder="" value="<?php echo isset($user_data->MajorSubject) ? $user_data->MajorSubject : '' ; ?>"></td>
			  </tr>
              <tr>
			    <th > Board / University</th>
			    <td> <input type="text" name="b_uni" required class="form-control" placeholder="" value="<?php echo isset($user_data->BoardUniversity) ? $user_data->BoardUniversity : '' ; ?>"></td>
			  </tr>
              <tr>
			    <th > Passing Year</th>
			    <td> 
                   <select name="pass_yr" id="txtDegree" class="form-control ">
              		   <option value="" rel="">- Select Passing Year -</option>
                       <?php $i = 1960;
					   while($i <= 2015)
					   { ?>
			  		   		<option value="<?php echo $i; ?>" <?php if(isset($user_data->YearPassing) && $i == $user_data->YearPassing) echo 'selected'; ?>><?php echo $i; ?></option>
                       <?php 
					    $i++;
					   }
					   ?>
                  </select>
               </td>
			  </tr>
              <tr> 
			    <th > Obtained Marks / CGPA </th>
			    <td> <input type="text" name="obt_marks" required class="form-control " placeholder="" value="<?php echo isset($user_data->ObtainedMarks) ? $user_data->ObtainedMarks : '' ; ?>"></td>
			  </tr>
              <tr>
			    <th > Total Marks / CGPA </th>
			    <td> <input type="text" name="total_marks" required class="form-control " placeholder="" value="<?php echo isset($user_data->TotalMarks) ? $user_data->TotalMarks : '' ; ?>"></td>
			  </tr>  
              
			  
              <tr><td></td><td></td></tr>
              <tr>
			    <th > </th>
			    <td>
                <input type="hidden" name="academic" value="1" />
                <input type="submit"  class="btn btn-primary " value="Submit"> &nbsp;&nbsp;
                <input type="button"  class="btn btn-default" onclick="add_education(2)" value="Cancel"></td>
			  </tr>
             </table> 
             <script>
			   $('#deg_title').val('<?php echo isset($user_data->DegreeTitle) ? $user_data->DegreeTitle : '' ; ?>');
			 </script>
             <div style="clear:both;"></div>
            <br /> 
            <hr class="colorgraph">
			
		</form>
	</div>
</div> 

  <div class="row">
      <div class="col-md-12" id="education">
        <h2>Certification<small style="float:right;"><input type="button"  class="btn btn-primary" onclick="add_cert(1)" value="Add"></small></h2>
			<hr class="colorgraph">
            <table class="table table-condensed table-striped table-bordered">
                  <tr>
                    <th>Certificate Name</th>
                    <th>Institute</th>
                    <th>Starting Date</th>
                    <th>Ending Date</th>
                    <th>Grade</th>
                    <th>Certified By</th>
                    <th></th>
                  </tr>
			  <?php $counter = 1;
			  if(!empty($user_data->certificatedetails)){
			  foreach($user_data->certificatedetails as $rec) { ?>
                  <tr> 
                    <td ><?php echo isset($rec->CertName) ? $rec->CertName : '' ; ?> </td>
                    
                    <td><?php echo isset($rec->CertInstitute) ? $rec->CertInstitute : '' ; ?></td>
                    <td> <?php echo isset($rec->CertFrom) ? date('d M, Y', strtotime($rec->CertFrom )) : ''; ?></td>
                  
                    <td><?php echo isset($rec->CertTo) ? date('d M, Y', strtotime($rec->CertTo)) : '' ; ?> </td>
                    <td><?php echo isset($rec->CertGrade) ? $rec->CertGrade : '' ; ?></td>
                    <td><?php echo isset($rec->CertCertifiedBy) ? $rec->CertCertifiedBy : '' ; ?></td>
                    <td >
                       <a href="javascript:void(0);" onclick="edit_cert(1, '<?php echo $counter; ?>')"><span class="glyphicon glyphicon-pencil" ></span></a>
                       <a href="javascript:void(0);" title="popup" data-toggle="modal" data-target="#myModal" onclick="del_record('<?php echo Yii::app()->createurl('user/site/del_certificate/id/'.base64_encode($rec->CertID)); ?>');"><span class="glyphicon glyphicon-trash" ></span></a>
                    </td>
                  </tr>
                  
                  <tr><td colspan="7"><hr />
                         <div class="col-md-12" id="edit_cert_<?php echo $counter; ?>" style="display:none;">
                                <form role="form" method="post" enctype="multipart/form-data" action="<?php echo Yii::app()->createurl('admin/applications/update_certificate'); ?>">
                                    <h2>Edit Certification Record<small></small></h2>
                                    <hr class="colorgraph">
                                     
                                      <table class=" table-condensed col-md-8">
                                      <tr>
                                        <th > Certificate Name</th>
                                        <td><input type="text" name="c_name" required class="form-control " placeholder="" value="<?php echo isset($rec->CertName) ? $rec->CertName : '' ; ?>"></td>
                                      </tr>	
                                      <tr>
                                        <th > Institute</th>
                                        <td> <input type="text" name="c_institute" required  class="form-control" placeholder="" value="<?php echo isset($rec->CertInstitute) ? $rec->CertInstitute : '' ; ?>"></td>
                                      </tr>
                                      <tr>
                                        <th >Starting Date</th>
                                        <td> <input type="date" name="c_start_date" required class="form-control" placeholder="" value="<?php echo isset($rec->CertFrom) ? $rec->CertFrom : '' ; ?>"></td>
                                      </tr>
                                      <tr>
                                        <th > Ending Date</th>
                                        <td><input type="date" name="c_end_date" required class="form-control " placeholder="" value="<?php echo isset($rec->CertTo) ? $rec->CertTo : '' ; ?>"></td>
                                      </tr>
                                      <tr> 
                                        <th > Grade </th>
                                        <td> <input type="text" name="c_grade" required class="form-control " placeholder="" value="<?php echo isset($rec->CertGrade) ? $rec->CertGrade : '' ; ?>"></td>
                                      </tr>
                                      <tr>
                                        <th >Certified By</th>
                                        <td> <input type="text" name="c_certified" required class="form-control " placeholder="" value="<?php echo isset($rec->CertCertifiedBy) ? $rec->CertCertifiedBy : '' ; ?>"></td>
                                      </tr>  
                                       <tr><td></td><td></td></tr>
                                      <tr>
                                        <th > </th>
                                        <td>
                                        <input type="hidden" name="edit_Cert" value="<?php echo isset($rec->CertID) ? base64_encode($rec->CertID) : '' ; ?>" />
                                        <input type="submit"  class="btn btn-primary " value="Submit"> &nbsp;&nbsp;
                                        <input type="button"  class="btn btn-default" onclick="edit_cert(2, '<?php echo $counter; ?>')" value="Cancel"></td>
                                      </tr>
                                     </table> 
                                     
                                     <div style="clear:both;"></div>
                                    <br /> 
                                    <hr class="colorgraph">
                                </form>
                            </div>
                  </td></tr>
               <?php $counter++; }
			  }?>
             </table> 
    </div>          
    <div class="col-md-12" id="edit_cert" style="display:none;">
    	<form role="form" method="post" enctype="multipart/form-data" action="<?php echo Yii::app()->createurl('admin/applications/update_certificate'); ?>">
			<h2>Certification Record<small></small></h2>
			<hr class="colorgraph">
             
              <table class=" table-condensed col-md-8">
                  <tr>
                    <th > Certificate Name</th>
                    <td><input type="text" name="c_name" required class="form-control " placeholder="" value=""></td>
                  </tr>	
                  <tr>
                    <th > Institute</th>
                    <td> <input type="text" name="c_institute" required  class="form-control" placeholder="" value=""></td>
                  </tr>
                  <tr>
                    <th >Starting Date</th>
                    <td> <input type="date" name="c_start_date" required class="form-control" placeholder="" value=""></td>
                  </tr>
                  <tr>
                    <th > Ending Date</th>
                    <td><input type="date" name="c_end_date" required class="form-control " placeholder="" value=""></td>
                  </tr>
                  <tr> 
                    <th > Grade </th>
                    <td> <input type="text" name="c_grade" required class="form-control " placeholder="" value=""></td>
                  </tr>
                  <tr>
                    <th >Certified By</th>
                    <td> <input type="text" name="c_certified" required class="form-control " placeholder="" value=""></td>
                  </tr>  
                   <tr><td></td><td></td></tr>
                  <tr>
                    <th > </th>
                    <td>
                    <input type="hidden" name="Cert" value="1" />
                    <input type="submit"  class="btn btn-primary " value="Submit"> &nbsp;&nbsp;
                    <input type="button"  class="btn btn-default" onclick="add_cert(2)" value="Cancel"></td>
                  </tr>
                 </table> 
             
             <div style="clear:both;"></div>
            <br /> 
            <hr class="colorgraph">
			
		</form>
	</div>
</div>
<script>
var del_url = '';
function del_record(url)
{
	del_url = url;
}
function del_confirm()
{
	window.location = del_url;
}
</script>

<!-- Modal -->
       <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header" style="background-color: rgba(204, 201, 201, 0.62);padding: 3px 10px;">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true" onclick="close_popup()">&times;</button>
                        <h4 class="modal-title" id="myModalLabel" >Delete</h4>
                    </div>
                    <div class="modal-body" style="padding: 5px; padding-left:10px;">
                         <p> Are You sure, You want to delete ?</p>
                    </div>
                    <div class="modal-footer" style="margin-top: 0px;padding: 5px;">
                        <button type="button" class="btn btn-primary" onclick="del_confirm();" data-dismiss="modal">Yes</button> 
                        <button type="button" class="btn btn-default" onclick="close_popup()" data-dismiss="modal">No</button>
                        
                    </div>
                </div>
            </div>
        </div>
<!-- /.modal -->
</div>
        </div>
     </div>       
</div>