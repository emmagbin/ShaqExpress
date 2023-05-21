<?php
defined('BASEPATH') or exit('No direct script access allowed');

//This is the Book Model for CodeIgniter CRUD using Ajax Application.
class Driver_Model extends CI_Model
{

    var $table = 'order';
    var $tableh = 'orderhistory';

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_all_drivers()
    {
        $query = $this->db->query("SELECT drivers.*, CONCAT(staff.lastname,'   ' ,staff.othernames) as creator FROM `drivers` inner JOIN staff ON drivers.createdby =staff.login_id

");
        return $query->result();
    }

    public function getdrivers()
    {
        $query = $this->db->query("SELECT id,CONCAT(lastname, '   ',othernames,'   [' , licenseno,']' ) as drivers FROM  drivers ");
        return $query->result_array();
    }

    // SELECT `id`, `lastname`, `othernames`, `dob`, `phonenumner`, `gender`, `licenseno`, 
    // `licenseclass`, `licenseexpiry`, `status`, `created_at`, `createdby`, `updatedby`, `updated_at` FROM `drivers` WHERE 1

    public function orderfields($login_id)
    {
        $fields = array(
            'lastname' =>  $this->input->post('lastname'),
            'othernames' => $this->input->post('othernames'),
            'dob' => $this->input->post('dob'),
            'phonenumner' => $this->input->post('phonenumner'),
            'gender' => $this->input->post('gender'),
            'licenseno' => $this->input->post('licenseno'),
            'licenseclass' => $this->input->post('licenseclass'),
            'licenseexpiry' => $this->input->post('licenseexpiry'),
            'createdby' => $login_id,

        );
        return $fields;
    }

    public function driverUpdatefields($login_id)
    {
        $fields = array(
            'lastname' =>  $this->input->post('lastname'),
            'othernames' => $this->input->post('othernames'),
            'dob' => $this->input->post('dob'),
            'phonenumner' => $this->input->post('phonenumner'),
            'gender' => $this->input->post('gender'),
            'licenseno' => $this->input->post('licenseno'),
            'licenseclass' => $this->input->post('licenseclass'),
            'licenseexpiry' => $this->input->post('licenseexpiry'),
            'updatedby' => $login_id,

        );
        return $fields;
    }

    public function createdriver($login_id)
    {
        if ($this->db->insert("drivers", $this->orderfields($login_id))) {
            $userid = $this->db->insert_id();

            $this->uploadpassport($userid);
            $this->uploadlicense($userid);

            return true;
        } else {
            return false;
        }
    }







    public function uploadpassport($userid)
    {
        $config['file_name']        =  $userid;
        $config['upload_path']          = './assets/drivers/passport/';
        $config['allowed_types']        = 'jpeg|jpg|png';
        $config['max_size']             = 1000000;
        $config['max_width']            = 6000;
        $config['max_height']           = 6000;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('output_image')) {
            return array('error' => $this->upload->display_errors());
        } else {
            $data = array('upload_data' => $this->upload->data());


            $photo = ($data['upload_data']['file_ext']);

            $photo;
            $myphoto = $userid . $photo;
            $data = array(
                'passport' => $myphoto
            );
            $this->db->set($data);
            $this->db->where('id', $userid);
            $this->db->update("drivers", $data);
        }
    }

