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
        Schema::create('reporters', function (Blueprint $table) {
            $table->id();
            $table->string('lastname')->unique()->nullable();
            $table->string("firstname")->nullable();
            $table->string("username")->nullable()->unique();
            $table->string("email")->nullable()->unique();
            $table->string("profile")->nullable();
            $table->string("phone")->nullable();
            $table->string("address")->nullable();
            $table->string("password");
            $table->string("identifiant")->unique();
            $table->string("status")->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reporters');
    }
};
