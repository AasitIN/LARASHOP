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

Route::get('/', 'Front@index');
Route::get('/home','Front@index');
Route::get('/products', 'Front@products');
Route::get('/products/details/{id}','Front@product_details');
Route::get('/products/category','Front@product_categories');
Route::get('/products/brands','Front@product_brands');
Route::get('/blog','Front@blog');
Route::get('/blog/post/{id}','Front@blog_post');
Route::get('/contact-us','Front@contact_us');
Route::get('/login','Front@login');
Route::get('/logout','Front@logout');
Route::get('/cart','Front@cart');
Route::get('/checkout','Front@checkout');
Route::get('/search/{query}','Front@search');


Route::post('/cart','Front@cart');


/**
 * Rute sno sèries de proves i tal
 */
Route::get('blade',function(){
    $drinks=array('Vodka','Gin','Brandy');
    return view('page',array('name'=>'Marta','day'=>'Friday','drinks'=>$drinks));
});

Route::get('/insert',function(){
    App\Category::create(array('name'=>'Music'));
    return 'category added';
});

Route::get('/read',function(){
   $category = new App\Category();

    $data=$category->all(array('name','id'));

    foreach ($data as $list){
        echo $list->id . ' ' . $list->name . ' ';
    }
});

Route::get('/update',function(){
    $category = App\Category::find(1);
    $category->name='COMPLEMENTS';
    $category->save();

    $data=$category->all(array('name','id'));

    foreach ($data as $element){
        echo $element->id . ' ' . $element->name . '<br>';
    }
});

Route::get('/delete',function(){
    $category = App\Category::find(1);
    $category->delete();

    $data=$category->all(array('name','id'));

    foreach ($data as $element){
        echo $element->id . ' ' . $element->name . '<br>';
    }
});

Route::get('/caca', function(){
   echo function($cartItem) {return $cartItem->id===1;};
});

Auth::routes();

/**Route::get('/home', 'HomeController@index')->name('home');*/