    public function uploadlicense($userid)
    {
        $config['file_name']        =  $userid;
        $config['upload_path']          = './assets/drivers/license/';
        $config['allowed_types']        = 'jpeg|jpg|png';
        $config['max_size']             = 1000000;
        $config['max_width']            = 6000;
        $config['max_height']           = 6000;
        $this->upload->initialize($config);
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('output_image_License')) {
            return array('error' => $this->upload->display_errors());
        } else {
            $data = array('upload_data' => $this->upload->data());
            $photo = ($data['upload_data']['file_ext']);
            $myphoto = $userid . $photo;
            $data = array(
                'license' => $myphoto
            );
            $this->db->set($data);
            $this->db->where('id', $userid);
            $this->db->update("drivers", $data);
        }
    }


    public function updatedriver($login_id)
    {

        //                                            txtlicense_id txtpassport_id

        $this->db->set($this->driverUpdatefields($login_id));
        $this->db->where('id', $this->input->post('id'));

        if ($this->db->update("drivers", $this->driverUpdatefields($login_id))) {

            $this->edit_uploadpassport($this->input->post('id'));

            $this->edit_uploadlicense($this->input->post('id'));

            return true;
        } else {
            return false;
        }
    }

    public function edit_uploadpassport($userid)
    {
        $config['file_name']        =  $userid;
        $config['upload_path']          = './assets/drivers/passport/';
        $config['allowed_types']        = 'jpeg|jpg|png';
        $config['max_size']             = 1000000;
        $config['max_width']            = 6000;
        $config['max_height']           = 6000;


        $oldphoto = $this->input->post('txtpassport_id');


        if (!empty($this->input->post('txtpassport_id'))) {
            $filename = './assets/drivers/passport/' . $oldphoto;
            if (file_exists($filename)) {

                rename("./assets/drivers/passport/" . $oldphoto, "./assets/drivers/passport/" . "newname" . $oldphoto);
            }
        }


        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('output_image')) {

            if (!empty($this->input->post('txtpassport_id'))) {
                rename("./assets/drivers/passport/" . "newname" . $oldphoto, "./assets/drivers/passport/" . $oldphoto);

                return array('error' => $this->upload->display_errors());
            }
        } else {
            $data = array('upload_data' => $this->upload->data());


            $photo = ($data['upload_data']['file_ext']);

            $photo;
            $myphoto = $userid . $photo;
            $data = array(
                'passport' => $myphoto
            );
            $this->db->set($data);
            $this->db->where('id', $userid);
            $this->db->update("drivers", $data);
            if (!empty($this->input->post('txtpassport_id'))) {
                unlink("./assets/drivers/passport/" . "newname" . $oldphoto);
            }
        }
    }

    public function edit_uploadlicense($userid)
    {
        $config['file_name']        =  $userid;
        $config['upload_path']          = './assets/drivers/license/';
        $config['allowed_types']        = 'jpeg|jpg|png';
        $config['max_size']             = 1000000;
        $config['max_width']            = 6000;
        $config['max_height']           = 6000;

        $oldphoto = $this->input->post('txtlicense_id');

        $filename = './assets/drivers/license/' . $oldphoto;
        if (!empty($this->input->post('txtlicense_id'))) {
            if (file_exists($filename)) {

                //  echo('yes'); die;
                rename("./assets/drivers/license/" . $oldphoto, "./assets/drivers/license/" . "newname" . $oldphoto);
            }
        }

        $this->upload->initialize($config);
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('output_image_License')) {
            if (!empty($this->input->post('txtlicense_id'))) {

                rename("./assets/drivers/license/" . "newname" . $oldphoto, "./assets/drivers/license/" . $oldphoto);

                return array('error' => $this->upload->display_errors());
            }
        } else {
            $data = array('upload_data' => $this->upload->data());
            $photo = ($data['upload_data']['file_ext']);
            $myphoto = $userid . $photo;
            $data = array(
                'license' => $myphoto
            );
            $this->db->set($data);
            $this->db->where('id', $userid);
            $this->db->update("drivers", $data);
            if (!empty($this->input->post('txtlicense_id'))) {
                unlink("./assets/drivers/license/" . "newname" . $oldphoto);
            }
        }
    }


    public function enabl_disable_edriver($login_id)
    {
        if ($this->input->post('enabledisable') === 'disable') {
            $data = array(
                'status' => 0,
                'updatedby' => $login_id,
            );
            $this->db->set($data);
            $this->db->where('id', $this->input->post('id'));
            $this->db->update("drivers", $data);
        } elseif ($this->input->post('enabledisable') === 'enable') {
            $data = array(
                'status' => 1,
                'updatedby' => $login_id,
            );
            $this->db->set($data);
            $this->db->where('id', $this->input->post('id'));
            $this->db->update("drivers", $data);
        }
        return true;
    }
    // ==========================================



    public function confirmOrder($login_id)
    {
        $fields = array(
            'amount' => $this->input->post('amount'),
            'modeofpayment' => $this->input->post('modeofpayment'),
            'paymentstatus' => $this->input->post('paymentstatus'),
            'deliverystatus' => $this->input->post('deliverystatus'),
            'updatedby' => $login_id,
        );
        $this->db->set($fields);
        $this->db->where('id', $this->input->post('id'));

        if ($this->db->update("order", $fields)) {
            if ($this->db->update("orderhistory", $fields)) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function updateorder($login_id)
    {
        $this->db->set($this->orderfields($login_id));
        $this->db->where('id', $this->input->post('id'));

        if ($this->db->update("order", $this->orderfields($login_id))) {
            if ($this->db->insert("orderhistory", $this->orderhistoryfields($this->input->post('id'), $login_id))) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }


    public function add($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    public function update($where, $data)
    {
        $this->db->update($this->table, $data, $where);
        return $this->db->affected_rows();
    }
}
