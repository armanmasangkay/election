<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    use HasFactory;

    protected $fillable = [
        'precinct_id',
        'candidate_id',
        'vote_count'
    ];

    public function candidates()
    {
        return $this->belongsTo(Candidate::class, 'id', 'candidate_id');
    }

    public function totalVotes($id)
    {
        return $this->where('candidate_id', $id)->sum('vote_count');
    }
}
