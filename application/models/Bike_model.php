<?php

class Bike_model extends CI_Model{

    public function __constuct() {
        parent::__construct();
    }
    
    public function add_bike()
    {           
        //var_dump($this->input->post($img));
        $img=$this->input->post("image");

        
        $data["route_no"]=$this->input->post("route_no");
        $data["model"]=$this->input->post("model");
        $data["chassis_no"]=$this->input->post("chassis_no");
        $data["engine_no"]=$this->input->post("engine_no");
        $data["color"]=$this->input->post("color");
        $data["cost"]=$this->input->post("cost");
        $data["price"]=$this->input->post("price");
        $data["date"]= date("Y-m-d H:i:s");
        
        
        
        
        
        
//           //$img=$this->input->post("userfile");
//            $config['upload_path'] = './uploads/';
//            $config['allowed_types'] = 'gif|jpg|png';
//            $config['max_size'] = '100000';
//            //$config['max_width'] = '1024';
//            //$config['max_height'] = '768';
//
//            $this->load->library('upload', $config);
//
//            //change name of the uoloading file
//            $config['file_name'] = uniqid();
//            //$config['overwrite'] = TRUE;
//            $this->upload->initialize($config);
//
//            
//
//            if (!$this->upload->do_upload())
//            {
//                $error = array('error' => $this->upload->display_errors());
//                var_dump($error);
//            } 
//            else 
//            {
//                $data = array('upload_data' => $this->upload->data());
//
//                $upload_data = $this->upload->data();
//                
//                //get $file_type;
//                $file_type = $upload_data['file_ext'];
//
//                //insert image into the database
//                //$dbData["cus_profile_pic"] =  $config['file_name'].$file_type;
//                //$this->db->where('cus_id', $uid);
//                //$this->db->update('tbl_users', $dbData);
//                
//            } 
//            
//            if(empty($img))
//            {
//                $img="default_bike.jpg";
//            }
//            else
//            {
//                $img=$config['file_name'].".".$upload_data['file_ext'];
//            }
        //var_dump($this->upload->data('file_name'));  
            $img="default_bike.jpg";
            $data["image"]=$img;
            $this->db->insert('tbl_bike', $data);

        
        
        
        
    }
    
