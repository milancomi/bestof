<?php

use App\Events\UserEvent;
use App\Jobs\SendRegisterMailJob;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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






// https://bestof.test/axiosGet'
Route::get('axiosGet', function () {

    $user = User::all();

    return response()->json($user);
});




// WEBSOCKET REDIS ROUTES




Route::get('/home', 'HomeController@index')->name('home');

Route::post('/ping', function (Request $request) {
    $user = User::find($request->id);
    $message = $request->message;

    event(new UserEvent($user, $message));
});



Route::get('/ping2', function () {

    $user = User::find(55);
    $message  = ["blablalb" => "lablalbab"];
    event(new UserEvent($user, $message));
});

Auth::routes();
////// ENDDD


// LOGIN WITH SOCIALITE , FACEBOOK, GOOGLE, LINKEDIN


Route::get('login/facebook', 'Auth\LoginController@redirectToFacebookProvider')->name('facebook-login');
Route::get('login/facebook/callback', 'Auth\LoginController@handleFacebookProviderCallback');

Route::get('login/google', 'Auth\LoginController@redirectToGoogleProvider')->name('google-login');
Route::get('login/google/callback', 'Auth\LoginController@handleGoogleProviderCallback');


Route::get('login/linkedin', 'Auth\LoginController@redirectToLinkedInProvider')->name('linkedin-login');
Route::get('login/linkedin/callback', 'Auth\LoginController@handleLinkedInProviderCallback');

// ENDD

// MAIL SEND
// Route::get('/send','HomeController@send');





// Route::get('/sendwithjob',function(){

//     $data = ['user_name'=>'Zoka','user_email'=>'milancomi96@gmail.com'];
//     $job = (new SendRegisterMailJob($data))->delay(Carbon::now()->addSeconds(5));
//     dispatch($job);
// });
