<?php 
if(Yii::app()->session['admin_login'] == '' && Yii::app()->controller->action->id != 'login')
{
	$this->redirect(array('site/login'));
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Internet Dreams</title>
<link rel="stylesheet" href="<?php echo Yii::app()->request->baseurl;?>/resources/admin/css/screen.css" type="text/css" media="screen" title="default" />
<!--[if IE]>
<link rel="stylesheet" media="all" type="text/css" href="css/pro_dropline_ie.css" />
<![endif]-->

<!--  jquery core -->
<script src="<?php echo Yii::app()->request->baseurl;?>/resources/admin/js/jquery/jquery-1.4.1.min.js" type="text/javascript"></script>
<!-- Custom jquery scripts -->
<script src="<?php echo Yii::app()->request->baseurl;?>/resources/admin/js/jquery/custom_jquery.js" type="text/javascript"></script>
<?php if(Yii::app()->controller->action->id != 'login') { ?>
<!--  checkbox styling script -->
<script src="<?php echo Yii::app()->request->baseurl;?>/resources/admin/js/jquery/ui.core.js" type="text/javascript"></script>
<script src="<?php echo Yii::app()->request->baseurl;?>/resources/admin/js/jquery/ui.checkbox.js" type="text/javascript"></script>
<script src="<?php echo Yii::app()->request->baseurl;?>/resources/admin/js/jquery/jquery.bind.js" type="text/javascript"></script>
<script type="text/javascript">
$(function(){
	$('input').checkBox();
	$('#toggle-all').click(function(){
 	$('#toggle-all').toggleClass('toggle-checked');
	$('#mainform input[type=checkbox]').checkBox('toggle');
	return false;
	});
});
</script>  

<![if !IE 7]>

<!--  styled select box script version 1 -->
<script src="<?php echo Yii::app()->request->baseurl;?>/resources/admin/js/jquery/jquery.selectbox-0.5.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function() {
	$('.styledselect').selectbox({ inputClass: "selectbox_styled" });
});
</script>
 

<![endif]>

<!--  styled select box script version 2 --> 
<script src="<?php echo Yii::app()->request->baseurl;?>/resources/admin/js/jquery/jquery.selectbox-0.5_style_2.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function() {
	$('.styledselect_form_1').selectbox({ inputClass: "styledselect_form_1" });
	$('.styledselect_form_2').selectbox({ inputClass: "styledselect_form_2" });
});
</script>

<!--  styled select box script version 3 --> 
<script src="<?php echo Yii::app()->request->baseurl;?>/resources/admin/js/jquery/jquery.selectbox-0.5_style_2.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function() {
	$('.styledselect_pages').selectbox({ inputClass: "styledselect_pages" });
});
</script>

<!--  styled file upload script --> 
<script src="<?php echo Yii::app()->request->baseurl;?>/resources/admin/js/jquery/jquery.filestyle.js" type="text/javascript"></script>
<script type="text/javascript" charset="utf-8">
  $(function() {
      $("input.file_1").filestyle({ 
          image: "images/forms/choose-file.gif",
          imageheight : 21,
          imagewidth : 78,
          width : 310
      });
  });
</script>


 
<!-- Tooltips -->
<script src="<?php echo Yii::app()->request->baseurl;?>/resources/admin/js/jquery/jquery.tooltip.js" type="text/javascript"></script>
<script src="<?php echo Yii::app()->request->baseurl;?>/resources/admin/js/jquery/jquery.dimensions.js" type="text/javascript"></script>
<script type="text/javascript">
$(function() {
	$('a.info-tooltip ').tooltip({
		track: true,
		delay: 0,
		fixPNG: true, 
		showURL: false,
		showBody: " - ",
		top: -35,
		left: 5
	});
});
</script> 


