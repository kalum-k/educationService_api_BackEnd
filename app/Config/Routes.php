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
$routes->setDefaultController('Student');
$routes->setDefaultController('EducationStudent');
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
$routes->get('/students', 'student::getAllStudent');
$routes->get('/students/(:num)', 'student::getStudent/$1');
$routes->post('/students', 'student::addStudent');
$routes->put('/students/(:num)', 'student::updateProfileStudent/$1');

$routes->get('/EducationStudent', 'EducationStudent::getAllEducation');
$routes->get('/EducationStudent/(:num)', 'EducationStudent::getEducation/$1');
$routes->post('/EducationStudent', 'EducationStudent::addEducationStudent');
$routes->put('/EducationStudent/(:num)', 'EducationStudent::updateEducationStudent/$1');

$routes->post("/Login", "Login::index");

//Education
$routes->post('/createEducation','Education::createEducation');
$routes->put('/updateEducation/(:num)', 'Education::updateEducation/$1');
$routes->delete('/deleteEducation/(:num)','Education::deletedEducation/$1');
$routes->get('/getEducation','Education::getEducation');
$routes->get('/Education/(:num)','Education::getEducationById/$1');

//EducationDetail
$routes->get('/eduDetail', 'eduDetail::index');
$routes->post('/createEduDetail','eduDetail::createEduDetail');
$routes->put('/updateEduDetail/(:num)', 'Education::updateEduDetail/$1');
$routes->get('/getEduDetail','eduDetail::getEduDetail');

//Condition
$routes->post('/createEduCondition','EduCondition::createEduCondition');
$routes->put('/updateEduCondition/(:num)', 'EduCondition::updateEduCondition/$1');



$routes->get('/products', 'product::create');
$routes->put('/products/(:num)', 'product::update/$1');
$routes->delete('/products/(:num)', 'product::deleted/$1');

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
