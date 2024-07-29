<?php

use App\Http\Controllers\Api\DownloadControllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::get('listdownload',[DownloadControllers::class, 'ListeTelechargement']);
Route::post('newdownload',[DownloadControllers::class, 'AjoutTelechargement']);
Route::delete('deletedownload/{id}',[DownloadControllers::class, 'Suppression']);
Route::put('taille/{nom}',[DownloadControllers::class, 'ModificationStatusEnTaille']);
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
