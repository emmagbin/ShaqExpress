<?php
defined('BASEPATH') or exit('No direct script access allowed');

//This is the Controller for codeigniter crud using ajax application.
class settingsController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('email');
        $this->load->library('session');
        $this->load->model('User', '', TRUE);
    }


    public function index()
    {
        $page['page']  = 'defaultpage';
        $page['pageUrl']  = 'login';
        $page['pagetitle'] = 'Company Details';

        $page['folder'] = 'settings';
        $page['contentt'] = 'body';
        $this->load->view('admin/views/' . $page['page'], $page);
    }


    public function profile()
    {

        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $page['login_id'] = $session_data['login_id'];
            $page['username'] = $session_data['username'];

            $page['role'] = $session_data['role'];

            $page['password'] = $session_data['password'];
            $login_id = $session_data['login_id'];

            $logincount =  $this->User->checklogincount($login_id);

            if ($logincount < 1) {
                $page['logincount'] = $logincount;
                $page['message'] = "CHANGE THE DEFAULT PASSWORS GIVEN TO YOU BY ADMIN";
            } else {
                $page['logincount'] = $logincount;
                $page['message'] = "FOR THE SAFETY OF YOUR SYSTEM ACCOUNT IT ADVISABLE TO REGULARLY CHANGE YOUR PASSWORD";
            }



            $page['page']  = 'defaultpage';
            $page['pageUrl']  = 'login';
            $page['pagetitle'] = 'My Profile';

            $page['folder'] = 'settings';
            $page['contentt'] = 'profile';
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

    public function companyInfo()
    {

        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $page['id'] = $session_data['id'];
            $page['email'] = $session_data['email'];

            $page['role'] = $session_data['role'];

            $page['isLogin'] = $session_data['isLogin'];

            // var_dump($users['isLogin']);
            // die;

            $query = $this->db->query("select companyinfo.*,companyinfo.id'mycompanyid', staff.*, login.email'repemail', login.role from companyinfo inner join staff on companyinfo.rep_login_id=staff.login_id inner join login on login.id=staff.login_id limit 1");
            $page['companyinfo'] = $query->result();

            // var_dump($pag['companyinfo']);
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



            //var_dump($page['admindashboard']); die;



            $page['page'] = 'CompanyInfo';
            $page['pagetitle'] = 'Company Information';
            $page['pageUrl'] = 'System Settings /' . $page['pagetitle'];
        }
        $this->load->view('admin/views/' . $page['page'], $page);
        // var_dump('companyInfo');
        // die;
    }
    public function roles()
    {

        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $page['id'] = $session_data['id'];
            $page['email'] = $session_data['email'];

            $page['role'] = $session_data['role'];

            $page['isLogin'] = $session_data['isLogin'];

            // var_dump($users['isLogin']);
            // die;

            $page['roles'] = $this->all_roles();



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




            $page['page'] = 'roles';
            $page['pagetitle'] = 'System Roles';
            $page['pageUrl'] = 'System Settings /' . $page['pagetitle'];
            $this->load->view('admin/views/' . $page['page'], $page);
        } else {
            $notification = array(
                'message' => 'Session Lost Login Again ',
                'alert-type' => 'error'
            );
            $this->session->set_flashdata($notification);
            redirect('login');
        }

        // var_dump('companyInfo');
        // die;
    }


    //SELECTING ROLE ID FROM LOGIN TABLE TO UPDATE STAFF TABLE
    public function role_id_from_loginTable($id)
    {
        $no_of_staff_to_update = $this->db->query("select id 'no' from login where role='$id'");
        $output = $no_of_staff_to_update->result_array();
        return $output;
    }
    public   function disable_role()
    {
        $id = $this->input->post("id");
        $systemUser = $this->input->post('systemUser');

        $data = array(
            'status' => 1,
            'updatedby' => $systemUser
        );

        $this->db->set($data);
        $this->db->where('roleName', trim($id));
        $output = $this->db->update("roles", $data);


        $this->db->set($data);
        $this->db->where('role', $id);
        $output = $this->db->update("login", $data);

        $role_id = $this->role_id_from_loginTable($id);
        for ($i = 0; $i < count($role_id); $i++) {
            $this->db->set($data);
            $this->db->where('login_id', $role_id[$i]['no']);
            $this->db->update("staff", $data);
        }



        echo json_encode($output);
    }

    public   function activate_role()
    {

        $id = $this->input->post("id");
        $systemUser = $this->input->post('systemUser');

        $data = array(
            'status' => 0,
            'updatedby' => $systemUser
        );

        $this->db->set($data);
        $this->db->where('roleName', trim($id));
        $output = $this->db->update("roles", $data);


        $this->db->set($data);
        $this->db->where('role', $id);
        $output = $this->db->update("login", $data);

        $role_id = $this->role_id_from_loginTable($id);
        for ($i = 0; $i < count($role_id); $i++) {
            $this->db->set($data);
            $this->db->where('login_id', $role_id[$i]['no']);
            $this->db->update("staff", $data);
        }


        echo json_encode($output);
    }

    public   function delete_role()
    {

        $id = $this->input->post("id");
        $systemUser = $this->input->post('systemUser');

        $data = array(
            'status' => 2,
            'updatedby' => $systemUser
        );

        $checking_role_users = $this->db->query("select count(*) from login where role='$id' ");
        $check_output = $checking_role_users->result();


        if ($check_output < 1) {
            $this->db->set($data);
            $this->db->where('roleName', trim($id));
            $output = $this->db->update("roles", $data);


            $this->db->set($data);
            $this->db->where('role', $id);
            $output = $this->db->update("login", $data);

            $role_id = $this->role_id_from_loginTable($id);
            for ($i = 0; $i < count($role_id); $i++) {
                $this->db->set($data);
                $this->db->where('login_id', $role_id[$i]['no']);
                $this->db->update("staff", $data);
            }
        } else {
            $output = false;
        }


        echo json_encode($output);
    }


    public function editrole()
    {


        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $id = $session_data['id'];


            $rolename = $this->input->post('rolename');


            $rolenameold = $this->input->post('rolenameold');



            $roleid = $this->input->post('myroleid');


            //checking for role existence
            $query = $this->db->query("select count(*) 'no' from roles where roleName='$rolename' ");
            $output = $query->result_array();


            if ($output['0']['no'] < 1) {
                $data = array(
                    'roleName' => $rolename,
                    'updatedby' => $id

                );

                $this->db->set($data);
                $this->db->where('id', $roleid);
                $output =  $this->db->update("roles", $data);


                // $output = $this->db->insert('roles', $data);

                if ($output == "1") {
                    //SELECT `id`, `rolename`, `module`, `read`, `write`, `update`, `disable`, `enable`, `reset`, `delete`, 
                    // `createdby`, `createddate`, `updatedby`, `updateddate` FROM `roleprivilege` WHERE 1
                    $dashboard = array(
                        'rolename' => $rolename,
                        'module' => $this->input->post('dashboard'),
                        'read' => $this->input->post('dread')
                    );

                    var_dump($this->input->post('ddid'));
                    die;
                    $this->db->set($dashboard);
                    $this->db->where('id', $this->input->post('ddid'));
                    $this->db->update("roleprivilege", $dashboard);

                    echo ($dashboard);
                    die;

                    // $this->db->insert('roleprivilege', $dashboard);

                    $vacancies = array(
                        'rolename' => $rolename,
                        'module' => $this->input->post('Vacancies'),
                        'read' => $this->input->post('vread'),
                        'write' => $this->input->post('vwrite'),
                        'update' => $this->input->post('vupdate'),
                        'disable' => $this->input->post('vdisable'),
                        'enable' => $this->input->post('venable'),
                        'delete' => $this->input->post('vdelete'),

                    );
                    $this->db->set($vacancies);
                    $this->db->where('id', $this->input->post('vid'));
                    $this->db->update("roleprivilege", $vacancies);


                    /// $this->db->insert('roleprivilege', $vacancies);

                    $Applicants = array(
                        'rolename' => $rolename,
                        'module' => $this->input->post('Applicants'),
                        'read' => $this->input->post('aread'),
                        'delete' => $this->input->post('adelete'),

                    );
                    $this->db->set($Applicants);
                    $this->db->where('id', $this->input->post('did'));
                    $this->db->update("roleprivilege", $Applicants);


                    $locations = array(
                        'rolename' => $rolename,
                        'module' => $this->input->post('locations'),
                        'read' => $this->input->post('lread'),
                        'write' => $this->input->post('lwrite'),
                        'update' => $this->input->post('lupdate'),
                        'disable' => $this->input->post('ldisable'),
                        'enable' => $this->input->post('lenable'),
                        'delete' => $this->input->post('ldelete'),

                    );

                    $this->db->set($locations);
                    $this->db->where('id', $this->input->post('lid'));
                    $this->db->update("roleprivilege", $locations);


                    //$this->db->insert('roleprivilege', $locations);


                    $Industry = array(
                        'rolename' => $rolename,
                        'module' => $this->input->post('Industry'),
                        'read' => $this->input->post('iread'),
                        'write' => $this->input->post('iwrite'),
                        'update' => $this->input->post('iupdate'),
                        'disable' => $this->input->post('idisable'),
                        'enable' => $this->input->post('ienable'),
                        'delete' => $this->input->post('idelete'),

                    );
                    $this->db->set($Industry);
                    $this->db->where('id', $this->input->post('iid'));
                    $this->db->update("roleprivilege", $Industry);

                    //$this->db->insert('roleprivilege', $Industry);

                    $signup = array(
                        'rolename' => $rolename,
                        'module' => $this->input->post('signup'),
                        'read' => $this->input->post('SSread'),
                        'write' => $this->input->post('SSwrite'),
                        'update' => $this->input->post('SSupdate'),
                        'disable' => $this->input->post('SSdisable'),
                        'enable' => $this->input->post('SSenable'),
                        'reset' => $this->input->post('SSreset'),
                        'delete' => $this->input->post('SSdelete'),

                    );
                    // $this->db->insert('roleprivilege', $signup);
                    $this->db->set($signup);
                    $this->db->where('id', $this->input->post('sid'));
                    $this->db->update("roleprivilege", $signup);


                    $companyinfo = array(
                        'rolename' => $rolename,
                        'module' => $this->input->post('companyinfo'),
                        'read' => $this->input->post('cread'),
                        'update' => $this->input->post('cupdate')
                    );

                    $this->db->set($companyinfo);
                    $this->db->where('id', $this->input->post('cid'));
                    $this->db->update("roleprivilege", $companyinfo);



                    // $this->db->insert('roleprivilege', $companyinfo);

                    $staff = array(
                        'rolename' => $rolename,
                        'module' => $this->input->post('staff'),
                        'read' => $this->input->post('sread'),
                        'write' => $this->input->post('swrite'),
                        'update' => $this->input->post('supdate'),
                        'disable' => $this->input->post('sdisable'),
                        'enable' => $this->input->post('senable'),
                        'reset' => $this->input->post('sreset'),
                        'delete' => $this->input->post('sdelete'),

                    );

                    $this->db->set($staff);
                    $this->db->where('id', $this->input->post('sid'));
                    $this->db->update("roleprivilege", $staff);
                    // $this->db->insert('roleprivilege', $staff);



                    $role = array(
                        'rolename' => $rolename,
                        'module' => $this->input->post('role'),
                        'read' => $this->input->post('rread'),
                        'write' => $this->input->post('rwrite'),
                        'update' => $this->input->post('rupdate'),
                        'disable' => $this->input->post('rdisable'),
                        'enable' => $this->input->post('renable'),
                        'delete' => $this->input->post('rdelete'),

                    );

                    // var_dump($role);
                    // die;
                    $this->db->set($role);
                    $this->db->where('id', $this->input->post('rid'));
                    $this->db->update("roleprivilege", $role);
                    //$this->db->insert('roleprivilege', $role);
                } else {
                    $notification = array(
                        'message' => 'User Role Updated failed',
                        'alert-type' => 'error'
                    );
                }

                $notification = array(
                    'message' => 'User Roles & Privileges Update Successful',
                    'alert-type' => 'success'
                );
            } else {

                // var_dump($this->input->post('did'));
                // die;
                $dashboard = array(
                    'rolename' => $rolename,
                    'module' => $this->input->post('dashboard'),
                    'read' => $this->input->post('dread')
                );
                $this->db->set($dashboard);
                $this->db->where('id', $this->input->post('ddid'));
                $this->db->update("roleprivilege", $dashboard);

                // $this->db->insert('roleprivilege', $dashboard);

                $vacancies = array(
                    'rolename' => $rolename,
                    'module' => $this->input->post('Vacancies'),
                    'read' => $this->input->post('vread'),
                    'write' => $this->input->post('vwrite'),
                    'update' => $this->input->post('vupdate'),
                    'disable' => $this->input->post('vdisable'),
                    'enable' => $this->input->post('venable'),
                    'delete' => $this->input->post('vdelete'),

                );
                $this->db->set($vacancies);
                $this->db->where('id', $this->input->post('vid'));
                $this->db->update("roleprivilege", $vacancies);


                /// $this->db->insert('roleprivilege', $vacancies);

                $Applicants = array(
                    'rolename' => $rolename,
                    'module' => $this->input->post('Applicants'),
                    'read' => $this->input->post('aread'),
                    'delete' => $this->input->post('adelete'),

                );
                $this->db->set($Applicants);
                $this->db->where('id', $this->input->post('aid'));
                $this->db->update("roleprivilege", $Applicants);


                $locations = array(
                    'rolename' => $rolename,
                    'module' => $this->input->post('locations'),
                    'read' => $this->input->post('lread'),
                    'write' => $this->input->post('lwrite'),
                    'update' => $this->input->post('lupdate'),
                    'disable' => $this->input->post('ldisable'),
                    'enable' => $this->input->post('lenable'),
                    'delete' => $this->input->post('ldelete'),

                );

                $this->db->set($locations);
                $this->db->where('id', $this->input->post('lid'));
                $this->db->update("roleprivilege", $locations);


                //$this->db->insert('roleprivilege', $locations);


                $Industry = array(
                    'rolename' => $rolename,
                    'module' => $this->input->post('Industry'),
                    'read' => $this->input->post('iread'),
                    'write' => $this->input->post('iwrite'),
                    'update' => $this->input->post('iupdate'),
                    'disable' => $this->input->post('idisable'),
                    'enable' => $this->input->post('ienable'),
                    'delete' => $this->input->post('idelete'),

                );
                $this->db->set($Industry);
                $this->db->where('id', $this->input->post('iid'));
                $this->db->update("roleprivilege", $Industry);

                //$this->db->insert('roleprivilege', $Industry);

                $signup = array(
                    'rolename' => $rolename,
                    'module' => $this->input->post('signup'),
                    'read' => $this->input->post('SSread'),
                    'write' => $this->input->post('SSwrite'),
                    'update' => $this->input->post('SSupdate'),
                    'disable' => $this->input->post('SSdisable'),
                    'enable' => $this->input->post('SSenable'),
                    'reset' => $this->input->post('SSreset'),
                    'delete' => $this->input->post('SSdelete'),

                );
                // $this->db->insert('roleprivilege', $signup);
                $this->db->set($signup);
                $this->db->where('id', $this->input->post('Sid'));
                $this->db->update("roleprivilege", $signup);


                $companyinfo = array(
                    'rolename' => $rolename,
                    'module' => $this->input->post('companyinfo'),
                    'read' => $this->input->post('cread'),
                    'update' => $this->input->post('cupdate')
                );

                $this->db->set($companyinfo);
                $this->db->where('id', $this->input->post('cid'));
                $this->db->update("roleprivilege", $companyinfo);



                // $this->db->insert('roleprivilege', $companyinfo);

                $staff = array(
                    'rolename' => $rolename,
                    'module' => $this->input->post('staff'),
                    'read' => $this->input->post('sread'),
                    'write' => $this->input->post('swrite'),
                    'update' => $this->input->post('supdate'),
                    'disable' => $this->input->post('sdisable'),
                    'enable' => $this->input->post('senable'),
                    'reset' => $this->input->post('sreset'),
                    'delete' => $this->input->post('sdelete'),

                );

                $this->db->set($staff);
                $this->db->where('id', $this->input->post('sid'));
                $this->db->update("roleprivilege", $staff);
                // $this->db->insert('roleprivilege', $staff);



                $role = array(
                    'rolename' => $rolename,
                    'module' => $this->input->post('role'),
                    'read' => $this->input->post('rread'),
                    'write' => $this->input->post('rwrite'),
                    'update' => $this->input->post('rupdate'),
                    'disable' => $this->input->post('rdisable'),
                    'enable' => $this->input->post('renable'),
                    'delete' => $this->input->post('rdelete'),

                );


                $this->db->set($role);
                $this->db->where('id', $this->input->post('rid'));
                $this->db->update("roleprivilege", $role);
                $notification = array(
                    'message' => 'Privilege Updated Succesful',
                    'alert-type' => 'success'
                );
            }

            $this->session->set_flashdata($notification);
            redirect('roles');
        } else {
            $notification = array(
                'message' => 'login Again Session Expired',
                'alert-type' => 'error'
            );
            $this->session->set_flashdata($notification);
            redirect('login');
        }
    }

    public function newrole()
    {
        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $id = $session_data['id'];


            $rolename = $this->input->post('rolename');
            //checking for role existence
            $query = $this->db->query("select count(*) 'no' from roles where roleName='$rolename' ");
            $output = $query->result_array();

            if ($rolename === 'Admin'  || $rolename === 'Developer' || $rolename === 'jobseeker') {

                $notification = array(
                    'message' => 'Role names exist already',
                    'alert-type' => 'error'
                );
                $this->session->set_flashdata($notification);
                redirect('roleadd');
            } else {
                if ($output['0']['no'] < 1) {
                    $data = array(
                        'roleName' => $rolename,
                        'createdBy' => $id

                    );


                    $output = $this->db->insert('roles', $data);

                    if ($output == "1") {
                        //SELECT `id`, `rolename`, `module`, `read`, `write`, `update`, `disable`, `enable`, `reset`, `delete`, 
                        // `createdby`, `createddate`, `updatedby`, `updateddate` FROM `roleprivilege` WHERE 1
                        $dashboard = array(
                            'rolename' => $rolename,
                            'module' => $this->input->post('dashboard'),
                            'read' => $this->input->post('dread')
                        );
                        $this->db->insert('roleprivilege', $dashboard);

                        $vacancies = array(
                            'rolename' => $rolename,
                            'module' => $this->input->post('Vacancies'),
                            'read' => $this->input->post('vread'),
                            'write' => $this->input->post('vwrite'),
                            'update' => $this->input->post('vupdate'),
                            'disable' => $this->input->post('vdisable'),
                            'enable' => $this->input->post('venable'),
                            'delete' => $this->input->post('vdelete'),

                        );


                        $this->db->insert('roleprivilege', $vacancies);

                        $Applicants = array(
                            'rolename' => $rolename,
                            'module' => $this->input->post('Applicants'),
                            'read' => $this->input->post('aread'),
                            'delete' => $this->input->post('adelete'),

                        );
                        $this->db->insert('roleprivilege', $Applicants);

                        $locations = array(
                            'rolename' => $rolename,
                            'module' => $this->input->post('locations'),
                            'read' => $this->input->post('lread'),
                            'write' => $this->input->post('lwrite'),
                            'update' => $this->input->post('lupdate'),
                            'disable' => $this->input->post('ldisable'),
                            'enable' => $this->input->post('lenable'),
                            'delete' => $this->input->post('ldelete'),

                        );
                        $this->db->insert('roleprivilege', $locations);


                        $Industry = array(
                            'rolename' => $rolename,
                            'module' => $this->input->post('Industry'),
                            'read' => $this->input->post('iread'),
                            'write' => $this->input->post('iwrite'),
                            'update' => $this->input->post('iupdate'),
                            'disable' => $this->input->post('idisable'),
                            'enable' => $this->input->post('ienable'),
                            'delete' => $this->input->post('idelete'),

                        );
                        $this->db->insert('roleprivilege', $Industry);

                        $signup = array(
                            'rolename' => $rolename,
                            'module' => $this->input->post('signup'),
                            'read' => $this->input->post('Sread'),
                            'write' => $this->input->post('Swrite'),
                            'update' => $this->input->post('Supdate'),
                            'disable' => $this->input->post('Sdisable'),
                            'enable' => $this->input->post('Senable'),
                            'reset' => $this->input->post('Sreset'),
                            'delete' => $this->input->post('Sdelete'),

                        );
                        $this->db->insert('roleprivilege', $signup);

                        $companyinfo = array(
                            'rolename' => $rolename,
                            'module' => $this->input->post('companyinfo'),
                            'read' => $this->input->post('cread'),
                            'update' => $this->input->post('cupdate')
                        );
                        $this->db->insert('roleprivilege', $companyinfo);

                        $staff = array(
                            'rolename' => $rolename,
                            'module' => $this->input->post('staff'),
                            'read' => $this->input->post('sread'),
                            'write' => $this->input->post('swrite'),
                            'update' => $this->input->post('supdate'),
                            'disable' => $this->input->post('sdisable'),
                            'enable' => $this->input->post('senable'),
                            'reset' => $this->input->post('sreset'),
                            'delete' => $this->input->post('sdelete'),

                        );
                        $this->db->insert('roleprivilege', $staff);



                        $role = array(
                            'rolename' => $rolename,
                            'module' => $this->input->post('role'),
                            'read' => $this->input->post('rread'),
                            'write' => $this->input->post('rwrite'),
                            'update' => $this->input->post('rupdate'),
                            'disable' => $this->input->post('rdisable'),
                            'enable' => $this->input->post('renable'),
                            'delete' => $this->input->post('rdelete'),

                        );
                        $this->db->insert('roleprivilege', $role);
                    } else {
                    }

                    $notification = array(
                        'message' => 'User Roles Created Successful',
                        'alert-type' => 'success'
                    );
                } else {
                    $notification = array(
                        'message' => 'User Role Name exist',
                        'alert-type' => 'error'
                    );
                }
            }


            $this->session->set_flashdata($notification);
            redirect('roleadd');
        } else {
            $notification = array(
                'message' => 'login Again Session Expired',
                'alert-type' => 'error'
            );
            $this->session->set_flashdata($notification);
            redirect('login');
        }
    }

    public function roleadd()
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



            $page['page'] = 'roleadd';
            $page['pagetitle'] = 'New System role';
            $page['pageUrl'] = 'System Settings /' . $page['pagetitle'];
            $this->load->view('admin/views/' . $page['page'], $page);
        } else {
            $notification = array(
                'message' => 'Session lost Please Login Again',
                'alert-type' => 'error'
            );
            $this->session->set_flashdata($notification);
            redirect('login');
        }

        // var_dump('companyInfo');
        // die;
    }

    public function roleassign()
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



            //var_dump($page['admindashboard']); die;



            $page['page'] = 'roleassign';
            $page['pagetitle'] = 'Assign Priviledges to User';
            $page['pageUrl'] = 'System Settings /' . $page['pagetitle'];
        }
        $this->load->view('admin/views/' . $page['page'], $page);
        // var_dump('companyInfo');
        // die;
    }


    public function roleedit()
    {

        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $page['id'] = $session_data['id'];
            $page['email'] = $session_data['email'];

            $page['role'] = $session_data['role'];

            $page['isLogin'] = $session_data['isLogin'];

            // var_dump($this->input->post('rolename'));
            // die;

            $page['roleid'] = $this->input->post('roleid');




            $rolename = $this->input->post('rolename');

            $page['rolename'] = $rolename;

            $page['Dashboard'] = $this->module_3($rolename);
            $page['Vacancies'] = $this->module_9($rolename);
            $page['Applicants'] = $this->module_1($rolename);
            $page['locations'] = $this->module_5($rolename);
            $page['Industry'] = $this->module_4($rolename);
            $page['SignUp'] = $this->module_7($rolename);
            $page['CompanyInfo'] = $this->module_2($rolename);
            $page['Staff'] = $this->module_8($rolename);
            $page['Role'] = $this->module_6($rolename);

            // print_r($page['output']);
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



            $page['page'] = 'roleedit';
            $page['pagetitle'] = 'Role Edit';
            $page['pageUrl'] = 'System Settings /' . $page['pagetitle'];
            $this->load->view('admin/views/' . $page['page'], $page);
        } else {
            redirect('login');
        }

        // var_dump('companyInfo');
        // die;
    }
    public function module_1($rolename)
    {
        $query = $this->db->query("select * from roleprivilege where rolename='$rolename' and module='Applicants' ");
        $users = $query->result();
        return $users;
    }

    public function module_2($rolename)
    {
        $query = $this->db->query("select * from roleprivilege where rolename='$rolename' and module='CompanyInfo' ");
        $users = $query->result();
        return $users;
    }

    public function module_3($rolename)
    {
        $query = $this->db->query("select * from roleprivilege where rolename='$rolename' and module='dashboard' ");
        $users = $query->result();
        return $users;
    }

    public function module_4($rolename)
    {
        $query = $this->db->query("select * from roleprivilege where rolename='$rolename' and module='Industry' ");
        $users = $query->result();
        return $users;
    }

    public function module_5($rolename)
    {
        $query = $this->db->query("select * from roleprivilege where rolename='$rolename' and module='Locations' ");
        $users = $query->result();
        return $users;
    }

    public function module_6($rolename)
    {
        $query = $this->db->query("select * from roleprivilege where rolename='$rolename' and module='Role' ");
        $users = $query->result();
        return $users;
    }

    public function module_7($rolename)
    {
        $query = $this->db->query("select * from roleprivilege where rolename='$rolename' and module='SignUp' ");
        $users = $query->result();
        return $users;
    }

    public function module_8($rolename)
    {
        $query = $this->db->query("select * from roleprivilege where rolename='$rolename' and module='staff' ");
        $users = $query->result();
        return $users;
    }

    public function module_9($rolename)
    {
        $query = $this->db->query("select * from roleprivilege where rolename='$rolename' and module='Vacancies' ");
        $users = $query->result();
        return $users;
    }

    public function randompassword()
    {
        $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        // Output: 54esmdr0qf
        $password = substr(str_shuffle($permitted_chars), 0, 5);
        return $password;
    }






    public function index11111()
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


            $page['page'] = 'staff';
            $page['pagetitle'] = 'staffs';
            $page['pageUrl'] = 'Settings / System Settings /' . $page['pagetitle'];

            // $page['members'] = $this->all_staff();

            $this->load->view('admin/views/' . $page['page'], $page);
        } else {
            //If no session, redirect to login page
            redirect('login', 'refresh');
        }
    }

    public function staffadd()
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


            $page['page'] = 'staffadd';
            $page['pagetitle'] = 'New staff';
            $page['pageUrl'] = 'Settings / System Settings /' . $page['pagetitle'];

            // $page['members'] = $this->all_staff();

            $this->load->view('admin/views/' . $page['page'], $page);
        } else {
            //If no session, redirect to login page
            redirect('login', 'refresh');
        }
    }

    //`email`, `password`, `isLogin`, `role`,

    public function validate_email($usermail)
    {
        $query = $this->db->query("select * from login where email='$usermail' ");
        $result = $query->num_rows();
        if ($result >= 1) {
            return 1;
        } else {
            return 0;
        }
    }


    public function    addtostafftablerep($firstname, $lastname, $othername, $gender, $new_staff_id, $contact1, $contact2)
    {


        $data = array(
            'firstname' => $firstname,
            'lastname' => $lastname,
            'othername' => $othername,
            'gender' => $gender,
            'contact1' => $contact1,
            'contact2' => $contact2,
            'status' => 0,
            'login_id' => $new_staff_id
        );

        $this->db->insert('staff', $data);
        return 'inserted';
    }


    public function addtostafftable($SurName, $OtherName, $gender, $new_staff_id)
    {


        $data = array(
            'firstname' => $OtherName,
            'lastname' => $SurName,
            'gender' => $gender,
            'status' => 0,
            'login_id' => $new_staff_id
        );

        $this->db->insert('staff', $data);
        return 'inserted';
    }


    public function addmember()
    {
        $usermail = $this->input->post('email');
        $passrandom = $this->randompassword();
        $passwordCombination = $usermail . $this->input->post('role');
        $pass = hash('sha512', $passwordCombination);
        // var_dump($usermail); die;  
        $data = array(
            'email' => $this->input->post('email'),
            'password' => $pass,
            'isLogin' => 0,
            'role' => $this->input->post('role')
        );
        //var_dump($data); die;

        $result = $this->validate_email($usermail);


        if ($result == '1') {
            // echo $result; die;
            $notification = array(
                'message' => 'A Staff with Email Address Exist Already',
                'alert-type' => 'error'
            );
            $this->session->set_flashdata($notification);
            redirect('staff');
        } else {

            $this->db->insert('login', $data);

            $query = $this->db->query("select id as id from login where email='$usermail' ");
            $results = $query->row();
            $new_staff_id = $results->id;

            $SurName = $this->input->post('SurName');
            $OtherName = $this->input->post('OtherName');
            $gender = $this->input->post('gender');
            $result = $this->addtostafftable($SurName, $OtherName, $gender, $new_staff_id);
            $notification = array(
                'message' => 'New Staff Added Successful',
                'alert-type' => 'success'
            );
            $this->session->set_flashdata($notification);
            redirect('staff');
            //echo $result; die;
        }
    }


    public   function editmember()
    {
        $id = $this->input->post("txtid");
        $role = $this->input->post("role");

        $data = array(
            'firstname' => $this->input->post('FirstName'),
            'othername' => $this->input->post('OtherName'),
            'lastname' => $this->input->post('LastName'),
            'dob' => $this->input->post('dob'),
            'gender' => $this->input->post('gender'),
            'contact1' => $this->input->post('txtcontact1'),
            'contact2' => $this->input->post('txtcontact2'),
            'homeaddress' => $this->input->post('txthomeaddress'),
        );

        $login = array(
            'role' => $this->input->post('role')
        );
        $this->db->set($data);
        $this->db->where('login_id', $id);
        $this->db->update("staff", $data);

        $this->db->set($login);
        $this->db->where('id', $id);
        $this->db->update("login", $login);


        $notification = array(
            'message' => 'Staff Information Updated Successful',
            'alert-type' => 'success'
        );
        $this->session->set_flashdata($notification);
        redirect('staff');
    }




    public   function disable_member()
    {
        $id = $this->input->post("txtid");
        $login = array(
            'status' => 1 // $this->input->post('status')
        );
        // var_dump($id); die;
        $this->db->set($login);
        $this->db->where('id', $id);
        $this->db->update("login", $login);

        $notification = array(
            'message' => 'Staff Disabled Successful',
            'alert-type' => 'success'
        );
        $this->session->set_flashdata($notification);
        redirect('staff');
    }

    public   function activate_member()
    {
        $id = $this->input->post("txtid");
        $login = array(
            'status' => 0 // $this->input->post('status')
        );
        // var_dump($id); die;
        $this->db->set($login);
        $this->db->where('id', $id);
        $this->db->update("login", $login);

        $notification = array(
            'message' => 'Staff Activated Successful',
            'alert-type' => 'success'
        );
        $this->session->set_flashdata($notification);
        redirect('staff');
    }

    public   function delete_member()
    {
        $id = $this->input->post("txtid");
        $data = array(
            'status' => 2 // $this->input->post('status')
        );
        // var_dump($id); die;
        $this->db->set($data);
        $this->db->where('id', $id);
        $this->db->update("login", $data);

        $this->db->set($data);
        $this->db->where('login_id', $id);
        $this->db->update("staff", $data);

        $notification = array(
            'message' => 'Staff Deleted Successful',
            'alert-type' => 'success'
        );
        $this->session->set_flashdata($notification);
        redirect('staff');
    }


    public function companyinfocreate()
    {
        // SELECT `name`, `address`, `contact`, `email`, `rep_login_id`, `createddate`, `createdby`, `updatedby`, `updateddate` FROM `companyinfo` WHERE 1

        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $page['id'] = $session_data['id'];
            $page['email'] = $session_data['email'];

            $page['role'] = $session_data['role'];

            $page['isLogin'] = $session_data['isLogin'];

            $dataUpdate = array(
                'name' => $this->input->post('name'),
                'address' => $this->input->post('address'),
                'contact' => $this->input->post('contact'),
                'email' => $this->input->post('email'),
                'rep_login_id' => $session_data['id'],
                'updatedby' => $session_data['id'],

            );

            $datacreate = array(
                'name' => $this->input->post('name'),
                'address' => $this->input->post('address'),
                'contact' => $this->input->post('contact'),
                'email' => $this->input->post('email'),
                'rep_login_id' => $session_data['id'],

                'createdby' => $session_data['id'],
            );

            if ($this->input->post('companytableid') !== "") {

                $this->db->set($dataUpdate);
                $this->db->where('id', $this->input->post('companytableid'));
                $this->db->update("companyinfo", $dataUpdate);

                $notification = array(
                    'message' => 'Company Information Update Successful',
                    'alert-type' => 'success'
                );
            } else {
                $this->db->insert('companyinfo', $datacreate);
                $notification = array(
                    'message' => 'Company Information Create Successful',
                    'alert-type' => 'success'
                );
            }

            $this->session->set_flashdata($notification);
            redirect('companyInfo');
        }
    }

    public function companyrepcreate()
    {


        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $page['id'] = $session_data['id'];
            $page['email'] = $session_data['email'];

            $page['role'] = $session_data['role'];

            $page['isLogin'] = $session_data['isLogin'];

            $Email = $this->input->post('Email');

            $checking_role_users = $this->db->query("select id from login where email='$Email' ");
            $check_output = $checking_role_users->result_array();

            $check_output1 = $checking_role_users->result();


            if (count($check_output1) > 0) {


                $dataUpdate = array(
                    'rep_login_id' => $check_output['0']['id'],
                    'updatedby' => $session_data['id'], //
                );
                $this->db->set($dataUpdate);
                $this->db->where('id', $this->input->post('companytableid'));
                $this->db->update("companyinfo", $dataUpdate);

                $notification = array(
                    'message' => 'Company Representative Add Successful',
                    'alert-type' => 'success'
                );
                $this->session->set_flashdata($notification);
                redirect('companyInfo');
            } else {
                $usermail = $this->input->post('Email');
                $passrandom = $this->randompassword();
                $passwordCombination = $usermail . $passrandom;
                $pass = hash('sha512', $passwordCombination);
                $data = array(
                    'email' => $this->input->post('Email'),
                    'password' => $pass,
                    'isLogin' => 0,
                    'role' => 'Admin'
                );

                $this->db->insert('login', $data);

                // SELECT `id`, `login_id`, `firstname`, `othername`, `lastname`, `dob`, `gender`, 
                // `contact1`, `contact2`, `homeaddress`, `created_at`, `updatedby`, `updated_at`, `status` FROM `staff` WHERE 1

                $query = $this->db->query("select id as id from login where email='$usermail' ");
                $results = $query->row();
                $new_staff_id = $results->id;

                $firstname = $this->input->post('firstname');
                $lastname = $this->input->post('lastname');
                $othername = $this->input->post('othername');
                $gender = $this->input->post('gender');
                $contact1 = $this->input->post('contact1');
                $contact2 = $this->input->post('contact2');

                // var_dump($contact1 . " " . $contact2);
                // die;
                $result = $this->addtostafftablerep($firstname, $lastname, $othername, $gender, $new_staff_id, $contact1, $contact2);

                $this->sendLoginCredentials($usermail, $passwordCombination);

                $dataUpdate = array(
                    'rep_login_id' => $new_staff_id,
                    'updatedby' => $session_data['id'],
                );
                $this->db->set($dataUpdate);
                // $this->db->where('id', $this->input->post('companytableid'));
                $this->db->update("companyinfo", $dataUpdate);


                $notification = array(
                    'message' => 'New Company Representative Add Successful',
                    'alert-type' => 'success'
                );
                $this->session->set_flashdata($notification);
                redirect('companyInfo');
                //echo $result; die;
            }
        }
    }


    public function sendLoginCredentials($usermail, $passwordCombination)
    {

        // $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        // $password = substr(str_shuffle($permitted_chars), 0, 5);


        require_once(APPPATH . 'third_party/PHPMailer/PHPMailerAutoload.php');
        $mail = new PHPMailer();
        $mail->IsSMTP(); /* we are going to use SMTP */
        $mail->SMTPAuth   = true; /* enabled SMTP authentication */
        $mail->SMTPSecure = "ssl";  /* prefix for secure protocol to connect to the server */
        $mail->Host       = "smtp.gmail.com";      /* setting GMail as our SMTP server */
        $mail->Port       = 465;                   /* SMTP port to connect to GMail */
        $mail->Username   = "emmagbin@gmail.com";  /* user email address */
        $mail->Password   = "0249273086";            /* password in GMail */
        $mail->SetFrom('emmagbin@gmail.com', 'firm anchor consult');  /* Who is sending */
        $mail->isHTML(true);
        $mail->Subject    = "Firm Achor Consult Login Credentials";
        $mail->Body      = "
        <!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml'
 xmlns:v='urn:schemas-microsoft-com:vml'
 xmlns:o='urn:schemas-microsoft-com:office:office'>
<head>
    <!--[if gte mso 9]><xml>
    <o:OfficeDocumentSettings>
    <o:AllowPNG/>
    <o:PixelsPerInch>96</o:PixelsPerInch>
    </o:OfficeDocumentSettings>
    </xml><![endif]-->
    <meta http-equiv='Content-type' content='text/html; charset=utf-8' />
    <meta name='viewport' content='width=device-width, initial-scale=1, maximum-scale=1' />
    <meta http-equiv='X-UA-Compatible' content='IE=edge' />
    <meta name='format-detection' content='date=no' />
    <meta name='format-detection' content='address=no' />
    <meta name='format-detection' content='telephone=no' />
    <title>Email Template</title>
    

    <style type='text/css' media='screen'>
        /* Linked Styles */
        body { padding:0 !important; margin:0 !important; display:block !important; background:#1e1e1e; -webkit-text-size-adjust:none }
        a { color:#a88123; text-decoration:none }
        p { padding:0 !important; margin:0 !important } 

        /* Mobile styles */
        </style>
        <style media='only screen and (max-device-width: 480px), only screen and (max-width: 480px)' type='text/css'>
        @media only screen and (max-device-width: 480px), only screen and (max-width: 480px) { 
            div[class='mobile-br-5'] { height: 5px !important; }
            div[class='mobile-br-10'] { height: 10px !important; }
            div[class='mobile-br-15'] { height: 15px !important; }
            div[class='mobile-br-20'] { height: 20px !important; }
            div[class='mobile-br-25'] { height: 25px !important; }
            div[class='mobile-br-30'] { height: 30px !important; }

            th[class='m-td'], 
            td[class='m-td'], 
            div[class='hide-for-mobile'], 
            span[class='hide-for-mobile'] { display: none !important; width: 0 !important; height: 0 !important; font-size: 0 !important; line-height: 0 !important; min-height: 0 !important; }

            span[class='mobile-block'] { display: block !important; }

            div[class='wgmail'] img { min-width: 320px !important; width: 320px !important; }

            div[class='img-m-center'] { text-align: center !important; }

            div[class='fluid-img'] img,
            td[class='fluid-img'] img { width: 100% !important; max-width: 100% !important; height: auto !important; }

            table[class='mobile-shell'] { width: 100% !important; min-width: 100% !important; }
            td[class='td'] { width: 100% !important; min-width: 100% !important; }
            
            table[class='center'] { margin: 0 auto; }
            
            td[class='column-top'],
            th[class='column-top'],
            td[class='column'],
            th[class='column'] { float: left !important; width: 100% !important; display: block !important; }

            td[class='content-spacing'] { width: 15px !important; }

            div[class='h2'] { font-size: 44px !important; line-height: 48px !important; }
        } 
    </style>
</head>
<body class='body' style='padding:0 !important; margin:0 !important; display:block !important; background:#1e1e1e; -webkit-text-size-adjust:none'>
    <table width='100%' border='0' cellspacing='0' cellpadding='0' bgcolor='#1e1e1e'>
        <tr>
            <td align='center' valign='top'>
                <!-- Top -->
                <table width='100%' border='0' cellspacing='0' cellpadding='0' bgcolor='#161616'>
                    <tr>
                        <td align='center' valign='top'>
                            <table width='600' border='0' cellspacing='0' cellpadding='0' class='mobile-shell'>
                                <tr>
                                    <td class='td' style='font-size:0pt; line-height:0pt; padding:0; margin:0; font-weight:normal; width:600px; min-width:600px; Margin:0' width='600'>
                                        <table width='100%' border='0' cellspacing='0' cellpadding='0'>
                                            <tr>
                                                <td class='content-spacing' style='font-size:0pt; line-height:0pt; text-align:left' width='20'></td>
                                                <td>
                                                    <table width='100%' border='0' cellspacing='0' cellpadding='0' class='spacer' style='font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%'><tr><td height='10' class='spacer' style='font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%'>&nbsp;</td></tr></table>

                                                    <table width='100%' border='0' cellspacing='0' cellpadding='0' class='spacer' style='font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%'><tr><td height='10' class='spacer' style='font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%'>&nbsp;</td></tr></table>

                                                </td>
                                                <td class='content-spacing' style='font-size:0pt; line-height:0pt; text-align:left' width='20'></td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
                <!-- END Top -->

                <table width='600' border='0' cellspacing='0' cellpadding='0' class='mobile-shell'>
                    <tr>
                        <td class='td' style='font-size:0pt; line-height:0pt; padding:0; margin:0; font-weight:normal; width:600px; min-width:600px; Margin:0' width='600'>
                            <!-- Header -->
                            <table width='100%' border='0' cellspacing='0' cellpadding='0'>
                                <tr>
                                    <td class='content-spacing' style='font-size:0pt; line-height:0pt; text-align:left' width='20'></td>
                                    <td>
                                        <table width='100%' border='0' cellspacing='0' cellpadding='0' class='spacer' style='font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%'><tr><td height='30' class='spacer' style='font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%'>&nbsp;</td></tr></table>


                                        <div class='img-center' style='font-size:0pt; line-height:0pt; text-align:center'><a href='#' target='_blank'><img src='https://firmanchorconsult.com/assets/admin/dist/assets/media/logos/logo.png' border='0' width='203' height='27' alt='' /></a></div>
                                        <table width='100%' border='0' cellspacing='0' cellpadding='0' class='spacer' style='font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%'><tr><td height='30' class='spacer' style='font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%'>&nbsp;</td></tr></table>


                                        <div class='hide-for-mobile'>
                                            <div class='text-nav' style='color:#ffffff; font-family:Arial, sans-serif; min-width:auto !important; font-size:12px; line-height:22px; text-align:center'>
                                                <a href='https://firmanchorconsult.com/Web/index' target='_blank' class='link-white' style='color:#ffffff; text-decoration:none'><span class='link-white' style='color:#ffffff; text-decoration:none'>HOME</span></a>
                                                &nbsp;&nbsp;|&nbsp;&nbsp;
                                                <a href='https://firmanchorconsult.com/Web/jobs' target='_blank' class='link-white' style='color:#ffffff; text-decoration:none'><span class='link-white' style='color:#ffffff; text-decoration:none'>JOB BOARD</span></a>
                                                &nbsp;&nbsp;|&nbsp;&nbsp;
                                                <a href='https://firmanchorconsult.com/Web/services' target='_blank' class='link-white' style='color:#ffffff; text-decoration:none'><span class='link-white' style='color:#ffffff; text-decoration:none'>SERVICES</span></a>
                                                &nbsp;&nbsp;|&nbsp;&nbsp;
                                                <a href='https://firmanchorconsult.com/Web/login' target='_blank' class='link-white' style='color:#ffffff; text-decoration:none'><span class='link-white' style='color:#ffffff; text-decoration:none'>ABOUT</span></a>
                                                &nbsp;&nbsp;|&nbsp;&nbsp;
                                                        <a href='https://firmanchorconsult.com/Web/login' target='_blank' class='link-white' style='color:#ffffff; text-decoration:none'><span class='link-white' style='color:#ffffff; text-decoration:none'>CONTACT US</span></a>
                                                        &nbsp;&nbsp;|&nbsp;&nbsp;
                                                        <a href='https://firmanchorconsult.com/Web/login' target='_blank' class='link-white' style='color:#ffffff; text-decoration:none'><span class='link-white' style='color:#ffffff; text-decoration:none'>LOGIN</span></a>
                                            </div>
                                            <table width='100%' border='0' cellspacing='0' cellpadding='0' class='spacer' style='font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%'><tr><td height='20' class='spacer' style='font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%'>&nbsp;</td></tr></table>

                                        </div>
                                    </td>
                                    <td class='content-spacing' style='font-size:0pt; line-height:0pt; text-align:left' width='20'></td>
                                </tr>
                            </table>
                            <!-- END Header -->

                            <!-- Main -->
                            <table width='100%' border='0' cellspacing='0' cellpadding='0'>
                                <tr>
                                    <td>
                                        <!-- Head -->
                                        <table width='100%' border='0' cellspacing='0' cellpadding='0' bgcolor='#d2973b'>
                                            <tr>
                                                <td>
                                                    <table width='100%' border='0' cellspacing='0' cellpadding='0'>
                                                        <tr>
                                                            <td class='img' style='font-size:0pt; line-height:0pt; text-align:left' width='27'><img src='https://d1pgqke3goo8l6.cloudfront.net/JJxrFRyVRr20CJD3pOx9_top_left.jpg' border='0' width='27' height='27' alt='' /></td>
                                                            <td>
                                                                <table width='100%' border='0' cellspacing='0' cellpadding='0'>
                                                                    <tr>
                                                                        <td class='img' style='font-size:0pt; line-height:0pt; text-align:left' height='3' bgcolor='#e6ae57'>&nbsp;</td>
                                                                    </tr>
                                                                </table>
                                                                <table width='100%' border='0' cellspacing='0' cellpadding='0' class='spacer' style='font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%'><tr><td height='24' class='spacer' style='font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%'>&nbsp;</td></tr></table>

                                                            </td>
                                                            <td class='img' style='font-size:0pt; line-height:0pt; text-align:left' width='27'><img src='https://d1pgqke3goo8l6.cloudfront.net/SNcoUN5kSfCDagqSBEZ4_top_right.jpg' border='0' width='27' height='27' alt='' /></td>
                                                        </tr>
                                                    </table>
                                                    <table width='100%' border='0' cellspacing='0' cellpadding='0'>
                                                        <tr>
                                                            <td class='img' style='font-size:0pt; line-height:0pt; text-align:left' width='3' bgcolor='#e6ae57'></td>
                                                            <td class='img' style='font-size:0pt; line-height:0pt; text-align:left' width='10'></td>
                                                            <td>
                                                                <table width='100%' border='0' cellspacing='0' cellpadding='0' class='spacer' style='font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%'><tr><td height='15' class='spacer' style='font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%'>&nbsp;</td></tr></table>

                                                            

                                                            <table width='100%' border='0' cellspacing='0' cellpadding='0' class='spacer' style='font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%'><tr><td height='5' class='spacer' style='font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%'>&nbsp;</td></tr></table>


                                                                <div class='h2' style='color:#ffffff; font-family:Georgia, serif; min-width:auto !important; font-size:60px; line-height:64px; text-align:center'>
                                                                    <em> welcome!</em>
                                                                </div>
                                                                <div class='h3-2-center' style='color:#1e1e1e; font-family:Arial, sans-serif; min-width:auto !important; font-size:20px; line-height:26px; text-align:center; letter-spacing:5px'>Firm Anchor Consult</div>
                                                                <table width='100%' border='0' cellspacing='0' cellpadding='0' class='spacer' style='font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%'><tr><td height='35' class='spacer' style='font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%'>&nbsp;</td></tr></table>

                                                            </td>
                                                            <td class='img' style='font-size:0pt; line-height:0pt; text-align:left' width='10'></td>
                                                            <td class='img' style='font-size:0pt; line-height:0pt; text-align:left' width='3' bgcolor='#e6ae57'></td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                        <!-- END Head -->

                                        <!-- Body -->
                                        <table width='100%' border='0' cellspacing='0' cellpadding='0' bgcolor='#ffffff'>
                                            <tr>
                                                <td>
                                                    <table width='100%' border='0' cellspacing='0' cellpadding='0'>
                                                        <tr>
                                                            <td class='content-spacing' style='font-size:0pt; line-height:0pt; text-align:left' width='20'></td>
                                                            <td>
                                                                <table width='100%' border='0' cellspacing='0' cellpadding='0' class='spacer' style='font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%'><tr><td height='35' class='spacer' style='font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%'>&nbsp;</td></tr></table>

                                                                <div class='h3-1-center' style='color:#1e1e1e; font-family:Georgia, serif; min-width:auto !important; font-size:20px; line-height:26px; text-align:center'>We Use this opportunity to officailly welcome you to Firm Anchor Consult System</div>
                                                                <div class='h3-1-center' style='color:#1e1e1e; font-family:Georgia, serif; min-width:auto !important; font-size:20px; line-height:26px; text-align:center'>Your Login Details is as follows</div>
                                                                
                                                                <table width='100%' border='0' cellspacing='0' cellpadding='0' class='spacer' style='font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%'><tr><td height='15' class='spacer' style='font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%'>&nbsp;</td></tr></table>


                                                                <div class='h4-center' style='color:#1e1e1e; font-family:Arial, sans-serif; min-width:auto !important; font-size:18px; line-height:24px; text-align:center'>
                                                                    <strong>EMAIL: <a href='#' target='_blank' class='link' style='color:#a88123; text-decoration:none'><span class='link' style='color:#a88123; text-decoration:none'>" . $usermail . "</span></a></strong>
                                                                </div>
                                                                <div class='h4-center' style='color:#1e1e1e; font-family:Arial, sans-serif; min-width:auto !important; font-size:18px; line-height:24px; text-align:center'>
                                                                    <strong>PASSWORD: <a href='#' target='_blank' class='link' style='color:#a88123; text-decoration:none'><span class='link' style='color:#a88123; text-decoration:none'>" . $passwordCombination . "</span></a></strong>
                                                                </div>
                                                                <table width='100%' border='0' cellspacing='0' cellpadding='0' class='spacer' style='font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%'><tr><td height='25' class='spacer' style='font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%'>&nbsp;</td></tr></table>


                                                                <!-- Button -->
                                                                <table width='100%' border='0' cellspacing='0' cellpadding='0'>
                                                                    <tr>
                                                                        <td align='center'>
                                                                            <table width='210' border='0' cellspacing='0' cellpadding='0'>
                                                                                <tr>
                                                                                    <td align='center' bgcolor='#d2973b'>
                                                                                        <table border='0' cellspacing='0' cellpadding='0'>
                                                                                            <tr>
                                                                                                <td class='img' style='font-size:0pt; line-height:0pt; text-align:left' width='15'><table width='100%' border='0' cellspacing='0' cellpadding='0' class='spacer' style='font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%'><tr><td height='50' class='spacer' style='font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%'>&nbsp;</td></tr></table>
</td>
                                                                                                <td bgcolor='#d2973b'>
                                                                                                    <div class='text-btn' style='color:#ffffff; font-family:Arial, sans-serif; min-width:auto !important; font-size:16px; line-height:20px; text-align:center'>
                                                                                                        <a href='https://firmanchorconsult.com/login' target='_blank' class='link-white' style='color:#ffffff; text-decoration:none'><span class='link-white' style='color:#ffffff; text-decoration:none'>CLICK TO LOGIN</span></a>
                                                                                                    </div>
                                                                                                </td>
                                                                                                <td class='img' style='font-size:0pt; line-height:0pt; text-align:left' width='15'></td>
                                                                                            </tr>
                                                                                        </table>
                                                                                    </td>
                                                                                </tr>
                                                                            </table>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                                <!-- END Button -->
                                                                <table width='100%' border='0' cellspacing='0' cellpadding='0' class='spacer' style='font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%'><tr><td height='40' class='spacer' style='font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%'>&nbsp;</td></tr></table>

                                                            </td>
                                                            <td class='content-spacing' style='font-size:0pt; line-height:0pt; text-align:left' width='20'></td>
                                                        </tr>
                                                    </table>
                                                

                                                <table width='100%' border='0' cellspacing='0' cellpadding='0'>
                                                        <tr>
                                                            <td class='content-spacing' style='font-size:0pt; line-height:0pt; text-align:left' width='20'></td>
                                                            <td>
                                                                <table width='100%' border='0' cellspacing='0' cellpadding='0' class='spacer' style='font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%'><tr><td height='30' class='spacer' style='font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%'>&nbsp;</td></tr></table>

                                                                
                                                                <table width='100%' border='0' cellspacing='0' cellpadding='0' class='spacer' style='font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%'><tr><td height='25' class='spacer' style='font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%'>&nbsp;</td></tr></table>


                                                                <div class='text-2' style='color:#1e1e1e; font-family:Georgia, serif; min-width:auto !important; font-size:14px; line-height:22px; text-align:left'>
                                                                    <em><center>Firm Anchor Consult does not only give you candidates that meet your needs but talented employees that stay with your company and make remarkable contributions to company success.</center></em>
                                                                </div>
                                                                <table width='100%' border='0' cellspacing='0' cellpadding='0' class='spacer' style='font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%'><tr><td height='35' class='spacer' style='font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%'>&nbsp;</td></tr></table>

                                                            </td>
                                                            <td class='content-spacing' style='font-size:0pt; line-height:0pt; text-align:left' width='20'></td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                        <!-- END Body -->


                                    </td>
                                </tr>
                            </table>
                            <!-- END Main -->
                            
                            <!-- Footer -->
                            <table width='100%' border='0' cellspacing='0' cellpadding='0'>
                                <tr>
                                    <td class='content-spacing' style='font-size:0pt; line-height:0pt; text-align:left' width='20'></td>
                                    <td>
                                        <table width='100%' border='0' cellspacing='0' cellpadding='0' class='spacer' style='font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%'><tr><td height='30' class='spacer' style='font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%'>&nbsp;</td></tr></table>

        
                                        <div class='text-footer' style='color:#666666; font-family:Arial, sans-serif; min-width:auto !important; font-size:12px; line-height:18px; text-align:center'>
                                            House No. 110 Housing Down,<span class='mobile-block'></span> Adenta,<span class='mobile-block'></span> Accra
                                            <br />
                                            <a href='https://firmanchorconsult.com/Web/index' target='_blank' class='link-1' style='color:#666666; text-decoration:none'><span class='link-1' style='color:#666666; text-decoration:none'>www.firmanchorconsult.com</span></a>
                                            <span class='mobile-block'><span class='hide-for-mobile'>|</span></span>
                                            <a href='mailto:email@yoursitename.com' target='_blank' class='link-1' style='color:#666666; text-decoration:none'><span class='link-1' style='color:#666666; text-decoration:none'>firmanchorconsult@gmail.com</span></a>
                                            <span class='mobile-block'><span class='hide-for-mobile'>|</span></span>
                                            Phone: <a href='tel:+233 242 550316 ' target='_blank' class='link-1' style='color:#666666; text-decoration:none'><span class='link-1' style='color:#666666; text-decoration:none'>+233 242 550316 </span></a>
                                        </div>
                                        <table width='100%' border='0' cellspacing='0' cellpadding='0' class='spacer' style='font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%'><tr><td height='30' class='spacer' style='font-size:0pt; line-height:0pt; text-align:center; width:100%; min-width:100%'>&nbsp;</td></tr></table>

                                    </td>
                                    <td class='content-spacing' style='font-size:0pt; line-height:0pt; text-align:left' width='20'></td>
                                </tr>
                            </table>
                            <!-- END Footer -->
                        </td>
                    </tr>
                </table>
                <div class='wgmail' style='font-size:0pt; line-height:0pt; text-align:center'><img src='https://d1pgqke3goo8l6.cloudfront.net/oD2XPM6QQiajFKLdePkw_gmail_fix.gif' width='600' height='1' style='min-width:600px' alt='' border='0' /></div>
            </td>
        </tr>
    </table>
</body>
</html>
";
        $destino = $usermail; // Who is addressed the email to
        $mail->AddAddress($destino, $email);
        if (!$mail->Send()) {
            $return = 1; // "Password reset Failed Try Again After Some time";
            return ($return);
        } else {
            $return = 0; // "Password reset Completed Please Check Your mail For New Password";
            return ($return);
        }



        // $passwordCombination = $usermail . $this->input->post('role');
        //  $pass = hash('sha512', $passwordCombination);





    }

    public function index11()
    {

        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $dashboard['usersfullname'] = $session_data['usersfullname'];
            $dashboard['useremail'] = $session_data['useremail'];
            $dashboard['logintoken'] = $session_data['logintoken'];


            //  $users['roles']=$this->all_roles(); 
            // $users['all_Business']=$this->all_Business();


            $users['active'] = 'onboarding';
            $this->load->view('FIOnboarding', $users);
        } else {
            //If no session, redirect to login page
            redirect('login', 'refresh');
        }
    }
    public function all_roles()
    {
        $query = $this->db->query("select * from roles where roleName!='Admin' ");
        $users = $query->result();
        return $users;
    }


    public function AddBusiness()
    {
        $contact = $this->input->post('Admincontact');
        $password = hash('sha512', $contact);
        $data = array(
            'Adminfullname' => $this->input->post('Adminfullname'),
            'Adminemail' => $this->input->post('Adminemail'),
            'Admincontact' => $this->input->post('Admincontact'),
            'Bname' => $this->input->post('Bname'),
            'Btype' => $this->input->post('Btype'),
            'BdigitalAddress' => $this->input->post('BdigitalAddress'),
            'Bcontact' => $this->input->post('Bcontact'),
            'Bemail' => $this->input->post('Bemail'),
            'createddate' => date("Y-m-d"),
            'RegisteredEmployees' => 1,
            'Bstatus' => 'A',
        );

        $this->db->insert('Business', $data);

        $dataUser = array(
            'fullName' => $this->input->post('Adminfullname'),
            'userEmail' => $this->input->post('Adminemail'),
            'phoneNumber' => $this->input->post('Admincontact'),
            'userRole' => 'BAdmin',
            'createddate' => date("Y-m-d"),
            'passwordd' => $password,
            'statuss' => 'A',
        );

        //var_dump($dataUser); die;
        $this->db->insert('users', $dataUser);

        redirect('onboarding');
    }

    public function sendMail()
    {


        //     $this->load->config('email');
        //     $this->load->library('email');

        // $from = $this->config->item('smtp_user');
        // $to = $this->input->post('to');





        $config = array(
            'protocol' => 'smtp', // 'mail', 'sendmail', or 'smtp'
            'smtp_host' => 'smtp.gmail.com',
            'smtp_port' => 465,
            'smtp_user' => 'emmagbin@gmail.com',
            'smtp_pass' => '0249273086',
            'smtp_crypto' => 'ssl', //can be 'ssl' or 'tls' for example
            'mailtype' => 'text', //plaintext 'text' mails or 'html'
            'smtp_timeout' => '300', //in seconds
            'charset' => 'iso-8859-1',
            'wordwrap' => TRUE
        );
        $this->load->library('Email');

        $from = $this->config->item('smtp_user');
        $to = 'emmagbin@yahoo.com';
        $subject = 'hii'; // $this->input->post('subject');
        $message = 'loo magbin'; //$this->input->post('message');

        $this->email->set_newline("\r\n");
        $this->email->from($from);
        $this->email->to($to);
        $this->email->subject($subject);
        $this->email->message($message);

        if ($this->email->send()) {
            echo 'Your Email has successfully been sent.';
        } else {
            echo show_error($this->email->print_debugger());
        }
        die;


        //    $from_email = "PSKonnectAlert@gmail.com"; 
        // $to_email = 'emmagbin@yahoo.com';//$this->input->post('email'); 

        // //Load email library 
        // $this->load->library('email'); 

        // $this->email->from($from_email, 'emmagbin'); 
        // $this->email->to($to_email);
        // $this->email->subject('Email Test'); 
        // $this->email->message('Testing the email class.'); 

        // //Send mail 
        // if($this->email->send()) {
        //    echo 'Mail Successful Sent';
        //    die; 
        // }

        // else {
        //    echo 'Mail Successful Not Sent';
        //    die; 
        // }

        //echo ('hii'); die;
        // $query= $this->db->query("select CompanyName from t_CompanyRegistration where CompanyID='$mycompanyname'");
        //  $data= $query->result_array();
        //  $mycompanyname1=$data;
        //  $companyname=$mycompanyname1[0]['CompanyName'];

        // $email_to='emmagbin@yahoo.com';//$myemailaddress;//$this->input->post("resetingpass");



        // //require_once('PHPMailer/PHPMailerAutoload.php');
        //  require_once(APPPATH.'third_party/PHPMailer/PHPMailerAutoload.php');

        // $mail = new PHPMailer();
        // $mail->IsSMTP(); // we are going to use SMTP
        // $mail->SMTPAuth   = true; // enabled SMTP authentication
        // $mail->SMTPSecure = "ssl";  // prefix for secure protocol to connect to the server
        // $mail->Host       = "smtp.gmail.com";      // setting GMail as our SMTP server
        // $mail->Port       = 465;                   // SMTP port to connect to GMail
        // $mail->Username   = "PSKonnectAlert@gmail.com";  // user email address
        // $mail->Password   = "0249273086";            // password in GMail
        // $mail->SetFrom('PSKonnectAlert@gmail.com', 'Firm Anchor Consult');  //Who is sending
        // $mail->isHTML(true);
        // $mail->Subject    = "Registration Details";
        // $mail->Body      = "
        //     <html>
        //      <head>

        //     </head>
        //     <body>
        //     <h3>Welcome to Firm Anchor Consult: Magbin Immanuel   </h3>
        //     <p>Your Staff Identification Number is : 0249273086</p><br>
        //     <p>Your Company Email Address is : magbin</p><br>
        //     <p>To Log on to Nordcom Self Service system, click the URL below and follow prompts</p>
        //     <p>http://172.16.1.24:800/erpsystems/</p><br>
        //     <p>Your UserName is : emmagbin </p><br>
        //     <p>Your Default Password is : emailaddress </p><br>
        //     </body>
        //     </html>
        // ";

        // $mail->SMTPOptions = array(
        //             'ssl' => array(
        //             'verify_peer' => false,
        //             'verify_peer_name' => false,
        //             'allow_self_signed' => true
        //             )
        //             );
        // $destino = 'emmagbin@yahoo.com';//$email_to;//"emmagbin@yahoo.com"; // Who is addressed the email to
        // $mail->addAddress($destino, "Receiver");

        // if(!$mail->Send()) {
        //   echo 'Mailer Error:'.$mail->ErrorInfo;

        //     die;
        //     redirect('emplist');
        // } else {

        //     echo 'Mail Successful Sent';
        //     die;
        //     redirect('emplist');
        // }
    }


    public function all_Business()
    {
        $query = $this->db->query("select * from Business");
        $all_Business = $query->result();
        return $all_Business;
    }











    public   function delete()
    {
        $id = $this->input->post("user_email");
        $data = array(
            'delete_flag' => 'Y'
        );
        $this->db->set($data);
        $this->db->where('user_email', $id);
        $this->db->update("users", $data);
        redirect('create_user');
    }




    public   function update()
    {
        $id = $this->input->post("user_email");
        // var_dump($id); die;
        $data = array(
            'user_full_name' => $this->input->post('user_full_name'),
            'gender' => $this->input->post('gender'),
            'phonenumber' => $this->input->post('phonenumber')

        );

        $this->db->set($data);
        $this->db->where('user_email', $id);
        $this->db->update("users", $data);
        redirect('create_user');
    }

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


            // $result=$this->compare_password($new_pass,$new_pass_confirm);

            //var_dump($result); die;
            //  if($result=='1')
            //{

            //          $this->db->query("update users set password='$pass' where user_email='$user_email' "); 
            //               $data = array('password' => $pass );
            //                echo $user_email; die;
            //                  $this->db->set($data);
            // $this->db->where('user_email',$user_email);
            // $this->db->update("users",$data);
            //  redirect('ServiceCategory');
            //$result=1;

            //ima@ite.comWednesday
            //     echo $result;   
            //}
            //else
            //{
            //  $result=='2';
            //  echo $result;
            //}

        } else {
            echo $result;
        }
    }
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

    public function add_description()
    {
        $data = array(
            'transaction_id' => $this->input->post('transaction_id'),
            'descriptions' => $this->input->post('descriptions'),
            'time_date' => date("Y-m-d H:i:s")
        );

        $this->db->insert('case_description', $data);
        $result = 1;
        echo $result;
        //redirect('case');
    }
}
