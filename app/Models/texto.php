<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Termwind\Components\Element;

class texto extends Model
{
    use HasFactory;
    protected $fillable = [
        'orden',
        'titulo',
        'html',
        'element_id',
    ];
    public function elemento() {
        return $this->belongsTo(Element::class);
    }
}
