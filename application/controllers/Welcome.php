<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

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
             $this->load->model("Secure_model");
  
	}
        
    	public function index()
	{
                $data["user_details"]=$this->Signin_model->get_loged_in_user_details();
                $data["bike"]=$this->Bike_model->get_bike_details();
                $data["secure"]=$this->Secure_model->get_value();
                
                $data["search"]="id='homesearch'";
                $data["placeholder"]="Route Number";

		$this->load->view('includes/headerHome',$data);
                $this->load->view('home/index');
                $this->load->view('includes/sidebar');
                $this->load->view('includes/footer');
	}
        
        public function search()
        {
            $this->Bike_model->get_search_bike();

        }
        
        public function get_a_bike_details()
        {
            $id=$this->input->post("id");
            $this->Bike_model->get_a_bike_details($id);
        }
    
}
