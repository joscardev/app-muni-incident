<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Usuarios') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">

                <div class="flex justify-between items-center px-4 py-3 border-b">
                    <h3 class="text-gray-800 dark:text-gray-200">Listado de Usuarios</h3>
                    <a href="{{ route('usuarios.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Crear
                        Nuevo</a>
                </div>

                <div class="px-4 py-3">
                    <table class="w-full border-collapse">
                        <thead>
                            <tr>
                                <th class="px-4 py-2 text-left text-white dark:text-gray-200">ID</th>
                                <th class="px-4 py-2 text-left text-white dark:text-gray-200">Nombre</th>
                                <th class="px-4 py-2 text-left text-white dark:text-gray-200">Correo</th>
                                <th class="px-4 py-2 text-left text-white dark:text-gray-200">Rol</th>
                                <th class="px-4 py-2 text-left text-white dark:text-gray-200">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td class="border px-4 py-2 text-white dark:text-gray-200">{{ $user->id }}</td>
                                    <td class="border px-4 py-2 text-white dark:text-gray-200">{{ $user->name }}</td>
                                    <td class="border px-4 py-2 text-white dark:text-gray-200">{{ $user->email }}</td>
                                    <td class="border px-4 py-2 text-white dark:text-gray-200">
                                        @foreach ($user->roles as $role)
                                            <span class="bg-purple-500 text-white font-bold px-2 rounded">{{ $role->name }}</span>
                                        @endforeach
                                    </td>
                                    <td class="border px-4 py-2">
                                        <div class="flex justify-center">
                                            <a href="{{ route('usuarios.edit', $user->id) }}" class="bg-violet-500 dark:bg-violet-700 hover:bg-violet-600 dark:hover:bg-violet-800 text-white font-bold py-2 px-4 rounded mr-2">Edit</a>
                                            <button type="button" class="bg-pink-400 dark:bg-pink-600 hover:bg-pink-500 dark:hover:bg-pink-700 text-white font-bold py-2 px-4 rounded" onclick="confirmDelete('{{ $user->id }}')">Delete</button>
    
                                        </div>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>

        </div>
    </div>
</x-app-layout>

<script>
    // forma 1
    function confirmDelete(id) {
        alertify.confirm("¿Confirm delete record?",
            function() {
                let form = document.createElement('form');
                form.method = 'POST';
                form.action = '/usuarios/' + id;
                form.innerHTML = '@csrf @method('DELETE')';
                document.body.appendChild(form);
                form.submit();
                alertify.success('Ok');
            },
            function() {
                alertify.error('Cancel');
            });
    }

    // forma 2
    /* function confirmDelete(id) {
        alertify.confirm("¿Confirm delete record?", function (e) {
            if (e) {
                let form = document.createElement('form');
                form.method = 'POST';
                form.action = '/students/' + id;
                form.innerHTML = '@csrf @method('DELETE')';
                document.body.appendChild(form);
                form.submit();
            } else {
                alertify.error('Cancel');
                return false;
            }
        });
    } */
</script>
