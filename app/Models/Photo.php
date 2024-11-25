<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Photo extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',         // Menambahkan title ke fillable
        'description',   // Menambahkan description ke fillable
        'image_url',
        'gallery_id'
    ];

    public function gallery()
    {
        return $this->belongsTo(Gallery::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function getImageUrlAttribute($value)
    {
        // Jika URL dimulai dengan http/https, gunakan URL langsung
        if (filter_var($value, FILTER_VALIDATE_URL)) {
            return $value;
        }
        
        // Jika tidak, coba gunakan storage URL
        return asset('storage/' . $value);
    }
}

