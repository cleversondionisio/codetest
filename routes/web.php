<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AttendeesController;

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

Route::get('/', function () {
    return redirect('/login');
});

//Show Create Attendees
Route::get('/dashboard/attendees/create', [AttendeesController::class, 'create'])->middleware('auth');

//Store Attendees Data
Route::post('/dashboard/attendees', [AttendeesController::class, 'store'])->middleware('auth');

//Show Attendees Edit Form
Route::get('/dashboard/attendees/edit/{attendee}', [AttendeesController::class, 'edit'])->middleware('auth');

//Update Attendees
Route::put('/dashboard/attendees/edit/{attendee}', [AttendeesController::class, 'update'])->middleware('auth');

//Delete Attendees
Route::delete('/dashboard/attendees/delete/{attendee}', [AttendeesController::class, 'destroy'])->middleware('auth');

Route::group(['middleware' => 'auth'], function() {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('/dashboard/attendees', \App\Http\Controllers\AttendeesController::class);

    
});

require __DIR__.'/auth.php';
