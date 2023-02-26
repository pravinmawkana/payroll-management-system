<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMonthCreditOpsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('month_credit_ops', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('leaveOpeningId');
            $table->foreign('leaveOpeningId')->references('leaveOpeningId')->on('leave_openings');
            $table->unsignedBigInteger('empId');
            $table->foreign('empId')->references('empId')->on('employeemaster');
            $table->unsignedBigInteger('companyId');
            $table->foreign('companyId')->references('companyId')->on('companydetails');
            $table->string('leave_setting_header');
            $table->float('jan');
            $table->float('feb');
            $table->float('mar');
            $table->float('apr');
            $table->float('may');
            $table->float('jun');
            $table->float('jul');
            $table->float('aug');
            $table->float('sep');
            $table->float('oct');
            $table->float('nov');
            $table->float('dec');
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
        Schema::dropIfExists('month_credit_ops');
    }
}
