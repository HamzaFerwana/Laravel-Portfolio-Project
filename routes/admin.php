<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\WorkController;
use App\Http\Middleware\CheckUserType;

Route::prefix('admin')->name('admin.')->middleware('auth', CheckUserType::class)->group(function() {

Route::get('/', [AdminController::class, 'index'])->name('index');
Route::get('/intro-skew', [AdminController::class, 'intro_skew'])->name('intro-skew');
Route::post('/intro-skew-data', [AdminController::class, 'intro_skew_data'])->name('intro-skew-data');
Route::get('/about-me', [AdminController::class, 'about_me'])->name('about-me');
Route::post('/about-me-data', [AdminController::class, 'about_me_data'])->name('about-me-data');
Route::post('/skills-data', [AdminController::class, 'skills_data'])->name('skills-data');
Route::get('/ed-skills', [AdminController::class, 'ed_skills'])->name('ed-skills');
Route::delete('delete-skill/{id}', [AdminController::class, 'delete_skill'])->name('delete-skill');
Route::get('/edit-skill/{id}', [AdminController::class, 'edit_skill'])->name('edit-skill');
Route::put('/edit-skill-data/{id}', [AdminController::class, 'edit_skill_data'])->name('edit-skill-data');
Route::resource('services', ServiceController::class);
Route::get('/accomplishments', [ServiceController::class, 'accomplishments'])->name('accomplishments');
Route::post('/accomplishments-data', [ServiceController::class, 'accomplishments_data'])->name('accomplishments-data');
Route::resource('works', WorkController::class);
Route::resource('blogs', BlogController::class);
Route::post('notify', [AdminController::class, 'notify'])->name('notify');
Route::get('read-notification/{id}', [AdminController::class, 'read_notification'])->name('read-notification');

});







