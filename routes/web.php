<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WebsiteController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// signup
Route::any('user-signup', [AdminController::class, 'userCreateAccount'])->name('user.signup');

// user login
Route::get('/', [AdminController::class, 'userLoginForm'])->name('user.login');
// Route::get('/user-feed', [AdminController::class, 'feed'])->name('user.feed');
Route::post('/login-post', [AdminController::class, 'userLoginPostReq']);
// company login
Route::any('company-login', [AdminController::class, 'companyLogin'])->name('company.login');
// admin login
Route::any('admin-login', [AdminController::class, 'adminLogin'])->name('admin.login');

Route::middleware(['auth'])->group(function () {

    //Admin
    Route::group(['middleware' => ['isAdmin']], function () {

        Route::get('dashboard', [AdminController::class, 'dashboard']);
        Route::get('admin-reward', [AdminController::class, 'reward']);
        Route::any('admin-update-profile', [AdminController::class, 'updateProfile']);
        Route::get('adminReward', [AdminController::class, 'adminReward']);
        Route::get('addReward/{id?}', [AdminController::class, 'addReward']);
        Route::post('store-reward', [AdminController::class, 'storeReward']);
        Route::post('delete-reward/{id}', [AdminController::class, 'deleteReward']);
        Route::get('adminRewardDetail', [AdminController::class, 'adminRewardDetail']);
        Route::get('add-company/{id?}', [AdminController::class, 'addCompany']);
        Route::get('view-company/{id}', [AdminController::class, 'viewCompany']);
        Route::post('store-company', [AdminController::class, 'storeCompany']);
        Route::any('privacy-policy', [AdminController::class, 'privacyPolicy']);
        Route::any('term-condition', [AdminController::class, 'termCondition']);
        Route::get('help', [AdminController::class, 'help']);
        Route::any('help-detail/{id}', [AdminController::class, 'helpDetail']);
        Route::any('help-bk', [AdminController::class, 'helpBk'])->name('helpPostReq');
        Route::post('delete-company/{id}', [AdminController::class, 'deleteCompany']);
        Route::post('export-company', [AdminController::class, 'exportExcelUser'])->name('export.company');
        Route::get('admin-video', [AdminController::class, 'adminVideo']);
        Route::get('create-video/{id?}', [AdminController::class, 'createVideo']);
        Route::post('store-video', [AdminController::class, 'storeVideo']);
        Route::get('edit-video', [AdminController::class, 'editVideo']);
        Route::post('delete-video/{id}', [AdminController::class, 'deleteVideo']);
        Route::get('admin-video-detail/{id}', [AdminController::class, 'adminVideoDetail']);
        Route::get('admin-logout', [AdminController::class, 'adminLogout']);
    });

    Route::get('user-logout', [AdminController::class, 'userLogout']);



    Route::group(['middleware' => ['isCompany']], function () {
        Route::get('company-dashboard', [CompanyController::class, 'companyDashboard']);
        Route::get('company-reward', [CompanyController::class, 'companyReward']);
        Route::get('company-video', [CompanyController::class, 'companyVideo']);
        Route::any('update-profile', [CompanyController::class, 'updateProfile']);
        Route::get('company-video-detail/{id}', [CompanyController::class, 'companyVideoDetail']);
        Route::get('company-privacy', [CompanyController::class, 'companyPrivacy']);
        Route::get('company-term', [CompanyController::class, 'companyTerm']);
        Route::any('company-help', [CompanyController::class, 'companyHelp']);
        Route::get('add-user/{id?}', [CompanyController::class, 'addUser']);
        Route::post('store-user', [CompanyController::class, 'storeUser']);
        Route::get('view-user/{id}', [CompanyController::class, 'viewUser']);
        Route::get('company-setting', [CompanyController::class, 'companySetting']);
        Route::post('delete-user/{id}', [CompanyController::class, 'deleteUser']);
        Route::post('export-user', [CompanyController::class, 'exportExcelUser'])->name('export.user');
        Route::post('video-settings', [CompanyController::class, 'videoSettings'])->name('video-settings');
        Route::post('reject-user-status', [CompanyController::class, 'rejectUserStatus'])->name('reject-user-status');
        Route::post('accept-user-status', [CompanyController::class, 'acceptUserStatus'])->name('accept-user-status');
        Route::get('company-logout', [AdminController::class, 'companyLogout']);
    });

    // user
    Route::get('/user-feed', [AdminController::class, 'feed'])->name('user.feed');
    Route::post('/videos/watch', [AdminController::class, 'watchVideo'])->name('videos.watch');
    Route::post('watched-video', [CompanyController::class, 'watchedVideo'])->name('watched-video');
    Route::get('add-award', [UserController::class, 'addReward'])->name('add-award');
    Route::get('user-reward', [UserController::class, 'userReward']);
    Route::get('user-reply/{id}', [UserController::class, 'userReply']);
    Route::get('user-review', [UserController::class, 'userReview']);
    Route::get('user-dashboard', [UserController::class, 'userDashbaord'])->name('user-dashboard');
    Route::get('user-video', [UserController::class, 'userVideo']);
    Route::get('user-video-detail/{id}', [UserController::class, 'userVideoDetail']);
    Route::get('user-privacy', [UserController::class, 'userPrivacy']);
    Route::get('user-term', [UserController::class, 'userTerm']);
    Route::any('user-help', [UserController::class, 'userHelp']);
    Route::post('recorded-video', [UserController::class, 'recordedVideos'])->name('recorded-video');
    Route::any('user-update-profile', [UserController::class, 'updateProfile']);
    Route::any('reward', [UserController::class, 'rewardSpinner']);
    // Route::any('update-spinner-status', [UserController::class, 'updateSpinnerStatus']);
});
Route::get('update-password', [UserController::class, 'updatePassword']);
Route::post('storePassword', [UserController::class, 'storePassword']);
Route::get('user-otp', [UserController::class, 'userOtp'])->name('user-otp');
Route::get('reset-password', [UserController::class, 'resetPassword'])->name('reset-password');
Route::post('change-password', [UserController::class, 'changePassword'])->name('change-password');
Route::get('/forgot-password', function () {
    return view('pages.user.forgotpassword');
});
Route::get('/home', function () {
    return view('pages.landing-page');
});
Route::get('/home-two', function () {
    return view('pages.landing-page-two');
});

// send mail box money
Route::any('mailbox-money', [WebsiteController::class, 'MailBoxForm'])->name('send.mailbox');
