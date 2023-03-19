<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\GoofController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\AdminDashboardController;
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
    Route::get('/dashboard/admin/users', [AdminDashboardController::class, 'show_users'])->name('dashboard.admin.users');

    Route::get('/dashboard/admin/users/edit/{user}', [AdminDashboardController::class, 'edit_user'])->name('dashboard.admin.users.edit');
    Route::patch('/dashboard/admin/users/edit/{user}', [AdminDashboardController::class, 'update_user'])->name('dashboard.admin.users.update');

    Route::get('/dashboard/admin/users/delete/{user}', [AdminDashboardController::class, 'delete_user'])->name('dashboard.admin.users.delete');
    Route::delete('/dashboard/admin/users/destroy/{user}', [AdminDashboardController::class, 'destroy_user'])->name('dashboard.admin.users.destroy');

    Route::get('/dashboard/admin/goofs', [AdminDashboardController::class, 'show_goofs'])->name('dashboard.admin.goofs');

    Route::get('/dashboard/admin/goofs/edit/{goof}', [AdminDashboardController::class, 'edit_goof'])->name('dashboard.admin.goofs.edit');
    Route::put('/dashboard/admin/goofs/edit/{goof}', [AdminDashboardController::class, 'update_goof'])->name('dashboard.admin.goofs.update');

    Route::get('/dashboard/admin/goofs/delete/{goof}', [AdminDashboardController::class, 'delete_goof'])->name('dashboard.admin.goofs.delete');
    Route::delete('/dashboard/admin/goofs/destroy/{goof}', [AdminDashboardController::class, 'destroy_goof'])->name('dashboard.admin.goofs.destroy');


    Route::get('/dashboard/admin/tags', [AdminDashboardController::class, 'show_tags'])->name('dashboard.admin.tags');
    Route::get('/dashboard/admin/ratings', [AdminDashboardController::class, 'show_ratings'])->name('dashboard.admin.ratings');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::get('/profile/{profile}', [ProfileController::class, 'show'])->name('profile.show');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// goofs
Route::resource('goofs', GoofController::class)
    ->only(['index', 'show', 'store', 'edit', 'update', 'remove', 'destroy'])
    ->middleware(['auth', 'verified'])
;
Route::get('/goofs/{goof}/delete/', [GoofController::class, 'delete'])->name('goofs.delete');
//Route::get('/goofs/search/', [GoofController::class, 'search'])->name('goofs.search');

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

// tags
Route::resource('tags', TagController::class)
->only(['index', 'show', 'store', 'edit', 'update', 'remove', 'destroy'])
->middleware(['auth', 'verified'])
;
Route::get('/tags/{goof}/add/', [TagController::class, 'add'])->name('tags.add');
Route::put('/tags/{goof}/attach/', [TagController::class, 'attach'])->name('tags.attach');

require __DIR__.'/auth.php';


