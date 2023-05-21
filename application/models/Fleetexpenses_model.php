<?php
defined('BASEPATH') or exit('No direct script access allowed');

//This is the Book Model for CodeIgniter CRUD using Ajax Application.
class fleetexpenses_model extends CI_Model
{

    var $table = 'fleetexpenses';

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }





    public function get_all_fleetexpenses()
    {
        $query = $this->db->query("select fleetexpenses.*, CONCAT(drivers.lastname,'  ',drivers.othernames) as driver, drivers.passport, drivers.licenseno, vehicle.plateno,vehicle.vehiclephoto,vehicle.status as vstatus,vehicle.vehicleType, fleetexpensestype.expensetype, CONCAT(staff.lastname,' ',staff.othernames) as creator from fleetexpenses INNER join drivers on fleetexpenses.driverid=drivers.id INNER join vehicle on fleetexpenses.fleetid=vehicle.id INNER join staff on fleetexpenses.createdby=staff.login_id INNER JOIN fleetexpensestype on fleetexpenses.expensestype=fleetexpensestype.id 

");
        return $query->result();
    }

    public function getfleets()
    {
        $query = $this->db->query("SELECT vehicle.id,CONCAT(plateno, '   ',vehicleType,'   ' , brand,'    ', model) as plateno FROM  vehicle inner join drivervehiclelink on drivervehiclelink.vehicleid=vehicle.id where drivervehiclelink.status!=0");
        return $query->result_array();
    }

    // SELECT `id`, `fleetid`, `expensestype`, `amount`, `expensesdate`, `description`, `reciept`, `status`, `created_at`, `createdby`, `updatedby`, `updated_at` FROM `fleetexpenses` WHERE 1

    public function fleetexpensesfields($login_id)
    {
        $fleetid = $this->input->post('fleetid');
        $query = $this->db->query("SELECT driverid FROM drivervehiclelink where vehicleid= '$fleetid' ");
        $result =  $query->result_array();
        $myvalue = $result[0]['driverid'];

        $fields = array(
            'fleetid' =>  $this->input->post('fleetid'),
            'driverid' =>  $myvalue,
            'expensestype' => $this->input->post('expensestype'),
            'amount' => $this->input->post('amount'),
            'expensesdate' => $this->input->post('expensesdate'),
            'description' => $this->input->post('description'),
            'createdby' => $login_id,
        );
        return $fields;
    }

    public function fleetexpensesUpdatefields($login_id)
    {
        $fleetid = $this->input->post('fleetid');
        $query = $this->db->query("SELECT driverid FROM drivervehiclelink where vehicleid= '$fleetid' ");
        $result =  $query->result_array();
        $myvalue = $result[0]['driverid'];
        $fields = array(
            'fleetid' =>  $this->input->post('fleetid'),
            'driverid' =>  $myvalue,
            'expensestype' => $this->input->post('expensestype'),
            'amount' => $this->input->post('amount'),
            'expensesdate' => $this->input->post('expensesdate'),
            'description' => $this->input->post('description'),
            'updatedby' => $login_id,

        );
        return $fields;
    }

    public function createfleetexpenses($login_id)
    {
        if ($this->db->insert($this->table, $this->fleetexpensesfields($login_id))) {
            $inserted = $this->db->insert_id();
            $this->uploadreciept($inserted);

            return true;

            // uploadvehicleph
        } else {
            return false;
        }
    }


    public function updateFleet_expenses($login_id)
    {
        $this->db->set($this->fleetexpensesUpdatefields($login_id));
        $this->db->where('id', $this->input->post('id'));

        if ($this->db->update($this->table, $this->fleetexpensesUpdatefields($login_id))) {
            $this->edit_uploadreceiptphoto($this->input->post('id'));

            return true;
        } else {
            return false;
        }
    }

    public function enable_disable_Fleet_expenses($login_id)
    {
        //  return  $this->input->post('id');
        if ($this->input->post('enabledisable') === 'disable') {
            $data = array(
                'status' => 0,
                'updatedby' => $login_id,
            );


            $this->db->set($data);
            $this->db->where('id', $this->input->post('id'));
            $this->db->update($this->table, $data);
        } elseif ($this->input->post('enabledisable') === 'enable') {
            $data = array(
                'status' => 1,
                'updatedby' => $login_id,
            );

            $this->db->set($data);
            $this->db->where('id', $this->input->post('id'));
            $this->db->update($this->table, $data);
        }
        return true;
    }



    public function uploadreciept($userid)
    {
        $config['file_name']        =  $userid;
        $config['upload_path']          = './assets/reciept/';
        $config['allowed_types']        = 'jpeg|jpg|png';
        $config['max_size']             = 10000000;
        $config['max_width']            = 6000;
        $config['max_height']           = 6000;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('output_image')) {
            return array('error' => $this->upload->display_errors());
        } else {
            $data = array('upload_data' => $this->upload->data());


            $photo = ($data['upload_data']['file_ext']);


            $myphoto = $userid . $photo;
            $data = array(
                'reciept' => $myphoto
            );
            $this->db->set($data);
            $this->db->where('id', $userid);
            $this->db->update($this->table, $data);
        }
    }

    public function edit_uploadreceiptphoto($userid)
    {
        $config['file_name']        =  $userid;
        $config['upload_path']          = './assets/reciept/';
        $config['allowed_types']        = 'jpeg|jpg|png';
        $config['max_size']             = 10000000;
        $config['max_width']            = 6000;
        $config['max_height']           = 6000;


        $oldphoto = $this->input->post('txtreciept_id');



        $filename = './assets/reciept/' . $oldphoto;
        if (file_exists($filename)) {

            rename("./assets/reciept/" . $oldphoto, "./assets/reciept/" . "newname" . $oldphoto);
        }



        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('output_image')) {

            if ($this->input->post('txtreciept_id')) {
                rename("./assets/reciept/" . "newname" . $oldphoto, "./assets/reciept/" . $oldphoto);

                return array('error' => $this->upload->display_errors());
            }
        } else {
            $data = array('upload_data' => $this->upload->data());


            $photo = ($data['upload_data']['file_ext']);

            $photo;
            $myphoto = $userid . $photo;
            $data = array(
                'reciept' => $myphoto
            );
            $this->db->set($data);
            $this->db->where('id', $userid);
            $this->db->update($this->table, $data);

            unlink("./assets/reciept/" . "newname" . $oldphoto);
        }
    }

    // ==========================================


}
