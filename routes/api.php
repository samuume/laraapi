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
Route::get('/', 'FrontController@index');
Route::get('/products', 'FrontController@products');
Route::get('/products/details/{id}', 'FrontController@product_details');
Route::get('/products/categories/{name}', 'FrontController@product_categories');
Route::get('/products/brands/{name}/{category?}', 'FrontController@product_brands');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/api/v1/products/{id?}', function($id = null) {
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

Route::get('/api/v1/categories/{id?}', function($id = null) {
    if ($id == null) {
        $categories = App\Category::all(array('id', 'name'));
    } else {
        $categories = App\Category::find($id, array('id', 'name'));
    }
    return Response::json(array(
        'error' => false,
        'user' => $categories,
        'status_code' => 200
    ));
});
