<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SalaryRangeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('login');
});

Route::controller(AuthController::class)->group(function () {
    Route::get('/login', 'login')->middleware('guest')->name('login');
    Route::post('/login', 'authenticate');
    Route::post('/logout', 'logout')->middleware('auth');
    Route::get('/user-setting', 'userSetting')->middleware('auth')->name('user-setting');
    Route::post('/update-password', 'changePassword')->middleware('auth');
});

Route::get('/dashboard', [DashboardController::class, 'index']);


Route::put('/users/{user}/change-password', [UserController::class, 'changePassword']);

Route::get('/employees/pick-user', [EmployeeController::class, 'pickUser']);
Route::get('/employees/create/{user}', [EmployeeController::class, 'create']);
Route::resource('employees', EmployeeController::class)->except(['create']);

Route::resources([
    'users' => UserController::class,
    'roles' => RoleController::class,
    'departments' => DepartmentController::class,
    'positions' => PositionController::class,
    'levels' => LevelController::class,
    'salary-ranges' => SalaryRangeController::class,
]);