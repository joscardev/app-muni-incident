<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Editar usuario') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">

                <form action="{{ route('usuarios.update', $users->id) }}" method="POST" class="space-y-6 p-6">
                    @csrf
                    @method('PUT')
                    <div class="grid grid-cols-1 gap-x-4 gap-y-6 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">

                        <div class="col-span-1 sm:col-span-2 lg:col-span-1 xl:col-span-1">
                            <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-200">
                                Nombre completo
                            </label>
                            <input id="name" name="name" type="text" value="{{ old('name', $users->name) }}"
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md dark:border-gray-600 dark:bg-gray-700 dark:text-white"
                                required>
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />

                        </div>

                        <div class="col-span-1 sm:col-span-2 lg:col-span-1 xl:col-span-1">
                            <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-200">
                                Correo electrónico
                            </label>
                            <input id="email" name="email" type="email"
                                value="{{ old('email', $users->email) }}"
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md dark:border-gray-600 dark:bg-gray-700 dark:text-white"
                                required>
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <div class="col-span-1 sm:col-span-2 lg:col-span-1 xl:col-span-1">
                            <label for="password" class="block text-sm font-medium text-gray-700 dark:text-gray-200">
                                Contraseña
                            </label>
                            <input id="password" name="password" type="password"
                                value="{{ old('password', $users->password) }}"
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
                                value="{{ old('password_confirmation', $users->password) }}"
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md dark:border-gray-600 dark:bg-gray-700 dark:text-white"
                                required>
                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
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
