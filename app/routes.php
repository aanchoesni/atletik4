<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
 */

Route::get('/', 'FrontController@index');

Route::get('login', array('as' => 'login', 'uses' => 'LoginController@index'));
Route::post('authenticate', 'HomeController@authenticate');
Route::get('logout', 'HomeController@logout');
Route::get('activate', array('as' => 'activate', 'uses' => 'AdminsController@activate'));
Route::get('registrasi', 'RegistrasiController@index');
Route::post('register', 'RegistrasiController@store');
Route::get('forgot', 'HomeController@forgot');
Route::post('sendresetcode', array('as' => 'sendresetcode', 'uses' => 'HomeController@sendResetCode'));
Route::get('reset', array('as' => 'guest.createnewpassword', 'uses' => 'HomeController@createNewPassword'));
Route::post('reset', array('as' => 'guest.storenewpassword', 'uses' => 'HomeController@storeNewPassword'));
Route::get('download', 'DocumentsController@downloadindex');
Route::get('download/{data}', array('as' => 'download', 'uses' => 'DocumentsController@downloaddocument'));

Route::group(array('before' => 'auth'), function () {
    Route::get('dashboard', 'HomeController@index');
    Route::group(array('prefix' => 'admin', 'before' => 'admin'), function () {
        Route::resource('positions', 'PositionsController');
        Route::resource('admins', 'AdminsController');
        Route::resource('schools', 'SchoolsController');
        Route::get('schools/indexdetail/{id}', array('as' => 'admin.schools.indexdetail', 'uses' => 'SchoolsController@indexdetail'));
        Route::get('atlit', array('as' => 'admin.atlit', 'uses' => 'SchoolsController@atlit'));
        Route::get('atlitok', array('as' => 'admin.atlitok', 'uses' => 'SchoolsController@atlitok'));
        Route::resource('settings', 'SettingsController');
        Route::put('schools/notverifikasi/{id}', array('as' => 'admin.schools.notverifikasi', 'uses' => 'SchoolsController@notverifikasi'));
        Route::put('schools/verifikasi/{id}', array('as' => 'admin.schools.verifikasi', 'uses' => 'SchoolsController@verifikasi'));
        Route::get('valid', array('as' => 'admin.valid', 'uses' => 'ValidController@index'));
        Route::get('validasi/{id}', array('as' => 'admin.validasi', 'uses' => 'ValidController@validasi'));
        Route::get('notvalidasi/{id}', array('as' => 'admin.notvalidasi', 'uses' => 'ValidController@notvalidasi'));
        Route::resource('sequents', 'SequentsController');
        Route::resource('sponsors', 'SponsorsController');
        Route::resource('seris', 'SerisController');
        Route::resource('skema', 'SkemasController');
        Route::get('kelolaskema', array('as' => 'admin.kelolaskema', 'uses' => 'SkemasController@kelolaskema'));
        Route::post('nocontestdata', array('as' => 'admin.nocontestdata', 'uses' => 'SkemasController@postdata'));
        Route::get('indexcetakskema', array('as' => 'admin.indexcetakskema', 'uses' => 'SkemasController@indexcetak'));
        Route::get('cetakskema', array('as' => 'admin.cetakskema', 'uses' => 'SkemasController@exportskema'));
        Route::resource('documents', 'DocumentsController');
        Route::resource('rekors', 'RekorsController');
        Route::get('schools/pendamping/{id}', array('as' => 'admin.schools.pendamping', 'uses' => 'SchoolsController@pendamping'));
        Route::get('profile', 'AdminsController@profile');
        Route::put('admins/updateprofile/{id}', array('as' => 'admin.admins.updateprofile', 'uses' => 'AdminsController@updateprofile'));
        Route::get('daftarsekolah', array('as' => 'admin.daftarsekolah', 'uses' => 'SchoolsController@daftarsekolah'));
        Route::get('daftarsekolah/delete/{id}', 'SchoolsController@destroy');
        Route::resource('logs', 'LogsController');
        Route::get('contesta/delete/{id}', 'SchoolsController@destroycontesta');
        Route::get('contest/delete/{id}', 'SchoolsController@destroycontest');
        Route::get('delpayment/delete/{id}', 'PaymentsController@destroyer');
        Route::get('atlitallv', array('as' => 'admin.atlitallv', 'uses' => 'SchoolsController@atlitallv'));
        Route::get('cetakatlet', array('as' => 'admin.cetakatlet', 'uses' => 'SchoolsController@exportatlet'));
        Route::get('cetakadmin', array('as' => 'admin.cetakadmin', 'uses' => 'AdminsController@exportadmin'));
        Route::get('sertifikatatlet', array('as' => 'admin.sertifikatatlet', 'uses' => 'SchoolsController@atlitser'));
        Route::get('cetakseratlet', array('as' => 'admin.cetakseratlet', 'uses' => 'SchoolsController@exportseratlet'));
        Route::get('rekappendamping', array('as' => 'admin.rekappendamping', 'uses' => 'OfficersController@rekappendamping'));
        Route::get('cetakrekappendamping', array('as' => 'admin.cetakrekappendamping', 'uses' => 'OfficersController@exportrekappendamping'));
        Route::get('bukudokumentasi', array('as' => 'admin.bukudokumentasi', 'uses' => 'OfficersController@bukudokumentasi'));
        Route::get('cetakdocbook', array('as' => 'admin.cetakdocbook', 'uses' => 'OfficersController@exportdocbook'));
        Route::resource('logbooks', 'LogbooksController');
        Route::get('logbookso', array('as' => 'admin.logbookso', 'uses' => 'LogbooksController@indexo'));
        Route::get('cetaklogbook', array('as' => 'admin.cetaklogbook', 'uses' => 'LogbooksController@exportlogbook'));
        Route::get('mahasiswacetaklogbook', array('as' => 'admin.mahasiswacetaklogbook', 'uses' => 'LogbooksController@mahasiswacetaklogbook'));

    });
    Route::group(array('prefix' => 'panitia', 'before' => 'panitia'), function () {
        Route::resource('positions', 'PositionsController');
        Route::resource('admins', 'AdminsController');
        Route::resource('schools', 'SchoolsController');
    });
    Route::group(array('prefix' => 'user', 'before' => 'user'), function () {
        Route::get('contest/createf/{id}', 'ContestsController@create2');
        Route::get('contest/indexthn', array('as' => 'user.contest.indexthn', 'uses' => 'ContestsController@indexthn'));
        Route::resource('contests', 'ContestsController');
        Route::get('officer/indexthn', array('as' => 'user.officer.indexthn', 'uses' => 'officersController@indexthn'));
        Route::get('officer/create', array('as' => 'user.officer.create', 'uses' => 'officersController@create'));
        Route::resource('officers', 'OfficersController');
        Route::get('cost', 'CostController@index');
        Route::get('invoice', 'CostController@invoice');
        Route::resource('payment', 'PaymentsController');
        Route::resource('docbook', 'DocbookController');
        Route::get('profile', array('as' => 'user.profile.index', 'uses' => 'ProfileController@index'));
        Route::put('profile/update/{id}', array('as' => 'user.profile.update', 'uses' => 'ProfileController@update'));
        Route::get('editpassword', array('as' => 'editpassword', 'uses' => 'HomeController@editPassword'));
        Route::post('updatepassword', array('as' => 'updatepassword', 'uses' => 'HomeController@updatePassword'));
    });
});
