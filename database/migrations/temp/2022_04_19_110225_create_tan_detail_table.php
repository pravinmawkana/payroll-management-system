<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTanDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tan_detail', function (Blueprint $table) {
            $table->id('tanId');
            $table->string('tanNo',15);
            $table->string('tanRegisterAt',25);
            $table->string('tdsCircle',25);
            $table->string('decuctorType',25);
            $table->string('address1',100);
            $table->string('address2',100);
            $table->string('address3',100);
            $table->string('city',25);
            $table->string('pinCode',10);
            $table->string('state',50);
            $table->string('emailId1');
            $table->string('emailId2');
            $table->string('contact1',20);
            $table->string('contact2',20);
            $table->string('resonsiblePersonName',100);
            $table->string('resonsiblePersonPAN',10);
            $table->string('resonsiblePersonDesignation',50);
            $table->string('resonsiblePersonFName',100);
            $table->string('resonsiblePersonMobile',20);
            $table->string('resonsiblePersonContactNo1',20);
            $table->string('resonsiblePersonContactNo2',20);
            $table->string('resonsiblePersonemailId1');
            $table->string('resonsiblePersonemailId2');
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
        Schema::dropIfExists('tan_detail');
    }
}
