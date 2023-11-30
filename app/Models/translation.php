<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class translation extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'table',
        'row_id',
        'column',
        'locale',
        'translation',
        'traductor',
    ];
}
