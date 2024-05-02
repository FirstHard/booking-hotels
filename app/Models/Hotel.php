<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use HasFactory;
    protected $table = 'hotels';
    protected $fillable = [
        'name',
        'description',
        'country',
        'city',
        'image',
        'image_name',
        'rating_stars',
        'deleted_at',
    ];
}
