<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Crear rol') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">

                <form method="POST" action="{{ route('roles.store') }}" class="space-y-6 p-6 bg-white shadow-md rounded-lg dark:bg-gray-800">
                    @csrf
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Role Name:</label>
                        <input type="text" name="name" id="name" required
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md dark:border-gray-600 dark:bg-gray-700 dark:text-white">
                    </div>
                    
                    <div class="mb-4">
                        <label for="permissions" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Permisos:</label>
                        @foreach($permissions as $permission)
                            <div class="flex items-center mt-2">
                                <input type="checkbox" name="permissions[]" id="permission-{{ $permission->id }}" value="{{ $permission->id }}"
                                    {{ isset($role) && $role->permissions->contains($permission->id) ? 'checked' : '' }} class="h-4 w-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500 dark:bg-gray-700 dark:border-gray-600">
                                <label for="permission-{{ $permission->id }}" class="ml-2 block text-sm text-gray-900 dark:text-gray-200">{{ $permission->name }}</label>
                            </div>
                        @endforeach
                    </div>
                                
                    <button type="submit"
                        class="w-full px-4 py-2 text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Create Role
                    </button>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>