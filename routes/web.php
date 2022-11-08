<?php

 
use App\Events\TestEvent;
use App\Events\VotingEvent;
use App\Http\Controllers\Auth\UserAuthController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\JurusanController;
use App\Http\Controllers\Backend\KandidatController;
use App\Http\Controllers\Backend\KelasController;
use App\Http\Controllers\Backend\PemilihController;
 
use App\Http\Controllers\ConfigController;
use App\Http\Controllers\Frontend\DashboardController as FrontendDashboardController;
use App\Http\Controllers\Frontend\VotingController;
use App\Http\Controllers\WelcomeController;
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

Route::get('send-notif/{name}', function ($name) {
    event(new VotingEvent($name));
    return "Event has been sent!";
});

Route::get('/', [WelcomeController::class,'index']);
Route::post('/login-user', [UserAuthController::class,'login'])->name('login_user');

Route::middleware(['auth','role:admin'])->group(function(){

    Route::prefix('backend')->name('backend.')->group(function(){

        Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');
        Route::get('/dashboard/ajax',[DashboardController::class,'ajax'])->name('dashboard.ajax');

        Route::prefix('/jurusan')->name('jurusan.')->group(function(){

            Route::get('/',[JurusanController::class,'index'])->name('index');
            Route::get('/create',[JurusanController::class,'create'])->name('create');
            Route::post('/store',[JurusanController::class,'store'])->name('store');
            Route::get('/delete/{id}',[JurusanController::class,'delete'])->name('delete');
            Route::get('/edit/{id}',[JurusanController::class,'edit'])->name('edit');
            Route::post('/update/{id}',[JurusanController::class,'update'])->name('update');

        });

        Route::prefix('/kelas')->name('kelas.')->group(function(){

            Route::get('/',[KelasController::class,'index'])->name('index');
            Route::get('/create',[KelasController::class,'create'])->name('create');
            Route::post('/store',[KelasController::class,'store'])->name('store');
            Route::get('/delete/{id}',[KelasController::class,'delete'])->name('delete');
            Route::get('/edit/{id}',[KelasController::class,'edit'])->name('edit');
            Route::post('/update/{id}',[KelasController::class,'update'])->name('update');

        });

        Route::prefix('/pemilih')->name('pemilih.')->group(function(){

            Route::get('/',[PemilihController::class,'index'])->name('index');
            Route::get('/create',[PemilihController::class,'create'])->name('create');
            Route::post('/store',[PemilihController::class,'store'])->name('store');
            Route::get('/delete/{id}',[PemilihController::class,'delete'])->name('delete');
            Route::get('/edit/{id}',[PemilihController::class,'edit'])->name('edit');
            Route::post('/update/{id}',[PemilihController::class,'update'])->name('update');

        });

        Route::prefix('/kandidat')->name('kandidat.')->group(function(){

            Route::get('/',[KandidatController::class,'index'])->name('index');
            Route::get('/create',[KandidatController::class,'create'])->name('create');
            Route::post('/store',[KandidatController::class,'store'])->name('store');
            Route::get('/delete/{id}',[KandidatController::class,'delete'])->name('delete');
            Route::get('/edit/{id}',[KandidatController::class,'edit'])->name('edit');
            Route::post('/update/{id}',[KandidatController::class,'update'])->name('update');

        });

        Route::prefix('config')->name('config.')->group(function () {
            Route::get('/', [ConfigController::class, 'index'])->name('index');
            Route::post('/', [ConfigController::class, 'store'])->name('store');
            Route::post('/', [ConfigController::class, 'update'])->name('update');
            Route::delete('/', [ConfigController::class, 'destroy'])->name('destroy');            
    });

    });

});

Route::middleware(['auth','role:user'])->group(function(){
    Route::get('/dashboard',[FrontendDashboardController::class,'index'])->name('dashboard');
    Route::get('/voting',[VotingController::class,'index'])->name('voting');
    Route::get('/voting/{id}',[VotingController::class,'store'])->name('voting.store');
});

require __DIR__.'/auth.php';
