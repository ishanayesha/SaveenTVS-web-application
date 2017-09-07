<div id="manage_bike">
    
    <?php if(isset($bike) && $bike!=0){ foreach ($bike as $details): ?>
        
    <div class="grid-form1">
         <div class="tab-content">
             <div class="tab-pane active" id="horizontal-form">
                 
                 <form name="" onsubmit="" method="post" action="<?php echo base_url() ?>index.php/Bike/update" enctype="multipart/form-data"> 
                 <div class="row">
                     
                    <div class="col-md-4 gallery-grids-right">
                        <div class="gallery-grid">
                            <a class="example-image-link" data-lightbox="example-set" data-title="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus vitae cursus ligula">
                                <img class="img-responsive img-thumbnail" id="bikeImg" src="<?php echo base_url() ?>uploads/<?php echo $details->image?>" alt="">
                            </a>
                        </div>
                        
                        <!--for send bike id-->
                        <input name="bike_id" id="bike_id" hidden="" value="<?php echo $details->id?>">
                                                
                        <div class="panel-footer">
                            <div class="row">
                                <div style="margin: auto; text-align: center">
                                    <input onchange="readURL(this);" style="width:100%" type="file" name="bikeimage" id="bikeimage" class="btn-primary btn">
                                </div>
                            </div>
                        </div>                         
                    </div>
                     
                     
                     <div class="col-md-8" style="">
                         
                        <div class="form-horizontal">
                            
                            <div class="form-group">
                                    <label style="text-align: left" for="focusedinput" class="col-sm-3 control-label">Route Number</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control1" id="route_no" name="route_no" value="<?php echo $details->route_no?>" required="">
                                    </div>
                            </div>
                            
                            <div class="form-group">
                                    <label style="text-align: left" for="focusedinput" class="col-sm-3 control-label">Model</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control1" id="model" name="model" value="<?php echo $details->model?>" required="">
                                    </div>
                            </div>                            
                            
                            <div class="form-group">
                                    <label style="text-align: left" for="focusedinput" class="col-sm-3 control-label">Chassis Number</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control1" id="chassis_no" name="chassis_no" value="<?php echo $details->chassis_no?>" required="">
                                    </div>
                            </div>
                             
                            <div class="form-group">
                                    <label style="text-align: left" for="focusedinput" class="col-sm-3 control-label">Engine Number</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control1" id="engine_no" name="engine_no" value="<?php echo $details->engine_no?>" required="">
                                    </div>
                            </div>
                             
                            <div class="form-group">
                                    <label style="text-align: left" for="focusedinput" class="col-sm-3 control-label">Color</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control1 jscolor" id="color" name="color" value="<?php echo $details->color?>" required="">
                                    </div>
                            </div> 
                                                         
                            <div class="form-group">
                                    <label style="text-align: left" for="focusedinput" class="col-sm-3 control-label">Cost</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control1" id="cost" name="cost" value="<?php echo $details->cost?>" required="">
                                    </div>
                            </div>
                                                          
                            <div class="form-group">
                                    <label style="text-align: left" for="focusedinput" class="col-sm-3 control-label">Price</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control1" id="price" name="price" value="<?php echo $details->price?>" required="">
                                    </div>
                            </div>
                             
                        </div>
                       
                            <div class="panel-footer">
                                <div class="row">
                                        <div style="margin: auto; text-align: center">
                                            <input type="button" onclick="update_bike(<?php echo $details->id;?>)" class="btn-primary btn" value="Update">
                                            <input onclick="delete_bike(<?php echo $details->id;?>)" type="button" class="btn-danger btn" value="Delete">
                                        </div>
                                </div>
                            </div> 
                        
                         
                     </div>
                     
                 </div>
                 </form> 
                 
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
    