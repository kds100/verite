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

Route::get('/', 'SurveyController@home')->name('home');

Route::get('/survey/new', 'SurveyController@newSurvey')->name('new.survey');
Route::get('/survey/{survey}', 'SurveyController@detailSurvey')->name('detail.survey');
Route::get('/survey/view/{survey}', 'SurveyController@viewSurvey')->name('view.survey');
Route::get('/survey/answers/{survey}', 'SurveyController@viewSurveyAnswers')->name('view.survey.answers');
Route::get('/survey/{survey}/delete', 'SurveyController@deleteSurvey')->name('delete.survey');

Route::get('/survey/{survey}/edit', 'SurveyController@edit')->name('edit.survey');
Route::patch('/survey/{survey}/update', 'SurveyController@update')->name('update.survey');

Route::post('/survey/view/{survey}/completed', 'AnswerController@store')->name('complete.survey');
Route::post('/survey/create', 'SurveyController@create')->name('create.survey');

// Questions related
Route::post('/survey/{survey}/questions', 'QuestionController@store')->name('store.question');

Route::get('/question/{question}/edit', 'QuestionController@edit')->name('edit.question');
Route::patch('/question/{question}/update', 'QuestionController@update')->name('update.question');
Route::auth();
