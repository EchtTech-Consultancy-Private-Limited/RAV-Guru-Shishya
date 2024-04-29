<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\AddUserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AddMenuController;
use App\Http\Controllers\AddPermissionController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\DrugController;
use App\Http\Controllers\DropdownController;
use App\Http\Controllers\Roles\ModelController;
use App\Http\Controllers\Roles\RouteController;
use App\Http\Controllers\PostController;

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
Route::get('/optimize-clear', function() {
    $exitCode = Artisan::call('optimize:clear');
    return 'Optimized successfully';
});
Route::get('/key-generate', function() {
    $exitCode = Artisan::call('key:generate');
    return 'Key generated successfully';
});

Route::get('/vendor-publish', function() {
    $exitCode = Artisan::call('vendor:publish');
    return 'Vendor published successfully';
});

Route::get('/migrate', function() {
    $exitCode = Artisan::call('migrate');
    return 'Migration run successfully';
});

Route::get('/seeder', function() {
    $exitCode = Artisan::call('db:seed --class=PermissionDataSeeder');
    return 'Seeder run successfully';
});


Route::get('/validate', function () {
    return view('validate');
});

Route::get('/user-login', function () {
    return view('user-register');
});

Route::get('/multi-stepform', function () {
    return view('multi-step');
});


// Route::get('/', function () {
//     //return view('auth.login');
//     return view('auth.newlogin');
// })->middleware('guest')->name('newLogin');

Route::get('/no-access', function () {
    return view('permission.notaccess');
});

Auth::routes();

