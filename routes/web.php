<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TuitionAssessmentController;
use App\Http\Controllers\TuitionPaymentsController;
use App\Http\Controllers\TuitionRequestController;
use App\Http\Controllers\TuteeController;
use App\Http\Controllers\TutorController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// tutee dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// tutor dashboard
Route::get('/dashboard_tutor', function () {
    return view('dashboard_tutor');
})->middleware(['auth', 'verified'])->name('dashboard_tutor');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


//request route
Route::get('/requests', [TuitionRequestController::class, 'index'])->name('requests.index');

// tutee route
Route::get('/tutors', [TutorController::class, 'index'])->name('tutors.index');
Route::get('/tutors/{id}', [TutorController::class, 'show'])->name('tutors.show');
Route::get('/tutors/{id}/create', [TutorController::class, 'create'])->name('tutors.create');
Route::get('tutors/{id}/payments', [TuitionPaymentsController::class, 'index'])->name('payments.index');
// Route::post('/tutors', [TutorController::class, 'store'])->name('tutors.store');
Route::view('tutee/{id}/edit', 'tutee.tutors.edit');


//tutor route
Route::view('tutor/{id}/edit', 'tutor.tutees.edit');
Route::get('/tutees',[TuteeController::class, 'index'])->name('tutees.index');

// assessment route
Route::get('/assessments', [TuitionAssessmentController::class, 'index'])->name('assessments.index');
// Route::view('tutee/{id}/edit', 'tutee.tutors.edit');
require __DIR__.'/auth.php';
