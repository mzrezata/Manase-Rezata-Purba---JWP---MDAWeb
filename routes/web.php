<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


Route::get('/', 'App\Http\Controllers\HomeController@index')->name('home');
Route::get('/layanan', 'App\Http\Controllers\HomeController@services')->name('services');
Route::get('/karir', 'App\Http\Controllers\HomeController@career')->name('career');
Route::get('/about', 'App\Http\Controllers\HomeController@about')->name('about');
Route::get('/profile', 'App\Http\Controllers\HomeController@profile')->name('profile'); // profile pengunjung


Route::middleware(['auth', 'role:visitor'])->group(function () {
    Route::post('/career/internship/apply', 'App\Http\Controllers\InternshipApplicationController@store')->name('internship.apply');
    Route::post('/career/job/apply', 'App\Http\Controllers\JobApplicationController@store')->name('job.apply');
});

Route::middleware(['auth', 'role:visitor'])->group(function () {
    Route::get('/profile/application/{type}/{id}', 'ProfileController@showApplicationDetail')
        ->name('profile.application.detail');
});

Auth::routes(['register' => true]);


Route::get('/home', function () {
    $user = Auth::user();

    if ($user->role === 'visitor') {
        return redirect()->route('profile');
    }

    return redirect()->route('admin.dashboard');
})->middleware('auth');

Route::prefix('admin')->middleware(['auth', 'role:admin,hr,superadmin'])->group(function () {
    Route::get('/dashboard', 'App\Http\Controllers\Admin\DashboardController@index')->name('admin.dashboard');
    // Profile Management
    Route::get('/profile', 'App\Http\Controllers\Admin\ProfileController@index')->name('admin.profile.index');
    Route::put('/profile', 'App\Http\Controllers\Admin\ProfileController@update')->name('admin.profile.update');
    Route::put('/profile/password', 'App\Http\Controllers\Admin\ProfileController@updatePassword')->name('admin.profile.update-password');
    Route::post('/profile/avatar', 'App\Http\Controllers\Admin\ProfileController@update')->name('admin.profile.upload-avatar');
    Route::delete('/profile/avatar', 'App\Http\Controllers\Admin\ProfileController@deleteAvatar')->name('admin.profile.delete-avatar');
    // Internship Management
    Route::prefix('internships')->group(function () {
        Route::get('/', 'App\Http\Controllers\Admin\InternshipController@index')->name('admin.internships.index');
        Route::get('/{id}', 'App\Http\Controllers\Admin\InternshipController@show')->name('admin.internships.show');
        Route::post('/{id}/status', 'App\Http\Controllers\Admin\InternshipController@updateStatus')->name('admin.internships.update-status');
        Route::delete('/{id}', 'App\Http\Controllers\Admin\InternshipController@destroy')->name('admin.internships.destroy');
    });

    // Job Management
    Route::prefix('jobs')->group(function () {
        Route::get('/', 'App\Http\Controllers\Admin\JobController@index')->name('admin.jobs.index');
        Route::get('/{id}', 'App\Http\Controllers\Admin\JobController@show')->name('admin.jobs.show');
        Route::post('/{id}/status', 'App\Http\Controllers\Admin\JobController@updateStatus')->name('admin.jobs.update-status');
        Route::delete('/{id}', 'App\Http\Controllers\Admin\JobController@destroy')->name('admin.jobs.destroy');
    });
    // User Management
     Route::prefix('users')->group(function () {
        Route::get('/', 'App\Http\Controllers\Admin\UserController@index')->name('admin.users.index');
        Route::get('/create', 'App\Http\Controllers\Admin\UserController@create')->name('admin.users.create');
        Route::post('/', 'App\Http\Controllers\Admin\UserController@store')->name('admin.users.store');
        Route::get('/{user}/edit', 'App\Http\Controllers\Admin\UserController@edit')->name('admin.users.edit');
        Route::put('/{user}', 'App\Http\Controllers\Admin\UserController@update')->name('admin.users.update');
        Route::delete('/{user}', 'App\Http\Controllers\Admin\UserController@destroy')->name('admin.users.destroy');
    });
    // job vacancies
    Route::prefix('job-vacancies')->group(function () {
        Route::get('/',                  'App\Http\Controllers\Admin\JobVacancyController@index')->name('admin.job_vacancies.index');
        Route::get('/create',            'App\Http\Controllers\Admin\JobVacancyController@create')->name('admin.job_vacancies.create');
        Route::post('/',                 'App\Http\Controllers\Admin\JobVacancyController@store')->name('admin.job_vacancies.store');
        Route::get('/{jobVacancy}/edit', 'App\Http\Controllers\Admin\JobVacancyController@edit')->name('admin.job_vacancies.edit');
        Route::put('/{jobVacancy}',      'App\Http\Controllers\Admin\JobVacancyController@update')->name('admin.job_vacancies.update');
        Route::delete('/{jobVacancy}',   'App\Http\Controllers\Admin\JobVacancyController@destroy')->name('admin.job_vacancies.destroy');
    });
});
