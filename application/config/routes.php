<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// Result View 
// Admin Login
// Result Entry
// Result Check by Admin

// Result Update
$route['result-update'] = 'result_update';
$route['check-result-update'] = 'result_update/check_result';
$route['set_update_result'] = 'result_update/set_update_result';



$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


$route['get_result'] = 'Welcome/std_result';
$route['admin'] = 'Login';


$route['authentication'] = 'Login/check_validity';
$route['dashboard'] = 'Login/user_login';


// $route['result-entry'] = 'result_entry';
$route['check-student'] = 'result_entry';
$route['checking'] = 'result_entry/check_status';

$route['resultInput'] = 'result_entry/std_result_entry';
$route['newResultInput'] = 'result_entry/new_result_entry';

$route['check-result'] = 'check_result';
$route['check_result_update'] = 'check_result/find_result';

// insert new student for temporary
$route['insert-student'] = 'insert_new_student';
$route['studentInput'] = 'insert_new_student/insert';

// logout
$route['logout'] = 'Login/logout';

