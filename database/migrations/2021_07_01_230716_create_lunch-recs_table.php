<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLunchRecsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lunch-recs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('shop_name', 20);
            $table->string('address', 50);
            $table->string('genre', 20);
            $table->tinyInteger('price');
            $table->string('comment', 255);
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
        Schema::dropIfExists('lunch-recs');
    }
}
