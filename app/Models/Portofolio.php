<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portofolio extends Model
{
    use HasFactory;

    protected $fillable = [
        'title','images_url' ,'category_id', 'slug', 'description',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function getTakeImageAttribute()
    {
        return '/storage/' . $this->images_url;
    }
}
