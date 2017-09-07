<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cheque extends CI_Controller {

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
            $this->load->model("Cheque_model");
            $this->load->model("Bike_model");
            $this->load->model("Secure_model");
            
	}
        
        public function pay()
        {
            $data["user_details"]=$this->Signin_model->get_loged_in_user_details();
            $data["secure"]=$this->Secure_model->get_value();
            
            $this->load->view('includes/header',$data);
            $this->load->view("Cheque/pay");
            $this->load->view('includes/sidebar');
            $this->load->view('includes/footer');
            
        }
        
        public function pay_action()
        {
            $this->Cheque_model->pay_from_cheque();
            
        }
        
        public function details()
        {
            $data["user_details"]=$this->Signin_model->get_loged_in_user_details();
            $data["search"]="id='chequesearch'";
            $data["placeholder"]="Route Number";
            $data["secure"]=$this->Secure_model->get_value();
                
            $data["cheque"]=$this->Cheque_model->get_details();

            $this->load->view('includes/headerHome',$data);
            $this->load->view('Cheque/details');
            $this->load->view('includes/sidebar');
            $this->load->view('includes/footer');            
        }

        public function search_details()
        {
            $route_no=  $this->input->post("route_no");
            $this->Cheque_model->get_search_details($route_no);    
        }  
        
        public function delete()
        {
            $this->Cheque_model->delete_cheque();
            
        }
        
        public function update()
        {
            $this->Cheque_model->update_cheque();
            
        }

}