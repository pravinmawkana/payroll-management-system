<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanytanmasterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companytanmaster', function (Blueprint $table) {
            $table->id('tanId');
            $table->string('tanNo',10);
            $table->string('tanRegisterAt',50);
            $table->string('tdsCircle',50)->nullable();
            $table->string('decuctorType',50);
            $table->string('address1',50)->nullable();
            $table->string('address2',50)->nullable();
            $table->string('address3',50)->nullable();
            $table->string('city',50)->nullable();
            $table->string('pinCode',10)->nullable();
            $table->string('state',50)->nullable();
            $table->string('emailId1')->nullable();
            $table->string('emailId2')->nullable();
            $table->string('contact1',20)->nullable();
            $table->string('contact2',20)->nullable();
            $table->string('resonsiblePersonName',100)->nullable();
            $table->string('resonsiblePersonPAN',10)->nullable();
            $table->string('resonsiblePersonDesignation',50)->nullable();
            $table->string('resonsiblePersonFName',100)->nullable();
            $table->string('resonsiblePersonMobile',20)->nullable();
            $table->string('resonsiblePersonContactNo1',20)->nullable();
            $table->string('resonsiblePersonContactNo2',20)->nullable();
            $table->string('resonsiblePersonemailId1')->nullable();
            $table->string('resonsiblePersonemailId2')->nullable();
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
        Schema::dropIfExists('companytanmaster');
    }
}
