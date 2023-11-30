<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\Mutators\DocumentMutators;

class document extends Model
{
    use DocumentMutators;
    use HasFactory;
    protected $fillable = [
        'titulo',
        'slug',
        'orden',
        'html'
    ];
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
