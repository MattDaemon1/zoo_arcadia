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
        Schema::create('images', function (Blueprint $table) {
            $table->id();  // Clé primaire auto-incrémentée
            $table->binary('image_data');  // Stocke les données binaires de l'image
            $table->string('nom_fichier');
            $table->string('type_mime');
            $table->unsignedInteger('taille');
            $table->string('alt')->nullable();
            $table->foreignId('habitat_id')->constrained('habitats')->onDelete('cascade');
            $table->timestamps();
        });

        // Indexation
        Schema::table('images', function (Blueprint $table) {
            $table->index('habitat_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('images');
    }
};
