<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableDetailHero extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_detail_hero', function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->string("skil");
            $table->bigInteger("hero_id")->unsigned();
            $table->foreign("hero_id")->references('id')->on("table_super_hero")->onDelete('cascade');
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
        Schema::dropIfExists('table_detail_hero');
    }
}
