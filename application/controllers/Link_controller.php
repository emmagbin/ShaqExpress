
<?php
defined('BASEPATH') or exit('No direct script access allowed');

//This is the Controller for codeigniter crud using ajax application.
class link_controller extends CI_Controller
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
        $this->load->model('Driver_Model');

        $this->load->model('link_model');
    }


    public function index()
    {

        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $page['login_id'] = $session_data['login_id'];
            $page['username'] = $session_data['username'];

            $page['role'] = $session_data['role'];
            $page['logincount'] = $this->User->checklogincount($session_data['login_id']);
            $page['get_all_fleets'] = $this->link_model->getfleets();
            $page['get_all_drivers'] = $this->link_model->getdrivers();

            $page['get_all_link'] = $this->link_model->get_all_link();






            $page['page']  = 'defaultpage';
            $page['pageUrl']  = 'login';
            $page['pagetitle'] = 'Driver Fleet Link';
            $page['folder'] = 'link';
            $page['contentt'] = 'link';
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
    public function createlink()
    {
        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $page['login_id'] = $session_data['login_id'];

            $result = $this->link_model->createlink($session_data['login_id']);

            if ($result === true) {
                $notification = array(
                    'message' => 'Driver Vehicle Link Creation Successful',
                    'alert-type' => 'success'
                );
            } else {
                $notification = array(
                    'message' => 'Driver Vehicle Link Creation Failed',
                    'alert-type' => 'success'
                );
            }
            $this->session->set_flashdata($notification);
            redirect('link');
        } else {
            $notification = array(
                'message' => 'Seasion lost Please Login Again',
                'alert-type' => 'error'
            );

            $this->session->set_flashdata($notification);
            redirect('login', 'refresh');
        }
    }

    public function driveredit()
    {
        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $page['login_id'] = $session_data['login_id'];

            $result = $this->link_model->driveredit($session_data['login_id']);

            echo json_encode($result);
        }
    }

    public function vehicleedit()
    {
        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $page['login_id'] = $session_data['login_id'];

            $result = $this->link_model->vehicleedit($session_data['login_id']);
            echo json_encode($result);
        }
    }


    public function updatelink()
    {
        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $page['login_id'] = $session_data['login_id'];

            $result = $this->link_model->updatelink($session_data['login_id']);

            if ($result === true) {
                $notification = array(
                    'message' => 'Driver Vehicle Link Update Successful',
                    'alert-type' => 'success'
                );
            } else {
                $notification = array(
                    'message' => 'Driver Vehicle Link Update Failed',
                    'alert-type' => 'success'
                );
            }
            $this->session->set_flashdata($notification);
            redirect('link');
        } else {
            $notification = array(
                'message' => 'Seasion lost Please Login Again',
                'alert-type' => 'error'
            );

            $this->session->set_flashdata($notification);
            redirect('login', 'refresh');
        }
    }

    public function enabl_disable_link()
    {
        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $page['login_id'] = $session_data['login_id'];

            $result = $this->link_model->enabl_disable_link($session_data['login_id']);


            if ($result === true) {
                $notification = array(
                    'message' => 'Driver Vehicle Link Update Successful',
                    'alert-type' => 'success'
                );
            } else {
                $notification = array(
                    'message' => 'Driver Vehicle Link Update Failed',
                    'alert-type' => 'success'
                );
            }
            $this->session->set_flashdata($notification);
            redirect('link');
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
