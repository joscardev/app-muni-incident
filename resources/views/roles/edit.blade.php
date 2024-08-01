<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Crear usuario') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">

                <form action="{{ route('roles.update', $role->id) }}" method="POST"
                    class="space-y-6 p-6 bg-white shadow-md rounded-lg dark:bg-gray-800">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Nombre
                            del Rol:</label>
                        <input type="text" name="name" id="name" value="{{ $role->name }}"
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:border-gray-600 dark:bg-gray-700 dark:text-white"
                            required>
                    </div>

                    <div class="mb-4">
                        <label for="permissions"
                            class="block text-sm font-medium text-gray-700 dark:text-gray-200">Permisos:</label>
                        @foreach ($permissions as $permission)
                            <div class="flex items-center mt-2">
                                <input type="checkbox" name="permissions[]" id="permission-{{ $permission->id }}"
                                    value="{{ $permission->id }}"
                                    {{ $role->permissions->contains($permission->id) ? 'checked' : '' }}
                                    class="h-4 w-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500 dark:bg-gray-700 dark:border-gray-600">
                                <label for="permission-{{ $permission->id }}"
                                    class="ml-2 block text-sm text-gray-900 dark:text-gray-200">{{ $permission->name }}</label>
                            </div>
                        @endforeach
                    </div>

                    <div class="mt-6">
                        <button type="submit"
                            class="w-full bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">Actualizar
                            Rol</button>
                    </div>
                </form>





            </div>
        </div>
    </div>
</x-app-layout>
