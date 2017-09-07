
		<ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo base_url() ?>index.php">Cheque</a> <i class="fa fa-angle-right"></i>Details</li>
                </ol>

	

<!--inner block start here-->
<div class="inner-block">

            <div id="cheque_result">    
            
                    <?php if(isset($cheque) && $cheque!=0){ foreach ($cheque as $details): ?> 
                    <div class="grid-form1">
                     <div class="tab-content">
                        <div class="tab-pane active" id="horizontal-form">            
                            <form class="form-horizontal" action="<?php echo base_url() ?>index.php/Cheque/pay" method="post">
                                        <div class="form-group">
                                                <label style="font-size: 1.1em" class="col-sm-3 control-label">Bike Route Number</label>
                                                <div class="col-sm-7">
                                                    <input type="text" value="<?php echo $details->route_no; ?>" class="form-control1" id="route_no" name="route_no" required="" readonly="">
                                                </div>
                                        </div>
                                        <div class="form-group">
                                                <label style="font-size: 1.1em" class="col-sm-3 control-label">Cheque Number</label>
                                                <div class="col-sm-7">
                                                    <input type="text" value="<?php echo $details->cheque_no; ?>" class="form-control1" id="cheque_no" name="cheque_no" required="">
                                                </div>
                                        </div>
                                        <div class="form-group">
                                                <label style="font-size: 1.1em" class="col-sm-3 control-label">Amount</label>
                                                <div class="col-sm-7">
                                                    <input type="text" value="<?php echo $details->amount; ?>" class="form-control1" id="amount" name="amount" required="">
                                                </div>
                                        </div>
                                        <div class="form-group">
                                                <label style="font-size: 1.1em" class="col-sm-3 control-label">Date</label>
                                                <div class="col-sm-7">
                                                    
                                                    <div class="row">
                                                    
                                                        <div class="col-md-4">
                                                        <input type="text" value="<?php echo $details->cyear; ?>" class="form-control1" id="year" name="year" required="">
                                                        </div>
                                                        
                                                        <div class="col-md-4">
                                                        <input type="text" value="<?php echo $details->cmonth; ?>" class="form-control1" id="month" name="month" required="">
                                                        </div>
                                                        
                                                        <div class="col-md-4">
                                                        <input type="text" value="<?php echo $details->cday; ?>" class="form-control1" id="day" name="day" required="">
                                                        </div>
                                                        
                                                    </div>
                                                </div>         
                                        </div>

                                        <div class="panel-footer">
                                            <div class="row">
                                                    <div class="col-sm-8 col-sm-offset-2">
                                                        <input onclick="update_cheque(<?php echo $details->cid; ?>)"  type="button" class="btn-primary btn btn-lg" value="Update">
                                                        <input onclick="delete_cheque(<?php echo $details->cid; ?>)" type="button" class="btn-danger btn btn-lg" value="Delete">
                                                    </div>
                                            </div>
                                        </div>
                                </form>
                        </div>
                     </div>
                    </div>
                 <div class="clearfix" style="padding: 5px"></div>           
                <?php endforeach;}
                else
                {?>

                    <div class="sec-sub-title text-center">
                    <div style="background-color: #ff4242;">
                        <p style="color: white;font-weight: bold;font-size: 20px; padding: 25px;" class="">No Details found</p>
                    </div>
                    </div>

                <?php 
                }?>
        
            </div>
    
    <div id="search_cheque_result">
    </div>
    
    
</div>
<!--inner block end here-->



    