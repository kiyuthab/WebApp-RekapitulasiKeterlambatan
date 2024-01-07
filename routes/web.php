<?php

use App\Http\Controllers\StudentController;
use App\Http\Controllers\LateController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RayonController;
use App\Http\Controllers\RombelController;
use Illuminate\Support\Facades\Route;

Route::middleware(['IsGuest'])->group(function() {
    Route::get('/', function() {
        return view('login');
    })->name('login');
    Route::post('/login', [UserController::class, 'loginAuth'])->name('login.auth');
});

Route::get('/error-permission', function() {
    return view('errors.permission');
})->name('error.permission');

Route::middleware(['IsLogin'])->group(function () {
    Route::get('/logout', [UserController::class, 'logout'])->name('logout');
    Route::get('/homes', function () {
        return view('index');
    })->name('homes');
});

Route::middleware('IsLogin', 'IsAdmin')->group(function() {
    Route::get('/home', function () {
        return view('admin.home');
    })->name('home.pages');

    Route::prefix('/late')->name('late.')->group(function() {
        Route::get('/', [LateController::class, 'index'])->name('home');
        //crud
        Route::get('/create', [LateController::class, 'create'])->name('create');
        Route::post('/store', [LateController::class, 'store'])->name('store');
        Route::get('late/{id}', [LateController::class, 'edit'])->name('edit');
        Route::patch('/{id}', [LateController::class, 'update'])->name('update');
        Route::delete('/late/{id}', [LateController::class, 'destroy'])->name('delete');

        //pdf
        Route::get('/print/{id}', [LateController::class, 'print'])->name('print');
        Route::get('/download/{id}', [LateController::class, 'downloadPDF'])->name('download_pdf');

        //detail
        Route::get('/rekap/{id?}', [LateController::class, 'laterekap'])->name('rekap');
        Route::get('/detail/{id}', [LateController::class, 'detail'])->name('detail');

        //excel
        Route::get('/data', [LateController::class, 'data'])->name('data');
        Route::get('/export-excel', [LateController::class, 'exportExcel'])->name('export-excel');
    });

    Route::prefix('/user')->name('user.')->group(function () {
        Route::get('/create', [UserController::class, 'create'])->name('create');
        Route::post('/store', [UserController::class, 'store'])->name('store');
        Route::get('/', [UserController::class, 'index'])->name('home');
        Route::get('/{id}', [UserController::class, 'edit'])->name('edit');
        Route::patch('/{id}', [UserController::class, 'update'])->name('update');
        Route::delete('/{id}', [UserController::class, 'destroy'])->name('delete');
    });

    Route::prefix('/rayon')->name('rayon.')->group(function () {
        Route::get('/create', [RayonController::class, 'create'])->name('create');
        Route::post('/store', [RayonController::class, 'store'])->name('store');
        Route::get('/search', [RayonController::class, 'search'])->name('search');
        Route::get('/', [RayonController::class, 'index'])->name('home');
        Route::get('/{id}', [RayonController::class, 'edit'])->name('edit');
        Route::patch('/{id}', [RayonController::class, 'update'])->name('update');
        Route::delete('/{id}', [RayonController::class, 'destroy'])->name('delete');
    });

    Route::prefix('/rombel')->name('rombel.')->group(function () {
        Route::get('/create', [RombelController::class, 'create'])->name('create');
        Route::post('/store', [RombelController::class, 'store'])->name('store');
        Route::get('/', [RombelController::class, 'index'])->name('home');
        Route::get('/{id}', [RombelController::class, 'edit'])->name('edit');
        Route::patch('/{id}', [RombelController::class, 'update'])->name('update');
        Route::delete('/{id}', [RombelController::class, 'destroy'])->name('delete');
    });

    Route::prefix('/student')->name('student.')->group(function () {
        Route::get('/create', [StudentController::class, 'create'])->name('create');
        Route::post('/store', [StudentController::class, 'store'])->name('store');
        Route::get('/search', [StudentController::class, 'search'])->name('search');
        Route::get('/', [StudentController::class, 'index'])->name('home');
        Route::get('/{id}', [StudentController::class, 'edit'])->name('edit');
        Route::patch('/{id}', [StudentController::class, 'update'])->name('update');
        Route::delete('/{id}', [StudentController::class, 'destroy'])->name('delete');
    });
});

Route::middleware(['IsLogin', 'IsPs'])->group(function() {
    Route::prefix('/ps')->name('ps.')->group(function() {
        Route::get('/home', [RayonController::class, 'dashboard'])->name('home');

        Route::prefix('/student')->name('student.')->group(function() {
            Route::get('/', [StudentController::class, 'indexPs'])->name('home');
        });

        Route::prefix('/late')->name('late.')->group(function() {
            Route::get('/', [LateController::class, 'indexPs'])->name('home');
            //detail
            Route::get('/rekap/{id?}', [LateController::class, 'laterekapPs'])->name('rekap');
            Route::get('/detail/{id}', [LateController::class, 'detailPs'])->name('detail');
            //pdf
            Route::get('/print/{id}', [LateController::class, 'printPs'])->name('print');
            Route::get('/download/{id}', [LateController::class, 'downloadPDFps'])->name('download_pdf');
            //excel
            Route::get('/data', [LateController::class, 'dataPs'])->name('data');
            Route::get('/export-excel', [LateController::class, 'exportExcelPs'])->name('export-excel');
        });

    });
});
