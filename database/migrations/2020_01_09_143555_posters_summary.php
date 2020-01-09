<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PostersSummary extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posters_summary', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('poster_id');
            $table->integer('likes_count');
            $table->integer('dislikes_count');
            $table->integer('rating');
            $table->integer('views_count');
            $table->integer('comments_count');
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
        Schema::dropIfExists('posters_summary');

    }
}
