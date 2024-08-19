<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin IdeHelperPerson
 */
class Person extends Model
{
    use HasFactory;

    protected $table = 'persons';

    protected $fillable = [
        'firstname',
        'lastname',
        'birth_date'
    ];

    public function movies()
    {
        return $this->belongsTo(Movie::class, 'castings')
                    ->withPivot('role');
    }

}
