<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Film extends Model
{
    use HasUuids;
    //
    protected $fillable = [
        'name',
        
    ];

    public function films(): BelongsToMany

    {

        return $this->belongsToMany(Genre::class);

    }
}
