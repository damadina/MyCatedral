<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class categoria extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'orden',
        'isPublic'
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

}
