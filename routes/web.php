<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Employer\EmployerController;
use App\Http\Controllers\JobSeeker\JobSeekerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\Employer\JobListingController;
use App\Http\Controllers\JobSeeker\ApplicationController;
use App\Http\Controllers\Employer\CondidateController;
use App\Http\Controllers\Admin\UserManagementController;
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

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');
require __DIR__.'/auth.php';

Route::middleware(['auth'])->group(function(){
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/visitor-search', [JobSeekerController::class, 'search'])->name('visitor.search');
    Route::get('/job-listing/{id}', [ApplicationController::class, 'jobListingDetailSearch'])->name('jobseeker.joblisting.detail');


    Route::middleware(['isAdmin'])->group(function(){
        Route::get('/admin-dashboard', [AdminController::class, 'adminDashboard'])->name('admin.dashboard');
        Route::post('/admin-logout', [AdminController::class, 'adminLogout'])->name('admin.logout.custom');

        Route::prefix('admin')->group(function(){
            Route::get('/profile', [AdminController::class, 'profileDetail'])->name('admin.profile');
            Route::get('/edit-profile/{id}',[AdminController::class, 'editProfile'])->name('admin.edit.profile');
            Route::put('/update-profile/{id}',[AdminController::class, 'updateProfile'])->name('admin.update.profile');
            
            Route::get('/admin-change-password', [AdminController::class, 'changePassword'])->name('admin.changePassword');
            Route::post('/admin-update-password', [AdminController::class, 'updatePassword'])->name('admin.updatePassword');
        });

        Route::prefix('admin')->group(function(){
            Route::get('/all-users', [UserManagementController::class, 'allUsers'])->name('admin.user.all');
          Route::get('/active-users', [UserManagementController::class, 'activeUsers'])->name('admin.user.active');
          Route::get('/blocked-users', [UserManagementController::class, 'blockedUsers'])->name('admin.user.blocked');
          Route::post('/change-status', [UserManagementController::class, 'changeStatus'])->name('admin.user.changeStatus');
          //admin.user.destroy
          Route::delete('/delete/{id}', [UserManagementController::class, 'destroy'])->name('admin.user.destroy');
          
       });

    });

    Route::middleware(['isEmployer'])->group(function(){
        Route::get('/employer-dashboard', [EmployerController::class, 'employerDashboard'])->name('employer.dashboard');
        Route::post('/employer-logout', [EmployerController::class, 'employerLogout'])->name('employer.logout.custom');

        Route::prefix('employer')->group(function(){
            Route::get('/employer-change-password', [EmployerController::class, 'changePassword'])->name('employer.changePassword');
            Route::post('/employer-update-password', [EmployerController::class, 'updatePassword'])->name('employer.updatePassword');

            Route::get('/profile', [EmployerController::class, 'profileDetail'])->name('employer.profile');
            Route::get('/edit-profile/{id}',[EmployerController::class, 'editProfile'])->name('employer.edit.profile');
            Route::put('/update-profile/{id}',[EmployerController::class, 'updateProfile'])->name('employer.update.profile');
        });

        Route::prefix('employer')->group(function(){
            Route::get('/list', [JobListingController::class, 'index'])->name('employer.joblisting.index');
            Route::get('/create', [JobListingController::class, 'create'])->name('employer.joblisting.create');
            Route::post('/store', [JobListingController::class, 'store'])->name('employer.joblisting.store');
            Route::get('/show/{id}', [JobListingController::class, 'show'])->name('employer.joblisting.show');
            Route::get('/edit/{id}', [JobListingController::class, 'edit'])->name('employer.joblisting.edit');
            Route::put('/update/{id}', [JobListingController::class, 'update'])->name('employer.joblisting.update');
            Route::delete('/delete/{id}', [JobListingController::class, 'destroy'])->name('employer.joblisting.delete');
        });

        Route::prefix('employer')->group(function(){
            Route::get('/applied-condidate/{id}', [CondidateController::class, 'appliedCondidate'])->name('employer.condidate.applied');
            Route::post('/applied-condidate-change-status', [CondidateController::class, 'appliedCondidatechangeStatus'])->name('employer.condidate.applied.status');
            Route::get('/applied-condidate-show/{id}', [CondidateController::class, 'AppliedCondidateDetail'])->name('employer.condidate.applied.detail');
        });
    });

    Route::middleware(['isJobseeker'])->group(function(){
        Route::get('/jobseeker-dashboard', [JobSeekerController::class, 'jobseekerDashboard'])->name('jobseeker.dashboard');
        Route::post('/jobseeker-logout', [JobSeekerController::class, 'jobseekerLogout'])->name('jobseeker.logout.custom');

        Route::prefix('jobseeker')->group(function(){
            Route::get('/jobseeker-change-password', [JobSeekerController::class, 'changePassword'])->name('jobseeker.changePassword');
            Route::post('/jobseeker-update-password', [JobSeekerController::class, 'updatePassword'])->name('jobseeker.updatePassword');
            Route::get('/profile', [JobSeekerController::class, 'profileDetail'])->name('jobseeker.profile');
            Route::get('/edit-profile/{id}',[JobSeekerController::class, 'editProfile'])->name('jobseeker.edit.profile');
            Route::put('/update-profile/{id}',[JobSeekerController::class, 'updateProfile'])->name('jobseeker.update.profile');
        });

        // here add for job applicaiotn 
        Route::prefix('jobseeker')->group(function(){
            Route::get('/job-listing', [ApplicationController::class, 'jobListing'])->name('jobseeker.joblisting');
            Route::get('/job-listing/{id}', [ApplicationController::class, 'jobListingDetail'])->name('jobseeker.joblisting.detail');
            Route::post('/job-apply', [ApplicationController::class, 'jobApply'])->name('jobseeker.job.apply');
            Route::get('/job-applied', [ApplicationController::class, 'jobApplied'])->name('jobseeker.job.applied');
            Route::get('/job-applied/{id}', [ApplicationController::class, 'jobAppliedDetail'])->name('jobseeker.job.applied.detail');

        });
        
    });

});






Route::get('/employerCreate', [EmployerController::class, 'create'])->name('employer.create');
Route::get('/jobseekerCreate', [JobSeekerController::class, 'create'])->name('jobseeker.create');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

