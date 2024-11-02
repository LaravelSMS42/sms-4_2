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
        Schema::create('assignments', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable('false');
            $table->string('instructions')->nullable('false');
            $table->float('points')->nullable('false');
            $table->dateTime('deadline_date')->nullable('false');
            $table->dateTime('available_date')->nullable('false');
            $table->unsignedBigInteger('course_id')->nullable('false');
            $table->unsignedBigInteger('employee_id')->nullable('false');
            $table->boolean('allow_attachments')->default(0)->comment('1=archived,0=visible');
            $table->boolean('archived')->default(0)->comment('1=archived,0=visible');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assignments');
    }
};
