<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\Mutators\CategoriaMutators;
use App\Models\capitulo;

class categoria extends Model
{
    use HasFactory;
    use CategoriaMutators;

    protected $fillable = [
        'title',
        'orden',
        'isPublic',
        'capitulo_id'
    ];

    public function elementos() {
        return $this->hasMany(element::class);
    }

    public function getEstadonameAttribute() {
        if($this->isPublic == 0) {
            return "Borrador";
        } else {
            return "Publicado";
        }
    }

    public function getNameCapituloAttribute() {
        if($this->capitulo_id) {
            $capitulo = capitulo::findOrfail($this->capitulo_id);
            return $capitulo->titulo;
        } else {
            return "Sin Capítulo";
        }

    }
    public function capitulo() {
        return $this->belongsTo(capitulo::class);
    }
    public function getslugsAttribute() {
        $slugs=[];
        foreach($this->elementos as $each) {
            array_push($slugs,$each->slug);
        }
        return $slugs;
    }



}
