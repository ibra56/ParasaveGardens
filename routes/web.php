<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataFeedController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DownloadsController;
use App\Http\Controllers\WebsiteController;
use App\Livewire\Finances\ExpenseCategoryItemsList;
use App\Livewire\Finances\FinanceAccounts;
use App\Livewire\Finances\PaymentsList;
use App\Livewire\Finances\ExpenseCategories;
use App\Livewire\Finances\ExpenseCategoryItems;
use App\Livewire\Finances\ExpenseRequistionsList;
use App\Livewire\Finances\NewExpenseModel;
use App\Livewire\Finances\RequistionApprovalsList;
use App\Livewire\Reservations\ListOfReservations;
use App\Livewire\Reservations\NewReservationForm;
use App\Livewire\Staff\ListOfAll as StaffListOfAll;
use App\Livewire\Staff\StaffProfile;
use App\Livewire\RoomManagement\NewRoomIndex;
use App\Livewire\RoomManagement\RoomTypeIndex;
use App\Livewire\Users\RolesComponent;


use App\Livewire\Finances\Expenses as FinancialsExpenses;
use App\Livewire\Finances\FinancialExpenseCatoriesList;
use App\Livewire\Finances\FinancialsExpensesList;
use App\Livewire\Finances\Incomes as FinancialsIncomes;
use App\Livewire\Finances\NewExpenseItem;
use App\Livewire\Finances\SuppliersList;
use App\Livewire\Products\ProductCategoriesIndex;
use App\Livewire\Products\ProductDetails;
use App\Livewire\Products\ProductsList;
use App\Livewire\Reservations\CurrentGuests;
use App\Livewire\Reservations\GuestHistory;

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

Route::get('/', [WebsiteController::class, 'homepage'] )->name('homepage');
Route::get('/about', [WebsiteController::class, 'about'])->name('about');
Route::get('/contact-us', [WebsiteController::class, 'contact'])->name('contact-us');
Route::get('/room', [WebsiteController::class, 'webroom'])->name('room');
Route::get('/blog', [WebsiteController::class, 'blog'])->name('blog');
Route::get('/gallery', [WebsiteController::class, 'gallery'])->name('gallery');
Route::redirect('/register', 'login');


Route::middleware(['auth:sanctum', 'verified'])->group(function () {

    // Route for the getting the data feed
    Route::get('/json-data-feed', [DataFeedController::class, 'getDataFeed'])->name('json_data_feed');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/users/roles', RolesComponent::class)->name('users.roles');
    Route::get('/staff', StaffListOfAll::class)->name('users.index');
    Route::get('/staff/profile/{staff_id}', StaffProfile::class)->name('users.profile');
    Route::get('/staff/profile/security/{staff_id}', StaffProfile::class)->name('users.profile.security');

    // Room Management Routes
    Route::get('/rooms/types', RoomTypeIndex::class)->name('rooms.types');
    Route::get('/rooms/new', NewRoomIndex::class)->name('rooms.new');

    Route::get('/reservations', ListOfReservations::class)->name('reservations.index');
    Route::get('/reservations/new', NewReservationForm::class)->name('reservations.new');
    Route::get('/reservations/guests', CurrentGuests::class)->name('reservations.guests');
    Route::get('/reservations/guests/history', GuestHistory::class)->name('reservations.guests.history');
    Route::get('/reservations/print/{reservation_id}', [DownloadsController::class, 'printReservation'])->name('reservations.print');

    Route::get('/finances/payments', PaymentsList::class,)->name('finances.payments');
    Route::get('/finances/accounts', FinanceAccounts::class,)->name('finances.accounts');

    Route::get('products/suppliers', SuppliersList::class)->name('products.suppliers');
    Route::get('products/categories', ProductCategoriesIndex::class)->name('products.categories');
    Route::get('products/details/{product_id}', ProductDetails::class)->name('products.details');
    Route::get('products', ProductsList::class)->name('products.list');

    Route::get('expenses/categories', FinancialExpenseCatoriesList::class)->name('expense.categories');
    Route::get('expenses/categories/{category_slug}', ExpenseCategoryItemsList::class)->name('finances.expense_category.view');
    Route::get('expenses/new', NewExpenseItem::class)->name('financials.expenses.new');
    Route::get('expenses', FinancialsExpensesList::class)->name('financials.expenses');
    Route::get('expenses/requisitions', ExpenseRequistionsList::class)->name('financials.expenses.requisitions');


    Route::fallback(function () {
        return view('pages/utility/404');
    });
});
