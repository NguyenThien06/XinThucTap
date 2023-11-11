<?php 
/* $route['danh-muc/{name}-{id}.html'] = 'App\Controller\MenuController@store';

$route['danh-muc/{name}'] = 'App\Controller\MenuController@index';

$route['san-pham/{name}-{id}.html'] = 'ProductController@store';

$route['san-pham/{name}'] = 'ProductController@index';*/
#--------------------PUBLIC-----------------------------------

$route['service/product'] = 'App\Controller\MainController@loadProduct';
$route['service/product-show'] = 'App\Controller\MainController@showProduct';

#Cart
$route['cart/add'] = 'App\Controller\CartController@add';
$route['cart'] = 'App\Controller\CartController@index';
$route['cart/update'] = 'App\Controller\CartController@update';
$route['cart/delete/{id}'] = 'App\Controller\CartController@delete';
$route['cart/store'] = 'App\Controller\CartController@store';
// 52p

$route['danh-muc/{slug}-id-{id}.html'] = 'App\Controller\MenuController@index';
$route['san-pham/{slug}-id-{id}.html'] = 'App\Controller\ProductController@index';

#--------------------ADMIN------------------------------------
#Login
$route['admin/login'] = 'App\Controller\Admin\LoginController@index';
$route['admin/user/login/store'] = 'App\Controller\Admin\LoginController@store';

#Main
$route['admin/main'] = 'App\Controller\Admin\MainController@index';
$route['admin'] = 'App\Controller\Admin\MainController@index';

#Menu

$route['admin/menu/add'] = 'App\Controller\Admin\MenuController@create';
$route['admin/menu/store'] ='App\Controller\Admin\MenuController@store';
$route['admin/menu/list'] = 'App\Controller\Admin\MenuController@index';
$route['admin/menu/edit/{id}'] = 'App\Controller\Admin\MenuController@edit';
$route['admin/menu/update/{id}'] = 'App\Controller\Admin\MenuController@update';
$route['admin/menu/delete'] = 'App\Controller\Admin\MenuController@destroy';

#Product
$route['admin/product/add'] = 'App\Controller\Admin\ProductController@create';
$route['admin/product/store'] = 'App\Controller\Admin\ProductController@store';
$route['admin/product/list']  = 'App\Controller\Admin\ProductController@index';
$route['admin/product/edit/{id}'] = 'App\Controller\Admin\ProductController@edit';
$route['admin/product/update/{id}'] = 'App\Controller\Admin\ProductController@update';
$route['admin/product/delete'] = 'App\Controller\Admin\ProductController@destroy';

# Upload File
$route['admin/upload/add'] = 'App\Controller\Admin\UploadController@store';

#Slider
$route['admin/slider/add'] =   'App\Controller\Admin\SliderController@create';
$route['admin/slider/store'] = 'App\Controller\Admin\SliderController@store';
$route['admin/slider/list'] =  'App\Controller\Admin\SliderController@index';
$route['admin/slider/edit/{id}'] = 'App\Controller\Admin\SliderController@edit';
$route['admin/slider/update/{id}'] = 'App\Controller\Admin\SliderController@update';
$route['admin/slider/delete'] = 'App\Controller\Admin\SliderController@destroy';

#Product_slider xem va lam lai 
$route['admin/productSlider/add'] = 'App\Controller\Admin\ProductSliderController@create';
$route['admin/productSlider/store'] = 'App\Controller\Admin\ProductSliderController@store';

# 36p

?>