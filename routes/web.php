<?php

use App\Events\UserEvent;
use App\User;
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
Route::get('axiosGet',function(){

    $user = User::all();

    return response()->json($user);
});




// WEBSOCKET REDIS ROUTES




Route::get('/home', 'HomeController@index')->name('home');

Route::post('/ping',function(Request $request){
        $user = User::find($request->id);
        $message = $request->message;

        event(new UserEvent($user,$message));
});



Route::get('/ping2',function(){

    $user = User::find(55);
    $message  = ["blablalb"=>"lablalbab"];
    event(new UserEvent($user,$message));
});

Auth::routes();

