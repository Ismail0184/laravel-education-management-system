<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Users\UserController;
use App\Http\Controllers\Users\RoleController;
use App\Http\Controllers\Users\PermissionController;
use App\Http\Controllers\Talimat\ClassesController;
use App\Http\Controllers\Talimat\BranchController;
use App\Http\Controllers\Talimat\DistrictController;
use App\Http\Controllers\Talimat\ThanaController;
use App\Http\Controllers\Talimat\UnionController;
use App\Http\Controllers\Talimat\AdmissionController;
use App\Http\Controllers\Talimat\ResultController;
use App\Http\Controllers\Talimat\SubjectController;
use App\Http\Controllers\Talimat\SettingController;
use App\Http\Controllers\Talimat\AdmissionfeeController;
use App\Http\Controllers\Talimat\ExamfeeController;
use App\Http\Controllers\Talimat\MonthlyfeeController;
use App\Http\Controllers\Talimat\ExamnameController;
use App\Http\Controllers\Talimat\DivisionController;
use App\Http\Controllers\Talimat\GhantaController;
use App\Http\Controllers\Talimat\DaynameController;
use App\Http\Controllers\Talimat\ClassroutineController;
use App\Http\Controllers\Talimat\ExamroutineController;
use App\Http\Controllers\Talimat\DaypartController;
use App\Http\Controllers\Talimat\ExamhollController;
use App\Http\Controllers\Talimat\ExambenchController;
use App\Http\Controllers\Talimat\SiteplanController;
use App\Http\Controllers\Talimat\ExambenchsideController;
use App\Http\Controllers\Talimat\TeacherController;
use App\Http\Controllers\Talimat\BuildingController;
use App\Http\Controllers\Talimat\RoomController; 
use App\Http\Controllers\Talimat\NegranController;
use App\Http\Controllers\Talimat\MumtahinController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\Talimat\MadrashaController;
use App\Http\Controllers\Account\GroupController;
use App\Http\Controllers\Account\AheadController;
use App\Http\Controllers\Account\TransactionController;
use App\Http\Controllers\Account\MonthController;
use App\Http\Controllers\Account\YearController;
use App\Http\Controllers\Attendance\AtypeController;
use App\Http\Controllers\Attendance\AteacherController;
use App\Http\Controllers\Attendance\AstudentController;
use App\Http\Controllers\Attendance\AmethodController;
use App\Http\Controllers\Attendance\AmonthlyController;
use App\Http\Controllers\Attendance\SalaryController;
use App\Http\Controllers\BnumberController;
use App\Http\Controllers\Talimat\StatusController;
use App\Http\Controllers\ProfileController;
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

Auth::routes();

Route::get('/', function () { return view('welcome');
});
  
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('roles/delete/{id}', [RoleController::class, 'delete'])->name('roles.delete');
Route::resource('roles', RoleController::class);

Route::get('users/trashed', [UserController::class, 'trashed'])->name('users.trashed');
Route::get('users/delete/{id}', [UserController::class, 'delete'])->name('users.delete');
Route::resource('users', UserController::class);

Route::get('permissions/delete/{id}', [PermissionController::class, 'delete'])->name('permissions.delete');
Route::resource('permissions', PermissionController::class);

Route::get('/image-upload', [FileUpload::class, 'createForm']);
Route::post('/image-upload', [FileUpload::class, 'fileUpload'])->name('imageUpload');

Route::post('profile/image-upload', [ProfileController::class, 'fileUpload'])->name('profile.fileUpload');
Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);

