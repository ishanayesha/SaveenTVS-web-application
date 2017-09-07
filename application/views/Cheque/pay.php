
		<ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo base_url() ?>index.php">Home</a> <i class="fa fa-angle-right"></i>Pay</li>
                </ol>

	

<!--inner block start here-->
<div class="inner-block">
    
    <div class="grid-form1">
       <h3>Issue a Cheque</h3>
         <div class="tab-content">
            <div class="tab-pane active" id="horizontal-form">
                <form class="form-horizontal" action="" method="post">
                            
                    <div id="get_all_route">
                        
                            <div class="form-group">
                                <label for="focusedinput" style="font-size: 1.1em" class="col-sm-3 control-label">Bike Route Number</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control1" id="route_no" name="route_no" required="">  
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="button" id="add_route" class="btn-primary btn btn-lg" value="Add">
                                    </div>
                            </div>
                              
                        <div id="new_route">
                        </div> 
                    </div>
                            
                            <div class="form-group">
                                    <label for="disabledinput" style="font-size: 1.1em" class="col-sm-3 control-label">Cheque Number</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control1" id="cheque_no" name="cheque_no" required="">
                                    </div>
                            </div>
                            <div class="form-group">
                                    <label for="disabledinput" style="font-size: 1.1em" class="col-sm-3 control-label">Amount</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control1" id="amount" name="amount" required="">
                                    </div>
                            </div>
                            <div class="form-group">
                                    <label for="disabledinput" style="font-size: 1.1em" class="col-sm-3 control-label">Date</label>
                                    <div class="col-sm-5">
                                        <input type="date" class="form-control1" id="date" name="date" required="">
                                    </div>
                            </div>
                        
                            <div class="panel-footer">
                                <div class="row">
                                        <div class="col-sm-5 col-sm-offset-2">
                                            <input type="button" onclick="issue_a_cheque()" class="btn-primary btn btn-lg" value="Submit">    
                                        </div>
                                </div>
                            </div>
                    </form>
            </div>
         </div>
    </div>
    
    
    
</div>
<!--inner block end here-->


<div class="clearfix" style="padding: 8px"></div>
    
    
    