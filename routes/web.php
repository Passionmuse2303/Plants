<?php

use App\Http\Controllers\Admin\BreederManageController;
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
use App\Http\Controllers\Admin\GrowerManageController;
use App\Http\Controllers\Admin\IndexController;
use App\Http\Controllers\Admin\SampleManageController;
use App\Http\Controllers\Admin\VarietyReportManageController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\User\AuthenticationController;
use App\Http\Controllers\User\SampleController;
use App\Http\Controllers\User\VarietyReportController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'User.signin');

//User section
Route::group(['namespace' => 'User', 'prefix' => 'user', 'as' => 'user.'], function () {
    // User Authentication
    Route::get('/', [AuthenticationController::class, 'signinPage'])->name('signinPage');
    Route::get('/signin', [AuthenticationController::class, 'signinPage']);
    Route::get('/logout', [AuthenticationController::class, 'logout'])->name('logout');
    Route::post('/authenticate', [AuthenticationController::class, 'authenticate'])->name('authenticate');

    // Variety Report
    Route::get('/varietyReport/overview', [VarietyReportController::class, 'overviewPage'])->name('varietyReport.overviewPage');
    Route::get('/varietyReport/detail/{varietyReport_id}', [VarietyReportController::class, 'detailPage'])->name('varietyReport.detailPage');

    // Sample
    Route::get('/sample/view/{sample_id}', [SampleController::class, 'viewPage'])->name('sample.viewPage');
    Route::get('/sample/add/{varietyReport_id}', [SampleController::class, 'addPage'])->name('sample.addPage');
    Route::post('/sample/add', [SampleController::class, 'addNewSample'])->name('sample.addNewSample');

    // Notification
    Route::post('/notification/read', [NotificationController::class, 'read'])->name('notfication.read');
});

//Admin section
Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'adminAuthorization'], function () {
    // Dashboard
    Route::get('/', [IndexController::class, 'dashboardPage'])->name('dashboardPage');

    // Breeder
    Route::get('/breeder', [BreederManageController::class, 'overviewPage'])->name('breeder.overviewPage');
    Route::get('/breeder/view/{breeder_id}', [BreederManageController::class, 'viewPage'])->name('breeder.viewPage');
    Route::get('/breeder/add', [BreederManageController::class, 'addPage'])->name('breeder.addPage');
    Route::get('/breeder/edit/{breeder_id}', [BreederManageController::class, 'editPage'])->name('breeder.editPage');
    Route::get('/breeder/delete/{breeder_id}', [BreederManageController::class, 'delete'])->name('breeder.delete');
    Route::get('/breeder/exportCSV', [BreederManageController::class, 'exportCSV'])->name('breeder.exportCSV');
    Route::post('/breeder/add', [BreederManageController::class, 'addNewBreeder'])->name('breeder.add');
    Route::post('/breeder/edit', [BreederManageController::class, 'addNewBreeder'])->name('breeder.edit');

    // Grower
    Route::get('/grower', [GrowerManageController::class, 'overviewPage'])->name('grower.overviewPage');
    Route::get('/grower/view/{grower_id}', [GrowerManageController::class, 'viewPage'])->name('grower.viewPage');
    Route::get('/grower/add', [GrowerManageController::class, 'addPage'])->name('grower.addPage');
    Route::get('/grower/edit/{grower_id}', [GrowerManageController::class, 'editPage'])->name('grower.editPage');
    Route::get('/grower/delete/{grower_id}', [GrowerManageController::class, 'delete'])->name('grower.delete');
    Route::get('/grower/importCSV', [GrowerManageController::class, 'importCSV'])->name('grower.importCSV');
    Route::get('/grower/exportCSV', [GrowerManageController::class, 'exportCSV'])->name('grower.exportCSV');
    Route::post('/grower/add', [GrowerManageController::class, 'addNewGrower'])->name('grower.add');
    Route::post('/grower/edit', [GrowerManageController::class, 'addNewGrower'])->name('grower.edit');

    // Sample
    Route::get('/sample/view/{sample_id}', [SampleManageController::class, 'viewPage'])->name('sample.viewPage');
    Route::get('/sample/add/{varietyReport_id}', [SampleManageController::class, 'addPage'])->name('sample.addPage');
    Route::get('/sample/edit/{sample_id}', [SampleManageController::class, 'editPage'])->name('sample.editPage');
    Route::get('/sample/delete/{sample_id}', [SampleManageController::class, 'delete'])->name('sample.delete');

    Route::post('/sample/add', [SampleManageController::class, 'addNewSample'])->name('sample.add');
    Route::post('/sample/edit', [SampleManageController::class, 'addNewSample'])->name('sample.edit');

    // VarietyReport
    Route::get('/varietyReport', [VarietyReportManageController::class, 'overviewPage'])->name('varietyReport.overviewPage');
    Route::get('/varietyReport/view/{report_id}', [VarietyReportManageController::class, 'viewPage'])->name('varietyReport.viewPage');
    Route::get('/varietyReport/add', [VarietyReportManageController::class, 'addPage'])->name('varietyReport.addPage');
    Route::get('/varietyReport/edit/{report_id}', [VarietyReportManageController::class, 'editPage'])->name('varietyReport.editPage');
    Route::get('/varietyReport/delete/{grower_id}', [VarietyReportManageController::class, 'delete'])->name('varietyReport.delete');
    Route::get('/varietyReport/exportCSV', [VarietyReportManageController::class, 'exportCSV'])->name('varietyReport.exportCSV');
    Route::post('/varietyReport/add', [VarietyReportManageController::class, 'addNewVarietyReport'])->name('varietyReport.add');
    Route::post('/varietyReport/edit', [VarietyReportManageController::class, 'addNewVarietyReport'])->name('varietyReport.edit');

});
