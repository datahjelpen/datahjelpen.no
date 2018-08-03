<?php

Route::get('/',    'SiteController@index')->name('front-page');
Route::get('home', 'SiteController@index');
Route::get('hjem', 'SiteController@index')->name('home');

Route::get('goodbye', function () {
	return view('auth.logout-success');
})->name('goodbye');

// Auth routes
Auth::routes();

// Reauthentication routes (also used for 2fa)
Route::get('auth/reauthenticate', 'Reauthenticates@getReauthenticate')->name('reauthenticate.show');
Route::post('auth/reauthenticate', 'Reauthenticates@postReauthenticate')->name('reauthenticate.post');
Route::post('auth/send-confirmation-code', 'Reauthenticates@sendConfirmationCode')->name('reauthenticate.send_confirmation_code');
Route::get('auth/send-confirmation-code', 'Reauthenticates@getReauthenticate');
Route::post('auth/deauthenticate', 'Reauthenticates@deauthenticate')->name('reauthenticate.deauthenticate');

// Socialite routes
Route::get('login/{provider}/terms-of-service',  'Auth\LoginController@oauthTos')->name('login.oauth.tos');
Route::post('login/{provider}/complete-signup', 'Auth\LoginController@oauthComplete')->name('login.oauth.complete');
Route::get('login/{provider}', 'Auth\LoginController@redirectToProvider')->name('login.oauth');
Route::get('login/{provider}/callback', 'Auth\LoginController@handleProviderCallback')->name('login.oauth.callback');

// User
Route::prefix('konto')->group(function () {
	Route::get('/',          'UserController@show')->name('user');
	Route::get('rediger',    'UserController@edit')->name('user.edit');
	Route::patch('oppdater', 'UserController@update')->name('user.update');
	Route::patch('oppdater-sensitiv', 'UserController@update_sensitive')->name('user.update_sensitive');
	Route::get('slett',      'UserController@delete')->name('user.delete');
	Route::delete('slett',   'UserController@destroy')->name('user.destroy');
	Route::get('konto-slettet',      'UserController@deleted')->name('user.deleted');

	Route::prefix('innstillinger')->group(function () {
		Route::get('/',          'UserController@show_settings')->name('user.settings');


		Route::prefix('sikkerhet')->group(function () {
			Route::get('/',  'UserController@show_settings_security')->name('user.settings.security');

			Route::get('bekreft/{token}', 'UserController@verify')->name('user.verify');

			Route::get('2fa-oppsett',  'UserController@setup_2fa')->name('user.setup_2fa');
			Route::post('2fa-oppsett', 'UserController@setup_2fa_complete')->name('user.setup_2fa_complete');

			Route::get('2fa-deaktiver',  'UserController@disable_2fa')->name('user.disable_2fa');
			Route::post('2fa-deaktiver', 'UserController@disable_2fa_complete')->name('user.disable_2fa_complete');

			Route::post('2fa-ny-hemmelighet', 'UserController@setup_2fa_new_secret')->name('user.setup_2fa_new_secret');
		});
	});
});

Route::prefix('dashboard')->group(function () {
	Route::get('/', 'DashboardController@index')->name('dashboard');
});

Route::get('kontakt',     'SiteController@contact')->name('contact');
Route::get('kontakt-oss', 'SiteController@contact');
Route::post('kontakt',     'SiteController@contact_form');
Route::get('om',          'SiteController@about')->name('about');
Route::get('om-oss',      'SiteController@about');

Route::get('tjenestevilkar', 'SiteController@privacy_policy')->name('tos');
Route::get('tjenestevilkår', 'SiteController@privacy_policy');

Route::prefix('personvern')->group(function () {
	Route::get('/', 'SiteController@privacy_landing')->name('privacy');

	Route::get('personvernerklaring', 'SiteController@privacy_policy')->name('privacy.policy');
	Route::get('personvernerklæring', 'SiteController@privacy_landing');
	Route::get('personvernerklaring#cookies', 'SiteController@privacy_policy')->name('privacy.cookies');
	Route::get('databehandleravtale', 'SiteController@privacy_dpa')->name('privacy.dpa');
});

Route::prefix('tjenester')->group(function () {
	Route::get('/', 'SiteController@services')->name('services');
	Route::get('/oversikt', 'SiteController@services');
	Route::get('web-design', 'SiteController@services')->name('services.web-design');

	Route::prefix('markedsforing')->group(function () {
		Route::get('/', 'SiteController@services');
		Route::get('google-adwords', 'SiteController@services_marketing_google_adwords')->name('services.marketing.google-adwords');
	});
});

Route::prefix('referanser')->group(function () {
	Route::get('/', 'SiteController@references')->name('references');
});

Route::prefix('prosjekter')->group(function () {
	Route::get('/', 'SiteController@projects')->name('projects');
});

Route::prefix('blog')->group(function () {
		Route::get('/', 'BlogController@index')->name('blog');

		Route::get('dashboard', 'BlogController@dashboard')->name('blog.dashboard');

		Route::get('ny',   'BlogController@create')->name('blog.create');
		Route::post('opprett',   'BlogController@store')->name('blog.store');

		Route::prefix('{entry}')->group(function () {
			Route::get('/',          'BlogController@show')->name('blog.show');
			Route::get('rediger',    'BlogController@edit')->name('blog.edit');
			Route::patch('oppdater', 'BlogController@update')->name('blog.update');
			Route::get('slett',      'BlogController@delete')->name('blog.delete');
			Route::delete('slett',   'BlogController@destroy')->name('blog.destroy');
		});

		Route::get('windows-10-slett-midlertidige-filer', 'BlogController@blog1');
		Route::get('mac-2-dropbox-kontoer', 'BlogController@blog2');
});
