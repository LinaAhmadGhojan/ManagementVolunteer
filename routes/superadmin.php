<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\AuthUser\AdminController;
use App\Http\Controllers\Dashboard\Project\ProjectController;
use App\Http\Controllers\Dashboard\Initiative\InitiativeController;
use App\Http\Controllers\Dashboard\Activity\ActivityController;
use App\Http\Controllers\Dashboard\Volunteer\VolunteerController;




// IF THE ADMIN USER  LOGGEDIN CAN ABLE TO SEE THIS ROUTES
Route::middleware(['auth:admin'])->group(function () {
  Route::get('dashboard', [AdminController::class, 'Dashboard'])->name('dashboard');
 Route::post('logout',      [AdminController::class, 'AdminLogout'])->name('logout');
});






#################################  project   ###################################
Route::controller(ProjectController::class)->name('admin.')->prefix('dashboard/project')-> group(function () {
    Route::get('/', 'index');
    Route::get('/initiatives/{id}', 'allInitiatives');
    Route::post('/add', 'add');
    Route::post('/update/{id}', 'update');
    Route::delete('/delete/{id}', 'delete');
});


#################################  Initiative  ###################################
Route::controller(InitiativeController::class)->name('admin.')->prefix('dashboard/initiative')-> group(function () {
    Route::get('/', 'index');
    Route::post('/add', 'add');
    Route::post('/update/{id}', 'update');
    Route::delete('/delete/{id}', 'delete');
});



#################################  Activity  ###################################
Route::controller(ActivityController::class)->name('admin.')->prefix('dashboard/activity')-> group(function () {
    Route::get('/', 'index');
    Route::post('/add', 'add');
    Route::post('/update/{id}', 'update');
    Route::delete('/delete/{id}', 'delete');
    Route::post('/accept/volutter/request/{id}', 'acceptVolnteerInActivity');

});


#################################  volunteer  ###################################
Route::controller(VolunteerController::class)->name('volunteer.')->prefix('dashboard/volunteer')-> group(function () {
    Route::get('/', 'index');

});
