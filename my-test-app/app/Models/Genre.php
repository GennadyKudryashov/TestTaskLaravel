<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Genre extends Model
{
    use HasUuids;
    use HasFactory;
    //
    protected $fillable = [
        'name',
        
    ];

    public function films(): BelongsToMany

    {

        return $this->belongsToMany(Film::class,'genre_films');

    }
}
