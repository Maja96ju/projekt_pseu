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

use App\Objava;

Route::get('/', function () {
    $data = Objava::select('id', 'naslov', 'sadrzaj')
        ->orderBy('id', 'desc')
        ->where('istaknuta', true)
        ->limit(5)
        ->get();

    return view('naslovnica')->with('zadnje_objave', $data);
})->name('naslovnica');

Auth::routes();

Route::get('/dobrodosli', 'HomeController@index')->name('dobrodosli');

/*
 * Grupirati ćemo rute koje ćemo zaštititi middlewareom "auth"
 */

Route::middleware('auth')->group(function () {
    /*
     * Rute za objave
     */
    Route::get('/objava', 'ObjavaController@prikaziSveObjave')->name('objava.prikaz');
    Route::get('/objava/dodaj', 'ObjavaController@prikaziFormu')->name('objava.forma');
    Route::get('/objava/uredi/{id}', 'ObjavaController@prikaziFormuUredi')->name('objava.uredi');
    Route::get('/objava/izbrisi/{id}', 'ObjavaController@izbrisi')->name('objava.izbrisi');

    // Iako je isti link kao gornja ruta, ipak se radi o različitim HTTP glagolima
    Route::post('/objava/dodaj', 'ObjavaController@dodaj')->name('objava.dodaj');
    Route::post('/objava/uredi/{id}', 'ObjavaController@uredi')->name('objava.uredi');


    /*
     * Rute za komentare
     */
    Route::get('/komentar', 'KomentarController@prikaziSveKomentare')->name('komentar.prikaz');
    Route::get('/komentar/dodaj', 'KomentarController@prikaziFormu')->name('komentar.forma');
    Route::get('/komentar/uredi/{id}', 'KomentarController@prikaziFormuUredi')->name('komentar.uredi');
    Route::get('/komentar/izbrisi/{id}', 'KomentarController@izbrisi')->name('komentar.izbrisi');

    Route::post('/komentar/dodaj', 'KomentarController@dodaj')->name('komentar.dodaj');
    Route::post('/komentar/uredi/{id}', 'KomentarController@uredi')->name('komentar.uredi');
});