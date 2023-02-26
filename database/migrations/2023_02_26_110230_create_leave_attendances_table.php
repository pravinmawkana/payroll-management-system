<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeaveAttendancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leave_attendances', function (Blueprint $table) {
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
            $table->float('pl_availed');
            $table->float('cl_availed');
            $table->float('sl_availed');
            $table->float('co_availed');
            $table->float('co_credit');
            $table->float('ot_hours');
            $table->float('late_marks');
            $table->float('l1_availed');
            $table->float('l2_availed');
            $table->float('l3_availed');
            $table->float('l4_availed');
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
        Schema::dropIfExists('leave_attendances');
    }
}
