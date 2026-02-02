<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Mes Tâches') }}
            </h2>
            <a href="{{ route('tasks.create') }}" 
               class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Nouvelle Tâche
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            {{-- Message de succès --}}
            @if(session('success'))
                <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                    @if($tasks->isEmpty())
                        {{-- Aucune tâche --}}
                        <div class="text-center py-8">
                            <p class="text-gray-500 text-lg">Aucune tâche pour le moment.</p>
                            <a href="{{ route('tasks.create') }}" 
                               class="mt-4 inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Créer ma première tâche
                            </a>
                        </div>
                    @else
                        {{-- Liste des tâches --}}
                        <div class="space-y-4">
                            @foreach($tasks as $task)
                                <div class="border rounded-lg p-4 {{ $task->is_completed ? 'bg-gray-50' : 'bg-white' }}">
                                    <div class="flex items-center justify-between">
                                        <div class="flex-1">
                                            <h3 class="text-lg font-semibold {{ $task->is_completed ? 'line-through text-gray-500' : 'text-gray-800' }}">
                                                {{ $task->title }}
                                            </h3>
                                            @if($task->description)
                                                <p class="text-gray-600 mt-1">
                                                    {{ Str::limit($task->description, 100) }}
                                                </p>
                                            @endif
                                            <p class="text-sm text-gray-400 mt-2">
                                                Créée le {{ $task->created_at->format('d/m/Y à H:i') }}
                                            </p>
                                        </div>

                                        <div class="flex items-center space-x-2 ml-4">
                                            {{-- Bouton Marquer comme terminée/non terminée --}}
                                            <form action="{{ route('tasks.update', $task) }}" method="POST">
                                                @csrf
                                                @method('PATCH')
                                                <input type="hidden" name="title" value="{{ $task->title }}">
                                                <input type="hidden" name="description" value="{{ $task->description }}">
                                                <input type="hidden" name="is_completed" value="{{ $task->is_completed ? '0' : '1' }}">
                                                <button type="submit" 
                                                        class="px-3 py-1 rounded {{ $task->is_completed ? 'bg-yellow-500 hover:bg-yellow-600' : 'bg-green-500 hover:bg-green-600' }} text-white">
                                                    {{ $task->is_completed ? 'Réactiver' : 'Terminer' }}
                                                </button>
                                            </form>

                                            {{-- Bouton Voir --}}
                                            <a href="{{ route('tasks.show', $task) }}" 
                                               class="px-3 py-1 bg-blue-500 hover:bg-blue-600 text-white rounded">
                                                Voir
                                            </a>

                                            {{-- Bouton Modifier --}}
                                            <a href="{{ route('tasks.edit', $task) }}" 
                                               class="px-3 py-1 bg-gray-500 hover:bg-gray-600 text-white rounded">
                                                Modifier
                                            </a>

                                            {{-- Bouton Supprimer --}}
                                            <form action="{{ route('tasks.destroy', $task) }}" method="POST" 
                                                  onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette tâche ?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" 
                                                        class="px-3 py-1 bg-red-500 hover:bg-red-600 text-white rounded">
                                                    Supprimer
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
</x-app-layout>