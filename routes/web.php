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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/cc', function () {
    \Artisan::call('cache:clear');
    \Artisan::call('view:clear');
    \Artisan::call('route:clear');
    \Artisan::call('config:clear');
//    \Artisan::call('config:cache');

    return 'DONE';
});


Auth::routes();

/*===============Front End Start==============*/
//frontend
Route::get('/', 'HomeController@index')->name('home');

//for chat

Route::get('/chat-list', 'HomeController@chatList')->name('chat.list');
Route::get('/chat/{s_id}/{t_id}', 'HomeController@chat')->name('chat');
Route::post('/send_message', 'HomeController@sendMessage')->name('send.message');

//reviews
Route::get('/reviews', 'HomeController@reviews')->name('reviews');
Route::post('/reviews', 'HomeController@reviewsPost')->name('reviews.post');


//job board
Route::get('/job-board', 'HomeController@jobBoardIndex')->name('job.board.index');
Route::get('/job-board/{id}/details', 'HomeController@jobBoardDetails')->name('job.board.details');
Route::get('/area/{id}/job-board', 'HomeController@AreaJobBoardIndex')->name('area.job.board.index');

//contact
Route::get('/contact', 'HomeController@contactIndex')->name('contact.index');

//    ajax call
Route::get('/get_course/{cat}', 'StudentController@getCourse');
Route::get('/get_subject/{cat}/{course}', 'StudentController@getSubject');

//subscriber
Route::post('/subscribe', 'SubscriberController@store')->name('subscriber.store');

//student start
Route::group(['middleware' => 'guest.student'], function () {
    Route::get('/student-login', 'Auth\StudentLoginController@showLoginForm')->name('student.login');
    Route::post('/student-login', 'Auth\StudentLoginController@login');

    Route::get('/student-register', 'Auth\StudentRegisterController@showRegistrationForm')->name('student.register');
    Route::post('/student-register', 'Auth\StudentRegisterController@register');
});
Route::post('/student-logout', 'Auth\StudentLoginController@logout')->name('student.logout');


Route::group(['middleware' => 'auth.student'], function () {
    Route::get('student/dashboard', 'StudentController@index')->name('student.home');
    //hire tutor
    Route::get('/hire-tutor', 'StudentController@hireTutorIndex')->name('hire.tutor.index');
    Route::post('/hire-tutor', 'StudentController@hireTutorStore')->name('hire.tutor.store');

    //job posted
    Route::get('/job-posted', 'StudentController@getJobPostedIndex')->name('job.posted.index');
    Route::get('/job-applied/{id}/{id2}', 'StudentController@getJobApplied')->name('job.applied');
    Route::get('/job/{id}/{id2}/{id3}/accept-or-decline', 'StudentController@acceptOrDecline')->name('job.accept.or.decline');

    //tutor request
    Route::get('/tutor-request', 'StudentController@tutorRequest')->name('tutor.request');
    Route::get('/tutor-request/{id}/view', 'StudentController@tutorRequestView')->name('tutor.request.view');
});
//student end

/*===============Front End End==============*/


/*===============Back End Start==============*/
//backend admin start
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::get('/', 'AdminController@index')->name('admin.home');

    Route::get('/student-list', 'AdminController@studentList')->name('admin.student.list');
    Route::get('/tutor-list', 'AdminController@tutorList')->name('admin.tutor.list');
});
//backend admin end


//backend tutor start
Route::group(['middleware' => 'guest.tutor'], function () {
    Route::get('/tutor-login', 'Auth\TutorLoginController@showLoginForm')->name('tutor.login');
    Route::post('/tutor-login', 'Auth\TutorLoginController@login');

    Route::get('/tutor-register', 'Auth\TutorRegisterController@showRegistrationForm')->name('tutor.register');
    Route::post('/tutor-register', 'Auth\TutorRegisterController@register');
});
Route::post('/tutor-logout', 'Auth\TutorLoginController@logout')->name('tutor.logout');


Route::group(['prefix' => 'tutor', 'middleware' => 'auth.tutor'], function () {
    Route::get('/', 'TutorController@index')->name('tutor.home');
    Route::get('/apply/{id}', 'TutorController@apply')->name('tutor.apply');

    Route::get('dashboard', 'TutorController@index')->name('tutor.home');
    Route::get('job-applied', 'TutorController@jobApplied')->name('tutor.job.applied');
    Route::get('/job-accept/{id}/{id2}', 'TutorController@getJobAccept')->name('job.accept');
    Route::get('/job-accepted-list', 'TutorController@getJobAcceptedList')->name('job.accepted.list');
});
//backend tutor end


Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    //web
    Route::get('/web-config', 'WebConfigController@index')->name('admin.web.home');
    Route::post('/web-config', 'WebConfigController@update')->name('admin.web.update');

    //subscribe
    Route::get('/subscribers/list', 'SubscriberController@getList')->name('admin.subscribers.list');
    Route::get('/subscribers/{id}/delete', 'SubscriberController@delete')->name('admin.subscribers.delete');

    //area
    Route::get('/area/list', 'AreaController@getList')->name('admin.area.list');
    Route::get('/area/create', 'AreaController@create')->name('admin.area.create');
    Route::post('/area/store', 'AreaController@store')->name('admin.area.store');
    Route::get('/area/{id}/edit', 'AreaController@edit')->name('admin.area.edit');
    Route::post('/area/{id}/update', 'AreaController@update')->name('admin.area.update');
    Route::get('/area/{id}/delete', 'AreaController@delete')->name('admin.area.delete');

    //job board
    Route::get('/job_board/list', 'JobBoardController@getList')->name('admin.job_board.list');
    Route::get('/job_board/create', 'JobBoardController@create')->name('admin.job_board.create');
    Route::post('/job_board/store', 'JobBoardController@store')->name('admin.job_board.store');
    Route::get('/job_board/{id}/edit', 'JobBoardController@edit')->name('admin.job_board.edit');
    Route::post('/job_board/update', 'JobBoardController@update')->name('admin.job_board.update');
    Route::get('/job_board/{id}/delete', 'JobBoardController@delete')->name('admin.job_board.delete');
});



/*===============Back End End==============*/
