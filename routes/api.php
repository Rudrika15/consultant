<?php

use App\Http\Controllers\Api\Admin\CategoryController;
use App\Http\Controllers\Api\Admin\CityController;
use App\Http\Controllers\Api\Admin\LanguageMasterController;
use App\Http\Controllers\Api\Admin\RegisterController;
use App\Http\Controllers\Api\Admin\SocialMasterController;
use App\Http\Controllers\Api\Admin\StateController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

/* profile */
Route::get('consultant-profile/{id?}', [RegisterController::class, 'consultantProfile']);
Route::post('consultant-update/{id?}', [RegisterController::class, 'update']);
