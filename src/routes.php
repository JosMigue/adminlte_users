<?php

Route::group(['middleware' => ['web']], function() {
    /*Route::get('/home', function (){
       return  redirect()->route('admin.index');
    });*/

    Route::post('login', [
        'uses' => 'josmigue\AdminlteUsers\Controllers\Auth\LoginController@login',
    ]);

    Route::get('login', [
        'uses' => 'josmigue\AdminlteUsers\Controllers\Auth\LoginController@showLoginForm',
        'as' => 'login',
    ]);

    Route::post('logout', [
        'uses' => 'josmigue\AdminlteUsers\Controllers\Auth\LoginController@logout',
        'as' => 'logout'
    ]);





    Route::group(['prefix' => 'admin', 'middleware' => ['auth'] ], function() {
        //-----------------------ADMIN USERS-----------------------
        Route::resource('adminUsuarios', 'josmigue\AdminlteUsers\Controllers\UsersController', ['except' => [
            'store', 'show'
        ]]);

        Route::get('adminUsuarios/{id}/editPass', [
            'uses' => 'josmigue\AdminlteUsers\Controllers\UsersController@editPass',
            'as' => 'adminUsuarios.editPass'
        ]);

        Route::put('adminUsuarios/{id}/updatePass', [
            'uses' => 'josmigue\AdminlteUsers\Controllers\UsersController@updatePass',
            'as' => 'adminUsuarios.updatePass'
        ]);

        Route::get('adminUsuarios/{id}/destroy', [
            'uses' => 'josmigue\AdminlteUsers\Controllers\UsersController@destroy',
            'as' => 'adminUsuarios.destroy'
        ]);

        //-----------------------Roles-----------------------
        Route::resource('roles', 'josmigue\AdminlteUsers\Controllers\RolesController', ['except' => [
            'index', 'show'
        ]]);

        Route::get('roles/{id}/destroy', [
            'uses' => 'josmigue\AdminlteUsers\Controllers\RolesController@destroy',
            'as' => 'roles.destroy'
        ]);



        //----------------------REGISTES------------------------------
        Route::get('register', [
            'uses' => 'josmigue\AdminlteUsers\Controllers\Auth\RegisterController@showRegistrationForm',
            'as' => 'register'
        ]);

        Route::post('register', [
            'uses' => 'josmigue\AdminlteUsers\Controllers\Auth\RegisterController@register',
            'as' => 'register'
        ]);

    });
});


/*
Route::post('password/email','ForgotPasswordController@sendResetLinkEmail');
Route::post('password/reset', 'ResetPasswordController@reset');
Route::get('password/reset ', 'ForgotPasswordController@showLinkRequest');
Route::get('password/reset/{token}','ResetPasswordController@showResetForm');




Route::group(['prefix' => 'admin'], function() {

    Route::resource('adminUsuarios', 'admin\UsersController');

    Route::get('adminUsuarios/{id}/editPass', [
        'uses' => 'admin\UsersController@editPass',
        'as' => 'adminUsuarios.editPass'
    ]);

    Route::put('adminUsuarios/{id}/updatePass', [
        'uses' => 'admin\UsersController@updatePass',
        'as' => 'adminUsuarios.updatePass'
    ]);

});*/

