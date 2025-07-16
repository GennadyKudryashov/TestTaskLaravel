<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    use HasUuids;
    //
    protected $fillable  = ['name']
}
