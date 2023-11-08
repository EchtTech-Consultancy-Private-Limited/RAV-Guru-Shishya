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


Route::get('/', function () {
    //return view('auth.login');
    return view('auth.newlogin');
})->middleware('guest')->name('newLogin');

Route::get('/no-access', function () {
    return view('permission.notaccess');
});

Auth::routes();

Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::group(['middleware' => ['auth','prevent-back-history']], function() {
    // Route::middleware(['CustomAuth'])->group(function () {
        Route::get('dashboard', [DashboardController::class, 'index']);
        //Route::get('shishya', [DashboardController::class, 'shishya']);
        //Route::resource('roles', RoleController::class);
        Route::resource('users', UserController::class);
        //Route::resource('products', ProductController::class);
        Route::get('add-user', [AddUserController::class, 'add_user']);
        Route::get('alluser', [AddUserController::class, 'show_user']);
        Route::post('/user-update', '\App\Http\Controllers\UserController@update');
        Route::get('delete-user/{id}', [UserController::class, 'user_delete']);
        //Route::get('patients-history', [PatientController::class, 'patients_history']);
        //Route::get('manage-history-sheet', [PatientController::class, 'manage_history_sheet']);
        Route::get('new-patient-registration/{id?}', [PatientController::class, 'new_patient_registration']);
        Route::post('new-patient-registration', [PatientController::class, 'new_patient_registration']);
        Route::get('add-history-sheet', [PatientController::class, 'add_history_sheet']);
        Route::get('follow-up-patients', [PatientController::class, 'follow_up_patients']);
        Route::post('follow-up-patients', [PatientController::class, 'follow_up_patients']);
        Route::get('add-follow-up-sheet/{patientid}', [PatientController::class, 'add_follow_up_sheet']);
        Route::get('add-follow-up-sheet/{patientid}/{id}', [PatientController::class, 'add_follow_up_sheet']);
        Route::post('add-follow-up-sheet', [PatientController::class, 'save_follow_up_sheet']);
        Route::get('follow-up-sheet/{patientid}', [PatientController::class, 'follow_up_sheet']);
        Route::get('follow-up-sheet/{patientid}/{fdate}/{tdate}/{rtype}', [PatientController::class, 'follow_up_sheet']);
        Route::post('send-follow-up-sheet', [PatientController::class, 'send_follow_up_sheet']);
        Route::post('find-phr-registration', [PatientController::class, 'find_phr_registration']);
        Route::get('delete-follow-up/{id}', [PatientController::class, 'delete_follow_up_sheet']);
        Route::get('view-follow-up-sheet/{id}', [PatientController::class, 'view_follow_up_sheet']);
        Route::get('follow-up-remark-history/{id}', [PatientController::class, 'viewFollowUpRemarKHistory']);
        Route::post('save-follow-up-remark', [PatientController::class, 'save_follow_up_remark']);


        Route::get('add-drug-report', [DrugController::class, 'add_drug_report']);
        Route::get('drug-report-history', [DrugController::class, 'drug_report_history']);


        Route::post('add-permissions', [AddPermissionController::class, 'add_permissions']);
        Route::get('profile', [AddUserController::class, 'manage_profile']);
        Route::post('manage_profile_form', [AddUserController::class, 'manage_profile_form']);
        Route::get('active-users/{id}', [AddUserController::class, 'active_user']);
        Route::get('unauthorized', [AddUserController::class, 'unauthorized']);

        Route::get('shishya-list', [AddUserController::class, 'shishya_list']);
        Route::get('rav-admin', [AddUserController::class, 'rav_admin']);
        Route::get('add-user/{$type}', [AddUserController::class, 'add_user']);

        /*Shishya List*/
        Route::post('register/patients', [PatientController::class, 'register_patients'])->name('register.patients');
        Route::get('view-patient/{id}', [PatientController::class, 'view_patient']);
        Route::get('generate-Pdft/{id}', [PatientController::class, 'generatePdf'])->name('generatePdf');        
        Route::get('edit-patient/{id}', [PatientController::class, 'edit_patient']);
        Route::post('update/patients', [PatientController::class, 'update_patients'])->name('update.patients');
        Route::get('send-patient-toguru/{id}/{guru_id}', [PatientController::class, 'send_patient_to_guru']);
        Route::get('remark-history/{phr_id}', [PatientController::class, 'remark_history']);
        Route::post('send-php-to-guru', [PatientController::class, 'send_phr_to_guru']);

        /*Guru Url*/
        Route::get('guru-patient-list', [PatientController::class, 'guru_patient_list']);
        Route::get('notify-guru-patient-list', [PatientController::class, 'notify_guru_patient_list']);
        Route::get('guru-view-patient/{id}', [PatientController::class, 'guru_view_patient']);
        Route::get('guru-generate-Pdft/{id}', [PatientController::class, 'generateGuruPdf'])->name('generateGuruPdf'); 
        Route::get('remarks-from-guru/{id}', [PatientController::class, 'remarks_from_guru']);
        Route::post('guru-remarks', [PatientController::class, 'guru_remarks']);
        Route::get('guru-remark-history/{phr_id}', [PatientController::class, 'guru_remark_history']);

        Route::get('attendance-list', [AttendanceController::class, 'index']);
        Route::get('attendance-list/{guru_id}', [AttendanceController::class, 'index']);
        Route::post('attendance-list', [AttendanceController::class, 'index']);
        Route::get('add-attendance', [AttendanceController::class, 'add_attendance']);
        Route::post('add-attendance', [AttendanceController::class, 'update_attendance']);
        Route::get('view-attendance', [AttendanceController::class, 'viewAttendance']);
        Route::get('export-attendance', [AttendanceController::class, 'export_attendance']);



        /*Admin Url*/
        Route::get('admin-patient-list', [PatientController::class, 'admin_patient_list']);
        Route::get('admin-remark-history/{phr_id}', [PatientController::class, 'admin_remark_history']);
        Route::get('patients/admin-edit-patient/{id}', [PatientController::class, 'admin_edit_patient']);
        Route::post('admin/update/patients', [PatientController::class, 'admin_update_patients'])->name('admin.update.patients');
        Route::get('admin-view-patient/{id}', [PatientController::class, 'admin_view_patient']);
        Route::get('admin-generate-Pdft/{id}', [PatientController::class, 'generateAdminPdf'])->name('generateAdminPdf');
        Route::get('phr-history-sheet', [PatientController::class, 'guru_phr_history_sheet']);
        Route::get('admin-drug-report-history', [DrugController::class, 'admin_drug_report_history']);
        Route::get('admin-filter-drug-report', [DrugController::class, 'admin_filter_drug_report']);
        Route::get('delete-phr/{id}', [PatientController::class, 'delete_phr']);
        Route::post('delete-patient-remark', [PatientController::class, 'delete_patient_remark']);

        Route::get('patients/{phr_type}', [PatientController::class, 'in_patients']);

        /*Admin Url Roles and Permissions Routes*/
        Route::get('admin-models', [ModelController::class, 'index']);
        Route::post('add-new-model', [ModelController::class, 'create']);
        Route::get('edit-model/{id}', [ModelController::class, 'edit_model']);
        Route::post('update-model/{id}', [ModelController::class, 'update_model']);
        Route::get('model-dlt/{id}', [ModelController::class, 'delete_model']);

        Route::get('admin-routes', [RouteController::class, 'index']);
        Route::post('add-new-routes', [RouteController::class, 'create']);
        Route::get('edit-routes/{id}', [RouteController::class, 'edit_route']);
        Route::post('update-routes/{id}', [RouteController::class, 'update_route']);
        Route::get('routes-dlt/{id}', [RouteController::class, 'delete_route']);

        Route::get('model-routes', [ModelController::class, 'model_routes']);
        Route::post('add-model-routes', [ModelController::class, 'add_model_routes']);
        Route::get('edit-model-routes/{id}', [ModelController::class, 'edit_model_routes']);
        Route::post('update-model-routes/{id}', [ModelController::class, 'update_model_routes']);
        Route::get('model-routes-dlt/{id}', [ModelController::class, 'delete_model_route']);

        Route::get('assign-role/{id}', [ModelController::class, 'assign_role']);
        Route::post('add-user-permissions', [ModelController::class, 'add_user_permissions']);
        Route::post('user-multiple-permissions', [ModelController::class, 'user_multiple_permissions']);

    /*Drug Details*/

        /*churna yoga Drug Details*/
        Route::post('add-drug-details', [DrugController::class, 'add_drug_details']);
        Route::get('filter-drug-report', [DrugController::class, 'filter_drug_report']);
        Route::get('edit-drugs/{id}', [DrugController::class, 'edit_drugs']);
        Route::get('view-drugs/{id}', [DrugController::class, 'viewDrugs']);
        Route::post('update-drug-details', [DrugController::class, 'update_drug_details']);
        Route::get('delete-churan-yoga-part/{id}', [DrugController::class, 'delete_churan_yoga_part']);

        /*churna yoga Drug Details Admin*/
        Route::get('admin-edit-drugs/{id}', [DrugController::class, 'admin_edit_drugs']);
        Route::get('delete-churnayogas/{id}', [DrugController::class, 'delete_churan_yoga']);
        Route::get('delete-rasayogas/{id}', [DrugController::class, 'delete_rasa_yoga']);
        Route::get('delete-vatiyogas/{id}', [DrugController::class, 'delete_vati_yoga']);
        Route::get('delete-taliayogas/{id}', [DrugController::class, 'delete_talia_yoga']);
        Route::get('delete-arishtayogas/{id}', [DrugController::class, 'delete_arishta_yoga']);

        /*rasa yoga Drug Details*/
        Route::post('add-rasayoga-details', [DrugController::class, 'add_rasayoga_details']);
        Route::get('edit-rasa-drugs/{id}', [DrugController::class, 'edit_rasa_drugs']);
        Route::get('view-rasa-drugs/{id}', [DrugController::class, 'view_rasa_drugs']);
        Route::post('update-rasayoga-details', [DrugController::class, 'update_rasayoga_details']);
        Route::get('delete-rasayoga-part/{id}', [DrugController::class, 'delete_rasayoga_part']);
        /*vati yoga Drug Details*/
        Route::post('vati-yoga-details', [DrugController::class, 'vati_yoga_details']);
        Route::get('edit-vati-drugs/{id}', [DrugController::class, 'edit_vati_drugs']);
        Route::get('view-vati-drugs/{id}', [DrugController::class, 'view_vati_drugs']);
        Route::post('update-vatiyoga-details', [DrugController::class, 'update_vatiyoga_details']);
        Route::get('delete-vatiyoga-type/{id}', [DrugController::class, 'delete_vatiyoga_type']);

        /*talia yoga Drug Details*/
        Route::post('talia-yogas-details', [DrugController::class, 'talia_yoga_details']);
        Route::get('edit-talia-drugs/{id}', [DrugController::class, 'edit_talia_drugs']);
        Route::get('view-talia-drugs/{id}', [DrugController::class, 'view_talia_drugs']);
        Route::post('update-taliayoga-details', [DrugController::class, 'update_taliayoga_details']);
        Route::get('delete-taliyayoga-type/{id}', [DrugController::class, 'delete_taliyayoga_type']);

        /*arishtayoga yoga Drug Details*/
        Route::post('add-arishtayoga-details', [DrugController::class, 'arishta_yoga_details']);
        Route::get('edit-arishta-drugs/{id}', [DrugController::class, 'edit_arishta_drugs']);
        Route::get('view-arishta-drugs/{id}', [DrugController::class, 'view_arishta_drugs']);
        Route::post('update-arishtayogas-details', [DrugController::class, 'update_arishta_details']);
        Route::get('delete-arishtayoga-type/{id}', [DrugController::class, 'delete_arishta_type']);

        Route::get('system-configration', [DashboardController::class, 'system_configration'])->name('system-configration');
        Route::post('system-configration', [DashboardController::class, 'save_system_configration'])->name('system-configrations');

    // });
});

