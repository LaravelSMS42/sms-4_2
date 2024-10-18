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
            $table->decimal('rate', 10, 2);
            $table->decimal('allowance', 10, 2);
            $table->date('date');
            $table->boolean('approved')->default(false); // Adding the approved column
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('payrolls');
    }
}

