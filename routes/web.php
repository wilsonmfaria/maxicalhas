<?php
Route::redirect('/', 'admin/home');

Auth::routes(['register' => false]);

// Change Password Routes...
Route::get('change_password', 'Auth\ChangePasswordController@showChangePasswordForm')->name('auth.change_password');
Route::patch('change_password', 'Auth\ChangePasswordController@changePassword')->name('auth.change_password');

Route::group(['middleware' => ['auth'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('ordemsNav/{letra}', 'Admin\OrdemServicoController@index');
    Route::get('ordemNav/{letra}/{id}', 'Admin\OrdemServicoController@indexNav');
    Route::resource('ordems', 'Admin\OrdemServicoController');

    Route::get('clientesNav/{letra}', 'Admin\ClienteController@index');
    Route::get('clienteNav/{letra}/{id}', 'Admin\ClienteController@indexNav');
    Route::resource('clientes', 'Admin\ClienteController');
    
    Route::get('funcionariosNav/{letra}', 'Admin\FuncionarioController@index');
    Route::get('funcionarioNav/{letra}/{id}', 'Admin\FuncionarioController@indexNav');
    Route::resource('funcionarios', 'Admin\FuncionarioController');
    
    Route::resource('relatorios', 'Admin\RelatorioController');
    Route::resource('permissions', 'Admin\PermissionsController');
    Route::delete('permissions_mass_destroy', 'Admin\PermissionsController@massDestroy')->name('permissions.mass_destroy');
    Route::resource('roles', 'Admin\RolesController');
    Route::delete('roles_mass_destroy', 'Admin\RolesController@massDestroy')->name('roles.mass_destroy');
    Route::resource('users', 'Admin\UsersController');
    Route::delete('users_mass_destroy', 'Admin\UsersController@massDestroy')->name('users.mass_destroy');
});
