<?php

/*
|--------------------------------------------------------------------------
| Module Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for the module.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'instructor']], function() {


    Route::get('/', ['as' => 'dashboard', 'uses' => function() {
            // dd('This is the Admin module index page.');
            return view('admin::sections.dashboard');
        }]);
    
    Route::group(['middleware' => 'admin'], function() {
        // Users
        Route::resource('users', 'UsersController');
        Route::get('user/{id}', ['as' => 'admin.users.delete', 'uses' => 'UsersController@destroy']);
        Route::get('users-confirm', ['as' => 'usersConfirm', 'uses' => 'UsersController@usersConfirm']);
        Route::get('user-confirm/{id}', ['as' => 'confirmUser', 'uses' => 'UsersController@confirmUser']);
        Route::post('confirmUsers', ['as' => 'confirmUsers', 'uses' => 'UsersController@confirmUsers']);

        // Pages
        Route::resource('pages', 'PagesController');
        Route::get('page/{id}', ['as' => 'admin.pages.delete', 'uses' => 'PagesController@destroy']);

        // Page Descriptions
        Route::resource('pageDescs', 'PageDescsController');
        Route::get('pageDesc/{id}', ['as' => 'admin.pageDescs.delete', 'uses' => 'PageDescsController@destroy']);

        // Sliders
        Route::resource('sliders', 'SlidersController');
        Route::get('slider/{id}', ['as' => 'admin.slider.delete', 'uses' => 'SlidersController@destroy']);

        // Placements
        Route::resource('placements', 'PlacementsController');
        Route::get('placement/{id}', ['as' => 'admin.placements.delete', 'uses' => 'PlacementsController@destroy']);

        // Universities
        Route::resource('universities', 'UniversitiesController');
        Route::get('university/{id}', ['as' => 'admin.universities.delete', 'uses' => 'UniversitiesController@destroy']);

    });

    // Modules
    Route::resource('modules', 'ModulesController');
    Route::get('module/{id}', ['as' => 'admin.modules.delete', 'uses' => 'ModulesController@destroy']);
    Route::get('studentsResult/{id}', ['as' => 'studentsResult', 'uses' => 'ModulesController@studentsResult']);
    Route::get('sendResult/{id}', ['as' => 'sendResult', 'uses' => 'ModulesController@sendResult']);
    Route::get('sendFailed', ['as' => 'sendFailed', 'uses' => 'ModulesController@sendFailed']); 

    // Courses
    Route::resource('courses', 'CoursesController');
    Route::get('course/{id}', ['as' => 'admin.courses.delete', 'uses' => 'CoursesController@destroy']);

    // Sessions
    Route::resource('sessions', 'SessionsController');
    Route::get('session/{id}', ['as' => 'admin.sessions.delete', 'uses' => 'SessionsController@destroy']);

    // Assignments
    Route::resource('assignments', 'AssignmentsController');
    Route::get('assignment/{id}', ['as' => 'admin.assignments.delete', 'uses' => 'AssignmentsController@destroy']);

    // Exams
    Route::resource('exams', 'ExamsController');
    Route::get('exam/{id}', ['as' => 'admin.exams.delete', 'uses' => 'ExamsController@destroy']);

    // ExamQuestions
    Route::resource('examQuestions', 'ExamQuestionsController');
    Route::get('examQuestion/{id}', ['as' => 'admin.examQuestions.delete', 'uses' => 'ExamQuestionsController@destroy']);

    // Exam Dates
    Route::resource('examDates', 'ExamDatesController');
    Route::get('examDate/{id}', ['as' => 'admin.examDates.delete', 'uses' => 'ExamDatesController@destroy']);

    // Questions
    Route::resource('questions', 'QuestionsController');
    Route::get('question/{id}', ['as' => 'admin.questions.delete', 'uses' => 'QuestionsController@destroy']);

    // Materials
    Route::resource('materials', 'MaterialsController');
    Route::get('material/{id}', ['as' => 'admin.materials.delete', 'uses' => 'MaterialsController@destroy']);

    // assignmentAnswers
    Route::resource('assignmentAnswers', 'AssignmentAnswersController');
    Route::get('assignmentAnswer/{id}', ['as' => 'admin.assignmentAnswers.delete', 'uses' => 'AssignmentAnswersController@destroy']);

    // module Istructor
    Route::get('getInstructors/{id}', ['as' => 'getInstructors', 'uses' => 'ModulesController@getInstructors']);
    Route::post('assignInstructors/{id}', ['as' => 'assignInstructors', 'uses' => 'ModulesController@assignInstructors']);

    // module Invites
    Route::get('getInvites/{id}', ['as' => 'getInvites', 'uses' => 'ModulesController@getInvites']);
    Route::post('assignInvites/{id}', ['as' => 'assignInvites', 'uses' => 'ModulesController@assignInvites']);


    Route::get('index', function() {
        // dd('This is the Admin module index page.');
        return view('admin::sections.index');
    });
    Route::get('show', function() {
        // dd('This is the Admin module index page.');
        return view('admin::sections.show');
    });
    Route::get('form', function() {
        // dd('This is the Admin module index page.');
        return view('admin::sections.form');
    });
});