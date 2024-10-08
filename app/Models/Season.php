<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin IdeHelperSeason
 */
class Season extends Model
{
    use HasFactory;

    protected $table = 'seasons';

    protected $fillable = [
        'number',
        'episode_count',
        'movie_id'
    ];

    public function movie()
    {
        return $this->belongsTo(Movie::class);
    }
}
