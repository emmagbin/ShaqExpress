<?php
defined('BASEPATH') or exit('No direct script access allowed');

//This is the Book Model for CodeIgniter CRUD using Ajax Application.
class operationModel extends CI_Model
{

	var $table = 'order';
	var $tableh = 'orderhistory';


	// SELECT `id`, `sendername`, `senderlocation`, `sendercontact`, 
	// `recepientname`, `recepientlocation`, `recepientnumber`, 
	// `amount`, `modeofpayment`, `ridersname`, `paymentstatus`, 
	// `deliverystatus`, `createdby`, `created_at`, `updatedby`,
	//  `updated_at` FROM `order` WHERE 1


	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}


	public function orderfields($login_id)
	{
		$fields = array(
			'sendername' =>  $this->input->post('sendername'),
			'senderlocation' => $this->input->post('senderlocation'),
			'sendercontact' => $this->input->post('sendercontact'),
			'recepientname' => $this->input->post('recepientname'),
			'recepientlocation' => $this->input->post('recepientlocation'),
			'recepientnumber' => $this->input->post('recepientnumber'),
			'amount' => $this->input->post('amount'),
			'modeofpayment' => $this->input->post('modeofpayment'),
			'ridersname' => $this->input->post('ridersname'),
			'paymentstatus' => $this->input->post('paymentstatus'),
			'deliverystatus' => $this->input->post('deliverystatus'),
			'createdby' => $login_id,

		);
		return $fields;
	}

	public function orderhistoryfields($insert_id, $login_id)
	{
		$fields = array(
			'orderid' => $insert_id,
			'sendername' =>  $this->input->post('sendername'),
			'senderlocation' => $this->input->post('senderlocation'),
			'sendercontact' => $this->input->post('sendercontact'),
			'recepientname' => $this->input->post('recepientname'),
			'recepientlocation' => $this->input->post('recepientlocation'),
			'recepientnumber' => $this->input->post('recepientnumber'),
			'amount' => $this->input->post('amount'),
			'modeofpayment' => $this->input->post('modeofpayment'),
			'ridersname' => $this->input->post('ridersname'),
			'paymentstatus' => $this->input->post('paymentstatus'),
			'deliverystatus' => $this->input->post('deliverystatus'),
			'createdby' => $login_id,

		);
		return $fields;
	}
	public function insertNewOrder($login_id)
	{
		if ($this->db->insert("order", $this->orderfields($login_id))) {
			$insert_id = $this->db->insert_id();
			if ($this->db->insert("orderhistory", $this->orderhistoryfields($insert_id, $login_id))) {
				return true;
			} else {
				return false;
			}
		} else {
			return false;
		}
	}

	public function get_all_orders()
	{
		$query = $this->db->query("SELECT * FROM `order`  ");
		return $query->result();
	}


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
