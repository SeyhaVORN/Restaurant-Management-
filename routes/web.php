<?php

use App\Http\Controllers\BarGraphController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\ProvinceController;
use App\Http\Controllers\ResController;
use App\Http\Controllers\StaffController;
use App\Models\Province;
use App\Models\RestaurantFiles;
use App\Models\Staff;
use Illuminate\Support\Facades\Route;

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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::resources([
    'restaurants' => ResController::class,
    'contacts' => ContactController::class,
    'provinces' => ProvinceController::class,
    'files' => FileController::class,
    'staffs' => StaffController::class,
]);

Route::delete('delete-multiple', [
    ResController::class,
    'deleteMultiple',
])->name('delete-restaurant-multi');

Route::get('charts', [DashboardController::class, 'index'])->name(
    'charts.index'
);