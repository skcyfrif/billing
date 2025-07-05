<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MasterAdminController;
use App\Http\Controllers\ControlPanelController;
use App\Http\Controllers\ControlPanelAdminController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserPanelController;
use App\Http\Controllers\LoginController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


/////////////////////////////// Master Admin Routes ///////////////////////////////
Route::get('/masteradmin/register', [MasterAdminController::class, 'showRegisterForm']);
Route::post('/masteradmin/register', [MasterAdminController::class, 'register']);
Route::get('/masteradmin/dashboard', [MasterAdminController::class, 'dashboard'])->middleware(['auth', 'masteradmin']);

    Route::get('/masteradmin/controlpanels', [MasterAdminController::class, 'controlpanelIndex'])->name('controlpanels.index');
    Route::get('/masteradmin/controlpanels/create', [MasterAdminController::class, 'controlpanelCreate'])->name('controlpanels.create');
    Route::post('/masteradmin/controlpanels', [MasterAdminController::class, 'controlpanelStore'])->name('controlpanels.store');
    Route::get('/masteradmin/controlpanels/{id}', [MasterAdminController::class, 'controlpanelShow'])->name('controlpanels.show');
    Route::get('/masteradmin/controlpanels/{id}/edit', [MasterAdminController::class, 'controlpanelEdit'])->name('controlpanels.edit');
    Route::put('/masteradmin/controlpanels/{id}', [MasterAdminController::class, 'controlpanelUpdate'])->name('controlpanels.update');
    Route::delete('/masteradmin/controlpanels/{id}', [MasterAdminController::class, 'controlpanelDelete'])->name('controlpanels.delete');


/////////////////////////////// Control Panel Routes ///////////////////////////////

Route::middleware(['auth', 'controlpanel'])->group(function () {
    Route::get('/controlpanel/dashboard', [ControlPanelController::class, 'dashboard'])->name('controlpanel.dashboard');
    Route::get('/controlpanels/cpadmin', [ControlPanelController::class, 'cpadminIndex'])->name('cpadmin.index');
    Route::get('/controlpanels/cpadmin/create', [ControlPanelController::class, 'controlpanelCreate'])->name('cpadmin.create');
    Route::post('/controlpanels/cpadmin', [ControlPanelController::class, 'cpadminStore'])->name('cpadmin.store');
    Route::get('/controlpanels/cpadmin/{id}', [ControlPanelController::class, 'cpadminShow'])->name('cpadmin.show');
    Route::get('/controlpanels/cpadmin/{id}/edit', [ControlPanelController::class, 'cpadminEdit'])->name('cpadmin.edit');
    Route::put('/controlpanels/cpadmin/{id}', [ControlPanelController::class, 'cpadminUpdate'])->name('cpadmin.update');
    Route::delete('/controlpanels/cpadmin/{id}', [ControlPanelController::class, 'cpadminDelete'])->name('cpadmin.delete');
});

/////////////////////////////// Control Panel Admin Routes ///////////////////////////////

Route::middleware(['auth', 'controlpaneladmin'])->group(function () {
    Route::get('/controlpaneladmin/dashboard', [ControlPanelAdminController::class, 'dashboard'])->name('controlpaneladmin.dashboard');
    Route::get('/controlpaneladmin/admin', [ControlPanelAdminController::class, 'AdminIndex'])->name('admin.index');
    Route::get('/controlpaneladmin/admin/create', [ControlPanelAdminController::class, 'AdminCreate'])->name('admin.create');
    Route::post('/controlpaneladmin/admin', [ControlPanelAdminController::class, 'AdminStore'])->name('admin.store');
    Route::get('/controlpaneladmin/admin/{id}', [ControlPanelAdminController::class, 'AdminShow'])->name('admin.show');
    Route::get('/controlpaneladmin/admin/{id}/edit', [ControlPanelAdminController::class, 'AdminEdit'])->name('admin.edit');
    Route::put('/controlpaneladmin/admin/{id}', [ControlPanelAdminController::class, 'AdminUpdate'])->name('admin.update');
    Route::delete('/controlpaneladmin/admin/{id}', [ControlPanelAdminController::class, 'AdminDelete'])->name('admin.delete');

    });

///////////////////////////////  Admin Routes ///////////////////////////////
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    // Route::get('/controlpaneladmin/user', [ControlPanelAdminController::class, 'UserIndex'])->name('user.index');
    // Route::get('/controlpaneladmin/user/create', [ControlPanelAdminController::class, 'UserCreate'])->name('user.create');
    // Route::post('/controlpaneladmin/user', [ControlPanelAdminController::class, 'UserStore'])->name('user.store');
    // Route::get('/controlpaneladmin/user/{id}', [ControlPanelAdminController::class, 'UserShow'])->name('user.show');
    // Route::get('/controlpaneladmin/user/{id}/edit', [ControlPanelAdminController::class, 'UserEdit'])->name('user.edit');
    // Route::put('/controlpaneladmin/user/{id}', [ControlPanelAdminController::class, 'UserUpdate'])->name('user.update');
    // Route::delete('/controlpaneladmin/user/{id}', [ControlPanelAdminController::class, 'UserDelete'])->name('user.delete');

    });

/////////////////////////////// User Panel Routes ///////////////////////////////
Route::middleware(['auth', 'user'])->group(function () {
    Route::get('/user/dashboard', [UserPanelController::class, 'dashboard'])->name('user.dashboard');
 });





require __DIR__.'/auth.php';
