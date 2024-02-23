<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');


// CRUD Routes (student)
$routes->get('student', 'Student::index');
$routes->post('student/store', 'Student::store');
$routes->get('student/edit/(:num)', 'Student::edit/$1');
$routes->get('student/delete/(:num)', 'Student::delete/$1');
$routes->get('student/view/(:num)', 'Student::view/$1');
$routes->post('student/update', 'Student::update');
// CRUD Routes (Grades)
$routes->get('student/viewGrades/(:num)', 'Student::viewGrades/$1');
$routes->post('student/storeGrades', 'Student::storeGrades');
$routes->get('student/editGrades/(:num)', 'Student::editGrades/$1');
$routes->get('student/deleteGrades/(:num)', 'Student::deleteGrades/$1');
$routes->post('student/updateGrades/(:num)', 'Student::updateGrades/$1');

// CRUD ROUTES (subject)
$routes->get('subject', 'subject::index');



// Grades Routes
$routes->get('grades', 'grade::index');



