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
        Schema::create('livres', function (Blueprint $table) {
            $table->id(); 

            // Informations principales
            $table->string('titre', 255)->index(); 
            $table->string('auteur', 255)->index(); 
            $table->date('date')->nullable(); 
            $table->string('edition', 255)->nullable(); 
            $table->text('description'); 
            $table->string('isbn', 20)->unique(); 
            // Image : chemin du fichier (ex: storage/livres/images/)
            $table->string('image', 255)->nullable();
            // Document : PDF, Word… (ex: storage/livres/documents/)
            $table->string('document', 255)->nullable(); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('livres');
    }
};