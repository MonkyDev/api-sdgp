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

Route::get('/', 'HomeController@welcome');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/image/{filename}','HomeController@getImage');
Route::get('/icon/{filename}','HomeController@getIcon');


/*RUTAS DE PERMISOS*/
Route::resource('assigment/permission/users' ,'Permissions\UserController');
Route::resource('assigment/permission/roles' ,'Permissions\RoleController');

/*RUTAS DE ADMMINISTRACION ESCOLARES*/
Route::resource('management/school' ,'Management\School\SchoolController');
Route::resource('management/level' ,'Management\School\LevelController');
Route::resource('management/authorization' ,'Management\School\AuthorizationController');
Route::resource('management/fundament' ,'Management\School\FundamentServiceSocialController');
Route::resource('management/career' ,'Management\School\CareerSchoolController');
Route::resource('management/state' ,'Management\School\MexicanStateController');
Route::resource('management/mode' ,'Management\School\ModeController');

/*RUTAS DE PERSONAL RESPONSABLE ESCOLARES*/
Route::resource('staff/charge' ,'Staff\ChargeController');
Route::resource('staff/signing' ,'Staff\SigningController');
Route::resource('staff/wrench' ,'Staff\WrenchController');