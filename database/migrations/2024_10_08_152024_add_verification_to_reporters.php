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
        Schema::table('reporters', function (Blueprint $table) {
            $table->string("verification_code", 8)->nullable()->after("lastLogin");

            $table->dateTime("verification_expires_at")->nullable()->after("verification_code");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('reporters', function (Blueprint $table) {
            //
        });
    }
};