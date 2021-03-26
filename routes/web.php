<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\EmployeeController;

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
    return view('welcome');
});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group(['middleware' => 'auth'], function () {    
    Route::resource('employee', EmployeeController::class);
     // Route::get('/download/{id}', [App\Http\Controllers\EmployeeController::class, 'downloadPDF']);
    Route::get('/helper', [App\Http\Controllers\EmployeeController::class, 'checkHelper']);
    Route::get('/delete/employee/{id}', [App\Http\Controllers\EmployeeController::class, 'destroy'])->name('employee.deleteRec');
    Route::get('/emp/{id}', [App\Http\Controllers\EmployeeController::class, 'getEmployeeById']); 
    Route::post('/empupdate', [App\Http\Controllers\EmployeeController::class, 'updateAddress'])->name('address.update'); 
    // Route::get('/employeedata',[App\Http\Controllers\EmployeeController::class, 'employeeDeatils']);

});
