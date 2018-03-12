<!-- start content -->
<div id="content">

	<!--  start page-heading -->
	<div id="page-heading">
		<h1>Add product</h1>
	</div>
	<!-- end page-heading -->

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
		<!--  start content-table-inner ...................................................................... START -->
		<div id="content-table-inner">
		
			<!--  start table-content  -->
			<div id="table-content">
			
				<!--  start message-yellow -->
				<div id="message-yellow" style="display:none;">
				<table border="0" width="100%" cellpadding="0" cellspacing="0">
				<tr>
					<td class="yellow-left">You have a new message. <a href="">Go to Inbox.</a></td>
					<td class="yellow-right"><a class="close-yellow"><img src="<?php echo Yii::app()->request->baseurl;?>/resources/admin/images/table/icon_close_yellow.gif"   alt="" /></a></td>
				</tr>
				</table>
				</div>
				<!--  end message-yellow -->
				
				<!--  start message-red -->
				<div id="message-red" style="display:none;">
				<table border="0" width="100%" cellpadding="0" cellspacing="0">
				<tr>
					<td class="red-left">Error. <a href="">Please try again.</a></td>
					<td class="red-right"><a class="close-red"><img src="<?php echo Yii::app()->request->baseurl;?>/resources/admin/images/table/icon_close_red.gif"   alt="" /></a></td>
				</tr>
				</table>
				</div>
				<!--  end message-red -->
				
				<!--  start message-blue -->
				<div id="message-blue" style="display:none;">
				<table border="0" width="100%" cellpadding="0" cellspacing="0">
				<tr>
					<td class="blue-left">Welcome back. <a href="">View my account.</a> </td>
					<td class="blue-right"><a class="close-blue"><img src="<?php echo Yii::app()->request->baseurl;?>/resources/admin/images/table/icon_close_blue.gif"   alt="" /></a></td>
				</tr>
				</table>
				</div>
				<!--  end message-blue -->
			
				<!--  start message-green -->
                <?php if(Yii::app()->session['success']){ ?>
				<div id="message-green">
				<table border="0" width="100%" cellpadding="0" cellspacing="0">
				<tr>
					<td class="green-left"><?php echo Yii::app()->session['success']; ?></td>
					<td class="green-right"><a class="close-green"><img src="<?php echo Yii::app()->request->baseurl;?>/resources/admin/images/table/icon_close_green.gif"   alt="" /></a></td>
				</tr>
				</table>
				</div>
                <?php Yii::app()->session['success'] = ''; 
				}
				?>
				<!--  end message-green -->
		
		 
				<!--  start product-table ..................................................................................... -->
				<form id="mainform" action="">
				<table border="0" width="100%" cellpadding="0" cellspacing="0" id="product-table">
				<tr>
					<th class="table-header-check"><a id="toggle-all" ></a> </th>
					<th class="table-header-repeat line-left minwidth-1"><a href="">Test Title</a>	</th>
					<th class="table-header-repeat line-left minwidth-1"><a href="">Test Date</a></th>
					<th class="table-header-repeat line-left"><a href="">Test Fee</a></th>
					<th class="table-header-repeat line-left minwidth-1"><a href="">Last Date for Apply</a></th>
					<th class="table-header-repeat line-left"><a href="">Application Form</a></th>
					<th class="table-header-options line-left"><a href="">Options</a></th>
				</tr>
                <?php 
				if(!empty($test_data))
				{
					foreach($test_data as $rec)
					{
				?>		    
                    <tr>
                        <td><input  type="checkbox"/></td>
                        <td><?php echo isset($rec->test_title) ? $rec->test_title : ''; ?></td>
                        <td><?php echo isset($rec->test_date) ? date('d M, Y', strtotime($rec->test_date)) : ''; ?></td>
                        <td><?php echo isset($rec->test_fee) ? $rec->test_fee : ''; ?></td>
                        <td><?php echo isset($rec->last_date_apply) ? date('d M, Y', strtotime($rec->last_date_apply)) : ''; ?></td>
                        <td><a href="<?php echo Yii::app()->request->baseurl ."/uploads/test_forms/".$rec->test_application_form; ?>" download>Download</a></td>
                        <td class="options-width">
                        <a href="" title="Edit" class="icon-1 info-tooltip"></a>
                        <a href="" title="Edit" class="icon-2 info-tooltip"></a>
                        <a href="" title="Edit" class="icon-3 info-tooltip"></a>
                        <a href="" title="Edit" class="icon-4 info-tooltip"></a>
                        <a href="" title="Edit" class="icon-5 info-tooltip"></a>
                        </td>
                    </tr>
                <?php
					}
				}
				?>
				
				</table>
				<!--  end product-table................................... --> 
				</form>
			</div>
			<!--  end content-table  -->
		
			<!--  start actions-box ............................................... -->
			<div id="actions-box">
				<a href="" class="action-slider"></a>
				<div id="actions-box-slider">
					<a href="" class="action-edit">Edit</a>
					<a href="" class="action-delete">Delete</a>
				</div>
				<div class="clear"></div>
			</div>
			<!-- end actions-box........... -->
			
			<!--  start paging..................................................... -->
			<table border="0" cellpadding="0" cellspacing="0" id="paging-table">
			<tr>
			<td>
				<a href="" class="page-far-left"></a>
				<a href="" class="page-left"></a>
				<div id="page-info">Page <strong>1</strong> / 15</div>
				<a href="" class="page-right"></a>
				<a href="" class="page-far-right"></a>
			</td>
			<td>
			<select  class="styledselect_pages">
				<option value="">Number of rows</option>
				<option value="">1</option>
				<option value="">2</option>
				<option value="">3</option>
			</select>
			</td>
			</tr>
			</table>
			<!--  end paging................ -->
			
			<div class="clear"></div>
		 
		</div>
		<!--  end content-table-inner ............................................END  -->
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
<!--  end content -->