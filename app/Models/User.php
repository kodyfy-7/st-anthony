<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected static function boot()
    {
        parent::boot();
        
        static::created(function ($user){
            $alpha = "abcdefghijklmnopqrstuvwxyz";
            $alpha_upper = strtoupper($alpha);
            $numeric = "0123456789";
            $special = "!@$#*%";
            $chars = $alpha . $alpha_upper . $numeric . $special;
            $length = 5;
            $chars = str_shuffle($chars);
            $slug = $user->username.'-'.$chars.'-'.time();
            $user->profile()->create(['profile_slug' => $slug]);
        });
    }

    /*public function getRouteKeyName()
    {
        return 'username';
    }*/

    public function setGroupsAttribute($value)
    {
        $this->attributes['groups'] = json_encode($value);
    }

    public function getGroupsAttribute($value)
    {
        return $this->attributes['groups'] = json_encode($value);
    }

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    public function laity()
    {
        return $this->hasOne(LaityCouncil::class);
    }

    public function ministries()
    {
        return $this->hasMany(Ministry::class);
    }

    public function communities()
    {
        return $this->hasMany(Community::class);
    }

    public function liturgucals()
    {
        return $this->hasMany(Liturgical::class);
    }

    public function councils()
    {
        return $this->hasMany(Council::class);
    }

    public function member_groups()
    {
        return $this->hasMany(MemberGroup::class);
    }

}
