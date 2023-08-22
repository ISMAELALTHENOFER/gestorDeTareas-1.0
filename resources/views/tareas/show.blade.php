{{-- Extendemos o heredamos de la pagina home
home se utiliza como plantilla base  --}}
@extends('home')

{{-- con section se busca anexar esta seccion al home --}}
@section('content')
    <div class="container w5 border p-4 mt-4">
        {{-- se llama a la ruta home dentro del formulario y se utiliza el metodo post para enviar --}}
        <form action="{{ route('home-show', ['id' => $tarea->id]) }}" method="POST">
            {{-- cSrf = cross site request forgery. sirve para autenticar (token) --}}
            @csrf
            @if (session('success'))
                <h6 class="alert alert-success">{{ session('success') }}</h6>
            @endif
            @error('titulo')
                <h6 class="alert alert-danger">{{ session($message) }}</h6>
            @enderror
            <div class="mb-3">
                <label for="title" class="form-label">Titulo de la tarea</label>
                <input type="text" name="titulo" class="form-control" value="{{ $tarea->titulo }}">
            </div>

            <button type="submit" class="btn btn-primary">Actualizar tarea</button>
        </form>

    </div>
@endsection
