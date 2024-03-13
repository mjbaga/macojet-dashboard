<?php

use Tabuna\Breadcrumbs\Trail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BoarderController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UnitController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard')
    ->breadcrumbs(fn (Trail $trail) =>
        $trail->push('Dashboard', route('dashboard'))
    );

Route::middleware('auth')->group(function () {

    Route::get('/boarders', [BoarderController::class, 'index'])
        ->name('boarders.index')
        ->breadcrumbs(fn (Trail $trail) => 
            $trail
                ->parent('dashboard')
                ->push(__('Boarders'), route('boarders.index'))
        );

    Route::get('/boarders/create', [BoarderController::class, 'create'])
        ->name('boarders.create')
        ->breadcrumbs(fn (Trail $trail) => 
            $trail
                ->parent('dashboard')
                ->push(__('Boarders'), route('boarders.index'))
                ->push(__('New'), route('boarders.create'))
        );

    Route::get('/boarders/{boarder}/edit', [BoarderController::class, 'edit'])
        ->name('boarders.edit')
        ->breadcrumbs(fn (Trail $trail, $boarder) => 
            $trail
                ->parent('dashboard')
                ->push(__('Boarders'), route('boarders.index'))
                ->push(__('Edit'), route('boarders.edit', $boarder))
        );

    Route::resource('boarders', BoarderController::class)
        ->except(['index', 'create', 'edit', 'show']);

    Route::resource('units', UnitController::class);

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
