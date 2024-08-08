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
            $table->id();
            $table->longBlob('image_data');
            $table->string('nom_fichier');
            $table->string('type_mime');
            $table->unsignedInteger('taille');
            $table->string('alt')->nullable();
            $table->foreignId('habitat_id')->constrained('habitats');
            $table->timestamps();
        });

        // Ajout de la relation many-to-many entre habitats et images
        Schema::create('habitats_images', function (Blueprint $table) {
            $table->id();
            $table->foreignId('habitat_id')->constrained('habitats')->onDelete('cascade');
            $table->foreignId('image_id')->constrained('images')->onDelete('cascade');
            $table->timestamps();
        });

        // Indexation
        Schema::table('images', function (Blueprint $table) {
            $table->index('habitat_id');
        });

        Schema::table('habitats_images', function (Blueprint $table) {
            $table->index(['habitat_id', 'image_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('habitats_images');
        Schema::dropIfExists('images');
    }
};