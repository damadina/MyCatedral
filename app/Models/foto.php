<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class foto extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'url',
        'piedefoto',
        'alt',
        'keywords',
        'element_id',
    ];
    public function elemento() {
        return $this->belongsTo(elemento::class);
    }

}
