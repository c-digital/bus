<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register routes for your application. These
| routes are loaded by the RoutingServiceProvider. Now create something great!
|
*/

// Home
$route->get('/', [HomeController::class, 'index']);

// Auth
$route->auth();

// Dashboard
$route->get('/dashboard', [DashboardController::class, 'index']);

// Roles
$route->resource('/roles', RoleController::class);

// Companies
$route->resource('/companies', CompanyController::class);

// Branch
$route->resource('/branch', BranchController::class);

// Cities
$route->resource('/cities', CityController::class);

// Routes
$route->resource('/routes', RouteController::class);

// Travels
$route->resource('/travels', TravelController::class);

// Users
$route->resource('/users', UserController::class);
