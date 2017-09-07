
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url() ?>index.php">Bike</a> <i class="fa fa-angle-right"></i><a href="<?php echo base_url() ?>index.php/Bike/sell">Sell a bike</a><i class="fa fa-angle-right"></i>Selling</li>
            </ol>


<!--inner block start here-->
<div class="inner-block">


    <form onsubmit="" action="<?php echo base_url()?>index.php/Bike/bill" method="post" class="form-horizontal">    
    <div class="grid-form1">
         <div class="tab-content">
             <div class="tab-pane active" id="horizontal-form">
                 
                 <h3>Bike Details</h3>
                 
                 <div class="row" style="padding-bottom: 3%">
                    
                    <div class="col-md-4 gallery-grids-right">
                        <div class="gallery-grid">
                            <a class="example-image-link" data-lightbox="example-set">
                                <img class="img-responsive img-thumbnail" src="<?php echo base_url() ?>uploads/<?php echo $bike[0]->image?>" alt="">
                            </a>
                        </div>
                    </div>
                     
                     
                     <div class="col-md-8" style="padding-left: 3%;">
                         
                         <div class="form-horizontal" style="padding-left: 15%;text-align: left;">
                            
                            <div class="form-group">
                                    <label style="font-weight: bold;text-align: left;font-size: 1.1em;" for="focusedinput" class="col-sm-4 control-label">Route Number</label>
                                    <div class="col-sm-8">
                                        <label style="font-size: 1.1em;text-align: left;" for="focusedinput" class="col-sm-6 control-label"><?php echo $bike[0]->route_no;?></label>
                                    </div>
                            </div>
                            
                            <div class="form-group">
                                    <label style="font-weight: bold;text-align: left;font-size: 1.1em;" for="focusedinput" class="col-sm-4 control-label">Model</label>
                                    <div class="col-sm-8">
                                        <label style="font-size: 1.1em;text-align: left;" for="focusedinput" class="col-sm-6 control-label"><?php echo $bike[0]->model;?></label>
                                    </div>
                            </div>
                            
                            <div class="form-group">
                                    <label style="font-weight: bold;text-align: left;font-size: 1.1em;" for="focusedinput" class="col-sm-4 control-label">Chassis Number</label>
                                    <div class="col-sm-8">
                                        <label style="font-size: 1.1em;text-align: left;" for="focusedinput" class="col-sm-6 control-label"><?php echo $bike[0]->chassis_no;?></label>
                                    </div>
                            </div>
                            
                            <div class="form-group">
                                    <label style="font-weight: bold;text-align: left;font-size: 1.1em;" for="focusedinput" class="col-sm-4 control-label">Engine number</label>
                                    <div class="col-sm-8">
                                        <label style="font-size: 1.1em;text-align: left;" for="focusedinput" class="col-sm-6 control-label"><?php echo $bike[0]->engine_no;?></label>
                                    </div>
                            </div>
                                                                                    
                            <div class="form-group">
                                    <label style="font-weight: bold;text-align: left;font-size: 1.1em;" for="focusedinput" class="col-sm-4 control-label">Color</label>
                                    <div class="col-sm-8">
                                        <input style="font-size: 1.1em;text-align: left;border-radius: 50px; background-color: #<?php echo $bike[0]->color?>" class="col-sm-6 control-label" value="" readonly="">
                                    </div>
                            </div>
                            
                            <div class="form-group">
                                    <label style="font-weight: bold;text-align: left;font-size: 1.1em;" for="focusedinput" class="col-sm-4 control-label">Price (Rs)</label>
                                    <div class="col-sm-8">
                                                         
                                        <!--send bike id--> 
                                        <input type="hidden" id="bike_id" name="bike_id" value="<?php echo $bike[0]->id;?>"> 

                                        <input style="font-size: 1.1em;text-align: left;" class="col-sm-6 control-label" id="price" name="price" value="<?php echo $bike[0]->price;?>">
                                    </div>
                            </div>
                            
                        </div>
  
                     </div>
                      
                 </div>
                 
                 
            <div class="panel-footer">
<!--                <div class="row">
                        <div style="margin: auto; text-align: center">
                            <input style="width: 90%;" type="button" class="btn-primary btn" value="Sell">
                        </div>
                </div>-->
            </div>
                 
             </div>
         </div>
    </div>
<div class="clearfix"></div>
                 


<div class="grid-form1">
 <div class="tab-content">
     <div class="tab-pane active" id="horizontal-form">

   


                <h3>Client Details</h3>
                
                <div class="row">

                    <div class="tab-content">
                        <div class="tab-pane active" id="horizontal-form">
                            
                                        <div class="form-group">
                                                <label for="focusedinput" class="col-sm-2 control-label">First Name</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control1" id="fname" name="fname" value="" required="">
                                                </div>
                                        </div>
                                        <div class="form-group">
                                                <label for="disabledinput" class="col-sm-2 control-label">Last Name</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control1" id="lname" name="lname" value="" required="">
                                                </div>
                                        </div>
                                        <div class="form-group">
                                                <label for="disabledinput" class="col-sm-2 control-label">Telephone</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control1" id="tel" name="tel" value="" required="">
                                                </div>
                                        </div>
                                        <div class="form-group">
                                                <label for="disabledinput" class="col-sm-2 control-label">Address</label>
                                                <div class="col-sm-8">
                                                    <textarea class="form-control1" id="address" name="address" ></textarea>
                                                </div>
                                        </div>

                                        <div class="panel-footer">
                                            <div class="row">
                                                    <div class="col-sm-8 col-sm-offset-2">
                                                        <input  type="button" onclick="selling_validate()" class="btn-primary btn btn-lg" value="Submit">
                                                    </div>
                                            </div>
                                        </div>
                                
                        </div>
                     </div>
                    
                    
                    
                    
                    
                </div>
                 
                 
     </div>
 </div>
</div>
<div class="clearfix"></div>               
                 

    
        
    
    
    
</form>    
    
</div>
<!--inner block end here-->

