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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



//Admin Side
Route::prefix('admin')->middleware(['auth','isAdmin'])->group(function () {

    Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index']);


    Route::get('/ManageStage',[App\Http\Controllers\Admin\ManageStageController::class,'index']);

    Route::get('/EditStage',[App\Http\Controllers\Admin\ManageStageController::class,'edit']);

});




//Client Side
Route::any('/inscription', [App\Http\Controllers\StageaireController::class, 'indexCondidatureSP'])->name('stageaire.indexSP');

//Route::any('/storeStage', [App\Http\Controllers\StageaireController::class, 'storeStage'])->name('stageaire.storeStage');

Route::post('/condidatur-sp/checkCIN', [App\Http\Controllers\StageaireController::class, 'checkCIN'])->name('stageaire.checkCIN');





//Route::any('/questionnaire', [App\Http\Controllers\StageaireController::class, 'indexquest'])->name('stageaire.questionnaire');
