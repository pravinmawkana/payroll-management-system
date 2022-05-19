<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBankmasterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bankmaster', function (Blueprint $table) {
            $table->id('bankId');
            $table->string('bankName',50);
            $table->string('accountNumber',50);
            $table->string('bsrCode',20);
            $table->string('micrCode',20);
            $table->string('ifscCode',20);
            $table->string('address');
            $table->string('contactPersonName',50);
            $table->string('contactPersonNo',20);
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
        Schema::dropIfExists('bankmaster');
    }
}
