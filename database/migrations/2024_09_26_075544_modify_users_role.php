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
        Schema::table('users', function (Blueprint $table) {
            // Change the 'role' column to allow only 'user' and 'admin'
            $table->enum('role', ['user', 'admin'])->change();
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Revert the column to the previous state
            $table->enum('role', ['user', 'user', 'admin'])->change();
        });
    }

};
