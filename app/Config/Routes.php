<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('University');
$routes->setDefaultController('Faculty');
$routes->setDefaultController('GroupMajor');
$routes->setDefaultController('Degree');
$routes->setDefaultController('Course');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

//University
$routes->get('/university', 'University::index');
$routes->post('/university', 'University::createUniversity');
$routes->put('/university/(:num)', 'University::updateUniversity/$1');
//$routes->get('/university/(:text)', 'University::searchUniversity/$keyword');

//Faculty
$routes->get('/faculty', 'Faculty::index');
$routes->post('/faculty', 'Faculty::createFaculty');
$routes->put('/faculty/(:num)', 'Faculty::updateFaculty/$1');

//Group Major
$routes->get('/groupmajor', 'GroupMajor::index');
$routes->post('/groupmajor', 'GroupMajor::createGroupMajor');
$routes->put('/groupmajor/(:num)', 'GroupMajor::updateGroupMajor/$1');

//Degree
$routes->get('/degree', 'Degree::index');
$routes->post('/degree', 'Degree::createDegree');
$routes->put('/degree/(:num)', 'Degree::updateDegree/$1');

//Course
$routes->get('/course', 'Course::index');
$routes->post('/course', 'Course::createCourse');
$routes->put('/course/(:num)', 'Course::updateCourse/$1');


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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
