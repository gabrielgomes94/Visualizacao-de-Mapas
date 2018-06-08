<?php

use App\Http\Controllers\Layer\LayerController;
use App\Layer;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('mapa/{map}/', function(Map $map){
	return (new MapController)->show($map);
})->name('map.show');

Route::get('mapa/{map}/camada/{layer}', function(Map $map, Layer $layer){
	return (new MapController)->show($map);
})->name('map.show');

//Layer
Route::get('camada/{layer}', function(Layer $layer){
	return (new LayerController)->get($layer);
})->name('layer.show');