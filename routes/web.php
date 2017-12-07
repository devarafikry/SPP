<?php
use App\Place;
use App\Plan;
use App\PlanPlace;
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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/admin', 'AuthController@login');
Route::get('/home', function () {
  session_start();
if(session_destroy()) // Destroying All Sessions
{
 // Redirecting To Home Page
}
    return view('home');
});
Route::post('/auth', 'AuthController@auth');
Route::get('/logout', 'AuthController@logout');
Route::get('/delete/{place_id}','PlaceController@delete');
Route::post('/placeUpload', 'PlaceController@store' );
Route::post('/placeRequest', 'PlaceController@request' );
Route::post('/editplace','PlaceController@edit');
Route::post('/createplan','PlanController@create');
Route::post('/submitplan', 'PlanController@submit' );
Route::get('/planplace/{selectedid}/{plan_id}/{planplace_id}','PlanController@addPlace');
Route::get('/verify/{place_id}','PlaceController@verify');
