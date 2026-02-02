<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Affiche la liste de toutes les tâches de l'utilisateur connecté
     */
    public function index()
    {
        // Récupère toutes les tâches de l'utilisateur connecté
        // orderBy('created_at', 'desc') : trie par date (plus récent en premier)
        $tasks = auth()->user()->tasks()->orderBy('created_at', 'desc')->get();

        // Retourne la vue avec les tâches
        return view('tasks.index', compact('tasks'));
    }

    /**
     * Affiche le formulaire de création d'une nouvelle tâche
     */
    public function create()
    {
        return view('tasks.create');
    }

    /**
     * Enregistre une nouvelle tâche dans la base de données
     */
    public function store(Request $request)
    {
        // Validation des données du formulaire
        $validated = $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable',
        ]);

        // Crée une nouvelle tâche pour l'utilisateur connecté
        auth()->user()->tasks()->create($validated);

        // Redirige vers la liste avec un message de succès
        return redirect()->route('tasks.index')
            ->with('success', 'Tâche créée avec succès !');
    }

    /**
     * Affiche une tâche spécifique
     */
    public function show(Task $task)
    {
        // Vérifie que la tâche appartient bien à l'utilisateur connecté
        if ($task->user_id !== auth()->id()) {
            abort(403, 'Accès non autorisé');
        }

        return view('tasks.show', compact('task'));
    }

    /**
     * Affiche le formulaire de modification d'une tâche
     */
    public function edit(Task $task)
    {
        // Vérifie que la tâche appartient bien à l'utilisateur connecté
        if ($task->user_id !== auth()->id()) {
            abort(403, 'Accès non autorisé');
        }

        return view('tasks.edit', compact('task'));
    }

    /**
     * Met à jour une tâche existante
     */
    public function update(Request $request, Task $task)
    {
        // Vérifie que la tâche appartient bien à l'utilisateur connecté
        if ($task->user_id !== auth()->id()) {
            abort(403, 'Accès non autorisé');
        }

        // Validation des données
        $validated = $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable',
            'is_completed' => 'boolean',
        ]);

        // Met à jour la tâche
        $task->update($validated);

        // Redirige vers la liste avec un message de succès
        return redirect()->route('tasks.index')
            ->with('success', 'Tâche mise à jour avec succès !');
    }

    /**
     * Supprime une tâche
     */
    public function destroy(Task $task)
    {
        // Vérifie que la tâche appartient bien à l'utilisateur connecté
        if ($task->user_id !== auth()->id()) {
            abort(403, 'Accès non autorisé');
        }

        // Supprime la tâche
        $task->delete();

        // Redirige vers la liste avec un message de succès
        return redirect()->route('tasks.index')
            ->with('success', 'Tâche supprimée avec succès !');
    }
}