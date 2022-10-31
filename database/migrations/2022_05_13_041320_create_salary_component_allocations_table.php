<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalaryComponentAllocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salary_component_allocations', function (Blueprint $table) {
            $table->id('comptId');
            $table->string('calcCode',50);
            $table->string('calcType',50);
            $table->string('comptName',50);
            $table->string('comptDesc',50);
            $table->unsignedBigInteger('cTypeId');
            $table->foreign('cTypeId')->references('cTypeId')->on('component_type_masters');
            $table->string('comptFormula',50);
            $table->boolean('calcAttendance');
            $table->boolean('consdWeekOff');
            $table->boolean('consdPubHoliday');
            $table->boolean('roundOff');
            $table->boolean('printIfZero');
            $table->unsignedBigInteger('printOrder');
            $table->string('tdsHead',50);
            $table->unsignedBigInteger('calcOrder');
            $table->float('examptionLimit');
            $table->unsignedBigInteger('companyId');
            $table->foreign('companyId')->references('companyId')->on('companydetails');
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
        Schema::dropIfExists('salary_component_allocations');
    }
}
