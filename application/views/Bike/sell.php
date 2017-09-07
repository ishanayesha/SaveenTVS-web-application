
            <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo base_url() ?>index.php">Bike</a> <i class="fa fa-angle-right"></i>Sell a bike</li>
            </ol>


<!--inner block start here-->
<div class="inner-block">


    
    <div id="bike_sell">
        
    <?php if(isset($bike) && $bike!=0){ foreach ($bike as $details): ?>
    <div class="grid-form1">
         <div class="tab-content">
             <div class="tab-pane active" id="horizontal-form">
                 
                 <div id="bike" class="row">
                 
                    <div class="col-md-4 gallery-grids-right">
                        <div class="gallery-grid">
                            <a class="example-image-link" data-lightbox="example-set">
                                <img class="img-responsive img-thumbnail" src="<?php echo base_url() ?>uploads/<?php echo $details->image?>" alt="">
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
                                        <input style="font-size: 1.1em;text-align: left;border-radius: 50px; background-color: #<?php echo $details->color?>" class="col-sm-6 control-label" value="" readonly="">
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
                                        <input style="width: 70%;" onclick="sell(<?php echo $details->id;?>)" type="button" class="btn-primary btn" value="Sell">
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
    <div id="search_bike_sell">
    </div>

    
    
    
    
    
    
</div>
<!--inner block end here-->


<script src="<?php echo base_url() ?>assets/js/jscolor.js"></script>