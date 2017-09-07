<!--<script>
function mmm()
{    $("#single_1").fancybox({
          helpers: {
              title : {
                  type : 'float'
              }
          }
      });
}  
</script> -->




            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url() ?>index.php">Home</a> <i class="fa fa-angle-right"></i><input style="background-color: white;border:0px solid white;color: wheat" type="button" value="saveen" onclick="change_security()"></li>
            </ol>


<!--inner block start here-->
<div class="inner-block">

    <div id="bike">
        
    <?php if(isset($bike) && $bike!=0){ foreach ($bike as $details): ?>
    <div class="grid-form1">
         <div class="tab-content">
             <div class="tab-pane active" id="horizontal-form">
                 
                 <div class="row">
                 
                    <div class="col-md-4 gallery-grids-right">
                        <div class="gallery-grid">
                            <a class="example-image-link" data-lightbox="example-set" title="<?php echo $details->model;?>">
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
                                        <input style="width: 70%;" onclick="bike_details(<?php echo $details->id;?>)" type="button" class="btn-primary btn" value="More Details">
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
    <div id="search_bike">
    </div>



</div>
<!--inner block end here-->




<div id="bike_model"></div>





            <!--Bike Details-->
            <div class="modal fade" id="sec_mode" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                            </button>
                            <h4 class="modal-title" id="gridSystemModalLabel">Change Security</h4>
                            <span id="fill_all_Err" class="I_error_messages"></span>
                        </div>

                        <div id="pwd">

                        <form id="pwd_form" role="form" method="post">
                        <div class="modal-body">

                            <div class="row" style="padding:10px 20px 0px 20px;">
                                <div class="col-xs-6">
                                    <p style="font-weight:bold">Password:</p>
                                </div>
                                <div class="col-xs-6">

                                    <input type="password" name="password" id="password" class="form-control">
              
                                </div>
                            </div>
                    
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" onclick="unclock()">Unlock</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        </div>
                        </form>                            
                            
                        </div>
                        
                        <div id="mode" style="display: none;">
                        
                        <form id="sec_form" role="form" method="post">
                        <div class="modal-body">

                            <div class="row" style="padding:10px 20px 0px 20px;">
                                <div class="col-xs-6">
                                    <p style="font-weight:bold">Secure Mode:</p>
                                </div>
                                <div class="col-xs-6">

                                    <label>ON</label>
                                    
                                    <input type="radio" name="on" id="on" value="1" <?php if($secure[0]->mode==1){    echo 'checked'; }?>>
                                    
                                    <label>OFF</label>
                                    <input type="radio" name="on" id="on" value="0" <?php if($secure[0]->mode==0){    echo 'checked'; }?>>
                                    
                                    
              
                                </div>
                            </div>
                    
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" onclick="sec_mode()">Change</button>
                            <button type="button" onclick="default_lock()" class="btn btn-danger" data-dismiss="modal">Close</button>
                        </div>
                        </form>
                            
                        </div>
                        
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->