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
        Schema::create('buildings', function (Blueprint $table) {
            $table->unsignedBigInteger('building_id');
            $table->string('building_name')->nullable(false)->unique();
            $table->string('building_description')->nullable(false)->unique();
            $table->boolean('archived')->default(0)->comment('1=visible,0=archived');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('buildings');
    }
};
