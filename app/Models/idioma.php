<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\Mutators\IdiomaMutators;

class idioma extends Model
{
    use HasFactory;
    use IdiomaMutators;
    protected $fillable = [
        'title',
        'orden',
        'isPublic',
        'locale',
        'elements',
        'textos',
        'fotos',
        'idiomas',
        'documents',
        'autors',
        'informacions',
        'elementsTraduccion',
        'textosTraduccion',
        'fotosTraduccion',
        'idiomasTraduccion',
        'documentsTraduccion',
        'autorsTraduccion',
        'informacionsTraduccion',
        'traducciones_Start',

    ];


    public function getEstadonameAttribute() {
        if($this->isPublic == 0) {
            return "Borrador";
        } else {
            return "Publicado";
        }

    }
    protected $casts = [
        'traducciones_Start' => 'array'
    ];

}
