<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWantAreaRecruitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('want_area_recruits', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('recruit_id');
            $table->string('area_cd');
            $table->string('pref_cd');
            $table->string('pref_name');
            $table->string('city_name');
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
        Schema::dropIfExists('want_area_recruits');
    }
}
