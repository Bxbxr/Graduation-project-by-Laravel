<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlatformPgae extends Model
{
    protected $fillable=[
        'title','content',
    ];
    use HasFactory;
}
