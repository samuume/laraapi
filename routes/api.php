<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/v1/products/{id?}', function($id = null) {
    if ($id == null) {
        $products = App\Product::all(array('id', 'name', 'price'));
    } else {
        $products = App\Product::find($id, array('id', 'name', 'price'));
    }
    return Response::json(array(
        'error' => false,
        'products' => $products,
        'status_code' => 200
    ));
});

Route::get('/v1/categories/{id?}', function($id = null) {
    if ($id == null) {
        $categories = App\Category::all(array('id', 'name'));
    } else {
        $categories = App\Category::find($id, array('id', 'name'));
    }
    return Response::json(array(
        'error' => false,
        'categories' => $categories,
        'status_code' => 200
    ));
});

/*Route::get('/v1/employees/{id?}', function($id = null) {
    if ($id == null) {
        $employees = App\Employee::all(array('id', 'name', 'email', 'contact_number', 'gender'));
    } else {
        $employees = App\Employee::find($id, array('id', 'name', 'email', 'contact_number', 'gender'));
    }
    return Response::json(array(
        'error' => false,
        'employees' => $employees,
        'status_code' => 200
    ));
});*/

Route::group(['prefix' => 'depts'], function() {
    Route::get('/', 'DeptController@index');
    Route::get('/{id}', 'DeptController@show');
});

Route::group(['prefix' => 'employees'], function() {
    Route::get('/', 'EmployeeController@index');
    Route::get('/{id}', 'EmployeeController@show');
});

//Route::resource('/v1/depts/{id}', 'DeptController');
