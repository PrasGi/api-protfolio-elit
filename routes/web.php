<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Education\EducationController;
use App\Http\Controllers\Experience\ExperienceController;
use App\Http\Controllers\Profile\ProfileController;
use App\Http\Controllers\Project\ProjectController;
use App\Http\Controllers\Skill\SkillController;
use App\Http\Controllers\Vidio\VidioController;
use Illuminate\Support\Facades\Route;


Route::prefix('/auth')->name('auth.')->group(function () {
    Route::get('/sign-in', [AuthController::class, 'signInPage'])->name('sign-in.index');
    Route::post('/sign-in', [AuthController::class, 'signIn'])->name('sign-in.store');
    Route::get('/sign-up', [AuthController::class, 'signUpPage'])->name('sign-up.index');
    Route::post('/sign-up', [AuthController::class, 'signUp'])->name('sign-up.store');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/auth/sign-out', [AuthController::class, 'signOut'])->name('auth.sign-out');
});

/** Dashboard */
Route::middleware(['auth'])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('home');
});

/** Profile */
Route::prefix('/profile')->name('profile.')->middleware(['auth'])->group(function () {
    Route::get('/', [ProfileController::class, 'index'])->name('index');
    Route::put('/', [ProfileController::class, 'update'])->name('update');
});

/** Vidio */
Route::prefix('/vidio')->name('vidio.')->middleware(['auth'])->group(function () {
    Route::get('/', [VidioController::class, 'index'])->name('index');
    Route::put('/', [VidioController::class, 'update'])->name('update');
});

/** Skill */
Route::prefix('/skills')->name('skills.')->middleware(['auth'])->group(function () {
    Route::get('/', [SkillController::class, 'index'])->name('index');
    Route::put('/', [SkillController::class, 'update'])->name('update');
});

/** Experiences */
Route::prefix('/experiences')->name('experiences.')->middleware(['auth'])->group(function () {
    Route::get('/', [ExperienceController::class, 'index'])->name('index');
    Route::put('/', [ExperienceController::class, 'update'])->name('update');
});

/** Education */
Route::prefix('/education')->name('education.')->middleware(['auth'])->group(function () {
    Route::get('/', [EducationController::class, 'index'])->name('index');
    Route::put('/', [EducationController::class, 'update'])->name('update');
});

/** Projects */
Route::prefix('/project')->name('project.')->middleware(['auth'])->group(function () {
    Route::get('/', [ProjectController::class, 'index'])->name('index');
    Route::put('/', [ProjectController::class, 'update'])->name('update');
});
