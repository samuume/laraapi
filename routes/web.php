<?php

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
Route::get('/', 'FrontController@index');
Route::get('/products', 'FrontController@products');
Route::get('/products/details/{id}', 'FrontController@product_details');
Route::get('/products/categories/{name}', 'FrontController@product_categories');
Route::get('/products/brands/{name}/{category?}', 'FrontController@product_brands');
Route::get('/blog', 'FrontController@blog');
Route::get('/blog/post/{id}', 'FrontController@blog_post');
Route::get('/contact_us', 'FrontController@contact_us');

Route::get('/login', 'FrontController@login');
Route::get('logout', 'FrontController@logout');
// Authentication routes
Route::get('auth/login', 'FrontController@login');
Route::post('auth/login', 'FrontController@authenticate');
Route::get('auth/logout', 'FrontController@logout');
//Registration routes
Route::post('/register', 'FrontController@register');

Route::get('/search/{query}', 'FrontController@search');

Route::get('/cart', 'FrontController@cart');
Route::post('/cart', 'FrontController@cart');
Route::get('/checkout', 'FrontController@checkout');

Route::get('blade', function() {
  $drinks = array('Vodka', 'Gin', 'Brandy');
  return view('page', array('name' => 'The Raven', 'day' => 'Friday', 'drinks' => $drinks));
});

Route::get('/readBrand', function() {
  $brand = new App\Brand();

  $data = $brand->all(array('name', 'id'));

  foreach ($data as $list) {
    echo $list->id . ' ' . $list->name . '<br>';
  }
});

Route::get('/readEmployee', function() {
  $employee = new App\Employee();

  $data = $employee->all(array('gender', 'contact_number', 'email', 'name', 'id'));

  foreach ($data as $list) {
    echo $list->id . ' ' . $list->name . ', ' . $list->email . ', ' . $list->contact_number . ', ' . $list->gender . '<br>';
  }
});

Route::get('/insertCategory', function() {
  App\Category::create(array('name' => 'Accessories'));
  return 'Category added';
});

Route::get('/readCategory', function() {
  $category = new App\Category();

  $data = $category->all(array('name', 'id'));

  foreach ($data as $list) {
    echo $list->id . ' ' . $list->name . '<br>';
  }
});

Route::get('/updateCategory', function() {
  $category = App\Category::find(6);
  $category->name = 'Clothing Accessories';
  $category->save();

  $data = $category->all(array('name', 'id'));

  foreach ($data as $list) {
    echo $list->id . ' ' . $list->name . '<br>';
  }
});

Route::get('/deleteCategory', function() {
  $category = App\Category::find(7);
  $category->delete();

  $data->$category->all(array('name', 'id'));

  foreach ($data as $list) {
    echo $list->id . ' ' . $list->name . '<br>';
  }
});

Route::get('/raw', function () {
    $sql = "INSERT INTO categories (name) VALUES ('POMBE')";

    DB::statement($sql);
    $results = DB::select(DB::raw("SELECT * FROM categories"));

    print_r($results);
}
);
