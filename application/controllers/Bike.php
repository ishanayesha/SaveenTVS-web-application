<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bike extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function __construct() 
        {
            parent::__construct();


            //Check the session
            if (!$this->session->userdata('user_id')) {
               header('Location: ' . base_url() . "index.php/Signin");
            }
            
            $this->load->model("Signin_model");
            $this->load->model("Bike_model");
            $this->load->model("Client_model");
            $this->load->model("Secure_model");
            
	}

        public function Add()
        {
            //Check post method is fired or not
            if ($_SERVER['REQUEST_METHOD'] === 'POST')
            {
                $this->Bike_model->add_bike();
                //redirect('Bike/Add');
            }
            else
            {
                               // var_dump("k");
                $data["user_details"]=$this->Signin_model->get_loged_in_user_details();
                $data["secure"]=$this->Secure_model->get_value();
                
                $this->load->view('includes/header',$data);
                $this->load->view("Bike/addNewBike");
                $this->load->view('includes/sidebar');
                $this->load->view('includes/footer');
            }
        }
        
        public function vvvv() {
            $this->load->view("Bike/newEmptyPHP");
            
        }
        
                public function vvv() {
            $this->Bike_model->add_bike_image();
            
        }
        
        public function add_bike_image()
        {
            $this->Bike_model->add_bike_image();
        }
        
        public function Stocks()
        {
            $data["stock"]=  $this->Bike_model->get_bike_stock();
            $data["user_details"]=$this->Signin_model->get_loged_in_user_details();
            $data["secure"]=$this->Secure_model->get_value();
            
            $data["search"]="id='stockssearch'";
            $data["placeholder"]="Bike Model";
            
            $this->load->view('includes/headerHome',$data);
            $this->load->view("Bike/stocks");
            $this->load->view('includes/sidebar');
            $this->load->view('includes/footer');
        }
        
        public function search_stock()
        {
            $this->Bike_model->get_search_bike_for_stock();
        }
        
        public function sell()
        {                        
            $data["bike"]=$this->Bike_model->get_bike_details();
            $data["user_details"]=$this->Signin_model->get_loged_in_user_details();
            $data["search"]="id='sellsearch'";
            $data["placeholder"]="Route Number";
            $data["secure"]=$this->Secure_model->get_value();
            
            $this->load->view('includes/headerHome',$data);
            $this->load->view("Bike/sell");
            $this->load->view('includes/sidebar');
            $this->load->view('includes/footer');
            
        }

        public function duplicate_sell()
        {                        
            $data["bike"]=$this->Bike_model->get_bike_details();
            $data["user_details"]=$this->Signin_model->get_loged_in_user_details();
            $data["search"]="id='sellsearch'";
            $data["secure"]=$this->Secure_model->get_value();
            
            $this->load->view('includes/headerHome',$data);
            $this->load->view("Bike/sell");
            $this->load->view('includes/sidebar');
            $this->load->view('includes/footer');
            
        }        
        
        
        public function sell_search()
        {
            $this->Bike_model->get_search_bike_for_sell();
        }
        
        public function selling($id)
        {
            $data["bike"]=$this->Bike_model->get_a_selling_bike_details($id);
            $data["user_details"]=$this->Signin_model->get_loged_in_user_details();
            $data["secure"]=$this->Secure_model->get_value();
            
            if(isset($data["bike"][0]->id))
            {
//            if ($_SERVER['REQUEST_METHOD'] === 'POST')
//            {
//                $data["selling"]=$this->Bike_model->sell_bike($id);
//                redirect('Bike/selling');
//            }

            $this->load->view('includes/header',$data);
            $this->load->view("Bike/selling");
            $this->load->view('includes/sidebar');
            $this->load->view('includes/footer');
            }
            else
            {
                header('Location: ' . base_url() . "index.php/Bike/sell");
            }
            
        }
        
        public function bill()
        {
            $bike_id=$this->input->post("bike_id");
            
            $data["client"]=$this->Client_model->buy();
            $invoice_no=$this->Bike_model->generate_bill($bike_id,$data["client"]["client_id"]);
            $data["secure"]=$this->Secure_model->get_value();
            
            //$data["x"]=$this->input->post("fname");
            //var_dump($data);
            //$this->print_bill($bike_id,$data["client"]["client_id"]);
            $client_id=$data["client"]["client_id"];
                    
            echo "http://tvssaveen.000webhostapp.com/index.php/Bike/print_bill/$bike_id/$client_id/$invoice_no";
            
            
        }
        
        
        
        public function print_bill($bike_id,$client_id,$invoice_no) 
        {
            $data["invoice_no"] = sprintf("%06d", $invoice_no);

            $res = $this->db->query("SELECT * FROM tbl_bill WHERE invoice_no=$invoice_no");
            $data["date"]=$res->row()->date;
        
            $query = $this->db->query("SELECT * FROM tbl_bike WHERE id=$bike_id");
            $data["bike"]=$query->result();

            $query = $this->db->query("SELECT * FROM tbl_client WHERE id=$client_id");
            $data["client"]=$query->result();    
            $data["secure"]=$this->Secure_model->get_value();

            $this->load->view("Bike/bill",$data);
            
        }
        
