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
        Schema::create('departments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('college_id')->nullable('false');
            $table->string('department_name')->nullable('false');
            $table->string('department_email')->nullable('false');
            $table->unsignedBigInteger('building_id')->nullable('false');
            $table->boolean('archived')->default(0)->comment('1=archived,0=visible');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('departments');
    }
};
