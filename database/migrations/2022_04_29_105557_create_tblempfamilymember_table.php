<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblempfamilymemberTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblempfamilymember', function (Blueprint $table) {
            $table->id('familyMemId');
            $table->unsignedBigInteger('empId');
            $table->foreign('empId')->references('empId')->on('employeemaster');
            $table->string('name',80);
            $table->date('dateOfBirth')->nullable();
            $table->string('address',150)->nullable();
            $table->string('relationship',50)->nullable();
            $table->string('mobile',20)->nullable();
            $table->string('email')->nullable();
            $table->boolean('gratutyNominee');
            $table->boolean('pfNominee');
            $table->boolean('pensionNominee');
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
        Schema::dropIfExists('tblempfamilymember');
    }
}