    public function add_bike_image()
    {//var_dump($this->input->post("userfile"));
                $config['upload_path']          = './';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 100;
                $config['max_width']            = 1024;
                $config['max_height']           = 768;

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('userfile'))
                {
                        $error = array('error' => $this->upload->display_errors());
                        var_dump($error);
                                                echo 'llllllll';
                        //$this->load->view('upload_form', $error);
                }
                else
                {
                        $data = array('upload_data' => $this->upload->data());
                        echo 'll';
                        //$this->load->view('upload_success', $data);
                }       
        
    }

    public function update_bike()
    {        
        //$img=$this->input->post("bikeimage");
//        $config['upload_path'] = './uploads/';
//        $config['allowed_types'] = 'jpg';
//        $config['max_size'] = '100000';
//        //$config['max_width'] = '1024';
//        //$config['max_height'] = '768';
//
//        $this->load->library('upload', $config);
//
//        //change name of the uoloading file
//        $config['file_name'] = uniqid();
//        //$config['overwrite'] = TRUE;
//        $this->upload->initialize($config);
//
//
//
//        if (!$this->upload->do_upload())
//        {
//            $error = array('error' => $this->upload->display_errors());
//        } 
//        else 
//        {
//            $data = array('upload_data' => $this->upload->data());
//
//            $upload_data = $this->upload->data();
//
//            //get $file_type;
//            $file_type = $upload_data['file_ext'];
//
//            //insert image into the database
//            $dbData["cus_profile_pic"] =  $config['file_name'].$file_type;
//            $this->db->where('cus_id', $uid);
//            $this->db->update('tbl_users', $dbData);
//
//        }        
        
        $id=$this->input->post("id");
        var_dump($id);
        $data["route_no"]=$this->input->post("route_no");
        $data["model"]=$this->input->post("model");
        $data["chassis_no"]=$this->input->post("chassis_no");
        $data["engine_no"]=$this->input->post("engine_no");
        $data["color"]=$this->input->post("color");
        $data["cost"]=$this->input->post("cost");
        $data["price"]=$this->input->post("price");
        //$data["image"]=$img;
        //$data["date"]= date("Y-m-d H:i:s");
        
        var_dump($data);
        
//            $img="default_bike.jpg";
//            $data["image"]=$img;
//            $this->db->insert('tbl_bike', $data);

        
        
        $this->db->where('id', $id);
        $this->db->update('tbl_bike', $data);        
        
    }

    public function delete_bike()
    {
        $id=$this->input->post("bike_id");
        $query = $this->db->query("DELETE FROM tbl_bike WHERE id=$id");
    }
    
    public function get_bike_details()
    {
        $query = $this->db->query("SELECT * FROM tbl_bike WHERE sold=0 ORDER BY date DESC");
        
        if($query->num_rows()>0)
        {
            return $query->result();    
        }
        else
        {
            return 0;
        }
        
    }
    
    public function cheque_routeno_exist()
    {
        $route_no=  $this->input->post("route_no");
        
        $query = $this->db->query("SELECT * FROM tbl_bike WHERE route_no='$route_no' AND sold='0'");
        //var_dump($query->num_rows());
        if($query->num_rows()>0)
        {
            echo 1;    
        }
        else
        {
            echo 0;
        }       
    }
    
    public function get_bike_stock()
    {
        $query=$this->db->query("SELECT *,COUNT(model) AS stock FROM `tbl_bike`WHERE sold=0 GROUP BY model");
        
        if($query->num_rows()>0)
        {
            return $query->result();
        }
        else
        {
            return 0;
        }
        
    }

    public function get_search_bike() 
    {
        $route_no=$this->input->post("route_no");
        
        $query = $this->db->query("SELECT * FROM tbl_bike WHERE route_no LIKE '%".$route_no."%' AND sold=0");
        $bike=$query->result();
        
        if($query->num_rows()>0)
        {
?>      

        <?php foreach ($bike as $details): ?>
        <div class="grid-form1">
            <div class="tab-content">
                <div class="tab-pane active" id="horizontal-form">

                    <div class="row">
                    <div class="col-md-4 gallery-grids-right">
                        <div class="gallery-grid">
                            <a class="example-image-link" data-lightbox="example-set">
                                <img class="img-responsive img-thumbnail" src="<?php echo base_url() ?>uploads/<?php echo $details->image ?>" alt="">
                            </a>
                        </div>
                    </div>


                     <div class="col-md-8" style="padding-left: 3%;">

                         <div class="form-horizontal" style="padding-left: 15%;text-align: left;">

                            <div class="form-group">
                                    <label style="font-weight: bold;text-align: left;font-size: 1.1em;" for="focusedinput" class="col-sm-4 control-label">Route Number</label>
                                    <div class="col-sm-8">
                                        <label style="font-size: 1.1em;text-align: left;" for="focusedinput" class="col-sm-6 control-label"><?php echo $details->route_no;?></label>
                                    </div>
                            </div>

                            <div class="form-group">
                                    <label style="font-weight: bold;text-align: left;font-size: 1.1em;" for="focusedinput" class="col-sm-4 control-label">Model</label>
                                    <div class="col-sm-8">
                                        <label style="font-size: 1.1em;text-align: left;" for="focusedinput" class="col-sm-6 control-label"><?php echo $details->model;?></label>
                                    </div>
                            </div>
                            
                            <div class="form-group">
                                    <label style="font-weight: bold;text-align: left;font-size: 1.1em;" for="focusedinput" class="col-sm-4 control-label">Color</label>
                                    <div class="col-sm-8">
                                        <input style="font-size: 1.1em;text-align: left;border-radius: 50px; background-color: #<?php echo $details->color?>" class="col-sm-6 control-label" readonly="">
                                    </div>
                            </div>
                            
                            <div class="form-group">
                                    <label style="font-weight: bold;text-align: left;font-size: 1.1em;" for="focusedinput" class="col-sm-4 control-label">Price</label>
                                    <div class="col-sm-8">
                                        <label style="font-size: 1.1em;text-align: left;" for="focusedinput" class="col-sm-6 control-label">Rs: <?php echo $details->price;?></label>
                                    </div>
                            </div>

                        </div>

                        <div class="panel-footer">
                            <div class="row">
                                    <div style="margin: auto; text-align: center">
                                        <input style="width: 70%;" onclick="bike_details(<?php echo $details->id;?>)" type="button" class="btn-primary btn" value="More Details">
                                    </div>
                            </div>
                        </div> 


                     </div>

                    </div>

                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        <?php endforeach;?>


        <?php        
                }
                else
                {

        ?>
                    <div class="sec-sub-title text-center">
                    <div style="background-color: #ff4242;">
                        <p style="color: white;font-weight: bold;font-size: 20px; padding: 25px;" class="">No Results found</p>
                    </div>
                    </div>
        <?php
                }
    }
    
    public function get_a_bike_details($id)
    {
        $query = $this->db->query("SELECT * FROM tbl_bike WHERE id=$id AND sold=0");
        $result= $query->result();

?>        
            <!--Bike Details-->
            <div class="modal fade" id="bike_details" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                            </button>
                            <h4 class="modal-title" id="gridSystemModalLabel">Bike Details</h4>
                            <span id="fill_all_Err" class="I_error_messages"></span>
                        </div>

                        <form id="user_pwd" role="form" method="post">
                        <div class="modal-body">

                            <div class="row" style="padding:10px 20px 0px 20px;">
                                <div class="col-xs-6">
                                    <p style="font-weight:bold">Route Number:</p>
                                </div>
                                <div class="col-xs-6">
                                    <span class="I_error_messages" id="old_Pwd_Err"></span>
                                    <p><?php echo $result[0]->route_no?></p>
                                </div>
                            </div>
                            <div class="row" style="padding:10px 20px 0px 20px;">
                                <div class="col-xs-6">
                                    <p style="font-weight:bold">Model:</p>
                                </div>
                                <div class="col-xs-6">
                                    <span class="I_error_messages" id="new_Pwd_Err"></span>
                                    <p><?php echo $result[0]->model?></p>
                                </div>
                            </div>
                            <div class="row" style="padding:10px 20px 0px 20px;">
                                <div class="col-xs-6">
                                    <p style="font-weight:bold">Chassis Number:</p>
                                </div>
                                <div class="col-xs-6">
                                    <span class="I_error_messages" id="cnf_Pwd_Err"></span>
                                    <p><?php echo $result[0]->chassis_no?></p>
                                </div>
                            </div>
                            <div class="row" style="padding:10px 20px 0px 20px;">
                                <div class="col-xs-6">
                                    <p style="font-weight:bold">Engine Number:</p>
                                </div>
                                <div class="col-xs-6">
                                    <span class="I_error_messages" id="cnf_Pwd_Err"></span>
                                    <p><?php echo $result[0]->engine_no?></p>
                                </div>
                            </div>
                            <div class="row" style="padding:10px 20px 0px 20px;">
                                <div class="col-xs-6">
                                    <p style="font-weight:bold">Color:</p>
                                </div>
                                <div class="col-xs-6">
                                    <span class="I_error_messages" id="cnf_Pwd_Err"></span>
                                    <input size="5" style="border-radius: 50px;; background-color:#<?php echo $result[0]->color?>"  readonly="">
                                </div>
                            </div>                
                            <div class="row" style="padding:10px 20px 0px 20px;">
                                <div class="col-xs-6">
                                    <p style="font-weight:bold">Price:</p>
                                </div>
                                <div class="col-xs-6">
                                    <span class="I_error_messages" id="cnf_Pwd_Err"></span>
                                    <p>Rs: <?php echo $result[0]->price?></p>
                                </div>
                            </div>   
                            <div class="row" style="padding:10px 20px 0px 20px;">
                                <div class="col-xs-6">
                                    <p style="font-weight:bold">Added Date:</p>
                                </div>
                                <div class="col-xs-6">
                                    <span class="I_error_messages" id="cnf_Pwd_Err"></span>
                                    <p><?php echo $result[0]->date?></p>
                                </div>
                            </div> 
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        </div>
                        </form>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->

<?php        
    }

    
    
    
