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
        Schema::create('programs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('college_id')->nullable('false');
            $table->unsignedBigInteger('department_id')->nullable('false');
            $table->string('program_name')->nullable('false');
            $table->string('program_code')->nullable('false');
            $table->boolean('archived')->default(0)->comment('1=archived,0=visible');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('programs');
    }
};
