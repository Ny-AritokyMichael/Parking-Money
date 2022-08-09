



<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ParkingController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\MoneyController;
use App\Http\Controllers\StationController;
// use App\Http\Controllers\UserNavigationController;

// require __DIR__ . '/auth.php';

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

//route list car rental
Route::get('/', function () {
    return view('index');
});





Route::get('/parking.php', function () {
    return view('admin.parking');
});


Route::get('/carreview.php', function () {
    return view('admin.carreview');
});

Route::get('/cargallery.php', function () {
    return view('admin.cargallery');
});


Route::get('/rental.php', function () {
    return view('admin.rental');
});


Route::get('/payment.php', function () {
    return view('admin.payment');
});


Route::get('/costumercredential.php', function () {
    return view('admin.costumercredential');
});


Route::get('/carownercredential.php', function () {
    return view('admin.carownercredential');
});


Route::get('/useraccount.php', function () {
    return view('admin.useraccount');
});


Route::get('/car.php', function () {
    return view('admin.car');
});


Route::get('/costumer.php', function () {
    return view('admin.costumer');
});


Route::get('/carowner.php', function () {
    return view('admin.carowner');
});




Route::get('/homeClient', function () {
    return redirect()->route('accueil');
});


// Client

Route::post('/addCar', [ClientController::class, 'addCar'])->name('addCar')->middleware('auth');
Route::get('/pageCar', [ClientController::class, 'page'])->name('pageCar');
Route::get('/user', [ClientController::class, 'page'])->name('user')->middleware('auth');
Route::get('/pageClient', [ClientController::class, 'page'])->name('pageClient')->middleware('auth');
Route::get('/userParking', [ClientController::class, 'userParking'])->name('userParking')->middleware('auth');
Route::get('/money', [ClientController::class, 'money'])->name('money');
Route::get('/enlever/{id}/{pourcentage}', [ClientController::class, 'enlever'])->name('enlever')->middleware('auth');
Route::get('/ajout/{id}', [ClientController::class, 'ajout'])->name('ajout');
Route::post('/pdf/{id}', [ClientController::class, 'getPdf'])->name('pdf')->middleware('auth');


//Money
Route::post('/addMoney/{id}', [MoneyController::class, 'addMoney'])->name('addMoney')->middleware('auth');
Route::get('/listMoney', [MoneyController::class, 'listMoney'])->name('listMoney');
Route::post('/valider/{id}', [MoneyController::class, 'valider'])->name('valider')->middleware('auth');


//parking
Route::get('/pageCar', [ParkingController::class, 'page'])->name('parking');
Route::post('/parking', [ParkingController::class, 'add'])->name('add');
Route::post('/plusUn', [ParkingController::class, 'plusUn'])->name('plusUn');
Route::get('/client', [ParkingController::class, 'client'])->name('client');


//Reservatipon
Route::get('/page', [ReservationController::class, 'page'])->name('page')->middleware('auth');
Route::post('/reservation', [ReservationController::class, 'add'])->name('addReservation');
Route::post('/deleteResevation/{id}', [ReservationController::class, 'delete'])->name('deleteResevation');

Route::get('/pageAdmin', [ReservationController::class, 'pageAdmin'])->name('pageAdmin');
Route::post('/reservationAdmin', [ReservationController::class, 'addAdmin'])->name('addReservationAdmin');
Route::post('/deleteResevationAdmin/{id}', [ReservationController::class, 'deleteAdmin'])->name('deleteResevationAdmin');



//Admin
Route::get('/chartPage', [AdminController::class, 'chartPage'])->name('chartPage');
Route::get('stock/chart',[AdminController::class, 'chart'])->name('chart');
Route::get('/car', [AdminController::class, 'page'])->name('car');
Route::get('/clientAff', [AdminController::class, 'clientAff'])->name('clientAff');
Route::get('/loginAdmin', [AdminController::class, 'loginAdmin'])->name('loginAdmin');
Route::post('/admin', [AdminController::class, 'login'])->name('logAdmin');
Route::get('/delete', [AdminController::class, 'delete'])->name('delete');
Route::post('/getnow', [AdminController::class, 'getnow'])->name('getnow');






Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