public function get_a_bike_details_for_update($id)
{
        $query = $this->db->query("SELECT * FROM tbl_bike WHERE id=$id AND sold=0");
        $result= $query->result();

?>        
            <!--Bike Details-->
            <div class="modal fade" id="bike_details" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                            </button>
                            <h4 class="modal-title" id="gridSystemModalLabel">Update Bike Details</h4>
                            <span id="fill_all_Err" class="I_error_messages"></span>
                        </div>

                        <form id="user_pwd" role="form" method="post">
                        <div class="modal-body">

                            <div class="row" style="padding:10px 20px 0px 20px;">
                                <div class="col-xs-6">
                                    <p style="font-weight:bold">Route Number:</p>
                                </div>
                                <div class="col-xs-6">
                                    <span class="I_error_messages" id="old_Pwd_Err"></span>
                                    <input type="text" class="form-control1" id="route_no" name="price" value="<?php echo $result[0]->route_no?>" >
                                </div>
                            </div>
                            <div class="row" style="padding:10px 20px 0px 20px;">
                                <div class="col-xs-6">
                                    <p style="font-weight:bold">Model:</p>
                                </div>
                                <div class="col-xs-6">
                                    <span class="I_error_messages" id="new_Pwd_Err"></span>
                                    <input type="text" class="form-control1" id="model" name="model" value="<?php echo $result[0]->model?>">
                                </div>
                            </div>
                            <div class="row" style="padding:10px 20px 0px 20px;">
                                <div class="col-xs-6">
                                    <p style="font-weight:bold">Chassis Number:</p>
                                </div>
                                <div class="col-xs-6">
                                    <span class="I_error_messages" id="cnf_Pwd_Err"></span>
                                    <input type="text" class="form-control1" id="chassis_no" name="chassis_no" value="<?php echo $result[0]->chassis_no?>">
                                </div>
                            </div>
                            <div class="row" style="padding:10px 20px 0px 20px;">
                                <div class="col-xs-6">
                                    <p style="font-weight:bold">Engine Number:</p>
                                </div>
                                <div class="col-xs-6">
                                    <span class="I_error_messages" id="cnf_Pwd_Err"></span>
                                    <input type="text" class="form-control1" id="engine_no" name="engine_no" value="<?php echo $result[0]->engine_no?>">
                                </div>
                            </div>
                            <div class="row" style="padding:10px 20px 0px 20px;">
                                <div class="col-xs-6">
                                    <p style="font-weight:bold">Color:</p>
                                </div>
                                <div class="col-xs-6">
                                    <span class="I_error_messages" id="cnf_Pwd_Err"></span>
                                    <input type="text" class="form-control1 jscolor" style="background-color:#<?php echo $result[0]->color?>; " id="color" name="color" value="<?php echo $result[0]->color?>"  readonly="">
                                </div>
                            </div>                
                            <div class="row" style="padding:10px 20px 0px 20px;">
                                <div class="col-xs-6">
                                    <p style="font-weight:bold">Cost:</p>
                                </div>
                                <div class="col-xs-6">
                                    <span class="I_error_messages" id="cnf_Pwd_Err"></span>
                                    <input type="text" class="form-control1" id="cost" name="cost" value="<?php echo $result[0]->cost?>">
                                </div>
                            </div> 
                            <div class="row" style="padding:10px 20px 0px 20px;">
                                <div class="col-xs-6">
                                    <p style="font-weight:bold">Price:</p>
                                </div>
                                <div class="col-xs-6">
                                    <span class="I_error_messages" id="cnf_Pwd_Err"></span>
                                    <input type="text" class="form-control1" id="price" name="price" value="<?php echo $result[0]->price?>">
                                </div>
                            </div>   
                            <div class="row" style="padding:10px 20px 0px 20px;">
                                <div class="col-xs-6">
                                    <p style="font-weight:bold">Added Date:</p>
                                </div>
                                <div class="col-xs-6">
                                    <span class="I_error_messages" id="cnf_Pwd_Err"></span>
                                    <p><?php echo $result[0]->date?></p>
                                </div>
                            </div> 
                        </div>
                        <div class="modal-footer">
                            <input type="button" onclick="update_bike(<?php echo $result[0]->id;?>)" class="btn-primary btn" value="Update">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        </div>
                        </form>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->

<?php        
}    
    
