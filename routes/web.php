<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\FormController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\FormSubmissionController;
use App\Http\Controllers\Admin\FormFieldController;
use App\Http\Middleware\AdminAuthentication;

Route::get('/',[FormSubmissionController::class,'index'])->name('home');

Route::get('/admin',[AdminController::class,'adminLogin'])->name('admin');
Route::post('/admin',[AdminController::class,'adminAuthentication'])->name('admin.login');

Route::middleware(AdminAuthentication::class)->group(function(){

    Route::get('/admin-dashboard',[AdminController::class,'index'])->name('admin.dashboard');
    Route::get('/admin-logout',[AdminController::class,'logout'])->name('logout');
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::resources([
            'forms' => FormController::class,
            'formFields' => FormFieldController::class,
        ]);
    });

});

Route::resource('forms', FormSubmissionController::class)->only(['show', 'store']);


?>