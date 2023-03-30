<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\RoomController;
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

//To view all rooms
Route::get('/rooms', [RoomController::class, 'index']);

//To view all Booking details
Route::get('/bookings', [BookingController::class, 'to_view_all_booking_data']);

//To only view room data with current guest
Route::get('/rooms/guests', [BookingController::class, 'view_room_details_with_current_guest']);

//To add a new check in
Route::post('/checkin', [BookingController::class, 'store']);

//To view available rooms with correct room suite
Route::post('/rooms/available', [RoomController::class, 'to_get_the_available_rooms']);
