<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Tarea;


class Categoria extends Model
{
    use HasFactory;

    public function tareas()
    {
        return $this->hasMany(Tarea::class); //relacion uno a muchos (una categoria puede tener muchas tareas)
    }
}
