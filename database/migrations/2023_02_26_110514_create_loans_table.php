<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loans', function (Blueprint $table) {
            $table->id('loanId');
             $table->unsignedBigInteger('loanTypeId');
            $table->foreign('loanTypeId')->references('loanTypeId')->on('loan_types');
            $table->unsignedBigInteger('empId');
            $table->foreign('empId')->references('empId')->on('employeemaster');
            $table->unsignedBigInteger('companyId');
            $table->foreign('companyId')->references('companyId')->on('companydetails');
            $table->date('loan_date')->nullable();
            $table->integer('amount_given');
            $table->float('installment');
            $table->integer('start_recoery_month');
            $table->integer('start_recoery_year');
            $table->integer('hold_month');
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
        Schema::dropIfExists('loans');
    }
}
