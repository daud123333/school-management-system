<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\Setup\StudentClassController;
use App\Http\Controllers\Backend\Setup\StudentYearController;
use App\Http\Controllers\Backend\Setup\StudentGroupController;

use App\Http\Controllers\Backend\Setup\StudentShiftController;

use App\Http\Controllers\Backend\Setup\FeeCategoryController;
use App\Http\Controllers\Backend\Setup\FeeAmountController;
use App\Http\Controllers\Backend\Setup\ExamTypeController;
use App\Http\Controllers\Backend\Setup\SchoolSubjectController;
use App\Http\Controllers\Backend\Setup\AssignSubjectController;
use App\Http\Controllers\Backend\Setup\DesignationController;
use App\Http\Controllers\Backend\Student\StudentRegController;
use App\Http\Controllers\Backend\Student\StudentRollController;
use App\Http\Controllers\Backend\Student\RegistrationFeeController;
use App\Http\Controllers\Backend\Student\MonthlyFeeController;
use App\Http\Controllers\Backend\Student\ExamFeeController;

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

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('admin.index');
})->name('dashboard');

//Admin Routes
Route::get('/admin/logout', [AdminController::class,'logout'])->name('admin.logout');


//all user managements Roues
Route::prefix('users')->group(function(){
    Route::get('/view', [UserController::class,'userView'])->name('user.view');
    Route::get('/add', [UserController::class,'addUser'])->name('add.user');
    Route::post('/store', [UserController::class,'storeUser'])->name('store.user');
    Route::get('/edit/{id}', [UserController::class,'editUser'])->name('edit.user');
    Route::post('/update/{id}', [UserController::class,'updateUser'])->name('update.user');
    Route::get('/delete/{id}', [UserController::class,'deleteUser'])->name('delete.user');
});


//User profile and Change Password Roues
Route::prefix('profile')->group(function(){
    Route::get('/view', [ProfileController::class,'viewProfile'])->name('view.profile');
    Route::get('/edit', [ProfileController::class,'editProfile'])->name('edit.profile');
    Route::post('/update', [ProfileController::class,'updateProfile'])->name('update.profile');
    Route::get('passwordview', [ProfileController::class,'editPassword'])->name('view.password');
    Route::post('/changepassword', [ProfileController::class,'changePassword'])->name('change.password');


});


//Setup Management  Routes /

