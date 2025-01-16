<?php

use App\Http\Controllers\ChatConversationController;
use App\Http\Controllers\ChatMessageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ScoreController;
use App\Http\Controllers\TuitionAssessmentController;
use App\Http\Controllers\TuitionPaymentsController;
use App\Http\Controllers\TuitionRequestController;
use App\Http\Controllers\TuteeController;
use App\Http\Controllers\TutorController;
use App\Livewire\ChatConversationsPage;
use App\Livewire\ChatMessagesPage;
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
Route::post('/requests/tutor/{id}', [TuitionRequestController::class, 'store'])->name('requests.store');
Route::post('/request/update/status', [TuitionRequestController::class, 'update_status'])->name('requests.update_status');
Route::post('requests/payment/submit', [TuitionPaymentsController::class, 'submit'])->name('payment.submit');

// tutee route
Route::get('/tutors', [TutorController::class, 'index'])->name('tutors.index');
Route::get('/tutors/{id}', [TutorController::class, 'show'])->name('tutors.show');
Route::get('/tutors/{id}/create', [TutorController::class, 'create'])->name('tutors.create');
Route::get('tutors/{id}/payments', [TuitionPaymentsController::class, 'index'])->name('payments.index');
// Route::post('/tutors', [TutorController::class, 'store'])->name('tutors.store');
Route::view('tutee/{id}/edit', 'tutee.tutors.edit');


//tutor route
Route::view('tutor/{id}/edit', 'tutor.tutees.edit');
Route::get('/tutees', [TuteeController::class, 'index'])->name('tutees.index');

// assessment route
Route::get('/assessments', [TuitionAssessmentController::class, 'index'])->name('assessments.index');
Route::get('/assessments/create', [TuitionAssessmentController::class, 'create'])->name('assessments.create');
Route::post('/assessments/store', [TuitionAssessmentController::class, 'store'])->name('assessments.store');
Route::get('/assessments/{tuitionAssessment}/edit', [TuitionAssessmentController::class, 'edit'])->name('assessments.edit');
Route::put('/assessments/{tuitionAssessment}', [TuitionAssessmentController::class, 'update'])->name('assessments.update');
Route::delete('/assessments/{tuitionAssessment}', [TuitionAssessmentController::class, 'destroy'])->name('assessments.destroy');
Route::delete('/assessments/{assessment}/questions/{index}', [TuitionAssessmentController::class, 'deleteQuestion']);


// Route::get('tutee/{id}/assessments/{request_id}', [TuitionRequestController::class, 'assessment'])->name('tutee.assessment');
Route::post('tutee/assessment/submit', [TuitionRequestController::class, 'submit_assessment'])->name('tutee.submit_assessment');
// Route::view('tutee/{id}/edit', 'tutee.tutors.edit');

//score
// Route::view('/scores', 'tutor.scores.index');
// Route::get('/scores', [ScoreController::class, 'index'])->name('scores.index');
Route::get('/assessments/results', function () {
    return view('tutor.assessments.result'); // Adjusted to 'tutor.assessments.result'
})->name('assessments.results');


//chat
Route::middleware(['auth'])->group(function () {
    Route::get('/chat/conversations', ChatConversationsPage::class)->name('chat.conversations.index');
    Route::get('/chat/conversations/{chat_conversation_id}', ChatMessagesPage::class)->name('chat.conversations.show');
    Route::post('/chat/conversations/redirect/{user_id}', [ChatConversationController::class, 'redirect'])->name('chat.conversations.redirect');

});
Route::get('/chat/conversations/redirect/{user_id}', [ChatConversationController::class, 'redirect'])->name('chat.conversations.redirect');

require __DIR__ . '/auth.php';
