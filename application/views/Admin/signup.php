<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
<title>Pooled Admin Panel Category Flat Bootstrap Responsive Web Template | Sign Up :: w3layouts</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Pooled Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Bootstrap Core CSS -->
<link href="<?php echo base_url() ?>assets/template/css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="<?php echo base_url() ?>assets/template/css/style.css" rel='stylesheet' type='text/css' />
<link rel="stylesheet" href="<?php echo base_url() ?>assets/template/css/morris.css" type="text/css"/>
<!-- Graph CSS -->
<link href="<?php echo base_url() ?>assets/template/css/font-awesome.css" rel="stylesheet">
<link rel="stylesheet" href="<?php echo base_url() ?>assets/template/css/jquery-ui.css"> 
<!-- jQuery -->
<script src="<?php echo base_url() ?>assets/template/js/jquery-2.1.4.min.js"></script>
<!-- //jQuery -->
<link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css'/>
<link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<!-- lined-icons -->
<link rel="stylesheet" href="<?php echo base_url() ?>assets/template/css/icon-font.min.css" type='text/css' />
<!-- //lined-icons -->



<!--my-->
<link href="<?php echo base_url() ?>assets/css/style.css" rel="stylesheet"> 
<script type="text/javascript" src="<?php echo base_url() ?>assets/js/myscript.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/js/validation.js"></script>
<!--//my-->


<!--sweetalert-->
<link href="<?php echo base_url() ?>assets/sweetalert/sweetalert.css" rel="stylesheet"> 
<script type="text/javascript" src="<?php echo base_url() ?>assets/sweetalert/sweetalert.min.js"></script>
<!--sweetalert-->



</head> 
<body>
	<div class="main-wthree">
	<div class="container">
	<div class="sin-w3-agile">
		<h2>Sign Up</h2>
		<form action="<?php echo base_url() ?>index.php/Signup/signup_action" onsubmit="return validateSignup(this);" method="post">
			<div class="username">
                                <p id="fnameErr" class="error_msg"></p>
				<span class="username">First Name:</span>
                                <input type="text" id="fname" name="fname" class="name" placeholder="" required="">
				<div class="clearfix"></div>
			</div>
                   	<div class="username">
                                <p id="lnameErr" class="error_msg"></p>
				<span class="username">Last Name:</span>
                                <input type="text" id="lname" name="lname" class="name" placeholder="" required="">
				<div class="clearfix"></div>
			</div>
			<div class="username">
                                <p id="emailErr" class="error_msg"></p>
				<span class="username">Email:</span>
                                <input type="email" id="email" name="email" class="name" placeholder="" required="">
				<div class="clearfix"></div>
			</div>
                    	<div class="username">
                                <p id="telErr" class="error_msg"></p>
				<span class="username">Telephone:</span>
                                <input type="tel" id="tel" name="tel" class="name" placeholder="" required="">
				<div class="clearfix"></div>
			</div>
			<div class="password-agileits">
                                <p id="pwdErr" class="error_msg"></p>
				<span class="username">Password:</span>
                                <input type="password" id="password" name="password" class="password" placeholder="" required="">
				<div class="clearfix"></div>
			</div>
			<div class="password-agileits">
                                <p id="conpwdErr" class="error_msg"></p>
				<span class="username">Confirm Password:</span>
                                <input type="password" id="con_password" name="con_password" class="password" placeholder="" required="">
				<div class="clearfix"></div>
			</div>
                  	<div class="">
                                <p id="levelErr" class="error_msg"></p>
				<span class="">Level:</span>
                                <select name="level" id="level" class="form-control" required="" style="width: 71%;height: 41px;">
                                    <option>Select a Level</option>
                                    <option>7</option>
                                    <option>1</option>
                                </select>
				
			</div>
			<div class="login-w3">
					<input type="submit" class="login" value="Sign Up">
			</div>
			<div class="clearfix"></div>
		</form>

		<div class="back">
						<a href="<?php echo base_url() ?>index.php">Back to home</a>
				</div>
				<div class="footer">
					<p>&copy; 2016 Pooled . All Rights Reserved | Design by <a href="http://w3layouts.com">W3layouts</a></p>
				</div>
	</div>
	</div>
	</div>
</body>
</html>