<?php

use App\Http\Controllers\AdminProblemController;
use App\Http\Controllers\AdminTagController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DownloadFileController;
use App\Http\Controllers\ProblemController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SubmissionController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\TokenController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;

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

// ------------ Public routes --------------------------------------  //

Route::get('/', [WelcomeController::class, 'welcome'])->name('welcome.index');

Route::get('/dashboard', function () {
    return redirect()->route('welcome.index');
})->name('dashboard');

Route::get('leaderboard', [ProfileController::class, 'index'])->name('profile.index');

Route::get('problems', [ProblemController::class, 'index'])->name('problems.index');
Route::get('problems/{problem:slug}', [ProblemController::class, 'show'])->name('problems.show');

Route::get('profile/{user}', [ProfileController::class, 'show'])->name('profile.show');

Route::get('submissions', [SubmissionController::class, 'index'])->name('submissions.index');

Route::get('tags', [TagController::class, 'index'])->name('tags.index');
Route::get('tags/{tag:slug}', [TagController::class, 'show'])->name('tags.show');

// ------------ Authentication required ---------------------------- //

// Admin routes
Route::name('admin.')->prefix('admin')->middleware(['auth', 'verified', 'is.admin'])->group(function () {

    Route::get('/contacts', [ContactController::class, 'index'])->name('contacts.index');

    Route::get('/testcase/{id}/{type}', [DownloadFileController::class, 'download'])->name('testcase.download');
    Route::resource('/problems', AdminProblemController::class)->parameters(['problems' => 'problem:slug']);
    Route::resource('/tags', AdminTagController::class)->parameters(['tags' => 'tag:slug']);
});

// Regular user routes
Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('submissions/{submission}', [SubmissionController::class, 'show'])->name('submissions.show');
    Route::post('submissions', [SubmissionController::class, 'store'])->name('submissions.store');

    Route::get('/tokens', [TokenController::class, 'index'])->name('tokens.index');
    Route::post('/tokens', [TokenController::class, 'store'])->name('tokens.store');
    Route::delete('/tokens/{token}', [TokenController::class, 'destroy'])->name('tokens.destroy');
});

require __DIR__.'/auth.php';
