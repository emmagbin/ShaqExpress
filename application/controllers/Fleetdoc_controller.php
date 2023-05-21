
<?php
defined('BASEPATH') or exit('No direct script access allowed');
class fleetdoc_controller extends CI_Controller
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

        $this->load->model('fleets_model');


        $this->load->model('fleetdoc_Model');
    }


    public function index()
    {
        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $page['login_id'] = $session_data['login_id'];
            $page['username'] = $session_data['username'];

            $page['role'] = $session_data['role'];
            $page['logincount'] = $this->User->checklogincount($session_data['login_id']);

            $page['get_all_drivers'] = $this->fleetdoc_Model->get_all_fleetdoc();

            $page['get_all_fleets'] = $this->fleets_model->getfleets();
            $page['getdoctype'] = $this->fleetdoctype_model->getdoctype();




            // var_dump($page['get_all_fleets']);
            // die;



            $page['page']  = 'defaultpage';
            $page['pageUrl']  = 'login';
            $page['pagetitle'] = 'FLeet doc';
            $page['folder'] = 'fleetdoc';
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



    public function createdoc()
    {
        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $page['login_id'] = $session_data['login_id'];

            $result = $this->fleetdoc_Model->createdoc($session_data['login_id']);


            if ($result === true) {
                $notification = array(
                    'message' => 'Fleet Document save Successful',
                    'alert-type' => 'success'
                );
            } else {
                $notification = array(
                    'message' => 'Fleet Document save Failed',
                    'alert-type' => 'success'
                );
            }
            $this->session->set_flashdata($notification);
            redirect('fleetdoc', 'refresh');
        } else {
            $notification = array(
                'message' => 'Seasion lost Please Login Again',
                'alert-type' => 'error'
            );

            $this->session->set_flashdata($notification);
            redirect('login', 'refresh');
        }
    }


    public function updatedoc()
    {
        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $page['login_id'] = $session_data['login_id'];

            $result = $this->fleetdoc_Model->updatedoc($session_data['login_id']);
            // var_dump($result);
            // die;

            if ($result === true) {
                $notification = array(
                    'message' => 'Document Update Successful',
                    'alert-type' => 'success'
                );
            } else {
                $notification = array(
                    'message' => 'Document Update Failed',
                    'alert-type' => 'success'
                );
            }
            $this->session->set_flashdata($notification);
            redirect('fleetdoc');
        } else {
            $notification = array(
                'message' => 'Seasion lost Please Login Again',
                'alert-type' => 'error'
            );

            $this->session->set_flashdata($notification);
            redirect('login', 'refresh');
        }
    }

    public function enabl_disable_doc()
    {
        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $page['login_id'] = $session_data['login_id'];

            $result = $this->fleetdoc_Model->enabl_disable_doc($session_data['login_id']);


            if ($result === true) {
                $notification = array(
                    'message' => 'Document Update Successful',
                    'alert-type' => 'success'
                );
            } else {
                $notification = array(
                    'message' => 'Document Update Failed',
                    'alert-type' => 'success'
                );
            }
            $this->session->set_flashdata($notification);
            redirect('fleetdoc');
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
