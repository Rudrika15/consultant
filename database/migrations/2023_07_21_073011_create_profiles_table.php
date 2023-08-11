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
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->integer('userId');
            $table->string('about');
            $table->string('contactNo2');
            $table->string('skypeId');
            $table->string('webSite');
            $table->string('map');
            $table->string('address');
            $table->string('state');
            $table->string('city');
            $table->string('pincode');
            $table->string('photo');
            $table->string('company')->nullable(true);
            $table->string('categoryId')->nullable(true);;
            $table->string('packageId')->nullable(true);;
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
