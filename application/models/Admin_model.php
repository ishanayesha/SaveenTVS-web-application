<?php

class Admin_model extends CI_Model{

    public function __constuct() {
        parent::__construct();
    }
    
    public function get_Admin_Profle($id)
    {
        $profile=$this->db->get_where('tbl_user', array('id' => $id));
        return $profile->result();
    }
    
    public function update_Profile($id)
    {
        $fname = ucfirst($this->input->post("fname"));
        $lname = ucfirst($this->input->post("lname"));
        $email = $this->input->post("email");
        $tel = $this->input->post("tel");

        $query = $this->db->query("UPDATE tbl_user SET fname='$fname',lname='$lname',email='$email',tel=$tel WHERE id=$id");
        $profile=$this->db->get_where('tbl_user', array('id' => $id));
        return $profile->result();

    }
    
    public function change_admin_password($id)
    {
        $old_Pwd=md5($this->input->post("old_Pwd"));
        $new_Pwd=$this->input->post("new_Pwd");
        $cnf_Pwd=$this->input->post("cnf_Pwd");
        
        $result=$this->db->get_where('tbl_user', array('id' => $id));
        $pwd=$result->row()->password;

            if(strcmp($old_Pwd, $pwd)==0)
            {
                if(strcmp(md5($new_Pwd), $old_Pwd)!=0)
                {
                
                    if(strcmp($new_Pwd, $cnf_Pwd)==0)
                    {
                        $new_Pwd=  md5($new_Pwd);
                        $query = $this->db->query("UPDATE tbl_user SET password='$new_Pwd' WHERE id=$id");
                    }
                    else
                    {
                        echo '*Confirm password is not match';
                    }
                }
                else
                {
                    echo '*New password is same as old password';
                }
            }
            else
            {
                echo '*Old password is incorrect';
            }

    }
    
    public function upload_a_pic() {
            $img=$this->input->post("userfile");
            $config['upload_path'] = './uploads/n/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '100000';
            //$config['max_width'] = '1024';
            //$config['max_height'] = '768';

            $this->load->library('upload', $config);

            //change name of the uoloading file
            $config['file_name'] = uniqid();
            //$config['overwrite'] = TRUE;
            $this->upload->initialize($config);



            if (!$this->upload->do_upload())
            {
                $error = array('error' => $this->upload->display_errors());
            } 
            else 
            {
                $data = array('upload_data' => $this->upload->data());

                $upload_data = $this->upload->data();
                
                //get $file_type;
                $file_type = $upload_data['file_ext'];

                //insert image into the database
                $dbData["cus_profile_pic"] =  $config['file_name'].$file_type;
                $this->db->where('cus_id', $uid);
                $this->db->update('tbl_users', $dbData);
                
            }

}
    
    
    
}
