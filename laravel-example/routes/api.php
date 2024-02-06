<?php

use App\Http\Controllers\EngagespotController;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route to create or update a user in Engagespot
Route::post('/create-user', [EngagespotController::class, 'createEngagespotUser']);

// Route to send a notification to a specific Engagespot user
Route::post('/send-notification', [EngagespotController::class, 'sendNotificationToEngagespotUser']);

// Route to generate a user token for a specific Engagespot user
Route::post('/generate-token', [EngagespotController::class, 'generateUserToken']);