Route::get('/', '\App\Http\Controllers\Auth\LoginController@welcomePage')->middleware('guest')->name('/');
Route::get('/login-page', '\App\Http\Controllers\Auth\LoginController@index')->middleware('guest')->name('newLogin');
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::group(['middleware' => ['auth','prevent-back-history','EnsureTokenIsValid']], function() {
    // Route::middleware(['CustomAuth'])->group(function () {        
        Route::middleware('throttle:4,1')->group(function () {            
            Route::post('/user-update', '\App\Http\Controllers\UserController@update')->name('user-update');
            Route::post('new-patient-registration', [PatientController::class, 'new_patient_registration'])->name('new-patient-registration');
            Route::post('follow-up-patients', [PatientController::class, 'follow_up_patients'])->name('follow-up-patients');
            Route::post('add-follow-up-sheet', [PatientController::class, 'save_follow_up_sheet'])->name('add-follow-up-sheet');
            Route::post('send-follow-up-sheet', [PatientController::class, 'send_follow_up_sheet'])->name('send-follow-up-sheet');
            Route::post('find-phr-registration', [PatientController::class, 'find_phr_registration'])->name('find-phr-registration');
            Route::post('save-follow-up-remark', [PatientController::class, 'save_follow_up_remark'])->name('save-follow-up-remark');
            Route::post('add-permissions', [AddPermissionController::class, 'add_permissions'])->name('add-permissions');
            Route::post('manage_profile_form', [AddUserController::class, 'manage_profile_form'])->name('manage_profile_form');
            Route::post('register/patients', [PatientController::class, 'register_patients'])->name('register.patients');
            Route::post('update/patients', [PatientController::class, 'update_patients'])->name('update.patients');
            Route::post('send-php-to-guru', [PatientController::class, 'send_phr_to_guru'])->name('send-php-to-guru');
            Route::post('guru-remarks', [PatientController::class, 'guru_remarks'])->name('guru-remarks');
            Route::post('attendance-list', [AttendanceController::class, 'index'])->name('attendance-list');
            Route::post('add-attendance', [AttendanceController::class, 'update_attendance'])->name('add-attendance');
            Route::post('admin/update/patients', [PatientController::class, 'admin_update_patients'])->name('admin.update.patients');
            Route::post('delete-patient-remark', [PatientController::class, 'delete_patient_remark'])->name('delete-patient-remark');
            Route::post('add-new-model', [ModelController::class, 'create'])->name('add-new-model');
            Route::post('update-model/{id}', [ModelController::class, 'update_model'])->name('update-model');
            Route::post('add-new-routes', [RouteController::class, 'create'])->name('add-new-routes');
            Route::post('update-routes/{id}', [RouteController::class, 'update_route'])->name('update-routes');
            Route::post('add-model-routes', [ModelController::class, 'add_model_routes'])->name('add-model-routes');
            Route::post('update-model-routes/{id}', [ModelController::class, 'update_model_routes'])->name('update-model-routes');            
            Route::post('add-drug-details', [DrugController::class, 'add_drug_details'])->name('add-drug-details');
            Route::post('update-drug-details', [DrugController::class, 'update_drug_details'])->name('update-drug-details');
            Route::post('add-rasayoga-details', [DrugController::class, 'add_rasayoga_details'])->name('add-rasayoga-details');
            Route::post('update-rasayoga-details', [DrugController::class, 'update_rasayoga_details'])->name('update-rasayoga-details');
            Route::post('vati-yoga-details', [DrugController::class, 'vati_yoga_details'])->name('vati-yoga-details');
            Route::post('update-vatiyoga-details', [DrugController::class, 'update_vatiyoga_details'])->name('update-vatiyoga-details');
            Route::post('talia-yogas-details', [DrugController::class, 'talia_yoga_details'])->name('talia-yogas-details');
            Route::post('update-taliayoga-details', [DrugController::class, 'update_taliayoga_details'])->name('update-taliayoga-details');
            Route::post('add-arishtayoga-details', [DrugController::class, 'arishta_yoga_details'])->name('add-arishtayoga-details');
            Route::post('update-arishtayogas-details', [DrugController::class, 'update_arishta_details'])->name('update-arishtayogas-details');
            Route::post('system-configration', [DashboardController::class, 'save_system_configration'])->name('system-configrations');
        });
    Route::post('add-user-permissions', [ModelController::class, 'add_user_permissions'])->name('add-user-permissions');
    Route::post('user-multiple-permissions', [ModelController::class, 'user_multiple_permissions'])->name('user-multiple-permissions');

    Route::resource('users', UserController::class);
    Route::get('delete-user/{id}', [UserController::class, 'user_delete'])->name('delete-user');
    Route::get('add-attendance', [AttendanceController::class, 'add_attendance'])->name('add-attendance');
    Route::get('patients/admin-edit-patient/{id}', [PatientController::class, 'admin_edit_patient'])->name('patients-admin-edit-patient');
    Route::get('admin-view-patient/{id}', [PatientController::class, 'admin_view_patient'])->name('admin-view-patient');
    Route::get('add-follow-up-sheet/{patientid}', [PatientController::class, 'add_follow_up_sheet'])->name('add-follow-up-sheet');
    Route::get('add-follow-up-sheet/{patientid}/{id}', [PatientController::class, 'add_follow_up_sheet'])->name('add-follow-up-sheet');    
    Route::get('follow-up-sheet/{patientid}', [PatientController::class, 'follow_up_sheet'])->name('follow-up-sheet');
    Route::get('follow-up-sheet/{patientid}/{fdate}/{tdate}/{rtype}', [PatientController::class, 'follow_up_sheet'])->name('follow-up-sheet');
    Route::get('delete-follow-up/{id}', [PatientController::class, 'delete_follow_up_sheet'])->name('delete-follow-up');
    Route::get('view-follow-up-sheet/{id}', [PatientController::class, 'view_follow_up_sheet'])->name('view-follow-up-sheet');
    Route::get('follow-up-remark-history/{id}', [PatientController::class, 'viewFollowUpRemarKHistory'])->name('follow-up-remark-history');
    Route::get('admin-remark-history/{phr_id}', [PatientController::class, 'admin_remark_history'])->name('admin-remark-history');
    /*churna yoga Drug Details*/
    Route::get('filter-drug-report', [DrugController::class, 'filter_drug_report'])->name('filter-drug-report');
    Route::get('edit-drugs/{id}', [DrugController::class, 'edit_drugs'])->name('edit-drugs');
    Route::get('view-drugs/{id}', [DrugController::class, 'viewDrugs'])->name('view-drugs');
    Route::get('delete-churan-yoga-part/{id}', [DrugController::class, 'delete_churan_yoga_part'])->name('delete-churan-yoga-part');

    /*churna yoga Drug Details Admin*/
    Route::get('admin-edit-drugs/{id}', [DrugController::class, 'admin_edit_drugs'])->name('admin-edit-drugs');
    Route::get('delete-churnayogas/{id}', [DrugController::class, 'delete_churan_yoga'])->name('delete-churnayogas');
    Route::get('delete-rasayogas/{id}', [DrugController::class, 'delete_rasa_yoga'])->name('delete-rasayogas');
    Route::get('delete-vatiyogas/{id}', [DrugController::class, 'delete_vati_yoga'])->name('delete-vatiyogas');
    Route::get('delete-taliayogas/{id}', [DrugController::class, 'delete_talia_yoga'])->name('delete-taliayogas');
    Route::get('delete-arishtayogas/{id}', [DrugController::class, 'delete_arishta_yoga'])->name('delete-arishtayogas');

    /*rasa yoga Drug Details*/
    Route::get('edit-rasa-drugs/{id}', [DrugController::class, 'edit_rasa_drugs'])->name('edit-rasa-drugs');
    Route::get('view-rasa-drugs/{id}', [DrugController::class, 'view_rasa_drugs'])->name('view-rasa-drugs');
    Route::get('delete-rasayoga-part/{id}', [DrugController::class, 'delete_rasayoga_part'])->name('delete-rasayoga-part');
    /*vati yoga Drug Details*/
    Route::get('edit-vati-drugs/{id}', [DrugController::class, 'edit_vati_drugs'])->name('edit-vati-drugs');
    Route::get('view-vati-drugs/{id}', [DrugController::class, 'view_vati_drugs'])->name('view-vati-drugs');
    Route::get('delete-vatiyoga-type/{id}', [DrugController::class, 'delete_vatiyoga_type'])->name('delete-vatiyoga-type');

    /*talia yoga Drug Details*/
    Route::get('edit-talia-drugs/{id}', [DrugController::class, 'edit_talia_drugs'])->name('edit-talia-drugs');
    Route::get('view-talia-drugs/{id}', [DrugController::class, 'view_talia_drugs'])->name('view-talia-drugs');
    Route::get('delete-taliyayoga-type/{id}', [DrugController::class, 'delete_taliyayoga_type'])->name('delete-taliyayoga-type');

    /*arishtayoga yoga Drug Details*/
    Route::get('edit-arishta-drugs/{id}', [DrugController::class, 'edit_arishta_drugs'])->name('edit-arishta-drugs');
    Route::get('view-arishta-drugs/{id}', [DrugController::class, 'view_arishta_drugs'])->name('view-arishta-drugs');
    Route::get('delete-arishtayoga-type/{id}', [DrugController::class, 'delete_arishta_type'])->name('delete-arishtayoga-type');
    Route::get('guru-view-patient/{id}', [PatientController::class, 'guru_view_patient'])->name('guru-view-patient');
    Route::get('edit-patient/{id}', [PatientController::class, 'edit_patient'])->name('edit-patient');
    Route::get('guru-remark-history/{phr_id}', [PatientController::class, 'guru_remark_history'])->name('guru-remark-history');
    Route::get('remarks-from-guru/{id}', [PatientController::class, 'remarks_from_guru'])->name('remarks-from-guru');
    Route::get('assign-role/{id}', [ModelController::class, 'assign_role'])->name('assign-role');
    Route::get('system-configration', [DashboardController::class, 'system_configration'])->name('system-configration');
    Route::get('add-history-sheet', [PatientController::class, 'add_history_sheet'])->name('add-history-sheet');
    Route::get('view-patient/{id}', [PatientController::class, 'view_patient'])->name('view-patient');
    Route::get('remark-history/{phr_id}', [PatientController::class, 'remark_history'])->name('remark-history');
    Route::get('delete-phr/{id}', [PatientController::class, 'delete_phr'])->name('delete-phr');
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('profile', [AddUserController::class, 'manage_profile'])->name('profile');
    Route::get('export-attendance', [AttendanceController::class, 'export_attendance'])->name('export-attendance');
    Route::get('view-attendance', [AttendanceController::class, 'viewAttendance'])->name('view-attendance');
});

