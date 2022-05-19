<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComponentNameMastersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('component_name_masters', function (Blueprint $table) {
            $table->id('cNameId');
            $table->unsignedBigInteger('cTypeId');
            $table->foreign('cTypeId')->references('cTypeId')->on('component_type_masters');
            $table->string('cName',50);
            $table->string('calcCode',50);
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
        Schema::dropIfExists('component_name_masters');
    }
}
