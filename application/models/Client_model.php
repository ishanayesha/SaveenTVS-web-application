<?php

class Client_model extends CI_Model{

    public function __constuct() {
        parent::__construct();
    }
    
    public function buy()
    {
        $data["fname"]=$this->input->post("fname");
        $data["lname"]=$this->input->post("lname");
        $data["tel"]=$this->input->post("tel");
        $data["address"]=$this->input->post("address");

        $this->db->insert('tbl_client', $data);
        
        $data["client_id"]=$this->db->insert_id();
        $data["bike_id"]=$this->input->post("bike_id");
        return $data;
    }
    
    public function get_client_details()
    {
        $query=  $this->db->query("SELECT b.invoice_no,c.id AS cid,c.fname,c.lname,c.address,c.tel,m.id AS mid,m.* FROM tbl_bill b,tbl_client c,tbl_bike m
                                   WHERE b.client_id=c.id AND b.bike_id=m.id");

        if($query->num_rows()>0)
        {
            return $query->result();
        }
        else
        {
            return 0;
        }
        
    }

    public function get_today_client_details()
    {
        $query=  $this->db->query("SELECT b.invoice_no,c.id AS cid,c.fname,c.lname,c.address,c.tel,m.id AS mid,m.* FROM tbl_bill b,tbl_client c,tbl_bike m
                                   WHERE b.client_id=c.id AND b.bike_id=m.id AND b.date LIKE '%".date("y-m-d")."%' ");

        if($query->num_rows()>0)
        {
            return $query->result();
        }
        else
        {
            return 0;
        }
        
    }    

    public function get_all_sale_details()
    {
        $month=  $this->input->post("month");
        
        $dateObj = new DateTime;
        $year = $dateObj->format("Y");

        $query=  $this->db->query(" SELECT b.invoice_no,MONTH( b.date ) AS month, c.id AS cid, c.fname, c.lname, c.address, c.tel, m.id AS mid, m . * 
                                    FROM tbl_bill b, tbl_client c, tbl_bike m
                                    WHERE b.client_id = c.id
                                    AND b.bike_id = m.id
                                    AND MONTH( b.date ) =  '$month' AND YEAR( b.date ) =  $year");

        if($query->num_rows()>0)
        {
            return $query->result();
        }
        else
        {
            return 0;
        }
        
    } 
    
    
    public function search_client_details()
    {
        $invoice_no=  $this->input->post("invoice_no");
        
        $query=  $this->db->query("SELECT b.invoice_no,c.id AS cid,c.fname,c.lname,c.address,c.tel,m.id AS mid,m.* FROM tbl_bill b,tbl_client c,tbl_bike m
                                   WHERE b.client_id=c.id AND b.bike_id=m.id AND b.invoice_no LIKE '%".$invoice_no."%'");

        $details=$query->result();
        
        if($query->num_rows()>0)
        {
?>
                                
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
                <p style="color: white;font-weight: bold;font-size: 20px; padding: 25px;" class="">No client details found</p>
            </div>
            </div>

        <?php 
        }
        
    }
}