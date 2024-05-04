<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataFeedController;
use App\Http\Controllers\DashboardController;
use App\Livewire\RoomManagement\NewRoomIndex;
use App\Livewire\RoomManagement\RoomTypeIndex;
use App\Livewire\Users\RolesComponent;


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

Route::redirect('/', 'login');

Route::middleware(['auth:sanctum', 'verified'])->group(function () {

    // Route for the getting the data feed
    Route::get('/json-data-feed', [DataFeedController::class, 'getDataFeed'])->name('json_data_feed');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    Route::get('/users/roles', RolesComponent::class)->name('users.roles');

    // Room Management Routes
    Route::get('/rooms/types', RoomTypeIndex::class,)->name('rooms.types');
    Route::get('/rooms/new', NewRoomIndex::class,)->name('rooms.new');
   
    Route::fallback(function() {
        return view('pages/utility/404');
    });    
});
