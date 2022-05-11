<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Crear Cuentas') }}
        </h2>
    </x-slot>

<form action="{{route('cuentas.store',[])}}" method="post">
@csrf
@method('post')

<label for="numero">Numero</label>
<input type="numeric" name="numero" placeholder="Escriba su Numero de cuenta"  id="numero" value="{{old('numero',$cuenta->numero)}}">
@error('numero')
    <p class="text-red-500 text-sm mt-1">
        {{ $message }}
    </p>
  @enderror
  <br>
  <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
    Crear
  </button>
</form>

</x-app-layout>
