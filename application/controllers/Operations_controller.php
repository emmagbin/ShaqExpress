<?php
defined('BASEPATH') or exit('No direct script access allowed');
class operations_controller extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('User');
        $this->load->model('operationModel');
    }

    public function index()
    {


        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $page['login_id'] = $session_data['login_id'];
            $page['username'] = $session_data['username'];

            $page['role'] = $session_data['role'];
          $page['logincount'] = $this->User->checklogincount($session_data['login_id']);

            $page['get_all_orders'] = $this->operationModel->get_all_orders();




            $page['page']  = 'defaultpage';
            $page['pageUrl']  = 'login';
            $page['pagetitle'] = 'Operations';
            $page['folder'] = 'operations';
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
    public function createorder()
    {
        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $page['login_id'] = $session_data['login_id'];

            $output = $this->operationModel->insertNewOrder($session_data['login_id']);
            if ($output === true) {
                $notification = array(
                    'message' => 'Order Creation Successful',
                    'alert-type' => 'success'
                );
            } else {
                $notification = array(
                    'message' => 'Order Creation Failed',
                    'alert-type' => 'error'
                );
            }
            $this->session->set_flashdata($notification);
            redirect('operations', 'refresh');
        } else {
            $notification = array(
                'message' => 'Seasion lost Please Login Again',
                'alert-type' => 'error'
            );

            $this->session->set_flashdata($notification);
            redirect('login', 'refresh');
        }
    }


    public function confirmdelivery()
    {
        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $page['login_id'] = $session_data['login_id'];

            $output = $this->operationModel->confirmOrder($session_data['login_id']);
            if ($output === true) {
                $notification = array(
                    'message' => 'Order Delivery Update Successful',
                    'alert-type' => 'success'
                );
            } else {
                $notification = array(
                    'message' => 'Order Delivery Update Failed',
                    'alert-type' => 'error'
                );
            }
            $this->session->set_flashdata($notification);
            redirect('operations', 'refresh');
        } else {
            $notification = array(
                'message' => 'Seasion lost Please Login Again',
                'alert-type' => 'error'
            );

            $this->session->set_flashdata($notification);
            redirect('login', 'refresh');
        }
    }

    public function updateorder()
    {
        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $page['login_id'] = $session_data['login_id'];

            $output = $this->operationModel->updateorder($session_data['login_id']);
            if ($output === true) {
                $notification = array(
                    'message' => 'Order Delivery Update Successful',
                    'alert-type' => 'success'
                );
            } else {
                $notification = array(
                    'message' => 'Order Delivery Update Failed',
                    'alert-type' => 'error'
                );
            }
            $this->session->set_flashdata($notification);
            redirect('operations', 'refresh');
        } else {
            $notification = array(
                'message' => 'Seasion lost Please Login Again',
                'alert-type' => 'error'
            );

            $this->session->set_flashdata($notification);
            redirect('login', 'refresh');
        }
    }
































    public function fisDetails()
    {
        //var_dump('fisDetail'); die;
        $fiName = $this->input->post('finame');
        $query = $this->db->query("select * from fis  where fiName='$fiName'");
        $fisDetails = $query->result_array();

        echo json_encode($fisDetails);
    }

    public function all_roles()
    {
        $query = $this->db->query("select rolename from roles ");
        $users = $query->result();
        return $users;
    }


    public function all_Agents()
    {
        $query = $this->db->query("select * from Agents ");
        $users = $query->result();
        return $users;
    }

    function addAgent()
    {

        $data = array(
            'AgfullName' => $this->input->post('Agentname'),
            'AgGender' => $this->input->post('Agnetsex'),
            'AgPhoneNumber' => $this->input->post('Agentcontact'),
            'AgStatus' => 'A',
            'AgRegistrationDate' => date("Y-m-d"),
            'AgRegisteredBy' =>  $this->input->post('regby'),

        );

        //var_dump($data); die;
        $this->db->insert('Agents', $data);

        redirect('data');
    }




    public function editAgent()
    {
        $id = $this->input->post('txtidedit');
        $data = array(
            'AgfullName' => $this->input->post('txtAgfullName'),
            'AgPhoneNumber' => $this->input->post('txtAgPhoneNumber'),
        );
        $this->db->set($data);
        $this->db->where('id', $id);
        $this->db->update("Agents", $data);
        redirect('data');
    }




    public   function unlock()
    {
        $id = $this->input->post('id');
        //var_dump($id); die;
        $data = array(
            'AgStatus' => 'A'
        );
        $this->db->set($data);
        $this->db->where('id', $id);
        $this->db->update("Agents", $data);
        redirect('data');
    }

    public   function DisableAgent()
    {
        $id = $this->input->post('DisableAgentid');
        $data = array(
            'AgStatus' => 'D'
        );
        // var_dump($data); die;
        $this->db->set($data);
        $this->db->where('id', $id);
        $this->db->update("Agents", $data);
        redirect('data');
    }




























    // CHANGING OF PASSWORD
    public function change_password()
    {
        $password = $this->input->post("password");
        $new_pass = $this->input->post("new_pass");
        $new_pass_confirm = $this->input->post("new_pass_confirm");
        $user_email = $this->input->post("user_email");

        $pass = hash('sha512', $password);
        //var_dump($user_email); die;
        $result = $this->validate_old_password($pass, $user_email);
        //var_dump($result); die();
        if ($result == '1') {
            if ($new_pass == $new_pass_confirm) {

                $data = array('password' => hash('sha512', $new_pass));
                $this->db->set($data);
                $this->db->where('user_email', $user_email);
                $this->db->update("users", $data);

                echo $result;
            } else {
                //return 2;
                $result = 2;
                echo $result;
            }
        } else {
            echo $result;
        }
    }

    //PASSWORD VALIDATION
    public function validate_old_password($pass, $user_email)
    {
        $query = $this->db->query("select password from users where password='$pass' and user_email='$user_email' ");
        $result = $query->num_rows();
        if ($result >= 1) {
            return 1;
        } else {
            return 0;
        }
    }
}
