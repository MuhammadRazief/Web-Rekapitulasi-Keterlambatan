<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RombelsController;
use App\Http\Controllers\RayonsController;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\LatesController;
use App\Http\Controllers\HomeController;

Route::middleware('IsGuest')->group(function () {
    Route::get('/', function() {
        return view('login');
    })->name('login');
    Route::post('/login', [UserController::class, 'loginAuth'])->name('login.auth');
});

Route::middleware(['IsLogin'])->group(function() {
    Route::get('/logout', [UserController::class, 'logout'])->name('logout');

    Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::prefix('/siswas')->name('siswas.')->group(function () {
        Route::get('/', [StudentsController::class, 'index'])->name('index');
        Route::get('/create', [StudentsController::class, 'create'])->name('create');
        Route::post('/store', [StudentsController::class, 'store'])->name('store');
        Route::get('/edit/{students}', [StudentsController::class, 'edit'])->name('edit');
        Route::patch('/update/{students}', [StudentsController::class, 'update'])->name('update');
        Route::delete('/delete/{students}', [StudentsController::class, 'delete'])->name('delete');
    });

    Route::prefix('/latest')->name('latest.')->group(function () {
        Route::get('/', [LatesController::class, 'index'])->name('index');
        Route::get('/create', [LatesController::class, 'create'])->name('create');
        Route::post('/store', [LatesController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [LatesController::class, 'edit'])->name('edit');
        Route::patch('/update/{id}', [LatesController::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [LatesController::class, 'destroy'])->name('delete');
        Route::get('/detail/{id}', [LatesController::class, 'detail'])->name('detail');
        Route::get('/pdf{id}', [LatesController::class, 'pdf'])->name('pdf');

    });

    Route::middleware('IsAdmin')->group(function(){
        Route::prefix('/rombels')->name('rombels.')->group(function () {
            Route::get('/', [RombelsController::class, 'index'])->name('index');
            Route::get('/create', [RombelsController::class, 'create'])->name('create');
            Route::post('/store', [RombelsController::class, 'store'])->name('store');
            Route::get('/edit/{rombel}', [RombelsController::class, 'edit'])->name('edit');
            Route::patch('/update/{rombel}', [RombelsController::class, 'update'])->name('update');
            Route::delete('/delete/{rombel}', [RombelsController::class, 'delete'])->name('delete');
        });

        Route::prefix('/rayons')->name('rayons.')->group(function () {
            Route::get('/', [RayonsController::class, 'index'])->name('index');
            Route::get('/create', [RayonsController::class, 'create'])->name('create');
            Route::post('/store', [RayonsController::class, 'store'])->name('store');
            Route::get('/edit/{rayons}', [RayonsController::class, 'edit'])->name('edit');
            Route::patch('/update/{rayons}', [RayonsController::class, 'update'])->name('update');
            Route::delete('/delete/{rayons}', [RayonsController::class, 'delete'])->name('delete');
        });

        Route::prefix('/users')->name('users.')->group(function () {
            Route::get('/', [UserController::class, 'index'])->name('index');
            Route::get('/create', [UserController::class, 'create'])->name('create');
            Route::post('/store', [UserController::class, 'store'])->name('store');
            Route::get('/edit/{id}', [UserController::class, 'edit'])->name('edit');
            Route::patch('/update/{id}', [UserController::class, 'update'])->name('update');
            Route::delete('/delete/{id}', [UserController::class, 'destroy'])->name('delete');
        });
    });
});
