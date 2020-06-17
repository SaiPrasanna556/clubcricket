<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlayerHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('player_histories', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('player_id');
            $table->integer('matches')->default(0);
            $table->integer('runs')->default(0);
            $table->integer('half_centuries')->default(0);
            $table->integer('centuries')->default(0);
            $table->decimal('average',5,2);
            $table->decimal('strike_rate',5,2);
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
        Schema::dropIfExists('player_histories');
    }
}
