
<?php
defined('BASEPATH') or exit('No direct script access allowed');
//This is the Controller for codeigniter crud using ajax application.
class users_controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('User');
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
            $page['pageUrl']  = 'users';
            $page['pagetitle'] = 'users';
            $page['folder'] = 'staff';
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


    public function createstaff()
    {
        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $page['login_id'] = $session_data['login_id'];

            $this->User->insertUser($session_data['login_id']);
            $notification = array(
                'message' => 'User Creation Successful',
                'alert-type' => 'success'
            );

            $this->session->set_flashdata($notification);
            redirect('users', 'refresh');
        } else {
            $notification = array(
                'message' => 'Seasion lost Please Login Again',
                'alert-type' => 'error'
            );

            $this->session->set_flashdata($notification);
            redirect('login', 'refresh');
        }
    }


    public function changepassword()
    {

        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $page['login_id'] = $session_data['login_id'];

            $password = $session_data['password'];


            $passwordCombination_old = $session_data['username'] . $this->input->post('oldpassword');
            $passwordToken_old = hash('sha512', $passwordCombination_old);
            if (trim($passwordToken_old) === trim($password)) {
                $passwordCombination_new = $session_data['username'] . $this->input->post('newpassword');
                $passwordToken_new = hash('sha512', $passwordCombination_new);
                $this->User->changepasswordUser($session_data['login_id'], $passwordToken_new);

                $notification = array(
                    'message' => 'User Password Update Successful',
                    'alert-type' => 'success'
                );

                $this->session->set_flashdata($notification);
                redirect('profile');
            } else {
                $notification = array(
                    'message' => 'User Password Update Failed Contact Admin',
                    'alert-type' => 'error'
                );

                $this->session->set_flashdata($notification);
                redirect('profile');
            }
        } else {
            $notification = array(
                'message' => 'Seasion lost Please Login Again',
                'alert-type' => 'error'
            );

            $this->session->set_flashdata($notification);
            redirect('login', 'refresh');
        }
    }


    public function checkusername()
    {
        //   $checkusername = $this->input->post('checkusername');

        $result =  $this->User->checkUser($this->input->post('checkusername'));
        echo json_encode($result[0]);
    }


    public function checkuserpassword()
    {
        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $page['login_id'] = $session_data['login_id'];
            $username = $session_data['username'];
            $password = $session_data['password'];

            $passwordCombination = $session_data['username'] . $this->input->post('oldpassword');
            $passwordToken = hash('sha512', $passwordCombination);
            if (trim($passwordToken) === trim($password)) {
                echo json_encode(true);
            } else {
                echo json_encode(false);
            }
        }
    }
    public function index1()
    {
        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $users['usersfullname'] = $session_data['usersfullname'];
            $users['useremail'] = $session_data['useremail'];
            $users['logintoken'] = $session_data['logintoken'];
            $users['finame'] = $session_data['finame'];

            $users['users'] = $this->all_users();
            // $users['roles'] = $this->all_roles();
            $query = $this->db->query(" select

(SELECT   count(*) FROM sysFIUsers WHERE sex='Male' and status='A') as totalMales,
 (SELECT   count(*) FROM sysFIUsers WHERE sex='Female' and status='A') as totalFemales,
 (SELECT   count(*) FROM sysFIUsers WHERE status='A') as totalActive,
 (SELECT   count(*) FROM sysFIUsers WHERE status='D' ) as totalNotActive ");
            $results = $query->row();
            $users['totalMales'] = $results->totalMales;
            $users['totalFemales'] = $results->totalFemales;
            $users['totalActive'] = $results->totalActive;
            $users['totalNotActive'] = $results->totalNotActive;
            $users['active'] = 'user';
            $this->load->view('users', $users);
        } else {
            //If no session, redirect to login page
            redirect('login', 'refresh');
        }
    }

    public function all_users()
    {
        $query = $this->db->query("select * from sysFIUsers ");
        $users = $query->result();
        return $users;
    }



    public function NewSystemUser()
    {
        $userEmail = $this->input->post('userEmail');
        $PhoneNumber = $this->input->post('PhoneNumber');
        $passwordtoken = $userEmail . $PhoneNumber;
        $password = hash('sha512', $passwordtoken);

        $this->db->select('useremail');
        $this->db->from('sysFIUsers');
        $this->db->where('useremail', $userEmail);
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            $data = array(
                'usersfullname' => $this->input->post('fullname'),
                'sex' => $this->input->post('gender'),
                'logintoken' => $password,
                'useremail' => $userEmail,
                'phonenumber' => $PhoneNumber,
                'role' => $this->input->post('UserRole'),
                'datecreated' => date("Y-m-d"),
                'timecreated' => date("h:i:sa"),
                'createdby' => $this->input->post('usersfullname'),
                'finame' => $this->input->post('finame'),
                'status' => 'A',
            );
            $this->db->insert('sysFIUsers', $data);
            echo ("1");
        } else {
            echo ("0");
        }
    }




    public function editUser()
    {
        $useremail = $this->input->post('useremail');
        $data = array(
            'usersfullname' => $this->input->post('txtfullname'),
            'phonenumber' => $this->input->post('txtphonenumbertxt'),
            'role' => $this->input->post('txtrole'),
            'sex' => $this->input->post('txtgender')
        );
        $this->db->set($data);
        $this->db->where('useremail', $useremail);
        $this->db->update("sysFIUsers", $data);
        redirect('user');
        //
    }




    public   function unlock()
    {
        $id = $this->input->post('disableid');
        $data = array(
            'status' => 'A'
        );
        $this->db->set($data);
        $this->db->where('id', $id);
        $this->db->update("sysFIUsers", $data);
        redirect('user');
    }

    public   function disable()
    {
        $id = $this->input->post('disableid');
        $data = array(
            'status' => 'D'
        );
        $this->db->set($data);
        $this->db->where('id', $id);
        $this->db->update("sysFIUsers", $data);
        redirect('user');
    }

    public function deleteUser()
    {
        $id = $this->input->post('disableid');
        // var_dump($id); die;
        $this->db->WHERE('id ', $id);
        $this->db->delete("sysFIUsers");
        redirect('user');
    }

    public function resetpassword()
    {
        $userEmail .= $this->input->post('email');
        $userphone = $this->input->post('phone');
        $resetpasword = $userEmail . $userphone;
        $password =  hash('sha512', $resetpasword);
        $data = array(
            'password' => $password
        );
        $this->db->set($data);
        $this->db->where('useremail', $userEmail);
        $this->db->update("sysFIUsers", $data);
        redirect('user');
    }


    public function adminPasswordReset()
    {
        //role!='SYS ADMIN'
        $textemailaddress = $this->input->post('textemailaddress');
        $query = $this->db->query("select phone,email,fullname from users where email='$textemailaddress' and role='SYS ADMIN' ");
        $user_info = $query->result_array();
        $numberRows = $query->num_rows();
        if ($numberRows > 0) {
            $user_mail = $user_info[0]['email'];
            $user_fullname = $user_info[0]['fullname'];
            $user_phone = $user_info[0]['phone'];
            $newpasswordToken = $user_mail . $user_phone;
            $newPassword = hash('sha512', $newpasswordToken);

            $data = array(
                'password' => $newPassword
            );
            $this->db->set($data);
            $this->db->where('email', $textemailaddress);
            $this->db->update("users", $data);
            $date = date("  l jS \of F Y  h:i:sa   ");

            //require_once('PHPMailer/PHPMailerAutoload.php');
            require_once(APPPATH . 'third_party/PHPMailer/PHPMailerAutoload.php');

            $mail = new PHPMailer();
            $mail->IsSMTP(); // we are going to use SMTP
            $mail->SMTPAuth   = true; // enabled SMTP authentication
            $mail->SMTPSecure = "ssl";  // prefix for secure protocol to connect to the server
            $mail->Host       = "smtp.gmail.com";      // setting GMail as our SMTP server
            $mail->Port       = 465;                   // SMTP port to connect to GMail
            $mail->Username   = "PSKonnectAlert@gmail.com";  // user email address
            $mail->Password   = "0249273086";            // password in GMail
            $mail->SetFrom('PSKonnectAlert@gmail.com', 'PSKonnect');  //Who is sending
            $mail->isHTML(true);
            $mail->Subject    = "PSKonnect Administrator Password Reset ";
            $mail->Body      = "
          <!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">
<html xmlns=\"http://www.w3.org/1999/xhtml\">
    <head>
        <title>Internal_email-29</title>
        <meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />
        <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\" />
        <style type=\"text/css\">
            * {
                -ms-text-size-adjust:100%;
                -webkit-text-size-adjust:none;
                -webkit-text-resize:100%;
                text-resize:100%;
            }
            a{
                outline:none;
                color:#40aceb;
                text-decoration:underline;
            }
            a:hover{text-decoration:none !important;}
            .nav a:hover{text-decoration:underline !important;}
            .title a:hover{text-decoration:underline !important;}
            .title-2 a:hover{text-decoration:underline !important;}
            .btn:hover{opacity:0.8;}
            .btn a:hover{text-decoration:none !important;}
            .btn{
                -webkit-transition:all 0.3s ease;
                -moz-transition:all 0.3s ease;
                -ms-transition:all 0.3s ease;
                transition:all 0.3s ease;
            }
            table td {border-collapse: collapse !important;}
            .ExternalClass, .ExternalClass a, .ExternalClass span, .ExternalClass b, .ExternalClass br, .ExternalClass p, .ExternalClass div{line-height:inherit;}
            @media only screen and (max-width:500px) {
                table[class=\"flexible\"]{width:100% !important;}
                table[class=\"center\"]{
                    float:none !important;
                    margin:0 auto !important;
                }
                *[class=\"hide\"]{
                    display:none !important;
                    width:0 !important;
                    height:0 !important;
                    padding:0 !important;
                    font-size:0 !important;
                    line-height:0 !important;
                }
                td[class=\"img-flex\"] img{
                    width:100% !important;
                    height:auto !important;
                }
                td[class=\"aligncenter\"]{text-align:center !important;}
                th[class=\"flex\"]{
                    display:block !important;
                    width:100% !important;
                }
                td[class=\"wrapper\"]{padding:0 !important;}
                td[class=\"holder\"]{padding:30px 15px 20px !important;}
                td[class=\"nav\"]{
                    padding:20px 0 0 !important;
                    text-align:center !important;
                }
                td[class=\"h-auto\"]{height:auto !important;}
                td[class=\"description\"]{padding:30px 20px !important;}
                td[class=\"i-120\"] img{
                    width:120px !important;
                    height:auto !important;
                }
                td[class=\"footer\"]{padding:5px 20px 20px !important;}
                td[class=\"footer\"] td[class=\"aligncenter\"]{
                    line-height:25px !important;
                    padding:20px 0 0 !important;
                }
                tr[class=\"table-holder\"]{
                    display:table !important;
                    width:100% !important;
                }
                th[class=\"thead\"]{display:table-header-group !important; width:100% !important;}
                th[class=\"tfoot\"]{display:table-footer-group !important; width:100% !important;}
            }
        </style>
    </head>
    <body style=\"margin:0; padding:0;\" bgcolor=\"#eaeced\">
        <table style=\"min-width:320px;\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" bgcolor=\"#eaeced\">
            <!-- fix for gmail -->
            <tr>
                <td class=\"hide\">
                    <table width=\"600\" cellpadding=\"0\" cellspacing=\"0\" style=\"width:600px !important;\">
                        <tr>
                            <td style=\"min-width:600px; font-size:0; line-height:0;\">&nbsp;</td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td class=\"wrapper\" style=\"padding:0 10px;\">
                    <!-- module 1 -->

                    <!-- module 2 -->
                    <table data-module=\"module-2\" data-thumb=\"thumbnails/02.png\" width=\"100%\" cellpadding=\"0\" cellspacing=\"0\">
                        <tr>
                            <td data-bgcolor=\"bg-module\" bgcolor=\"#eaeced\">
                                <table class=\"flexible\" width=\"600\" align=\"center\" style=\"margin:0 auto;\" cellpadding=\"0\" cellspacing=\"0\">
                                    <tr>
                                        <td class=\"img-flex\"><img src=\"http://pskonnect.com/MailAD2.jpg\" style=\"vertical-align:top;\" width=\"600\" height=\"200\" alt=\"\" /></td>
                                    </tr>
                                    <tr>
                                        <td data-bgcolor=\"bg-block\" class=\"holder\" style=\"padding:58px 60px 52px;\" bgcolor=\"#f9f9f9\">
                                            <table width=\"100%\" cellpadding=\"0\" cellspacing=\"0\">
                                                <tr>
                                                    <td data-color=\"title\" data-size=\"size title\" data-min=\"25\" data-max=\"45\" data-link-color=\"link title color\" data-link-style=\"text-decoration:none; color:#292c34;\" class=\"title\" align=\"center\" style=\"font:30px/32px Arial, Helvetica, sans-serif; color:#292c34; padding:0 0 24px;\">
                                                        Password Reset
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td data-color=\"text\" data-size=\"size text\" data-min=\"10\" data-max=\"26\" data-link-color=\"link text color\" data-link-style=\"font-weight:bold; text-decoration:underline; color:#40aceb;\" align=\"center\" style=\"font:bold 15px/25px Arial, Helvetica, sans-serif; color:#888; padding:0 0 23px;text-align:justify\" >
                                                        Hello $user_fullname, <br>
                                                        You have requested to reset your  password  on $date.
                                                        Your new PSKonnect Administrator password is <b> $user_phone </b>                                               
                                                        
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style=\"padding:0 0 20px;\">
                                                        <table width=\"134\" align=\"center\" style=\"margin:0 auto;\" cellpadding=\"0\" cellspacing=\"0\">
                                                            <tr>
                                                                <td data-bgcolor=\"bg-button\" data-size=\"size button\" data-min=\"10\" data-max=\"16\" class=\"btn\" align=\"center\" style=\"font:12px/14px Arial, Helvetica, sans-serif; color:#f8f9fb; text-transform:uppercase; mso-padding-alt:12px 10px 10px; border-radius:2px;\" bgcolor=\"#7bb84f\">
                                                                    <a target=\"_blank\" style=\"text-decoration:none; color:#f8f9fb; display:block; padding:12px 10px 10px;\"
                                                                    href=\"http://pskonnect.com/brainhill/\">CLick To Login </a>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                    
                                </table>
                            </td>
                        </tr>
                    </table>
                    
            <!-- fix for gmail -->
            <tr>
                <td style=\"line-height:0;\"><div style=\"display:none; white-space:nowrap; font:15px/1px courier;\">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div></td>
            </tr>
        </table>
    </body>
</html>
        ";

            $mail->SMTPOptions = array(
                'ssl' => array(
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                )
            );
            $destino = $user_mail; //"emmagbin@yahoo.com"; // Who is addressed the email to
            $mail->addAddress($destino, $user_fullname);


            $result = $mail->Send();
            //$result=1;
        } else {
            $result = 0;
        }


        echo ($result);

        //var_dump($user_phone); die;

    } //




    public function validate_old_password($pass)
    {
        $query = $this->db->query("select logintoken from sysFIUsers where logintoken='$pass' ");
        $result = $query->num_rows();
        if ($result >= 1) {
            return 1;
        } else {
            return 0;
        }
    }
}
