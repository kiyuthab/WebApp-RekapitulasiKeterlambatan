<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RombelController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\RayonController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LateController;
use App\Http\Controllers\Controller;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::middleware(['isLogin'])->group(function(){
//     Route::get('/home', function(){
//         return view('home');
//     })->name('home.page');
// });

Route::middleware('isGuest')->group(function(){
    Route::get('/', function(){
        return view('login');
    })->name('login');
    Route::post('/login', [UserController::class, 'loginAuth'])->name('login.auth');
});

Route::get('/logout', [UserController::class, 'logout'])->name('logout');

// Route::prefix('/')->name('home.')->group(function(){
//     Route::get('/Dashboard', [Controller::class, 'index'])->name('dashboard');
// });

Route::get('/error-permission', function(){
    return view('errors.permission');
})->name('error.permission');

Route::middleware('isLogin', 'isAdmin')->group(function(){
    Route::get('/Dashboard', [Controller::class, 'index'])->name('dashboard');
    
    // routing fitur data rombel
    Route::prefix('/rombel')->name('rombel.')->group(function(){
        Route::get('/', [RombelController::class, 'index'])->name('home');
        Route::get('/create', [RombelController::class, 'create'])->name('create');
        Route::get('/create', [RombelController::class, 'create'])->name('create');
        Route::post('/store', [RombelController::class, 'store'])->name('store');
        Route::get('/{id}', [RombelController::class, 'edit'])->name('edit');
        Route::patch('/{id}', [RombelController::class, 'update'])->name('update');
        Route::delete('/{id}', [RombelController::class, 'destroy'])->name('delete');
    });
    
    // routing fitur data siswa
    Route::prefix('/student')->name('student.')->group(function(){
        Route::get('/', [StudentController::class, 'index'])->name('home');
        Route::get('/create', [StudentController::class, 'create'])->name('create');
        Route::post('/store', [StudentController::class, 'store'])->name('store');
        Route::get('/{id}', [StudentController::class, 'edit'])->name('edit');
        Route::patch('/{id}', [StudentController::class, 'update'])->name('update');
        Route::delete('/{id}', [StudentController::class, 'destroy'])->name('delete');
    });
    
    // routing fitur data rayon
    Route::prefix('/rayon')->name('rayon.')->group(function(){
        Route::get('/', [RayonController::class, 'index'])->name('home');
        Route::get('/create', [RayonController::class, 'create'])->name('create');
        Route::post('/store', [RayonController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [RayonController::class, 'edit'])->name('edit');
        Route::patch('/update/{id}', [RayonController::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [RayonController::class, 'destroy'])->name('delete');
    });
    
    // routing fitur data user
    Route::prefix('/user')->name('user.')->group(function(){
        Route::get('/', [UserController::class, 'index'])->name('home');
        Route::get('/create', [UserController::class, 'create'])->name('create');
        Route::post('/store', [UserController::class, 'store'])->name('store');
        Route::get('/{id}', [UserController::class, 'edit'])->name('edit');
        Route::patch('/{id}', [UserController::class, 'update'])->name('update');
        Route::delete('/{id}', [UserController::class, 'destroy'])->name('delete');
    });
    
    // routing fitur data keterlambatan
    Route::prefix('/late')->name('late.')->group(function(){
        Route::get('/', [LateController::class, 'index'])->name('home');
        Route::get('/create', [LateController::class, 'create'])->name('create');
        Route::post('/store', [LateController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [LateController::class, 'edit'])->name('edit');
        Route::patch('/update/{id}', [LateController::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [LateController::class, 'destroy'])->name('delete');
        Route::get('/rekap', [LateController::class, 'rekap'])->name('rekap');
        Route::get('/detail/{id}', [LateController::class, 'show'])->name('detail');
        Route::get('/print/{id}', [LateController::class, 'review'])->name('print');
        Route::get('/download/{id}', [LateController::class, 'downloadPDF'])->name('download');
        Route::get('/export-excel', [LateController::class, 'exportExcel'])->name('export-excel');
    });

    
});

Route::middleware('isLogin', 'isPs')->group(function(){
    Route::prefix('/ps')->name('ps.')->group(function(){
        Route::get('/home', function(){
            return view('welcome');
        })->name('home');

        oute::prefix('/student')->name('student.')->group(function() {
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