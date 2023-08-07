<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\Admin\LanguageMasterController;
use App\Http\Controllers\Admin\SocialMasterController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Consultant\AttachmentController;
use App\Http\Controllers\Consultant\ConsultantController;
use App\Http\Controllers\Consultant\GalleryController;
use App\Http\Controllers\Consultant\LanguageController;
use App\Http\Controllers\Consultant\PackageController;
use App\Http\Controllers\Consultant\CertificateController;
use App\Http\Controllers\Consultant\AchievementController;
use App\Http\Controllers\Consultant\SocialLinkController;
use App\Http\Controllers\Consultant\TimeController;
use App\Http\Controllers\Consultant\VideoController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\VisitorController;
use App\Http\Controllers\Admin\StateController;
use App\Models\Attachment;
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

Route::get('/', function () {
    return view('welcome');
});


/* ---------------------- Visitors Side ----------------------------------- */

Route::get('/', [VisitorController::class, 'index'])->name('visitors.index');
Route::get('/aboutus', [VisitorController::class, 'aboutus'])->name('visitors.aboutus');
Route::get('/membershipplan', [VisitorController::class, 'membershipPlan'])->name('visitors.membershipPlan');
Route::get('/corporateInquery', [VisitorController::class, 'corporateInquery'])->name('visitors.corporateInquery');
Route::get('/contactus', [VisitorController::class, 'contactus'])->name('visitors.contactus');
Route::get('/signup/package', [VisitorController::class, 'signuppackage'])->name('visitors.signuppackage');

// Route::get('fetchState',[RegisterController::class,'fetchState'])->name('fetchState');
Route::post('fetchCity', [RegisterController::class, 'feachCity'])->name('feachCity');
Route::post('city', [UserController::class, 'city'])->name('city');
Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/homepage', [App\Http\Controllers\HomeController::class, 'homePage'])->name('app');



