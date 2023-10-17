@extends('home')

@section('content')
    <div class="container w-25 border p-4">
        <div class="row mx-auto">
            <form method="POST" action="{{ route('categoria.update', ['categorium' => $categoria->id]) }}">
                @method('PATCH')
                @csrf

                <div class="mb-3 col">

                    @error('nombre')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    @error('color')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    @if (session('success'))
                        <h6 class="alert alert-success">{{ session('success') }}</h6>
                    @endif

                    <label for="nombre" class="form-label">Nombre de la categoría</label>
                    <input type="text" class="form-control mb-2" name="nombre" id="nombre"
                        placeholder="Ejemplo: Trabajo " value="{{ $categoria->nombre }}">

                    <label for="color" class="form-label">Escoge un color para la categoría</label>
                    <input type="color" class="form-control form-control-color" name="color" id="color"
                        value="{{ $categoria->color }}" title="Elige tu color">

                    <input type="submit" value="Actualizar Categoria" class="btn btn-primary my-2" />
                </div>
            </form>

            <div> {{-- llama a la funcion creada en el modelo  --}}
                @if ($categoria->tareas->count() > 0)
                    @foreach ($categoria->tareas as $tarea)
                        <div class="row py-1">
                            <div class="col-md-9 d-flex align-items-center">
                                <a href="{{ route('home-show', ['id' => $tarea->id]) }}">{{ $tarea->titulo }}</a>
                            </div>

                            <div class="col-md-3 d-flex justify-content-end">
                                <form action="{{ route('home-destroy', [$tarea->id]) }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-danger btn-sm">Eliminar</button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                @else
                    No existen tareas para esta categoría
                @endif

            </div>
        </div>
    </div>
@endsection
