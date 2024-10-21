<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\EmployeeController;


// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//middleware('auth')を付与することで認証チェックを⾏うようになります。




Route::get('/login', function () {
    return view('auth/login');

});


Route::get('/employeeMaster', [EmployeeController::class, 'employee']);
