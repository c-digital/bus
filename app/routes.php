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

// Users
$route->resource('/users', UserController::class);
$route->get('/users/extra/{role}', [UserController::class, 'extra']);

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

// Bus type
$route->resource('/bus-type', BusTypeController::class);

// Vehicle
$route->resource('/vehicle', VehicleController::class);

// Customers
$route->resource('/customers', CustomerController::class);
$route->post('/customers/info', [CustomerController::class, 'info']);

// Assign
$route->resource('/assign', AssignController::class);

// Drivers
$route->resource('/drivers', DriverController::class);

// Tickets
$route->resource('/tickets', TicketController::class);
$route->match(['post', 'get'], '/tickets/print', [TicketController::class, 'print']);
$route->get('/tickets/list/{id}', [TicketController::class, 'list']);

// Cash
$route->resource('/cash', CashController::class);

// Payments
$route->resource('/payments', PaymentController::class);

$route->get('/reports/cash', [ReportController::class, 'cash']);
$route->get('/reports/sales', [ReportController::class, 'sales']);
$route->get('/reports/passengers', [ReportController::class, 'passengers']);

$route->get('/reports/print', [ReportController::class, 'print']);
