<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataFeedController;
use App\Http\Controllers\DashboardController;
use App\Livewire\Staff\ListOfAll as StaffListOfAll;
use App\Livewire\Staff\StaffProfile;
use App\Livewire\Users\BuyersIndex;
use App\Livewire\Users\FarmersIndex;
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
Route::redirect('/register', 'login');


Route::middleware(['auth:sanctum', 'verified'])->group(function () {

    // Route for the getting the data feed
    Route::get('/json-data-feed', [DataFeedController::class, 'getDataFeed'])->name('json_data_feed');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    Route::get('/users/roles', RolesComponent::class)->name('users.roles');
    Route::get('/staff', StaffListOfAll::class)->name('users.index');
    Route::get('/staff/profile/{staff_id}', StaffProfile::class)->name('users.profile');
   
    Route::fallback(function() {
        return view('pages/utility/404');
    });    
});
