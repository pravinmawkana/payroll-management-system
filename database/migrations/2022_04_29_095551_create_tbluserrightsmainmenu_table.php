<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbluserrightsmainmenuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbluserrightsmainmenu', function (Blueprint $table) {
            $table->id('urMainMenuId');
            $table->unsignedBigInteger('mainMenuId');
            $table->foreign('mainMenuId')->references('mainMenuId')->on('tblmainmenu');
            $table->unsignedBigInteger('empId');
            $table->foreign('empId')->references('empId')->on('employeemaster');
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
        Schema::dropIfExists('tbluserrightsmainmenu');
    }
}
