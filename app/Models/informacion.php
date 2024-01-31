<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\Mutators\InformacionMutators;

class informacion extends Model
{
    use HasFactory;
    use InformacionMutators;
    protected $fillable = [
        'titulo',
        'order',
        'informacion',
        'isPublic'
    ];
    public function getEstadonameAttribute() {
        if($this->isPublic == 0) {
            return "Borrador";
        } else {
            return "Publicado";
        }

    }
}
