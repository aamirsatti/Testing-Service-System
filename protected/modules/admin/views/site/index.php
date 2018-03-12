
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Dashboard</h2>   
                        <h5>Welcome Admin</h5>
                    </div>
                </div>              
                 <!-- /. ROW  -->
                  <hr />
                <div class="row">
                <div class="col-md-4 col-sm-6 col-xs-6">           
            <div class="panel panel-back noti-box">
                <span class="icon-box bg-color-red set-icon">
                    <i class="fa fa-compass"></i>
                </span>
                <div class="text-box" >
                    <p class="main-text"> <?php //echo $aprev_products;?>0 Organizations </p>
                    <p class="text-muted">Approved By Admin </p>
                </div>
             </div>
             </div>
                    <div class="col-md-4 col-sm-6 col-xs-6">           
            <div class="panel panel-back noti-box">
                <span class="icon-box bg-color-green set-icon">
                    <i class="fa fa-file-text-o"></i>
                </span>
                <div class="text-box" >
                    <p class="main-text"><?php echo isset($tests) ? count($tests) : 0 ;?> Tests</p>
                    <p class="text-muted">Added by Admin</p>
                </div>
             </div>
             </div>
                    
                    <div class="col-md-4 col-sm-6 col-xs-6">           
            <div class="panel panel-back noti-box">
                <span class="icon-box bg-color-brown set-icon">
                    <i class="fa fa-file"></i>
                </span>
                <div class="text-box" >
                    <p class="main-text"><?php //echo count($total_reviewurl);?>0 Results</p>
                    <p class="text-muted">Added by Admin </p>
                </div>
             </div>
             </div>
            </div>
                 <!-- /. ROW  -->
                           
                 <!-- /. ROW  -->
                 
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                   
                    <div class="chat-panel panel panel-default chat-boder chat-panel-head" >
                        <div class="panel-heading">
                            
                            <h4> Recently Added Organizations</h4>
                            
                        </div>

                        <div class="panel-body">
                            <ul class="chat-box">
                            <?php
                            if(!empty($unaprove_products))
                            {
                                foreach($unaprove_products as $pr)
                                {
                            ?>        
                                    <li class="left clearfix">
                                        <span class="chat-img pull-left">
                                            <?php if(isset($pr->image) && $pr->image != '' && is_file(Yii::getPathOfAlias('webroot') ."/uploads/products/thumb/".$pr->image)){ ?>
                                               <img src="<?php echo Yii::app()->request->baseurl.'/uploads/products/thumb/'.$pr->image ; ?>" class="img-circle" alt ="<?php echo $pr->product_title; ?>" title ="<?php echo $pr->product_title; ?>" style="width:60px;height:60px;">
                                            <?php }else{ ?>
                                               <img src="<?php echo Yii::app()->request->baseurl.'/images/img_not_found.gif' ; ?>" class="img-circle" alt ="<?php echo $pr->product_title; ?>" title ="<?php echo $pr->product_title; ?>" style="width:60px;height:60px;">
                                            <?php } ?> 
                                        </span>
                                        <div class="chat-body">                                        
                                                <strong ><a href="<?php echo Yii::app()->createurl('products/detail/'.str_replace(" ","-",substr($pr->product_title,0,60)).'/p/id/'.base64_encode($pr->id));?>" target="_blank"><?php echo $pr->product_title; ?></a> </strong>
                                                <small class="pull-right text-muted">
                                                    <i class="fa fa-clock-o fa-fw"></i><?php echo $pr->created_date != '' ? date('d M,Y', strtotime($pr->created_date)) : ''; ?>
                                                </small>                                      
                                            <p>
                                                <?php echo substr($pr->description,0, 130); if(strlen($pr->description) > 60) echo '...'; ?>
                                              <br/> <br/>
                                              <div class="pull-right">
                                              <button  class="btn btn-success" onclick="location.href='<?php echo Yii::app()->createurl('admin/products/edit/id/'.base64_encode($pr->id));?>'"> View Details to Approve this Product</button>
                                            </div>
                                            <br/>
                                            </p>
                                        </div>
                                    </li>
                            <?php
                                }
                            }else{
                            ?>
                                  <li><p style="color:red"> No record available</p></li>
                            <?php 
                            }
                            ?>          
                            </ul>
                        </div>

                    </div>
                    
                </div>
                   
                </div>     
                 <!-- /. ROW  -->    
                 
                 
                <div class="row" >
                    
                    <div class="col-md-12 col-sm-12 col-xs-12">
               
                    <div class="panel panel-default">
                        <div class="panel-heading">
                          Top News
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Title</th>
                                            <th>Detail</th>
                                            <th>Date</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if(!empty($rank_cal))
                                        {
                                            $rank_counter = 1; $counter = 1;
                                            foreach($rank_cal as $r)
                                            {
												 $total_reviews = ProductReviewer::model()->count('reviewer_id=:id AND status=:status', array(':id' => $r->reviewer_id, ':status' => 2));
												 $active_pro = ProductReviewer::model()->count('reviewer_id=:id AND status=:status', array(':id' => $r->reviewer_id, ':status' => 1));
                                        ?>     
                                                <tr>
                                                    <td><?php echo $counter; ?></td>
                                                    <td><a href="<?php echo Yii::app()->createurl('admin/reviewer/profile/id/'.base64_encode($r->reviewer_id));?>" target="_blank"><?php echo $r->first_name; ?></a></td>
                                                    <td> <?php echo $total_reviews; ?></td>
                                                    <td>#<?php echo $rank_counter; ?></td>
                                                    
                                                </tr>
                                        <?php   $rank_counter++; $counter++;
                                            }
                                        }
                                        ?>            
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    
                    </div>
                </div>
                 <!-- /. ROW  -->
                 <!-- /. ROW  -->
                <div class="row"> 
                    
                 <?php /* ?>     
                   <div class="col-md-9 col-sm-12 col-xs-12">                     
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Monthly report of Total Products VS Active Products (Next Phase)
                        </div>
                        <div class="panel-body">
                            <div id="morris-bar-chart"></div>
                        </div>
                    </div>            
                </div>
                    <div class="col-md-3 col-sm-12 col-xs-12">                       
                    <div class="panel panel-primary text-center no-boder bg-color-green">
                        <div class="panel-body">
                            <i class="fa fa-bar-chart-o fa-5x"></i>
                            <h3>100 (Next phase) </h3>
                        </div>
                        <div class="panel-footer back-footer-green">
                           Products Participated
                            
                        </div>
                    </div>
                    <div class="panel panel-primary text-center no-boder bg-color-red">
                        <div class="panel-body">
                            <i class="fa fa-edit fa-5x"></i>
                            <h3>200 (Next phase)</h3>
                        </div>
                        <div class="panel-footer back-footer-red">
                            Products Added
                            
                        </div>
                    </div>                         
                        </div>
                <?php */ ?>
           </div>
                
                        
