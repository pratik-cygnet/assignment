<?php
Route::get('/', 'UserController@manageUser');
Route::get('manage-users', 'UserController@manageUser');
Route::get('create-users', 'UserController@createUser');
Route::resource('users', 'UserController');
Route::post('save', 'UserController@store');
Route::get('update/{id}', 'UserController@update');
Route::post('edit/{id}', 'UserController@edit');