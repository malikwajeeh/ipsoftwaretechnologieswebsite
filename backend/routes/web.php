<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\AboutController;
use App\Http\Controllers\Frontend\ServiceController;
use App\Http\Controllers\Frontend\ProjectController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\TeamController;
use App\Http\Controllers\Frontend\CareerController;
use App\Http\Controllers\Frontend\TechnologyController;
use App\Http\Controllers\Frontend\TestimonialController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\HeroSectionController;
use App\Http\Controllers\Admin\AboutSectionController;
use App\Http\Controllers\Admin\ServiceController as AdminServiceController;
use App\Http\Controllers\Admin\ProjectController as AdminProjectController;
use App\Http\Controllers\Admin\ProjectCategoryController;
use App\Http\Controllers\Admin\TechnologyController as AdminTechnologyController;
use App\Http\Controllers\Admin\IndustryController;
use App\Http\Controllers\Admin\WhyChooseUsController;
use App\Http\Controllers\Admin\ProcessController;
use App\Http\Controllers\Admin\TestimonialController as AdminTestimonialController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\ContactMessageController;
use App\Http\Controllers\Admin\TeamMemberController;
use App\Http\Controllers\Admin\JobOpeningController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\SeoSettingController;
use App\Http\Controllers\Admin\UserController;

// Frontend Routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/services', [ServiceController::class, 'index'])->name('services');
Route::get('/services/{slug}', [ServiceController::class, 'show'])->name('services.show');
Route::get('/projects', [ProjectController::class, 'index'])->name('projects');
Route::get('/projects/{slug}', [ProjectController::class, 'show'])->name('projects.show');
Route::get('/technologies', [TechnologyController::class, 'index'])->name('technologies');
Route::get('/team', [TeamController::class, 'index'])->name('team');
Route::get('/testimonials', [TestimonialController::class, 'index'])->name('testimonials');
Route::get('/careers', [CareerController::class, 'index'])->name('careers');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

// Admin Auth Routes
Route::get('/admin/login', [AuthController::class, 'showLogin'])->name('admin.login');
Route::post('/admin/login', [AuthController::class, 'login'])->name('admin.login.post');
Route::post('/admin/logout', [AuthController::class, 'logout'])->name('admin.logout');

// Admin Dashboard
Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    
    Route::resource('hero-sections', HeroSectionController::class);
    Route::resource('about-sections', AboutSectionController::class);
    Route::resource('services', AdminServiceController::class);
    Route::resource('projects', AdminProjectController::class);
    Route::resource('project-categories', ProjectCategoryController::class);
    Route::resource('technologies', AdminTechnologyController::class);
    Route::resource('industries', IndustryController::class);
    Route::resource('why-choose-us', WhyChooseUsController::class);
    Route::resource('processes', ProcessController::class);
    Route::resource('testimonials', AdminTestimonialController::class);
    Route::resource('faqs', FaqController::class);
    Route::resource('contact-messages', ContactMessageController::class)->only(['index', 'show', 'update', 'destroy']);
    Route::resource('team-members', TeamMemberController::class);
    Route::resource('job-openings', JobOpeningController::class);
    Route::resource('seo-settings', SeoSettingController::class);
    Route::resource('users', UserController::class);
    
    Route::get('/settings', [SettingController::class, 'index'])->name('settings.index');
    Route::post('/settings', [SettingController::class, 'update'])->name('settings.update');
});