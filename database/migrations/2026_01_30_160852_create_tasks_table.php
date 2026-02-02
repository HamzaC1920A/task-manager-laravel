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
        Schema::create('tasks', function (Blueprint $table) {
            /// ID auto-incrémenté
            $table->id();

            // Clé étrangère vers la table users
            $table->foreignId('user_id')
                ->constrained()
                ->onDelete('cascade');

            // Titre de la tâche (obligatoire, max 255 caractères)
            $table->string('title');

            // Description de la tâche (optionnelle, texte long)
            $table->text('description')->nullable();

            // Statut : terminée ou non (par défaut : false)
            $table->boolean('is_completed')->default(false);

            // Date de création et de mise à jour automatiques
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
