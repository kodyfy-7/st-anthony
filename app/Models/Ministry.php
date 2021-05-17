<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ministry extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'ministry_title', 'ministry_description', 'ministry_motto', 'ministry_time_meeting', 'ministry_profile_photo_path', 'ministry_slug'];

    public function getRouteKeyName()
    {
        return 'ministry_slug';
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
