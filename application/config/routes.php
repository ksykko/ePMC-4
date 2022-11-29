<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$route['my-calendar'] = "Admin_schedule";
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
|	https://codeigniter.com/userguide3/general/routing.html
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
|		my-controller/my-method	-> my_controller/my_method
*/

$route['default_controller'] = 'Web';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

//Schedule Routes
$route['schedule'] = 'Admin_schedule/schedule';
$route['addSchedule'] = 'Admin_schedule/addSchedule';

//Mobile Routes
$route['login_mobile'] = 'api/Login_mobile/validation';
$route['adm_dashboard_total'] = 'api/Admin_dashboard/total';
$route['adm_dashboard_recent'] = 'api/Admin_dashboard/recent';
$route['adm_patientrec_total'] = 'api/Admin_patientrec_mobile/total';
$route['adm_patientrec_patients'] = 'api/Admin_patientrec_mobile/patients';
$route['adm_patientrec_view'] = 'api/Admin_patientrec_mobile/admin_viewpatients';
$route['adm_reports_stockin'] = 'api/Admin_reports_mobile/stockin';
$route['adm_reports_stockout'] = 'api/Admin_reports_mobile/stockout';
$route['adm_insert_patient'] = 'api/Admin_reports_mobile/ins_patient';
$route['adm_delete_patient'] = 'api/Admin_reports_mobile/del_patient';
$route['doc_reports_age_range'] = 'api/Admin_reports_mobile/age_range';
$route['doc_reports_bmi'] = 'api/Admin_reports_mobile/bmi';
$route['adm_Monsched'] = 'api/Admin_schedule/mon_schedData';
$route['adm_Tuesched'] = 'api/Admin_schedule/tue_schedData';
$route['adm_Wedsched'] = 'api/Admin_schedule/wed_schedData';
$route['adm_Thursched'] = 'api/Admin_schedule/thu_schedData';
$route['adm_Frisched'] = 'api/Admin_schedule/fri_schedData';
$route['adm_Satsched'] = 'api/Admin_schedule/sat_schedData';
$route['register_mobile'] = 'api/Register_mobile/register';