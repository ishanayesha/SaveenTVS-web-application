<!-- tables -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/template/css/table-style.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/template/css/basictable.css" />
<script type="text/javascript" src="<?php echo base_url() ?>assets/template/js/jquery.basictable.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
      $('#table').basictable();

      $('#table-breakpoint').basictable({
        breakpoint: 768
      });

      $('#table-swap-axis').basictable({
        swapAxis: true
      });

      $('#table-force-off').basictable({
        forceResponsive: false
      });

      $('#table-no-resize').basictable({
        noResize: true
      });

      $('#table-two-axis').basictable();

      $('#table-max-height').basictable({
        tableWrapper: true
      });
    });
</script>
<!-- //tables -->




            <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Sale</a> <i class="fa fa-angle-right"></i>Today Sale</li>
            </ol>


<!--inner block start here-->
<div class="inner-block">

    <div class="grid-form1">
                                
                                <h3 style="color:#008DE7">Today Sale</h3>
                                
                                <?php 
                                if(isset($details) && $details!=0)
                                {?>                                
				  <table id="table-two-axis" class="two-axis">
					<thead>
					  <tr>
						<th>Name</th>
						<th>Address</th>
						<th>Telephone</th>
						<th>Bike Model</th>
						<th>Route Number</th>
                                                <th>Bill Details</th>
					  </tr>
					</thead>
					<tbody>

                                    <?php foreach ($details as $value) :?>
					  <tr>
                                              <td><?php echo $value->fname;?> <?php echo $value->lname?></td>
						<td><?php echo $value->address;?></td>
						<td><?php echo $value->tel;?></td>
						<td><?php echo $value->model;?></td>
						<td><?php echo $value->route_no;?></td>
                                                <td><a href="http://localhost/tvs/index.php/Bike/print_bill/<?php echo $value->mid;?>/<?php echo $value->cid;?>/<?php echo $value->invoice_no;?>">Click</a></td>
					  </tr>
                                          
                                    <?php endforeach;?>
                                    
                                
 
					</tbody>
				  </table>    
    
                                <?php
                                }
                                else
                                {?>

                                    <div class="sec-sub-title text-center">
                                    <div style="background-color: #ff4242;">
                                        <p style="color: white;font-weight: bold;font-size: 20px; padding: 25px;" class="">No sale details found</p>
                                    </div>
                                    </div>

                                <?php 
                                }?>
                        
    
    
    
    
    
                                <div class="clearfix" style="padding: 17px;"></div>
    
    
        <?php if(isset($totsale)){?>
            <div class="sec-sub-title text-center">
            <div style="background-color: #ff4242;">
                <p style="color: white;font-weight: bold;font-size: 1.2em; padding: 25px;" class="">Total sale is Rs:<?php echo $totsale;?></p>
            </div>
            </div>
    
        <?php }?>                
                
    
    
    </div> 
    
    
</div>
<!--inner block end here-->
