<?php
Route::prefix('v1')->group(function() {
    // Public API
    Route::post('/career/internship', 'InternshipApplicationController@store');
    Route::post('/career/job', 'JobApplicationController@store');
    
    // Admin API (with auth:api middleware)
    Route::middleware('auth:api')->prefix('admin')->group(function() {
        Route::get('/internships', 'Admin\InternshipController@index');
        Route::get('/internships/{id}', 'Admin\InternshipController@show');
        Route::post('/internships/{id}/status', 'Admin\InternshipController@updateStatus');
        
        Route::get('/jobs', 'Admin\JobController@index');
        Route::get('/jobs/{id}', 'Admin\JobController@show');
        Route::post('/jobs/{id}/status', 'Admin\JobController@updateStatus');
    });
});