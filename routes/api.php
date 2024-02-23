<?php

use App\Http\Controllers\Api\ApiController;
use App\Http\Controllers\Api\Events;
use App\Http\Controllers\Api\Tickets;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\DashboardController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::get('/reg', [UserController::class, 'regForm'])->name('reg');
Route::post('/auth/register', [UserController::class, 'createUser'])->name('api.reg');
Route::get('/users/{id}', [UserController::class, 'index']);

Route::get('/users', [UserController::class, 'show']);

Route::post('/auth/login', [UserController::class, 'loginUser'])->name('user.log');
Route::get('/log', [UserController::class, 'logForm'])->name('reg');

Route::post('logout', [DashboardController::class, 'logout'])->name('logout');
Route::get('/dashboard', [DashboardController::class, 'index']);
Route::get('/dashboard/event/{id}', [DashboardController::class, 'show'])->name('events.show');

Route::get('/events', [Events::class, 'index']);
Route::post('/events/create', [Events::class, 'create']);
Route::get('/events/edit/{id}', [Events::class, 'edit'])->name('events.edit');
Route::put('/events/update/{id}', [Events::class, 'update'])->name('events.update');

Route::get('/tickets/edit/{id}', [Tickets::class, 'edit'])->name('tickets.edit');
Route::put('/tickets/update/{id}', [Tickets::class, 'update'])->name('tickets.update');
Route::get('/tickets/show/{id}', [Tickets::class, 'show'])->name('tickets.show');


Route::get('/events/show/{id}', [Events::class, 'show'])->name('events');




Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
