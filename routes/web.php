<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DemoController;
use App\Http\Controllers\SingleActionController;
use App\Http\Controllers\ResourseController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DisplaySidebarController;
use App\Http\Controllers\CompanyDetailsController;
use App\Http\Controllers\CompanyBankMasterController;
use App\Http\Controllers\CompanytanMasterController;
use App\Http\Controllers\BranchMasterConroller;
use App\Http\Controllers\SlabMasterController;
use App\Http\Controllers\DemartmentMasterController;
use App\Http\Controllers\DesignationMasterController;
use App\Http\Controllers\GradeMasterController;
use App\Http\Controllers\DivisionMasterController;
use App\Http\Controllers\UnitMasterController;
use App\Http\Controllers\CategoryMasterController;
use App\Http\Controllers\ProjectMasterController;
use App\Http\Controllers\EmployeeBankMasterController;
use App\Http\Controllers\ComponentTypeMasterController;
use App\Http\Controllers\ComponentNameMasterController;
use App\Http\Controllers\TDSHeadMasterController;
use App\Http\Controllers\SalaryComponentAllocationController;

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
Route:: get('/dashboard',function(){
    return view('dashboard');
});
Route:: post('/mainmenu',[DisplaySidebarController::class,'index']);
//Route:: get('/mainmenu',[DisplaySidebarController::class,'index']);


Route:: get('/login',[LoginController::class,'index']);
Route:: post('/login',[LoginController::class,'login'])->name('login');

Route::get('/home/{name}/{id?}',function($name,$id=null){
    $msg = "<h2>This is HTML H2</h2>";
    $data = compact('name','id','msg');
    return view('home')->with($data);

});

Route::get('/test/{name}/{mobile?}',function($name,$mobile=null){
    echo "Your Name is :-".$name;
    echo "</br>Your Mobile No is :-".$mobile;
})->where(['name' => '[A-Z a-z]+' , 'mobile' => '[0-9]+']);

// Route using Basic Controller
Route::get('/demo',[DemoController::class,'index']) ;
Route::get('/about','App\Http\Controllers\DemoController@about') ;

// Route using single action controller  Controller  (--invokable)

Route::get('/single',SingleActionController::class);

// Route using Resource controller  Controller  (--resource)
Route::resource('resourse', ResourseController::class);

// from demo

Route:: get('/register',[RegistrationController::class,'index']);
Route:: post('/register',[RegistrationController::class,'register']);

//Route of CompanyDetailsController resource
Route::resource('companydetails', CompanyDetailsController::class);
Route::post('companydetails.edit', 'App\Http\Controllers\CompanyDetailsController@edit')->name('companyedit');

//Route of CompanyBankMaster
Route::get('/companybankmaster',[CompanyBankMasterController::class,'index'])->name('companybankmaster');
Route::get('/companybankmasterdisplay',[CompanyBankMasterController::class,'displayRecords'])->name('companybankmasterdisplay');
Route::post('/companybankmasterstore',[CompanyBankMasterController::class,'store'])->name('companybankmasterstore');
Route::post('/companybankmasteredit',[CompanyBankMasterController::class,'edit'])->name('companybankmasteredit');
Route::post('/companybankmasterupdate',[CompanyBankMasterController::class,'update'])->name('companybankmasterupdate');
Route::post('/companybankmasterdelete',[CompanyBankMasterController::class,'delete'])->name('companybankmasterdelete');

//Route of CompanyTANMaster
Route::get('/companytanmaster',[CompanytanMasterController::class,'index'])->name('companytanmaster');
Route::get('/companytanmasterdisplay',[CompanytanMasterController::class,'displayRecords'])->name('companytanmasterdisplay');
Route::post('/companytanmasterstore',[CompanytanMasterController::class,'store'])->name('companytanmasterstore');
Route::post('/companytanmasteredit',[CompanytanMasterController::class,'edit'])->name('companytanmasteredit');
Route::post('/companytanmasterupdate',[CompanytanMasterController::class,'update'])->name('companytanmasterupdate');
Route::post('/companytanmasterdelete',[CompanytanMasterController::class,'delete'])->name('companytanmasterdelete');

//Route of slabmaster
Route::get('/slabmaster',[SlabMasterController::class,'index'])->name('slabmaster');
Route::get('/slabmasterdisplay',[SlabMasterController::class,'displayRecords'])->name('slabmasterdisplay');
Route::post('/slabmasterstore',[SlabMasterController::class,'store'])->name('slabmasterstore');
Route::post('/slabmasteredit',[SlabMasterController::class,'edit'])->name('slabmasteredit');
Route::post('/slabmasterupdate',[SlabMasterController::class,'update'])->name('slabmasterupdate');
Route::post('/slabmasterdelete',[SlabMasterController::class,'delete'])->name('slabmasterdelete');

