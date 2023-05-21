
<?php
defined('BASEPATH') or exit('No direct script access allowed');

//This is the Controller for codeigniter crud using ajax application.
class Fleet_expenses_controller extends CI_Controller
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

        $this->load->model('fleetexpensesetype_Model');
        $this->load->model('fleetexpenses_model');
    }

    public function index()
    {

        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $page['login_id'] = $session_data['login_id'];
            $page['username'] = $session_data['username'];

            $page['role'] = $session_data['role'];
             $page['logincount'] = $this->User->checklogincount($session_data['login_id']);
            $page['getexpensestype'] = $this->fleetexpensesetype_Model->getexpensestype();
            $page['get_all_fleets'] = $this->fleetexpenses_model->getfleets();

            $page['get_all_fleetexpenses'] = $this->fleetexpenses_model->get_all_fleetexpenses();



            $page['page']  = 'defaultpage';
            $page['pageUrl']  = 'login';
            $page['pagetitle'] = 'Fleet Expenses';

            $page['folder'] = 'fleetexpenses';
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

    public function fleetexpensestype()
    {


        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $page['login_id'] = $session_data['login_id'];
            $page['username'] = $session_data['username'];

            $page['role'] = $session_data['role'];
            $page['logincount'] = $this->User->checklogincount($session_data['login_id']);
            $page['get_all_fleets'] = $this->Fleets_model->get_all_fleets();


 

            $page['logincount'] = $this->User->checklogincount($session_data['login_id']);
            $page['get_all_expensesype'] = $this->fleetexpensesetype_Model->get_all_expensesype($session_data['login_id']);



            $page['page']  = 'defaultpage';
            $page['pageUrl']  = 'login';
            $page['pagetitle'] = 'Fleet Expenses Type';

            $page['folder'] = 'fleetexpensestype';
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
    // SELECT `id`, `expensetype`, `status`, `created_at`, `createdby`, `updatedby`, `updated_at` FROM `fleetexpensestype` WHERE 1
    public function createfleetexpensestype()
    {
        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $page['login_id'] = $session_data['login_id'];



            $result = $this->fleetexpensesetype_Model->createfleetexpensestype($session_data['login_id']);


            if ($result === true) {
                $notification = array(
                    'message' => 'Fleet Expenses Type save Successful',
                    'alert-type' => 'success'
                );
            } else {
                $notification = array(
                    'message' => 'Fleet Expenses Type save Failed',
                    'alert-type' => 'error'
                );
            }
            $this->session->set_flashdata($notification);
            redirect('fleetexpensestype', 'refresh');
        } else {
            $notification = array(
                'message' => 'Seasion lost Please Login Again',
                'alert-type' => 'error'
            );

            $this->session->set_flashdata($notification);
            redirect('login', 'refresh');
        }
    }


    public function updatefleetexpensestype()
    {
        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $page['login_id'] = $session_data['login_id'];

            $result = $this->fleetexpensesetype_Model->updatefleetexpensestype($session_data['login_id']);
            // var_dump($result);
            // die;

            if ($result === true) {
                $notification = array(
                    'message' => 'Expenses Type Update Successful',
                    'alert-type' => 'success'
                );
            } else {
                $notification = array(
                    'message' => 'Expenses Type Update Failed',
                    'alert-type' => 'error'
                );
            }
            $this->session->set_flashdata($notification);
            redirect('fleetexpensestype');
        } else {
            $notification = array(
                'message' => 'Seasion lost Please Login Again',
                'alert-type' => 'error'
            );

            $this->session->set_flashdata($notification);
            redirect('login', 'refresh');
        }
    }

    public function enabl_disable_fleetexpensesetype()
    {
        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $page['login_id'] = $session_data['login_id'];

            $result = $this->fleetexpensesetype_Model->enabl_disable_fleetexpensesetype($session_data['login_id']);


            if ($result === true) {
                $notification = array(
                    'message' => 'Expenses Type Update Successful',
                    'alert-type' => 'success'
                );
            } else {
                $notification = array(
                    'message' => 'Expenses Type Update Failed',
                    'alert-type' => 'error'
                );
            }
            $this->session->set_flashdata($notification);
            redirect('fleetexpensestype');
        } else {
            $notification = array(
                'message' => 'Seasion lost Please Login Again',
                'alert-type' => 'error'
            );

            $this->session->set_flashdata($notification);
            redirect('login', 'refresh');
        }
    }


    // ==========================FLEET EXPENSES METHODS=========================================================
    public function createfleetexpenses()
    {
        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $page['login_id'] = $session_data['login_id'];



            $result = $this->fleetexpenses_model->createfleetexpenses($session_data['login_id']);

            // var_dump($result);
            // die;
            if ($result === true) {
                $notification = array(
                    'message' => 'Fleet Expenses Type save Successful',
                    'alert-type' => 'success'
                );
            } else {
                $notification = array(
                    'message' => 'Fleet Expenses Type save Failed',
                    'alert-type' => 'error'
                );
            }
            $this->session->set_flashdata($notification);
            redirect('fleetexpenses', 'refresh');
        } else {
            $notification = array(
                'message' => 'Seasion lost Please Login Again',
                'alert-type' => 'error'
            );

            $this->session->set_flashdata($notification);
            redirect('login', 'refresh');
        }
    }


    public function updateFleet_expenses()
    {
        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $page['login_id'] = $session_data['login_id'];

            $result = $this->fleetexpenses_model->updateFleet_expenses($session_data['login_id']);
            // var_dump($result);
            // die;

            if ($result === true) {
                $notification = array(
                    'message' => 'Expenses Type Update Successful',
                    'alert-type' => 'success'
                );
            } else {
                $notification = array(
                    'message' => 'Expenses Type Update Failed',
                    'alert-type' => 'error'
                );
            }
            $this->session->set_flashdata($notification);
            redirect('fleetexpenses');
        } else {
            $notification = array(
                'message' => 'Seasion lost Please Login Again',
                'alert-type' => 'error'
            );

            $this->session->set_flashdata($notification);
            redirect('login', 'refresh');
        }
    }

    public function enable_disable_Fleet_expenses()
    {
        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $page['login_id'] = $session_data['login_id'];

            $result = $this->fleetexpenses_model->enable_disable_Fleet_expenses($session_data['login_id']);

            if ($result === true) {
                $notification = array(
                    'message' => 'Expenses  Update Successful',
                    'alert-type' => 'success'
                );
            } else {
                $notification = array(
                    'message' => 'Expenses  Update Failed',
                    'alert-type' => 'error'
                );
            }
            $this->session->set_flashdata($notification);
            redirect('fleetexpenses');
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
