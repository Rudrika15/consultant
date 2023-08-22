<?php

use App\Http\Controllers\Api\Admin\CategoryController;
use App\Http\Controllers\Api\Admin\CityController;
use App\Http\Controllers\Api\Admin\InquiryController;
use App\Http\Controllers\Api\Admin\LanguageMasterController;
use App\Http\Controllers\Api\Admin\RegisterController;
use App\Http\Controllers\Api\Admin\SocialMasterController;
use App\Http\Controllers\Api\Admin\StateController;
use App\Http\Controllers\Api\Consultant\AchievementController;
use App\Http\Controllers\Api\Consultant\AttachmentController;
use App\Http\Controllers\Api\Consultant\CertificateController;
use App\Http\Controllers\Api\Consultant\GalleryController;
use App\Http\Controllers\Api\Consultant\LanguageController;
use App\Http\Controllers\Api\Consultant\PackageController;
use App\Http\Controllers\Api\Consultant\SocialLinkController;
use App\Http\Controllers\Api\Consultant\TimeController;
use App\Http\Controllers\Api\Consultant\VideoController;
use App\Http\Controllers\Api\OTPController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Contracts\Role;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/send-otp', [OTPController::class, 'sendOTP']);

/* ---------------------------------- Admin Side ----------------------------------  */
// login/register
Route::post('/register', [RegisterController::class, 'register']);
Route::post('/login', [RegisterController::class, 'login']);

// State 
Route::get('state-index', [StateController::class, 'index']);
Route::post('state-store', [StateController::class, 'store']);
Route::post('state-update/{id?}', [StateController::class, 'update']);
Route::get('state-delete/{id?}', [StateController::class, 'delete']);
Route::get('state-show/{id?}', [StateController::class, 'show']);

// City 
Route::get('city-index', [CityController::class, 'index']);
Route::post('city-store', [CityController::class, 'store']);
Route::post('city-update/{id?}', [CityController::class, 'update']);
Route::get('city-delete/{id?}', [CityController::class, 'delete']);
Route::get('city-show/{id?}', [CityController::class, 'show']);

// Category 
Route::get('category-index', [CategoryController::class, 'index']);
Route::post('category-store', [CategoryController::class, 'store']);
Route::post('category-update/{id?}', [CategoryController::class, 'update']);
Route::get('category-delete/{id?}', [CategoryController::class, 'delete']);
Route::get('category-show/{id?}', [CategoryController::class, 'show']);

// Language Master 
Route::get('languageMaster-index', [LanguageMasterController::class, 'index']);
Route::post('languageMaster-store', [LanguageMasterController::class, 'store']);
Route::post('languageMaster-update/{id?}', [LanguageMasterController::class, 'update']);
Route::get('languageMaster-delete/{id?}', [LanguageMasterController::class, 'delete']);
Route::get('languageMaster-show/{id?}', [LanguageMasterController::class, 'show']);

// Language Master 
Route::get('socialMaster-index', [SocialMasterController::class, 'index']);
Route::post('socialMaster-store', [SocialMasterController::class, 'store']);
Route::post('socialMaster-update/{id?}', [SocialMasterController::class, 'update']);
Route::get('socialMaster-delete/{id?}', [SocialMasterController::class, 'delete']);
Route::get('socialMaster-show/{id?}', [SocialMasterController::class, 'show']);

/* Inquiry */
Route::get('corporate-inquiry-index',[InquiryController::class,'index']);

/* profile */
Route::get('consultant-profile/{id?}', [RegisterController::class, 'consultantProfile']);
Route::post('consultant-update/{id?}', [RegisterController::class, 'update']);




/*-----------------------------------  Consultant Side  ----------------------------------------*/



/* Achievement Api */
Route::get('achievement/index/{id?}', [AchievementController::class, 'index']);
Route::post('achievement/store', [AchievementController::class, 'store']);
Route::post('achievement/update/{id?}', [AchievementController::class, 'update']);
Route::get('achievement/delete/{id?}', [AchievementController::class, 'delete']);
Route::get('achievement/show/{id?}', [AchievementController::class, 'show']);

/*  Attachment  */
Route::get('attachment/index/{id?}', [AttachmentController::class, 'index']);
Route::post('attachment/store', [AttachmentController::class, 'store']);
Route::post('attachment/update/{id?}', [AttachmentController::class, 'update']);
Route::get('attachment/delete/{id?}', [AttachmentController::class, 'delete']);
Route::get('attachment/show/{id?}', [AttachmentController::class, 'show']);

/*  Certificate  */
Route::get('certificate/index/{id?}', [CertificateController::class, 'index']);
Route::post('certificate/store', [CertificateController::class, 'store']);
Route::post('certificate/update/{id?}', [CertificateController::class, 'update']);
Route::get('certificate/delete/{id?}', [CertificateController::class, 'delete']);
Route::get('certificate/show/{id?}', [CertificateController::class, 'show']);

/*  Gallery  */
Route::get('gallery/index/{id?}', [GalleryController::class, 'index']);
Route::post('gallery/store', [GalleryController::class, 'store']);
Route::post('gallery/update/{id?}', [GalleryController::class, 'update']);
Route::get('gallery/delete/{id?}', [GalleryController::class, 'delete']);
Route::get('gallery/show/{id?}', [GalleryController::class, 'show']);

/*  Language  */
Route::get('language/index/{id?}', [LanguageController::class, 'index']);
Route::post('language/store', [LanguageController::class, 'store']);
Route::post('language/update/{id?}', [LanguageController::class, 'update']);
Route::get('language/delete/{id?}', [LanguageController::class, 'delete']);
Route::get('language/show/{id?}', [LanguageController::class, 'show']);
Route::get('getLanguageList', [LanguageController::class, 'getLanguageList']);



/*  Package  */
Route::get('package/index/{id?}', [PackageController::class, 'index']);
Route::post('package/store', [PackageController::class, 'store']);
Route::post('package/update/{id?}', [PackageController::class, 'update']);
Route::get('package/delete/{id?}', [PackageController::class, 'delete']);
Route::get('package/show/{id?}', [PackageController::class, 'show']);

/*  SocialLink  */
Route::get('socialLink/index/{id?}', [SocialLinkController::class, 'index']);
Route::post('socialLink/store', [SocialLinkController::class, 'store']);
Route::post('socialLink/update/{id?}', [SocialLinkController::class, 'update']);
Route::get('socialLink/delete/{id?}', [SocialLinkController::class, 'delete']);
Route::get('socialLink/show/{id?}', [SocialLinkController::class, 'show']);
Route::get('socialLink/getSocialLinkList', [SocialLinkController::class, 'getSocialLinkList']);

/*  Time  */
Route::get('time/index/{id?}', [TimeController::class, 'index']);
Route::post('time/store', [TimeController::class, 'store']);
Route::post('time/update/{id?}', [TimeController::class, 'update']);
Route::get('time/delete/{id?}', [TimeController::class, 'delete']);
Route::get('time/show/{id?}', [TimeController::class, 'show']);

/*  Video  */
Route::get('video/index/{id?}', [VideoController::class, 'index']);
Route::post('video/store', [VideoController::class, 'store']);
Route::post('video/update/{id?}', [VideoController::class, 'update']);
Route::get('video/delete/{id?}', [VideoController::class, 'delete']);
Route::get('video/show/{id?}', [VideoController::class, 'show']);
