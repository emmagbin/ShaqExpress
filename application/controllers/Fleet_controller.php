
<?php
defined('BASEPATH') or exit('No direct script access allowed');

//This is the Controller for codeigniter crud using ajax application.
class Fleet_controller extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('email');
        $this->load->model('user', '', TRUE);
        $this->load->helper('url');
        $this->load->model('User');
        $this->load->model('Fleets_model');
    }


    public function index()
    {

        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $page['login_id'] = $session_data['login_id'];
            $page['username'] = $session_data['username'];

            $page['role'] = $session_data['role'];
            $page['logincount'] = $this->User->checklogincount($session_data['login_id']);
            $page['get_all_fleets'] = $this->Fleets_model->get_all_fleets();

            $page['page']  = 'defaultpage';
            $page['pageUrl']  = 'login';
            $page['pagetitle'] = 'Fleet';
            $page['folder'] = 'fleet';
            $page['contentt'] = 'body';
            $this->load->view('admin/views/' . $page['page'], $page);
        } else {
            $notification = array(
                'message' => 'Seasion lost Please Login Again',
                'alert-type' => 'error'
            );

            $this->session->set_flashdata($notification);
            redirect('login');
        }
    }
    public function createfleet()
    {
        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $page['login_id'] = $session_data['login_id'];

            $result = $this->Fleets_model->createfleet($session_data['login_id']);

            if (count($result) > 0) {
                $notification = array(
                    'message' => 'Vehicle information Creation Successful',
                    'alert-type' => 'success'
                );
            } else {
                $notification = array(
                    'message' => 'Vehicle information Creation Failed',
                    'alert-type' => 'success'
                );
            }
            $this->session->set_flashdata($notification);
            redirect('fleet');
        } else {
            $notification = array(
                'message' => 'Seasion lost Please Login Again',
                'alert-type' => 'error'
            );

            $this->session->set_flashdata($notification);
            redirect('login', 'refresh');
        }
    }


    public function updatefleet()
    {
        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $page['login_id'] = $session_data['login_id'];

            $result = $this->Fleets_model->updatefleet($session_data['login_id']);

            if ($result === true) {
                $notification = array(
                    'message' => 'Vehicle information Update Successful',
                    'alert-type' => 'success'
                );
            } else {
                $notification = array(
                    'message' => 'Vehicle information Update Failed',
                    'alert-type' => 'success'
                );
            }
            $this->session->set_flashdata($notification);
            redirect('fleet');
        } else {
            $notification = array(
                'message' => 'Seasion lost Please Login Again',
                'alert-type' => 'error'
            );

            $this->session->set_flashdata($notification);
            redirect('login', 'refresh');
        }
    }

    public function enabl_disable_fleet()
    {
        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $page['login_id'] = $session_data['login_id'];

            $result = $this->Fleets_model->enabl_disable_fleet($session_data['login_id']);


            if ($result === true) {
                $notification = array(
                    'message' => 'Vehicle information Update Successful',
                    'alert-type' => 'success'
                );
            } else {
                $notification = array(
                    'message' => 'Vehicle information Update Failed',
                    'alert-type' => 'success'
                );
            }
            $this->session->set_flashdata($notification);
            redirect('fleet');
        } else {
            $notification = array(
                'message' => 'Seasion lost Please Login Again',
                'alert-type' => 'error'
            );

            $this->session->set_flashdata($notification);
            redirect('login', 'refresh');
        }
    }
}
