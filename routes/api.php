<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Project\ProjectController;
use App\Http\Controllers\Api\Initiative\InitiativeController;
use App\Http\Controllers\Api\Activity\ActivityController;
use App\Http\Controllers\Api\Volunteer\VolunteerController;
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


#################################  Activity  ###################################
Route::controller(ActivityController::class)->name('voluteer.')->prefix('voluteer/activity')-> group(function () {
    Route::post('/register', 'registerVolnteerInActivity');
    Route::post('/comment', 'commentVolnteerToActivity');
    Route::post('/like', 'likeVolnteerActivity');
    Route::post('/end', 'endVolnteerActivity');
    Route::post('/note/admin', 'noteAdminVolnteerActivity');

});





