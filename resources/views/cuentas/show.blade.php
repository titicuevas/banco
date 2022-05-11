<x-app-layout>
    <x-slot name="header">
        <h2 style="text-align: center" class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Informacion de la cuenta') }}
        </h2>
    </x-slot>

    <h1>Numero:{{$cuenta->numero}}</h1>
    <br>
    <button class="px-4 py-1 text-sm text-white bg-blue-400 rounded"><a href="/cuentas">Volver</a></button>
</div>



</x-app-layout>
