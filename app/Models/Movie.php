<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin IdeHelperMovie
 */
class Movie extends Model
{
    use HasFactory;

    protected $table = 'movies';

    protected $fillable = [
        'title',
        'slug',
        'release_date',
        'duration',
        'type',
        'summary',
        'synopsis',
        'poster',
        'rating'
    ];

    public function genres()
    {
        return $this->belongsToMany(Genre::class, 'movie_genre', 'movie_id', 'genre_id');
    }

    public function seasons()
    {
        return $this->hasMany(Season::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class)->orderBy('published_date', 'desc');
    }

    public function persons()
    {
        return $this->belongsToMany(Person::class, 'castings')
                    ->withPivot('role');
    }

    /**
     * Arrondit un nombre au 0,5 le plus proche.
     *
     * @param  float $value Le nombre à arrondir.
     * @return float Le nombre arrondi.
     */
    private function roundToNearestHalf($value)
    {
        if ($value === null) {
            return null;
        }

        return round($value * 2) / 2;
    }

    /**
     * Calcule la note moyenne arrondie au 0,5 le plus proche.
     *
     * @return float|null
     */
    public function averageRating()
    {
        $average = $this->reviews()->avg('rating');
        return $this->roundToNearestHalf($average);
    }

    /**
     * Calcule le nombre d'avis.
     *
     * @return int
     */
    public function reviewsCount()
    {
        return $this->reviews()->count();
    }
}
