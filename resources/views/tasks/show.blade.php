<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Détails de la tâche') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                    {{-- Statut --}}
                    <div class="mb-4">
                        @if($task->is_completed)
                            <span class="inline-block bg-green-100 text-green-800 text-sm font-semibold px-3 py-1 rounded-full">
                                ✓ Terminée
                            </span>
                        @else
                            <span class="inline-block bg-yellow-100 text-yellow-800 text-sm font-semibold px-3 py-1 rounded-full">
                                ⏳ En cours
                            </span>
                        @endif
                    </div>

                    {{-- Titre --}}
                    <h3 class="text-2xl font-bold text-gray-800 mb-4">
                        {{ $task->title }}
                    </h3>

                    {{-- Description --}}
                    @if($task->description)
                        <div class="mb-6">
                            <h4 class="text-sm font-semibold text-gray-600 mb-2">Description :</h4>
                            <p class="text-gray-700 whitespace-pre-line">{{ $task->description }}</p>
                        </div>
                    @endif

                    {{-- Dates --}}
                    <div class="text-sm text-gray-500 mb-6">
                        <p>Créée le : {{ $task->created_at->format('d/m/Y à H:i') }}</p>
                        <p>Dernière modification : {{ $task->updated_at->format('d/m/Y à H:i') }}</p>
                    </div>

                    {{-- Boutons --}}
                    <div class="flex space-x-4">
                        <a href="{{ route('tasks.edit', $task) }}" 
                           class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Modifier
                        </a>

                        <form action="{{ route('tasks.destroy', $task) }}" method="POST" 
                              onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette tâche ?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" 
                                    class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                Supprimer
                            </button>
                        </form>

                        <a href="{{ route('tasks.index') }}" 
                           class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                            Retour à la liste
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>