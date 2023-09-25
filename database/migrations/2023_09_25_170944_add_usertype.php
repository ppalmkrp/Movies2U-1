<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   // database/migrations/{timestamp}_add_user_type_to_users_table.php

public function up()
{
    Schema::table('users', function (Blueprint $table) {
        $table->unsignedBigInteger('user_type_id')->nullable()->default(null);
        $table->foreign('user_type_id')->references('id')->on('user_types');
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
