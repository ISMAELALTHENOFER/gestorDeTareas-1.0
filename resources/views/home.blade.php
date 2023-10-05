<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">

    <title>App Tareas</title>

</head>

<body>
    {{-- se crea el navbar con las pestañas todas las tareas y categorias --}}
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="http://127.0.0.1:8000/home"> Tareas </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="http://127.0.0.1:8000/categoria"> Categorias </a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>

    @yield('content')
</body>

</html>
<style>
    a {
        text-decoration: none; //para sacar el decorado del hipervinculo
    }

    body {
        margin: 0;
        padding: 0;
        font-family: sans-serif;

    }

    .color-container {
        width: 16px;
        height: 16px;
        display: inline-block;
        border-radius: 4px;
    }
</style>
