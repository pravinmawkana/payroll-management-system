<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeaveAttendanceClosingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leave_attendance_closings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('empId');
            $table->foreign('empId')->references('empId')->on('employeemaster');
            $table->unsignedBigInteger('companyId');
            $table->foreign('companyId')->references('companyId')->on('companydetails');
            $table->unsignedBigInteger('sMonthId');
            $table->foreign('sMonthId')->references('sMonthId')->on('tbl_set_month');
            $table->integer('days');
            $table->float('week_off');
            $table->float('paid_holidays');
            $table->float('total_present');
            $table->float('days_paid');
            $table->float('lwp');
            $table->float('absent');
            $table->float('joinleft_absent');
            $table->float('pl_opening');
            $table->float('pl_increment');
            $table->float('pl_availed');
            $table->float('pl_encash');
            $table->float('pl_closing');
            $table->float('cl_opening');
            $table->float('cl_increment');
            $table->float('cl_availed');
            $table->float('cl_closing');
            $table->float('sl_opening');
            $table->float('sl_increment');
            $table->float('sl_availed');
            $table->float('sl_closing');
            $table->float('co_opening');
            $table->float('co_increment');
            $table->float('co_availed');
            $table->float('co_closing');
            $table->float('leave1_opening');
            $table->float('leave1_increment');
            $table->float('leave1_availed');
            $table->float('leave1_closing');
            $table->float('leave2_opening');
            $table->float('leave2_increment');
            $table->float('leave2_availed');
            $table->float('leave2_closing');
            $table->float('leave3_opening');
            $table->float('leave3_increment');
            $table->float('leave3_availed');
            $table->float('leave3_closing');
            $table->float('leave4_opening');
            $table->float('leave4_increment');
            $table->float('leave4_availed');
            $table->float('leave4_closing');
            $table->float('co_credit');
            $table->float('ot_hours');
            $table->float('late_marks');
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
        Schema::dropIfExists('leave_attendance_closings');
    }
}
