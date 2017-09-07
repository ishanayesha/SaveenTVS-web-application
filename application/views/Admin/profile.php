
		<ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo base_url() ?>index.php">Home</a> <i class="fa fa-angle-right"></i>Profile</li>
                </ol>

	

<!--inner block start here-->
<div class="inner-block">
    
    <div class="grid-form1">
       <h3>Admin Profile</h3>
         <div class="tab-content">
            <div class="tab-pane active" id="horizontal-form">
                <form onsubmit="" class="form-horizontal" action="<?php echo base_url() ?>index.php/Admin/profile" method="post">
                            <div class="form-group">
                                    <label for="focusedinput" class="col-sm-2 control-label">First Name</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control1" id="fname" name="fname" value="<?php echo $profile[0]->fname?>" required="">
                                    </div>
                            </div>
                            <div class="form-group">
                                    <label for="disabledinput" class="col-sm-2 control-label">Last Name</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control1" id="lname" name="lname" value="<?php echo $profile[0]->lname?>" required="">
                                    </div>
                            </div>
                            <div class="form-group">
                                    <label for="disabledinput" class="col-sm-2 control-label">Email</label>
                                    <div class="col-sm-8">
                                        <input type="email" class="form-control1" id="email" name="email" value="<?php echo $profile[0]->email?>" required="">
                                    </div>
                            </div>
                            <div class="form-group">
                                    <label for="disabledinput" class="col-sm-2 control-label">Telephone</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control1" id="tel" name="tel" value="<?php echo $profile[0]->tel?>" required="">
                                    </div>
                            </div>
                            <div class="form-group">
                                    <label for="disabledinput" class="col-sm-2 control-label">Level</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control1" id="level" name="level" value="<?php echo $profile[0]->level?>" readonly="">
                                    </div>
                            </div>
                        
                            <div class="panel-footer">
                                <div class="row">
                                        <div class="col-sm-8 col-sm-offset-2">
                                            <input  type="button" onclick="validateProfile()" class="btn-primary btn btn-lg" value="Submit">
                                            <input data-toggle="modal" data-target="#change_Password" type="button" style="" class="btn-danger btn" value="Change Password">
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
    
    
    


<!--Chnage Password-->
<div class="modal fade" id="change_Password" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="gridSystemModalLabel">Change Password</h4>
                <span id="fill_all_Err" class="error_msg"></span>
            </div>
            
            <form id="user_pwd" role="form" method="post">
            <div class="modal-body">
                
                <div class="row" style="padding:10px 20px 0px 20px;">
                    <div class="col-xs-6">
                        <p style="font-weight:bold">Old Password:</p>
                    </div>
                    <div class="col-xs-6">
                        <span class="error_msg" id="old_Pwd_Err"></span>
                        <input type="password" id="old_Pwd" name="old_Pwd" class="form-control" required=""/>
                    </div>
                </div>
                <div class="row" style="padding:10px 20px 0px 20px;">
                    <div class="col-xs-6">
                        <p style="font-weight:bold">New Password:</p>
                    </div>
                    <div class="col-xs-6">
                        <span class="error_msg" id="new_Pwd_Err"></span>
                        <input type="password" id="new_Pwd" name="new_Pwd" class="form-control" required=""/>
                    </div>
                </div>
                <div class="row" style="padding:10px 20px 0px 20px;">
                    <div class="col-xs-6">
                        <p style="font-weight:bold">Confirm Password:</p>
                    </div>
                    <div class="col-xs-6">
                        <span class="error_msg" id="cnf_Pwd_Err"></span>
                        <input type="password" id="cnf_Pwd" name="cnf_Pwd" class="form-control" required=""/>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" id="change_pwd_close_btn" onclick="clear_Change_Password()" class="btn btn-danger" data-dismiss="modal">Close</button>
                <input class="form-control I_button_style btn-primary" onclick="change_Password()" style="width:80px;float: left;" value="Submit" type="button" />
            </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
