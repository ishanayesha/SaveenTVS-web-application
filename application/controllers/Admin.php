<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

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
            $this->load->model("Admin_model");
            $this->load->model("Secure_model");
            
	}

        public function profile()
        {
            $data["user_details"]=$this->Signin_model->get_loged_in_user_details();
            $id=$data["user_details"][0]->id;
            $data["secure"]=$this->Secure_model->get_value();
            $data["profile"]=$this->Admin_model->get_Admin_Profle($id);
            
            //Check post method is fired or not
            if ($_SERVER['REQUEST_METHOD'] === 'POST')
            {
                $data["profile"]=$this->Admin_model->update_Profile($id);
                redirect('Admin/profile');
            }
            
            
            $this->load->view('includes/header',$data);
            $this->load->view("admin/profile");
            $this->load->view('includes/sidebar');
            $this->load->view('includes/footer');

        }
        
        public function change_Password()
        {
            $data["user_details"]=$this->Signin_model->get_loged_in_user_details();
            $id=$data["user_details"][0]->id;
            $data["secure"]=$this->Secure_model->get_value();
            
            $this->Admin_model->change_admin_password($id);
            
            //redirect('Admin/profile');
        }
        
public function Upload_pic() {

        $this->Admin_model->upload_a_pic();
}
        
        

}