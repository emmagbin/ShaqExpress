
<?php
defined('BASEPATH') or exit('No direct script access allowed');

//This is the Controller for codeigniter crud using ajax application.
class Fleetcategory_Controller extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('email');
        $this->load->model('user', '', TRUE);
        $this->load->helper('url');
        $this->load->model('User');
        $this->load->model('operationModel');
        $this->load->model('Fleetcategory_Model');
    }


    public function index()
    {

        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $page['login_id'] = $session_data['login_id'];
            $page['username'] = $session_data['username'];

            $page['role'] = $session_data['role'];
            $page['logincount'] = $this->User->checklogincount($session_data['login_id']);
            $page['get_all_vehicletype'] = $this->Fleetcategory_Model->get_all_vehicletype();

            $page['page']  = 'defaultpage';
            $page['pageUrl']  = 'login';
            $page['pagetitle'] = 'Fleet Category';
            $page['folder'] = 'fleetcategory';
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


    public function createvehicletype()
    {
        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $page['login_id'] = $session_data['login_id'];

            $result = $this->Fleetcategory_Model->createvehicletype($session_data['login_id']);

            if ($result === true) {
                $notification = array(
                    'message' => 'Vehicle Type Creation Successful',
                    'alert-type' => 'success'
                );
            } else {
                $notification = array(
                    'message' => 'Vehicle Type Creation Failed',
                    'alert-type' => 'success'
                );
            }
            $this->session->set_flashdata($notification);
            redirect('fleetcategory');
        } else {
            $notification = array(
                'message' => 'Seasion lost Please Login Again',
                'alert-type' => 'error'
            );

            $this->session->set_flashdata($notification);
            redirect('login', 'refresh');
        }
    }


    public function updatevehicleType()
    {
        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $page['login_id'] = $session_data['login_id'];

            $result = $this->Fleetcategory_Model->updatevehicleType($session_data['login_id']);
            // var_dump($result);
            // die;

            if ($result === true) {
                $notification = array(
                    'message' => ' vehicle Type Update Successful',
                    'alert-type' => 'success'
                );
            } else {
                $notification = array(
                    'message' => 'vehicle Type Update Failed',
                    'alert-type' => 'success'
                );
            }
            $this->session->set_flashdata($notification);
            redirect('fleetcategory');
        } else {
            $notification = array(
                'message' => 'Seasion lost Please Login Again',
                'alert-type' => 'error'
            );

            $this->session->set_flashdata($notification);
            redirect('login', 'refresh');
        }
    }

    public function enabl_disable_vehicleType()
    {
        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $page['login_id'] = $session_data['login_id'];

            $result = $this->Fleetcategory_Model->enabl_disable_vehicleType($session_data['login_id']);


            if ($result === true) {
                $notification = array(
                    'message' => 'vehicle Type Update Successful',
                    'alert-type' => 'success'
                );
            } else {
                $notification = array(
                    'message' => 'vehicle Type Update Failed',
                    'alert-type' => 'success'
                );
            }
            $this->session->set_flashdata($notification);
            redirect('fleetcategory');
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
