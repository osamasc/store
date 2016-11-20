<?php



Route::get('/', 'HomeController@getHome');
Route::get('/view/{product}', 'HomeController@getItem');
Route::get('/category/{name}', 'HomeController@getCatigory');

// auth routes

Route::get('/login', [
    'uses'  => 'AuthController@getLogin',
    'as'    => 'login'
]);

Route::get('/register', [
  'uses'    => 'AuthController@getRegister',
  'as'      => 'register'
]);

Route::get('/forget', [
  'uses'    => 'AuthController@getForget',
  'as'      => 'forget'
]);

Route::post('/post-reg', [
    'uses'  =>  'AuthController@postRegister',
    'as'    =>  'post.reg'
]);

Route::post('/post-log', [
    'uses'  =>  'AuthController@postLogin',
    'as'    =>  'post.log'
]);

Route::get('/account/orders', [
    'uses'  =>  'AccountController@getMyOrders',
    'as'    =>  'orders'
]);

Route::post('/account/update', 'AccountController@updateInfo');
Route::post('/account/password/update', 'AccountController@updatePassword');
//products

Route::get('/sell', [
    'uses'  =>  'ProductController@getHome',
    'as'    =>  'products'
]);

Route::post('/new-product', [
    'uses'  => 'ProductController@postNewProduct',
    'as'    => 'new.pro'
]);

Route::get('/account/shipping-addresses', [
    'uses'  =>  'AccountController@getMyaddresses',
    'as'    =>  'addresses'
]);

Route::get('/account/lists', [
    'uses'  =>  'AccountController@getMyLists',
    'as'    =>  'lists'
]);

Route::get('/list-remove/{id}', 'AccountController@removeListItem');

Route::get('/account/settings', [
    'uses'  =>  'AccountController@getMySettings',
    'as'    =>  'settings'
]);

route::get('/logout', [
    'uses'  =>  'AuthController@getLogout',
    'as'    =>  'logout'
]);

Route::get('/account/addresses/create', [
    'uses'  => 'AccountController@getNewAddress',
    'as'    => 'address.create'
]);

Route::get('/addresses/primary/{id}', 'AccountController@postPrimary');

Route::post('/account/addresses/postnew', [
    'uses' => 'AccountController@postNewAdd',
    'as'  => 'post.newadd'
]);

Route::get('/address/{id}/delete', 'AccountController@getDeleteAdd');

route::get('/address/{id}/edit', 'AccountController@getEditAdd');

route::post('/address/{id}/update', 'AccountController@postEditedAdd');

// admin panel

route::get('/cpanel', 'AdminController@getAdmin');
//catigories
route::get('/cpanel/catigories', 'CatigoriesController@getCatigories');
route::post('/cpanel/catigory/add', 'CatigoriesController@postNewCat');
route::get('/cpanel/catigory/{catigory}/delete', 'CatigoriesController@postDelCat');

// users
Route::get('/cpanel/users', 'CusersController@getUsers');
route::get('/cpanel/users/{user}/delete', 'CusersController@postDelCat');

//products
Route::get('/cpanel/products', 'CproductsController@getProducts');
Route::get('/cpanel/products/{product}', 'CproductsController@getProduct');
route::get('/cpanel/products/{product}/approve', 'CproductsController@getApprove');
route::get('/cpanel/products/{product}/edit', 'CproductsController@getEdit');
route::get('/cpanel/products/{product}/hide', 'CproductsController@getHide');
route::get('/cpanel/products/{product}/delete', 'CproductsController@getDelete');

//orders
Route::get('/cpanel/orders', 'OrdersController@getOrders');
Route::get('/cpanel/order/{id}/edit', 'OrdersController@getEditOrder');
Route::get('/cpanel/order/{order}/status/{status}', 'OrdersController@postStatus');
// wishlists

Route::get('account/lists/add/{wishlist}', 'HomeController@postList');


//shop cart
Route::get('/addProduct/{productId}', 'CartController@addItem');
Route::get('/removeItem/{productId}', 'CartController@removeItem');

Route::get('/cart', 'CartController@showCart');

//checkout
Route::get('/checkout', 'CheckoutController@getCheckout');
Route::get('/checkout/address/edit', 'CheckoutController@getEditAdd');
Route::post('/checkout/address/{id}/update', 'CheckoutController@postEditedAdd');
Route::get('/checkout/address/add', 'CheckoutController@getNewAddress');
Route::post('/checkout/address/post', 'CheckoutController@postNewAddress');

//delete item from check cart

Route::get('done', 'CheckoutController@postCheckout');
