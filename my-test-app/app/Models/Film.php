<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Film extends Model
{
    use HasUuids;
    use HasFactory;
    //
    protected $fillable = [
        'name',
        
    ];

    public function genres(): BelongsToMany

    {

        return $this->belongsToMany(Genre::class,'genre_films');

    }
}
