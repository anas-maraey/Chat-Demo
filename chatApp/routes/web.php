<?php
use App\Events\MessagePosted;
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


Route::get('/chat', function () {
    return view('chat');
})->middleware('auth');

//retreiving messages
Route::get('/messages' , function(){
  return App\Message::with('user')->get();
})->middleware('auth');

// storting messages
Route::post('/messages' , function(){
  $user = Auth::user();
  $message = $user->messages()->create([
    'message' => request()->get('message')
  ]);
  // Announce that a new message sent
  event(new MessagePosted($message , $user));
  return ['status' => 'success'];
})->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
