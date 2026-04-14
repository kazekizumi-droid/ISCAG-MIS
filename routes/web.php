<?php

/**
 * Route Definitions
 *
 * Format: 'URI' => ['ControllerClass', 'method']
 *
 * The router will match the REQUEST_URI against these keys,
 * require the controller file, instantiate the class, and call the method.
 */

$routes = [
    // Public pages
    '/'                 => ['HomeController',  'index'],

    // Authentication
    '/login'            => ['AuthController',  'login'],
    '/register'         => ['AuthController',  'register'],
    '/forgot-password'  => ['AuthController',  'forgotPassword'],
    '/verify-otp'       => ['AuthController',  'verifyOtp'],
    '/reset-password'   => ['AuthController',  'resetPassword'],

    // Admin
    '/admin/dashboard'  => ['AdminController', 'dashboard'],

    // User
    '/user/dashboard'   => ['UserController',  'dashboard'],
    '/user/profile'     => ['UserController',  'profile'],
    '/user/profile/update' => ['UserController', 'updateProfile'],
    '/user/notifications' => ['UserController', 'notifications'],
    '/logout'           => ['AuthController', 'logout'],

    // User Apartment Module
    '/user/apartment/apply'  => ['ApartmentController', 'apply'],
    '/user/apartment/status' => ['ApartmentController', 'status'],
    '/user/apartment/info'   => ['ApartmentController', 'info'],
    '/user/apartment/save'   => ['ApartmentController', 'save'],
    '/user/apartment/upload' => ['ApartmentController', 'handleUpload'],
    '/user/apartment/image'  => ['ApartmentController', 'serveImage'],

    // Service Modules (New)
    '/admin/apartment'  => ['AdminController', 'apartment'],
    '/admin/payment'    => ['AdminController', 'payment'],
];
