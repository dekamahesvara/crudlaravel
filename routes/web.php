<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\ExtracurricularsController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Models\Student;

Route::get('/', function () {
    return redirect('/register');
});

// Auth Routes //
Route::middleware(['auth'])->group(function () {

    Route::group(["prefix" => "/auth/home"],function (){
        Route::get('/all', [HomeController::class,'index']);
        Route::get('/about', function () {
            return view('about',[
                "title" => "About",
                "nama" => "Deka",
                "kelas" => "11 PPLG 1",
            ]);
        });
        Route::get('/extracurricular', [ExtracurricularsController::class,'index']);
        Route::get('/me', function () {
            return view('me',[
                "title" => "Me"
            ]);
        });

        Route::group(["prefix" => "/student"],function (){
            Route::get('/student', [StudentsController::class,'index']);
            Route::get('/filter/{kelas_id}', [StudentsController::class, 'filter'])->name('filter_students_home');
        });
       
    
    });

   
    Route::get('/dashboard', [DashboardController::class,'index']);
    Route::post('/logout', [LoginController::class,'logout']);

    Route::group(["prefix" => "/dashboard/student"],function (){
        Route::get('/all', [StudentsController::class,'index']);
        Route::get('/detail/{student}',function (Student $student) {return $student;});
        Route::get('/create', [StudentsController::class,'create']);
        Route::post('/add', [StudentsController::class,'store']);
        Route::delete('/delete/{id}', [StudentsController::class, 'destroy']);
        Route::get('/edit{student}', [StudentsController::class, 'edit']);
        Route::post('/update/{student}', [StudentsController::class, 'update']);
        Route::get('/filter/{kelas_id}', [StudentsController::class, 'filter'])->name('filter_students_auth');
    });
    
    Route::group(["prefix" => "/dashboard/kelas"],function (){
        Route::get('/all', [KelasController::class,'index']);
        Route::get('/create', [KelasController::class,'create']);
        Route::post('/add', [KelasController::class,'store']);
        Route::delete('/delete/{id}', [KelasController::class, 'destroy']);
        Route::get('/edit{kelas}', [KelasController::class, 'edit']);
        Route::post('/update/{kelas}', [KelasController::class, 'update']);
    });
});

// Guest Routes //
 Route::middleware(['guest'])->group(function () {
    Route::get('/login', [LoginController::class,'index']) -> name('login');
    Route::post('/login', [LoginController::class,'authenticate']);
    Route::get('/register', [RegisterController::class, 'index']);
    Route::post('/register', [RegisterController::class,'store']);

    Route::group(["prefix" => "/guest/student"],function (){
        Route::get('/all', [StudentsController::class,'index']);
        Route::get('/filter/{kelas_id}', [StudentsController::class, 'filter'])->name('filter_students_guest');
    });
});






// Route::get('/about', function () {
//     return view('about',[
//         "title" => "About",
//         "nama" => "Deka",
//         "kelas" => "11 PPLG 1",
//     ]);
// });

// Route::get('/extracurricular', [ExtracurricularsController::class,'index']);

// Route::get('/me', function () {
//     return view('me',[
//         "title" => "Me"
//     ]);
// });

// Route::group(["prefix" => "/student"],function (){
//     Route::get('/all', [StudentsController::class,'index']);
//     Route::get('/detail/{student}',function (Student $student) {return $student;});
//     Route::get('/create', [StudentsController::class,'create']);
//     Route::post('/add', [StudentsController::class,'store']);
//     Route::delete('/delete/{id}', [StudentsController::class, 'destroy']);
//     Route::get('/edit{student}', [StudentsController::class, 'edit']);
//     Route::post('/update/{student}', [StudentsController::class, 'update']);
// });

// Route::group(["prefix" => "/kelas"],function (){
//     Route::get('/all', [KelasController::class,'index']);
//     Route::get('/create', [KelasController::class,'create']);
//     Route::post('/add', [KelasController::class,'store']);
//     Route::delete('/delete/{id}', [KelasController::class, 'destroy']);
//     Route::get('/edit{kelas}', [KelasController::class, 'edit']);
//     Route::post('/update/{kelas}', [KelasController::class, 'update']);
// });




