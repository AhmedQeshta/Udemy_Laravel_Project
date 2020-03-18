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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/contacts', function () {
        return "<h1>All contacts</h1>";
    })->name('contacts.index');
    
Route::get('/contacts/create', function () {
    return "<h1>Add new contact</h1>";
    })->name('contacts.create');

Route::get('/contacts/{id}', function ($id) {
    return App\Contact::find($id);
    })->name('contacts.show');

