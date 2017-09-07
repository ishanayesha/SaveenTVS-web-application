<?php

class Signup_model extends CI_Model{

    public function __constuct() {
        parent::__construct();
    }

    public function signup_action(){

        $data["fname"] = ucfirst($this->input->post("fname"));
        $data["lname"] = ucfirst($this->input->post("lname"));
        $data["email"] = $this->input->post("email");
        $data["tel"] = $this->input->post("tel");
        $data["password"] = md5($this->input->post("password"));
        $data["level"] = $this->input->post("level");

        $this->db->insert('tbl_user', $data);
    }
    
}