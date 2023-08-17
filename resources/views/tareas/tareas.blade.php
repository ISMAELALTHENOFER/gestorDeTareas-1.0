@extends('home')

@section('content')
    <div class="container w5 border p-4 mt-4">
        <form>
            <div class="mb-3">
                <label for="title" class="form-label">Titulo de la tarea</label>
                <input type="text" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">Crear nueva tarea</button>
        </form>
    </div>
@endsection
