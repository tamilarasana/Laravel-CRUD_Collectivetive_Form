<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Api Routes
|--------------------------------------------------------------------------
|
| Here is where you can register Api routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your Api!
|
*/


Route::group(['prefix' => 'v1'], function () {
    Route::post('user-login', array('as' => 'login', 'uses' => 'Api\V1\AuthController@login'));
    Route::get('test-api', 'Api\V1\AuthController@testApi');
     Route::post('user-register', 'Api\V1\AuthController@register');
    Route::group(['namespace' => 'Api\V1'], function () { 
        Route::apiResource('department', 'DepartmentController'); 
        Route::apiResource('checklist-category', 'ChecklistCategoryController');  
        Route::apiResource('category-list', 'CategoryListController'); 
        Route::apiResource('project', 'ProjectController');
        Route::post('project/{id}', 'ProjectController@update');

    });
 

});