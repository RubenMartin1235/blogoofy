<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\GoofController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\RatingController;
use Illuminate\Support\Facades\Route;

use App\Models\Goof;
use App\Models\Comment;
use App\Models\Rating;

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
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile/{profile}', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile/edit/', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// goofs
Route::resource('goofs', GoofController::class)
    ->only(['index', 'show', 'store', 'edit', 'update', 'remove', 'destroy'])
    ->middleware(['auth', 'verified'])
;
Route::get('/goofs/{goof}/delete/', [GoofController::class, 'delete'])->name('goofs.delete');

// comments
Route::resource('comments', CommentController::class)
    ->only(['index', 'show', 'store', 'edit', 'update', 'remove', 'destroy'])
    ->middleware(['auth', 'verified'])
;
Route::post('/goofs/{goof}/comment/', [CommentController::class, 'store'])->name('comments.store');
Route::get('/comments/{comment}/delete/', [CommentController::class, 'delete'])->name('comments.delete');

// ratings
Route::resource('ratings', RatingController::class)
    ->only(['index', 'show', 'store', 'edit', 'update', 'remove', 'destroy'])
    ->middleware(['auth', 'verified'])
;
Route::post('/ratings/{goof}/rating/', [RatingController::class, 'store'])->name('ratings.store');


require __DIR__.'/auth.php';


