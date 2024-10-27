<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\TimeinputController;
use App\Http\Controllers\HolidayController;
use App\Models\Holiday;


// Route::get('/', function () {
//     return view('welcome');
// });


Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//middleware('auth')を付与することで認証チェックを⾏うようになります。

// Route::get(uri: '/login', action: function (): Factory|View {
//     return view('auth/login');
// });

// Route::get('/login', function () {
//     return view('auth/login');
// })->name('login');


Route::get('/holiday', [HolidayController::class, 'index'])->middleware('auth')->name('holiday');

Route::controller(HolidayController::class)->group(function () {
    Route::get('holiday', 'index')->middleware('auth')->name('holiday');
    Route::post('holiday/search', 'search')->middleware('auth')->name('holiday.search');
    Route::post('/api/add', 'add')->middleware('auth');

    // Route::post('holiday/edit', 'edit')->middleware('auth');
    // Route::post('holiday/delete', 'delete')->middleware('auth');
});
