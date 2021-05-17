<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Liturgical extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'liturgical_title', 'liturgical_description', 'liturgical_motto', 'liturgical_time_meeting', 'liturgical_profile_photo_path',  'liturgical_slug'];

    public function getRouteKeyName()
    {
        return 'liturgical_slug';
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