public function get_a_selling_bike_details($id) {

        $query = $this->db->query("SELECT * FROM tbl_bike WHERE id=$id AND sold=0");
        return $query->result();
    
}
    
    
//    sell a bike
    public function get_search_bike_for_sell() 
    {
        $route_no=$this->input->post("route_no");
        
        $query = $this->db->query("SELECT * FROM tbl_bike WHERE route_no LIKE '%".$route_no."%' AND sold=0");
        $bike=$query->result();
        
        if($query->num_rows()>0)
        {
?>      

        <?php foreach ($bike as $details): ?>
        <div class="grid-form1">
            <div class="tab-content">
                <div class="tab-pane active" id="horizontal-form">

                    <div class="row">
                    <div class="col-md-4 gallery-grids-right">
                        <div class="gallery-grid">
                            <a class="example-image-link" data-lightbox="example-set">
                                <img class="img-responsive img-thumbnail" src="<?php echo base_url() ?>uploads/<?php echo $details->image ?>" alt="">
                            </a>
                        </div>
                    </div>


                     <div class="col-md-8" style="padding-left: 3%;">

                         <div class="form-horizontal" style="padding-left: 15%;text-align: left;">

                            <div class="form-group">
                                    <label style="font-weight: bold;text-align: left;font-size: 1.1em;" for="focusedinput" class="col-sm-4 control-label">Route Number</label>
                                    <div class="col-sm-8">
                                        <label style="font-size: 1.1em;text-align: left;" for="focusedinput" class="col-sm-6 control-label"><?php echo $details->route_no;?></label>
                                    </div>
                            </div>

                            <div class="form-group">
                                    <label style="font-weight: bold;text-align: left;font-size: 1.1em;" for="focusedinput" class="col-sm-4 control-label">Model</label>
                                    <div class="col-sm-8">
                                        <label style="font-size: 1.1em;text-align: left;" for="focusedinput" class="col-sm-6 control-label"><?php echo $details->model;?></label>
                                    </div>
                            </div>

                            <div class="form-group">
                                    <label style="font-weight: bold;text-align: left;font-size: 1.1em;" for="focusedinput" class="col-sm-4 control-label">Color</label>
                                    <div class="col-sm-8">
                                        <label style="font-size: 1.1em;text-align: left;" for="focusedinput" class="col-sm-6 control-label"><?php echo $details->color;?></label>
                                    </div>
                            </div>

                            <div class="form-group">
                                    <label style="font-weight: bold;text-align: left;font-size: 1.1em;" for="focusedinput" class="col-sm-4 control-label">Price</label>
                                    <div class="col-sm-8">
                                        <label style="font-size: 1.1em;text-align: left;" for="focusedinput" class="col-sm-6 control-label">Rs: <?php echo $details->price;?></label>
                                    </div>
                            </div>

                        </div>

                        <div class="panel-footer">
                            <div class="row">
                                    <div style="margin: auto; text-align: center">
                                        <input style="width: 70%;" onclick="sell(<?php echo $details->id;?>)" type="button" class="btn-primary btn" value="Sell">
                                    </div>
                            </div>
                        </div> 


                     </div>

                    </div>

                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        <?php endforeach;?>


        <?php        
                }
                else
                {

        ?>
                    <div class="sec-sub-title text-center">
                    <div style="background-color: #ff4242;">
                        <p style="color: white;font-weight: bold;font-size: 20px; padding: 25px;" class="">No Results found</p>
                    </div>
                    </div>
        <?php
                }
}


    
    
