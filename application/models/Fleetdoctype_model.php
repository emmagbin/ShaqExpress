<?php
defined('BASEPATH') or exit('No direct script access allowed');

//This is the Book Model for CodeIgniter CRUD using Ajax Application.
class fleetdoctype_model extends CI_Model
{

    var $table = 'order';
    var $tableh = 'orderhistory';

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    public function get_all_doctype()
    {
        $query = $this->db->query("SELECT vehicledoctype.*, CONCAT(staff.lastname,'   ' ,staff.othernames) as creator FROM `vehicledoctype` 
        inner JOIN staff ON vehicledoctype.createdby =staff.login_id

");
        return $query->result();
    }

    public function getdoctype()
    {
        $query = $this->db->query("SELECT id,vehicledoctypename FROM  vehicledoctype ");
        return $query->result_array();
    }

    public function createdoctype($login_id)
    {
        $fields = array(
            'vehicledoctypename' =>  $this->input->post('vehicletypename'),
            'createdby' => $login_id,
        );
        if ($this->db->insert("vehicledoctype", $fields)) {
            return true;
        } else {
            return false;
        }
    }

    public function updatdoctype($login_id)
    {
        $data = array(
            'vehicledoctypename' =>  $this->input->post('vehicletypename'),
            'updatedby' => $login_id,
        );


        $this->db->set($data);
        $this->db->where('id', $this->input->post('id'));
        $this->db->update("vehicledoctype", $data);
        return true;
    }

    public function enabl_disable_doctype($login_id)
    {
        if ($this->input->post('enabledisable') === 'disable') {
            $data = array(
                'status' => 0,
                'updatedby' => $login_id,
            );
            $this->db->set($data);
            $this->db->where('id', $this->input->post('id'));
            $this->db->update("vehicledoctype", $data);
        } elseif ($this->input->post('enabledisable') === 'enable') {
            $data = array(
                'status' => 1,
                'updatedby' => $login_id,
            );
            $this->db->set($data);
            $this->db->where('id', $this->input->post('id'));
            $this->db->update("vehicledoctype", $data);
        }
        return true;
    }
    // ==========================================




}
