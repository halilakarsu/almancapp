<?php

use App\Http\Controllers\Admin\CardController as AdminCardController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\LessonController as AdminLessonController;
use App\Http\Controllers\Admin\LevelController as AdminLevelController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\CardController as UserCardController;
use App\Http\Controllers\User\DashboardController as UserDashboardController;
use App\Http\Controllers\User\LessonController as UserLessonController;
use App\Http\Controllers\User\LevelController as UserLevelController;
use Illuminate\Support\Facades\Route;

// Frontend Routes
Route::get('/', [HomeController::class, 'index'])->name('home');

// Temporarily disabled auth middleware
Route::get('/dashboard', [UserDashboardController::class, 'index'])->name('dashboard');
Route::get('/level/{id}', [UserLevelController::class, 'show'])->name('user.level.show');
Route::get('/lesson/{id}', [UserLessonController::class, 'show'])->name('user.lesson.show');
Route::get('/lesson/{id}/exercise', [UserLessonController::class, 'exercise'])->name('user.lesson.exercise');
Route::get('/lesson/{id}/match', [UserLessonController::class, 'matchWords'])->name('user.lesson.match');
Route::get('/lesson/{id}/scramble', [UserLessonController::class, 'scrambleSentences'])->name('user.lesson.scramble');
Route::get('/lesson/{id}/fill', [UserLessonController::class, 'fillBlanks'])->name('user.lesson.fill');
Route::get('/lesson/{id}/write', [UserLessonController::class, 'writePractice'])->name('user.lesson.write');

// Card study routes
Route::get('/lesson/{id}/cards', [UserCardController::class, 'study'])->name('user.cards.study');
Route::post('/cards/review', [UserCardController::class, 'review'])->name('user.cards.review');

Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

// Admin Routes - Temporarily disabled auth and role:admin middleware
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', function () {
        return redirect()->route('admin.dashboard');
    });
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
    Route::delete('/cards/bulk-delete', [AdminCardController::class, 'bulkDestroy'])->name('cards.bulkDestroy');
    $resources = [
        'users' => AdminUserController::class,
        'levels' => AdminLevelController::class,
        'lessons' => AdminLessonController::class,
        'cards' => AdminCardController::class,
    ];

    foreach ($resources as $uri => $controller) {
        Route::post("{$uri}/{".rtrim($uri, 's').'}/copy', [$controller, 'copy'])->name("{$uri}.copy");
        Route::patch("{$uri}/{".rtrim($uri, 's').'}/inline-update', [$controller, 'inlineUpdate'])->name("{$uri}.inlineUpdate");
        Route::resource($uri, $controller);
    }
});

require __DIR__.'/auth.php';
