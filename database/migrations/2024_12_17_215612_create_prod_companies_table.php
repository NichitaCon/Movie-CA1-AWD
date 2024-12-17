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
        Schema::create('prod_companies', function (Blueprint $table) {
            $table->id();
            // Foreign key to the movies table, deletes the production company if the movie is deleted
            $table->foreignId('movie_id')->constrained('movies')->onDelete('cascade');
            $table->string('name');
            $table->unsignedInteger('company_value')->default(0); // unsignedIntiger only allows positive values
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prod_companies');
    }
};
