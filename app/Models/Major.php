<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Major extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'goals',
        'jobs_in_future ',
    ];

    public function users ()
    {
        return $this->belongsToMany(User::class, 'university_majors', 'user_id', 'major_id')->withTimestamps()->withPivot('id');
    }
    public function ss()
    {
        return $this->hasMany(User::class, 'major_id', 'id');
    }
}

