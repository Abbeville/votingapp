<?php

use Illuminate\Support\Facades\Route;
use App\Models\Finger;

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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/redirect', 'RedirectController@index')->name('redirect');

Route::get('/welcome', function(){
	return view('welcome');
});


Route::get('/logout', 'Auth\LoginController@logout');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// dd(auth()->user());

Route::group(['prefix' => 'admin'], function(){
		Route::get('checkreg/{student_id}/{current}', 'BiometricController@checkreg');
		Route::get('process_register', 'BiometricController@process_register');

	    Route::get('register/finger/{user_id}', 'BiometricController@registerFinger')->name('student.register.finger');
});

Route::get('finger/ac', 'BiometricController@getac');
Route::post('process/verification', 'BiometricController@process_verification');
Route::get('message/{msg}', 'BiometricController@message');

Route::get('finger/register/{id}', 'BiometricController@registerFinger');
Route::get('finger/verify/{id}', function($id){
  $finger_data = Finger::where('student_id', $id)->pluck('finger_data');
    echo "$id;$finger_data;SecurityKey;11;localhost/biometric/process_verifcation.php;". url('finger/ac').";extraParams";
})->name('verify.finger');

Route::get('/verification/link/{id}', 'BiometricController@getVerificationLink')->name('get.verification.link');


Route::group(['prefix' => 'app', 'middleware' => ['role:student', 'auth'], 'namespace' => 'User'], base_path('routes/user_routes.php'));
Route::group(['prefix' => 'admin', 'middleware' => ['role:admin','auth'], 'namespace' => 'Admin'], base_path('routes/admin_routes.php'));
