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


Auth::routes();
Route::group(['middleware' => ['auth']], function () {

    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/contacts', 'ContactController@index');
    Route::get('/messages/{id}', 'MessagesController@index')->name('getMessages');
    Route::post('/messages/send', 'MessagesController@send')->name('sendMessage');
    Route::get('/read/{id}', 'MessagesController@read');
    Route::get('/requests', 'RequestsController@requests')->name('requests');
    Route::get('/user_requests', 'RequestsController@userRequests')->name('userRequests');
    Route::get('/user_processing_requests', 'RequestsController@userProcessingRequests')->name('userProcessingRequests');
    Route::get('/user_processing_requests', 'RequestsController@userProcessingRequests')->name('userProcessingRequests');
    Route::post('/select_request', 'RequestsController@selectRequest')->name('selectRequest');

    Route::get('/chat', 'MessagesController@displayChatSection')->name('chat');
});
Route::get('/users', 'UsersController@index')->name('users')->middleware('auth.admin');




