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
                    <li class="breadcrumb-item"><a href="<?php echo base_url() ?>index.php">Bike</a> <i class="fa fa-angle-right"></i>Stocks</li>
            </ol>


<!--inner block start here-->
<div class="inner-block">

    <div class="grid-form1">
                                  <h3 style="color:#008DE7">Stocks</h3>
                                  
                                  
                                  <div id="stock">                      
                                  <?php if(isset($stock)){
                                       if($stock!=0){
                                  ?>
                                  
                                  <table id="table-two-axis" class="two-axis" style="width: 80%;margin: auto;">
					<thead>
					  <tr>
						<th>Bike Model</th>
						<th>Stocks</th>
					  </tr>
					</thead>
					<tbody>
                    
                                        <?php  foreach ($stock as $details): ?>    
					  <tr>
                                              <td><?php echo $details->model;?></td>
                                              <td><?php echo $details->stock  ;?></td>
					  </tr>
                                        <?php endforeach;?>

					
                                        </tbody>
				  </table>  
                                        
                                        
                                       <?php }                               
                                        else{
                                        ?>
                                          
                                    <div class="sec-sub-title text-center">
                                    <div style="background-color: #ff4242;">
                                        <p style="color: white;font-weight: bold;font-size: 20px; padding: 25px;" class="">No stock details found</p>
                                    </div>
                                    </div>
                                          
                                          
                                        <?php  
                                        }
                                            }?>  
                                  </div>
                                  
                                  <div id="result"></div>
    
    </div> 
    
<div class="clearfix"></div>

</div>
<!--inner block end here-->
