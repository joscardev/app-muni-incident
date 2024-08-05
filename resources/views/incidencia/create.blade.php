<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Crear incidencia') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <form method="POST" action="{{ route('incidencia.store') }}"
                    class="space-y-6 p-6 bg-white shadow-md rounded-lg dark:bg-gray-800">
                    @csrf
                    <div>
                        <label for="titulo"
                            class="block text-sm font-medium text-gray-700 dark:text-gray-200">Titulo:</label>
                        <input type="text" name="titulo" id="titulo" required
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md dark:border-gray-600 dark:bg-gray-700 dark:text-white">
                    </div>
                    <div>
                        <label for="descripcion"
                            class="block text-sm font-medium text-gray-700 dark:text-gray-200">Descripcion:</label>
                        <textarea name="descripcion" id="descripcion" required
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md dark:border-gray-600 dark:bg-gray-700 dark:text-white h-48"></textarea>
                    </div>
                    <div>
                        <label for="estado_id"
                            class="block text-sm font-medium text-gray-700 dark:text-gray-200">Estado</label>
                        <select name="estado_id" id="estado_id"
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                            required>
                            @foreach ($estados as $estado)
                            <option value="{{ $estado->id }}">{{ $estado->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label for="prioridad_id"
                            class="block text-sm font-medium text-gray-700 dark:text-gray-200">Prioridad</label>
                        <select name="prioridad_id" id="prioridad_id"
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                            required>
                            @foreach ($prioridades as $prioridad)
                                <option value="{{ $prioridad->id }}">{{ $prioridad->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label for="categoria_id"
                            class="block text-sm font-medium text-gray-700 dark:text-gray-200">Categoria</label>
                        <select name="categoria_id" id="categoria_id"
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                            required>
                            @foreach ($categorias as $categoria)
                                <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label for="asignado_a"
                            class="block text-sm font-medium text-gray-700 dark:text-gray-200">Usuario Asignado</label>
                        <select name="asignado_a" id="asignado_a"
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                            required>
                            @foreach ($users as $usuario)
                                <option value="{{ $usuario->id }}">{{ $usuario->name }}</option>
                            @endforeach
                        </select>
                    </div>
            </div>

            <button type="submit"
                class="w-full px-4 py-2 text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Create incidencia
            </button>
            </form>

        </div>
    </div>
    </div>
</x-app-layout>
