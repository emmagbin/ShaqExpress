
<?php
defined('BASEPATH') or exit('No direct script access allowed');

//This is the Controller for codeigniter crud using ajax application.
class Dashboard_controller extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('User', '', TRUE);
        // $this->load->model('User');
    }
    public function index()
    {

        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $page['login_id'] = $session_data['login_id'];
            $page['username'] = $session_data['username'];

            $page['role'] = $session_data['role'];


            $page['logincount'] = $this->User->checklogincount($session_data['login_id']);
            




            $page['page']  = 'defaultpage';
            $page['pageUrl']  = 'login';
            $page['pagetitle'] = 'Dashboard';
            $page['folder'] = 'dashboard';
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

    public function index2()
    {
        $page['page']  = 'defaultpage';
        $page['pageUrl']  = 'login';
        $page['pagetitle'] = 'Dashboard';

        $page['folder'] = 'dashboard';
        $page['contentt'] = 'bodyUser';


        $this->load->view('admin/views/' . $page['page'], $page);
    }




    public function dashboard()
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
                $userid = $session_data['id'];
                $query = $this->db->query(" select
(SELECT   count(*) FROM jobapplications WHERE jobseeker_id='$userid') as totalJobsappliedfor ");
                $results = $query->row();
                $page['totalJobsappliedfor'] = $results->totalJobsappliedfor;
            } else {
                $page['Systemuser'] = 'System Administrator';
                $user['Systemuserphoto'] = $session_data['Systemuserphoto'];
                $myphoto = $user['Systemuserphoto'];
                $page['Systemuserphoto'] = $myphoto;
            }

            $page['admindashboard'] = $this->dashboard_data();
            $page['positions'] = $this->all_jobs();

            //var_dump($page['admindashboard']); die;

            $privileges = $this->user->userPrivileges($session_data['role']);

            if (count($privileges) > 0 || $page['role'] === 'jobseeker' || $page['role'] === 'Admin' || $page['role'] === 'Developer') {
                $page['privileges'] = $privileges;
            } else {
                $notification = array(
                    'message' => 'System User Has No Role To Play In The System',
                    'alert-type' => 'error'
                );
                $this->session->set_flashdata($notification);
                redirect('login');
            }




            $page['page'] = 'dashboard';
            $this->load->view('admin/views/' . $page['page'], $page);
        }
    }


    public function all_jobs()
    {
        $query = $this->db->query("select jobdetial.*, staff.lastname,staff.firstname,staff.othername,
    joblocation.locationname,jobcategory.categoryname from jobdetial inner join staff on 
    jobdetial.createby=staff.login_id inner join joblocation on joblocation.id=jobdetial.joblocation 
    inner join jobcategory on jobcategory.id=jobdetial.JobCategory where jobdetial.status!=2
        ORDER BY jobdetial.id DESC  LIMIT 5 ");

        $joblocations = $query->result();
        return $joblocations;
    }


    function dashboard_data()
    {

        $query = $this->db->query(" select
(SELECT   count(*) FROM jobseeker ) as jobseeker,
 (SELECT   count(*) FROM jobdetial ) as jobdetial,
 (SELECT   count(*) FROM jobapplications ) as jobapplications,
 (SELECT   count(*) FROM jobseeker WHERE gender='Male' ) as males,
  (SELECT   count(*) FROM jobseeker WHERE gender='Female' ) as Female,

 (SELECT IFNULL(sum(totalviewed), 0) FROM jobdetial WHERE YEAR(`created_at`) =YEAR(CURDATE()) AND MONTH(`created_at`) = '1') as jantotalviewed,
 ( SELECT IFNULL(sum(totalviewed), 0) FROM jobdetial WHERE YEAR(`created_at`) =YEAR(CURDATE()) AND MONTH(`created_at`) = '2') as febtotalviewed,
 ( SELECT IFNULL(sum(totalviewed), 0) FROM jobdetial WHERE YEAR(`created_at`) =YEAR(CURDATE()) AND MONTH(`created_at`) = '3') as martotalviewed,
 ( SELECT IFNULL(sum(totalviewed), 0) FROM jobdetial WHERE YEAR(`created_at`) =YEAR(CURDATE()) AND MONTH(`created_at`) = '4') as aprtotalviewed,
 ( SELECT IFNULL(sum(totalviewed), 0) FROM jobdetial WHERE YEAR(`created_at`) =YEAR(CURDATE()) AND MONTH(`created_at`) = '5') as maytotalviewed,
 ( SELECT IFNULL(sum(totalviewed), 0) FROM jobdetial WHERE YEAR(`created_at`) =YEAR(CURDATE()) AND MONTH(`created_at`) = '6') as juntotalviewed,
 ( SELECT IFNULL(sum(totalviewed), 0) FROM jobdetial WHERE YEAR(`created_at`) =YEAR(CURDATE()) AND MONTH(`created_at`) = '7') as jlytotalviewed,
 ( SELECT IFNULL(sum(totalviewed), 0) FROM jobdetial WHERE YEAR(`created_at`) =YEAR(CURDATE()) AND MONTH(`created_at`) = '8') as augtotalviewed,
 ( SELECT IFNULL(sum(totalviewed), 0) FROM jobdetial WHERE YEAR(`created_at`) =YEAR(CURDATE()) AND MONTH(`created_at`) = '9') as septotalviewed,
 ( SELECT IFNULL(sum(totalviewed), 0) FROM jobdetial WHERE YEAR(`created_at`) =YEAR(CURDATE()) AND MONTH(`created_at`) = '10') as octtotalviewed,
 ( SELECT IFNULL(sum(totalviewed), 0) FROM jobdetial WHERE YEAR(`created_at`) =YEAR(CURDATE()) AND MONTH(`created_at`) = '11') as novtotalviewed,
 ( SELECT IFNULL(sum(totalviewed), 0) FROM jobdetial WHERE YEAR(`created_at`) =YEAR(CURDATE()) AND MONTH(`created_at`) = '12') as decctotalviewed,

(SELECT count(*) FROM jobapplications WHERE YEAR(`created_at`) =YEAR(CURDATE()) AND MONTH(`created_at`) = '1') as jan,
 ( SELECT count(*) FROM jobapplications WHERE YEAR(`created_at`) =YEAR(CURDATE()) AND MONTH(`created_at`) = '2') as feb,
 ( SELECT count(*) FROM jobapplications WHERE YEAR(`created_at`) =YEAR(CURDATE()) AND MONTH(`created_at`) = '3') as mar,
 ( SELECT count(*) FROM jobapplications WHERE YEAR(`created_at`) =YEAR(CURDATE()) AND MONTH(`created_at`) = '4') as apr,
 ( SELECT count(*) FROM jobapplications WHERE YEAR(`created_at`) =YEAR(CURDATE()) AND MONTH(`created_at`) = '5') as may,
 ( SELECT count(*) FROM jobapplications WHERE YEAR(`created_at`) =YEAR(CURDATE()) AND MONTH(`created_at`) = '6') as jun,
 ( SELECT count(*) FROM jobapplications WHERE YEAR(`created_at`) =YEAR(CURDATE()) AND MONTH(`created_at`) = '7') as jly,
 ( SELECT count(*) FROM jobapplications WHERE YEAR(`created_at`) =YEAR(CURDATE()) AND MONTH(`created_at`) = '8') as aug,
 ( SELECT count(*) FROM jobapplications WHERE YEAR(`created_at`) =YEAR(CURDATE()) AND MONTH(`created_at`) = '9') as sep,
 ( SELECT count(*) FROM jobapplications WHERE YEAR(`created_at`) =YEAR(CURDATE()) AND MONTH(`created_at`) = '10') as oct,
 ( SELECT count(*) FROM jobapplications WHERE YEAR(`created_at`) =YEAR(CURDATE()) AND MONTH(`created_at`) = '11') as nov,
 ( SELECT count(*) FROM jobapplications WHERE YEAR(`created_at`) =YEAR(CURDATE()) AND MONTH(`created_at`) = '12') as decc,


(SELECT count(*) FROM jobseeker WHERE YEAR(`created_at`) =YEAR(CURDATE()) AND MONTH(`created_at`) = '1') as janjobseeker,
 ( SELECT count(*) FROM jobseeker WHERE YEAR(`created_at`) =YEAR(CURDATE()) AND MONTH(`created_at`) = '2') as febjobseeker,
 ( SELECT count(*) FROM jobseeker WHERE YEAR(`created_at`) =YEAR(CURDATE()) AND MONTH(`created_at`) = '3') as marjobseeker,
 ( SELECT count(*) FROM jobseeker WHERE YEAR(`created_at`) =YEAR(CURDATE()) AND MONTH(`created_at`) = '4') as aprjobseeker,
 ( SELECT count(*) FROM jobseeker WHERE YEAR(`created_at`) =YEAR(CURDATE()) AND MONTH(`created_at`) = '5') as mayjobseeker,
 ( SELECT count(*) FROM jobseeker WHERE YEAR(`created_at`) =YEAR(CURDATE()) AND MONTH(`created_at`) = '6') as junjobseeker,
 ( SELECT count(*) FROM jobseeker WHERE YEAR(`created_at`) =YEAR(CURDATE()) AND MONTH(`created_at`) = '7') as jlyjobseeker,
 ( SELECT count(*) FROM jobseeker WHERE YEAR(`created_at`) =YEAR(CURDATE()) AND MONTH(`created_at`) = '8') as augjobseeker,
 ( SELECT count(*) FROM jobseeker WHERE YEAR(`created_at`) =YEAR(CURDATE()) AND MONTH(`created_at`) = '9') as sepjobseeker,
 ( SELECT count(*) FROM jobseeker WHERE YEAR(`created_at`) =YEAR(CURDATE()) AND MONTH(`created_at`) = '10') as octjobseeker,
 ( SELECT count(*) FROM jobseeker WHERE YEAR(`created_at`) =YEAR(CURDATE()) AND MONTH(`created_at`) = '11') as novjobseeker,
 ( SELECT count(*) FROM jobseeker WHERE YEAR(`created_at`) =YEAR(CURDATE()) AND MONTH(`created_at`) = '12') as deccjobseeker,

 (SELECT count(*) FROM jobdetial WHERE YEAR(`created_at`) =YEAR(CURDATE()) AND MONTH(`created_at`) = '1') as janjobdetial,
 ( SELECT count(*) FROM jobdetial WHERE YEAR(`created_at`) =YEAR(CURDATE()) AND MONTH(`created_at`) = '2') as febjobdetial,
 ( SELECT count(*) FROM jobdetial WHERE YEAR(`created_at`) =YEAR(CURDATE()) AND MONTH(`created_at`) = '3') as marjobdetial,
 ( SELECT count(*) FROM jobdetial WHERE YEAR(`created_at`) =YEAR(CURDATE()) AND MONTH(`created_at`) = '4') as aprjobdetial,
 ( SELECT count(*) FROM jobdetial WHERE YEAR(`created_at`) =YEAR(CURDATE()) AND MONTH(`created_at`) = '5') as mayjobdetial,
 ( SELECT count(*) FROM jobdetial WHERE YEAR(`created_at`) =YEAR(CURDATE()) AND MONTH(`created_at`) = '6') as junjobdetial,
 ( SELECT count(*) FROM jobdetial WHERE YEAR(`created_at`) =YEAR(CURDATE()) AND MONTH(`created_at`) = '7') as jlyjobdetial,
 ( SELECT count(*) FROM jobdetial WHERE YEAR(`created_at`) =YEAR(CURDATE()) AND MONTH(`created_at`) = '8') as augjobdetial,
 ( SELECT count(*) FROM jobdetial WHERE YEAR(`created_at`) =YEAR(CURDATE()) AND MONTH(`created_at`) = '9') as sepjobdetial,
 ( SELECT count(*) FROM jobdetial WHERE YEAR(`created_at`) =YEAR(CURDATE()) AND MONTH(`created_at`) = '10') as octjobdetial,
 ( SELECT count(*) FROM jobdetial WHERE YEAR(`created_at`) =YEAR(CURDATE()) AND MONTH(`created_at`) = '11') as novjobdetial,
 ( SELECT count(*) FROM jobdetial WHERE YEAR(`created_at`) =YEAR(CURDATE()) AND MONTH(`created_at`) = '12') as deccjobdetial,



 (SELECT   sum(totalviewed) FROM jobdetial ) as totalviewed ");
        return $query->result();
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

            $page['admindashboard'] = $this->dashboard_data();

            $privileges = $this->user->userPrivileges($session_data['role']);

            if (count($privileges) > 0 || $page['role'] === 'jobseeker' || $page['role'] === 'Admin' || $page['role'] === 'Developer') {
                $page['privileges'] = $privileges;
            } else {
                $notification = array(
                    'message' => 'System User Has No Role To Play In The System',
                    'alert-type' => 'error'
                );
                $this->session->set_flashdata($notification);
                redirect('login');
            }



            $page['page'] = 'jobadd';
            $page['pagetitle'] = 'Job create';
            $page['pageUrl'] = 'Jobs Management /' . $page['pagetitle'];
            $this->load->view('admin/views/' . $page['page'], $page);
        }
    }


















    public function profile()
    {
        $page['page'] = 'profile';
        $page['pagetitle'] = 'My Profile';
        $page['pageUrl'] = 'Sign Up Management /' . $page['pagetitle'];
        $this->load->view('admin/views/' . $page['page'], $page);
    }







    public function users()
    {
        $this->load->view('users');
    }

    public function newUser()
    {
        $this->load->view('newUser');
    }

    public function transfer()
    {
        $this->load->view('transfer');
    }

    public function clientAccount()
    {
        $this->load->view('clientAccount');
    }

    public function EditClientInfo()
    {
        $this->load->view('clientInformationEdit');
    }





    public function all_roles()
    {
        $query = $this->db->query("select rolename from roles ");
        $users = $query->result();
        return $users;
    }
}
