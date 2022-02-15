<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Vote extends Model
{
    use HasFactory;

    protected $fillable = [
        'candidate_id',
        'user_id'
    ];

    public function vote(): BelongsTo
    {
        return $this->belongsTo(Vote::class, 'user_id');
    }

    public function user(): HasOne
    {
        return $this->hasOne(User::class, 'vote_id');
    }

    /**
     * Get the user associated with the Vote
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function candidate(): BelongsTo
    {
        return $this->belongsTo(Candidate::class, 'candidate_id');
    }
}
