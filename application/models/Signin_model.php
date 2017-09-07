<?php

class Signin_model extends CI_Model{

    public function __constuct() {
        parent::__construct();
    }

    public function signin_action(){

        $email = $this->input->post("email");
        $password = md5($this->input->post("password"));
        
        $query = $this->db->get_where('tbl_user', array('email' => $email,'password' => $password));
        
        if ($query->num_rows() > 0)
        {
            $member = $query->row();
            $this->session->set_userdata('user_id', $member->id);
            
            return true;
        } 
        else
        {    
            return false;
        }

    }
    
        
    public function get_loged_in_user_details()
    {
        $id = $this->session->userdata('user_id');

        $query = $this->db->get_where('tbl_user', array('id' => $id));
        return $query->result();
    }
    
}