Route::group(['middleware' => 'auth'], function () {
	Route::resource('roles', RoleController::class);
	Route::resource('user', UserController::class);
	Route::resource('users', UserController::class);
	Route::resource('permissions', PermissionController::class);

	Route::group(['prefix' => 'talimat'], function () {
		
		Route::get('/classes/report', [ClassesController::class, 'report'])->name('classes.report');
		Route::get('classes/delete/{id}', [ClassesController::class, 'delete'])->name('classes.delete');
		Route::resource('classes', ClassesController::class);
		
		Route::get('/branches/report', [BranchController::class, 'report'])->name('branches.report');
		Route::get('branches/delete/{id}', [BranchController::class, 'delete'])->name('branches.delete');
		Route::resource('branches', BranchController::class);
		
		Route::get('/districts/report', [DistrictController::class, 'report'])->name('districts.report');
		Route::get('/districts/generatePDF', [DistrictController::class, 'generatePDF'])->name('districts.generatePDF');
		Route::get('districts/delete/{id}', [DistrictController::class, 'delete'])->name('districts.delete');
		Route::resource('districts', DistrictController::class);
		
		Route::get('/thanas/report', [ThanaController::class, 'report'])->name('thanas.report');
		Route::get('thanas/delete/{id}', [ThanaController::class, 'delete'])->name('thanas.delete');
		Route::resource('thanas', ThanaController::class);
		
		Route::get('/unions/report', [UnionController::class, 'report'])->name('unions.report');
		Route::get('unions/delete/{id}', [UnionController::class, 'delete'])->name('unions.delete');
		Route::resource('unions', UnionController::class);
		
		Route::post('admissions/image-upload', [AdmissionController::class, 'fileUpload'])->name('admissions.fileUpload');
		Route::get('/admissions/mobile', [AdmissionController::class, 'mobile'])->name('admissions.mobile');
		Route::get('/admissions/report', [AdmissionController::class, 'report'])->name('admissions.report');
		Route::get('admissions/delete/{id}', [AdmissionController::class, 'delete'])->name('admissions.delete');
		Route::resource('admissions', AdmissionController::class);
		
		Route::get('/results/status/{value}', [ResultController::class, 'status'])->name('results.status');
		Route::get('/results/marksheet', [ResultController::class, 'marksheet'])->name('results.marksheet');
		Route::get('/results/classresult', [ResultController::class, 'classresult'])->name('results.classresult');
		Route::get('/results/report', [ResultController::class, 'report'])->name('results.report');
		Route::get('results/delete/{id}', [ResultController::class, 'delete'])->name('results.delete');
		Route::resource('results', ResultController::class);
		
		Route::get('/subjects/report', [SubjectController::class, 'report'])->name('subjects.report');
		Route::get('subjects/delete/{id}', [SubjectController::class, 'delete'])->name('subjects.delete');
		Route::resource('subjects', SubjectController::class);
		
		Route::get('/settings/report', [SettingController::class, 'report'])->name('settings.report');
		Route::get('settings/delete/{id}', [SettingController::class, 'delete'])->name('settings.delete');
		Route::resource('settings', SettingController::class);
		
		Route::get('/admissionfees/report', [AdmissionfeeController::class, 'report'])->name('admissionfees.report');
		Route::get('admissionfees/delete/{id}', [AdmissionfeeController::class, 'delete'])->name('admissionfees.delete');
		Route::resource('admissionfees', AdmissionfeeController::class);
		
		Route::get('/examfees/report', [ExamfeeController::class, 'report'])->name('examfees.report');
		Route::get('examfees/delete/{id}', [ExamfeeController::class, 'delete'])->name('examfees.delete');
		Route::resource('examfees', ExamfeeController::class);
		
		Route::get('/monthlyfees/report', [MonthlyfeeController::class, 'report'])->name('monthlyfees.report');
		Route::get('monthlyfees/delete/{id}', [MonthlyfeeController::class, 'delete'])->name('monthlyfees.delete');
		Route::resource('monthlyfees', MonthlyfeeController::class);
		
		Route::get('/examnames/report', [ExamnameController::class, 'report'])->name('examnames.report');
		Route::get('examnames/delete/{id}', [ExamnameController::class, 'delete'])->name('examnames.delete');
		Route::resource('examnames', ExamnameController::class);
		
		Route::get('/departments/report', [DivisionController::class, 'report'])->name('departments.report');
		Route::get('departments/delete/{id}', [DivisionController::class, 'delete'])->name('departments.delete');
		Route::resource('departments', DivisionController::class);
		
		Route::get('/ghantas/report', [GhantaController::class, 'report'])->name('ghantas.report');
		Route::get('ghantas/delete/{id}', [GhantaController::class, 'delete'])->name('ghantas.delete');
		Route::resource('ghantas', GhantaController::class);
		
		Route::get('/daynames/report', [DaynameController::class, 'report'])->name('daynames.report');
		Route::get('daynames/delete/{id}', [DaynameController::class, 'delete'])->name('daynames.delete');
		Route::resource('daynames', DaynameController::class);
		
		Route::get('/classroutines/report', [ClassroutineController::class, 'report'])->name('classroutines.report');
		Route::get('classroutines/delete/{id}', [ClassroutineController::class, 'delete'])->name('classroutines.delete');
		Route::resource('classroutines', ClassroutineController::class);
		
		Route::get('/examroutines/report', [ExamroutineController::class, 'report'])->name('examroutines.report');
		Route::get('examroutines/delete/{id}', [ExamroutineController::class, 'delete'])->name('examroutines.delete');
		Route::resource('examroutines', ExamroutineController::class);
		
		Route::get('/dayparts/report', [DaypartController::class, 'report'])->name('dayparts.report');
		Route::get('dayparts/delete/{id}', [DaypartController::class, 'delete'])->name('dayparts.delete');
		Route::resource('dayparts', DaypartController::class);
		
		Route::get('/examholls/report', [ExamhollController::class, 'report'])->name('examholls.report');
		Route::get('examholls/delete/{id}', [ExamhollController::class, 'delete'])->name('examholls.delete');
		Route::resource('examholls', ExamhollController::class);
		
		Route::post('/exambenches/auto', [ExambenchController::class, 'auto'])->name('exambenches.auto');
		Route::post('/siteplans/adelete', [ExambenchController::class, 'adelete'])->name('siteplans.adelete');
		Route::get('/exambenches/lebel', [ExambenchController::class, 'lebel'])->name('exambenches.lebel');
		Route::get('/exambenches/report', [ExambenchController::class, 'report'])->name('exambenches.report');
		Route::get('exambenches/delete/{id}', [ExambenchController::class, 'delete'])->name('exambenches.delete');
		Route::resource('exambenches', ExambenchController::class);
		
		Route::post('/siteplans/auto', [SiteplanController::class, 'auto'])->name('siteplans.auto');
		Route::post('/siteplans/adelete', [SiteplanController::class, 'adelete'])->name('siteplans.adelete');
		Route::get('/siteplans/report', [SiteplanController::class, 'report'])->name('siteplans.report');
		Route::get('/siteplans/admidcard', [SiteplanController::class, 'admidcard'])->name('siteplans.admidcard');
		Route::get('siteplans/delete/{id}', [SiteplanController::class, 'delete'])->name('siteplans.delete');
		Route::resource('siteplans', SiteplanController::class); 
		
		Route::get('/exambenchsides/report', [ExambenchsideController::class, 'report'])->name('exambenchsides.report');
		Route::get('exambenchsides/delete/{id}', [ExambenchsideController::class, 'delete'])->name('exambenchsides.delete');
		Route::resource('exambenchsides', ExambenchsideController::class); 
		
		Route::post('teachers/image-upload', [TeacherController::class, 'fileUpload'])->name('teachers.fileUpload');
		Route::get('/teachers/report', [TeacherController::class, 'report'])->name('teachers.report');
		Route::get('/teachers/mobile', [TeacherController::class, 'mobile'])->name('teachers.mobile');
		Route::get('teachers/delete/{id}', [TeacherController::class, 'delete'])->name('teachers.delete');
		Route::resource('teachers', TeacherController::class);
		
		Route::get('/buildings/report', [BuildingController::class, 'report'])->name('buildings.report');
		Route::get('buildings/delete/{id}', [BuildingController::class, 'delete'])->name('buildings.delete');
		Route::resource('buildings', BuildingController::class);
		
		Route::get('/rooms/report', [RoomController::class, 'report'])->name('rooms.report');
		Route::get('rooms/delete/{id}', [RoomController::class, 'delete'])->name('rooms.delete');
		Route::resource('rooms', RoomController::class);
		
		Route::get('/negrans/report', [NegranController::class, 'report'])->name('negrans.report');
		Route::get('negrans/delete/{id}', [NegranController::class, 'delete'])->name('negrans.delete');
		Route::resource('negrans', NegranController::class);
		
		Route::get('/mumtahins/report', [MumtahinController::class, 'report'])->name('mumtahins.report');
		Route::get('mumtahins/delete/{id}', [MumtahinController::class, 'delete'])->name('mumtahins.delete');
		Route::resource('mumtahins', MumtahinController::class);
		
		Route::get('/madrashas/report', [AdmissionController::class, 'report'])->name('madrashas.report');
		Route::get('madrashas/delete/{id}', [AdmissionController::class, 'delete'])->name('talimat.delete');
		Route::resource('madrashas', MadrashaController::class);

		Route::get('/bnumbers/toBangla/{value}', [BnumberController::class, 'toBangla'])->name('bnumbers.toBangla');
		Route::get('/bnumbers/report', [BnumberController::class, 'report'])->name('bnumbers.report');
		Route::get('bnumbers/delete/{id}', [BnumberController::class, 'delete'])->name('bnumbers.delete');
		Route::resource('bnumbers', BnumberController::class);

		Route::get('/statuses/report', [StatusController::class, 'report'])->name('statuses.report');
		Route::get('statuses/delete/{id}', [StatusController::class, 'delete'])->name('statuses.delete');
		Route::resource('statuses', StatusController::class);
	});

	Route::group(['prefix' => 'account'], function () {
	
		Route::get('/groups/report', [GroupController::class, 'report'])->name('groups.report');
		Route::get('groups/delete/{id}', [GroupController::class, 'delete'])->name('groups.delete');
		Route::resource('groups', GroupController::class);

		Route::get('/aheads/report', [AheadController::class, 'report'])->name('aheads.report');
		Route::get('aheads/delete/{id}', [AheadController::class, 'delete'])->name('aheads.delete');
		Route::resource('aheads', AheadController::class);

		Route::get('/transactions/report', [TransactionController::class, 'report'])->name('transactions.report');
		Route::get('transactions/delete/{id}', [TransactionController::class, 'delete'])->name('transactions.delete');
		Route::resource('transactions', TransactionController::class);

		Route::get('/months/report', [MonthController::class, 'report'])->name('months.report');
		Route::get('months/delete/{id}', [MonthController::class, 'delete'])->name('months.delete');
		Route::resource('months', MonthController::class);

		Route::get('/years/report', [YearController::class, 'report'])->name('years.report');
		Route::get('years/delete/{id}', [YearController::class, 'delete'])->name('years.delete');
		Route::resource('years', YearController::class);

	});

	Route::group(['prefix' => 'attendance'], function () {
	
		Route::get('/atypes/report', [AtypeController::class, 'report'])->name('atypes.report');
		Route::get('atypes/delete/{id}', [AtypeController::class, 'delete'])->name('atypes.delete');
		Route::resource('atypes', AtypeController::class);

		Route::get('/ateachers/report', [AteacherController::class, 'report'])->name('ateachers.report');
		Route::get('ateachers/delete/{id}', [AteacherController::class, 'delete'])->name('ateachers.delete');
		Route::resource('ateachers', AteacherController::class);

		Route::get('/astudents/report', [AstudentController::class, 'report'])->name('astudents.report');
		Route::get('astudents/delete/{id}', [AstudentController::class, 'delete'])->name('astudents.delete');
		Route::resource('astudents', AstudentController::class);

		Route::get('/amethods/report', [AmethodController::class, 'report'])->name('amethods.report');
		Route::get('amethods/delete/{id}', [AmethodController::class, 'delete'])->name('amethods.delete');
		Route::resource('amethods', AmethodController::class);

		Route::get('/amonthlys/report', [AmonthlyController::class, 'report'])->name('amonthlys.report');
		Route::get('amonthlys/delete/{id}', [AmonthlyController::class, 'delete'])->name('amonthlys.delete');
		Route::resource('amonthlys', AmonthlyController::class);
	
		Route::get('/salaries/report', [SalaryController::class, 'report'])->name('salaries.report');
		Route::get('salaries/delete/{id}', [SalaryController::class, 'delete'])->name('salaries.delete');
		Route::resource('salaries', SalaryController::class);
	});


});

