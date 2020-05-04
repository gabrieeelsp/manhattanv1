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


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


//ADMIN-----------------------
Route::get(         'admin/rubros/list',                          'Admin\RubroController@list');
Route::resource(    'admin/rubros',                               'Admin\RubroController');

Route::get(         'admin/subrubros/list',                       'Admin\SubrubroController@list');
Route::resource(    'admin/subrubros',                            'Admin\SubrubroController');

Route::get(         'admin/categories/list',                      'Admin\CategoryController@list');
Route::resource(    'admin/categories',                           'Admin\CategoryController');

Route::get(         'admin/stockproducts/list',                   'Admin\StockproductController@list');
Route::resource(    'admin/stockproducts',                        'Admin\StockproductController');

Route::get(         'admin/stockproducts/{id}/saleproducts/list', 'Admin\SaleproductController@list');
Route::resource(    'admin/stockproducts.saleproducts',           'Admin\SaleproductController');

Route::resource(    'admin/stockproducts.stockproductImages',     'Admin\StockproductImageController');
Route::put(         'admin/stockproducts/{stockproduct_id}/images/{id}/setpositionfor',     'Admin\StockproductImageController@setpositionfor')->name('stockproducts.image.setpositionfor');
Route::put(         'admin/stockproducts/{stockproduct_id}/images/{id}/setpositionback',     'Admin\StockproductImageController@setpositionback')->name('stockproducts.image.setpositionback');

Route::resource(    'admin/categories.categoryImages',            'Admin\CategoryImageController');
Route::put(         'admin/categories/{categori_id}/images/{id}/setpositionfor',     'Admin\CategoryImageController@setpositionfor')->name('categories.image.setpositionfor');
Route::put(         'admin/categories/{categori_id}/images/{id}/setpositionback',     'Admin\CategoryImageController@setpositionback')->name('categories.image.setpositionback');

Route::resource(    'admin/subrubros.subrubroImages',            'Admin\SubrubroImageController');
Route::put(         'admin/subrubros/{subrubro_id}/images/{id}/setpositionfor',     'Admin\SubrubroImageController@setpositionfor')->name('subrubros.image.setpositionfor');
Route::put(         'admin/subrubros/{subrubro_id}/images/{id}/setpositionback',     'Admin\SubrubroImageController@setpositionback')->name('subrubros.image.setpositionback');


//WEB-------------------------
Route::get(         'tienda/producto/{slug}',               'Web\WebController@producto')->name('tienda.producto');
Route::get(         'tienda/categoria/{slug}',              'Web\WebController@category')->name('tienda.category');
Route::get(         'tienda/subrubro/{slug}',               'Web\WebController@subrubro')->name('tienda.subrubro');
Route::get(         'tienda/rubro/{slug}',                  'Web\WebController@rubro')->name('tienda.rubro');
Route::get(         'tienda/producto',                      'Web\WebController@search')->name('tienda.search');
Route::get(         'tienda/producto_search',               'Web\WebController@search_ajax')->name('tienda.search_ajax');

Route::get(         'contact',                              'Web\WebController@contact')->name('contact');
Route::POST(         'contact/send_mail',                    'Web\WebController@send_mail')->name('contact.send_mail');
Route::get(         'contact/producto/{id}',                'Web\WebController@contact_product')->name('contact.product');

Route::get(         '/',                                    'Web\WebController@index')->name('index');