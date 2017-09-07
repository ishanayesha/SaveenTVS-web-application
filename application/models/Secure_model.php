<?php

class Secure_model extends CI_Model{

    public function __constuct() {
        parent::__construct();
    }
    
    public function secure_mode()
    {
        $sec_mode=$this->input->post("secmode");    
        $this->db->query("UPDATE tbl_secure SET mode='$sec_mode' WHERE id='1'");
               
    }

    public function get_value()
    {    
        $query=$this->db->query("SELECT * FROM tbl_secure WHERE id='1'");
        return $query->result();
               
    }
    
    public function unlock_sec_mode($pwd)
    {
        $password= md5($this->input->post("pwd"));
        //var_dump($pwd);
        if(strcmp($password, $pwd)==0)
        {
            echo 1;
        }
        else
        {
            echo 0;
        }
    }
}