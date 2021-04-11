<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'part',  'image', 'description'
    ];

    public function getTakeImageAttribute()
    {
        return '/storage/'. $this->image;
    }
}