//manage a bike
public function get_search_bike_for_manage() 
{
        $route_no=$this->input->post("route_no");
        
        $query = $this->db->query("SELECT * FROM tbl_bike WHERE route_no LIKE '%".$route_no."%' AND sold=0");
        $bike=$query->result();
        
        if ($query->num_rows()>0)
        {
?>

        
    <?php if(isset($bike) && $bike!=0){ foreach ($bike as $details): ?>
    <div class="grid-form1">
         <div class="tab-content">
             <div class="tab-pane active" id="horizontal-form">
                 
                 <div class="row">
                 
                    <div class="col-md-4 gallery-grids-right">
                        <div class="gallery-grid">
                            <a onclick="mmm()" id="single_1" class="fancybox-thumb" rel="fancybox-thumb" href="<?php echo base_url() ?>uploads/<?php echo $details->image?>" title="<?php echo $details->model;?>">
                                <img src="<?php echo base_url() ?>uploads/<?php echo $details->image?>" alt="" />
                            </a>
                        </div>
                    </div>
                     
                     
                     <div class="col-md-8" style="padding-left: 3%;">
                         
                         <div class="form-horizontal" style="padding-left: 15%;text-align: left;">
                            
                            <div class="form-group">
                                    <label style="font-weight: bold;text-align: left;font-size: 1.1em;" for="focusedinput" class="col-sm-4 control-label">Route Number</label>
                                    <div class="col-sm-8">
                                        <label style="font-size: 1.1em;text-align: left;" for="focusedinput" class="col-sm-6 control-label"><?php echo $details->route_no;?></label>
                                    </div>
                            </div>
                            
                            <div class="form-group">
                                    <label style="font-weight: bold;text-align: left;font-size: 1.1em;" for="focusedinput" class="col-sm-4 control-label">Model</label>
                                    <div class="col-sm-8">
                                        <label style="font-size: 1.1em;text-align: left;" for="focusedinput" class="col-sm-6 control-label"><?php echo $details->model;?></label>
                                    </div>
                            </div>
                            
                            <div class="form-group">
                                    <label style="font-weight: bold;text-align: left;font-size: 1.1em;" for="focusedinput" class="col-sm-4 control-label">Color</label>
                                    <div class="col-sm-8">
                                        <input style="font-size: 1.1em;text-align: left;border-radius: 50px; background-color: #<?php echo $details->color?>" class="col-sm-6 control-label" readonly="">
                                    </div>
                            </div>
                            
                            <div class="form-group">
                                    <label style="font-weight: bold;text-align: left;font-size: 1.1em;" for="focusedinput" class="col-sm-4 control-label">Price</label>
                                    <div class="col-sm-8">
                                        <label style="font-size: 1.1em;text-align: left;" for="focusedinput" class="col-sm-6 control-label">Rs: <?php echo $details->price;?></label>
                                    </div>
                            </div>
                            
                        </div>
                                                
                        <div class="panel-footer">
                            <div class="row">
                                    <div style="margin: auto; text-align: center">
                                     <input type="button" onclick="bike_details_for_update(<?php echo $details->id;?>)" class="btn-primary btn" value="Update">
                                     <input onclick="delete_bike(<?php echo $details->id;?>)" type="button" class="btn-danger btn" value="Delete">
                                    </div>
                            </div>
                        </div> 
                         
                         
                     </div>
                      
                 </div>
                 
             </div>
         </div>
    </div>
<div class="clearfix"></div>

    
    
    <?php endforeach;}        
    

          
        }
        else
        {
            
?>
            <div class="sec-sub-title text-center">
            <div style="background-color: #ff4242;">
                <p style="color: white;font-weight: bold;font-size: 20px; padding: 25px;" class="">No Results found</p>
            </div>
            </div>
<?php
        }
            

}    

    public function get_search_bike_for_stock()
    {
        $model_no=  $this->input->post("model_no");
        
        $query=$this->db->query("SELECT *,COUNT(model) AS stock FROM tbl_bike WHERE sold=0 AND model LIKE '%".$model_no."%' GROUP BY model");
        
        if($query->num_rows()>0)
        {
            $stock=$query->result();
?>
                                
                                  <table id="table-two-axis" class="two-axis" style="width: 80%;margin: auto;">
					<thead>
					  <tr>
						<th>Bike Model</th>
						<th>Stocks</th>
					  </tr>
					</thead>
					<tbody>
                    
                                        <?php  foreach ($stock as $details): ?>    
					  <tr>
                                              <td><?php echo $details->model;?></td>
                                              <td><?php echo $details->stock  ;?></td>
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
                <p style="color: white;font-weight: bold;font-size: 20px; padding: 25px;" class="">No stock details found</p>
            </div>
            </div>

        <?php 
        }
        
    }
    
    
    
    public function generate_bill($bike_id,$client_id)
    {
        $price=$this->input->post("price");
        $this->db->query("UPDATE tbl_bike SET sold=1,price='$price' WHERE id=$bike_id");
        
        //get ith invoice number
        $res = $this->db->query("SELECT * FROM tbl_bill ORDER BY invoice_no DESC LIMIT 1");
        $invoice_no=$res->row()->invoice_no+1;
        $num = sprintf("%06d", $invoice_no);
        
        $data["invoice_no"]=$num;
        $data["client_id"]=$client_id;
        $data["bike_id"]=$bike_id;
        $data["total"]=$price;
        $data["date"]=date("Y-m-d h:i:sa");
        
        $this->db->insert('tbl_bill', $data);
        
//        $query = $this->db->query("SELECT * FROM tbl_bike WHERE id=$bike_id");
//        $data["details"]=$query->result();
        return $invoice_no;
    }
    
}


