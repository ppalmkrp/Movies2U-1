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
        Schema::create('movie_details', function (Blueprint $table) {
            $table->id();
            $table->string('movie_id');
            $table->string('emp_id');
            $table->string('emp_type_id');

            $table->foreign('movie_id')->references('movie_id')->on('movies');
            $table->foreign('emp_id')->references('emp_id')->on('employees');
            $table->foreign('emp_type_id')->references('emp_type_id')->on('employee_types');
            $table->timestamps();
            $table->softDeletes('deleted_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movie_details');
    }
};
