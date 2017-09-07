
		<ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo base_url() ?>index.php">Bike</a> <i class="fa fa-angle-right"></i>Add a new bike</li>
            </ol>


<!--inner block start here-->
<div class="inner-block">

    <div class="grid-form1">
         <div class="tab-content">
             <div class="tab-pane active" id="horizontal-form">
                 
                 <form name="addNewBike" method="post" action="<?php echo base_url() ?>index.php/Bike/Add" enctype="multipart/form-data"> 
                 <div class="row">
                     
                    <div class="col-md-4 gallery-grids-right">
                        <div class="gallery-grid">
                            <a class="example-image-link" data-lightbox="example-set" data-title="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus vitae cursus ligula">
                                <img class="img-responsive img-thumbnail" id="bikeImg" src="<?php echo base_url() ?>uploads/default_bike.jpg" alt="">
                            </a>
                        </div>
                        
                                                
                        <div class="panel-footer">
                            <div class="row">
                                <div style="margin: auto; text-align: center">
                                    <input onchange="readURL(this);" style="width:100%" type="file" name="userfile" id="userfile" class="btn-primary btn">
                                </div>
                            </div>
                        </div>                         
                    </div>
                     
                     
                     <div class="col-md-8" style="">
                         
                        <div class="form-horizontal">
                            
                            <div class="form-group">
                                    <label style="text-align: left;font-weight: bold;font-size: 1.1em" for="focusedinput" class="col-sm-3 control-label">Route Number</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control1" id="route_no" name="route_no" value="" required="">
                                    </div>
                            </div>
                            
                            <div class="form-group">
                                    <label style="text-align: left;font-weight: bold;font-size: 1.1em" for="focusedinput" class="col-sm-3 control-label">Model</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control1" id="model" name="model" value="" required="">
                                    </div>
                            </div>                            
                            
                            <div class="form-group">
                                    <label style="text-align: left;font-weight: bold;font-size: 1.1em" for="focusedinput" class="col-sm-3 control-label">Chassis Number</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control1" id="chassis_no" name="chassis_no" value="" required="">
                                    </div>
                            </div>
                             
                            <div class="form-group">
                                    <label style="text-align: left;font-weight: bold;font-size: 1.1em" for="focusedinput" class="col-sm-3 control-label">Engine Number</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control1" id="engine_no" name="engine_no" value="" required="">
                                    </div>
                            </div>
                             
                            <div class="form-group">
                                    <label style="text-align: left;font-weight: bold;font-size: 1.2em" for="focusedinput" class="col-sm-3 control-label">Color</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control1 jscolor" id="color" name="color" value="FFE233" required="">
                                    </div>
                            </div>
                             
                            <div class="form-group">
                                    <label style="text-align: left;font-weight: bold;font-size: 1.2em" for="focusedinput" class="col-sm-3 control-label">Cost</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control1" id="cost" name="cost" value="" required="">
                                    </div>
                            </div>
                             
                            <div class="form-group">
                                    <label style="text-align: left;font-weight: bold;font-size: 1.2em" for="focusedinput" class="col-sm-3 control-label">Price</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control1" id="price" name="price" value="" required="">
                                    </div>
                            </div>
                                                                                     
                        </div>
                       
                            <div class="panel-footer">
                                <div class="row">
                                        <div style="margin: auto; text-align: center">
                                            <input type="button" onclick="add_bike()" class="btn-primary btn" value="Submit">
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
    
    
    
    
    
    
    
</div>
<!--inner block end here-->
