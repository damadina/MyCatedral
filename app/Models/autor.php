<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\Mutators\AutorMutators;

class autor extends Model
{
    use HasFactory;
    use AutorMutators;
    protected $fillable = [
        'name',
        'departamento',
        'bio',
        'web',
        'fotoUrl'
    ];
}
