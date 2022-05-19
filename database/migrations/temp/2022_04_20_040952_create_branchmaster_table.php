<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBranchmasterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('branchmaster', function (Blueprint $table) {
            $table->id('branchId');
            $table->string('branchCode',20);
            $table->string('branchName',30);
            $table->string('address');
            $table->string('tanNo',20);            
            $table->boolean('isPTApplicable');
            $table->string('ptRegNo',20);
            $table->string('ptLocalOfiice',50);
            $table->string('days',2);            
            $table->unsignedBigInteger('slabId')->references('slabId')->on('slabmaster');
            $table->foreign('slabId')->references('slabId')->on('slabmaster');
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
        Schema::dropIfExists('branchmaster');
    }
}
