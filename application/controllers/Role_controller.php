<?php
defined('BASEPATH') or exit('No direct script access allowed');

//This is the Controller for codeigniter crud using ajax application.
class role_controller extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Home_model', '', TRUE);
        $this->load->helper('html');
    }


    public function index()
    {
        $page['page']  = 'defaultpage';
        $page['pageUrl']  = 'login';
        $page['pagetitle'] = 'Roles & Permissions';

        $page['folder'] = 'roles';
        $page['contentt'] = 'body';



        $this->load->view('admin/views/' . $page['page'], $page);
    }

    //    public function index()
    //    {


    //         if ($this->session->userdata('logged_in')) {
    //            $session_data = $this->session->userdata('logged_in');
    //            $dashboard['usersfullname'] = $session_data['usersfullname'];
    //            $dashboard['useremail'] = $session_data['useremail'];
    //            $dashboard['logintoken'] = $session_data['logintoken'];
    //            $dashboard['finame'] = $session_data['finame'];

    //            $page = 'index';
    //            if (!file_exists(APPPATH . 'views/' . $page . '.php')) {
    //                        // Whoops, we don't have a page for that!
    //                        show_404();
    //                    }
    //                    // var_dump($page);
    //                    // die;


    //            $passwordCombination ='magbin';
    //            $result = $this->Home_model->login($passwordCombination);


    // var_dump($result);
    //                    die;
    //                    $data['title'] = ucfirst($page); // Capitalize the first letter
    //                    $this->load->view('head', $data);
    //                    $this->load->view($page, $data);
    //                    $this->load->view('footer', $data);

    //        } else {
    //            //If no session, redirect to login page
    //            redirect('login', 'refresh');
    //        }

    //    } get_last_ten_entries

    public function index44()
    {

        $page = 'index';
        if (!file_exists(APPPATH . 'views/' . $page . '.php')) {
            // Whoops, we don't have a page for that!
            show_404();
        }

        $data['title'] = ucfirst($page); // Capitalize the first letter
        $this->load->view('head', $data);
        $this->load->view($page, $data);
        $this->load->view('footer', $data);
    }

    // public function WebsiteControl()
    // {

    //     $page = 'WebsiteControl';
    //     if (!file_exists(APPPATH . 'views/' . $page . '.php')) {
    //                 // Whoops, we don't have a page for that!
    //                 show_404();
    //          }

    //             $data['title'] = ucfirst($page); // Capitalize the first letter
    //             $this->load->view('head', $data);
    //             $this->load->view($page, $data);
    //             $this->load->view('footer', $data);
    // }

    public function index11()
    {
        $data['dashboard'] = $this->Home_model->get_dashboard_data();
        print_r($data['dashboard'][2]);
    }
    public function view_one()
    {
        $data = "89r@gmail.com";
        $data  = $this->Home_model->get_dashboard_data($data);
        print_r($data);
    }


    public function update()
    {

        $page = 'index';
        $this->load->helper('form');
        $this->load->library('form_validation');

        $data['title'] = 'index';

        $this->form_validation->set_rules('id', 'id', 'required');
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('text', 'Text', 'required');

        if ($this->form_validation->run() === FALSE) {

            $this->load->view('head', $data);
            $this->load->view($page, $data);
            $this->load->view('footer', $data);
        } else {
            $this->Home_model->updating_news();
            // var_dump('hii'); die;
            $this->load->view('head', $data);
            $this->load->view($page, $data);
            $this->load->view('footer', $data);
        }
    }

    public function create()
    {

        $page = 'index';
        $this->load->helper('form');
        $this->load->library('form_validation');

        $data['title'] = 'index';

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('text', 'Text', 'required');

        if ($this->form_validation->run() === FALSE) {

            $this->load->view('head', $data);
            $this->load->view($page, $data);
            $this->load->view('footer', $data);
        } else {
            $this->Home_model->set_news();
            // var_dump('hii'); die;
            $this->load->view('head', $data);
            $this->load->view($page, $data);
            $this->load->view('footer', $data);
        }
    }




    //    
}
