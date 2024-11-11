<?php

use App\Http\Controllers\Api\DataController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::prefix('/data')->name('data.')->group(function () {
    Route::get('/profile', [DataController::class, 'profile'])->name('profile');
    Route::get('/vidio', [DataController::class, 'vidio'])->name('vidio');
    Route::get('/skills', [DataController::class, 'skills'])->name('skills');
    Route::get('/experiences', [DataController::class, 'experiences'])->name('experiences');
    Route::get('/educations', [DataController::class, 'educations'])->name('educations');
    Route::get('/projects', [DataController::class, 'projects'])->name('projects');
});
