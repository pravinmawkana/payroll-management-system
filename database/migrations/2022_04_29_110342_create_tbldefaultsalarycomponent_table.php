<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbldefaultsalarycomponentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbldefaultsalarycomponent', function (Blueprint $table) {
            $table->id('comptId');
            $table->string('comptCode',10);
            $table->string('comptName',50);
            $table->string('comptDesc',50);
            $table->string('comptType',50);
            $table->string('comptFormula',50);
            $table->boolean('calcAttendance');
            $table->boolean('consdWeekOff');
            $table->boolean('consdPubHoliday');
            $table->boolean('roundOff');
            $table->boolean('printIfZero');
            $table->unsignedBigInteger('printOrder');
            $table->string('tdsHead',50);
            $table->unsignedBigInteger('calcOrder');
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
        Schema::dropIfExists('tbldefaultsalarycomponent');
    }
}
