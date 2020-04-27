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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Route::get('/tdee', function () {
//     return view('TDEE/tdee');
// });

Route::post('/upload', function(Request $request) {
    $file = $request->file('nama')->store('upload');
    return dd($filename);
});

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');
Route::resource('/admin/kategori', 'Admin\KategoriController')->middleware('auth');
Route::resource('/kategori','KategoriController')->middleware('auth');
Route::get('/kategori','KategoriController@index')->name('kategori')->middleware('auth');
Route::get('/kategori_menu','KategoriController@show');


Route::resource('/menu','MenuController')->middleware('auth');
Route::get('/menu','MenuController@index')->name('menu')->middleware('auth');
Route::get('/pilihkategori','MenuController@index')->name('menu')->middleware('auth');
Route::get('/menu_makanan','MenuController@show')->name('menu')->middleware('auth');



Route::resource('/KategorimenuDiet','DietKategoriController')->middleware('auth');
Route::get('/KategorimenuDiet','DietKategoriController@index')->name('kategori_diet')->middleware('auth');
Route::get('/Kategori_Menu_Diet','DietKategoriController@show')->name('kategori_diet')->middleware('auth');


Route::resource('/MenuDiet','MenuDietController')->middleware('auth');
Route::get('/MenuDiet','MenuDietController@index')->name('menu_diet')->middleware('auth');
Route::get('/Menu_diet','MenuDietController@show')->name('menu_diet')->middleware('auth');

Route::resource('/KategoriTipsTrik','TiptrikKategoriController')->middleware('auth');
Route::get('/KategoriTipsTrik','TiptrikKategoriController@index')->name('kategori_tipstrik')->middleware('auth');
Route::get('/Kategori_Tips_&_Trik','TiptrikKategoriController@show')->name('kategori_tipstrik')->middleware('auth');

Route::resource('/tips-and-trik','TipstrikController')->middleware('auth');
Route::get('/tips-and-trik','TipstrikController@index')->name('Tipstrik')->middleware('auth');

// Route::get('/tdee','TipstrikController@tdee')->name('Tipstrik');
// Route::post('/tdee1','TipstrikController@bmr')->name('Tipstrik');
Route::get('/tdee', 'TdeeController@index')->name('tdee.index')->middleware('auth');
Route::post('/new/tdee', 'TdeeController@store')->name('tdee.store')->middleware('auth');
Route::get('/tips-trik_','TipstrikController@edit')->name('Tipstrik')->middleware('auth');

Route::resource('/vid','VideoController')->middleware('auth');
Route::get('/vid','VideoController@index')->name('video')->middleware('auth');
Route::get('/vid_','VideoController@see')->name('video')->middleware('auth');
Route::get('/video_link','VideoController@show')->name('video')->middleware('auth');

Route::resource('/account', 'AkunController')->middleware('auth');
Route::get('/account','AkunController@index')->middleware('auth');

