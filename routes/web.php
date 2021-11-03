<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\GoogleCalendarController;
use Spatie\GoogleCalendar\Event;
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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
	$event_lists = Event::get();
    return View::make('dashboard')->with('event_lists', $event_lists);
})->name('dashboard');
Route::get('auth/google', [GoogleController::class, 'redirectToGoogle']);
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);
Route::view('/add', [GoogleController::class, 'add_event'])->name('add_event');
Route::post('/add_event_details', [GoogleController::class, 'add_event_details'])->name('add_event_details');
Route::get('/edit_event/{id}', [GoogleController::class, 'edit_event'])->name('edit_event');
Route::post('/edit_event_details', [GoogleController::class, 'edit_event_details'])->name('edit_event_details');