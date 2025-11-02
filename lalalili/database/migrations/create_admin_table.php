<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * Membuat tabel 'admin'.
     */
    public function up(): void
    {
        Schema::create('admin', function (Blueprint $table) {
            $table->id(); // Kolom ID (Primary Key)
            $table->string('username', 100)->unique();
            $table->string('password');
            
            $table->string('remember_token', 100)->nullable();
            
            // Kolom timestamps (created_at dan updated_at)
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     * Menghapus tabel 'admin'.
     */
    public function down(): void
    {
        Schema::dropIfExists('admin');
    }
};