Route::group(['middleware' => ['auth','prevent-back-history','EnsureTokenIsValid','ModulePermission']], function() {
    Route::get('users', [UserController::class, 'index'])->name('users');
    Route::get('add-user', [AddUserController::class, 'add_user'])->name('add-user');
    Route::get('alluser', [AddUserController::class, 'show_user'])->name('alluser');    
    
    Route::get('add-drug-report', [DrugController::class, 'add_drug_report'])->name('add-drug-report');
    Route::get('drug-report-history', [DrugController::class, 'drug_report_history'])->name('drug-report-history');
    Route::get('new-patient-registration/{id?}', [PatientController::class, 'new_patient_registration'])->name('new-patient-registration');
    Route::get('shishya-notifications', [PatientController::class, 'new_patient_registration'])->name('shishya-notifications');
    Route::get('follow-up-patients', [PatientController::class, 'follow_up_patients'])->name('follow-up-patients');
    Route::get('active-users/{id}', [AddUserController::class, 'active_user'])->name('active-users');
    Route::get('unauthorized', [AddUserController::class, 'unauthorized'])->name('unauthorized');

    Route::get('shishya-list', [AddUserController::class, 'shishya_list'])->name('shishya-list');
    Route::get('rav-admin', [AddUserController::class, 'rav_admin'])->name('rav-admin');
    Route::get('add-user/{$type}', [AddUserController::class, 'add_user'])->name('add-user');

    /*Shishya List*/   
    Route::get('generate-Pdft/{id}', [PatientController::class, 'generatePdf'])->name('generatePdf');    
    Route::get('send-patient-toguru/{id}/{guru_id}', [PatientController::class, 'send_patient_to_guru'])->name('send-patient-toguru');    

    /*Guru Url*/
    Route::get('guru-patient-list', [PatientController::class, 'guru_patient_list'])->name('guru-patient-list');
    Route::get('notifications', [PatientController::class, 'guru_patient_list'])->name('notifications');
    Route::get('notify-guru-patient-list', [PatientController::class, 'notify_guru_patient_list'])->name('notify-guru-patient-list');   
    Route::get('guru-generate-Pdft/{id}', [PatientController::class, 'generateGuruPdf'])->name('generateGuruPdf');     
    Route::get('attendance-list', [AttendanceController::class, 'index'])->name('attendance-list');    
    /*Admin Url*/
    Route::get('admin-patient-list', [PatientController::class, 'admin_patient_list'])->name('admin-patient-list');
    // Route::get('admin-generate-Pdft/{id}', [PatientController::class, 'generateAdminPdf'])->name('generateAdminPdf');
    Route::get('phr-history-sheet', [PatientController::class, 'guru_phr_history_sheet'])->name('phr-history-sheet');
    Route::get('admin-drug-report-history', [DrugController::class, 'admin_drug_report_history'])->name('admin-drug-report-history');
    Route::get('admin-filter-drug-report', [DrugController::class, 'admin_filter_drug_report'])->name('admin-filter-drug-report');    

    Route::get('patients/In-Patient', [PatientController::class, 'in_patients'])->name('patients/In-Patient');
    Route::get('patients/OPD-Patient', [PatientController::class, 'opd_patients'])->name('patients/OPD-Patient');

    /*Admin Url Roles and Permissions Routes*/
    Route::get('admin-models', [ModelController::class, 'index'])->name('admin-models');
    Route::get('edit-model/{id}', [ModelController::class, 'edit_model'])->name('edit-model');
    Route::get('model-dlt/{id}', [ModelController::class, 'delete_model'])->name('model-dlt');

    Route::get('admin-routes', [RouteController::class, 'index'])->name('admin-routes');
    Route::get('edit-routes/{id}', [RouteController::class, 'edit_route'])->name('edit-routes');
    Route::get('routes-dlt/{id}', [RouteController::class, 'delete_route'])->name('routes-dlt');

    Route::get('model-routes', [ModelController::class, 'model_routes'])->name('model-routes');
    Route::get('edit-model-routes/{id}', [ModelController::class, 'edit_model_routes'])->name('edit-model-routes');
    Route::get('model-routes-dlt/{id}', [ModelController::class, 'delete_model_route'])->name('model-routes-dlt');    
});

