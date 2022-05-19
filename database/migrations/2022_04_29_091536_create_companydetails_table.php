<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanydetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companydetails', function (Blueprint $table) {
            $table->id('companyId');
            $table->string('companyCode',10);
            $table->string('companyName',100);
            $table->string('address1',100)->nullable();
            $table->string('address2',100)->nullable();
            $table->string('city',50)->nullable();
            $table->string('state',50)->nullable();
            $table->string('pinCode',10)->nullable();
            $table->string('country',50)->nullable();
            $table->string('panNo',10)->nullable();
            $table->string('contactNo1',20)->nullable();
            $table->string('contactNo2',20)->nullable();
            $table->string('emailId')->nullable();
            $table->string('website')->nullable();
            $table->string('pfRegistrationNo',50)->nullable();
            $table->string('esicRegistrationNo',50)->nullable();
            $table->string('localOffice',50)->nullable();
            $table->string('reginalOffice',50)->nullable();
            $table->string('subAccountOffice',50)->nullable();
            $table->string('principalEmployeer',100)->nullable();
            $table->string('principalDesignation',100)->nullable();
            $table->string('pfGroup',50)->nullable();
            $table->boolean('status')->default(1)->nullable();
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
        Schema::dropIfExists('companydetails');
    }
}
