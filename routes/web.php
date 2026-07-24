<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file contains the web routes for the application. Routes are grouped
| by purpose for easier maintenance and readability.
|
*/

// Public home and verified pages
Route::get('/', 'HomeController@index')->name('home')->middleware('verified');
Route::get('/stream', 'HomeController@stream')->name('stream')->middleware('verified');

// Authentication routes with email verification enabled
Auth::routes(['verify' => true]);

// Authenticated resource routes
Route::middleware(['auth'])->group(function () {
    Route::resource('courses', 'CourseController');
    Route::resource('roles', 'RoleController');
    Route::resource('lessons', 'LessonController')->except('create');
    Route::get('/lessons/create/{course}', 'LessonController@create')->name('lessons.create');
});

// File manager routes
Route::prefix('laravel-filemanager')
    ->middleware(['web', 'auth'])
    ->group(function () {
        \UniSharp\LaravelFilemanager\Lfm::routes();
    });
