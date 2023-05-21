
<?php
defined('BASEPATH') or exit('No direct script access allowed');

//This is the Controller for codeigniter crud using ajax application.
class admin_controller extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('User');
        //$this->load->model('Service_Category_Model');
    }

    public function index11()
    {

        $page['page'] = 'index';
        $this->load->view('admin/' . $page['page']);
    }


    public function lockuser($userid)
    {
        $data = array(
            'isLogin' => 1
        );
        $this->db->set($data);
        $this->db->where('id', $userid);
        $this->db->update("login", $data);
    }

    public function all_jobs()
    {
        $query = $this->db->query("select jobdetial.*, staff.lastname,staff.firstname,staff.othername,
    joblocation.locationname,jobcategory.categoryname from jobdetial inner join staff on 
    jobdetial.createby=staff.login_id inner join joblocation on joblocation.id=jobdetial.joblocation 
    inner join jobcategory on jobcategory.id=jobdetial.JobCategory where jobdetial.status!=2
        LIMIT 5");

        $joblocations = $query->result();
        return $joblocations;
    }


    public function index()
    {
        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $users['id'] = $session_data['id'];
            $users['email'] = $session_data['email'];
            //var_dump($users['email']); die;
            $users['role'] = $session_data['role'];

            if ($users['email'] !== 'admin@gmail.com') {

                // $user['Systemuser'] = $session_data['Systemuser'];
                // $myname=$user['Systemuser']['0']["fullname"];
                // $users['Systemuser'] =$myname;

                // $user['Systemuserphoto'] = $session_data['Systemuserphoto'];
                //  $myphoto=$user['Systemuserphoto'];
                // $users['Systemuserphoto'] =$myphoto;


                $user['Systemuser'] = $session_data['Systemuser'];
                $myname = $user['Systemuser']['0']["fullname"];
                $users['Systemuser'] = $myname;
                $user['Systemuserphoto'] = $session_data['Systemuserphoto'];
                $myphoto = $user['Systemuserphoto'];
                $users['Systemuserphoto'] = $myphoto;
            } else {
                $users['Systemuser'] = 'System Administrator';
                $users['Systemuserphoto'] = 0;
            }





            $data = array(
                'isLogin' => 1
            );

            $this->db->set($data);
            $this->db->where('id', $users['id']);
            $this->db->update("login", $data);



            $userid = $session_data['id'];
            $users['positions'] = $this->all_jobs();

            //$users['adminjobview']=$this->all_jobs();





            $male = 'Male';
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
            $results = $query->result();
            $users['admindashboard'] = $results;
            //var_dump($results); die;
            //             $users['totalMales']=$results->totalMales;
            //                   $users['totalFemales']=$results->totalFemales;
            //                         $users['totalActive']=$results->totalActive;
            //                               $users['totalNotActive']=$results->totalNotActive;

            $query = $this->db->query(" select
(SELECT   count(*) FROM jobapplications WHERE jobseeker_id='$userid') as totalJobsappliedfor ");
            $results = $query->row();
            $users['totalJobsappliedfor'] = $results->totalJobsappliedfor;


            $page['page'] = 'index';
            // $this->load->view('users', $users);
            $this->load->view('admin/' . $page['page'], $users);
        } else {
            //If no session, redirect to login page
            redirect('login', 'refresh');
        }
    }



    public function profileoverview()
    {
        $page['page'] = 'profileoverview';
        $this->load->view('admin/' . $page['page']);
    }

    public function personalinformation()
    {
        $page['page'] = 'personalinformation';
        $this->load->view('admin/' . $page['page']);
    }

    public function accountinformation()
    {
        $page['page'] = 'accountinformation';
        $this->load->view('admin/' . $page['page']);
    }

    public function changepassword()
    {
        $page['page'] = 'changepassword';
        $this->load->view('admin/' . $page['page']);
    }

    public function notificationSettings()
    {
        $page['page'] = 'notificationSettings';
        $this->load->view('admin/' . $page['page']);
    }

















    public function notifications()
    {

        if ($this->session->userdata('logged_in')) {

            $session_data = $this->session->userdata('logged_in');
            $notifications['id'] = $session_data['id'];
            $notifications['email'] = $session_data['email'];
            $notifications['role'] = $session_data['role'];

            $user['Systemuser'] = $session_data['Systemuser'];
            $myname = $user['Systemuser']['0']["fullname"];
            $notifications['Systemuser'] = $myname;

            $user['Systemuserphoto'] = $session_data['Systemuserphoto'];
            $myphoto = $user['Systemuserphoto']['0']["photo"];
            $notifications['Systemuserphoto'] = $myphoto;




            // $notifications['locations']=$this->all_joblocations();
            // var_dump($joblocations['id']); die;
            $page['page'] = 'notifications';
            $this->load->view('admin/' . $page['page'], $notifications);
        } else {
            //If no session, redirect to login page
            redirect('login', 'refresh');
        }


        //emmagbin@yahoo.comfb86o
    }
    public function savedjobs()
    {




        if ($this->session->userdata('logged_in')) {

            $session_data = $this->session->userdata('logged_in');
            $savedjobs['id'] = $session_data['id'];
            $savedjobs['email'] = $session_data['email'];
            $savedjobs['role'] = $session_data['role'];

            $user['Systemuser'] = $session_data['Systemuser'];
            $myname = $user['Systemuser']['0']["fullname"];
            $savedjobs['Systemuser'] = $myname;

            // $notifications['locations']=$this->all_joblocations();
            // var_dump($joblocations['id']); die;
            $page['page'] = 'savedjobs';
            $this->load->view('admin/' . $page['page'], $savedjobs);
        } else {
            //If no session, redirect to login page
            redirect('login', 'refresh');
        }
    }









    public function pdf()
    {

        $fname = $this->uri->segment(2);
        $tofile = realpath("assets/cvs/" . $fname . ".pdf");
        header('Content-Type: application/pdf');
        readfile($tofile);
    }


    public function checkpdf()
    {

        $fname = $this->input->post('client');
        $tofile = realpath("assets/cvs/" . $fname . ".pdf");
        header('Content-Type: application/pdf');
        readfile($tofile);
    }



    public function Resetpassword()
    {
        $email = trim($this->input->post('resetemail'));
        $query = $this->db->query("select * from login where email='$email' ");
        $result = $query->num_rows();
        if ($result == 1) {
            $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $password = substr(str_shuffle($permitted_chars), 0, 5);


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
            $mail->Subject    = "Firm Achor Consult Reset Login Password";
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
                                                                    <strong>EMAIL: <a href='#' target='_blank' class='link' style='color:#a88123; text-decoration:none'><span class='link' style='color:#a88123; text-decoration:none'>" . $email . "</span></a></strong>
                                                                </div>
                                                                <div class='h4-center' style='color:#1e1e1e; font-family:Arial, sans-serif; min-width:auto !important; font-size:18px; line-height:24px; text-align:center'>
                                                                    <strong>PASSWORD: <a href='#' target='_blank' class='link' style='color:#a88123; text-decoration:none'><span class='link' style='color:#a88123; text-decoration:none'>" . $password . "</span></a></strong>
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
            $destino = $email; // Who is addressed the email to
            $mail->AddAddress($destino, $email);
            if (!$mail->Send()) {
                $return = "Password reset Failed Try Again After Some time";
                echo ($return);
            } else {
                $return = "Password reset Completed Please Check Your mail For New Password";
                // $notification=array(
                //                  'message'=>$return
                //                  'alert-type'=>'success'
                //                );
                //                $this->session->set_flashdata($notification);
                // redirect('login');

                echo ($return);
            }



            // $passwordCombination = $usermail . $this->input->post('role');
            //  $pass = hash('sha512', $passwordCombination);




        } else {
            echo "Email Address Does Not Exist In Firm Achor System";
        }
    }









    public function send_mail()
    {
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
        $mail->Subject    = "Mail Subject";
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
                                                                    <strong>EMAIL: <a href='#' target='_blank' class='link' style='color:#a88123; text-decoration:none'><span class='link' style='color:#a88123; text-decoration:none'>emmagbin@gmail.com</span></a></strong>
                                                                </div>
                                                                <div class='h4-center' style='color:#1e1e1e; font-family:Arial, sans-serif; min-width:auto !important; font-size:18px; line-height:24px; text-align:center'>
                                                                    <strong>PASSWORD: <a href='#' target='_blank' class='link' style='color:#a88123; text-decoration:none'><span class='link' style='color:#a88123; text-decoration:none'>4562789498</span></a></strong>
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
        $destino = "obed4rynar@gmail.com"; // Who is addressed the email to
        $mail->AddAddress($destino, "Receiver");
        if (!$mail->Send()) {
            var_dump("false");
            die;
        } else {
            // return true;
            var_dump("true");
            die;
        }
    }
}


// 2) Go to https://www.google.com/settings/security/lesssecureapps