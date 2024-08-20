<style>
.bx-viewport { height: 300px;}
.bx-caption { margin-top: -50px;margin-left: -30px; height: 50px;}
.bxslider li img{margin-top: -10px; margin-left:-31px;}
/*.bx-controls { display:none;} */
.bx-pager, .bx-controls-auto  { display:none;}


</style> 
		
            <!-- Slider -->
           <ul class="bxslider">
              <li style="margin-left: -9px;"><img src="<?php echo Yii::app()->request->baseurl;?>/resources/images/file.jpeg" style="height:285px;margin-left:-31px;" title="CTS" /></li>
              <li style="margin-left: -9px;"><img src="<?php echo Yii::app()->request->baseurl;?>/resources/images/GBM_1.jpg" title="Testing Service" /></li>
              <li style="margin-left: -9px;"><img src="<?php echo Yii::app()->request->baseurl;?>/resources/images/slider1.jpg" title="Testing centers" /></li>
              <li style="margin-left: -9px;"><img src="<?php echo Yii::app()->request->baseurl;?>/resources/images/slider6.jpg" title="How to fill up test" /></li>
            </ul>
            <!-- Slider End -->
          
       
        <?php 
		$test_data = Test::model()->findall(array('order' => 'id DESC'));
		?>
      
		<div class="boxed">
		
			<h1 class="title2">Welcome To CTS</h1>
			<p><strong>CTS</strong>  has been established to undertake the responsibility of testing and assessment of institutions across the country. The main object of CTS is to endeavor for institutional development, progress and prosperity of individuals. CTS is to play its major role in creating and grooming future leaders who can play a positive role towards socio-economic development.

CTS has privilege to have linkages International organizations for the betterment in the assessment process across the country and world. We are in process selecting potential candidates who can be placed in the organizations to ensure their potential contribution. Pakistan almost seventy percent talented human capital equipped with modern information technology, skilled and professional oriented acumen.</p>
			</blockquote>
		</div>
        
		

      
		<div class="boxed orange" style="background: rgba(171, 32, 0, 0.58);">
			<div class="col-one">
				<h2 class="title3" style="background: rgb(58, 136, 216);padding:6px;">Latest Tests</h2>
				<?php 
				if(!empty($test_data))
				{
					foreach($test_data as $rec)
					{
				?>		
                <ul>
					<li><a  href="<?php echo Yii::app()->createurl('site/detail/id/'.base64_encode($rec->id))?>"  title="Download Application Form"><?php echo isset($rec->test_title) ? $rec->test_title : ''; ?></a></li>
					
				</ul>
              <?php }
				}
			?>
			</div>
			<div class="col-two">
				<h2 class="title3" style="background: rgb(58, 136, 216);padding:6px;">Latest Results</h2>
                <?php 
				if(!empty($test_data))
				{
					foreach($test_data as $rec)
					{
				?>		
				<ul>
					<li><a href="<?php echo Yii::app()->createurl('site/result/'); ?>"  title="Download Application Form"><?php echo isset($rec->test_title) ? $rec->test_title : ''; ?></a></li>
					
				</ul>
                <?php }
				}
			?>
			</div>
			
			<div style="clear: both;">&nbsp;</div>
		</div>
	