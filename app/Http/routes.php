<?php
header('Access-Control-Allow-Origin: *');
use App\User;

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::get('/', function () {
    return view('admin/login');
});
Route::group(['middleware' => ['web']], function () {
Route::group(['prefix' => '/api/'], function()
	{
		Route::get('gps/id/{id?}/lng/{lng?}/lat/{lat?}/status/{status?}/date/{date?}/Name/{Name?}/Code/{Code?}', 'GpsController@GpsStore');
		Route::get('gps/username/{username?}/password/{password?}','GpsController@doLogin');
		Route::get('gps/{date}','GpsController@get_location');
		Route::get('/gps/username/{username?}/password/{password?}/email/{email?}/role/{role?}/nameuser/{nameuser?}','GpsController@doRegister');
		Route::get('gps/filter/name/{name}/date/{date}','GpsController@NameDateFilter');
		Route::get('list','GpsController@index');	
	});
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

//azhar routes
Route::get('reports','AdminController@report');
Route::post('reports','AdminController@reports');
Route::get('adminpanel','AdminController@adminpanel');
Route::get('login', function() {
	  return View::make('admin/login');
	});

Route::post('login', 'AdminController@login');
Route::get('/logout','AdminController@logout');

Route::get('/map','AdminController@DrawMap');
Route::get('/map/show', function() {
	$users=user::where('role','user')->lists('username','username');
	if (Auth::check()){
		return view('admin/map',compact('users'));    
	}
	else{
		return redirect('/login');  
	}
});

	//map filter
	Route::get('/gps/filter/name/{name}/date/{date}','AdminController@NameDateFilter');
	route::get('/latest','AdminController@latest');
    route::get('/updatelatest/{name?}','AdminController@updatelatest');
    Route::get('/Gpsupdate','AdminController@Gpsupdate');
	//chart filter
	Route::get('/chart/api/chart/filter/{name}/{from}/{to}','GpsController@Filtercharts');
	Route::get('/chart/filter', function() {
		$users=user::where('role','user')->get();
		if (Auth::check()){
			return view('charts',compact('users')); 
		} 
		else{
			return redirect('/login');  
		}  
	});

//hadeel routes
Route::resource('/users','UserController');
Route::get('/fupdate','UserController@fupdate');
Route::get('/Gpsupdate','AdminController@Gpsupdate');
Route::get('/users/destroy/{id}','UserController@destroy');
});


Route::group(['middleware' => ['web']], function () {
    //
});
