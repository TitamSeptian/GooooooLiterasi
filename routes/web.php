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

Route::get('/', 'UniversalController@index')->name('home');
Route::get('u/login', 'UniversalController@login')->name('my.login');
Route::get('/u/register', 'UniversalController@register')->name('my.register');
Route::get('/side', 'HomeController@index')->middleware('auth')->name('side.dash');
Route::post('u/logout', 'UniversalController@custonLogout')->name('my.logout');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
// Route::get('/h', 'HomeController@index')->name('home.2');

Route::group(['middleware' => ['auth', 'CheckRole:admin']],function(){
	// yang di lakukan admin
	Route::get('/d/rq', 'ReqController@requestDatatables')->name('req.data');
	Route::get('a/rq/permintaan', 'ReqController@index')->name('req.index');

	Route::resource('u/us/user', 'UserLoginController');
	Route::put('u/us/user/updt/{id}', 'UserLoginController@userUpdate')->name('update2');
	Route::get('d/us', 'UserLoginController@userDatatables')->name('user.data');

	// Laporan
	// Lapor Request
	Route::get('pdf/lap', 'UniversalController@lapPdfResult')->name('pdf.lap');
	// Route::get('pdf/lap-bulan', 'UniversalController@lapPdfBulan')->name('pdf.lap.bulan');
	// Route::get('pdf/lap-buku', 'UniversalController@lapPdf')->name('pdf.lap');
});

Route::group(['middleware' => ['auth', 'CheckRole:admin,user']],function(){
	// yang di lakukan User dan Admin
	Route::resource('u/bk/buku', 'BukuController');
	Route::get('d/bk', 'BukuController@bukuDatatables')->name('buku.data');
	Route::get('delete/u/bk/{id}', 'BukuController@destroy')->name('buku.delete');

	Route::resource('u/k/kategori', 'KategoriController');
	Route::get('d/kt', 'KategoriController@KategoriDatatables')->name('kategori.data');
	Route::get('kategori/u/{id}', 'KategoriController@destroy')->name('kategori.delete');

	Route::resource('u/j/jenis', 'JenisController');
	Route::get('d/js', 'JenisController@jenisDatatables')->name('jenis.data');
	Route::get('jenis/u/js/{id}', 'JenisController@destroy')->name('jenis.delete');
	Route::get('ud/about', 'UniversalController@about')->name('about');

});

Route::get('/pilih', 'UniversalController@pilih')->name('pilih');
Route::post('/pilih/result', 'UniversalController@pilih_buku')->name('pilih.rs');
Route::get('detail/buku/{id}', 'UniversalController@detail')->name('pilih.detail');
// Route::get('/pilih/{jenis}/{kategori}/{min}/{max}/{harga}/{tahun_tebit}', 'UniversalController@pilih')->name('pilih.rs.get');