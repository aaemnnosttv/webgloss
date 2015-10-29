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

use App\Term;

Route::get('/', 'PagesController@home')->name('home');

Route::get('define', 'TermsController@create');

Route::resource('term', 'TermsController');

Route::get('terms', 'TermsController@index')->name('terms');

// show the form for adding a new alias
Route::get('term/{id}/alias', 'TermAliasesController@create');
// alias form endpoint
Route::post('term/{id}/aliases', 'TermAliasesController@store');
