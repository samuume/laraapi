<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\Brand;
use App\Employee;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Cart;

class FrontController extends Controller
{

    var $categories;
    var $products;

    public function __construct() {
      $this->categories = Category::all(array('name'));
      $this->products = Product::all(array('id', 'name', 'price'));
      $this->brands = Brand::all(array('name'));
      $this->employees = Employee::all(array('id', 'name', 'email', 'contact_number', 'gender'));
    }

    public function index() {
        return view('home', array('title' => 'Welcome', 'description' => '', 'page' => 'home', 'brands' => $this->brands, 'categories' => $this->categories, 'products' => $this->products));
    }

    public function products() {
        return view('products', array('title' => 'Products Listing', 'description' => '', 'page' => 'products', 'brands' => $this->brands, 'categories' => $this->categories, 'products' => $this->products));
    }

    public function product_details($id) {
        $product = Product::find($id);
        return view('product_details', array('product' => $product, 'title' => $product->name, 'page' => 'products', 'brands' => $this->brands, 'categories' => $this->categories, 'products' => $this->products));
    }

    public function product_categories($name) {
        return view('product_categories', array('title' => 'Welcome', 'description' => '', 'page' => 'products', 'brands' => $this->brands, 'categories' => $this->categories, 'products' => $this->products));
    }

    public function product_brands($name, $category = null) {
        return view('product_brands', array('title' => 'Welcome', 'description' => '', 'page' => 'products', 'brands' => $this->brands, 'categories' => $this->categories, 'products' => $this->products));
    }

    public function blog() {
        return view('blog', array('title' => 'Welcome','description' => '','page' => 'blog', 'brands' => $this->brands, 'categories' => $this->categories, 'products' => $this->products));
    }

    public function blog_post($id) {
        return view('blog_post', array('title' => 'Welcome','description' => '','page' => 'blog', 'brands' => $this->brands, 'categories' => $this->categories, 'products' => $this->products));
    }

    public function contact_us() {
        return view('contact_us', array('title' => 'Welcome','description' => '','page' => 'contact_us'));
    }

    public function login() {
        return view('login', array('title' => 'Welcome','description' => '','page' => 'home'));
    }

    public function logout() {
        return view('login', array('title' => 'Welcome','description' => '','page' => 'home'));
    }

    public function cart(Request $request) {
        if ($request == 'post') {
          $input = Request::all();
          $product_id = Request::get('product_id', $input);
          $product = Product::find($product_id, $input);
          Cart::add(array('id' => $product_id, 'name' => $product->name, 'qty' => 1, 'price' => $product->price), $input);
        }
        $cart = Cart::content();
        return view('cart', array('title' => 'Welcome','description' => '','page' => 'home'));
    }

    public function checkout() {
        return view('checkout', array('title' => 'Welcome','description' => '','page' => 'home'));
    }

    public function search($query) {
        return view('products', array('title' => 'Welcome','description' => '','page' => 'products'));
    }
}
