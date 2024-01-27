<?php

use App\Models\Attachment;
use League\Flysystem\Visibility;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VisitorController;
use App\Http\Controllers\RazorpayController;
use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\StateController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\InquiryController;
use App\Http\Controllers\Admin\PincodeController;
// use App\Http\Controllers\Consultant\ConsultantController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\AdminLeadController;
use App\Http\Controllers\Admin\ContactusController;
use App\Http\Controllers\Consultant\LeadController;
use App\Http\Controllers\Consultant\TimeController;
use App\Http\Controllers\RazorpayPaymentController;
use App\Http\Controllers\Admin\ConsultantController;
use App\Http\Controllers\Consultant\VideoController;
use App\Http\Controllers\Admin\AdminPackageController;
use App\Http\Controllers\Admin\SocialMasterController;
use App\Http\Controllers\Consultant\GalleryController;
use App\Http\Controllers\Consultant\PackageController;
use App\Http\Controllers\Admin\AdminWorkshopController;
use App\Http\Controllers\Admin\PrivacyPolicyController;
use App\Http\Controllers\Consultant\LanguageController;
use App\Http\Controllers\Consultant\WorkshopController;
use App\Http\Controllers\Admin\LanguageMasterController;
use App\Http\Controllers\Admin\TermsConditionController;
use App\Http\Controllers\Consultant\AttachmentController;
use App\Http\Controllers\Consultant\SocialLinkController;
use App\Http\Controllers\Consultant\AchievementController;
use App\Http\Controllers\Consultant\CertificateController;
use App\Http\Controllers\Consultant\UpgradePlanController;
use App\Http\Controllers\Admin\ConsultantInquiryController;
use App\Http\Controllers\Auth\ConsultantRegisterController;
use App\Http\Controllers\Consultant\ConsultantEnquiryController;

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
Route::get('/search', [VisitorController::class, 'search'])->name('visitors.search');
Route::get('/aboutus', [VisitorController::class, 'aboutus'])->name('visitors.aboutus');
Route::get('/policy', [VisitorController::class, 'policy'])->name('visitors.policy');
Route::get('/terms', [VisitorController::class, 'terms'])->name('visitors.terms');
Route::get('/membershipplan', [VisitorController::class, 'membershipPlan'])->name('visitors.membershipPlan');
//corporate inquiry
Route::get('/corporateInquery', [VisitorController::class, 'corporateInquery'])->name('visitors.corporateInquery');
Route::post('corporateInquery-inqueryStore', [VisitorController::class, 'inqueryStore'])->name('corporateInquery.inqueryStore');
//consultant inquiry
Route::get('/consultantInquiry', [VisitorController::class, 'consultantInquiry'])->name('visitors.consultantInquiry');
Route::post('consultantInquiry-consultantInquiryStore', [VisitorController::class, 'consultantInquiryStore'])->name('consultantInquiry.consultantInquiryStore');

Route::post('/free-trial', [VisitorController::class, 'freeTrial'])->name('free.trial');
Route::get('/membershipplan', [VisitorController::class, 'membershipPlan'])->name('visitors.membershipPlan');

//otp send in mail
// Route::get('send-mail', [MailController::class, 'index']);

Route::get('/contactus', [VisitorController::class, 'contactus'])->name('visitors.contactus');
Route::post('contactus-store', [VisitorController::class, 'contantus_store'])->name('contactus.store');

Route::get('/signup/package', [VisitorController::class, 'signuppackage'])->name('visitors.signuppackage');
Route::get('/consultantList/{id?}', [VisitorController::class, 'consultantList'])->name('visitors.consultantList');
// Route::match(['get', 'post'], '/findConsultantList', [VisitorController::class, 'findConsultantList'])->name('visitors.findConsultantList');
Route::match(['get', 'post'], '/findConsultantList', [VisitorController::class, 'findConsultantList'])->name('visitors.findConsultantList');

Route::get('/detail', [VisitorController::class, 'detail'])->name('visitors.detail');
Route::get('/review/{id?}', [VisitorController::class, 'review'])->name('visitors.review');


// pericular category detail
Route::get('category-detail/{id?}', [VisitorController::class, 'categoryDetail'])->name('visitors.categoryDetail');
Route::get('consultant-detail/{id?}', [VisitorController::class, 'consultantDetail'])->name('visitors.consultantDetail');



Route::get('/searchCity', [VisitorController::class, 'searchCity'])->name('visitors.searchCity');

Route::get('/visitorsRegister', [VisitorController::class, 'visitorsRegister'])->name('visitors.visitorsRegister');
Route::post('/regitrationStore', [VisitorController::class, 'regitrationStore'])->name('visitors.regitrationStore');
Route::get('/nearByConsultantList', [VisitorController::class, 'nearByConsultantList'])->name('visitors.nearByConsultantList');




