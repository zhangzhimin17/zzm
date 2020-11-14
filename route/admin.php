<?php
/**
 * admin模块的路由在这里
 */

//User控制器的路由
//Route::get('users', 'admin/user/index');
//Route::get('useradd', 'admin/user/add');
//Route::post('usersave', 'admin/user/save');
//Route::get('useredit', 'admin/user/edit');
//Route::post('userupdate', 'admin/user/update');
//Route::get('userread', 'admin/user/read');
//Route::get('userdelete', 'admin/user/delete');

//user控制器的路由
Route::resource('user', 'admin/User');
//News控制器的路由
Route::resource('news', 'admin/News');

//Student控制器的路由
Route::resource('student', 'admin/Student');

//Subject控制器的路由
Route::resource('subject', 'admin/Subject');

//Category控制器的路由
Route::resource('category', 'admin/Category');

//Department控制器的路由
Route::resource('department', 'admin/Department');


