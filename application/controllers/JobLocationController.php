
<?php
defined('BASEPATH') or exit('No direct script access allowed');

//This is the Controller for codeigniter crud using ajax application. JobsPortal_Controller.php
class JobLocationController extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('user', '', TRUE);
        $this->load->model('JobLocationModel', '', TRUE);
    }

    public function all_joblocations()
    {
        $query = $this->db->query("select joblocation.*, staff.lastname,staff.firstname,staff.othername from joblocation inner join staff on joblocation.createby=staff.login_id where joblocation.status!=2 ");

        $joblocations = $query->result();
        return $joblocations;
    }



    public function index()
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




            $page['locations'] = $this->all_joblocations();


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


            $page['page'] = 'location';
            $page['pagetitle'] = 'location';
            $page['pageUrl'] = 'Jobs Management /' . $page['pagetitle'];
            $this->load->view('admin/views/' . $page['page'], $page);
        } else {
            $notification = array(
                'message' => 'Same Account Have Been Used In Login Into the System On another device. <br> Login Again and change Your login credentials',
                'alert-type' => 'error'
            );
            $this->session->set_flashdata($notification);
            redirect('login');
        }
    }




    public function locationadd()
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





            $page['locations'] = $this->all_joblocations();

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


            $page['page'] = 'locationadd';
            $page['pagetitle'] = 'location create';
            $page['pageUrl'] = 'Jobs Management /' . $page['pagetitle'];
            $this->load->view('admin/views/' . $page['page'], $page);
        } else {
            $notification = array(
                'message' => 'Same Account Have Been Used In Login Into the System On another device. <br> Login Again and change Your login credentials',
                'alert-type' => 'error'
            );
            $this->session->set_flashdata($notification);
            redirect('login');
        }
    }

    public function locationedit()
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
            $page['locationid'] = $this->input->post('locationid');

            $page['locationname'] = $this->input->post('locationname');


            $page['locations'] = $this->all_joblocations();


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





            $page['locations'] = $this->all_joblocations();


            $page['page'] = 'locationedit';
            $page['pagetitle'] = 'location Edit';
            $page['pageUrl'] = 'Jobs Management /' . $page['pagetitle'];
            $this->load->view('admin/views/' . $page['page'], $page);
        } else {
            $notification = array(
                'message' => 'Same Account Have Been Used In Login Into the System On another device. <br> Login Again and change Your login credentials',
                'alert-type' => 'error'
            );
            $this->session->set_flashdata($notification);
            redirect('login');
        }
    }

    // =======================================================================================================


    public   function update_jobLocation()
    {


        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');

            $data = array(
                'locationname' => $this->input->post("Location"),
                'updatedby' => $session_data['id']
            );

            $newlocation = trim($this->input->post('Location'));
            $query = $this->db->query("select * from joblocation where locationname='$newlocation' ");
            $result = $query->num_rows();
            if ($result >= 1) {

                $notification = array(
                    'message' => 'Job Location Already Exist In the System',
                    'alert-type' => 'error'
                );
                $this->session->set_flashdata($notification);
                redirect('location');
            } else {

                $this->db->set($data);
                $this->db->where('id', $this->input->post("locationid"));
                $this->db->update("joblocation", $data);
                $notification = array(
                    'message' => 'Job Location Update Successful',
                    'alert-type' => 'success'
                );
                $this->session->set_flashdata($notification);
                redirect('location');
            }
        }
    }

    public   function disable_jobLocation()
    {

        $id = $this->input->post('id');
        $systemUser = $this->input->post('systemUser');
        $data = array(
            'status' => 1,
            'updatedby' => $systemUser
            // $this->input->post('status')
        );
        // var_dump($id); die;
        $this->db->set($data);
        $this->db->where('id', $id);
        $output = $this->db->update("joblocation", $data);
        echo json_encode($output);
    }

    public   function activate_jobLocation()
    {

        $id = $this->input->post('id');
        $systemUser = $this->input->post('systemUser');
        $data = array(
            'status' => 0,
            'updatedby' => $systemUser
        );
        $this->db->set($data);
        $this->db->where('id', $id);
        $output = $this->db->update("joblocation", $data);
        echo json_encode($output);
    }

    public   function delete_jobLocation()
    {

        $id = $this->input->post('id');
        $systemUser = $this->input->post('systemUser');
        $data = array(
            'status' => 2,
            'updatedby' => $systemUser
        );
        $this->db->set($data);
        $this->db->where('id', $id);
        $output = $this->db->update("joblocation", $data);
        echo json_encode($output);
    }
}
?>