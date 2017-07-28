<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Category;
use App\Product;
use Illuminate\Http\Request;

class Front extends Controller
{
    var $brands;
    var $categories;
    var $products;
    var $title;
    var $description;

    public function __construct()
    {
        $this->brands = Brand::all(array('name'));
        $this->categories = Category::all(array('name'));
        $this->products = Product::all(array('id','name','price'));
    }

    /**
     *  Funció Índex que retorna la vista índex per a la pàgina principal de la web
     *
     * @return Object Vista de la pàgina principal
     **/
    public function index() {
        return view('home', array('title'=>'Welcome','description'=>'','page'=>'home','brands'=>$this->brands,
            'categories'=>$this->categories,'products'=>$this->products));
    }

    /**
     * Funció que retorna la vista amb el llistat de productes
     *
     * Se li passa un array amb les següents dades:
     * title: Títol de la pàgina
     * description: Descripció de la pàgina
     * page: nomenclatura d ela pàgina
     * brands: array amb el llistat de maqrues
     * categories: array amb el llistat de categories
     * products: array amb el llistat de productes
     *
     * @return Object Vista del llistat de productes
     */
    public function products() {
        return view('products', array('title'=>'Products Listing','description'=>'','page'=>'products','brands'=>$this->brands,
            'categories'=>$this->categories,'products'=>$this->products));
    }

    /**
     * Funció que retorna la vista amb els detalls del producte amb identificador $id
     *
     * A la vista se li passa un array amb les següents dades:
     * product: objecte producte amb identificador $id
     * title: Títol de la pàgina
     * description: descripció de la pàgina
     * page: nomenclatura de la pàgina
     * brands: array amb el llistat de maqrues
     * categories: array amb el llistat de categories
     * products: array amb el llistat de productes
     *
     * @param int $id identificador del producte
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function product_details($id){
        $product = Product::find($id);
        return view('product_details', array('product'=>$product, 'title'=>$product->name, 'description'=>' ', 'page'=>'products',
            'brands'=>$this->brands,'categories'=>$this->categories,'products'=>$this->products));
    }

    /**
     * @param $name
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function product_categories($name){
        return view('products', array('title' => 'Welcome','description' => '','page' => 'products', 'brands' => $this->brands,
            'categories' => $this->categories, 'products' => $this->products));
    }

    /**
     * @param $name
     * @param null $category
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function product_brands($name,$category=null){
        return view('products', array('title' => 'Welcome','description' => '','page' => 'products', 'brands' => $this->brands,
            'categories' => $this->categories, 'products' => $this->products));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function blog(){
        return view('blog', array('title' => 'Welcome','description' => '','page' => 'blog', 'brands' => $this->brands,
            'categories' => $this->categories, 'products' => $this->products));
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function blog_post($id){
        return view('blog_post', array('title' => 'Welcome','description' => '','page' => 'blog', 'brands' => $this->brands,
            'categories' => $this->categories, 'products' => $this->products));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function contact_us() {
        return view('contact_us', array('title' => 'Welcome','description' => '','page' => 'contact_us'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function login() {
        return view('login', array('title' => 'Welcome','description' => '','page' => 'home'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function logout() {
        return view('login', array('title' => 'Welcome','description' => '','page' => 'home'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function cart() {
        return view('cart', array('title' => 'Welcome','description' => '','page' => 'home'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function checkout() {
        return view('checkout', array('title' => 'Welcome','description' => '','page' => 'home'));
    }

    /**
     * @param $query
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function search($query) {
        return view('products', array('title' => 'Welcome','description' => '','page' => 'products'));
    }
}
