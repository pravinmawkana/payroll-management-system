<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblsubmenuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblsubmenu', function (Blueprint $table) {
            $table->id('subMenuId');
            $table->unsignedBigInteger('mainMenuId');
            $table->foreign('mainMenuId')->references('mainMenuId')->on('tblmainmenu');
            $table->string('subMenuName',50);
            $table->string('subMenuIcon');
            $table->string('subMenuPage');
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
        Schema::dropIfExists('tblsubmenu');
    }
}
