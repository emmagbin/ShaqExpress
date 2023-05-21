<?php
defined('BASEPATH') or exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
| my-controller/my-method	-> my_controller/my_method
*/
//$route['default_controller'] = 'Website_controller/login';


// =================
$route['default_controller'] = 'login_controller/index';
$route['forgotpassword'] = 'login_controller/forgotpassword';
$route['login'] = 'login_controller/index';


$route['verifying'] = 'VerifyLogin/index';




// dashboard urls

$route['dashboard'] = 'Dashboard_controller/index';
$route['index2'] = 'Dashboard_controller/index2';


// operations management
$route['operations'] = 'operations_controller/index';

$route['createorder'] = 'operations_controller/createorder';
$route['confirmdelivery'] = 'operations_controller/confirmdelivery';
$route['updateorder'] = 'operations_controller/updateorder';







// users urls
$route['users'] = 'users_controller/index';


$route['createstaff'] = 'users_controller/createstaff';


//role managment urls
$route['roles'] = 'role_controller/index';

// fleets management urls
$route['fleet'] = 'Fleet_controller/index';

// fleet expenses

$route['fleetexpenses'] = 'Fleet_expenses_controller/index';

$route['fleetexpensestype'] = 'Fleet_expenses_controller/fleetexpensestype';



// Fleetcategory_Controller urls
$route['fleetcategory'] = 'Fleetcategory_Controller/index';

$route['fleetdoctype'] = 'fleetdoctype_controller/index';


$route['fleetdoc'] = 'fleetdoc_controller/index';

$route['link'] = 'link_controller/index';






// fleet drivers urls

$route['drivers'] = 'Drivers_Controller/index';

// compnay information url

$route['settings'] = 'settingsController/index';


$route['expenses'] = 'Report_Controller/expenses';
$route['income'] = 'Report_Controller/income';
$route['invoice'] = 'Report_Controller/invoice';

$route['invoiceView'] = 'Report_Controller/invoiceView';

$route['estimates'] = 'Accounts_controller/estimates';
$route['Ainvoices'] = 'Accounts_controller/invoices';
$route['Aexpenses'] = 'Accounts_controller/expenses';
$route['payments'] = 'Accounts_controller/payments';

$route['createEstimate'] = 'Accounts_controller/createEstimate';

$route['editEstimate'] = 'Accounts_controller/EditEstimate';
$route['AEstimate'] = 'Accounts_controller/AEstimate';

$route['Ainvoiceview'] = 'Accounts_controller/invoiceview';
$route['createinvoice'] = 'Accounts_controller/createinvoice';
$route['editinvoice'] = 'Accounts_controller/editinvoice';


$route['profile'] = 'settingsController/profile';
$route['changepassword'] = 'users_controller/changepassword';



























$route['Web/index'] = 'Website_controller/index';
$route['Web/jobs'] = 'Website_controller/jobs';
$route['Web/Jobs/advanceSearch'] = "Website_controller/advancejobsearch";

$route['Web/job_details'] = 'Website_controller/job_details';
$route['Web/Job/(:num)'] = "Website_controller/job_details";
$route['Web/services'] = 'Website_controller/service';
$route['Web/about'] = 'Website_controller/about';
$route['Web/contact'] = 'Website_controller/contact';









$route['register'] = 'Website_controller/register';
$route['forgetpassword'] = 'Website_controller/forgetpassword';

// $route['login'] = 'Website_controller/login';

// the dashboard route ======================================================================

// $route['jobs'] = 'JobsPortal_Controller/jobs';
$route['jobadd'] = 'JobsPortal_Controller/jobadd';

$route['editJobVacancy'] = 'JobsPortal_Controller/editJobVacancy';

$route['logout'] = 'login_controller/logout';

$route['applicants'] = 'JobsPortal_Controller/applicants';




// job location routes
$route['location'] = 'JobLocationController/index';
$route['updatejoblocation'] = 'JobLocationController/update_jobLocation';
$route['locationadd'] = 'JobLocationController/locationadd';
$route['locationedit'] = 'JobLocationController/locationedit';


$route['industry'] = 'JobIndustryController/index';
$route['industryadd'] = 'JobIndustryController/industryadd';

$route['addindustry'] = 'JobIndustryController/addindustry';

$route['signups'] = 'Signups_Controller/index';

// $route['profile'] = 'dashboard_controller/profile';




// ===========




// $route['Web/jobs'] = 'Website_controller/jobs';
// $route['Web/Jobs/advanceSearch'] = "Website_controller/advancejobsearch";

// $route['Web/job_details'] = 'Website_controller/job_details';
// $route['Web/Job/(:num)'] = "Website_controller/job_details";
// $route['Web/services'] = 'Website_controller/service';
// $route['Web/about'] = 'Website_controller/about';
// $route['Web/contact'] = 'Website_controller/contact';


