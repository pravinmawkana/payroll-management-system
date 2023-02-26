<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeaveSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leave_settings', function (Blueprint $table) {
            $table->id('leaveSettingId');
            $table->unsignedBigInteger('gradeId');
            $table->foreign('gradeId')->references('gradeId')->on('grademaster');
            $table->unsignedBigInteger('companyId');
            $table->foreign('companyId')->references('companyId')->on('companydetails');
            $table->boolean('pl_cf');
            $table->boolean('pl_ae');
            $table->float('pl_cfl');
            $table->float('pl_ycredit');
            $table->boolean('pl_prorata');
            $table->boolean('sl_cf');
            $table->boolean('sl_ae');
            $table->float('sl_cfl');
            $table->float('sl_ycredit');
            $table->boolean('sl_prorata');
            $table->boolean('cl_cf');
            $table->boolean('cl_ae');
            $table->float('cl_cfl');
            $table->float('cl_ycrsedit');
            $table->boolean('cl_prorata');
            $table->boolean('co_cf');
            $table->boolean('co_ae');
            $table->float('co_cfl');
            $table->float('co_ycredit');
            $table->boolean('co_prorata');
            $table->boolean('ol1_cf');
            $table->boolean('ol1_ae');
            $table->float('ol1_cfl');
            $table->float('ol1_ycredit');
            $table->boolean('ol1_prorata');
            $table->boolean('ol2_cf');
            $table->boolean('ol2_ae');
            $table->float('ol2_cfl');
            $table->float('ol2_ycredit');
            $table->boolean('ol2_prorata');
            $table->boolean('ol3_cf');
            $table->boolean('ol3_ae');
            $table->float('ol3_cfl');
            $table->float('ol3_ycredit');
            $table->boolean('ol3_prorata');
            $table->boolean('ol4_cf');
            $table->boolean('ol4_ae');
            $table->float('ol4_cfl');
            $table->float('ol4_ycredit');
            $table->boolean('ol4_prorata'            );
            $table->string('pl_avail_after',10);
            $table->string('sl_avail_after',10);
            $table->string('cl_avail_after',10);
            $table->string('co_avail_after',10);
            $table->string('ol1_avail_after',10);
            $table->string('ol2_avail_after',10);
            $table->string('ol3_avail_after',10);
            $table->string('ol4_avail_after',10);
            $table->string('pl_credit_days',10);
            $table->string('sl_credit_days',10);
            $table->string('cl_credit_days',10);
            $table->string('co_credit_days',10);
            $table->string('ol1_credit_days',10);
            $table->string('ol2_credit_days',10);
            $table->string('ol3_credit_days',10);
            $table->string('ol4_credit_days',10);
            $table->boolean('calculate_on');
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
        Schema::dropIfExists('leave_settings');
    }
}
