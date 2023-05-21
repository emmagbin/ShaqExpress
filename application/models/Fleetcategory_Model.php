<?php
defined('BASEPATH') or exit('No direct script access allowed');

//This is the Book Model for CodeIgniter CRUD using Ajax Application.
class Fleetcategory_Model extends CI_Model
{

    var $table = 'order';
    var $tableh = 'orderhistory';

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    public function get_all_vehicletype()
    {
        $query = $this->db->query("SELECT vehicletype.*, CONCAT(staff.lastname,'   ' ,staff.othernames) as creator FROM `vehicletype` 
        inner JOIN staff ON vehicletype.createdby =staff.login_id

");
        return $query->result();
    }

    public function createvehicletype($login_id)
    {
        $fields = array(
            'vehicletypename' =>  $this->input->post('vehicletypename'),
            'createdby' => $login_id,
        );
        if ($this->db->insert("vehicletype", $fields)) {
            return true;
        } else {
            return false;
        }
    }

    public function updatevehicleType($login_id)
    {
        $data = array(
            'vehicletypename' =>  $this->input->post('vehicletypename'),
            'updatedby' => $login_id,
        );


        $this->db->set($data);
        $this->db->where('id', $this->input->post('id'));
        $this->db->update("vehicletype", $data);
        return true;
    }

    public function enabl_disable_vehicleType($login_id)
    {
        if ($this->input->post('enabledisable') === 'disable') {
            $data = array(
                'status' => 0,
                'updatedby' => $login_id,
            );
            $this->db->set($data);
            $this->db->where('id', $this->input->post('id'));
            $this->db->update("vehicletype", $data);
        } elseif ($this->input->post('enabledisable') === 'enable') {
            $data = array(
                'status' => 1,
                'updatedby' => $login_id,
            );
            $this->db->set($data);
            $this->db->where('id', $this->input->post('id'));
            $this->db->update("vehicletype", $data);
        }
        return true;
    }
    // ==========================================




}
