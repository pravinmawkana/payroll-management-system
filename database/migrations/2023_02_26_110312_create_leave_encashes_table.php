<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeaveEncashesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leave_encashes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('leaveTypeId');
            $table->foreign('leaveTypeId')->references('leaveTypeId')->on('leave_types');
            $table->unsignedBigInteger('empId');
            $table->foreign('empId')->references('empId')->on('employeemaster');
            $table->unsignedBigInteger('companyId');
            $table->foreign('companyId')->references('companyId')->on('companydetails');
            $table->unsignedBigInteger('sMonthId');
            $table->foreign('sMonthId')->references('sMonthId')->on('tbl_set_month');
            $table->date('payment_date')->nullable();
            $table->double('days',7,2);
            $table->integer('last_drwn_month');
            $table->double('amount',18,0);
            $table->double('days',18,0);
            $table->boolean('make_supplementary');
            $table->boolean('full_n_final');
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
        Schema::dropIfExists('leave_encashes');
    }
}