Route::prefix('setups')->group(function(){
    Route::get('/student/class/view', [StudentClassController::class,'viewClass'])->name('student.class.view');
    Route::get('/add/class', [StudentClassController::class,'studentClassAdd'])->name('student.class.add');
    Route::post('/student/class/store', [StudentClassController::class,'studentClassStore'])->name('student.class.store');
    Route::get('/student/class/edit/{id}', [StudentClassController::class,'studentClassEdit'])->name('student.class.edit');
    Route::post('/update/{id}', [StudentClassController::class,'studentClassUpdate'])->name('update.class');
    Route::get('/student/class/delete/{id}', [StudentClassController::class,'studentClassDelete'])->name('student.class.delete');

     //Student Year Routes

     Route::get('/student/year/view', [StudentYearController::class,'viewYear'])->name('student.year.view');
     Route::get('/student/year/add', [StudentYearController::class,'studentYearAdd'])->name('student.year.add');
     Route::post('/student/year/store', [StudentYearController::class,'studentYearStore'])->name('student.year.store');
     Route::get('student/edit/{id}', [StudentYearController::class,'studentYearEdit'])->name('student.year.edit');
     Route::post('/update/{id}', [StudentYearController::class,'studentYearUpdate'])->name('student.year.update');
     Route::get('student/year/delete/{id}', [StudentYearController::class,'studentYearDelete'])->name('student.year.delete');

     //Student Year Routes



     Route::get('student/group/view', [StudentGroupController::class,'viewGroup'])->name('student.group.view');
     Route::get('student/group/add', [StudentGroupController::class,'studentGroupAdd'])->name('student.group.add');
     Route::post('student/group/store', [StudentGroupController::class,'studentGroupdStore'])->name('student.group.store');
     Route::get('student/group/edit/{id}', [StudentGroupController::class,'studentGroupEdit'])->name('student.group.edit');
     Route::post('update/{id}', [StudentGroupController::class,'studentGroupdUpdate'])->name('student.group.update');
     Route::get('student/delete/{id}', [StudentGroupController::class,'studentGroupdDelete'])->name('student.group.delete');




     // Student Shift Routes

     Route::get('/student/shift/view', [StudentShiftController::class,'viewShift'])->name('student.shift.view');
     Route::get('/student/shift/add', [StudentShiftController::class,'studentShiftAdd'])->name('student.shift.add');
     Route::post('/student/shift/store', [StudentShiftController::class,'studentShiftStore'])->name('student.shift.store');
     Route::get('student/shift/edit/{id}', [StudentShiftController::class,'studentShiftEdit'])->name('student.shift.edit');
     Route::post('/update/{id}', [StudentShiftController::class,'studentShiftUpdate'])->name('student.shift.update');
     Route::get('/delete/{id}', [StudentShiftController::class,'studentShiftDelete'])->name('student.shift.delete');


     //FEE CATEGORY ROUTES



     Route::get('view', [FeeCategoryController::class,'viewCategory'])->name('fee.category.view');
     Route::get('add', [FeeCategoryController::class,'feeCategoryAdd'])->name('fee.category.add');
     Route::post('/store', [FeeCategoryController::class,'feeCategoryStore'])->name('fee.category.store');
      Route::get('edit/{id}', [FeeCategoryController::class,'feeCategoryEdit'])->name('fee.category.edit');
      Route::post('fee/category/update/{id}', [FeeCategoryController::class,'feeCategoryUpdate'])->name('fee.category.update');
      Route::get('fee/category/delete/{id}', [FeeCategoryController::class,'feeCategoryDelete'])->name('fee.category.delete');


      Route::get('fee/amount/view', [FeeAmountController::class,'viewFeeAmount'])->name('fee.amount.view');
     // Route::get('fee/amount/view', [FeeAmountControllere::class, 'ViewFeeAmount'])->name('fee.amount.view');
     Route::get('fee/amount/add', [FeeAmountController::class, 'addFeeAmount'])->name('fee.amount.add');
     Route::post('fee/amount/store', [FeeAmountController::class,'StoreFeeAmount'])->name('store.fee.amount');
     Route::get('fee/amount/edit/{fee_category_id}', [FeeAmountController::class, 'EditFeeAmount'])->name('fee.amount.edit');

      Route::post('fee/amount/update/{fee_category_id}', [FeeAmountController::class, 'UpdateFeeAmount'])->name('update.fee.amount');

     Route::get('fee/amount/details/{fee_category_id}', [FeeAmountController::class, 'DetailsFeeAmount'])->name('fee.amount.details');


     // Exam Type Routes

Route::get('exam/type/view', [ExamTypeController::class, 'ViewExamType'])->name('exam.type.view');

Route::get('exam/type/add', [ExamTypeController::class, 'ExamTypeAdd'])->name('exam.type.add');

Route::post('exam/type/store', [ExamTypeController::class, 'ExamTypeStore'])->name('store.exam.type');

Route::get('exam/type/edit/{id}', [ExamTypeController::class, 'ExamTypeEdit'])->name('exam.type.edit');

Route::post('exam/type/update/{id}', [ExamTypeController::class, 'ExamTypeUpdate'])->name('update.exam.type');

Route::get('exam/type/delete/{id}', [ExamTypeController::class, 'ExamTypeDelete'])->name('exam.type.delete');


// School Subject All Routes

Route::get('school/subject/view', [SchoolSubjectController::class, 'ViewSubject'])->name('school.subject.view');

Route::get('school/subject/add', [SchoolSubjectController::class, 'SubjectAdd'])->name('school.subject.add');

Route::post('school/subject/store', [SchoolSubjectController::class, 'SubjectStore'])->name('store.school.subject');

Route::get('school/subject/edit/{id}', [SchoolSubjectController::class, 'SubjectEdit'])->name('school.subject.edit');

Route::post('school/subject/update/{id}', [SchoolSubjectController::class, 'SubjectUpdate'])->name('update.school.subject');

Route::get('school/subject/delete/{id}', [SchoolSubjectController::class, 'SubjectDelete'])->name('school.subject.delete');



// Assign Subject Routes

Route::get('assign/subject/view', [AssignSubjectController::class, 'ViewAssignSubject'])->name('assign.subject.view');

Route::get('assign/subject/add', [AssignSubjectController::class, 'AddAssignSubject'])->name('assign.subject.add');

Route::post('assign/subject/store', [AssignSubjectController::class, 'StoreAssignSubject'])->name('store.assign.subject');

Route::get('assign/subject/edit/{class_id}', [AssignSubjectController::class, 'EditAssignSubject'])->name('assign.subject.edit');

Route::post('assign/subject/update/{class_id}', [AssignSubjectController::class, 'UpdateAssignSubject'])->name('update.assign.subject');

Route::get('assign/subject/details/{class_id}', [AssignSubjectController::class, 'DetailsAssignSubject'])->name('assign.subject.details');


// Designation All Routes

Route::get('designation/view', [DesignationController::class, 'ViewDesignation'])->name('designation.view');

Route::get('designation/add', [DesignationController::class, 'DesignationAdd'])->name('designation.add');

Route::post('designation/store', [DesignationController::class, 'DesignationStore'])->name('store.designation');

Route::get('designation/edit/{id}', [DesignationController::class, 'DesignationEdit'])->name('designation.edit');

Route::post('designation/update/{id}', [DesignationController::class, 'DesignationUpdate'])->name('update.designation');

Route::get('designation/delete/{id}', [DesignationController::class, 'DesignationDelete'])->name('designation.delete');

});


