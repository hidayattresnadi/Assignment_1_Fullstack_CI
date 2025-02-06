<?php

use CodeIgniter\Router\RouteCollection;
use App\Controllers\MahasiswaController;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('students', [MahasiswaController::class, 'index']);
$routes->get('student_detail/(:segment)', [MahasiswaController::class, 'detail']);
$routes->get('student_delete/(:num)', 'MahasiswaController::delete/$1');
$routes->get('student_create', [MahasiswaController::class, 'addStudentForm']);
$routes->post('new_student', [MahasiswaController::class, 'create']);
$routes->get('student_edit/(:segment)', [MahasiswaController::class, 'updateStudentForm']);
$routes->post('edited_student/(:segment)', [MahasiswaController::class, 'update']);
