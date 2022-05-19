
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
            $table->string('companyName',100);
            $table->string('address1',100);
            $table->string('address2',100);
            $table->string('city',50);
            $table->string('state',50);
            $table->string('pinCode',10);
            $table->string('country',50);
            $table->string('panNo',10);
            $table->string('contactNo1',20);
            $table->string('contactNo2',20);
            $table->string('emailId');
            $table->string('website');
            $table->string('companyCode',20);
            $table->string('pfRegistrationNo',50);
            $table->string('esicRegistrationNo',50);
            $table->string('localOffice',50);
            $table->string('reginalOffice',50);
            $table->string('subAccountOffice',50);
            $table->string('principalEmployeer',100);
            $table->string('principalDesignation',100);
            $table->string('pfGroup',50);
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
        Schema::dropIfExists('companydetails');
    }
}