/// Student Registration Routes
Route::prefix('students')->group(function(){

    Route::get('/reg/view', [StudentRegController::class, 'StudentRegView'])->name('student.registration.view');

    Route::get('/reg/Add', [StudentRegController::class, 'StudentRegAdd'])->name('student.registration.add');

    Route::post('/reg/store', [StudentRegController::class, 'StudentRegStore'])->name('store.student.registration');

    Route::get('/year/class/wise', [StudentRegController::class, 'StudentClassYearWise'])->name('student.year.class.wise');

    Route::get('/reg/edit/{student_id}', [StudentRegController::class, 'StudentRegEdit'])->name('student.registration.edit');

    Route::post('/reg/update/{student_id}', [StudentRegController::class, 'StudentRegUpdate'])->name('update.student.registration');

    Route::get('/reg/promotion/{student_id}', [StudentRegController::class, 'StudentRegPromotion'])->name('student.registration.promotion');

    Route::post('/reg/update/promotion/{student_id}', [StudentRegController::class, 'StudentUpdatePromotion'])->name('promotion.student.registration');

    Route::get('/reg/details/{student_id}', [StudentRegController::class, 'StudentRegDetails'])->name('student.registration.details');

    // Student Roll Generate Routes
Route::get('/roll/generate/view', [StudentRollController::class, 'StudentRollView'])->name('roll.generate.view');

Route::get('/reg/getstudents', [StudentRollController::class, 'GetStudents'])->name('student.registration.getstudents');

Route::post('/roll/generate/store', [StudentRollController::class, 'StudentRollStore'])->name('roll.generate.store');

// Registration Fee Routes
Route::get('/reg/fee/view', [RegistrationFeeController::class, 'RegFeeView'])->name('registration.fee.view');

Route::get('/reg/fee/classwisedata', [RegistrationFeeController::class, 'RegFeeClassData'])->name('student.registration.fee.classwise.get');

Route::get('/reg/fee/payslip', [RegistrationFeeController::class, 'RegFeePayslip'])->name('student.registration.fee.payslip');

// Monthly Fee Routes
Route::get('/monthly/fee/view', [MonthlyFeeController::class, 'MonthlyFeeView'])->name('monthly.fee.view');

Route::get('/monthly/fee/classwisedata', [MonthlyFeeController::class, 'MonthlyFeeClassData'])->name('student.monthly.fee.classwise.get');

Route::get('/monthly/fee/payslip', [MonthlyFeeController::class, 'MonthlyFeePayslip'])->name('student.monthly.fee.payslip');

  // Exam Fee Routes
Route::get('/exam/fee/view', [ExamFeeController::class, 'ExamFeeView'])->name('exam.fee.view');

Route::get('/exam/fee/classwisedata', [ExamFeeController::class, 'ExamFeeClassData'])->name('student.exam.fee.classwise.get');

Route::get('/exam/fee/payslip', [ExamFeeController::class, 'ExamFeePayslip'])->name('student.exam.fee.payslip');


});
