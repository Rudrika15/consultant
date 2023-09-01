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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->string('r_payment_id');
            $table->integer('userId');
            $table->string('method')->nullable(true);
            $table->string('currency')->nullable(true);
            $table->string('user_email')->nullable(true);
            $table->string('package');
            $table->string('amount');
            $table->longText('json_response')->nullable(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
