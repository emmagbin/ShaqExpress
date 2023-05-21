
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//This is the Controller for codeigniter crud using ajax application.
class Accounts_controller extends CI_Controller {


    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        //$this->load->model('Service_Category_Model');
    }


 
    public function payments()
    {
        $page['page']  = 'defaultpage';
        $page['pageUrl']  = 'login';
        $page['pagetitle'] = 'Payments';
        $page['folder'] = 'accounts';
        $page['contentt'] = 'payments';
        $this->load->view('admin/views/' . $page['page'], $page);
    }


    public function estimates()
    {
        $page['page']  = 'defaultpage';
        $page['pageUrl']  = 'login';
        $page['pagetitle'] = 'Estimates';
        $page['folder'] = 'accounts';
        $page['contentt'] = 'estimates';
        $this->load->view('admin/views/' . $page['page'], $page);
    }
    public function createEstimate()
    {
        $page['page']  = 'defaultpage';
        $page['pageUrl']  = 'login';
        $page['pagetitle'] = 'Create Estimate';
        $page['folder'] = 'accounts';
        $page['contentt'] = 'createEstimate';
        $this->load->view('admin/views/' . $page['page'], $page);
    }

    public function EditEstimate()
    {
        $page['page']  = 'defaultpage';
        $page['pageUrl']  = 'login';
        $page['pagetitle'] = 'Edit Estimate';
        $page['folder'] = 'accounts';
        $page['contentt'] = 'editEstimate';
        $this->load->view('admin/views/' . $page['page'], $page);
    }
    public function AEstimate()
    {
        $page['page']  = 'defaultpage';
        $page['pageUrl']  = 'login';
        $page['pagetitle'] = 'Estimate View';
        $page['folder'] = 'accounts';
        $page['contentt'] = 'estimateview';
        $this->load->view('admin/views/' . $page['page'], $page);
    }


    
    public function expenses()
    {
        $page['page']  = 'defaultpage';
        $page['pageUrl']  = 'login';
        $page['pagetitle'] = 'Invoice Report';
        $page['folder'] = 'accounts';
        $page['contentt'] = 'expenses';
        $this->load->view('admin/views/' . $page['page'], $page);
    }

    public function invoices()
    {
        $page['page']  = 'defaultpage';
        $page['pageUrl']  = 'login';
        $page['pagetitle'] = 'Invoices';
        $page['folder'] = 'accounts';
        $page['contentt'] = 'invoice';
        $this->load->view('admin/views/' . $page['page'], $page);
    }

    public function invoiceview()
    {
        $page['page']  = 'defaultpage';
        $page['pageUrl']  = 'login';
        $page['pagetitle'] = 'Invoices';
        $page['folder'] = 'accounts';
        $page['contentt'] = 'invoiceview';
        $this->load->view('admin/views/' . $page['page'], $page);
    }

    public function createinvoice()
    {
        $page['page']  = 'defaultpage';
        $page['pageUrl']  = 'login';
        $page['pagetitle'] = 'Create Invoice';
        $page['folder'] = 'accounts';
        $page['contentt'] = 'createinvoice';
        $this->load->view('admin/views/' . $page['page'], $page);
    }

    public function editinvoice()
    {
        $page['page']  = 'defaultpage';
        $page['pageUrl']  = 'login';
        $page['pagetitle'] = 'Create Invoice';
        $page['folder'] = 'accounts';
        $page['contentt'] = 'editinvoice';
        $this->load->view('admin/views/' . $page['page'], $page);
    }

    
    
    public function index()
    {
        if($this->session->userdata('logged_in'))
        {
             $session_data = $this->session->userdata('logged_in');
            $dashboard['usersfullname'] = $session_data['usersfullname'];
            $dashboard['useremail'] = $session_data['useremail'];
            $dashboard['logintoken'] = $session_data['logintoken'];


              // $users['all_Business']=$this->all_Business();  

              // $users['countBusinesses']=$this->countBusinesses();
            // var_dump($users['countBusinesses']); die;

                //$users['roles']=$this->all_roles(); 
                 $users['active']='FI';
            $this->load->view('FIS',$users);
        }
        else
        {
            //If no session, redirect to login page
            redirect('login', 'refresh');
        }
    }


public function all_Business()
        {
            $query= $this->db->query("select * from Business");
             $all_Business= $query->result();
        return $all_Business;
        }

 public function all_roles()
    {
        $query= $this->db->query("select rolename from roles ");
        $users= $query->result();
        return $users;
    }


        public function countBusinesses()
        {
            $query= $this->db->query("select count(*)'totalbusiness' from Business ");
            $countBusinesses= $query->row();
            $users['totalbusiness']=$countBusinesses->totalbusiness;
            return $users['totalbusiness'];
        }


 public function editbusinnessinfo()
    {
        $adminemail=$this->input->post('txtadminemail');
        $organizationcode=$this->input->post('txtorganizationcode');
        
       $data = array(
            'Adminfullname' =>$this->input->post('txtadminfullname'),
            'Adminemail' => $this->input->post('txtadminemail'),
            'Admincontact' => $this->input->post('txtadmincontact'),
            'Bname' => $this->input->post('txtbname'),
            'Btype' =>$this->input->post('txtbtype'),
            'BdigitalAddress' => $this->input->post('txtbdigitaladdress'),
            'Bcontact' => $this->input->post('txtbcontact'),
            'Bemail' => $this->input->post('txtbemail'),   
        );

        $this->db->set($data);
        $this->db->where('OrganizationCode',$organizationcode);
        $this->db->update("Business",$data);

         $datauser = array(
            'fullName' =>$this->input->post('txtadminfullname'),
            'phoneNumber' => $this->input->post('txtadmincontact'), 
        );

        $this->db->set($datauser);
        $this->db->where('userEmail',$adminemail);
        $this->db->update("users",$datauser);
        redirect('utilities');
    }

public   function unlock()
    {
        $id=$this->input->post('id');
        //var_dump($id); die;
        $data=array(
            'Bstatus'=>'A'
        );
        $this->db->set($data);
        $this->db->where('OrganizationCode',$id);
        $this->db->update("Business",$data);
        redirect('utilities');
    }

 public   function disable()
    {
        $id=$this->input->post('id');
        $data=array(
            'Bstatus'=>'D'
        );
        $this->db->set($data);
        $this->db->where('OrganizationCode',$id);
        $this->db->update("Business",$data);
        redirect('utilities');
    }




}

