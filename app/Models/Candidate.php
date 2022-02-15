<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Candidate extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'visi', 'misi', 'image', 'fakultas'
    ];

    /**
     * Get all of the vote for the Candidate
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function vote(): HasMany
    {
        return $this->hasMany(Vote::class, 'candidate_id',);
    }
}