Route::get('education/edit-company', [AddUserController::class, 'edit_manage_profile_education'])->name('education-edit-company');
Route::post('education-delete', [AddUserController::class, 'education_delete'])->name('education-delete');
Route::get('language-delete/{lang_id}', [AddUserController::class, 'language_delete'])->name('language-delete');
Route::post('manage_profile_form_step2', [AddUserController::class, 'manageProfileStep2'])->name('manage_profile_form_step2');
Route::post('manage_profile_form_step3', [AddUserController::class, 'manage_profile_form_step3'])->name('manage_profile_form_step3');
Route::post('manage_profile_form_step4', [AddUserController::class, 'manage_profile_form_step4'])->name('manage_profile_form_step4');
Route::get('publication/edit-publication', [AddUserController::class, 'edit_manage_profile_publication'])->name('publication-edit-publication');
Route::post('publication-delete', [AddUserController::class, 'publication_delete'])->name('publication-delete');
Route::post('manage_profile_form_step5', [AddUserController::class, 'manage_profile_form_step5'])->name('manage_profile_form_step5');


Route::get('postCreate',[PostController::class,'postCreate'])->name('postCreate');
Route::post('postData',[PostController::class,'postData'])->name('postData');

Route::post('user-login', [LoginController::class, 'login'])->middleware('throttle:4,1');
Route::get('user-signup', [AddUserController::class, 'user_sign_up'])->name('user-signup');
Route::post('sign-up', [AddUserController::class, 'sign_up'])->middleware('throttle:4,1');

