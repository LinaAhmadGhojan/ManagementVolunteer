<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\AuthUser\LoginController;
use App\Http\Controllers\User\AuthUser\AdminController;
use App\Http\Controllers\User\AuthUser\HrController;



####################### login volunteer ######################3333
Route::middleware(['guest:web'])->group(function () {
  Route::post('volunteer',   [LoginController::class, 'volunteerLogin'])->name('volunteer');
});





####################### login superadmin ######################3333
Route::middleware(['guest:admin'])->group(function () {
  Route::post('takatof/superadmin',   [AdminController::class, 'AdminLogin'])->name('superadmin');
});


####################### login hr ######################3333
Route::middleware(['guest:hr'])->group(function () {
    Route::post('takatof/hr',   [HrController::class, 'HrLogin'])->name('hr');
  });


