<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\FactureController;
use App\Http\Controllers\PaiementController;
use App\Http\Controllers\PrestationController;
use App\Http\Controllers\ReglementController;
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

Route::get('/facturation/creer', [FactureController::class, 'index']);
Route::post('/facturation/creer', [FactureController::class, 'creer']);
Route::post('/paiement', [PaiementController::class, 'creer']);
Route::post('/paiement/import', [PaiementController::class, 'importData']);
Route::get('/facturation/factures', [FactureController::class, 'liste']);
Route::get('/facturation/factures/{id}', [FactureController::class, 'details']);
Route::get('/facturation/factures/{id}/delete', [FactureController::class, 'delete']);
Route::get('/facturation/factures/{id}/envoi', [FactureController::class, 'envoi']);
Route::get('/parametrage/client', function () {
    return view('parametrage.client');
});
Route::get('/', function () {
    return redirect('/facturation/factures');
});
Route::get('/parametrage/reglement', function () {
    return view('parametrage.reglement');
})->name("Reglement");
Route::get('/facturation/comptes', [FactureController::class, 'index1']);
Route::post('/facturation/comptes', [PaiementController::class, 'getFacturesCompte']);
Route::get('/parametrage/prestation', function () {
    return view('parametrage.prestation');
});
Route::post('/parametrage/client', [ClientController::class,'creer'])->name('creerClient');
Route::post('/parametrage/prestation', [PrestationController::class, 'creer'])->name('creerPrestation');
Route::post('/parametrage/reglement', [ReglementController::class, 'creer'])->name('creerReglement');