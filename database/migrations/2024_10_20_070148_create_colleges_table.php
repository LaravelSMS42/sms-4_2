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
        Schema::create('colleges', function (Blueprint $table) {
            $table->id();
            $table->string('college_name')->nullable('false');
            $table->string('college_acronym')->nullable('false');
            $table->string('college_email')->nullable('false')->unique();
            $table->unsignedBigInteger('building_id')->nullable('false');
            $table->boolean('archived')->default(0)->comment('1=archived,0=visible');
            $table->timestamps();

            //$table->foreign('building_id')->references('building_id')->on('buildings');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('colleges');
    }
};
