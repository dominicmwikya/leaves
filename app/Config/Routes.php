<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
// $routes->setDefaultController('Home');
// $routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
//$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'AdminController::index',['filter'=>'auth']);
$routes->get('/admin', 'AdminController::admindashboard',['filter'=>'auth']);
$routes->get('/employee','AdminController::employeeDashboard',['filter'=>'auth']);
$routes->get('/employees','AdminController::employees',['filter'=>'auth']);
$routes->get('/leaves-employee','AdminController::employeeLeaves',['filter'=>'auth']);
$routes->get('/departments','AdminController::departments',['filter'=>'auth']);


$routes->post('/employeecreate','AdminController::create_employee',['filter'=>'auth']);
$routes->get('fetch-employees','AdminController::fetch_employees',['filter'=>'auth']);
$routes->get('employee-edit','AdminController::emp_edit',['filter'=>'auth']);
$routes->post('employee-delete','AdminController::emp_delete',['filter'=>'auth']);
$routes->post('status-update','AdminController::change_status');


$routes->post('leave-apply','AdminController::leave_application',['filter'=>'auth']);
$routes->get('category-data','AdminController::category_data',['filter'=>'auth']);
$routes->get('leave-category', 'AdminController::fetch_leave_categories');
$routes->post('employee-update','AdminController::update_employee',['filter'=>'auth']);
$routes->post('category-create', 'AdminController::leave_category',['filter'=>'auth']);
$routes->get('employee-summary','AdminController::fetch_emp_leave_record',['filter'=>'auth']);
// $routes->get('count','AdminController::countEmployees');
// $routes->post('/leave/apply','AdminController::leave_application');


$routes->get('/login','UserController::login');
$routes->post('user/login','UserController::login_user');
$routes->get('user/logout', 'UserController::logout');


$routes->post('department-add', 'AdminController::create_department',['filter'=>'auth']);
$routes->post('role-create','AdminController::create_user_role');


/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
