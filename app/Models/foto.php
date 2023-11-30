<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\Mutators\FotoMutators;


class foto extends Model
{
    use HasFactory;
    use FotoMutators;

    protected $fillable = [
        'title',
        'url',
        'piedefoto',
        'alt',
        'keywords',
        'element_id',
        'order'
    ];
    public function elemento() {
        return $this->belongsTo(elemento::class);
    }


}