Route::group(['middleware' => ['auth']], function () {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);


    // Route::get('consultantRegister', [ConsultantController::class, 'consultantRegister'])->name('consultantRegister');

    // profile update
    Route::get('profile-update/{id?}', [UserController::class, 'profile'])->name('profile');
    Route::post('update', [UserController::class, 'profileUpdate'])->name('profile.update');

    /*---------------------------Admin Panel ---------------------------------- */

    /* State */
    Route::get('state-index', [StateController::class, 'index'])->name('state.index');
    Route::get('state/{id}/view', [StateController::class, 'view'])->name('state.view');
    Route::get('state-create', [StateController::class, 'create'])->name('state.create');
    Route::post('state-store', [StateController::class, 'store'])->name('state.store');
    Route::get('state-edit/{id?}', [StateController::class, 'edit'])->name('state.edit');
    Route::post('state-update', [StateController::class, 'update'])->name('state.update');
    Route::get('state-delete/{id?}', [StateController::class, 'delete'])->name('state.delete');

    /* City */
    Route::get('city-index', [CityController::class, 'index'])->name('city.index');
    Route::get('city/{id}/view', [CityController::class, 'view'])->name('city.view');
    Route::get('city-create', [CityController::class, 'create'])->name('city.create');
    Route::post('city-store', [CityController::class, 'store'])->name('city.store');
    Route::get('city-edit/{id?}', [CityController::class, 'edit'])->name('city.edit');
    Route::post('city-update', [CityController::class, 'update'])->name('city.update');
    Route::get('city-delete/{id?}', [CityController::class, 'delete'])->name('city.delete');

    /* Category */
    Route::get('category-index', [CategoryController::class, 'index'])->name('category.index');
    Route::get('category/{id}/view', [CategoryController::class, 'view'])->name('category.view');
    Route::get('category-create', [CategoryController::class, 'create'])->name('category.create');
    Route::post('category-store', [CategoryController::class, 'store'])->name('category.store');
    Route::get('category-edit/{id?}', [CategoryController::class, 'edit'])->name('category.edit');
    Route::post('category-update', [CategoryController::class, 'update'])->name('category.update');
    Route::get('category-delete/{id?}', [CategoryController::class, 'delete'])->name('category.delete');


    /*  Language Master   */
    Route::get('languageMaster-index', [LanguageMasterController::class, 'index'])->name('languageMaster.index');
    Route::get('languageMaster/{id}/view', [LanguageMasterController::class, 'view'])->name('languageMaster.view');
    Route::get('languageMaster-create', [LanguageMasterController::class, 'create'])->name('languageMaster.create');
    Route::post('languageMaster-store', [LanguageMasterController::class, 'store'])->name('languageMaster.store');
    Route::get('languageMaster-edit/{id?}', [LanguageMasterController::class, 'edit'])->name('languageMaster.edit');
    Route::post('languageMaster-update', [LanguageMasterController::class, 'update'])->name('languageMaster.update');
    Route::get('languageMaster-delete/{id?}', [LanguageMasterController::class, 'delete'])->name('languageMaster.delete');

    /*  Social Media Master   */
    Route::get('socialMaster-index', [SocialMasterController::class, 'index'])->name('socialMaster.index');
    Route::get('socialMaster/{id}/view', [SocialMasterController::class, 'view'])->name('socialMaster.view');
    Route::get('socialMaster-create', [SocialMasterController::class, 'create'])->name('socialMaster.create');
    Route::post('socialMaster-store', [SocialMasterController::class, 'store'])->name('socialMaster.store');
    Route::get('socialMaster-edit/{id?}', [SocialMasterController::class, 'edit'])->name('socialMaster.edit');
    Route::post('socialMaster-update', [SocialMasterController::class, 'update'])->name('socialMaster.update');
    Route::get('socialMaster-delete/{id?}', [SocialMasterController::class, 'delete'])->name('socialMaster.delete');


    // /* time */
    Route::get('time-index', [TimeController::class, 'index'])->name('time.index');
    Route::get('time/{id}/view', [TimeController::class, 'view'])->name('time.view');
    Route::get('time-create', [TimeController::class, 'create'])->name('time.create');
    Route::post('time-store', [TimeController::class, 'store'])->name('time.store');
    Route::get('time-edit/{id?}', [TimeController::class, 'edit'])->name('time.edit');
    Route::post('time-update', [TimeController::class, 'update'])->name('time.update');
    Route::get('time-delete/{id?}', [TimeController::class, 'delete'])->name('time.delete');



    /* ------------------------Consultant Panele ---------------------------------- */

    // /* Language */
    Route::get('language-index', [LanguageController::class, 'index'])->name('language.index');
    Route::get('language/{id}/view', [LanguageController::class, 'view'])->name('language.view');
    Route::get('language-create', [LanguageController::class, 'create'])->name('language.create');
    Route::post('language-store', [LanguageController::class, 'store'])->name('language.store');
    Route::get('language-edit/{id?}', [LanguageController::class, 'edit'])->name('language.edit');
    Route::post('language-update', [LanguageController::class, 'update'])->name('language.update');
    Route::get('language-delete/{id?}', [LanguageController::class, 'delete'])->name('language.delete');

    // /* Gallery */
    Route::get('gallery-index', [GalleryController::class, 'index'])->name('gallery.index');
    Route::get('gallery/{id}/view', [GalleryController::class, 'view'])->name('gallery.view');
    Route::get('gallery-create', [GalleryController::class, 'create'])->name('gallery.create');
    Route::post('gallery-store', [GalleryController::class, 'store'])->name('gallery.store');
    Route::get('gallery-edit/{id?}', [GalleryController::class, 'edit'])->name('gallery.edit');
    Route::post('gallery-update', [GalleryController::class, 'update'])->name('gallery.update');
    Route::get('gallery-delete/{id?}', [GalleryController::class, 'delete'])->name('gallery.delete');

    // /* Vedio */
    Route::get('video-index', [VideoController::class, 'index'])->name('video.index');
    Route::get('video/{id}/view', [VideoController::class, 'view'])->name('video.view');
    Route::get('video-create', [VideoController::class, 'create'])->name('video.create');
    Route::post('video-store', [VideoController::class, 'store'])->name('video.store');
    Route::get('video-edit/{id?}', [VideoController::class, 'edit'])->name('video.edit');
    Route::post('video-update', [VideoController::class, 'update'])->name('video.update');
    Route::get('video-delete/{id?}', [VideoController::class, 'delete'])->name('video.delete');

    // /* Attachments */ 
    Route::get('attachment-index', [AttachmentController::class, 'index'])->name('attachment.index');
    Route::get('attachment/{id}/view', [AttachmentController::class, 'view'])->name('attachment.view');
    Route::get('attachment-create', [AttachmentController::class, 'create'])->name('attachment.create');
    Route::post('attachment-store', [AttachmentController::class, 'store'])->name('attachment.store');
    Route::get('attachment-edit/{id?}', [AttachmentController::class, 'edit'])->name('attachment.edit');
    Route::post('attachment-update', [AttachmentController::class, 'update'])->name('attachment.update');
    Route::get('attachment-delete/{id?}', [AttachmentController::class, 'delete'])->name('attachment.delete');

    /* Social Link */
    Route::get('socialLink-index', [SocialLinkController::class, 'index'])->name('socialLink.index');
    Route::get('socialLink/{id}/view', [SocialLinkController::class, 'view'])->name('socialLink.view');
    Route::get('socialLink-create', [SocialLinkController::class, 'create'])->name('socialLink.create');
    Route::post('socialLink-store', [SocialLinkController::class, 'store'])->name('socialLink.store');
    Route::get('socialLink-edit/{id?}', [SocialLinkController::class, 'edit'])->name('socialLink.edit');
    Route::post('socialLink-update', [SocialLinkController::class, 'update'])->name('socialLink.update');
    Route::get('socialLink-delete/{id?}', [SocialLinkController::class, 'delete'])->name('socialLink.delete');

    /* Package  */
    Route::get('package-index', [PackageController::class, 'index'])->name('package.index');
    Route::get('package/{id}/view', [PackageController::class, 'view'])->name('package.view');
    Route::get('package-create', [PackageController::class, 'create'])->name('package.create');
    Route::post('package-store', [PackageController::class, 'store'])->name('package.store');
    Route::get('package-edit/{id?}', [PackageController::class, 'edit'])->name('package.edit');
    Route::post('package-update', [PackageController::class, 'update'])->name('package.update');
    Route::get('package-delete/{id?}', [PackageController::class, 'delete'])->name('package.delete');

    /* Certificate  */
    Route::get('certificate-index', [CertificateController::class, 'index'])->name('certificate.index');
    Route::get('certificate/{id}/view', [CertificateController::class, 'view'])->name('certificate.view');
    Route::get('certificate-create', [CertificateController::class, 'create'])->name('certificate.create');
    Route::post('certificate-store', [CertificateController::class, 'store'])->name('certificate.store');
    Route::get('certificate-edit/{id?}', [CertificateController::class, 'edit'])->name('certificate.edit');
    Route::post('certificate-update', [CertificateController::class, 'update'])->name('certificate.update');
    Route::get('certificate-delete/{id?}', [CertificateController::class, 'delete'])->name('certificate.delete');

    /* achievement  */
    Route::get('achievement-index', [AchievementController::class, 'index'])->name('achievement.index');
    Route::get('achievement/{id}/view', [AchievementController::class, 'view'])->name('achievement.view');
    Route::get('achievement-create', [AchievementController::class, 'create'])->name('achievement.create');
    Route::post('achievement-store', [AchievementController::class, 'store'])->name('achievement.store');
    Route::get('achievement-edit/{id?}', [AchievementController::class, 'edit'])->name('achievement.edit');
    Route::post('achievement-update', [AchievementController::class, 'update'])->name('achievement.update');
    Route::get('achievement-delete/{id?}', [AchievementController::class, 'delete'])->name('achievement.delete');
});
