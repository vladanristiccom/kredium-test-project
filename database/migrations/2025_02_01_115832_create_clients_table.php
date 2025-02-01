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
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->nullable()->unique();
            $table->string('phone')->nullable();

            $table->unsignedBigInteger('cash_loan_id')->nullable();
            $table->foreign('cash_loan_id')
                  ->references('id')
                  ->on('cash_loans');

            $table->unsignedBigInteger('home_loan_id')->nullable();
            $table->foreign('home_loan_id')
                  ->references('id')
                  ->on('home_loans');

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