//        public function bill_details($bike_id,$client_id,$invoice) 
//        {
//            //get the invoice number
//            $res = $this->db->query("SELECT * FROM tbl_bill WHERE invoice_no=$invoice");
//            $data["date"]=$res->row()->date;
//            
//            $data["invoice_no"] = $invoice;
//        
//            $query = $this->db->query("SELECT * FROM tbl_bike WHERE id=$bike_id");
//            $data["bike"]=$query->result();
//
//            $query = $this->db->query("SELECT * FROM tbl_client WHERE id=$client_id");
//            $data["client"]=$query->result();            
//
//            $this->load->view("Bike/bill",$data);
//            
//        }        
        
        public function today_sale()
        {
            $data["user_details"]=$this->Signin_model->get_loged_in_user_details();
            $data["details"]=  $this->Client_model->get_today_client_details();
            $data["secure"]=$this->Secure_model->get_value();
            
            $query=$this->db->query("SELECT b.invoice_no,sum(m.price) AS totsale 
                                  FROM tbl_bill b, tbl_client c, tbl_bike m
                                  WHERE b.client_id = c.id
                                  AND b.bike_id = m.id
                                  AND b.date LIKE '%".date("y-m-d")."%'");
            
            $data["totsale"]=  $query->row()->totsale;    
            
            
            $this->load->view('includes/header',$data);
            $this->load->view("Bike/todaySale");
            $this->load->view('includes/sidebar');
            $this->load->view('includes/footer');
        }
        
        public function all_sale()
        {
            $data["user_details"]=$this->Signin_model->get_loged_in_user_details();
            $data["secure"]=$this->Secure_model->get_value();
            //$data["details"]=  $this->Client_model->get_all_sale_details();

            
            $this->load->view('includes/headerHomeAllSale',$data);
            $this->load->view("Bike/allSale");
            $this->load->view('includes/sidebar');
            $this->load->view('includes/footer');//redirect('Bike/all_sale');
        }
        
        public function sale()
        {
            $data["month"]=$this->input->post("month");
            $data["secure"]=$this->Secure_model->get_value();
            
            $month=$data["month"];
            $dateObj = new DateTime;
            $year = $dateObj->format("Y");

                $details=$data["details"]=  $this->Client_model->get_all_sale_details();
               // var_dump($data["details"]);
                $query=$this->db->query("SELECT b.invoice_no,sum(m.price) AS totsale 
                                  FROM tbl_bill b, tbl_client c, tbl_bike m
                                  WHERE b.client_id = c.id
                                  AND b.bike_id = m.id
                                  AND MONTH( b.date ) =  '$month' AND YEAR( b.date ) =  '$year'");
                $totsale=$data["totsale"]=  $query->row()->totsale;
                
    ?>            
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
            <div style="background-color: lightslategrey;">
                <p style="color: white;font-weight: bold;font-size: 1.2em; padding: 25px;" class="">Total sale for <?php echo $m;?> is Rs:<?php echo $totsale;?></p>
            </div>
            </div>
    
        <?php }?>





                        <?php 
                                if(isset($details) && $details!=0)
                                {?>                                
				  <table id="table-two-axis" class="two-axis">
					<thead>
					  <tr>
						<th>Name</th>
						<th>Telephone</th>
						<th>Bike Model</th>
						<th>Route Number</th>
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
                                        <p style="color: white;font-weight: bold;font-size: 20px; padding: 25px;" class="">No sale details found</p>
                                    </div>
                                    </div>

                                <?php 
                                }?>

                 
   <?php         
            
        }

        public function manage()
        {   
            $data["bike"]=$this->Bike_model->get_bike_details();
            $data["user_details"]=$this->Signin_model->get_loged_in_user_details();
            
            $data["search"]="id='managesearch'";
            $data["placeholder"]="Route Number";
            $data["secure"]=$this->Secure_model->get_value();
            
            $this->load->view('includes/headerHome',$data);
            $this->load->view("Bike/manageBike");
            $this->load->view('includes/sidebar');
            $this->load->view('includes/footer');
            
        }

        public function bike_details_for_update()
        {
            $id=$this->input->post("id");
            $this->Bike_model->get_a_bike_details_for_update($id);
        }        
        
        
        public function update()
        {
            
            $this->Bike_model->update_bike();         
            
            
            
            
//            $this->Bike_model->update_bike();
//            
//            $data["bike"]=$this->Bike_model->get_bike_details();
//            $data["user_details"]=$this->Signin_model->get_loged_in_user_details();
//            $data["search"]="id='managesearch'";
//            
//            $this->load->view('includes/headerHome',$data);
//            $this->load->view("Bike/manageBike");
//            $this->load->view('includes/sidebar');
//            $this->load->view('includes/footer');
        }
        
        public function delete()
        {
            $this->Bike_model->delete_bike();
        }
        
        public function manage_search()
        {
            $this->Bike_model->get_search_bike_for_manage();
        }  
        
        public function cheque_routeno()
        {
            $this->Bike_model->cheque_routeno_exist();
        }
}