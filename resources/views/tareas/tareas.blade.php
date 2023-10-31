{{-- Extendemos o heredamos de la pagina home se utiliza como plantilla base  --}}
@extends('home')

{{-- con section se busca anexar esta seccion al home --}}
@section('content')
    <div class="container w5 border p-4 mt-4">
        {{-- se llama a la ruta home dentro del formulario y se utiliza el metodo post para enviar --}}
        <form action="{{ route('home-p') }}" method="POST">
            {{-- cSrf = cross site request forgery. sirve para autenticar (token) --}}
            @csrf
            @if (session('success'))
                <h6 class="alert alert-success">{{ session('success') }}</h6>
            @endif
            @error('titulo')
                <h6 class="alert alert-danger">{{ $message }}</h6>
            @enderror
            <div class="mb-3">
                <label for="title" class="form-label">Titulo de la tarea</label>
                <input type="text" name="titulo" class="form-control" placeholder="Ejemplo: Comprar la cena">
                <br>
                <label for="categoria_id" class="form-label"> Selecciona una categoria para la tarea </label>
                <select name="categoria_id" class="form-select">
                    @foreach ($categoria as $categoria)
                        <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Crear nueva tarea</button>
        </form>
        <div>
            <br>
            <div class="p-2 mb-1 bg-warning bg-gradient text-dark text-center">Tareas creadas</div>



            @foreach ($tarea as $tarea)
                <div class="row py-1">
                    <div class="col-md-9 d-flex align-items-center">
                        <a href="{{ route('home-show', ['id' => $tarea->id]) }}">{{ $tarea->titulo }}</a>
                    </div>
                    <div class="col-md-3 d-flex justify-content-end">
                        <form action="{{ route('home-destroy', [$tarea->id]) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <BUtton class="btn btn-danger btn-sm"> Eliminar </BUtton>

                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
