<?php

namespace App\Models;

use App\Helpers\Slug;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
     protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    public function likes()
    {
        return $this->hasMany(Like::class);
    }
    public function scopeApproved($query)
    {
        return $query->whereApproved(true)->latest();
    }
    public function getImagepathAttribute($img)
    {
        return asset('storage/images/'.$img);
    }
    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = Slug::uniqueSlug($value, 'posts');
    }
}
