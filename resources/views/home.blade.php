<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-blue-50 to-indigo-100 py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full">
            
            {{-- Card principale --}}
            <div class="bg-white rounded-lg shadow-2xl overflow-hidden">
                
                {{-- Header avec dégradé --}}
                <div class="bg-gradient-to-r from-blue-600 to-indigo-600 p-8 text-center">
                    <div class="text-6xl mb-4">✓</div>
                    <h1 class="text-3xl font-bold text-white mb-2">Task Manager</h1>
                    <p class="text-blue-100">Gérez vos tâches efficacement</p>
                </div>

                {{-- Contenu --}}
                <div class="p-8">
                    <p class="text-gray-600 text-center mb-8">
                        Organisez votre quotidien avec notre gestionnaire de tâches simple et intuitif.
                    </p>

                    {{-- Boutons --}}
                    <div class="space-y-4">
                        {{-- Bouton Connexion --}}
                        <a href="{{ route('login') }}" 
                           class="block w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-lg text-center transition duration-200 shadow-md hover:shadow-lg">
                            Se connecter
                        </a>

                        {{-- Bouton Inscription --}}
                        <a href="{{ route('register') }}" 
                           class="block w-full bg-white hover:bg-gray-50 text-blue-600 font-bold py-3 px-6 rounded-lg text-center border-2 border-blue-600 transition duration-200">
                            Créer un compte
                        </a>
                    </div>

                    {{-- Fonctionnalités --}}
                    <div class="mt-8 pt-8 border-t border-gray-200">
                        <h3 class="text-sm font-semibold text-gray-700 mb-4 text-center">Fonctionnalités</h3>
                        <div class="space-y-3">
                            <div class="flex items-center text-sm text-gray-600">
                                <svg class="w-5 h-5 text-green-500 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span>Créer et gérer vos tâches</span>
                            </div>
                            <div class="flex items-center text-sm text-gray-600">
                                <svg class="w-5 h-5 text-green-500 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span>Filtrer et rechercher facilement</span>
                            </div>
                            <div class="flex items-center text-sm text-gray-600">
                                <svg class="w-5 h-5 text-green-500 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span>Suivre vos progrès</span>
                            </div>
                            <div class="flex items-center text-sm text-gray-600">
                                <svg class="w-5 h-5 text-green-500 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span>100% sécurisé et privé</span>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Footer --}}
                <div class="bg-gray-50 px-8 py-4 text-center text-xs text-gray-500">
                    Développé avec Laravel 12 & Tailwind CSS
                </div>
            </div>

        </div>
    </div>
</x-guest-layout>