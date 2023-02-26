<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMonthlyVeriablePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('monthly_veriable_payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('empId');
            $table->foreign('empId')->references('empId')->on('employeemaster');
            $table->unsignedBigInteger('companyId');
            $table->foreign('companyId')->references('companyId')->on('companydetails');
            $table->unsignedBigInteger('sMonthId');
            $table->foreign('sMonthId')->references('sMonthId')->on('tbl_set_month');
            $table->string('remarks');
            $table->boolean('hold_salary');
            //earning
            $table->float('OtherAllowance')->default(0);
            $table->float('Incentive')->default(0);
            $table->float('SpotIncentive')->default(0);
            $table->float('LeaveEncashment')->default(0);
            $table->float('CSIIncentive')->default(0);
            $table->float('SpecialBonus')->default(0);
            $table->float('PerformanceBonus')->default(0);
            $table->float('Bonus')->default(0);
            $table->float('OtherSalary')->default(0);
            $table->float('ArrearsSalary')->default(0);
            //deduction
             $table->float('TDS')->default(0);
            $table->float('OtherDeduction')->default(0);
            $table->float('Loan')->default(0);
            $table->float('MobileDeduction')->default(0);
            $table->float('SalaryAdvance')->default(0);
            $table->float('LatePresent')->default(0);
            $table->float('SecurityDeposite')->default(0);
            //other
            $table->float('PFControl')->default(0);
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
        Schema::dropIfExists('monthly_veriable_payments');
    }
}
