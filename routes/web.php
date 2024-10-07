<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\FrontendContactController;
use App\Http\Controllers\FrontendExperienceController;
use App\Http\Controllers\FrontendHomeController;
use App\Http\Controllers\FrontendInterestController;
use App\Http\Controllers\FrontendProfileController;
use App\Http\Controllers\FrontendSkillController;
use App\Http\Controllers\InterestsController;
use App\Http\Controllers\listSkillController;
use App\Http\Controllers\PlantController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\UserController;
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

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate'])->name('login');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/register', [RegisterController::class, 'index'])->name('register');

Route::get('/home', [FrontendHomeController::class, 'index'])->name('home');
Route::get('/profil', [FrontendProfileController::class, 'index'])->name('frontProfil');
Route::get('/pengalaman', [FrontendExperienceController::class, 'index'])->name('frontExperience');
Route::get('/keahlian', [FrontendSkillController::class, 'index'])->name('frontSkill');
Route::get('/kontak', [FrontendContactController::class, 'index'])->name('frontKontak');
Route::get('/minat', [FrontendInterestController::class, 'index'])->name('frontInterest');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/category', [CategoryController::class, 'index'])->name('category');
    Route::get('/category/fetch', [CategoryController::class, 'fetch'])->name('fetch.category');
    Route::post('/category/store', [CategoryController::class, 'store'])->name('save.category');
    Route::delete('/category/delete', [CategoryController::class, 'destroy'])->name('delete.category');
    Route::get('/category/edit', [CategoryController::class, 'edit'])->name('edit.category');
    Route::post('/category/update', [CategoryController::class, 'update'])->name('update.category');

    Route::get('/plants', [PlantController::class, 'index'])->name('plants');
    Route::get('/fetch', [PlantController::class, 'fetch'])->name('getall.plants');
    Route::get('/show', [PlantController::class, 'show'])->name('detail.plants');
    Route::post('/store', [PlantController::class, 'store'])->name('save.plants');
    Route::delete('/delete', [PlantController::class, 'destroy'])->name('delete.plants');
    Route::get('/edit', [PlantController::class, 'edit'])->name('edit.plants');
    Route::post('/update', [PlantController::class, 'update'])->name('update.plants');

    Route::get('/skill', [SkillController::class, 'index'])->name('skill')->middleware('auth');
    Route::get('/skill/fetch', [SkillController::class, 'fetch'])->name('fetch.skill');
    Route::post('/skill/store', [SkillController::class, 'store'])->name('save.skill');
    Route::delete('/skill/delete', [SkillController::class, 'destroy'])->name('delete.skill');
    Route::get('/skill/edit', [SkillController::class, 'edit'])->name('edit.skill');
    Route::post('/skill/update', [SkillController::class, 'update'])->name('update.skill');

// Route::get('/contact', [ContactTypeController::class, 'index'])->name('contact');
// Route::get('/contact/fetch', [ContactTypeController::class, 'fetch'])->name('fetch.contact');
// Route::post('/contact/store', [ContactTypeController::class, 'store'])->name('save.contact');
// Route::delete('/contact/delete', [ContactTypeController::class, 'destroy'])->name('delete.contact');
// Route::get('/contact/edit', [ContactTypeController::class, 'edit'])->name('edit.contact');
// Route::post('/contact/update', [ContactTypeController::class, 'update'])->name('update.contact');

    Route::get('/user', [UserController::class, 'index'])->name('user');
    Route::get('/user/fetch', [UserController::class, 'fetch'])->name('fetch.user');
    Route::post('/user/store', [UserController::class, 'store'])->name('save.user');
    Route::delete('/user/delete', [UserController::class, 'destroy'])->name('delete.user');
    Route::get('/user/edit', [UserController::class, 'edit'])->name('edit.user');
    Route::post('/user/update', [UserController::class, 'update'])->name('update.user');

    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::get('/profile/fetch', [ProfileController::class, 'fetch'])->name('fetch.profile');
    Route::post('/profile/store', [ProfileController::class, 'store'])->name('save.profile');
    Route::delete('/profile/delete', [ProfileController::class, 'destroy'])->name('delete.profile');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('edit.profile');
    Route::post('/profile/update', [ProfileController::class, 'update'])->name('update.profile');

    Route::get('/experience', [ExperienceController::class, 'index'])->name('experience');
    Route::get('/experience/fetch', [ExperienceController::class, 'fetch'])->name('fetch.experience');
    Route::post('/experience/store', [ExperienceController::class, 'store'])->name('save.experience');
    Route::delete('/experience/delete', [ExperienceController::class, 'destroy'])->name('delete.experience');
    Route::get('/experience/edit', [ExperienceController::class, 'edit'])->name('edit.experience');
    Route::post('/experience/update', [ExperienceController::class, 'update'])->name('update.experience');

    Route::get('/listSkill', [listSkillController::class, 'index'])->name('listSkill');
    Route::get('/listSkill/fetch', [listSkillController::class, 'fetch'])->name('fetch.listSkill');
    Route::post('/listSkill/store', [listSkillController::class, 'store'])->name('save.listSkill');
    Route::delete('/listSkill/delete', [listSkillController::class, 'destroy'])->name('delete.listSkill');
    Route::get('/listSkill/edit', [listSkillController::class, 'edit'])->name('edit.listSkill');
    Route::post('/listSkill/update', [listSkillController::class, 'update'])->name('update.listSkill');

    Route::get('/contact', [ContactController::class, 'index'])->name('contact');
    Route::get('/contact/fetch', [ContactController::class, 'fetch'])->name('fetch.contact');
    Route::post('/contact/store', [ContactController::class, 'store'])->name('save.contact');
    Route::delete('/contact/delete', [ContactController::class, 'destroy'])->name('delete.contact');
    Route::get('/contact/edit', [ContactController::class, 'edit'])->name('edit.contact');
    Route::post('/contact/update', [ContactController::class, 'update'])->name('update.contact');

    Route::get('/interest', [InterestsController::class, 'index'])->name('interest');
    Route::get('/interest/fetch', [InterestsController::class, 'fetch'])->name('fetch.interest');
    Route::post('/interest/store', [InterestsController::class, 'store'])->name('save.interest');
    Route::delete('/interest/delete', [InterestsController::class, 'destroy'])->name('delete.interest');
    Route::get('/interest/edit', [InterestsController::class, 'edit'])->name('edit.interest');
    Route::post('/interest/update', [InterestsController::class, 'update'])->name('update.interest');
});
