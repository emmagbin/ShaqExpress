<?php
defined('BASEPATH') or exit('No direct script access allowed');

//This is the Book Model for CodeIgniter CRUD using Ajax Application.
class link_model extends CI_Model
{

    var $table = 'drivervehiclelink';


    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    public function get_all_link()
    {
        $query = $this->db->query("select drivervehiclelink.*, concat(drivers.lastname,' ',drivers.othernames) as driver, drivers.licenseno,drivers.passport,vehicle.vehiclephoto, vehicle.plateno, CONCAT(staff.lastname,'   ' ,staff.othernames) as creator from  drivervehiclelink inner join drivers on drivers.id=drivervehiclelink.driverid inner JOIN vehicle on vehicle.id=drivervehiclelink.vehicleid INNER JOIN staff on staff.login_id=drivervehiclelink.createdby



");
        return $query->result();
    }


    // SELECT `id`, `driverid`, `vehicleid`, `status`, `created_at`, `createdby`, `updatedby`, `updated_at` FROM `drivervehiclelink` WHERE 1
    public function getdoctype()
    {
        $query = $this->db->query("SELECT id,vehicledoctypename FROM  vehicledoctype ");
        return $query->result_array();
    }

    public function getfleets()
    {
        $query = $this->db->query("

select id,CONCAT(plateno, '   ',vehicleType,'   ' , brand,'   
 ', model) as plateno from vehicle where vehicle.id NOT IN (select drivervehiclelink.vehicleid from drivervehiclelink WHERE drivervehiclelink.status=1) ");
        return $query->result_array();
    }

    public function vehicleedit()
    {
        $vehicleid = $this->input->post('vehicleid');
        $query = $this->db->query("

select id,CONCAT(plateno, '   ',vehicleType,'   ' , brand,'   
 ', model) as plateno from vehicle where vehicle.id NOT IN (select drivervehiclelink.vehicleid from drivervehiclelink WHERE drivervehiclelink.status=1 )
 and vehicle.id !='$vehicleid'
 
 UNION
 
 select id,CONCAT(plateno, '   ',vehicleType,'   ' , brand,'   
 ', model) as plateno from vehicle where vehicle.id='$vehicleid'");
        return $query->result_array();
    }

    public function getdrivers()
    {
        $query = $this->db->query(" 

select id,CONCAT(lastname, '   ',othernames,'   [' , licenseno,']' ) as drivers from drivers where drivers.id NOT IN (select drivervehiclelink.driverid from drivervehiclelink WHERE drivervehiclelink.status=1) ");
        return $query->result_array();
    }

    public function driveredit()
    {
        $driverid = $this->input->post('driverid');
        $query = $this->db->query(" 

select id,CONCAT(lastname, '   ',othernames,'   [' , licenseno,']' ) as drivers from drivers where drivers.id NOT IN
 (select drivervehiclelink.driverid from drivervehiclelink WHERE drivervehiclelink.status=1) and drivers.id!='$driverid'
 
  UNION
  
  select id,CONCAT(lastname, '   ',othernames,'   [' , licenseno,']' ) as drivers from drivers where drivers.id='$driverid' ");
        return $query->result_array();
    }


    public function createlink($login_id)
    {
        $fields = array(
            'driverid' =>  $this->input->post('driverid'),
            'vehicleid' =>  $this->input->post('vehicleid'),

            'createdby' => $login_id,
        );
        if ($this->db->insert($this->table, $fields)) {
            return true;
        } else {
            return false;
        }
    }

    public function updatelink($login_id)
    {
        $data = array(
            'driverid' =>  $this->input->post('driverid'),
            'vehicleid' =>  $this->input->post('vehicleid'),
            'updatedby' => $login_id,
        );


        $this->db->set($data);
        $this->db->where('id', $this->input->post('id'));
        $this->db->update($this->table, $data);
        return true;
    }

    public function enabl_disable_link($login_id)
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
