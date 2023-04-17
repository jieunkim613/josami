<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\QueueController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ForbiddenController;
use App\Http\Controllers\MenuOrderController;
use App\Models\MenuOrder;

Route::get('/forbidden', [ForbiddenController::class, 'index'])->name('forbidden');

//=============== LOGIN - LOGOUT ===============
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);

Route::post('/logout', [LoginController::class, 'logout']);

//=============== USER PAGE ===============
Route::get('/', [MainController::class, 'index'])->middleware('auth');

Route::get('/menuOrders/checkSlug', [MenuOrderController::class, 'checkSlug'])->middleware('auth');
Route::resource('/menuOrders', MenuOrderController::class)->middleware('auth');

Route::get('/orders/checkSlug', [OrderController::class, 'checkSlug'])->middleware('auth');
Route::resource('/orders', OrderController::class)->except('create')->middleware('auth');

Route::get('/queues/checkSlug', [QueueController::class, 'checkSlug'])->middleware('auth');
Route::resource('/queues', QueueController::class)->only('index')->middleware('auth');

Route::get('/histories/historiesGeneratePDF', [HistoryController::class, 'historiesGeneratePDF'])->middleware('auth');
Route::get('/histories', [HistoryController::class, 'index'])->middleware('auth');

Route::get('/menus/checkSlug', [MenuController::class, 'checkSlug'])->middleware('auth');
Route::resource('/menus', MenuController::class)->middleware(['auth', 'level.1']);

Route::get('/employees/checkSlug', [UserController::class, 'checkSlug'])->middleware('auth');
Route::resource('/employees', UserController::class)->middleware(['auth', 'level.1']);

Route::get('/profile/changePassword', [ProfileController::class, 'changePassword'])->middleware('auth');
Route::post('/profile/updatePassword', [ProfileController::class, 'updatePassword'])->middleware('auth');
Route::get('profile/checkSlug', [ProfileController::class, 'checkSlug'])->middleware('auth');
Route::resource('/profile', ProfileController::class)->only(['index', 'edit', 'update'])->middleware(['auth']);
