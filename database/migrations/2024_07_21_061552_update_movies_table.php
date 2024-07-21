<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateMoviesTable extends Migration
{
    public function up()
    {
        Schema::table('movies', function (Blueprint $table) {
            $table->id('movie_id')->change();
            $table->string('title')->change();
            $table->date('release_date')->change();
            $table->string('duration')->change();
            $table->string('genre')->nullable()->change();
            $table->text('description')->change();
            $table->string('performer_name')->nullable()->change();
            $table->string('director')->change();
            $table->string('language')->change();
            $table->string('mpaa_rating')->change();
            $table->string('genres')->nullable()->change();
            $table->string('performers')->nullable()->change();
        });
    }

    public function down()
    {
        Schema::table('movies', function (Blueprint $table) {
            // Rollback changes if necessary
        });
    }
}
