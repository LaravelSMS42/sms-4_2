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
        Schema::create('assignment_submissions', function (Blueprint $table) {
            $table->id();
            $table->string('answer')->nullable('true');
            $table->float('points')->nullable('true');
            $table->string('attachment_path')->nullable('true');
            $table->unsignedBigInteger('task_id')->nullable('false');
            $table->unsignedBigInteger('user_id')->nullable('true');
            $table->boolean('is_late')->default(0)->comment('1=late,0=not late');
            $table->boolean('is_graded')->default(0)->comment('1=graded,0=not graded');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assignment_submissions');
    }
};
