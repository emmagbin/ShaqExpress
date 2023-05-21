<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
//This is the Book Model for CodeIgniter CRUD using Ajax Application.
class Service_Category_Model extends CI_Model
{
 
	var $table = 'service_category';

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function get_all_units()
	{
		$query = $this->db->query("select * from unit");
		return $query->result();	
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

 ?>