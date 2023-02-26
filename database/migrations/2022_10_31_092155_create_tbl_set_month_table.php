<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblSetMonthTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_set_month', function (Blueprint $table) {
            $table->id('sMonthId');
            $table->unsignedBigInteger('companyId');
            $table->foreign('companyId')->references('companyId')->on('companydetails');
            $table->date('startDate');
            $table->date('endDate');
            $table->integer('mDays');
            $table->integer('month');
            $table->integer('year');
            $table->string('monthDesc',20);
            $table->boolean('lockStatus')->default(0);
            $table->boolean('showInESS')->default(0);
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
        Schema::dropIfExists('tbl_set_month');
    }
}
