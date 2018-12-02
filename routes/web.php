<?php
Route::get('/homepage','HomeController@homepage');
Route::get('/', function () {
  return redirect('/homepage');
});
Route::get('/admin/home',function(){
  return ('/admin/home');
});
Route::get('/admin/pruducts',function(){
  return ('/admin/products');
});
Route::get('/admin/users',function(){
  return ('/admin/users');
});
Route::get('/admin/product_categories',function(){
  return ('/admin/product_categories');
});
Route::get('/admin/peminjamen',function(){
  return ('/admin/peminjamen');
});

// Authentication Routes...
$this->get('login', 'Auth\LoginController@showLoginForm')->name('login');
$this->post('login', 'Auth\LoginController@login')->name('auth.login');
$this->post('logout', 'Auth\LoginController@logout')->name('auth.logout');

// Change Password Routes...
$this->get('change_password', 'Auth\ChangePasswordController@showChangePasswordForm')->name('auth.change_password');
$this->patch('change_password', 'Auth\ChangePasswordController@changePassword')->name('auth.change_password');

// Password Reset Routes...
$this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('auth.password.reset');
$this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('auth.password.reset');
$this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
$this->post('password/reset', 'Auth\ResetPasswordController@reset')->name('auth.password.reset');

Route::group(['middleware' => ['auth'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/home', 'HomeController@index');

    Route::resource('roles', 'Admin\RolesController');
    Route::post('roles_mass_destroy', ['uses' => 'Admin\RolesController@massDestroy', 'as' => 'roles.mass_destroy']);
    Route::resource('users', 'Admin\UsersController');
    Route::post('users_mass_destroy', ['uses' => 'Admin\UsersController@massDestroy', 'as' => 'users.mass_destroy']);
    Route::resource('product_categories', 'Admin\ProductCategoriesController');
    Route::post('product_categories_mass_destroy', ['uses' => 'Admin\ProductCategoriesController@massDestroy', 'as' => 'product_categories.mass_destroy']);
    Route::resource('product_tags', 'Admin\ProductTagsController');
    Route::post('product_tags_mass_destroy', ['uses' => 'Admin\ProductTagsController@massDestroy', 'as' => 'product_tags.mass_destroy']);
    Route::resource('products', 'Admin\ProductsController');
    Route::post('products_mass_destroy', ['uses' => 'Admin\ProductsController@massDestroy', 'as' => 'products.mass_destroy']);
    Route::resource('peminjamen', 'Admin\PeminjamenController');
    Route::post('peminjamen_mass_destroy', ['uses' => 'Admin\PeminjamenController@massDestroy', 'as' => 'peminjamen.mass_destroy']);
    Route::post('peminjamen_restore/{id}', ['uses' => 'Admin\PeminjamenController@restore', 'as' => 'peminjamen.restore']);
    Route::delete('peminjamen_perma_del/{id}', ['uses' => 'Admin\PeminjamenController@perma_del', 'as' => 'peminjamen.perma_del']);




});
