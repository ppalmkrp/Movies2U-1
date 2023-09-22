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
        // ตารางระหว่าง 'employee_types' และ 'employees'
        Schema::create('employee_type_employee', function (Blueprint $table) {
            $table->id();
            $table->string('emp_type_id');
            $table->string('emp_id');
            $table->timestamps();

            // เพิ่ม foreign key สำหรับตารางระหว่าง
            $table->foreign('emp_type_id')->references('emp_type_id')->on('employee_types');
            $table->foreign('emp_id')->references('emp_id')->on('employees');
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
