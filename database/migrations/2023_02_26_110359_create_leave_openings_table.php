<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeaveOpeningsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leave_openings', function (Blueprint $table) {
            $table->id('leaveOpeningId');
            $table->unsignedBigInteger('leaveYearId');
            $table->foreign('leaveYearId')->references('leaveYearId')->on('leave_years');
            $table->unsignedBigInteger('empId');
            $table->foreign('empId')->references('empId')->on('employeemaster');
            $table->unsignedBigInteger('companyId');
            $table->foreign('companyId')->references('companyId')->on('companydetails');
            $table->float('pl_opening');
            $table->float('pl_curryear');
            $table->boolean('pl_prorata');
            $table->float('sl_opening');
            $table->float('sl_curryear');
            $table->boolean('sl_prorata');
            $table->float('cl_opening');
            $table->float('cl_curryear');
            $table->boolean('cl_prorata');
            $table->float('co_opening');
            $table->float('co_curryear');
            $table->boolean('co_prorata');
            $table->float('ol1_opening');
            $table->float('ol1_curryear');
            $table->boolean('ol1_prorata');
            $table->float('ol2_opening');
            $table->float('ol2_curryear');
            $table->boolean('ol2_prorata');
            $table->float('ol3_opening');
            $table->float('ol3_curryear');
            $table->boolean('ol3_prorata');
            $table->float('ol4_opening');
            $table->float('ol4_curryear');
            $table->boolean('ol4_prorata');
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
        Schema::dropIfExists('leave_openings');
    }
}
