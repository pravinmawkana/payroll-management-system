<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblmainmenuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblmainmenu', function (Blueprint $table) {
            $table->id('mainMenuId');
            $table->string('mmName',25);
            $table->string('mmIcon');
            $table->string('mmPageName');
            $table->tinyInteger('srNo');
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
        Schema::dropIfExists('tblmainmenu');
    }
}
