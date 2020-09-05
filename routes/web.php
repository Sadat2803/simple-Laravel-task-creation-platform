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
    Route::get('/contacts', 'ContactController@index')->name('contacts');;
    Route::get('/messages/{id}', 'MessagesController@index')->name('getMessages');
    Route::post('/messages/send', 'MessagesController@send')->name('sendMessage');
    Route::get('/read/{id}', 'MessagesController@read');
    Route::get('/requests', 'RequestsController@requests')->name('requests');
    Route::post('/createRequest', 'RequestsController@createRequest')->name('createRequest');
    Route::post('/closeRequest', 'RequestsController@closeRequest')->name('closeRequest');
    Route::get('/receivedDocuments/{requestId}', 'RequestsController@receivedDocuments')->name('receivedDocuments');
    Route::get('/user_requests', 'RequestsController@userRequests')->name('userRequests');
    Route::get('/user_processing_requests', 'RequestsController@userProcessingRequests')->name('userProcessingRequests');
    Route::get('/user_finished_requests', 'RequestsController@userFinishedRequests')->name('userFinishedRequests');
    Route::post('/select_request', 'RequestsController@selectRequest')->name('selectRequest');
    Route::post('fileUpload', 'RequestsController@fileUpload')->name('fileUpload');

    Route::get('/chat', 'MessagesController@displayChatSection')->name('chat');
});
Route::get('/users', 'UsersController@index')->name('users')->middleware('auth.admin');
Route::post('/createUser', 'UsersController@createUser')->name('createUser')->middleware('auth.admin');




