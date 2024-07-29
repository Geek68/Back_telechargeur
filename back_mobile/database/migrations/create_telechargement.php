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
        Schema::create('telechargements', function (Blueprint $table) {
            $table->id();
            $table->string("nom");
            $table->string("url");
            $table->string("type");
            $table->string("status");
            $table->string("emplacement");
            $table->string("mimetype");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('telechargements');
    }
};
