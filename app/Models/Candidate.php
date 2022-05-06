<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'location',
        'position'
    ];

    const VALID_LOCATIONS = [
        'Nationwide',
        'Region VIII',
        'Anahawan',
        'Bontoc',
        'Hinunangan',
        'Hinundayan',
        'Libagon',
        'Liloan',
        'Limasawa',
        'Maasin',
        'Macrohon',
        'Malitbog',
        'Padre Burgos',
        'Pintuyan',
        'Saint Bernard',
        'San Francisco',
        'San Juan',
        'San Ricardo',
        'Silago',
        'Sogod',
        'Tomas Oppus'
    ];

    const POSITIONS = [
        'Mayor',
        'Vice-Mayor',
        'Councilor'
    ];

    public function votes()
    {
        return $this->hasMany(Vote::class);
    }

    // public function precincts()
    // {
    //     return $this->hasMany(Precinct::class);
    // }
}
