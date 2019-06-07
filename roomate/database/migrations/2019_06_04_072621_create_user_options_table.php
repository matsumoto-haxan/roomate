<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_options', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id');
            $table->integer('want_condition'); //0:not, 1:yes
            $table->integer('sex'); //0:female, 1:male
            $table->date('birthday');
            $table->integer('job_id');
            $table->integer('lover_condition');//0:nothave, 1:have
            $table->integer('min_cost');
            $table->integer('max_cost');
            $table->string('living_area');
            $table->integer('have_room_cd'); //0:nothave, 1:have
            $table->integer('represent_cd'); //0:no, 1:yes
            $table->integer('income');
            $table->integer('cleanliness_self');
            $table->integer('cleanliness_score');
            $table->integer('alone_exp'); //0:no, 1:yes
            $table->integer('roomshare_exp');//0:no, 1:yes
            $table->integer('sharehouse_exp');//0:no, 1:yes
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
        Schema::dropIfExists('user_options');
    }
}