// LOGIN AND LOGOUT
//$route['login'] = 'login_controller';
//$route['logout'] = 'login_controller/logout';


$route['WebsiteControl'] = 'Website_controller/WebsiteControl';
//$route['default_controller'] = 'login_controller';
// $route['login'] = 'login_controller';

$route['home'] = 'admin_controller/index';
// $route['profile'] = 'Jobseeker_Controller/profile';
$route['updateProfilePic'] = 'Jobseeker_Controller/updateProfilePic';
$route['updateProfile'] = 'Jobseeker_Controller/updateProfile';
$route['updateProfileAccount'] = 'Jobseeker_Controller/updateProfileAccount';
$route['updateProfileWork'] = 'Jobseeker_Controller/updateProfileWork';

$route['aprofile'] = 'Jobseeker_Controller/aprofile';





$route['profileoverview'] = 'admin_controller/profileoverview';
$route['personalinformation'] = 'admin_controller/personalinformation';
$route['accountinformation'] = 'admin_controller/accountinformation';
$route['notificationSettings'] = 'admin_controller/notificationSettings';



$route['email'] = 'staff_controller/sendMail';




//$route['applicants'] = 'JobsPortal_Controller/applicants';
$route['deleteapplication'] = 'JobsPortal_Controller/deleteapplication';





$route['job'] = 'JobsPortal_Controller/jobs';

$route['(:num)'] = 'JobsPortal_Controller/jobdetails';
$route['jobs'] = 'JobsPortal_Controller/job';
$route['jobdetails/(:num)'] = "JobsPortal_Controller/jobdetails";

$route['savedJobs'] = 'Jobseeker_Controller/savedJobs';


$route['applications'] = 'Jobseeker_Controller/applications';
$route['notifications'] = 'admin_controller/notifications';
//$route['savedjobs'] = 'admin_controller/savedjobs';

//$route['mypdf/(:num)'] = 'admin_controller/pdf';
$route['applicant/(:any)'] = "admin_controller/pdf";

$route['EditClientInfo'] = 'dashboard_controller/EditClientInfo';


$route['transfer'] = 'dashboard_controller/transfer';




$route['send_mail'] = 'admin_controller/send_mail'; //data utilities
//$route['transaction'] = 'OrganisationUtilities/index';


$route['positions'] = 'JobsPortal_Controller/positions';
$route['update_post'] = 'JobsPortal_Controller/update_post';
$route['disable_post'] = 'JobsPortal_Controller/disable_post';
$route['activate_post'] = 'JobsPortal_Controller/activate_post';
$route['delete_post'] = 'JobsPortal_Controller/delete_post';



//add new staff member
$route['staff'] = 'staff_controller/index';

$route['addmember'] = 'staff_controller/addmember';


$route['editstaff'] = 'staff_controller/staffedit';





$route['editmember'] = 'staff_controller/editmember';
$route['disable_member'] = 'staff_controller/disable_member';
$route['activate_member'] = 'staff_controller/activate_member';
$route['delete_member'] = 'staff_controller/delete_member';


// $route['signups'] = 'Signups_Controller/index';
$route['disable_jobseeker'] = 'Signups_Controller/disable_jobseeker';
$route['activate_jobseeker'] = 'Signups_Controller/activate_jobseeker';
$route['delete_jobseeker'] = 'Signups_Controller/delete_jobseeker';


$route['jobIndustries'] = 'JobsPortal_Controller/jobIndustries';
$route['updatejobcategory'] = 'JobsPortal_Controller/update_jobcategory';
$route['disablejobcategory'] = 'JobsPortal_Controller/disable_jobcategory';
$route['activatejobcategory'] = 'JobsPortal_Controller/activate_jobcategory';
$route['deletejobcategory'] = 'JobsPortal_Controller/delete_jobcategory';


$route['addlocation'] = 'JobsPortal_Controller/addlocation';


$route['jobLocation'] = 'JobsPortal_Controller/jobLocation';

$route['disablejoblocation'] = 'JobsPortal_Controller/disable_jobLocation';
$route['activatejoblocation'] = 'JobsPortal_Controller/activate_jobLocation';
$route['deletejoblocation'] = 'JobsPortal_Controller/delete_jobLocation';










$route['roleadd'] = 'settingsController/roleadd';
$route['roleedit'] = 'settingsController/roleedit';

$route['roleedit/(:any)'] = 'settingsController/roleedit';


// $route['roleedit/:id'] = 'settingsController/roleedit';

$route['roleassign'] = 'settingsController/roleassign';

$route['companyinfocreate'] = 'settingsController/companyinfocreate';

$route['companyrepcreate'] = 'settingsController/companyrepcreate';







$route['acountDetail'] = 'acountDetailController/index';

$route['transaction'] = 'transactionController/index';
//data utilities
$route['FI'] = 'FIS/index';
$route['onboarding'] = 'FIOnboarding/index';














$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
