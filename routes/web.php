<?php

Route::get('/',    'SiteController@index')->name('front-page');
Route::get('home', 'SiteController@index');
Route::get('hjem', 'SiteController@index')->name('home');

Route::get('kontakt',     'SiteController@index')->name('contact');
Route::get('kontakt-oss', 'SiteController@index');
Route::get('om',          'SiteController@index')->name('about');
Route::get('om-oss',      'SiteController@index');

Route::prefix('tjenester')->group(function () {
	Route::get('/', 'SiteController@index')->name('services');
	Route::get('/oversikt', 'SiteController@index');
	Route::get('web-design', 'SiteController@index')->name('services.web-design');

	Route::prefix('markedsforing')->group(function () {
		Route::get('/', 'SiteController@index');
		Route::get('google-adwords', 'SiteController@index')->name('services.marketing.google-adwords');
	});
});

Route::prefix('referanser')->group(function () {
	Route::get('/', 'SiteController@index')->name('references');
});

Route::prefix('blog')->group(function () {
		Route::get('/', 'SiteController@index')->name('blog');
		Route::get('windows-10-slett-midlertidige-filer', 'SiteController@index');
		Route::get('mac-2-dropbox-kontoer', 'SiteController@index');
});
