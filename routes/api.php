<?php

use App\Http\Controllers\AdditionalChargeController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ChangeController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\RateController;
use App\Http\Controllers\RoomController;
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
//To view all rooms
Route::get('/rooms', [RoomController::class, 'index']);

//To view available rooms with correct room suite
Route::post('/rooms/available', [RoomController::class, 'to_get_the_available_rooms']);

/**
 * APIs for the User model
 */
//To view all users
Route::get('/users', [UserController::class, 'index']);

/**
 * APIs for the Guest model
 */
//To view all guests
Route::get('/guests', [GuestController::class, 'index']);

//To update an guest
Route::put('/guest/{id}', [GuestController::class, 'update']);


/**
 * APIs for the Booking model
 */
//To view all bookings
Route::get('/bookings', [BookingController::class, 'index']);

//To only view room data with current guest
Route::get('/rooms/guests', [BookingController::class, 'view_room_details_with_current_guest']);

//To add a new check in
Route::post('/checkin', [BookingController::class, 'store']);


/**
 * APIs for the Change model
 */
//To view all changes
Route::get('/changes', [ChangeController::class, 'index']);

/**
 * APIs for the Rate model
 */
//To view all rates
Route::get('/rates', [RateController::class, 'index']);

/**
 * APIs for the AdditonalCharge model
 */
//To view all additionl charges
Route::get('/additionlcharges', [AdditionalChargeController::class, 'index']);

/**
 * APIs for the Payment model
 */
//To view all payments
Route::get('/payments', [PaymentController::class, 'index']);










