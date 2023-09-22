<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('movies', function (Blueprint $table) {
            $table->string('movie_id')->primary();
            $table->string('movie_name');
            $table->integer('movie_time');
            $table->integer('movie_year_on_air');
            $table->string('critical_rate');
            $table->float('movie_score');
            $table->string('movie_type_id');

            $table->foreign('movie_type_id')->references('type_id')->on('movie_types');
            $table->foreign('critical_rate')->references('ctr_id')->on('critical_rates');
            $table->timestamps();
            $table->softDeletes('deleted_at');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('movies', function (Blueprint $table) {
            $table->dropSoftDeletes();
            });
    }
};
