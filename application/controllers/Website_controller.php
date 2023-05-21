
<?php
defined('BASEPATH') or exit('No direct script access allowed');

//This is the Controller for codeigniter crud using ajax application.
class Website_controller extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        //$this->load->model('Service_Category_Model');

    }

    public function login()
    {

        //$this->load->view('admin/login');


        $page['page'] = 'login';
        $this->load->view('admin/common/' . $page['page'], $page);
    }

    public function forgetpassword()
    {
        $page['page'] = 'resetpassword';
        $this->load->view('admin/common/' . $page['page'], $page);

    }

    public function register()
    {
        $page['page'] = 'register';
        $this->load->view('admin/common/' . $page['page'], $page);
    }

    public function recent_jobs()
    {

        $query = $this->db->query("select jobdetial.*, staff.lastname,staff.firstname,staff.othername,
    joblocation.locationname,jobcategory.categoryname from jobdetial inner join staff on 
    jobdetial.createby=staff.login_id inner join joblocation on joblocation.id=jobdetial.joblocation 
    inner join jobcategory on jobcategory.id=jobdetial.JobCategory where jobdetial.status!=2 
    ORDER BY created_at ASC
    LIMIT 10
    ");

        $joblocations = $query->result();
        return $joblocations;
    }


    public function index()
    {

        $jobs['recent_jobs'] = $this->recent_jobs();

        //If no session, redirect to login page
        $page['usersfullname'] = "";
        $page['page'] = 'index';
        $this->load->view('website/head', $page);
        $this->load->view('website/' . $page['page'], $jobs);
        $this->load->view('website/footer');
    }

    public function all_jobs()
    {
        $query = $this->db->query("select jobdetial.*, staff.lastname,staff.firstname,staff.othername,joblocation.locationname,jobcategory.categoryname from jobdetial inner join staff on jobdetial.createby=staff.login_id inner join joblocation on joblocation.id=jobdetial.joblocation inner join jobcategory on jobcategory.id=jobdetial.JobCategory where jobdetial.status!=2 
    ORDER BY created_at DESC
    ");

        $joblocations = $query->result();
        return $joblocations;
    }

    public function all_categories()
    {
        $query = $this->db->query("select categoryname  from jobcategory");

        $categoryname = $query->result();
        return $categoryname;
    }


    public function all_joblocations()
    {
        $query = $this->db->query("select locationname from joblocation");

        $joblocations = $query->result();
        return $joblocations;
    }

    public function jobs()
    {




        $categoryname = $this->input->post('categoryname');
        $locationname = $this->input->post('locationname');
        if ($locationname == "All" || $categoryname == "All" || $locationname == "" || $categoryname == "") {
            //$this->load->library('../controllers/JobsPortal_Controller');
            $jobs['all_jobs'] = $this->all_jobs();
        } else {
            $query = $this->db->query("select * 
    FROM jobdetial where joblocation='$locationname' and JobCategory='$categoryname'
    ORDER BY created_at DESC
    ");

            $advancejobsearch = $query->result();
            // echo json_encode($advancejobsearch);
            $jobs['all_jobs'] = $advancejobsearch;
        }

        $jobs['categoryname'] = $this->all_categories();

        $jobs['locationname'] = $this->all_joblocations();
        // var_dump($jobs['categoryname']); die;
        $page['page'] = 'jobs';
        $this->load->view('website/head', $page);
        $this->load->view('website/' . $page['page'], $jobs);
        // $this->load->view('admin/' . $page['page'] , $joblocations);
        $this->load->view('website/footer');
    }

    public function jobdetial($jobid)
    {
        $query = $this->db->query("select jobdetial.*, staff.lastname,staff.firstname,staff.othername,joblocation.locationname,jobcategory.categoryname from jobdetial inner join staff on jobdetial.createby=staff.login_id inner join joblocation on joblocation.id=jobdetial.joblocation inner join jobcategory on jobcategory.id=jobdetial.JobCategory where jobdetial.status!=2 and jobdetial.id='$jobid'
    ");

        $jobdetial = $query->result();
        return $jobdetial;
    }



    public function job_details()
    {

        $jobid = trim($this->uri->segment(3));
        $jobdetial['jobdetial'] = $this->jobdetial($jobid);


        // var_dump($jobdetial['jobdetial']); die;

        $page['page'] = 'job_details';
        $this->load->view('website/head', $page);
        $this->load->view('website/' . $page['page'], $jobdetial);
        $this->load->view('website/footer');
    }



    public function service()
    {



        $page['page'] = 'services';
        $this->load->view('website/head', $page);
        $this->load->view('website/' . $page['page']);
        $this->load->view('website/footer');
    }

    public function about()
    {

        $page['page'] = 'about';
        $this->load->view('website/head', $page);
        $this->load->view('website/' . $page['page']);
        $this->load->view('website/footer');
    }

    public function contact()
    {

        $page['page'] = 'contact';
        $this->load->view('website/head', $page);
        $this->load->view('website/' . $page['page']);
        $this->load->view('website/footer');
    }

    public function WebsiteControl()
    {
        $pagename = 'WebsiteControl';
        $page['title'] = $pagename;
        $this->load->view('website/' . $pagename, $page);
    }
}
