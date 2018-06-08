<?php

use App\Http\Controllers\Map\MapController;
use App\Map;

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

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/mapas', function(){
		return (new MapController)->index();
})->name('map.index');

Route::post('/mapas', 'Map\MapController@store')->name('map.store');

Route::get('mapa/{map}/json', function(Map $map){
	return (new MapController)->getMapJson($map);
})->name('map.getJson');



Route::get('minas/', function(){
	$geojson = Storage::get('maps/Vegetação Minas Gerais.json');
	return view('maps.minas-gerais')->with($geojson, 'geojson');
})->name('map.show.minas-gerais');