Route::get('education/edit-company', [AddUserController::class, 'edit_manage_profile_education']);
Route::post('education-delete', [AddUserController::class, 'education_delete']);
Route::get('language-delete/{lang_id}', [AddUserController::class, 'language_delete']);

Route::post('manage_profile_form_step3', [AddUserController::class, 'manage_profile_form_step3']);

Route::post('manage_profile_form_step4', [AddUserController::class, 'manage_profile_form_step4']);
Route::get('publication/edit-publication', [AddUserController::class, 'edit_manage_profile_publication']);
Route::post('publication-delete', [AddUserController::class, 'publication_delete']);
Route::post('manage_profile_form_step5', [AddUserController::class, 'manage_profile_form_step5']);


Route::get('postCreate',[PostController::class,'postCreate']);
Route::post('postData',[PostController::class,'postData'])->name('postData');

Route::post('user-login', [LoginController::class, 'login']);
Route::get('user-signup', [AddUserController::class, 'user_sign_up']);
Route::post('sign-up', [AddUserController::class, 'sign_up']);

/*country state city dropdown*/
Route::get('dropdown', [DropdownController::class, 'index']);
Route::post('api/fetch-states', [DropdownController::class, 'fetchState']);
Route::post('api/fetch-cities', [DropdownController::class, 'fetchCity']);
Route::get('/country-list', [UserController::class, 'country_list']);
        
/*end country state city dropdown*/

Route::get('add-menu', [AddMenuController::class, 'add_menu']);
Route::post('add-new-menu', [AddMenuController::class, 'add_new_menu']);
Route::get('edit-menu/{id}', [AddMenuController::class, 'edit_menu']);
Route::post('update-menu/{id}', [AddMenuController::class, 'update_menu']);
Route::get('menu-dlt/{id}', [AddMenuController::class, 'delete_menu']);
Route::resource('patients', PatientController::class);

Route::get('my-captcha',[LoginController::class,'myCaptcha'])->name('myCaptcha');
Route::post('my-captcha',[LoginController::class,'myCaptchaPost'])->name('myCaptcha.post');
Route::get('refresh_captcha',[LoginController::class,'refreshCaptcha'])->name('refresh_captcha');


//Routes for mails
Route::get('/send-email', [EmailController::class, 'index']);
