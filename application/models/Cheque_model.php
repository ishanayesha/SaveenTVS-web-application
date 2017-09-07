<?php

class Cheque_model extends CI_Model{

    public function __constuct() {
        parent::__construct();
    }
    
    public function pay_from_cheque()
    { 
        $route_no=  $this->input->post("route_no");        
        $split = explode("$", $route_no);

        $length=sizeof($split);
        
        for($i=0;$i<$length-1;$i++)
        {
            $query[$i]=  $this->db->query("SELECT id FROM tbl_bike WHERE route_no='$split[$i]'");
            $data["bike_id"]=$query[$i]->row()->id;
        
            $data["cheque_no"]=  $this->input->post("cheque_no");
            $data["amount"]=  $this->input->post("amount");
            $date=  $this->input->post("date");

            $this->db->insert('tbl_cheque', $data);
        }

        

        
    }

    public function get_details()
    {
        $query=  $this->db->query("SELECT c.*,YEAR(c.date) AS cyear,MONTH(c.date) AS cmonth,DAY(c.date) AS cday,c.id AS cid,b.route_no FROM tbl_cheque c, tbl_bike b WHERE c.bike_id=b.id");
        
        if($query->num_rows()>0)
        {
            return $query->result();
        }
        else
        {
            return 0;
        }    
    }
    
    public function get_search_details($route_no)
    {
        $query=  $this->db->query("SELECT c.*,YEAR(c.date) AS cyear,MONTH(c.date) AS cmonth,DAY(c.date) AS cday,c.id AS cid,b.route_no FROM tbl_cheque c, tbl_bike b WHERE b.route_no LIKE '%".$route_no."%' AND c.bike_id=b.id");
        
        if($query->num_rows()>0)
        {
            $cheque=$query->result();
        }
        else
        {
            $cheque=0;
        }
 
   ?>         
                    <?php if(isset($cheque) && $cheque!=0){ foreach ($cheque as $details): ?> 
                    <div class="grid-form1">
                     <div class="tab-content">
                        <div class="tab-pane active" id="horizontal-form">            
                            <form class="form-horizontal" action="<?php echo base_url() ?>index.php/Cheque/pay" method="post">
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

        
<?php        
        
        
//        if(strcasecmp($type, "Route Number"))
//        {
//            $res=  $this->db->query("SELECT * FROM tbl_bike WHERE route_no='$type'");
//            $id=$res->row()->id;
//            $query=  $this->db->query("SELECT * FROM tbl_cheque WHERE bike_id='$id'");
//            return $query->result();
//        }
//        if(strcasecmp($type, "Cheque Number"))
//        {
//            $query=  $this->db->query("SELECT * FROM tbl_cheque WHERE cheque_no='$type'");
//            return $query->result();
//        } 
        
        
    }
    
    
    public function delete_cheque( )
    {
        $cheque_id=$this->input->post("cheque_id");
        $this->db->query("DELETE FROM tbl_cheque WHERE id='$cheque_id'");
        
    }
    
    public function update_cheque()
    {
        $cheque_id=$this->input->post("cid");
        $route_no=$this->input->post("route_no");
        $cheque_no=$this->input->post("cheque_no");
        $amount=$this->input->post("amount");
        $date=$this->input->post("date");
        
        $this->db->query("UPDATE tbl_cheque SET cheque_no='$cheque_no',amount='$amount',date='$date' WHERE id='$cheque_id'");       
    }   
    
    
}