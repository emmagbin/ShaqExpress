
<?php
defined('BASEPATH') or exit('No direct script access allowed');
class JobIndustryController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('user', '', TRUE);
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

            $page['page'] = 'industry';
            $page['pagetitle'] = 'industry Area';
            $page['pageUrl'] = 'Jobs Management / Job industry';







            $page['jobIndustries'] = $this->all_jobareas();
            // var_dump($joblocations['id']); die;
            $page['page'] = 'industry';
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

    public function all_jobareas()
    {
        $query = $this->db->query("select jobcategory.*, staff.lastname,staff.firstname,staff.othername from jobcategory inner join staff on jobcategory.createby=staff.login_id where jobcategory.status!=2 ");

        $joblocations = $query->result();
        return $joblocations;
    }

    public function industryadd()
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

            $page['newCategory'] = trim($this->input->post('categoryname'));
            $page['categoryid'] = $this->input->post('categoryid');

            if ($this->input->post('categoryid') == "") {
                $page['pagetitle'] = 'industry create';
            } else {
                $page['pagetitle'] = 'industry Edit';
            }

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





            $page['page'] = 'industryadd';

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

    public function addindustry()
    {
        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            // $page['id'] = $session_data['id'];
            $newCategory = trim($this->input->post('Category'));

            if ($this->input->post('function') == 1) {
                $query = $this->db->query("select * from jobcategory where categoryname='$newCategory' ");
                $result = $query->num_rows();
                if ($result >= 1) {
                    $notification = array(
                        'message' => 'Job Category Already Exist In the System',
                        'alert-type' => 'error'
                    );
                } else {

                    $data = array(
                        'categoryname' => $newCategory,
                        'createby' => $session_data['id']
                    );
                    $this->db->insert('jobcategory', $data);
                    $notification = array(
                        'message' => 'New Job Industry Add Successful',
                        'alert-type' => 'success'
                    );
                }

                $this->session->set_flashdata($notification);
                redirect('industryadd');
            } else {

                $categoryid = $this->input->post('categoryid');
                $data = array(
                    'categoryname' => $this->input->post("Category"),
                    'updatedby' => $session_data['id']
                );
                $this->db->set($data);
                $this->db->where('id', $categoryid);
                $this->db->update("jobcategory", $data);
                $notification = array(
                    'message' => 'Job Industry Name Update Successful',
                    'alert-type' => 'success'
                );
                $this->session->set_flashdata($notification);
                redirect('industry');
            }
        }
    }

    //  id: id,
    // systemUser: systemUser

    // ------------------------------------------------------------------------------------------------


    public   function update_jobcategory()
    {
        $id = $this->input->post("txtid");
        $Location = $this->input->post("categoryname");
        $data = array(
            'categoryname' => $this->input->post("categoryname")
        );
        //  var_dump($data); die;
        $this->db->set($data);
        $this->db->where('id', $id);
        $this->db->update("jobcategory", $data);
        $notification = array(
            'message' => 'Category Name Update Successful',
            'alert-type' => 'success'
        );
        $this->session->set_flashdata($notification);
        redirect('jobIndustries');
    }

    public   function disable_jobcategory()
    {
        $id = $this->input->post('id');
        $systemUser = $this->input->post('systemUser');
        $data = array(
            'status' => 1,
            'updatedby' => $systemUser
        );

        $this->db->set($data);
        $this->db->where('id', $id);
        $output = $this->db->update("jobcategory", $data);
        echo json_encode($output);
    }

    public   function activate_jobcategory()
    {
        $id = $this->input->post('id');
        $systemUser = $this->input->post('systemUser');
        $data = array(
            'status' => 0,
            'updatedby' => $systemUser
        );

        $this->db->set($data);
        $this->db->where('id', $id);
        $output = $this->db->update("jobcategory", $data);
        echo json_encode($output);
    }

    public   function delete_jobcategory()
    {

        $id = $this->input->post('id');
        $systemUser = $this->input->post('systemUser');
        $data = array(
            'status' => 2,
            'updatedby' => $systemUser
        );

        $this->db->set($data);
        $this->db->where('id', $id);
        $output = $this->db->update("jobcategory", $data);

        // $this->db->set($data);
        // $this->db->where('id', $id);
        // $this->db->update("login", $data);


        echo json_encode($output);
    }
}
