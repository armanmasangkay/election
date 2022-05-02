<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PpcrvPrecinct extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'precinct_id'
    ];

    protected $table = 'ppcrvprecincts';
}