// multi-languages
Route::get('locale/{locale}', function ($locale){
    Session::put('locale', $locale);
    return redirect()->back();
});

Route::get('dayname/{dayname}', function ($dayname){
    Session::put('dn_id', $dayname);
    return redirect()->back();
});

Route::get('clss/{clss}', function ($clss){
    Session::put('c_id', $clss);
    return redirect()->back();
});

Route::get('branch/{branch}', function ($branch){
    Session::put('b_id', $branch);
    return redirect()->back();
});

Route::get('subject/{subject}', function ($subject){
    Session::put('s_id', $subject);
    return redirect()->back();
});

Route::get('teacher/{teacher}', function ($teacher){
    Session::put('t_id', $teacher);
    return redirect()->back();
});

Route::get('student/{student}', function ($student){
    Session::put('a_id', $student);
    return redirect()->back();
});

Route::get('district/{district}', function ($district){
    Session::put('d_id', $district);
    return redirect()->back();
});

Route::get('division/{division}', function ($division){
    Session::put('division', $division);
    return redirect()->back();
});

Route::get('/refresh', function (){
    
	Session::forget('dn_id'); 
	Session::forget('c_id'); 
	Session::forget('t_id'); 
	Session::forget('division'); 
	Session::forget('d_id');
	Session::forget('s_id');
	Session::forget('a_id');
	Session::forget('b_id');
	Session::forget('student_has_for_result');
	
	return redirect()->back();
});

// multi-languages
Route::get('/clear-cache-all', function() {

    Artisan::call('cache:clear');

  

    dd("Cache Clear All");

});