<x-app-layout>
    <x-slot name="header">
        Clientes
    </x-slot>
    <div class="flex flex-col items-center mt-4">
        <h1 class="mb-4 text-2xl font-semibold">Clientes</h1>
        <div class="border border-gray-200 shadow">
            <table>
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-2 text-xs text-gray-500">
                            Id
                        </th>
                        <th class="px-6 py-2 text-xs text-gray-500">
                            DNI
                        </th>
                        <th class="px-6 py-2 text-xs text-gray-500">
                            Nombre
                        </th>

                        <th class="px-6 py-2 text-xs text-gray-500">
                            Editar
                        </th>
                        <th class="px-6 py-2 text-xs text-gray-500">
                            Borrar
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white">
                    @foreach ($clientes as $cliente)
                        <tr class="whitespace-nowrap">
                            <td class="px-6 py-4 text-sm text-blue-500 hover:underline">
                                <a href="{{ route('clientes.show', $cliente) }}">
                                    {{ $cliente->id }}
                                </a>
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-sm text-gray-900">
                                    {{ $cliente->dni }}
                                </div>
                            </td>

                            <td class="px-6 py-4">
                                <div class="text-sm text-gray-900">
                                    {{ $cliente->nombre }}
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <a href="{{ route('clientes.edit', $cliente) }}"
                                    class="px-4 py-1 text-sm text-white bg-blue-400 rounded">Editar</a>
                            </td>
                            <td class="px-6 py-4">
                                <form action="{{ route('clientes.destroy', $cliente) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="px-4 py-1 text-sm text-white bg-red-400 rounded">
                                        Borrar
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <a href="/clientes/create" class="mt-4 text-blue-900 hover:underline">Insertar un nuevo cliente</a>
    </div>

</x-app-layout>