Route::post('/serachwithdata', [VisitorController::class, 'serachwithdata'])->name('visitors.serachwithdata');

// City for Home page
Route::post('fetchcityhome', [VisitorController::class, 'fetchcityhome'])->name('fetchcityhome');

Route::post('fetchCity', [RegisterController::class, 'fetchCity'])->name('fetchCity');

Route::post('city', [UserController::class, 'city'])->name('city');

Auth::routes();

// consultant register
Route::get('/consultant/register', [RegisterController::class, 'registerConsultant'])->name('registerConsultant');
Route::post('/consultant/register/code', [RegisterController::class, 'registerConsultantCode'])->name('registerConsultantCode');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/homepage', [App\Http\Controllers\HomeController::class, 'homePage'])->name('app');


Route::group(['middleware' => ['auth']], function () {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);

    Route::get('razorpay-payment', [RazorpayPaymentController::class, 'index']);
    Route::post('razorpay-payment', [RazorpayPaymentController::class, 'store'])->name('razorpay.payment.store');


    // Route::get('consultantRegister', [ConsultantRegisterController::class, 'consultantRegister'])->name('consultantRegister');

    // profile update
    Route::get('profile-update/{id?}', [UserController::class, 'profile'])->name('profile');
    Route::post('changepassword', [UserController::class, 'changepassword'])->name('changepassword');
    Route::post('update', [UserController::class, 'profileUpdate'])->name('profile.update');


    //For Visitors Profile

    Route::get('visitor/workshop', [VisitorController::class, 'workshop'])->name('visitor.workshop');
    Route::get('visitor/profile', [VisitorController::class, 'profile'])->name('visitor.profile');
    Route::post('visitor/profile/city', [VisitorController::class, 'cityforprofile'])->name('visitors.cityforprofile');

    Route::get('paymentgetway/{id?}', [VisitorController::class, 'paymentgetway'])->name('paymentgetway');
    Route::post('userplantype', [VisitorController::class, 'userplantype'])->name('userplantype');

    /*---------------------------Admin Panel ---------------------------------- */

    /* Leade List */
    Route::get('lead-index', [AdminLeadController::class, 'index'])->name('admin.lead.index');

    /* approve inquiry */
    Route::post('/consultantInquiry/{id}/approve', [ConsultantInquiryController::class, 'approve'])->name('consultantInquiry.approve');



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

    // /* Admin Package */
    Route::get('adminpackage-index', [AdminPackageController::class, 'index'])->name('adminpackage.index');
    Route::get('adminpackage/{id}/view', [AdminPackageController::class, 'view'])->name('adminpackage.view');

    Route::get('adminpackage-create', [AdminPackageController::class, 'create'])->name('adminpackage.create');
    Route::post('adminpackage-store', [AdminPackageController::class, 'store'])->name('adminpackage.store');
    Route::get('adminpackage-edit/{id?}', [AdminPackageController::class, 'edit'])->name('adminpackage.edit');
    Route::post('adminpackage-update', [AdminPackageController::class, 'update'])->name('adminpackage.update');
    Route::get('adminpackage-delete/{id?}', [AdminPackageController::class, 'delete'])->name('adminpackage.delete');

    /* Slider */
    Route::get('slider-index', [SliderController::class, 'index'])->name('slider.index');
    Route::get('slider-create', [SliderController::class, 'create'])->name('slider.create');
    Route::post('slider-store', [SliderController::class, 'store'])->name('slider.store');
    Route::get('slider-edit/{id?}', [SliderController::class, 'edit'])->name('slider.edit');
    Route::post('slider-update', [SliderController::class, 'update'])->name('slider.update');
    Route::get('slider-delete/{id?}', [SliderController::class, 'delete'])->name('slider.delete');
    Route::get('slider/{id}/view', [SliderController::class, 'view'])->name('slider.view');

    // /* Terms & Condition */
    Route::get('terms-index', [TermsConditionController::class, 'index'])->name('terms.index');
    Route::get('terms-create', [TermsConditionController::class, 'create'])->name('terms.create');
    Route::post('terms-store', [TermsConditionController::class, 'store'])->name('terms.store');
    Route::get('terms-edit/{id?}', [TermsConditionController::class, 'edit'])->name('terms.edit');
    Route::post('terms-update', [TermsConditionController::class, 'update'])->name('terms.update');
    Route::get('terms-delete/{id?}', [TermsConditionController::class, 'delete'])->name('terms.delete');
    Route::get('terms/{id}/view', [TermsConditionController::class, 'view'])->name('terms.view');

    // /* Privacy Policy */
    Route::get('policy-index', [PrivacyPolicyController::class, 'index'])->name('policy.index');
    Route::get('policy-create', [PrivacyPolicyController::class, 'create'])->name('policy.create');
    Route::post('policy-store', [PrivacyPolicyController::class, 'store'])->name('policy.store');
    Route::get('policy-edit/{id?}', [PrivacyPolicyController::class, 'edit'])->name('policy.edit');
    Route::post('policy-update', [PrivacyPolicyController::class, 'update'])->name('policy.update');
    Route::get('policy-delete/{id?}', [PrivacyPolicyController::class, 'delete'])->name('policy.delete');
    Route::get('policy/{id}/view', [PrivacyPolicyController::class, 'view'])->name('policy.view');


    // /* Corporate Inquiry */
    Route::get('corparateInquiry-index', [InquiryController::class, 'index'])->name('corparateInquiry.index');
    Route::get('corporateInquiry/{id}/view', [InquiryController::class, 'view'])->name('corparateInquiry.view');

    // /* Consultant Inquiry */
    Route::get('consultantInquiry-index', [ConsultantInquiryController::class, 'index'])->name('consultantInquiry.inquiry');
    Route::get('consultantInquiry/{id}/view', [ConsultantInquiryController::class, 'view'])->name('consultantInquiry.view');

    /* Workshop */
    Route::get('adminworkshop-index', [AdminWorkshopController::class, 'index'])->name('adminworkshop.index');
    Route::get('adminworkshop/{id}/view', [AdminWorkshopController::class, 'view'])->name('adminworkshop.view');

    /* Contactus List */
    Route::get('contactus-index', [ContactusController::class, 'index'])->name('contactus.index');
    Route::get('contactus/{id}/view', [ContactusController::class, 'view'])->name('contactus.view');


    /* Consultant List  */
    Route::get('consultant-index', [ConsultantController::class, 'index'])->name('consultant.index');
    Route::get('consultant/{id}/view', [ConsultantController::class, 'view'])->name('consultant.view');
    Route::get('consultant-edit/{id?}', [ConsultantController::class, 'edit'])->name('consultant.edit');
    Route::post('consultant-update', [ConsultantController::class, 'update'])->name('consultant.update');
    Route::get('homeconsultant', [HomeController::class, 'countconsultant'])->name('consultant.countconsultant');

    /* About  */

    Route::get('about-index', [AboutController::class, 'index'])->name('about.index');
    Route::get('about/{id}/view', [AboutController::class, 'view'])->name('about.view');

    Route::get('about-create', [AboutController::class, 'create'])->name('about.create');
    Route::post('about-store', [AboutController::class, 'store'])->name('about.store');
    Route::get('about-edit/{id?}', [AboutController::class, 'edit'])->name('about.edit');
    Route::post('about-update', [AboutController::class, 'update'])->name('about.update');
    Route::get('about-delete/{id?}', [AboutController::class, 'delete'])->name('about.delete');

    /* Pincode */

    Route::get('pincode-index', [PincodeController::class, 'index'])->name('pincode.index');
    Route::get('pincode-create', [PincodeController::class, 'create'])->name('pincode.create');
    Route::post('pincode-store', [PincodeController::class, 'store'])->name('pincode.store');
    Route::get('pincode-edit/{id?}', [PincodeController::class, 'edit'])->name('pincode.edit');
    Route::post('pincode-update', [PincodeController::class, 'update'])->name('pincode.update');
    Route::get('pincode-delete/{id?}', [PincodeController::class, 'delete'])->name('pincode.delete');
    Route::get('pincode/{id}/view', [PincodeController::class, 'view'])->name('pincode.view');




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

    /* Workshop */
    Route::get('workshop-index', [WorkshopController::class, 'index'])->name('workshop.index');
    Route::get('workshop/{id}/view', [WorkshopController::class, 'view'])->name('workshop.view');

    Route::get('workshop-create', [WorkshopController::class, 'create'])->name('workshop.create');
    Route::post('workshop-store', [WorkshopController::class, 'store'])->name('workshop.store');
    Route::get('workshop-edit/{id?}', [WorkshopController::class, 'edit'])->name('workshop.edit');
    Route::post('workshop-update', [WorkshopController::class, 'update'])->name('workshop.update');
    Route::get('workshop-delete/{id?}', [WorkshopController::class, 'delete'])->name('workshop.delete');

    /* Upgrade Plan */
    Route::get('upgradeplan-index', [UpgradePlanController::class, 'index'])->name('upgradeplan.index');
    Route::post('consultant-razorpay-payment', [UpgradePlanController::class, 'store'])->name('consultant.razorpay.payment.store');

    /* Lead  */
    Route::get('consultant-lead-index', [LeadController::class, 'index'])->name('consultant.lead.index');

    // Consultant Inquiry
    Route::get('consultant-inquiry-index', [ConsultantEnquiryController::class, 'index'])->name('consultant.consultantinquiry.index');
});
