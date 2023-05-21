<?php
defined('BASEPATH') or exit('No direct script access allowed');

//This is the Controller for codeigniter crud using ajax application. JobsPortal_Controller.php
class Report_Controller extends CI_Controller
{

// $route['expenses'] = 'Report_Controller/expenses';
// $route['income'] = 'Report_Controller/income';
// $route['invoice'] = 'Report_Controller/invoice';
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        // $this->load->model('JobsPortal_model');
        $this->load->model('JobsPortal_model', '', TRUE);
        $this->load->model('user', '', TRUE);
    }

    public function expenses()
    {
        $page['page']  = 'defaultpage';
        $page['pageUrl']  = 'login';
        $page['pagetitle'] = 'Expense Report';
        $page['folder'] = 'reports';
        $page['contentt'] = 'expenditure';
        $this->load->view('admin/views/' . $page['page'], $page);
    }



     public function income()
    {
        $page['page']  = 'defaultpage';
        $page['pageUrl']  = 'login';
        $page['pagetitle'] = 'Income';
        $page['folder'] = 'reports';
        $page['contentt'] = 'income';
        $this->load->view('admin/views/' . $page['page'], $page);
    }


    public function invoice()
    {
        $page['page']  = 'defaultpage';
        $page['pageUrl']  = 'login';
        $page['pagetitle'] = 'Invoice Report';
        $page['folder'] = 'reports';
        $page['contentt'] = 'invoice';
        $this->load->view('admin/views/' . $page['page'], $page);
    }


    public function invoiceView()
    {
        $page['page']  = 'defaultpage';
        $page['pageUrl']  = 'login';
        $page['pagetitle'] = 'Invoice View';
        $page['folder'] = 'reports';
        $page['contentt'] = 'invoiceView';
        $this->load->view('admin/views/' . $page['page'], $page);
    }
    
    public function jobs()
    {

        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $page['id'] = $session_data['id'];
            $page['email'] = $session_data['email'];

            $page['role'] = $session_data['role'];

            $page['isLogin'] = $session_data['isLogin'];

            if ($page['email'] !== 'admin@gmail.com') {

                $user['Systemuser'] = $session_data['Systemuser'];

                $myname = $user['Systemuser']['0']["fullname"];
                $page['Systemuser'] = $myname;


                $user['Systemuserphoto'] = $session_data['Systemuserphoto'];
                $myphoto = $user['Systemuserphoto'];
                $page['Systemuserphoto'] = $myphoto;
            } else {
                $page['Systemuser'] = 'System Administrator';
                $user['Systemuserphoto'] = $session_data['Systemuserphoto'];
                $myphoto = $user['Systemuserphoto'];
                $page['Systemuserphoto'] = $myphoto;
            }

            $page['page'] = 'joblist';
            $page['pagetitle'] = 'Job List';
            $page['pageUrl'] = 'Jobs Management / Job List';




            $page['positions'] = $this->all_jobs();

            $page['all_catergory'] = $this->all_catergory();
            $page['job_regions'] = $this->job_regions();


            $page['privileges'] = $this->user->userPrivileges($session_data['role']);

            // if (count($Privileges) > 0) {
            //     $page['privileges'] = $Privileges;
            // } else {
            //     $page['privileges'] = "0";
            // }

            // die;





            // $page['Privileges'] = $this->user->userPrivileges($session_data['role']);

            // var_dump($page['Privileges']);
            // die;





            $this->load->view('admin/views/' . $page['page'], $page);
        } else {
            $notification = array(
                'message' => 'Same Account Have Been Used In Login Into the System On another device. <br> Login Again and change Your login credentials',
                'alert-type' => 'error'
            );
            $this->session->set_flashdata($notification);
            redirect('login');
        }

        // print_r($this->load->library('session'));
        // die;

    }



    public function job()
    {

        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $page['id'] = $session_data['id'];
            $page['email'] = $session_data['email'];

            $page['role'] = $session_data['role'];

            $page['isLogin'] = $session_data['isLogin'];

            if ($page['email'] !== 'admin@gmail.com') {

                $user['Systemuser'] = $session_data['Systemuser'];

                $myname = $user['Systemuser']['0']["fullname"];
                $page['Systemuser'] = $myname;


                $user['Systemuserphoto'] = $session_data['Systemuserphoto'];
                $myphoto = $user['Systemuserphoto'];
                $page['Systemuserphoto'] = $myphoto;
            } else {
                $page['Systemuser'] = 'System Administrator';
                $user['Systemuserphoto'] = $session_data['Systemuserphoto'];
                $myphoto = $user['Systemuserphoto'];
                $page['Systemuserphoto'] = $myphoto;
            }

            $page['page'] = 'joblist';
            $page['pagetitle'] = 'Job List';
            $page['pageUrl'] = 'Jobs Management / Job Vaccancies';




            $page['positions'] = $this->all_jobs();




            // $page['all_catergory'] = $this->all_catergory();
            // $page['job_regions'] = $this->job_regions();

            // var_dump($page['all_catergory']);
            // die;







            $privileges = $this->user->userPrivileges($session_data['role']);

            if (count($privileges) > 0) {
                $page['privileges'] = $privileges;
            } else if ($page['role'] === 'jobseeker' || $page['role'] === 'Admin' || $page['role'] === 'Developer') {
                $page['privileges'] = $privileges;
                $page['role'] = $page['role'];
            } else {
                $notification = array(
                    'message' => 'System User Has No Role To Play In The System',
                    'alert-type' => 'error'
                );
                $this->session->set_flashdata($notification);
                redirect('login');
            }








            $this->load->view('admin/views/' . $page['page'], $page);
        } else {
            $notification = array(
                'message' => 'Same Account Have Been Used In Login Into the System On another device. <br> Login Again and change Your login credentials',
                'alert-type' => 'error'
            );
            $this->session->set_flashdata($notification);
            redirect('login');
        }

        // print_r($this->load->library('session'));
        // die;

    }


    public function jobadd()
    {

        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $page['id'] = $session_data['id'];
            $page['email'] = $session_data['email'];

            $page['role'] = $session_data['role'];

            $page['isLogin'] = $session_data['isLogin'];

            // var_dump($users['isLogin']);
            // die;



            if ($page['email'] !== 'admin@gmail.com') {

                $user['Systemuser'] = $session_data['Systemuser'];

                $myname = $user['Systemuser']['0']["fullname"];
                $page['Systemuser'] = $myname;


                $user['Systemuserphoto'] = $session_data['Systemuserphoto'];
                $myphoto = $user['Systemuserphoto'];
                $page['Systemuserphoto'] = $myphoto;
            } else {
                $page['Systemuser'] = 'System Administrator';
                $user['Systemuserphoto'] = $session_data['Systemuserphoto'];
                $myphoto = $user['Systemuserphoto'];
                $page['Systemuserphoto'] = $myphoto;
            }

            // $page['admindashboard'] = $this->dashboard_data();

            $privileges = $this->user->userPrivileges($session_data['role']);

            if (count($privileges) > 0) {
                $page['privileges'] = $privileges;
            } else if ($page['role'] === 'jobseeker' || $page['role'] === 'Admin' || $page['role'] === 'Developer') {
                $page['privileges'] = $privileges;
                $page['role'] = $page['role'];
            } else {
                $notification = array(
                    'message' => 'System User Has No Role To Play In The System',
                    'alert-type' => 'error'
                );
                $this->session->set_flashdata($notification);
                redirect('login');
            }




            $page['all_catergory'] = $this->all_catergory();
            $page['job_regions'] = $this->job_regions();





            $page['page'] = 'jobadd';
            $page['pagetitle'] = 'Job create';
            $page['pageUrl'] = 'Jobs Management /' . $page['pagetitle'];
            $this->load->view('admin/views/' . $page['page'], $page);
        }
    }



    public function editJobVacancy()
    {

        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $page['id'] = $session_data['id'];
            $page['email'] = $session_data['email'];

            $page['role'] = $session_data['role'];

            $page['isLogin'] = $session_data['isLogin'];

            // var_dump($users['isLogin']);
            // die;



            if ($page['email'] !== 'admin@gmail.com') {

                $user['Systemuser'] = $session_data['Systemuser'];

                $myname = $user['Systemuser']['0']["fullname"];
                $page['Systemuser'] = $myname;


                $user['Systemuserphoto'] = $session_data['Systemuserphoto'];
                $myphoto = $user['Systemuserphoto'];
                $page['Systemuserphoto'] = $myphoto;
            } else {
                $page['Systemuser'] = 'System Administrator';
                $user['Systemuserphoto'] = $session_data['Systemuserphoto'];
                $myphoto = $user['Systemuserphoto'];
                $page['Systemuserphoto'] = $myphoto;
            }

            $privileges = $this->user->userPrivileges($session_data['role']);

            if (count($privileges) > 0) {
                $page['privileges'] = $privileges;
            } else if ($page['role'] === 'jobseeker' || $page['role'] === 'Admin' || $page['role'] === 'Developer') {
                $page['privileges'] = $privileges;
                $page['role'] = $page['role'];
            } else {
                $notification = array(
                    'message' => 'System User Has No Role To Play In The System',
                    'alert-type' => 'error'
                );
                $this->session->set_flashdata($notification);
                redirect('login');
            }


            $uniqueJobId = $this->input->post('jobid');

            $page['jobbid']= $this->input->post('jobid');

            $query = $this->db->query("select jobdetial.* from jobdetial where jobdetial.id='$uniqueJobId' ");

            $page['jobdetail'] = $query->result();

            $page['all_catergory'] = $this->all_catergory();
            $page['job_regions'] = $this->job_regions();





            $page['page'] = 'jobedit';
            $page['pagetitle'] = 'Job Vacancy Update';
            $page['pageUrl'] = 'Jobs Management /' . $page['pagetitle'];
            $this->load->view('admin/views/' . $page['page'], $page);
        }
    }


    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function all_joblocations()
    {
        $query = $this->db->query("select joblocation.*, staff.lastname,staff.firstname,staff.othername from joblocation inner join staff on joblocation.createby=staff.login_id where joblocation.status!=2 ");

        $joblocations = $query->result();
        return $joblocations;
    }
    public function jobLocation()
    {
        if ($this->session->userdata('logged_in')) {

            $session_data = $this->session->userdata('logged_in');
            $joblocations['id'] = $session_data['id'];
            $joblocations['email'] = $session_data['email'];
            $joblocations['role'] = $session_data['role'];



            if ($joblocations['email'] !== 'admin@gmail.com') {

                $user['Systemuser'] = $session_data['Systemuser'];
                $myname = $user['Systemuser']['0']["fullname"];
                $joblocations['Systemuser'] = $myname;

                $user['Systemuserphoto'] = $session_data['Systemuserphoto'];
                //$myphoto=$user['Systemuserphoto'];
                $myphoto = $user['Systemuserphoto'];
                $joblocations['Systemuserphoto'] = $myphoto;
            } else {
                $joblocations['Systemuser'] = 'System Administrator';
                $joblocations['Systemuserphoto'] = 0;
            }


            $joblocations['locations'] = $this->all_joblocations();
            // var_dump($joblocations['id']); die;
            $page['page'] = 'jobLocation';
            $this->load->view('admin/' . $page['page'], $joblocations);
        } else {
            //If no session, redirect to login page
            redirect('login', 'refresh');
        }
    }

    public function addlocation()
    {
        if ($this->session->userdata('logged_in')) {

            $session_data = $this->session->userdata('logged_in');
            $joblocations['id'] = $session_data['id'];
            $joblocations['email'] = $session_data['email'];
            $joblocations['role'] = $session_data['role'];



            //locationname locationid

            $newlocation = trim($this->input->post('Location'));
            $creatorid = $this->input->post('creatorid');
            $query = $this->db->query("select * from joblocation where locationname='$newlocation' ");
            $result = $query->num_rows();
            if ($result >= 1) {

                $notification = array(
                    'message' => 'Job Location Already Exist In the System',
                    'alert-type' => 'error'
                );
            } else {

                $data = array(
                    'locationname' => $newlocation,
                    'createby' => $session_data['id']
                );
                $this->db->insert('joblocation', $data);

                $notification = array(
                    'message' => 'Job Location Name Has Been Added Successfully ',
                    'alert-type' => 'success'
                );
            }

            $this->session->set_flashdata($notification);
            redirect('locationadd');
        }
    }



    // ==============================================================================================================
    public function all_jobareas()
    {
        $query = $this->db->query("select jobcategory.*, staff.lastname,staff.firstname,staff.othername from jobcategory inner join staff on jobcategory.createby=staff.login_id where jobcategory.status!=2 ");

        $joblocations = $query->result();
        return $joblocations;
    }
    public function jobIndustries()
    {
        if ($this->session->userdata('logged_in')) {

            $session_data = $this->session->userdata('logged_in');
            $jobIndustries['id'] = $session_data['id'];
            $jobIndustries['email'] = $session_data['email'];
            $jobIndustries['role'] = $session_data['role'];




            if ($jobIndustries['email'] !== 'admin@gmail.com') {

                $user['Systemuser'] = $session_data['Systemuser'];
                $myname = $user['Systemuser']['0']["fullname"];
                $jobIndustries['Systemuser'] = $myname;

                $user['Systemuserphoto'] = $session_data['Systemuserphoto'];
                $myphoto = $user['Systemuserphoto'];
                $jobIndustries['Systemuserphoto'] = $myphoto;
            } else {
                $jobIndustries['Systemuser'] = 'System Administrator';
                $jobIndustries['Systemuserphoto'] = 0;
            }




            $jobIndustries['jobIndustries'] = $this->all_jobareas();
            // var_dump($joblocations['id']); die;
            $page['page'] = 'jobIndustries';
            $this->load->view('admin/' . $page['page'], $jobIndustries);
        } else {
            //If no session, redirect to login page
            redirect('login', 'refresh');
        }
    }

    public function addCategory()
    {

        $newCategory = trim($this->input->post('Category'));
        $creatorid = $this->input->post('creatorid');
        $query = $this->db->query("select * from jobcategory where categoryname='$newCategory' ");
        $result = $query->num_rows();
        if ($result >= 1) {
            $output = "Job Category Already Exist In the System";
        } else {

            $data = array(
                'categoryname' => $newCategory,
                'createby' => $creatorid
            );
            $this->db->insert('jobcategory', $data);
            $output = "Job Category Name Has Been Successfully Added";
        }

        echo $output;
    }






    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function all_jobs()
    {
        $query = $this->db->query("select jobdetial.*, staff.lastname,staff.firstname,staff.othername,joblocation.locationname,jobcategory.categoryname from jobdetial inner join staff on jobdetial.createby=staff.login_id inner join joblocation on joblocation.id=jobdetial.joblocation inner join jobcategory on jobcategory.id=jobdetial.JobCategory where jobdetial.status!=2
        ORDER BY jobdetial.id DESC ");

        $joblocations = $query->result();
        return $joblocations;
    }


    public function all_catergory()
    {
        $query = $this->db->query("select * from jobcategory");

        $all_catergory = $query->result();
        return $all_catergory;
    }


    public function job_regions()
    {
        $query = $this->db->query("select * from joblocation");

        $job_regions = $query->result();
        return $job_regions;
    }


    public function positions()
    {
        if ($this->session->userdata('logged_in')) {

            $session_data = $this->session->userdata('logged_in');
            $positions['id'] = $session_data['id'];
            $positions['email'] = $session_data['email'];
            $positions['role'] = $session_data['role'];


            if ($positions['email'] !== 'admin@gmail.com') {

                $user['Systemuser'] = $session_data['Systemuser'];
                $myname = $user['Systemuser']['0']["fullname"];
                $positions['Systemuser'] = $myname;

                $user['Systemuserphoto'] = $session_data['Systemuserphoto'];
                $myphoto = $user['Systemuserphoto'];
                $positions['Systemuserphoto'] = $myphoto;
            } else {
                $positions['Systemuser'] = 'System Administrator';
                $positions['Systemuserphoto'] = 0;
            }

            $positions['positions'] = $this->all_jobs();

            $positions['all_catergory'] = $this->all_catergory();
            $positions['job_regions'] = $this->job_regions();
            // var_dump($joblocations['id']); die; categoryname
            $page['page'] = 'positions';
            $this->load->view('admin/' . $page['page'], $positions);
        } else {
            //If no session, redirect to login page
            redirect('login', 'refresh');
        }
    }

    public function addposition()
    {



        $newlocation = trim($this->input->post('Location'));
        $creatorid = $this->input->post('creatorid');
        // echo trim($this->input->post('JobRequirement')); die;

        $data = array(
            'jobtitle' => trim($this->input->post('JobTitle')),
            'companyname' => trim($this->input->post('CompanyName')),
            'jobtype' => trim($this->input->post('JobType')),
            'joblocation' => trim($this->input->post('JobRegion')),
            'town' => trim($this->input->post('Town')),
            'expectedsalary' => trim($this->input->post('ExpectedSalary')),
            'JobCategory' => trim($this->input->post('JobCategory')),
            'applicationstartsdate' => trim($this->input->post('ApplicationStartDate')),
            'applicationclosingdate' => trim($this->input->post('ApplicationClosingDate')),
            'description' => trim($this->input->post('JobDescription')),
            'benefits' => trim($this->input->post('Benefits')),
            'jobrequirements' => trim($this->input->post('JobRequirement')),
            'createby' => trim($this->input->post('creatorid'))
        );
        //var_dump($data); die;
        $this->db->insert('jobdetial', $data);
        echo "Job Has Been Successfully Posted";
    }




    // ===============================================================================================================
    public function jobs1()
    {
        if ($this->session->userdata('logged_in')) {

            $session_data = $this->session->userdata('logged_in');
            $jobs['id'] = $session_data['id'];
            $jobs['email'] = $session_data['email'];
            $jobs['role'] = $session_data['role'];


            if ($jobs['email'] !== 'admin@gmail.com') {

                $user['Systemuser'] = $session_data['Systemuser'];
                $myname = $user['Systemuser']['0']["fullname"];
                $jobs['Systemuser'] = $myname;

                $user['Systemuserphoto'] = $session_data['Systemuserphoto'];
                $myphoto = $user['Systemuserphoto'];
                $jobs['Systemuserphoto'] = $myphoto;
            } else {
                $jobs['Systemuser'] = 'System Administrator';
                $jobs['Systemuserphoto'] = 0;
            }



            $jobs['positions'] = $this->all_jobs();
            //var_dump($jobs['id']); die;
            $page['page'] = 'jobs';
            $this->load->view('admin/' . $page['page'], $jobs);
        } else {
            //If no session, redirect to login page
            redirect('login', 'refresh');
        }
    }


    public function a_job($jobid)
    {
        $query = $this->db->query("select jobdetial.*, staff.lastname,staff.firstname,staff.othername,
    joblocation.locationname,jobcategory.categoryname from jobdetial inner join staff on 
    jobdetial.createby=staff.login_id inner join joblocation on joblocation.id=jobdetial.joblocation 
    inner join jobcategory on jobcategory.id=jobdetial.JobCategory  where jobdetial.id= '$jobid' ");
        $joblocations = $query->result();
        return $joblocations;
    }
    public function allSimilarjobs()
    {
        $query = $this->db->query("select jobdetial.*, staff.lastname,staff.firstname,staff.othername,
    joblocation.locationname,jobcategory.categoryname from jobdetial inner join staff on 
    jobdetial.createby=staff.login_id inner join joblocation on joblocation.id=jobdetial.joblocation 
    inner join jobcategory on jobcategory.id=jobdetial.JobCategory where jobdetial.status!=2
        LIMIT 5");

        $joblocations = $query->result();
        return $joblocations;
    }


    public function jobdetails()
    {
        if ($this->session->userdata('logged_in')) {

            // var_dump($jobdetails); die;

            $session_data = $this->session->userdata('logged_in');
            $jobdetails['id'] = $session_data['id'];
            $jobdetails['email'] = $session_data['email'];
            $jobdetails['role'] = $session_data['role'];
            $jobid = trim($this->uri->segment(1));
            $seekerId = $session_data['id'];

            //var_dump($jobid); die;
            $jobdetails['jobid'] = $jobid;




            $query2 = $this->db->query("select totalviewed as totalviewed from jobdetial where id='$jobid' ");




            $result2 = $query2->result_array();
            $myresult2 = $result2[0]['totalviewed'] + 1;
            $data = array(
                'totalviewed' => $myresult2
            );
            $this->db->set($data);
            $this->db->where('id', $jobid);
            $this->db->update("jobdetial", $data);




            $jobdetails['a_job'] = $this->a_job($jobid);
            $jobdetails['allSimilarjobs'] = $this->allSimilarjobs();

            // var_dump($a_job); die;


            if ($jobdetails['email'] !== 'admin@gmail.com') {

                $user['Systemuser'] = $session_data['Systemuser'];
                $myname = $user['Systemuser']['0']["fullname"];
                $jobdetails['Systemuser'] = $myname;

                $user['Systemuserphoto'] = $session_data['Systemuserphoto'];
                //$myphoto=$user['Systemuserphoto'];
                $myphoto = $user['Systemuserphoto'];
                $jobdetails['Systemuserphoto'] = $myphoto;


                $jobseekerApplied = $this->db->query("select count(*) as applied from jobapplications where jobseeker_id='$seekerId' and job_id='$jobid' ");
                $theResult = $jobseekerApplied->result_array();
                $jobdetails['hasApplied'] = $theResult[0]['applied'];
            } else {
                $jobdetails['Systemuser'] = 'System Administrator';
                $jobdetails['Systemuserphoto'] = 0;
            }




            $page['page'] = 'jobdetails';
            $jobdetails['hasApplied'] = 0;
            $this->load->view('admin/views/' . $page['page'], $jobdetails);
        } else {
            //If no session, redirect to login page
            redirect('login', 'refresh');
        }
    }


    public function myview()
    {
        $jobid = trim($this->uri->segment(2));
        // var_dump($jobid); die;
        //redirect($jobid);

        $url = base_url() . $jobid;
        redirect($url);
    }



    public function applyforjob()
    {
        $job_id = trim($this->input->post('job_id'));
        $jobseeker_id = trim($this->input->post('jobseeker_id'));

        $query = $this->db->query("select cv as cv from jobseeker where login_id='$jobseeker_id' and status=1 ");
        $result = $query->result_array();
        $myresult = $result[0]['cv'];
        // echo $result[0]['cv']; die;
        if ($myresult == 1) {
            $query1 = $this->db->query("select * from jobapplications where job_id='$job_id' and jobseeker_id='$jobseeker_id'   ");
            $result1 = $query1->num_rows();

            // echo $result1; die;
            if ($result1 >= 1) {
                $output = 0;
            } else {

                $data = array(
                    'job_id' => trim($this->input->post('job_id')),
                    'jobseeker_id' => trim($this->input->post('jobseeker_id'))
                );
                $this->db->insert('jobapplications', $data);

                $query2 = $this->db->query("select totalapplications as totalapplications from jobdetial where id='$job_id' ");
                $result2 = $query2->result_array();
                $myresult2 = $result2[0]['totalapplications'] + 1;
                $data = array(
                    'totalapplications' => $myresult2
                );
                $this->db->set($data);
                $this->db->where('id', $job_id);
                $this->db->update("jobdetial", $data);


                $output = 1;
            }
        } else {

            $output = 2;
        }

        echo $output;
    }

    public function all_applicants()
    {
        $query = $this->db->query("select jobdetial.id,JobCategory,jobtitle,companyname,jobtype,joblocation,town,expectedsalary,
firstname,othername,lastname,gender,contact1,contact2,profession,highestqualification,availability,experience,salaryexpectation,currentjob,jobapplications.created_at, jobapplications.jobseeker_id,jobapplications.id as jobapplications_id FROM `jobdetial`inner join jobapplications  on jobdetial.id=jobapplications.job_id inner join jobseeker on jobseeker.login_id=jobapplications.jobseeker_id where jobapplications.status!=2
");

        $all_applicants = $query->result();
        return $all_applicants;
    }

    public function applicants()
    {


        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $page['id'] = $session_data['id'];
            $page['email'] = $session_data['email'];

            $page['role'] = $session_data['role'];

            $page['isLogin'] = $session_data['isLogin'];

            // var_dump($users['isLogin']);
            // die;



            if ($page['email'] !== 'admin@gmail.com') {

                $user['Systemuser'] = $session_data['Systemuser'];

                $myname = $user['Systemuser']['0']["fullname"];
                $page['Systemuser'] = $myname;


                $user['Systemuserphoto'] = $session_data['Systemuserphoto'];
                $myphoto = $user['Systemuserphoto'];
                $page['Systemuserphoto'] = $myphoto;
            } else {
                $page['Systemuser'] = 'System Administrator';
                $user['Systemuserphoto'] = $session_data['Systemuserphoto'];
                $myphoto = $user['Systemuserphoto'];
                $page['Systemuserphoto'] = $myphoto;
            }


            $page['applicants'] = $this->all_applicants();
            $privileges = $this->user->userPrivileges($session_data['role']);

            if (count($privileges) > 0) {
                $page['privileges'] = $privileges;
            } else if ($page['role'] === 'jobseeker' || $page['role'] === 'Admin' || $page['role'] === 'Developer') {
                $page['privileges'] = $privileges;
                $page['role'] = $page['role'];
            } else {
                $notification = array(
                    'message' => 'System User Has No Role To Play In The System',
                    'alert-type' => 'error'
                );
                $this->session->set_flashdata($notification);
                redirect('login');
            }





            $page['page'] = 'applicants';
            $page['pagetitle'] = 'Applicants';
            $page['pageUrl'] = 'Jobs Management /' . $page['pagetitle'];
            $this->load->view('admin/views/' . $page['page'], $page);
        } else {
            //If no session, redirect to login page
            redirect('login', 'refresh');
        }








        // if ($this->session->userdata('logged_in')) {

        //     $session_data = $this->session->userdata('logged_in');
        //     $applicants['id'] = $session_data['id'];
        //     $applicants['email'] = $session_data['email'];
        //     $applicants['role'] = $session_data['role'];

        //     if ($applicants['email'] !== 'admin@gmail.com') {

        //         $user['Systemuser'] = $session_data['Systemuser'];
        //         $myname = $user['Systemuser']['0']["fullname"];
        //         $applicants['Systemuser'] = $myname;

        //         $user['Systemuserphoto'] = $session_data['Systemuserphoto'];
        //         $myphoto = $user['Systemuserphoto'];
        //         $applicants['Systemuserphoto'] = $myphoto;
        //     } else {
        //         $applicants['Systemuser'] = 'System Administrator';
        //         $applicants['Systemuserphoto'] = 0;
        //     }



        //     $applicants['applicants'] = $this->all_applicants();
        //     // var_dump($applicants['applicants']); die;
        //     $page['page'] = 'applicants';
        //     $this->load->view('admin/' . $page['page'], $applicants);
        // } else {
        //     //If no session, redirect to login page
        //     redirect('login', 'refresh');
        // }
    }








    // ======================================================================
    public   function deleteapplication()
    {
        $id = $this->input->post("txtid");
        $data = array(
            'status' => 2 // $this->input->post('status')
        );

        $this->db->set($data);
        $this->db->where('id', $id);
        $this->db->update("jobapplications", $data);

        $notification = array(
            'message' => 'Job Application Deleted Successful',
            'alert-type' => 'success'
        );
        $this->session->set_flashdata($notification);
        redirect('applicants');
    }




    // JobTitle:JobTitle,CompanyName:CompanyName,JobType:JobType,JobCategory:JobCategory,ExpectedSalary:ExpectedSalary,
    //         JobRegion:JobRegion,Town:Town,ApplicationStartDate:ApplicationStartDate,ApplicationClosingDate:ApplicationClosingDate,
    // JobDescription:JobDescription,Benefits:Benefits,JobRequirement:JobRequirement

    //     // =================================================================================================




    public   function update_post()
    {
        $id = $this->input->post("myid");
        // $region = $this->input->post("JobRegion");
        // $categoryname = $this->input->post("JobCategory");

        // $query1 = $this->db->query("select id from joblocation  where locationname= '$region' ");
        // $joblocation = $query1->result_array();

        // $query2 = $this->db->query("select id from jobcategory  where categoryname= '$categoryname' ");
        // $jobcategory = $query2->result_array();



        $data = array(
            'JobCategory' => $this->input->post("JobCategory"),
            'jobtitle' => $this->input->post("JobTitle"),
            'companyname' => $this->input->post("CompanyName"),
            'jobtype' => $this->input->post("JobType"),
            'joblocation' => $this->input->post("JobRegion"),
            'town' => $this->input->post("Town"),
            'applicationstartsdate' => $this->input->post("ApplicationStartDate"),
            'applicationclosingdate' => $this->input->post("ApplicationClosingDate"),
            'description' => $this->input->post("JobDescription"),
            'benefits' => $this->input->post("Benefits"),
            'jobrequirements' => $this->input->post("JobRequirement"),
            'expectedsalary' => $this->input->post("ExpectedSalary"),

        );
        // var_dump($id); die;
        $this->db->set($data);
        $this->db->where('id', $id);
        $this->db->update("jobdetial", $data);
        echo "Job Post Update Successful";
        

    }

    public   function disable_post()
    {
        $id = $this->input->post("jobid");
        $systemUser = $this->input->post('systemUser');

        $data = array(
            'status' => 1,
            'updatedby' => $systemUser // $this->input->post('status') updatedby
        );
        // var_dump($id); die;
        $this->db->set($data);
        $this->db->where('id', $id);
        $output = $this->db->update("jobdetial", $data);

        echo json_encode($output);
        // $this->session->set_flashdata($notification);
        ///redirect('positions');
    }

    public   function activate_post()
    {
        $id = $this->input->post("jobid");
        $systemUser = $this->input->post('systemUser');
        $data = array(
            'status' => 0,
            'updatedby' => $systemUser // $this->input->post('status')
        );
        // var_dump($id); die;
        $this->db->set($data);
        $this->db->where('id', $id);
        $output = $this->db->update("jobdetial", $data);

        echo json_encode($output);
    }

    public   function delete_post()
    {

        $id = $this->input->post("jobid");
        $systemUser = $this->input->post('systemUser');
        $data = array(
            'status' => 2,
            'updatedby' => $systemUser
        );

        $this->db->set($data);
        $this->db->where('id', trim($id));
        $output = $this->db->update("jobdetial", $data);

        echo json_encode($output);
    }

    public   function jobdetails_requirement()
    {
        $id = $this->input->post("jobid");
        $query = $this->db->query("
        select description,benefits,jobrequirements from jobdetial where id='$id' ");

        $result = $query->result();
        echo json_encode($result);
    }

    public function save_A_Job()
    {
        //  INSERT INTO `savedJobs`(`id`, `job_Id`, `job_Seeker_Id`, `SavedDate`, `UpdatedDate`, `status`) VALUES ([value-1],[value-2],[value-3],[value-4],[value-5],[value-6])



        if ($this->session->userdata('logged_in')) {

            // var_dump($jobdetails); die;

            $session_data = $this->session->userdata('logged_in');
            $jobdetails['id'] = $session_data['id'];
            $jobdetails['email'] = $session_data['email'];
            $jobdetails['role'] = $session_data['role'];
            $seekerId = $session_data['id'];
            $job_id = trim($this->input->post('job_id'));


            $query1 = $this->db->query("select * from savedJobs where job_id='$job_id' and job_Seeker_Id='$seekerId'   ");
            $result = $query1->num_rows();
            if ($result > 0) {
                echo json_encode(0);
            } else {
                $data = array(
                    'job_id' => $job_id,
                    'job_Seeker_Id' => trim($seekerId)
                );
                echo json_encode($this->db->insert('savedJobs', $data));
            }
        } else {
            echo json_encode(0);
        }
    }
}
