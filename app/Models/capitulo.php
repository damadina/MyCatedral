<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\Mutators\CapituloMutators;

class capitulo extends Model
{
    use HasFactory;
    use CapituloMutators;

    protected $fillable = [
        'titulo',
        'literal',
        'orden',
        'ispublic'
    ];


    public function getEstadonameAttribute() {
        if($this->ispublic == 0) {
            return "Borrador";
        } else {
            return "Publicado";
        }

    }

    public function categorias() {
        return $this->hasMany(categoria::class);
    }
}


