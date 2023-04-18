<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ChangeLogController;
use App\Http\Controllers\ChangeLogDetailController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\InvoiceDetailController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\TaxController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

/**
 * APIs for the Room model
 */
Route::get('/rooms', [RoomController::class, 'index']);

Route::post('/room',[RoomController::class, 'store']);

//To view available rooms with correct room suite
Route::get('/rooms/available', [RoomController::class, 'show']);

Route::post('/update/rooms', [RoomController::class, 'update']);

Route::delete('/room/{id}',[RoomController::class, 'destroy']);

/**
 * APIs for the User model
 */
Route::get('/users', [UserController::class, 'index']);

Route::post('/user',[UserController::class, 'store']);
//To update an user
Route::put('/user/{id}', [UserController::class, 'update']);

Route::delete('/user/{id}',[UserController::class, 'destroy']);
/**
 * APIs for the Guest model
 */
Route::get('/guests', [GuestController::class, 'index']);

Route::post('/guest',[GuestController::class, 'store']);

Route::get('/guest/exist',[GuestController::class, 'show']);

//To update an guest
Route::put('/guest/{id}', [GuestController::class, 'update']);

Route::delete('/guest/{id}',[GuestController::class, 'destroy']);

/**
 * APIs for the Booking model
 */
Route::get('/bookings', [BookingController::class, 'index']);

//To only view room data with current guest
Route::get('/bookings?current_guest_only=true', [BookingController::class, 'index']);

//To add a new check in
Route::post('/add/checkin', [BookingController::class, 'store']);

Route::delete('/booking/{id}',[BookingController::class, 'destroy']);

/**
 * APIs for the Tax model
 */
Route::get('/taxes', [TaxController::class, 'index']);

Route::post('/tax',[TaxController::class, 'store']);

Route::get('/tax', [TaxController::class, 'show']);

//To update an tax
Route::put('/tax/{id}', [TaxController::class, 'update']);

Route::delete('/tax/{id}',[TaxController::class, 'destroy']);

/**
 * APIs for the Role model
 */
Route::get('/roles', [RoleController::class, 'index']);

Route::post('/role',[RoleController::class, 'store']);

//To update an role
Route::put('/role/{id}', [RoleController::class, 'update']);

Route::delete('/role/{id}',[RoleController::class, 'destroy']);

/**
 * APIs for the Package model
 */
Route::get('/packages', [PackageController::class, 'index']);

Route::post('/package',[PackageController::class, 'store']);

//To update an package
Route::put('/package/{id}', [PackageController::class, 'update']);

Route::delete('/package/{id}',[PackageController::class, 'destroy']);

/**
 * APIs for the Invoice model
 */
Route::get('/invoices', [InvoiceController::class, 'index']);

Route::post('/add/invoice', [InvoiceController::class, 'store']);

Route::delete('/invoice/{id}',[InvoiceController::class, 'destroy']);

/**
 * APIs for the InvoiceDetail model
 */
Route::get('/invoiceDetails', [InvoiceDetailController::class, 'index']);

Route::post('/invoiceDetails',[InvoiceDetailController::class, 'store']);

Route::delete('/invoiceDetails/{id}',[InvoiceDetailController::class, 'destroy']);

/**
 * APIs for the ChangeLog model
 */
Route::get('/changeLogs', [ChangeLogController::class, 'index']);

/**
 * APIs for the ChangeLogDetail model
 */
Route::get('/changeLogDetails', [ChangeLogDetailController::class, 'index']);
