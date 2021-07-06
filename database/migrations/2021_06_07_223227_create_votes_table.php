<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('votes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('contestant_id');
            $table->unsignedBigInteger('voter_id');
            $table->unsignedBigInteger('contest_id');
            $table->timestamps();

            $table->foreign('contestant_id')->references('id')->on('contestants');
            $table->foreign('voter_id')->references('id')->on('users');
            $table->foreign('contest_id')->references('id')->on('contests');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('votes');
    }
}

