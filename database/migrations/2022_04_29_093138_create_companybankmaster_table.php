<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanybankmasterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companybankmaster', function (Blueprint $table) {
             $table->id('bankId');
            $table->string('bankName',50);
            $table->string('accountNumber',50);
            $table->string('bsrCode',20)->nullable();
            $table->string('micrCode',20)->nullable();
            $table->string('ifscCode',20);
            $table->string('address')->nullable();
            $table->string('contactPersonName',50)->nullable();
            $table->string('contactPersonNo',20)->nullable();
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
        Schema::dropIfExists('companybankmaster');
    }
}
