<?php
defined('BASEPATH') or exit('No direct script access allowed');

//This is the Book Model for CodeIgniter CRUD using Ajax Application.
class fleetexpensesetype_Model extends CI_Model
{

    var $table = 'fleetexpensestype';

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    public function get_all_expensesype()
    {
        $query = $this->db->query("SELECT fleetexpensestype.*, CONCAT(staff.lastname,'   ' ,staff.othernames) as creator FROM `fleetexpensestype` 
        inner JOIN staff ON fleetexpensestype.createdby =staff.login_id

");
        return $query->result();
    }





    public function getexpensestype()
    {
        $query = $this->db->query("SELECT id,expensetype FROM  fleetexpensestype where status !='0' ");
        return $query->result_array();
    }
    // SELECT `id`, `expensetype`, `status`, `created_at`, `createdby`, `updatedby`, `updated_at` FROM `fleetexpensestype` WHERE 1
    public function createfleetexpensestype($login_id)
    {
        $fields = array(
            'expensetype' =>  $this->input->post('expensetype'),
            'createdby' => $login_id,
        );
        if ($this->db->insert($this->table, $fields)) {
            return true;
        } else {
            return false;
        }
    }

    public function updatefleetexpensestype($login_id)
    {
        $data = array(
            'expensetype' =>  $this->input->post('expensetype'),
            'updatedby' => $login_id,
        );


        $this->db->set($data);
        $this->db->where('id', $this->input->post('id'));
        $this->db->update($this->table, $data);
        return true;
    }

    public function enabl_disable_fleetexpensesetype($login_id)
    {
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
    // ==========================================




}
