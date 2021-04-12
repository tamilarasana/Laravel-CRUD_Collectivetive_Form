<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;

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
    Route::get('/employeedata',[App\Http\Controllers\EmployeeController::class, 'employeeDeatils']);

    Route::get('/addNewbook',[App\Http\Controllers\BookController::class, 'addNewBook']);
    Route::post('/storebook', [App\Http\Controllers\BookController::class, 'storeBook'])->name('storeBook');
    Route::get('/viewbook',[App\Http\Controllers\BookController::class, 'viewBook']);
    Route::get('/delete/book/{id}',[App\Http\Controllers\BookController::class, 'destroy'])->name('book.delete');
    Route::get('/edit/book/{id}',[App\Http\Controllers\BookController::class, 'editBook'])->name('book.edit');
    Route::post('/update/book',[App\Http\Controllers\BookController::class, 'update'])->name('book.update');   

});
