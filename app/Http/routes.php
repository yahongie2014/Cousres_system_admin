<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::get('/',['as' => 'frontend.index.get', 'uses' => 'PagesController@index']);
Route::get('/home',['as' => 'frontend.index.get', 'uses' => 'PagesController@index']);
// Route::get('/home',['as' => 'frontend.index.get', 'uses' => 'PagesController@index']);


Route::group(['middleware' => 'student'], function () {
    Route::get('/module/{id}',['as' => 'frontend.module.get', 'uses' => 'PagesController@module']);
    Route::get('/course/{id}',['as' => 'frontend.course.get', 'uses' => 'PagesController@course']);
    Route::get('/session/{id}',['as' => 'frontend.session.get', 'uses' => 'PagesController@session']);
    Route::post('/sessionpost',['as' => 'frontend.session.post', 'uses' => 'PagesController@sessionpost']);
    Route::get('/assignments',['as' => 'frontend.assignments.get', 'uses' => 'PagesController@assignments']);
    Route::get('/assignment/{id}',['as' => 'frontend.assignment.get', 'uses' => 'PagesController@assignment']);
    Route::post('/assignment',['as' => 'frontend.assignment.post', 'uses' => 'PagesController@assignmentPost']);

    Route::get('/exams',['as' => 'frontend.exams.get', 'uses' => 'ExamController@index']);
    Route::post('/exams',['as' => 'frontend.exams.post', 'uses' => 'ExamController@DatePost']);

    Route::get('/exam/{id}',['as' => 'frontend.exam.get', 'uses' => 'ExamController@show']);
    Route::post('/question/{id}',['as' => 'frontend.question.post', 'uses' => 'ExamController@question']);
    Route::get('/question/{id}',['as' => 'frontend.question.get', 'uses' => 'ExamController@question']);
    Route::get('/questions/{id}',['as' => 'frontend.skip.get', 'uses' => 'ExamController@skip']);

    Route::get('/announcements',['as' => 'frontend.announcements.get', 'uses' => 'PagesController@announcements']);
    Route::get('discussion', ['as' => 'frontend.discussion.get', 'uses' => 'PagesController@discussion']);
    Route::get('discussion/courses/{id}', ['as' => 'frontend.discussion.courses.get', 'uses' => 'PagesController@DiscussionCourses']);
    Route::get('discussion/sessions/{id}', ['as' => 'frontend.discussion.sessions.get', 'uses' => 'PagesController@DiscussionSessions']);
    Route::get('discussion/session/{id}', ['as' => 'frontend.discussion.session.get', 'uses' => 'PagesController@DiscussionSession']);
    Route::get('discussion/post/{id}', ['as' => 'frontend.post.get', 'uses' => 'PagesController@PostSingle']);
    Route::post('discussion/post/{id}', ['as' => 'frontend.post.post', 'uses' => 'PagesController@PostPostSingle']);
    Route::post('discussion/newpost/{id}', ['as' => 'frontend.postsingle.post', 'uses' => 'PagesController@PostNewPost']);


    Route::get('profile-home', ['as' => 'profileHome', 'uses' => 'PagesController@profileHome']);
    Route::get('profile-courses', ['as' => 'profileCourses', 'uses' => 'PagesController@profileCourses']);

});


    Route::get('/register',['as' => 'getRegister', 'uses' => 'PagesController@getRegister']);
    Route::post('/register',['as' => 'postRegister', 'uses' => 'PagesController@postRegister']);

Route::get('login',['as' => 'login', 'uses' => function () {
    return view('sections.login');
}]);
Route::post('loginUser' , ['as' => 'loginUser', 'uses' => 'PagesController@loginUser']);


Route::get('auth/login',['as' => 'getLogin', 'uses' => 'Auth\AuthController@getLogin']);
Route::post('auth/login',['as' => 'postLogin', 'uses' => 'Auth\AuthController@postLogin']);
Route::get('auth/logout',['as' => 'logout', 'uses' => 'Auth\AuthController@getLogout']);

/*Route::get('/', function () {
    return view('welcome');
});*/