//Route of departmentmaster
Route::get('/deptmaster',[DemartmentMasterController::class,'index'])->name('deptmaster');
Route::get('/deptmasterdisplay',[DemartmentMasterController::class,'displayRecords'])->name('deptmasterdisplay');
Route::post('/deptmasterstore',[DemartmentMasterController::class,'store'])->name('deptmasterstore');
Route::post('/deptmasteredit',[DemartmentMasterController::class,'edit'])->name('deptmasteredit');
Route::post('/deptmasterupdate',[DemartmentMasterController::class,'update'])->name('deptmasterupdate');
Route::post('/deptmasterdelete',[DemartmentMasterController::class,'delete'])->name('deptmasterdelete');

//Route of designationmaster
Route::get('/desigmaster',[DesignationMasterController::class,'index'])->name('desigmaster');
Route::get('/desigmasterdisplay',[DesignationMasterController::class,'displayRecords'])->name('desigmasterdisplay');
Route::post('/desigmasterstore',[DesignationMasterController::class,'store'])->name('desigmasterstore');
Route::post('/desigmasteredit',[DesignationMasterController::class,'edit'])->name('desigmasteredit');
Route::post('/desigmasterupdate',[DesignationMasterController::class,'update'])->name('desigmasterupdate');
Route::post('/desigmasterdelete',[DesignationMasterController::class,'delete'])->name('desigmasterdelete');

//Route of grademaster
Route::get('/grademaster',[GradeMasterController::class,'index'])->name('grademaster');
Route::get('/grademasterdisplay',[GradeMasterController::class,'displayRecords'])->name('grademasterdisplay');
Route::post('/grademasterstore',[GradeMasterController::class,'store'])->name('grademasterstore');
Route::post('/grademasteredit',[GradeMasterController::class,'edit'])->name('grademasteredit');
Route::post('/grademasterupdate',[GradeMasterController::class,'update'])->name('grademasterupdate');
Route::post('/grademasterdelete',[GradeMasterController::class,'delete'])->name('grademasterdelete');

//Route of divisionmaster
Route::get('/divisionmaster',[DivisionMasterController::class,'index'])->name('divisionmaster');
Route::get('/divisionmasterdisplay',[DivisionMasterController::class,'displayRecords'])->name('divisionmasterdisplay');
Route::post('/divisionmasterstore',[DivisionMasterController::class,'store'])->name('divisionmasterstore');
Route::post('/divisionmasteredit',[DivisionMasterController::class,'edit'])->name('divisionmasteredit');
Route::post('/divisionmasterupdate',[DivisionMasterController::class,'update'])->name('divisionmasterupdate');
Route::post('/divisionmasterdelete',[DivisionMasterController::class,'delete'])->name('divisionmasterdelete');


//Route of unitmaster
Route::get('/unitmaster',[UnitMasterController::class,'index'])->name('unitmaster');
Route::get('/unitmasterdisplay',[UnitMasterController::class,'displayRecords'])->name('unitmasterdisplay');
Route::post('/unitmasterstore',[UnitMasterController::class,'store'])->name('unitmasterstore');
Route::post('/unitmasteredit',[UnitMasterController::class,'edit'])->name('unitmasteredit');
Route::post('/unitmasterupdate',[UnitMasterController::class,'update'])->name('unitmasterupdate');
Route::post('/unitmasterdelete',[UnitMasterController::class,'delete'])->name('unitmasterdelete');

//Route of projectmaster
Route::get('/projectmaster',[ProjectMasterController::class,'index'])->name('projectmaster');
Route::get('/projectmasterdisplay',[ProjectMasterController::class,'displayRecords'])->name('projectmasterdisplay');
Route::post('/projectmasterstore',[ProjectMasterController::class,'store'])->name('projectmasterstore');
Route::post('/projectmasteredit',[ProjectMasterController::class,'edit'])->name('projectmasteredit');
Route::post('/projectmasterupdate',[ProjectMasterController::class,'update'])->name('projectmasterupdate');
Route::post('/projectmasterdelete',[ProjectMasterController::class,'delete'])->name('projectmasterdelete');

//Route of categorymaster
Route::get('/categorymaster',[CategoryMasterController::class,'index'])->name('categorymaster');
Route::get('/categorymasterdisplay',[CategoryMasterController::class,'displayRecords'])->name('categorymasterdisplay');
Route::post('/categorymasterstore',[CategoryMasterController::class,'store'])->name('categorymasterstore');
Route::post('/categorymasteredit',[CategoryMasterController::class,'edit'])->name('categorymasteredit');
Route::post('/categorymasterupdate',[CategoryMasterController::class,'update'])->name('categorymasterupdate');
Route::post('/categorymasterdelete',[CategoryMasterController::class,'delete'])->name('categorymasterdelete');

