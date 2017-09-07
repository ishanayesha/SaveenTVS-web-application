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
                    <li class="breadcrumb-item"><a href="<?php echo base_url() ?>index.php">Home</a> <i class="fa fa-angle-right"></i>Clients</li>
            </ol>


<!--inner block start here-->
<div class="inner-block">

    <div class="grid-form1">
                                
                                <h3 style="color:#008DE7">Clients</h3>
                                
                                <div id="client">  
                                
                                <?php 
                                if(isset($details) && $details!=0)
                                {   ?> 
                                
				  <table id="table-two-axis" class="two-axis">
					<thead>
					  <tr>
						<th>Name</th>
						<th>Telephone</th>
						<th>Bike Model</th>
						<th>Route No</th>
                                                <th>Invoice No</th>
						<th>Brought Date</th>
                                                <th>Bill</th>
					  </tr>
					</thead>
					<tbody>

                                   <?php foreach ($details as $value) :?>
					  <tr>
                                              <td><?php echo $value->fname;?> <?php echo $value->lname?></td>
						<td><?php echo $value->tel;?></td>
						<td><?php echo $value->model;?></td>
						<td><?php echo $value->route_no;?></td>
                                                <td><?php echo $value->invoice_no;?></td>
						<td><?php echo $value->date;?></td>
                                                <td><a href="http://tvssaveen.000webhostapp.com/index.php/Bike/print_bill/<?php echo $value->mid;?>/<?php echo $value->cid;?>/<?php echo $value->invoice_no;?>">Click</a></td>
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
                                        <p style="color: white;font-weight: bold;font-size: 20px; padding: 25px;" class="">No client details found</p>
                                    </div>
                                    </div>

                                <?php 
                                }?> 

                                </div>
                                
                                <div id="result"></div>
    
    
    
    
    
                <div class="clearfix"></div>
    
    
    
    
    </div> 
    
    
</div>
<!--inner block end here-->
