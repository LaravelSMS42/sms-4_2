<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePayrollsTable extends Migration
{
    public function up()
    {
        Schema::create('payrolls', function (Blueprint $table) {
            $table->id();
            $table->string('employee_type');
            $table->string('transaction_type');
            $table->string('employee_id');
            $table->string('employee_name');
            $table->decimal('amount', 10, 2)->nullable(); // Add amount field
            $table->boolean('approved')->default(false); // Add approved field
            $table->string('status')->default('pending'); // Add status field with default value
            $table->string('unique_token', 36)->unique()->nullable(); // Add unique_token field
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('payrolls');
    }
}
