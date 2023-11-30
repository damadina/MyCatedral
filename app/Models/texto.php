<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Termwind\Components\Element;
use App\Models\Traits\Mutators\TextoMutators;
class texto extends Model
{
    use HasFactory;
    use TextoMutators;
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
