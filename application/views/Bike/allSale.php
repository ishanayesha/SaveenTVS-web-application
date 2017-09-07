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
                    <li class="breadcrumb-item"><a href="#">Sale</a> <i class="fa fa-angle-right"></i>All Sale</li>
            </ol>


<!--inner block start here-->
<div class="inner-block">

    <div class="grid-form1">
                   
        <div id="all_sale">
            
        <h3 style="color:#008DE7">All Sale <?php  if(isset($month)){ 
            if($month==1)
            echo "January";
            else if($month==2)
            echo "February";
            else if($month==3)
            echo "March";
            else if($month==4)
            echo "April";
            else if($month==5)
            echo "May";
            else if($month==6)
            echo "June";
            else if($month==7)
            echo "July";
            else if($month==8)
            echo "August";
            else if($month==9)
            echo "September";
            else if($month==10)
            echo "Cotomber";  
            else if($month==11)
            echo "November";
            else if($month==12)
            echo "December";             
            
            
            
        } ?></h3>
                                
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
                        
<?php  if(isset($month)){
    $m="";
            if($month==1)
            $m="January";
            else if($month==2)
            $m= "February";
            else if($month==3)
            $m= "March";
            else if($month==4)
            $m= "April";
            else if($month==5)
            $m= "May";
            else if($month==6)
            $m= "June";
            else if($month==7)
            $m= "July";
            else if($month==8)
            $m= "August";
            else if($month==9)
            $m= "September";
            else if($month==10)
            $m= "Cotomber";  
            else if($month==11)
            $m= "November";
            else if($month==12)
            $m= "December"; }
            
?>
        
        <div class="clearfix" style="padding: 17px;"></div>
                      
                      
        <?php if(isset($m) && isset($totsale)){?>
            <div class="sec-sub-title text-center">
            <div style="background-color: #ff4242;">
                <p style="color: white;font-weight: bold;font-size: 1.2em; padding: 25px;" class="">Total sale for <?php echo $m;?> is Rs:<?php echo $totsale;?></p>
            </div>
            </div>
    
        <?php }?>
    
        
        </div>
        
        <div id="result">
        </div>
                <div class="clearfix"></div>
    
    
    
    
    </div> 
    
    
</div>
<!--inner block end here-->
