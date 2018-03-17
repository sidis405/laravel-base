<?php

Route::view('/', 'welcome');

Route::resource('posts', 'PostsController');
Route::resource('comments', 'CommentsController')->only('store', 'update', 'destroy');
Route::resource('categories', 'CategoriesController')->only('index', 'show');
Route::resource('tags', 'TagsController')->only('index', 'show');


//REST

//  /taksk - GET - index                listare tutte
//  /tasks/{task} - GET - show          listare singola
//  /tasks/create - GET - create        form creazione
//  /tasks - POST - store               salvataggio nuova risorsa
//  /tasks/{task}/edit - GET - edit     form mofica
//  /tasks/{task} - PATCH - update      aggiornamento risorsa modificata
//  /tasks/{task} - DELETE - destroy    cancellare risorsa

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
