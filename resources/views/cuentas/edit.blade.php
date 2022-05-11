<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Cuentas') }}
        </h2>
    </x-slot>

<form method="POST" action="{{route('cuentas.update', $cuenta)}}" >
@csrf
@method('PUT')

<label for="numero">Numero:</label>
<input type="numeric" name="numero" placeholder="Escriba su Numero de cuenta"  id="numero" value="{{old('numero',$cuenta->numero)}}">
@error('numero')
    <p class="text-red-500 text-sm mt-1">
        {{ $message }}
    </p>
  @enderror
  <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
    Editar
  </button>
</form>

</x-app-layout>
