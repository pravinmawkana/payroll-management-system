<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeemasterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employeemaster', function (Blueprint $table) {
            $table->id('empId');
            $table->string('empCode',30);
            $table->string('empSalutation',30)->nullable();
            $table->string('empFirstName',30);
            $table->string('empMiddleName',30);
            $table->string('empLastName',30);
            $table->string('spouseName',50)->nullable();
            $table->enum('gender', ['M', 'F','O']);
            $table->date('dateOfBirth')->nullable();
            $table->date('dateOfJoinning')->nullable();
            $table->date('dateOfProbation')->nullable();
            $table->date('dateOfConfirmation')->nullable();
            $table->boolean('isPFApplicable');
            $table->string('pfNo',30)->nullable();
            $table->date('pfApplyDate')->nullable();
            $table->string('UNA',30)->nullable();
            $table->boolean('isESICApplicable');
            $table->string('ESICNo',30)->nullable();
            $table->boolean('isPTApplicable');
            $table->string('PAN',30)->nullable();
            $table->unsignedBigInteger('branchId');
            $table->foreign('branchId')->references('branchId')->on('branchmaster');
            $table->unsignedBigInteger('gradeId');
            $table->foreign('gradeId')->references('gradeId')->on('grademaster');
            $table->unsignedBigInteger('deptId');
            $table->foreign('deptId')->references('deptId')->on('departmentmaster');
            $table->unsignedBigInteger('desigId');
            $table->foreign('desigId')->references('desigId')->on('designationmaster');
            $table->unsignedBigInteger('divId');
            $table->foreign('divId')->references('divId')->on('divisionmaster');
            $table->unsignedBigInteger('unitId');
            $table->foreign('unitId')->references('unitId')->on('unitmaster');
            $table->unsignedBigInteger('projectId');
            $table->foreign('projectId')->references('projectId')->on('projectmaster');
            $table->unsignedBigInteger('catgId');
            $table->foreign('catgId')->references('catgId')->on('categorymaster');
            $table->string('paymentMode',30);           
            $table->unsignedBigInteger('eBankId');
            $table->foreign('eBankId')->references('eBankId')->on('emp_bank_detail');
            $table->string('accountNo',50)->nullable();
            $table->string('accountName',100)->nullable();
            $table->string('adharNo',20)->nullable();
            $table->unsignedBigInteger('reportingHeadId');
            $table->unsignedBigInteger('reportingManagerId');
            $table->date('groupJoiningDate')->nullable();
            $table->date('dateOfLeaving')->nullable();
            $table->boolean('isSalaryProcessing');
            $table->string('remarks')->nullable();
            $table->string('userName',50);
            $table->string('userPassword',50);
            $table->string('securityCode',50);
            $table->string('userRights',50);
            $table->string('lastLogOn',50)->default('First Time');
            $table->boolean('ristriction')->default(1);
            $table->boolean('ristrictSunday')->default(1);
            $table->string('startTime',20);
            $table->string('endTime',20);
            $table->boolean('changePassStatus')->default(0);
            $table->date('changePassDate')->nullable();
            $table->string('financialYear',7)->default('2022');
            $table->boolean('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employeemaster');
    }
}
