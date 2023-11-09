<?php

use App\Http\Controllers\ProblemController;
use App\Http\Controllers\SubmissionController;
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

Route::get('/', [WelcomeController::class, 'welcome'])->name('welcome.index');

Route::get('problems', [ProblemController::class, 'index'])->name('problems.index');
Route::get('problems/{id}', [ProblemController::class, 'show'])->name('problems.show');

Route::get('submissions', [SubmissionController::class, 'index'])->name('submissions.index');
