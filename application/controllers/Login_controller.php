<?php
defined('BASEPATH') or exit('No direct script access allowed');

//This is the Controller for codeigniter crud using ajax application.
class login_controller extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		//$this->load->model('Service_Category_Model');
	}

	public function index()
	{
		$page['page']  = 'login';
		$page['pageUrl']  = 'login';
		$page['pagetitle'] = 'Management Login';
		$this->load->view('admin/views/' . $page['page'], $page);
	}

	public function forgotpassword()
	{
		$page['page']  = 'forgotpassword';
		$page['pageUrl']  = 'forgotpassword';
		$page['pagetitle'] = 'Management Login';
		$this->load->view('admin/views/' . $page['page'], $page);
	}





	public function unlockuser($userid)
	{
		$data = array(
			'isLogin' => 0
		);
		$this->db->set($data);
		$this->db->where('id', $userid);
		$this->db->update("login", $data);
	}


	function logout()
	{

		if ($this->session->userdata('logged_in')) {

			$session_data = $this->session->userdata('logged_in');
			$userid = $session_data['id'];
			$result = $this->unlockuser($userid);

			$this->session->unset_userdata('logged_in');
			session_destroy();
			redirect('login', 'refresh');
		}
	}
}
