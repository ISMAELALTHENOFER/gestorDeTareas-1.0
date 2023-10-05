@extends('home')
@section('content')
    <div class="container w-25 border p-4 mt-4">
        <div class="row mx-auto">
            <form action="{{ route('categoria.store') }}" method="POST">
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
                        placeholder="Ejemplo: Hogar">

                    <label for="color" class="form-label">Escoge un color para la categoría</label>
                    <input type="color" class="form-control form-control-color" name="color" id="color"
                        value="#5BFF09" title="Elige tu color">

                    <input type="submit" value="Crear categoria" class="btn btn-primary my-2" />
                </div>
            </form>

            <div>
                @foreach ($categorias as $categoria)
                    <div class="row py-1">
                        <div class="col-md-9 d-flex align-items-center">
                            <a class="d-flex align-items-center gap-2"
                                href="{{ route('categoria.show', ['categorium' => $categoria->id]) }}">
                                <span class="color-container" style="background-color: {{ $categoria->color }}"></span>
                                {{ $categoria->nombre }}
                            </a>
                        </div>

                        <div class="col-md-3 d-flex justify-content-end">
                            <button class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                data-bs-target="#modal{{ $categoria->id }}">Eliminar</button>

                        </div>
                    </div>

                    <!-- MODAL -->
                    <div class="modal fade" id="modal{{ $categoria->id }}" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Eliminar categoría</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Al eliminar la categoría <strong>{{ $categoria->nombre }}</strong>
                                    se eliminan todas las tareas asignadas a la misma.
                                    ¿Está seguro que desea eliminar la categoría <strong>{{ $categoria->nombre }}</strong>?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No,
                                        cancelar</button>
                                    <form action="{{ route('categoria.destroy', ['categorium' => $categoria->id]) }}"
                                        method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-primary">Sí, eliminar categoría</button>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
@endsection
