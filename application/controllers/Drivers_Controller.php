
<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Drivers_Controller extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->helper('url');
    // $this->load->model('User', 'operationModel', TRUE);
    $this->load->model('User');
    $this->load->model('operationModel');
    $this->load->model('Driver_Model');
  }


  public function index()
  {
    if ($this->session->userdata('logged_in')) {
      $session_data = $this->session->userdata('logged_in');
      $page['login_id'] = $session_data['login_id'];
      $page['username'] = $session_data['username'];

      $page['role'] = $session_data['role'];
    $page['logincount'] = $this->User->checklogincount($session_data['login_id']);

      $page['get_all_drivers'] = $this->Driver_Model->get_all_drivers();




      $page['page']  = 'defaultpage';
      $page['pageUrl']  = 'login';
      $page['pagetitle'] = 'FLeet Drivers / Riders';
      $page['folder'] = 'drivers';
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



  public function createdriver()
  {
    if ($this->session->userdata('logged_in')) {
      $session_data = $this->session->userdata('logged_in');
      $page['login_id'] = $session_data['login_id'];

      $result = $this->Driver_Model->createdriver($session_data['login_id']);

      if ($result === true) {
        $notification = array(
          'message' => 'Driver / Rider Creation Successful',
          'alert-type' => 'success'
        );
      } else {
        $notification = array(
          'message' => 'Driver / Rider Creation Failed',
          'alert-type' => 'success'
        );
      }
      $this->session->set_flashdata($notification);
      redirect('drivers', 'refresh');
    } else {
      $notification = array(
        'message' => 'Seasion lost Please Login Again',
        'alert-type' => 'error'
      );

      $this->session->set_flashdata($notification);
      redirect('login', 'refresh');
    }
  }


  public function updatedriver()
  {
    if ($this->session->userdata('logged_in')) {
      $session_data = $this->session->userdata('logged_in');
      $page['login_id'] = $session_data['login_id'];

      $result = $this->Driver_Model->updatedriver($session_data['login_id']);
      // var_dump($result);
      // die;

      if ($result === true) {
        $notification = array(
          'message' => 'Driver / Rider Update Successful',
          'alert-type' => 'success'
        );
      } else {
        $notification = array(
          'message' => 'Driver / Rider Update Failed',
          'alert-type' => 'success'
        );
      }
      $this->session->set_flashdata($notification);
      redirect('drivers');
    } else {
      $notification = array(
        'message' => 'Seasion lost Please Login Again',
        'alert-type' => 'error'
      );

      $this->session->set_flashdata($notification);
      redirect('login', 'refresh');
    }
  }

  public function enabl_disable_edriver()
  {
    if ($this->session->userdata('logged_in')) {
      $session_data = $this->session->userdata('logged_in');
      $page['login_id'] = $session_data['login_id'];

      $result = $this->Driver_Model->enabl_disable_edriver($session_data['login_id']);


      if ($result === true) {
        $notification = array(
          'message' => 'Driver / Rider Update Successful',
          'alert-type' => 'success'
        );
      } else {
        $notification = array(
          'message' => 'Driver / Rider Update Failed',
          'alert-type' => 'success'
        );
      }
      $this->session->set_flashdata($notification);
      redirect('drivers');
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
