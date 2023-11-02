<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\PageController as AdminPageController;
use App\Http\Controllers\Admin\TypeController;
use App\Http\Controllers\Admin\TechnologyController;
use App\Http\Controllers\Guest\PageController as GuestPageController;

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

Route::get('/', [GuestPageController::class, 'index'])->name('guest.home');
Route::get('/all', [GuestPageController::class, 'show_all'])->name('guest.all');

Route::middleware(['auth', 'verified'])
  ->prefix('admin')
  ->name('admin.')
  ->group(function () {

    Route::get('/', [AdminPageController::class, 'index'])->name('home');

    Route::get('/projects/trash', [ProjectController::class, 'softDelete'])->name('projects.trash.index');
    Route::patch('/projects/trash/{project}/restore', [ProjectController::class, 'restore'])->name('projects.trash.restore');
    Route::delete('/projects/trash/{project}', [ProjectController::class, 'forceDestroy'])->name('projects.trash.force-destroy');
    Route::patch('/projects/{project}/publish', [ProjectController::class, 'publish'])->name('projects.publish');

    Route::resource('projects', ProjectController::class);
    

    Route::resource('types', TypeController::class);

    Route::resource('technologies', TechnologyController::class);

  });

require __DIR__ . '/auth.php';