<!--  date picker script -->
<link rel="stylesheet" href="<?php echo Yii::app()->request->baseurl;?>/resources/admin/css/datePicker.css" type="text/css" />
<script src="<?php echo Yii::app()->request->baseurl;?>/resources/admin/js/jquery/date.js" type="text/javascript"></script>
<script src="<?php echo Yii::app()->request->baseurl;?>/resources/admin/js/jquery/jquery.datePicker.js" type="text/javascript"></script>
<script type="text/javascript" charset="utf-8">
        $(function()
{

// initialise the "Select date" link
$('#date-pick')
	.datePicker(
		// associate the link with a date picker
		{
			createButton:false,
			startDate:'01/01/2005',
			endDate:'31/12/2020'
		}
	).bind(
		// when the link is clicked display the date picker
		'click',
		function()
		{
			updateSelects($(this).dpGetSelected()[0]);
			$(this).dpDisplay();
			return false;
		}
	).bind(
		// when a date is selected update the SELECTs
		'dateSelected',
		function(e, selectedDate, $td, state)
		{
			updateSelects(selectedDate);
		}
	).bind(
		'dpClosed',
		function(e, selected)
		{
			updateSelects(selected[0]);
		}
	);
	
var updateSelects = function (selectedDate)
{
	var selectedDate = new Date(selectedDate);
	$('#d option[value=' + selectedDate.getDate() + ']').attr('selected', 'selected');
	$('#m option[value=' + (selectedDate.getMonth()+1) + ']').attr('selected', 'selected');
	$('#y option[value=' + (selectedDate.getFullYear()) + ']').attr('selected', 'selected');
}
// listen for when the selects are changed and update the picker
$('#d, #m, #y')
	.bind(
		'change',
		function()
		{
			var d = new Date(
						$('#y').val(),
						$('#m').val()-1,
						$('#d').val()
					);
			$('#date-pick').dpSetSelected(d.asString());
		}
	);

// default the position of the selects to today
var today = new Date();
updateSelects(today.getTime());

// and update the datePicker to reflect it...
$('#d').trigger('change');
});
</script>
<?php } ?>
<!-- MUST BE THE LAST SCRIPT IN <HEAD></HEAD></HEAD> png fix -->
<script src="<?php echo Yii::app()->request->baseurl;?>/resources/admin/js/jquery/jquery.pngFix.pack.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function(){
$(document).pngFix( );
});
</script>
</head>
<body <?php if(Yii::app()->controller->action->id == 'login') { ?> id="login-bg" <?php } ?>> 
<?php if(Yii::app()->controller->action->id != 'login') { ?>
<!-- Start: page-top-outer -->
<div id="page-top-outer">    

<!-- Start: page-top -->
<div id="page-top">

	<!-- start logo -->
	<div id="logo"> 
	<a href="" style="color:white;">CTS Admin</a>
	</div>
    <h2 style="color:white;padding-top:50px;">CTS Admin</h2>
	<!-- end logo -->
	
	<!--  start top-search -->
	<?php /*?><div id="top-search">
		<table border="0" cellpadding="0" cellspacing="0">
		<tr>
		<td><input type="text" value="Search" onblur="if (this.value=='') { this.value='Search'; }" onfocus="if (this.value=='Search') { this.value=''; }" class="top-search-inp" /></td>
		<td>
		<select  class="styledselect">
			<option value=""> All</option>
			<option value=""> Products</option>
			<option value=""> Categories</option>
			<option value="">Clients</option>
			<option value="">News</option>
		</select> 
		</td>
		<td>
		<input type="image" src="images/shared/top_search_btn.gif"  />
		</td>
		</tr>
		</table>
	</div><?php */?>
 	<!--  end top-search -->
 	<div class="clear"></div>

</div>
<!-- End: page-top -->

</div>
<!-- End: page-top-outer -->
	
<div class="clear">&nbsp;</div>
 
<!--  start nav-outer-repeat................................................................................................. START -->
<div class="nav-outer-repeat"> 
<!--  start nav-outer -->
<div class="nav-outer"> 

		<!-- start nav-right -->
		<div id="nav-right">
		
			<div class="nav-divider">&nbsp;</div>
			<div class="showhide-account"><img src="<?php echo Yii::app()->request->baseurl;?>/resources/admin/images/shared/nav/nav_myaccount.gif" width="93" height="14" alt="" /></div>
			<div class="nav-divider">&nbsp;</div>
			<a href="<?php echo Yii::app()->createurl('admin/site/logout');?>" id="logout"><img src="<?php echo Yii::app()->request->baseurl;?>/resources/admin/images/shared/nav/nav_logout.gif" width="64" height="14" alt="" /></a>
			<div class="clear">&nbsp;</div>
		
			<!--  start account-content -->	
			<div class="account-content">
			<div class="account-drop-inner">
				<a href="" id="acc-settings">Settings</a>
				<div class="clear">&nbsp;</div>
				<div class="acc-line">&nbsp;</div>
				<a href="" id="acc-details">Personal details </a>
				<div class="clear">&nbsp;</div>
				<div class="acc-line">&nbsp;</div>
				<a href="" id="acc-project">Project details</a>
				<div class="clear">&nbsp;</div>
				<div class="acc-line">&nbsp;</div>
				<a href="" id="acc-inbox">Inbox</a>
				<div class="clear">&nbsp;</div>
				<div class="acc-line">&nbsp;</div>
				<a href="" id="acc-stats">Statistics</a> 
			</div>
			</div>
			<!--  end account-content -->
		
		</div>
		<!-- end nav-right -->


		<!--  start nav -->
		<div class="nav">
		<div class="table">
		
		<ul class="select"><li><a href="#nogo"><b>Dashboard</b><!--[if IE 7]><!--></a><!--<![endif]-->
		<!--[if lte IE 6]><table><tr><td><![endif]-->
		<div class="select_sub">
			<ul class="sub">
				<li><a href="#nogo">Dashboard Details 1</a></li>
				<li><a href="#nogo">Dashboard Details 2</a></li>
				<li><a href="#nogo">Dashboard Details 3</a></li>
			</ul>
		</div>
		<!--[if lte IE 6]></td></tr></table></a><![endif]-->
		</li>
		</ul>
		
		<div class="nav-divider">&nbsp;</div> 
		                    
		<ul class="select">
			<li><a href="#nogo"><b>Test</b><!--[if IE 7]><!--></a><!--<![endif]-->
			<!--[if lte IE 6]><table><tr><td><![endif]-->
				<div class="select_sub show">
					<ul class="sub">
						<li class="sub_show"><a href="<?php echo Yii::app()->createurl('admin/test/list');?>">View all Tests</a></li>
						<li ><a href="<?php echo Yii::app()->createurl('admin/test/add');?>">Add new test</a></li>
						
					</ul>
				</div>
			<!--[if lte IE 6]></td></tr></table></a><![endif]-->
			</li>
		</ul>
		
		<div class="nav-divider">&nbsp;</div>
		
		<ul class="current">
			<li><a href="#nogo"><b>CMS Pages</b><!--[if IE 7]><!--></a><!--<![endif]-->
			<!--[if lte IE 6]><table><tr><td><![endif]-->
				<div class="select_sub show">
					<ul class="sub">
						<li class="sub_show"><a href="<?php echo Yii::app()->createurl('admin/cms/add');?>">View</a></li>
						<li ><a href="<?php echo Yii::app()->createurl('admin/test/add');?>">Add new test</a></li>
						
					</ul>
				</div>
			<!--[if lte IE 6]></td></tr></table></a><![endif]-->
			</li>
		</ul>
		<?php /*?><ul class="select"><li><a href="#nogo"><b>Categories</b><!--[if IE 7]><!--></a><!--<![endif]-->
		<!--[if lte IE 6]><table><tr><td><![endif]-->
		<div class="select_sub">
			<ul class="sub">
				<li><a href="#nogo">Categories Details 1</a></li>
				<li><a href="#nogo">Categories Details 2</a></li>
				<li><a href="#nogo">Categories Details 3</a></li>
			</ul>
		</div>
		<!--[if lte IE 6]></td></tr></table></a><![endif]-->
		</li>
		</ul><?php */?>
		
		<div class="nav-divider">&nbsp;</div>
		
		<?php /*?><ul class="select"><li><a href="#nogo"><b>Clients</b><!--[if IE 7]><!--></a><!--<![endif]-->
		<!--[if lte IE 6]><table><tr><td><![endif]-->
		<div class="select_sub">
			<ul class="sub">
				<li><a href="#nogo">Clients Details 1</a></li>
				<li><a href="#nogo">Clients Details 2</a></li>
				<li><a href="#nogo">Clients Details 3</a></li>
			 
			</ul>
		</div>
		<!--[if lte IE 6]></td></tr></table></a><![endif]-->
		</li>
		</ul><?php */?>
		
		<div class="nav-divider">&nbsp;</div>
		
		<ul class="select"><li><a href="#nogo"><b>Results</b><!--[if IE 7]><!--></a><!--<![endif]-->
		<!--[if lte IE 6]><table><tr><td><![endif]-->
		<?php /*?><div class="select_sub">
			<ul class="sub">
				<li><a href="#nogo">News details 1</a></li>
				<li><a href="#nogo">News details 2</a></li>
				<li><a href="#nogo">News details 3</a></li>
			</ul>
		</div><?php */?>
		<!--[if lte IE 6]></td></tr></table></a><![endif]-->
		</li>
		</ul>
		
		<div class="clear"></div>
		</div>
		<div class="clear"></div>
		</div>
		<!--  start nav -->

</div>
<div class="clear"></div>
<!--  start nav-outer -->
</div>
<!--  start nav-outer-repeat................................................... END -->

 <div class="clear"></div>
 
<!-- start content-outer ........................................................................................................................START -->
<div id="content-outer">
<?php } ?>
   <?php echo $content; ?>
<!--  end content -->
<?php if(Yii::app()->controller->action->id != 'login') { ?>
<div class="clear">&nbsp;</div>
</div>
<!--  end content-outer........................................................END -->

<div class="clear">&nbsp;</div>
    
<!-- start footer -->         
<div id="footer">
	<!--  start footer-left -->
	<div id="footer-left">
	
	Admin  &copy; Copyright  <span id="spanYear"></span> <a href="">CTS</a>. All rights reserved.</div>
	<!--  end footer-left -->
	<div class="clear">&nbsp;</div>
</div>
<!-- end footer -->
<?php } ?> 
</body>
</html>