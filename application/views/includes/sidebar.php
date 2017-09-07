			<!--/sidebar-menu-->
				<div class="sidebar-menu">
					<header class="logo1">
						<a href="#" class="sidebar-icon"> <span class="fa fa-bars"></span> </a> 
					</header>
						<div style="border-top:1px ridge rgba(255, 255, 255, 0.15)"></div>
                           <div class="menu">
									<ul id="menu" >
                                                                            	
										<li><a href="<?php echo base_url() ?>index.php"><i class="fa fa-tachometer"></i> <span>Dashboard</span><div class="clearfix"></div></a></li>
									
                                                                                <li><a href="#"><i class="fa fa-user    "></i> <span>Admin</span><div class="clearfix"></div></a>
                                                                                    <ul id="menu-academico-sub" >
                                                                                        <li id="menu-academico-avaliacoes" ><a href="<?php echo base_url() ?>index.php/Admin/profile">Profile</a></li>
											<li id="menu-academico-avaliacoes" ><a href="<?php echo base_url() ?>index.php/Signup">Add a new user</a></li>
                                                                                    </ul>
                                                                                </li>
									
										 <li id="menu-academico" ><a href="#"><i class="fa fa-motorcycle nav_icon"></i><span>Bike</span><div class="clearfix"></div></a>
                                                                                    <ul id="menu-academico-sub" >
                                                                                        <li id="menu-academico-avaliacoes" ><a href="<?php echo base_url() ?>index.php/Bike/Add">Add a new bike</a></li>
                                                                                        <li id="menu-academico-avaliacoes" ><a href="<?php echo base_url() ?>index.php/Bike/manage">Manage bike details</a></li>
											<li id="menu-academico-avaliacoes" ><a href="<?php echo base_url() ?>index.php/Bike/Stocks">Stocks</a></li>
                                                                                    </ul>
                                                                                 </li>
                                                                                 
                                                                                 <li><a href="<?php echo base_url() ?>index.php/Bike/sell"><i class="fa fa-shopping-cart"></i> <span>Sell a bike</span><div class="clearfix"></div></a></li>
										
                                                                                 
                                                                                 <?php if(isset($secure) && $secure[0]->mode==0){?>
                                                                                 
                                                                                 <li><a href="<?php echo base_url() ?>index.php/Clients"><i class="fa fa-users"></i> <span>Clients</span><div class="clearfix"></div></a></li>
										
                                                                                 <li><a href="#"><i class="fa fa-bar-chart"></i> <span>Salle</span><div class="clearfix"></div></a>
                                                                                    <ul id="menu-academico-sub" >
                                                                                        <li id="menu-academico-avaliacoes" ><a href="<?php echo base_url() ?>index.php/Bike/today_sale">Today</a></li>
											<li id="menu-academico-avaliacoes" ><a href="<?php echo base_url() ?>index.php/Bike/all_sale">All</a></li>
                                                                                    </ul>
                                                                                 </li>
                                                                                 
                                                                                 <li><a href="#"><i class="fa fa-dollar"></i> <span>Cheque</span><div class="clearfix"></div></a>
                                                                                    <ul id="menu-academico-sub" >
                                                                                        <li id="menu-academico-avaliacoes" ><a href="<?php echo base_url() ?>index.php/Cheque/pay">Pay</a></li>
											<li id="menu-academico-avaliacoes" ><a href="<?php echo base_url() ?>index.php/Cheque/details">Details</a></li>
                                                                                    </ul>
                                                                                 </li>
                                                                                 
                                                                                 <?php }?>
                                                                                 
<!--                                                                                 
									<li><a href="gallery.html"><i class="fa fa-picture-o" aria-hidden="true"></i><span>Gallery</span><div class="clearfix"></div></a></li>
									<li id="menu-academico" ><a href="charts.html"><i class="fa fa-bar-chart"></i><span>Charts</span><div class="clearfix"></div></a></li>
									 <li id="menu-academico" ><a href="#"><i class="fa fa-list-ul" aria-hidden="true"></i><span> Short Codes</span> <span class="fa fa-angle-right" style="float: right"></span><div class="clearfix"></div></a>
										   <ul id="menu-academico-sub" >
										   <li id="menu-academico-avaliacoes" ><a href="icons.html">Icons</a></li>
											<li id="menu-academico-avaliacoes" ><a href="typography.html">Typography</a></li>
											<li id="menu-academico-avaliacoes" ><a href="faq.html">Faq</a></li>
										  </ul>
										</li>
									<li id="menu-academico" ><a href="errorpage.html"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i><span>Error Page</span><div class="clearfix"></div></a></li>
									  <li id="menu-academico" ><a href="#"><i class="fa fa-cogs" aria-hidden="true"></i><span> UI Components</span> <span class="fa fa-angle-right" style="float: right"></span><div class="clearfix"></div></a>
										   <ul id="menu-academico-sub" >
										   <li id="menu-academico-avaliacoes" ><a href="button.html">Buttons</a></li>
											<li id="menu-academico-avaliacoes" ><a href="grid.html">Grids</a></li>
										  </ul>
										</li>
									 <li><a href="tabels.html"><i class="fa fa-table"></i>  <span>Tables</span><div class="clearfix"></div></a></li>
									<li><a href="maps.html"><i class="fa fa-map-marker" aria-hidden="true"></i>  <span>Maps</span><div class="clearfix"></div></a></li>
							        <li id="menu-academico" ><a href="#"><i class="fa fa-file-text-o"></i>  <span>Pages</span> <span class="fa fa-angle-right" style="float: right"></span><div class="clearfix"></div></a>
										 <ul id="menu-academico-sub" >
											<li id="menu-academico-boletim" ><a href="calendar.html">Calendar</a></li>
											<li id="menu-academico-avaliacoes" ><a href="signin.html">Sign In</a></li>
											<li id="menu-academico-avaliacoes" ><a href="signup.html">Sign Up</a></li>
											

										  </ul>
									 </li>
									<li><a href="#"><i class="fa fa-check-square-o nav_icon"></i><span>Forms</span> <span class="fa fa-angle-right" style="float: right"></span><div class="clearfix"></div></a>
									  <ul>
										<li><a href="input.html"> Input</a></li>
										<li><a href="validation.html">Validation</a></li>
									</ul>
									</li>-->
								  </ul>
								</div>
							  </div>