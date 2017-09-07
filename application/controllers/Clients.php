<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clients extends CI_Controller {

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
            $this->load->model("Client_model");
            $this->load->model("Secure_model");
            
	}

        public function index()
        {
            $data["user_details"]=$this->Signin_model->get_loged_in_user_details();
            
            $data["search"]="id='clientsearch'";
            $data["placeholder"]="Invoice Number";
            $data["secure"]=$this->Secure_model->get_value();
                    
            $data["details"]=  $this->Client_model->get_client_details();
            
            $this->load->view('includes/headerHome',$data);
            $this->load->view("Clients/clients");
            $this->load->view('includes/sidebar');
            $this->load->view('includes/footer');
        }

        public function search()
        {
                        //var_dump("asas");
           $this->Client_model->search_client_details();
        }        
        
}