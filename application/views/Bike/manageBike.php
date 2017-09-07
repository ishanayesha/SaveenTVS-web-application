
		<ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo base_url() ?>index.php">Bike</a> <i class="fa fa-angle-right"></i>Manage bike details</li>
            </ol>


<!--inner block start here-->
<div class="inner-block">

    <div id="manage_bike">
    
 
        
    <?php if(isset($bike) && $bike!=0){ foreach ($bike as $details): ?>
    <div class="grid-form1">
         <div class="tab-content">
             <div class="tab-pane active" id="horizontal-form">
                 
                 <div class="row">
                 
                    <div class="col-md-4 gallery-grids-right">
                        <div class="gallery-grid">
                            <a class="fancybox-thumb" rel="fancybox-thumb"  title="<?php echo $details->model;?>">
                                <img src="<?php echo base_url() ?>uploads/<?php echo $details->image?>" alt="" />
                            </a>
                        </div>
                    </div>
                     
                     
                     <div class="col-md-8" style="padding-left: 3%;">
                         
                         <div class="form-horizontal" style="padding-left: 15%;text-align: left;">
                            
                            <div class="form-group">
                                    <label style="font-weight: bold;text-align: left;font-size: 1.1em;" for="focusedinput" class="col-sm-4 control-label">Route Number</label>
                                    <div class="col-sm-8">
                                        <label style="font-size: 1.1em;text-align: left;" for="focusedinput" class="col-sm-6 control-label"><?php echo $details->route_no;?></label>
                                    </div>
                            </div>
                            
                            <div class="form-group">
                                    <label style="font-weight: bold;text-align: left;font-size: 1.1em;" for="focusedinput" class="col-sm-4 control-label">Model</label>
                                    <div class="col-sm-8">
                                        <label style="font-size: 1.1em;text-align: left;" for="focusedinput" class="col-sm-6 control-label"><?php echo $details->model;?></label>
                                    </div>
                            </div>
                            
                            <div class="form-group">
                                    <label style="font-weight: bold;text-align: left;font-size: 1.1em;" for="focusedinput" class="col-sm-4 control-label">Color</label>
                                    <div class="col-sm-8">
                                        <input style="width: 50%;text-align: left;border-radius: 50px; background-color: #<?php echo $details->color?>" class="col-sm-6" readonly="">
                                    </div>
                            </div>
                            
                            <div class="form-group">
                                    <label style="font-weight: bold;text-align: left;font-size: 1.1em;" for="focusedinput" class="col-sm-4 control-label">Price</label>
                                    <div class="col-sm-8">
                                        <label style="font-size: 1.1em;text-align: left;" for="focusedinput" class="col-sm-6 control-label">Rs: <?php echo $details->price;?></label>
                                    </div>
                            </div>
                            
                        </div>
                                                
                        <div class="panel-footer">
                            <div class="row">
                                    <div style="margin: auto; text-align: center">
                                     <input type="button" onclick="bike_details_for_update(<?php echo $details->id;?>)" class="btn-primary btn" value="Update">
                                     <input onclick="delete_bike(<?php echo $details->id;?>)" type="button" class="btn-danger btn" value="Delete">
                                    </div>
                            </div>
                        </div> 
                         
                         
                     </div>
                      
                 </div>
                 
             </div>
         </div>
    </div>
<div class="clearfix"></div>
    
    
    <?php endforeach;}
    else
    {?>

        <div class="sec-sub-title text-center">
        <div style="background-color: #ff4242;">
            <p style="color: white;font-weight: bold;font-size: 20px; padding: 25px;" class="">No Bikes found</p>
        </div>
        </div>

    <?php 
    }?>        
        
        
    </div>

    <!--search result--> 
    <div id="search_bike_for_manage">
    </div>    
    
    
</div>
<!--inner block end here-->

<div id="bike_model"></div>


<script src="<?php echo base_url() ?>assets/js/jscolor.js"></script>