//Route of empBankmaster
Route::get('/empBankmaster',[EmployeeBankMasterController::class,'index'])->name('empBankmaster');
Route::get('/empBankmasterdisplay',[EmployeeBankMasterController::class,'displayRecords'])->name('empBankmasterdisplay');
Route::post('/empBankmasterstore',[EmployeeBankMasterController::class,'store'])->name('empBankmasterstore');
Route::post('/empBankmasteredit',[EmployeeBankMasterController::class,'edit'])->name('empBankmasteredit');
Route::post('/empBankmasterupdate',[EmployeeBankMasterController::class,'update'])->name('empBankmasterupdate');
Route::post('/empBankmasterdelete',[EmployeeBankMasterController::class,'delete'])->name('empBankmasterdelete');

//Route of componenttypemaster
Route::get('/ctypemaster',[ComponentTypeMasterController::class,'index'])->name('ctypemaster');
Route::get('/ctypemasterdisplay',[ComponentTypeMasterController::class,'displayRecords'])->name('ctypemasterdisplay');
Route::post('/ctypemasterstore',[ComponentTypeMasterController::class,'store'])->name('ctypemasterstore');
Route::post('/ctypemasteredit',[ComponentTypeMasterController::class,'edit'])->name('ctypemasteredit');
Route::post('/ctypemasterupdate',[ComponentTypeMasterController::class,'update'])->name('ctypemasterupdate');
Route::post('/ctypemasterdelete',[ComponentTypeMasterController::class,'delete'])->name('ctypemasterdelete');

//Route of componentnamemaster
Route::get('/cnamemaster',[ComponentNameMasterController::class,'index'])->name('cnamemaster');
Route::get('/cnamemasterdisplay',[ComponentNameMasterController::class,'displayRecords'])->name('cnamemasterdisplay');
Route::post('/cnamemasterstore',[ComponentNameMasterController::class,'store'])->name('cnamemasterstore');
Route::post('/cnamemasteredit',[ComponentNameMasterController::class,'edit'])->name('cnamemasteredit');
Route::post('/cnamemasterload',[ComponentNameMasterController::class,'load'])->name('cnamemasterload');
Route::post('/cnamemasterupdate',[ComponentNameMasterController::class,'update'])->name('cnamemasterupdate');
Route::post('/cnamemasterdelete',[ComponentNameMasterController::class,'delete'])->name('cnamemasterdelete');

//Route of TDSheadmaster
Route::get('/tdsheadmaster',[TDSHeadMasterController::class,'index'])->name('tdsheadmaster');
Route::get('/tdsheadmasterdisplay',[TDSHeadMasterController::class,'displayRecords'])->name('tdsheadmasterdisplay');
Route::post('/tdsheadmasterstore',[TDSHeadMasterController::class,'store'])->name('tdsheadmasterstore');
Route::post('/tdsheadmasteredit',[TDSHeadMasterController::class,'edit'])->name('tdsheadmasteredit');
Route::post('/tdsheadmasterload',[TDSHeadMasterController::class,'load'])->name('tdsheadmasterload');
Route::post('/tdsheadmasterupdate',[TDSHeadMasterController::class,'update'])->name('tdsheadmasterupdate');
Route::post('/tdsheadmasterdelete',[TDSHeadMasterController::class,'delete'])->name('tdsheadmasterdelete');

//Route of salarycomponentallocation
Route::get('/salarycomponentallocation',[SalaryComponentAllocationController::class,'index'])->name('salarycomponentallocation');
Route::get('/salarycomponentallocationdisplay',[SalaryComponentAllocationController::class,'displayRecords'])->name('salarycomponentallocationdisplay');
Route::post('/salarycomponentallocationstore',[SalaryComponentAllocationController::class,'store'])->name('salarycomponentallocationstore');
Route::post('/salarycomponentallocationedit',[SalaryComponentAllocationController::class,'edit'])->name('salarycomponentallocationedit');
Route::post('/salarycomponentallocationload',[SalaryComponentAllocationController::class,'load'])->name('salarycomponentallocationload');
Route::post('/salarycomponentallocationupdate',[SalaryComponentAllocationController::class,'update'])->name('salarycomponentallocationupdate');
Route::post('/salarycomponentallocationdelete',[SalaryComponentAllocationController::class,'delete'])->name('salarycomponentallocationdelete');

