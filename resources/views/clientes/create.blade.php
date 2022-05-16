<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Crear Cliente') }}
        </h2>
    </x-slot>

<form action="{{route('clientes.store')}}" method="post">
@csrf
@method('post')

<label for="dni">DNI</label>
<input type="text" name="dni" placeholder="Escriba su DNI"  id="dni" value="{{old('dni',$cliente->dni)}}">
@error('dni')
    <p class="text-red-500 text-sm mt-1">
        {{ $message }}
    </p>
  @enderror
  <br>
  <label for="nombre">Nombre</label>
<input type="text" name="nombre" id="nombre" placeholder="Escriba su nombre"  value="{{old('nombre',$cliente->nombre)}}">
@error('nombre')
    <p class="text-red-500 text-sm mt-1">
        {{ $message }}
    </p>
  @enderror


  <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
    Crear
  </button>
</form>

</x-app-layout>
