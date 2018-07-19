<?php

Route::get('/',    'SiteController@index')->name('front-page');
Route::get('home', 'SiteController@index');
Route::get('hjem', 'SiteController@index')->name('home');

Route::get('kontakt',     'SiteController@contact')->name('contact');
Route::get('kontakt-oss', 'SiteController@contact');
Route::post('kontakt',     'SiteController@contact_form');
Route::get('om',          'SiteController@about')->name('about');
Route::get('om-oss',      'SiteController@about');

Route::get('personvern', 'SiteController@index')->name('privacy');
Route::get('gdpr',       'SiteController@index');

Route::prefix('tjenester')->group(function () {
	Route::get('/', 'SiteController@services')->name('services');
	Route::get('/oversikt', 'SiteController@services');
	Route::get('web-design', 'SiteController@services')->name('services.web-design');

	Route::prefix('markedsforing')->group(function () {
		Route::get('/', 'SiteController@services');
		Route::get('google-adwords', 'SiteController@index')->name('services.marketing.google-adwords');
	});
});

Route::prefix('referanser')->group(function () {
	Route::get('/', 'SiteController@references')->name('references');
});

Route::prefix('prosjekter')->group(function () {
	Route::get('/', 'SiteController@projects')->name('projects');
});

Route::prefix('blog')->group(function () {
		Route::get('/', 'SiteController@blog')->name('blog');
		Route::get('windows-10-slett-midlertidige-filer', 'SiteController@index');
		Route::get('mac-2-dropbox-kontoer', 'SiteController@index');
});
