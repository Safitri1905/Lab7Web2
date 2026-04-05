<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Route Home & Halaman Statis
$routes->get('/', 'Home::index');
$routes->get('/about', 'Page::about');
$routes->get('/contact', 'Page::contact');
$routes->get('/faqs', 'Page::faqs');
$routes->get('page/tos', 'Page::tos');

// Route Artikel Publik
$routes->get('/artikel', 'Artikel::index');
$routes->get('/artikel/(:any)', 'Artikel::view/$1');

// Route Login & Logout
$routes->get('/user/login', 'User::login');
$routes->post('/user/login', 'User::login');
$routes->get('/user/logout', 'User::logout');

// Route Admin Artikel (setelah login)
$routes->get('/admin/artikel', 'Artikel::admin_index', ['filter' => 'auth']);
$routes->get('/admin/artikel/add', 'Artikel::add', ['filter' => 'auth']);
$routes->post('/admin/artikel/add', 'Artikel::add', ['filter' => 'auth']);
$routes->get('/admin/artikel/edit/(:any)', 'Artikel::edit/$1', ['filter' => 'auth']);
$routes->post('/admin/artikel/edit/(:any)', 'Artikel::edit/$1', ['filter' => 'auth']);
$routes->get('/admin/artikel/delete/(:any)', 'Artikel::delete/$1', ['filter' => 'auth']);