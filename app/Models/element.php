<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class element extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'orden',
        'seoTitle',
        'seoMeta',
        'isPublic',
        'categoria_id',
        'slug'
    ];

    public function getCategorianameAttribute() {
        $categoria = categoria::find($this->categoria_id);
        return $categoria->title;
    }
    public function getEstadonameAttribute() {
        if($this->isPublic == 0) {
            return "Borrador";
        } else {
            return "Publicado";
        }

    }

    public function categoria() {
        return $this->belongsTo(categoria::class);
    }
    public function fotos() {
        return $this->hasMany(foto::class);
    }
    public function textos() {
        return $this->hasMany(texto::class);
    }

}