/*country state city dropdown*/
Route::get('dropdown', [DropdownController::class, 'index'])->name('dropdown');
Route::post('api/fetch-states', [DropdownController::class, 'fetchState'])->name('fetch-states');
Route::post('api/fetch-cities', [DropdownController::class, 'fetchCity'])->name('fetch-cities');
Route::get('/country-list', [UserController::class, 'country_list'])->name('country-list');
        
/*end country state city dropdown*/

Route::get('add-menu', [AddMenuController::class, 'add_menu'])->name('add-menu');
Route::post('add-new-menu', [AddMenuController::class, 'add_new_menu'])->name('add-new-menu');
Route::get('edit-menu/{id}', [AddMenuController::class, 'edit_menu'])->name('edit-menu');
Route::post('update-menu/{id}', [AddMenuController::class, 'update_menu'])->name('update-menu');
Route::get('menu-dlt/{id}', [AddMenuController::class, 'delete_menu'])->name('menu-dlt');
Route::resource('patients', PatientController::class);

Route::get('my-captcha',[LoginController::class,'myCaptcha'])->name('myCaptcha');
Route::post('my-captcha',[LoginController::class,'myCaptchaPost'])->name('myCaptcha.post');
Route::get('refresh_captcha',[LoginController::class,'refreshCaptcha'])->name('refresh_captcha');

//Routes for mails
Route::get('/send-email', [EmailController::class, 'index'])->name('send-email');
