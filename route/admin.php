<?php
/**
 * admin模块的路由在这里
 */

//User控制器的路由
Route::get('users', 'admin/user/index');
Route::get('useradd', 'admin/user/add');
Route::post('usersave', 'admin/user/save');
Route::get('useredit', 'admin/user/edit');
Route::post('userupdate', 'admin/user/update');
Route::get('userread', 'admin/user/read');
Route::get('userdelete', 'admin/user/delete');

//News控制器的路由
Route::resource('news', 'admin/News');