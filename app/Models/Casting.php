<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin IdeHelperCasting
 */
class Casting extends Model
{
    use HasFactory;

    protected $table = 'castings';

    protected $fillable = [
        'movie_id',
        'person_id',
        'role',
        'credit_order'
    ];

    public function movie()
    {
        return $this->belongsTo(Movie::class);
    }

    public function person()
    {
        return $this->belongsTo(Person::class);
    }
}
