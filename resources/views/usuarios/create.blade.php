<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Crear usuario') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">

                <form action="{{ route('usuarios.store') }}" method="POST" class="space-y-6 p-6">
                    @csrf
                    <div class="grid grid-cols-1 gap-x-4 gap-y-6 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">

                        <div class="col-span-1 sm:col-span-2 lg:col-span-1 xl:col-span-1">
                            <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-200">
                                Nombre completo
                            </label>
                            <input id="name" name="name" type="text"
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md dark:border-gray-600 dark:bg-gray-700 dark:text-white"
                                required>
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />

                        </div>

                        <div class="col-span-1 sm:col-span-2 lg:col-span-1 xl:col-span-1">
                            <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-200">
                                Correo electrónico
                            </label>
                            <input id="email" name="email" type="email"
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md dark:border-gray-600 dark:bg-gray-700 dark:text-white"
                                required>
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <div class="col-span-1 sm:col-span-2 lg:col-span-1 xl:col-span-1">
                            <label for="password" class="block text-sm font-medium text-gray-700 dark:text-gray-200">
                                Contraseña
                            </label>
                            <input id="password" name="password" type="password"
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md dark:border-gray-600 dark:bg-gray-700 dark:text-white"
                                required>
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />

                        </div>
                        <div class="col-span-1 sm:col-span-2 lg:col-span-1 xl:col-span-1">
                            <label for="password_confirmation"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-200">
                                Confirmar contraseña
                            </label>
                            <input id="password_confirmation" name="password_confirmation" type="password"
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md dark:border-gray-600 dark:bg-gray-700 dark:text-white"
                                required>
                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                        </div>
                        <div class="mb-4">
                            <label for="role" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Rol</label>
                            <select name="role" id="role" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-white" required>
                                @foreach ($roles as $role)
                                    <option value="{{ $role->name }}">{{ $role->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        
                    </div>

                    <button type="submit"
                        class="w-full px-4 py-2 text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Crear usuario
                    </button>
                    <a href="{{ route('usuarios.index') }}" class="block mt-4 text-sm text-gray-700 dark:text-gray-200">
                        Cancelar
                    </a>
                </form>




            </div>
        </div>
    </div>
</x-app-layout>
