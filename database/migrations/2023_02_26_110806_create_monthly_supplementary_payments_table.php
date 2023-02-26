<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMonthlySupplementaryPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('monthly_supplementary_payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('empId');
            $table->foreign('empId')->references('empId')->on('employeemaster');
            $table->unsignedBigInteger('companyId');
            $table->foreign('companyId')->references('companyId')->on('companydetails');
            $table->unsignedBigInteger('sMonthId');
            $table->foreign('sMonthId')->references('sMonthId')->on('tbl_set_month');
            //Payment Details
            $table->string('paymentCode',50);
            $table->integer('payment_based_month');
            $table->integer('payment_based_year');
            $table->float('payment_days');
            $table->boolean('restrict_pension');
            $table->boolean('restrict_pt');
            $table->string('remarks');
             // Salary totals
            $table->float('GroossSalary')->default(0);
            $table->float('DeductionSalary')->default(0);
            $table->float('NetSalary')->default(0);
            // Earning Component -1
            $table->float('BasicSalary')->default(0);
            $table->float('HouseRentAllowance')->default(0);
            $table->float('ConveyanceAllowance')->default(0);
            $table->float('SpecialAllowance')->default(0);
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
            //Deduction Component -2
            $table->float('ProvidentFund')->default(0);
            $table->float('ESIC')->default(0);
            $table->float('TDS')->default(0);
            $table->float('OtherDeduction')->default(0);
            $table->float('Loan')->default(0);
            $table->float('MobileDeduction')->default(0);
            $table->float('SalaryAdvance')->default(0);
            $table->float('LatePresent')->default(0);
            $table->float('SecurityDeposite')->default(0);
            $table->float('ProfessionalTaxDeduction')->default(0);
            //Other Component -3
            $table->float('PFWages')->default(0);
            $table->float('PensionWage')->default(0);
            $table->float('EPSEmployer')->default(0);
            $table->float('EPFEmployer')->default(0);
            $table->float('PFAdminCharge')->default(0);
            $table->float('EDLIWage')->default(0);
            $table->float('EDLIAdmin')->default(0);
            $table->float('EDLIEmployer')->default(0);
            $table->float('ESICWage')->default(0);
            $table->float('ESICEmployer')->default(0);
            $table->float('MasterGross')->default(0);
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
        Schema::dropIfExists('monthly_supplementary_payments');
    }
}
