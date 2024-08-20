<div id="content">


<div id="page-heading"><h1>Add product</h1></div>


<table border="0" width="100%" cellpadding="0" cellspacing="0" id="content-table">
<tr>
	<th rowspan="3" class="sized"><img src="<?php echo Yii::app()->request->baseurl;?>/resources/admin/images/shared/side_shadowleft.jpg" width="20" height="300" alt="" /></th>
	<th class="topleft"></th>
	<td id="tbl-border-top">&nbsp;</td>
	<th class="topright"></th>
	<th rowspan="3" class="sized"><img src="<?php echo Yii::app()->request->baseurl;?>/resources/admin/images/shared/side_shadowright.jpg" width="20" height="300" alt="" /></th>
</tr>
<tr>
	<td id="tbl-border-left"></td>
	<td>
	<!--  start content-table-inner -->
	<div id="content-table-inner">
	
	<table border="0" width="100%" cellpadding="0" cellspacing="0">
	<tr valign="top">
	<td>
	
	
		<!--  start step-holder -->
		<div id="step-holder">
			<div class="<?php if(Yii::app()->session['test_data'] == '') echo 'step-no'; else echo 'step-no-off';?>">1</div>
			<div class="<?php if(Yii::app()->session['test_data'] == '') echo 'step-dark-left'; else echo 'step-light-left';?>"><a href="">Add Test details</a></div>
			<div class="<?php if(Yii::app()->session['test_data'] == '') echo 'step-dark-right'; else echo 'step-light-right'; ?>">&nbsp;</div>
			<div class="<?php if(Yii::app()->session['test_data']) echo 'step-no'; else echo 'step-no-off';?>">2</div>
			<div class="<?php if(Yii::app()->session['test_data']) echo 'step-dark-left'; else echo 'step-light-left';?>">Select related products</div>
			<div class="<?php if(Yii::app()->session['test_data']) echo 'step-dark-right'; else echo 'step-light-right'; ?>">&nbsp;</div>
			<div class="step-no-off">3</div>
			<div class="step-light-left">Preview</div>
			<div class="step-light-round">&nbsp;</div>
			<div class="clear"></div>
		</div>
		<!--  end step-holder -->
	
		<!-- start id-form -->
        <form action="" method="post" enctype="multipart/form-data">
		<table border="0" cellpadding="0" cellspacing="0"  id="id-form">
		<tr>
			<th valign="top">Test Title</th>
			<td><input type="text" class="inp-form" name="test_title" required /></td>
			<td></td> 
		</tr>
		
		
		
        <tr>
            <th valign="top">Description:</th>
            <td><textarea rows="" cols="" id="detail" class="form-textarea" name="test_detail" required></textarea></td>
            <td></td>
        </tr>
        <?php
				   // Make sure you are using correct paths here.
					
			$ckeditor = new CKEditor();
			$ckeditor->basePath = Yii::app()->request->baseurl.'/resources/Ckeditor/ckeditor/';
			$ckfinder = new CKFinder();
			$ckfinder->BasePath = Yii::app()->request->baseurl.'/resources/Ckeditor/ckfinder/'; // Note: the BasePath property in the CKFinder class starts with a capital letter.
                 $ckeditor->config['height'] = 500;
			$ckfinder->SetupCKEditorObject($ckeditor);
			
			$ckeditor->replace("detail");
                        
					
		?>
        <tr>
            <th valign="top">Status</th>
            <td><input type="radio" class="inp-form" name="status" required/>Active</td>
            <td><input type="radio" class="inp-form" name="status" required/>Inactive</td>
        </tr>
        
	
        
     
        <tr>
            <th>&nbsp;</th>
            <td valign="top">
                <input type="hidden" name="test_data" value="1" />
                <input type="submit" value="" class="form-submit" />
                <input type="reset" value="" class="form-reset"  />
            </td>
            <td></td>
        </tr>
        </table>
        <!-- end id-form  -->
        </form>
        </td>
        <td>
    
        <!--  start related-activities -->
        <div id="related-activities">
            
            <!--  start related-act-top -->
            <div id="related-act-top">
            <img src="<?php echo Yii::app()->request->baseurl;?>/resources/admin/images/forms/header_related_act.gif" width="271" height="43" alt="" />
            </div>
            <!-- end related-act-top -->
            
            <!--  start related-act-bottom -->
        <?php /* ?>    <div id="related-act-bottom">
            
                <!--  start related-act-inner -->
                <div id="related-act-inner">
                
                    <div class="left"><a href=""><img src="<?php echo Yii::app()->request->baseurl;?>/resources/admin/images/forms/icon_plus.gif" width="21" height="21" alt="" /></a></div>
                    <div class="right">
                        <h5>Add another product</h5>
                        Lorem ipsum dolor sit amet consectetur
                        adipisicing elitsed do eiusmod tempor.
                        <ul class="greyarrow">
                            <li><a href="">Click here to visit</a></li> 
                            <li><a href="">Click here to visit</a> </li>
                        </ul>
                    </div>
                    
                    <div class="clear"></div>
                    <div class="lines-dotted-short"></div>
                    
                    <div class="left"><a href=""><img src="<?php echo Yii::app()->request->baseurl;?>/resources/admin/images/forms/icon_minus.gif" width="21" height="21" alt="" /></a></div>
                    <div class="right">
                        <h5>Delete products</h5>
                        Lorem ipsum dolor sit amet consectetur
                        adipisicing elitsed do eiusmod tempor.
                        <ul class="greyarrow">
                            <li><a href="">Click here to visit</a></li> 
                            <li><a href="">Click here to visit</a> </li>
                        </ul>
                    </div>
                    
                    <div class="clear"></div>
                    <div class="lines-dotted-short"></div>
                    
                    <div class="left"><a href=""><img src="<?php echo Yii::app()->request->baseurl;?>/resources/admin/images/forms/icon_edit.gif" width="21" height="21" alt="" /></a></div>
                    <div class="right">
                        <h5>Edit categories</h5>
                        Lorem ipsum dolor sit amet consectetur
                        adipisicing elitsed do eiusmod tempor.
                        <ul class="greyarrow">
                            <li><a href="">Click here to visit</a></li> 
                            <li><a href="">Click here to visit</a> </li>
                        </ul>
                    </div>
                    <div class="clear"></div>
                    
                </div>
                <!-- end related-act-inner -->
                <div class="clear"></div>
            
            </div>  <?php */ ?>
            <!-- end related-act-bottom -->
        
        </div>
        <!-- end related-activities -->
    
    </td>
    </tr>
    <tr>
    <td><img src="<?php echo Yii::app()->request->baseurl;?>/resources/admin/images/shared/blank.gif" width="695" height="1" alt="blank" /></td>
    <td></td>
    </tr>
    </table>
     
    <div class="clear"></div>
     
    
    </div>
    <!--  end content-table-inner  -->
    </td>
    <td id="tbl-border-right"></td>
    </tr>
    <tr>
        <th class="sized bottomleft"></th>
        <td id="tbl-border-bottom">&nbsp;</td>
        <th class="sized bottomright"></th>
    </tr>
    </table>
    
    
    <div class="clear">&nbsp;</div>
    
    </div>