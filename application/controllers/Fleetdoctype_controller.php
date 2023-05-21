
<?php
defined('BASEPATH') or exit('No direct script access allowed');

//This is the Controller for codeigniter crud using ajax application.
class fleetdoctype_controller extends CI_Controller
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
        $this->load->model('fleetdoctype_model');
    }


    public function index()
    {

        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $page['login_id'] = $session_data['login_id'];
            $page['username'] = $session_data['username'];

            $page['role'] = $session_data['role'];
           $page['logincount'] = $this->User->checklogincount($session_data['login_id']);
            $page['get_all_doctype'] = $this->fleetdoctype_model->get_all_doctype();

            $page['page']  = 'defaultpage';
            $page['pageUrl']  = 'login';
            $page['pagetitle'] = 'Fleet Document Type';
            $page['folder'] = 'fleetdoctype';
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


    public function createdoctype()
    {
        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $page['login_id'] = $session_data['login_id'];

            $result = $this->fleetdoctype_model->createdoctype($session_data['login_id']);

            if ($result === true) {
                $notification = array(
                    'message' => 'Vehicle Documment Type Creation Successful',
                    'alert-type' => 'success'
                );
            } else {
                $notification = array(
                    'message' => 'Vehicle Documment Type Creation Failed',
                    'alert-type' => 'success'
                );
            }
            $this->session->set_flashdata($notification);
            redirect('fleetdoctype');
        } else {
            $notification = array(
                'message' => 'Seasion lost Please Login Again',
                'alert-type' => 'error'
            );

            $this->session->set_flashdata($notification);
            redirect('login', 'refresh');
        }
    }


    public function updatedoctype()
    {
        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $page['login_id'] = $session_data['login_id'];

            $result = $this->fleetdoctype_model->updatdoctype($session_data['login_id']);
            // var_dump($result);
            // die;

            if ($result === true) {
                $notification = array(
                    'message' => ' vehicle Documment Type Update Successful',
                    'alert-type' => 'success'
                );
            } else {
                $notification = array(
                    'message' => 'vehicle Documment Type Update Failed',
                    'alert-type' => 'success'
                );
            }
            $this->session->set_flashdata($notification);
            redirect('fleetdoctype');
        } else {
            $notification = array(
                'message' => 'Seasion lost Please Login Again',
                'alert-type' => 'error'
            );

            $this->session->set_flashdata($notification);
            redirect('login', 'refresh');
        }
    }

    public function enabl_disable_doctype()
    {
        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $page['login_id'] = $session_data['login_id'];

            $result = $this->fleetdoctype_model->enabl_disable_doctype($session_data['login_id']);


            if ($result === true) {
                $notification = array(
                    'message' => 'vehicle Documment Type Update Successful',
                    'alert-type' => 'success'
                );
            } else {
                $notification = array(
                    'message' => 'vehicle Documment Type Update Failed',
                    'alert-type' => 'success'
                );
            }
            $this->session->set_flashdata($notification);
            redirect('fleetdoctype');
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
