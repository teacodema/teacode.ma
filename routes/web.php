<?php

use Illuminate\Support\Facades\Route;

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

// 6months => max_age = 60 * 60 * 24 * 183
Route::middleware('cache.headers:public;max_age=15811200;etag')->group(function () {

    // \Auth::routes();


    Route::group(['prefix' => 'admin'], function () {

        Route::get('/login', 'Auth\LoginController@showLoginForm');
        Route::post('/login', 'Auth\LoginController@login')->name('login');

        Route::group(['middleware' => 'auth'], function() {
            Route::get('/assets/{type}', 'ActionController@getAssets');
            Route::get('/actions', 'ActionController@getActions')->name('actions');
            Route::get('/events', 'ActionController@getEvents')->name('events.index');
            Route::get('/calendar', 'ActionController@calendar');
            Route::get('/events/{event}', 'ActionController@getEvent')->name('events.get');
            Route::post('/events', 'ActionController@addEvent')->name('events.store');
            Route::put('/events/{event}', 'ActionController@updateEvent')->name('events.update');
            Route::delete('/events/{event}', 'ActionController@destroyEvent')->name('events.delete');
            Route::post('/logout', 'Auth\LoginController@logout')->name('logout');
        });
    });

    Route::get('/', 'HomeController@home');

    // Pages
    Route::get('/p/{page}', 'PageController@getPage');

    // SiteMap
    Route::get('/sitemap', 'SitemapController@sitemap');
    Route::get('/generateSitemap', 'SitemapController@generateSitemap');

    // External
    Route::get('/{link}', 'GotoController@goto');

    Route::group(['prefix' => 'api'], function () {
        Route::get('/events', 'ApiController@getEvents');
        Route::get('/events/next', 'ApiController@getNextEvent');
    });

    Route::any('/{var}', 'HomeController@home')->where('var', '.*');
});
