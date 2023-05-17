<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Jetstream\HasTeams;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use HasTeams;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name', 'email', 'password', 'type',
        'university_id',
        'academic_number',
        'major_id',
        'level_id',
        'student_card_photo',
        'gender',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];


    public function getUniversitiesAttribute(Builder $query)
    {
        return $query->where('type', 'university');
    }

    public function getStudentsAttribute(Builder $query)
    {
        return $query->where('type', 'university');
    }

    public function videos()
    {
        return $this->hasMany(Video::class);
    }
    public function likes()
    {
        return $this->hasMany(Like::class);
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    public function notifications()
    {
        return $this->hasMany(Notification::class);
    }
    public function alert()
    {
        return $this->hasOne(Alert::class);
    }
    public function videoInHistory()
    {
        return $this->belongsToMany(Video::class,'video_user','user_id','video_id')->withTimestamps()->withPivot('id');
    }
    public function isAdmin()
    {
        return $this->administration_level > 0 ? true : false;
    }
    public function isSuperAdmin()
    {
        return $this->administration_level > 1 ? true : false;
    }
    public function views()
    {
        return $this->hasMany(View::class);
    }
    public function pages()
    {
        return $this->hasMany(Page::class);
    }
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
    public function majors()
    {
        return $this->belongsToMany(Major::class, 'university_majors', 'user_id', 'major_id')->withTimestamps()->withPivot('id');
    }
    public function level()
    {
        return $this->belongsTo(Level::class);
    }
    
    public function users()
    {
        return $this->hasMany($this, 'university_id', 'id');
    }
    public function major()
    {
        return $this->belongsTo(Major::class);
    }

}
